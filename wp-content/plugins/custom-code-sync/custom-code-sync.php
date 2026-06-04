<?php
/**
 * Plugin Name: Custom Code Sync
 * Description: Export/import Elementor Pro "Custom Code" snippets between the WordPress database and Git-tracked JSON files.
 * Version:     1.0.0
 * Author:      InterviewKickstart
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( defined( 'WP_CLI' ) && WP_CLI ) {

	/**
	 * Sync Elementor Custom Code (post type `elementor_snippet`) to/from JSON files.
	 *
	 * Files live in:  wp-content/plugins/custom-code-sync/snippets/*.json
	 * Each snippet is serialized with its code + all `_elementor_*` meta
	 * (code, location, priority, conditions, extra options).
	 */
	class Custom_Code_Sync_CLI {

		const POST_TYPE = 'elementor_snippet';

		private function snippets_dir() {
			return plugin_dir_path( __FILE__ ) . 'snippets';
		}

		/**
		 * Export all Custom Code snippets from the DB into JSON files.
		 *
		 * ## EXAMPLES
		 *     wp custom-code export
		 */
		public function export( $args, $assoc_args ) {
			$dir = $this->snippets_dir();
			if ( ! is_dir( $dir ) ) {
				wp_mkdir_p( $dir );
			}

			$posts = get_posts( [
				'post_type'   => self::POST_TYPE,
				'post_status' => 'any',
				'numberposts' => -1,
			] );

			if ( empty( $posts ) ) {
				WP_CLI::warning( 'No Custom Code snippets found in the database.' );
				return;
			}

			foreach ( $posts as $post ) {
				$meta = [];
				foreach ( get_post_meta( $post->ID ) as $key => $values ) {
					// Only persist Elementor's own meta (code, location, priority, conditions, ...).
					if ( strpos( $key, '_elementor_' ) === 0 ) {
						$meta[ $key ] = maybe_unserialize( $values[0] );
					}
				}

				$data = [
					'slug'    => $post->post_name,
					'title'   => $post->post_title,
					'status'  => $post->post_status,
					'content' => $post->post_content, // usually empty for snippets, kept for safety
					'meta'    => $meta,
				];

				$file = trailingslashit( $dir ) . $post->post_name . '.json';
				file_put_contents(
					$file,
					wp_json_encode( $data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE )
				);
				WP_CLI::log( "Exported: {$post->post_name}" );
			}

			WP_CLI::success( count( $posts ) . ' snippet(s) exported to ' . $dir );
		}

		/**
		 * Import snippets from JSON files into the DB (upsert by slug).
		 *
		 * ## OPTIONS
		 *
		 * [--delete]
		 * : Delete DB snippets that no longer have a matching JSON file.
		 *
		 * ## EXAMPLES
		 *     wp custom-code import
		 *     wp custom-code import --delete
		 */
		public function import( $args, $assoc_args ) {
			$dir   = $this->snippets_dir();
			$files = glob( trailingslashit( $dir ) . '*.json' );

			if ( empty( $files ) ) {
				WP_CLI::warning( 'No JSON files found in ' . $dir );
				return;
			}

			$seen_slugs = [];

			foreach ( $files as $file ) {
				$data = json_decode( file_get_contents( $file ), true );
				if ( ! $data || empty( $data['slug'] ) ) {
					WP_CLI::warning( 'Skipping invalid file: ' . basename( $file ) );
					continue;
				}

				$seen_slugs[] = $data['slug'];

				$existing = get_page_by_path( $data['slug'], OBJECT, self::POST_TYPE );

				$postarr = [
					'post_type'    => self::POST_TYPE,
					'post_name'    => $data['slug'],
					'post_title'   => $data['title'],
					'post_status'  => $data['status'],
					'post_content' => isset( $data['content'] ) ? $data['content'] : '',
				];
				if ( $existing ) {
					$postarr['ID'] = $existing->ID;
				}

				$post_id = wp_insert_post( $postarr, true );
				if ( is_wp_error( $post_id ) ) {
					WP_CLI::warning( "Failed to import {$data['slug']}: " . $post_id->get_error_message() );
					continue;
				}

				if ( ! empty( $data['meta'] ) && is_array( $data['meta'] ) ) {
					foreach ( $data['meta'] as $key => $value ) {
						update_post_meta( $post_id, $key, $value );
					}
				}

				WP_CLI::log( ( $existing ? 'Updated: ' : 'Created: ' ) . $data['slug'] );
			}

			// Optional cleanup of orphaned DB snippets.
			if ( ! empty( $assoc_args['delete'] ) ) {
				$all = get_posts( [
					'post_type'   => self::POST_TYPE,
					'post_status' => 'any',
					'numberposts' => -1,
				] );
				foreach ( $all as $post ) {
					if ( ! in_array( $post->post_name, $seen_slugs, true ) ) {
						wp_delete_post( $post->ID, true );
						WP_CLI::log( 'Deleted (no file): ' . $post->post_name );
					}
				}
			}

			// Make Elementor regenerate its cached CSS/snippets output.
			if ( class_exists( '\Elementor\Plugin' ) ) {
				\Elementor\Plugin::$instance->files_manager->clear_cache();
			}

			WP_CLI::success( count( $files ) . ' snippet file(s) imported.' );
		}
	}

	WP_CLI::add_command( 'custom-code', 'Custom_Code_Sync_CLI' );
}

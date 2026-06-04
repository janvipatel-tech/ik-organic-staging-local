<?php get_header(); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
<main id="content" class="site-main">
    
<div class="page-content">
    <h1><?php single_cat_title(); ?></h1>
    <?php
        $child_cats = get_terms(array(
        'taxonomy' => 'category',
        'parent' => get_queried_object_id(),
        'hide_empty' => false,
    ));

    if (!empty($child_cats)) {
    echo '<div class="row">';
    foreach ($child_cats as $child) {
        $cat_image_url = get_field('category_image', 'category_' . $child->term_id);
        $cat_image_url = $cat_image_url ? $cat_image_url : 'https://via.placeholder.com/300x200?text=No+Image';

        echo '<div class="col-md-4"><div class="loop_data">';
        echo '<a href="' . get_category_link($child->term_id) . '">';
        echo '<img src="' . esc_url($cat_image_url) . '" alt="' . esc_attr($child->name) . '" style="width:100%;" />';
        echo '<h3 class="child_cat">' . esc_html($child->name) . '</h3>';
        echo '</a>';
        echo '</div></div>';
    }
    echo '</div>';
}


    // Show posts only if you're on a subcategory
if (empty($child_cats) || $category->parent != 0) {
    if (have_posts()) :
        echo '<div class="row">';
        while (have_posts()) : the_post();

            echo '<div class="col-md-4"><div class="loop_data same_height">';

            // Post image
            if (has_post_thumbnail()) {
                echo '<a href="' . get_permalink() . '">';
                echo get_the_post_thumbnail(get_the_ID(), 'medium', ['style' => 'width:100%; height:auto;']);
                echo '</a>';
            } else {
                // Fallback image if no thumbnail
                echo '<a href="' . get_permalink() . '">';
                echo '<img src="https://via.placeholder.com/300x200?text=No+Image" alt="' . esc_attr(get_the_title()) . '" style="width:100%; height:auto;" />';
                echo '</a>';
            }

            // Post title
            echo '<h2 class="loop_heading"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';

            echo '</div></div>';

        endwhile;
        echo '</div>'; // close row

        // ✅ Add pagination here:
        echo '<div class="pagination-wrapper">';
        the_posts_pagination([
            'mid_size'  => 2,
            'prev_text' => __('« Previous', 'textdomain'),
            'next_text' => __('Next »', 'textdomain'),
        ]);
        echo '</div>';

    else :
        echo '<p>No posts found.</p>';
    endif;
}

?>

</div>

</main>
<?php get_footer(); ?>

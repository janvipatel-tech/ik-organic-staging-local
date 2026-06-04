<?php
/*Theme start*/
function child_style_enqueue()
{
    wp_enqueue_style("child_style", get_stylesheet_uri(), [], filemtime(get_stylesheet_directory() . '/style.css'));
    if (is_singular("service") && get_post_meta(get_the_ID(), "have_related_post", true)) {
        wp_enqueue_style("service_slider_style", get_stylesheet_directory_uri() . '/service-slider-style.css', [], filemtime(get_stylesheet_directory() . '/service-slider-style.css'));
    }
    if (is_page_template('templates/page-ai-quotient.php')) {
        // Google Fonts (Lato + Open Sans)
        wp_enqueue_style(
            'ai-quotient-fonts',
            'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap',
            [],
            null
        );
        // Swiper CSS and JS
        wp_enqueue_style('swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], null);
        wp_enqueue_script('swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], null, true);
        wp_enqueue_style('ai-quotient-style', get_stylesheet_directory_uri() . '/assets/css/ai-quotient.css', [], filemtime(get_stylesheet_directory() . '/assets/css/ai-quotient.css'));
        wp_enqueue_script('ai-quotient-script', get_stylesheet_directory_uri() . '/assets/js/ai-quotient.js', [], filemtime(get_stylesheet_directory() . '/assets/js/ai-quotient.js'), true);
        wp_localize_script('ai-quotient-script', 'ajaxurl', admin_url('admin-ajax.php'));

    }
    if (is_page_template('templates/results-ai-quotient.php')) {
        //  echo do_shortcode('[elementor-template id="30803"]');
        // Google Fonts (Lato + Open Sans)
        wp_enqueue_style(
            'ai-quotient-fonts',
            'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap',
            [],
            null
        );
        // chart
        wp_enqueue_script('chart-script', 'https://cdn.jsdelivr.net/npm/chart.js', [], null, true);
        wp_enqueue_script('chart-plugin-annotation', 'https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@3.1.0', [], null, true);
        wp_enqueue_script('chart-data-label', 'https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0', [], null, true);
        wp_enqueue_style('swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], null);
        wp_enqueue_script('swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], null, true);
        wp_enqueue_style('shimmer-css', get_stylesheet_directory_uri() . '/assets/css/shimmer.css', array(), time());
        wp_enqueue_script('shimmer-js', get_stylesheet_directory_uri() . '/assets/js/shimmer.js', [], null, true);
        wp_enqueue_style('results-ai-quotient-style', get_stylesheet_directory_uri() . '/assets/css/results-ai-quotient.css', [], filemtime(get_stylesheet_directory() . '/assets/css/results-ai-quotient.css'));
        wp_enqueue_script('results-ai-quotient-script', get_stylesheet_directory_uri() . '/assets/js/results-ai-quotient.js', [], filemtime(get_stylesheet_directory() . '/assets/js/results-ai-quotient.js'), true);

        wp_localize_script('results-ai-quotient-script', 'themeVars', [
            'themeUrl' => get_stylesheet_directory_uri(),
            'ajaxUrl' => admin_url('admin-ajax.php')
        ]);


    }

    //salaey AI Pages
    if (is_page_template('templates/page-ai-salary.php')) {
        // Google Fonts (Lato + Open Sans)
        wp_enqueue_style(
            'ai-quotient-fonts',
            'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap',
            [],
            null
        );
        // Swiper CSS and JS
        wp_enqueue_style('swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], null);
        wp_enqueue_script('swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], null, true);
        wp_enqueue_style('ai-salary-style', get_stylesheet_directory_uri() . '/assets/css/landing-salary.css', [], filemtime(get_stylesheet_directory() . '/assets/css/landing-salary.css'));
        wp_enqueue_script('ai-salary-script', get_stylesheet_directory_uri() . '/assets/js/landing-salary.js', [], filemtime(get_stylesheet_directory() . '/assets/js/landing-salary.js'), true);
        wp_localize_script('ai-salary-script', 'ajaxurl', admin_url('admin-ajax.php'));

    }

    //salary result page

    if (is_page_template('templates/ai-result-salary-analyzer.php')) {
        // Google Fonts (Lato + Open Sans)
        wp_enqueue_style(
            'ai-salary-fonts',
            'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap',
            [],
            null
        );
        //chart
        wp_enqueue_script('chart-script', 'https://cdn.jsdelivr.net/npm/chart.js', [], null, true);
        wp_enqueue_script('chart-plugin-annotation', 'https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@3.1.0', [], null, true);
        wp_enqueue_script('chart-data-label', 'https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0', [], null, true);
        //Jquery
        wp_enqueue_script('jquery');
        //shimmer css and js
        wp_enqueue_style('ai-salary-shimmer-style', get_stylesheet_directory_uri() . '/assets/css/salary-shimmer.css', [], filemtime(get_stylesheet_directory() . '/assets/css/salary-shimmer.css'));
        wp_enqueue_script('ai-salary-shimmer-script', get_stylesheet_directory_uri() . '/assets/js/salary-shimmer.js', [], filemtime(get_stylesheet_directory() . '/assets/js/salary-shimmer.js'), true);

        // result CSS and JS
        wp_enqueue_style('ai-salary-result-style', get_stylesheet_directory_uri() . '/assets/css/ai-salary-result.css', [], filemtime(get_stylesheet_directory() . '/assets/css/ai-salary-result.css'));
        wp_enqueue_script('ai-salary-result-script', get_stylesheet_directory_uri() . '/assets/js/ai-salary-result.js', ['jquery'], filemtime(get_stylesheet_directory() . '/assets/js/ai-salary-result.js'), true);
        wp_localize_script('ai-salary-result-script', 'themeVars', [
            'themeUrl' => get_stylesheet_directory_uri(),
            'ajaxUrl' => admin_url('admin-ajax.php'),
        ]);

    }

     //big-tect-road-map

     if (is_page_template('templates/big-tech-roadmap.php')) {
        // Google Fonts (Lato + Open Sans)
        wp_enqueue_style(
            'ai-salary-fonts',
            'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap',
            [],
            null
        );
        //chart
        wp_enqueue_script('chart-script', 'https://cdn.jsdelivr.net/npm/chart.js', [], null, true);
        wp_enqueue_script('chart-plugin-annotation', 'https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@3.1.0', [], null, true);
        wp_enqueue_script('chart-data-label', 'https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0', [], null, true);
        //Jquery
        wp_enqueue_script('jquery');
        //shimmer css and js
        wp_enqueue_style('ai-salary-shimmer-style', get_stylesheet_directory_uri() . '/assets/css/salary-shimmer.css', [], filemtime(get_stylesheet_directory() . '/assets/css/salary-shimmer.css'));
        wp_enqueue_script('ai-salary-shimmer-script', get_stylesheet_directory_uri() . '/assets/js/salary-shimmer.js', [], filemtime(get_stylesheet_directory() . '/assets/js/salary-shimmer.js'), true);

        // result CSS and JS
        wp_enqueue_style('ai-bigtech-roadmap-style', get_stylesheet_directory_uri() . '/assets/css/big-tech-roadmap.css', [], filemtime(get_stylesheet_directory() . '/assets/css/big-tech-roadmap.css'));
        wp_enqueue_script('ai-bigtech-roadmap-script', get_stylesheet_directory_uri() . '/assets/js/big-tech-roadmap.js', ['jquery'], filemtime(get_stylesheet_directory() . '/assets/js/big-tech-roadmap.js'), true);
        wp_localize_script('ai-bigtech-roadmap-script', 'themeVars', [
            'themeUrl' => get_stylesheet_directory_uri(),
            'ajaxUrl' => admin_url('admin-ajax.php'),
        ]);

    }
	
	//bigtech-laning-page
    if (is_page_template('templates/big-tech-landing.php')) {
        // Google Fonts (Lato + Open Sans)
        wp_enqueue_style(
            'ai-quotient-fonts',
            'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap',
            [],
            null
        );
        // Swiper CSS and JS
        wp_enqueue_style('swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], null);
        wp_enqueue_script('swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], null, true);
        wp_enqueue_style('ai-bigtech-landing-style', get_stylesheet_directory_uri() . '/assets/css/big-tech-landing.css', [], filemtime(get_stylesheet_directory() . '/assets/css/big-tech-landing.css'));
        wp_enqueue_script('ai-salary-script', get_stylesheet_directory_uri() . '/assets/js/big-tech-landing.js', [], filemtime(get_stylesheet_directory() . '/assets/js/big-tech-landing.js'), true);
        wp_localize_script('ai-salary-script', 'ajaxurl', admin_url('admin-ajax.php'));

    }

//Big-tech-result
if (is_page_template('templates/big-tech-result.php')) {
        // Google Fonts (Lato + Open Sans)
        wp_enqueue_style(
            'ai-salary-fonts',
            'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap',
            [],
            null
        );
        //chart
        wp_enqueue_script('chart-script', 'https://cdn.jsdelivr.net/npm/chart.js', [], null, true);
        wp_enqueue_script('chart-plugin-annotation', 'https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@3.1.0', [], null, true);
        wp_enqueue_script('chart-data-label', 'https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0', [], null, true);
        //Jquery
        wp_enqueue_script('jquery');
        //shimmer css and js
        wp_enqueue_style('ai-salary-shimmer-style', get_stylesheet_directory_uri() . '/assets/css/salary-shimmer.css', [], filemtime(get_stylesheet_directory() . '/assets/css/salary-shimmer.css'));
        wp_enqueue_script('ai-salary-shimmer-script', get_stylesheet_directory_uri() . '/assets/js/salary-shimmer.js', [], filemtime(get_stylesheet_directory() . '/assets/js/salary-shimmer.js'), true);

        // result CSS and JS
        wp_enqueue_style('ai-bigtech-roadmap-style', get_stylesheet_directory_uri() . '/assets/css/big-tech-roadmap.css', [], filemtime(get_stylesheet_directory() . '/assets/css/big-tech-roadmap.css'));
        wp_enqueue_script('ai-bigtech-result-script', get_stylesheet_directory_uri() . '/assets/js/big-tech-result.js', ['jquery'], filemtime(get_stylesheet_directory() . '/assets/js/big-tech-result.js'), true);
        wp_localize_script('ai-bigtech-result-script', 'themeVars', [
            'themeUrl' => get_stylesheet_directory_uri(),
            'ajaxUrl' => admin_url('admin-ajax.php'),
        ]);

    }
}


add_action("wp_enqueue_scripts", "child_style_enqueue", 20);

add_action('wp_head', function () {
    if (is_page_template('templates/results-ai-quotient.php')) {
        echo '<meta name="nitro-exclude" content="true">';
    }

    // Custom head HTML (hreflang, meta, etc.)
    $custom_head_html = get_field('custom_head_html');
    if (!empty($custom_head_html)) {
        echo $custom_head_html;
    }

    // Course schema (JSON only)
    $schema = get_field('course_schema');
    if (!empty($schema)) {
        echo '<script type="application/ld+json">' . $schema . '</script>';
    }
    // Inject og:image for specific templates
    if (
        is_page_template('templates/page-ai-salary.php') ||
        is_page_template('templates/ai-result-salary-analyzer.php')
    ) {
        ?>
        <meta property="og:image" content="https://staging-07b2-interviewkickstart.wpcomstaging.com/wp-content/uploads/2025/06/OG-Image-Salary-Analysis.png">
        <meta name="twitter:image" content="https://staging-07b2-interviewkickstart.wpcomstaging.com/wp-content/uploads/2025/06/OG-Image-Salary-Analysis.png" />
        <?php
    }
});



/*Theme start End*/


// Previous month and year

function previous_month_year_shortcode()
{
    $current_month = date('n'); // Get current month as a number (1-12)
    $current_year = date('Y'); // Get current year

    $previous_month = $current_month - 1; // Calculate previous month

    // Handle December to January transition
    if ($previous_month < 1) {
        $previous_month = 12; // Set to December
        $current_year--; // Decrement the year
    }

    // Get the month name
    $month_name = date('F', mktime(0, 0, 0, $previous_month, 1)); // Return month name

    return $month_name . ' ' . $current_year . ' COHORTS'; // Return month, year, and "COHORTS"
}
add_shortcode('previous_month_year', 'previous_month_year_shortcode');



function post_video_fild()
{
    $custom_field_value = get_post_meta(get_the_ID(), 'video_embed_code', true);
    if (!empty($custom_field_value)) {
        return $custom_field_value;
    }
}

add_shortcode('post_video_fild', 'post_video_fild');



// Shortcode to display Author and updated date/time
function display_article_meta_no_link() {
    if ( is_singular('articles') || (is_single() && has_category('ai-for-all')) ) { 
        $acf_author = get_field('author'); 
        $updated_date = get_the_modified_date('M j, Y \a\t h:i A'); 
        
        $output = '<div class="article-meta">';
        $output .= 'Last updated by ';
        
        if ( !empty($acf_author) && is_array($acf_author) ) {
            // Loop through ACF authors
            $author_names = array();
            foreach ($acf_author as $single_author) {
                $author_names[] = get_the_title($single_author);
            }
            $output .= esc_html(implode(', ', $author_names));
        } else {
            // Fallback to WordPress post author
            $output .= esc_html( get_the_author() );
        }
        
        $output .= ' on ' . esc_html($updated_date);
        $output .= '</div>';
        return $output;
    }
    return '';
}
add_shortcode('display_article_meta', 'display_article_meta_no_link');








// Shortcode to display Author, updated date/time, and reading time for 'interview-questions' post type
function display_interview_questions_meta()
{
    if (is_singular('interview-questions')) { // Check if it's a single Interview Questions page
        $author = get_field('author'); // Get the Author relationship field
        $updated_date = get_the_modified_date('M j, Y \a\t h:i A'); // Get the last updated date/time

        // Start building the output
        $output = '<div class="interview-meta">';
        $output .= 'Last updated by ';

        if ($author) {
            foreach ($author as $single_author) {
                $author_name = get_the_title($single_author);
                $output .= esc_html($author_name); // Add plain text for Author
            }
        } else {
            $output .= '';
        }

        $output .= ' on ' . esc_html($updated_date);
        $output .= '</div>';
        return $output;
    }
    return '';
}
add_shortcode('display_interview_questions_meta', 'display_interview_questions_meta');



// Shortcode to display Author, updated date/time, and reading time for 'career-advice' post type
function display_career_advice_meta()
{
    if (is_singular('career-advice')) { // Check if it's a single Career Advice page
        $author = get_field('author'); // Get the Author relationship field
        $updated_date = get_the_modified_date('M j, Y \a\t h:i A'); // Get the last updated date/time

        // Start building the output
        $output = '<div class="career-meta">';
        $output .= 'Last updated by ';

        if ($author) {
            foreach ($author as $single_author) {
                $author_name = get_the_title($single_author);
                $output .= esc_html($author_name); // Add plain text for Author
            }
        } else {
            $output .= '';
        }

        $output .= ' on ' . esc_html($updated_date);
        $output .= '</div>';
        return $output;
    }
    return '';
}
add_shortcode('display_career_advice_meta', 'display_career_advice_meta');


// Shortcode to display Author and updated date/time
function display_career_transition_meta_no_link() {
    if ( is_singular('career-transition') || (is_single() && has_category('career-transition')) ) { 
        $acf_author = get_field('author'); 
        $updated_date = get_the_modified_date('M j, Y \a\t h:i A'); 
        
        $output = '<div class="article-meta">';
        $output .= 'Last updated by ';
        
        if ( !empty($acf_author) && is_array($acf_author) ) {
            // Loop through ACF authors
            $author_names = array();
            foreach ($acf_author as $single_author) {
                $author_names[] = get_the_title($single_author);
            }
            $output .= esc_html(implode(', ', $author_names));
        } else {
            // Fallback to WordPress post author
            $output .= esc_html( get_the_author() );
        }
        
        $output .= ' on ' . esc_html($updated_date);
        $output .= '</div>';
        return $output;
    }
    return '';
}
add_shortcode('display_career_transition_meta', 'display_career_transition_meta_no_link');


// Shortcode to display Author, updated date/time, and reading time for 'companies' post type
function display_companies_meta()
{
    if (is_singular('companies')) { // Check if it's a single Companies page
        $author = get_field('author'); // Get the Author relationship field
        $updated_date = get_the_modified_date('M j, Y \a\t h:i A'); // Get the last updated date/time

        // Start building the output
        $output = '<div class="companies-meta">';
        $output .= 'Last updated by ';

        if ($author) {
            foreach ($author as $single_author) {
                $author_name = get_the_title($single_author);
                $output .= esc_html($author_name); // Add plain text for Author
            }
        } else {
            $output .= '';
        }

        $output .= ' on ' . esc_html($updated_date);
        $output .= '</div>';
        return $output;
    }
    return '';
}
add_shortcode('display_companies_meta', 'display_companies_meta');





// Shortcode to display Author, updated date/time, and reading time for "Learn" post type
function display_learn_meta_no_link()
{
    if (is_singular('learn')) { // Check if it's a single Learn page
        $author = get_field('author'); // Get the Author relationship field
        $updated_date = get_the_modified_date('M j, Y \a\t h:i A'); // Get the last updated date/time

        // Start building the output
        $output = '<div class="learn-meta">';
        $output .= 'Last updated by ';

        if ($author) {
            foreach ($author as $single_author) {
                $author_name = get_the_title($single_author);
                $output .= esc_html($author_name); // Add plain text for Author
            }
        } else {
            $output .= '';
        }

        $output .= ' on ' . esc_html($updated_date);
        $output .= '</div>';
        return $output;
    }
    return '';
}
add_shortcode('display_learn_meta', 'display_learn_meta_no_link');



// Shortcode to display the last updated date for "Learn" post type
function display_learn_last_updated_date()
{
    if (is_singular('learn')) { // Check if it's a single Learn page
        $updated_date = get_the_modified_date('F j, Y'); // Format: November 10, 2024

        // Build the output
        $output = '<div class="learn-last-updated">';
        $output .= 'Last updated on: ' . esc_html($updated_date);
        $output .= '</div>';

        return $output;
    }
    return '';
}
add_shortcode('display_learn_last_updated', 'display_learn_last_updated_date');


// Add webnear from to the footer
function webnear_from()
{
    if (!is_page("3999") && !is_page("12916")) {
        echo do_shortcode('[elementor-template id="10247"]');
		echo do_shortcode('[elementor-template id="37660"]');
    }
    //AI Salary Page
    if (is_page([34455, 34605])) {
        echo '<div id="delayed-elementor-popup" style="display: none;">';
        echo do_shortcode('[elementor-template id="34420"]');
        echo '</div>';
        echo '<script>
                {
                    const getDataWebNearShowBtn = document.querySelectorAll(`[href="#salary_webinar_form"]`);
                    const getDataWebNearForm = document.querySelector(`.ai_salary_analyzer`);
                    const getDataWebNearFormClose = document.querySelector(`.ai_salary_closed`);
					 const delayesdElementorPopup = document.getElementById("delayed-elementor-popup");
                    for(let eachWebNearBtn of getDataWebNearShowBtn){
                        eachWebNearBtn.addEventListener(`click`, function(e){
                            e.preventDefault();
                            getDataWebNearForm.setAttribute(`show_status`, true);
							delayesdElementorPopup.style.display = `block`;
                        })
                    }
                    getDataWebNearFormClose.addEventListener(`click`, function(){
                        getDataWebNearForm.setAttribute(`show_status`, false);
                    })
					
                }
            </script>';
    }
	//Big Tech Landing Page 
    if (is_page(39396)) {
        
        echo do_shortcode('[elementor-template id="39746"]');
        echo '<script>
                {
                    const getDataWebNearShowBtn = document.querySelectorAll(`[href="#big_tech_form"]`);
                    const getDataWebNearForm = document.querySelector(`.big_tech_roadmap`);
                    const getDataWebNearFormClose = document.querySelector(`.big_tech_closed`);
                    for(let eachWebNearBtn of getDataWebNearShowBtn){
                        eachWebNearBtn.addEventListener(`click`, function(e){
                            e.preventDefault();
                            getDataWebNearForm.setAttribute(`show_status`, true);
                        })
                    }
                    getDataWebNearFormClose.addEventListener(`click`, function(){
                        getDataWebNearForm.setAttribute(`show_status`, false);
                    })
					
                }
            </script>';
    }


    //Big Tech Roadmap Page
    if (is_page([36478, 39846,39396])) {
        echo '<div id="delayed-elementor-popup" style="display: none;">';
        echo do_shortcode('[elementor-template id="34420"]');
        echo '</div>';
        echo '<script>
                {
                    const getDataWebNearShowBtn = document.querySelectorAll(`[href="#salary_webinar_form"]`);
                    const getDataWebNearForm = document.querySelector(`.ai_salary_analyzer`);
                    const getDataWebNearFormClose = document.querySelector(`.ai_salary_closed`);
					 const delayesdElementorPopup = document.getElementById("delayed-elementor-popup");
                    for(let eachWebNearBtn of getDataWebNearShowBtn){
                        eachWebNearBtn.addEventListener(`click`, function(e){
                            e.preventDefault();
                            getDataWebNearForm.setAttribute(`show_status`, true);
							delayesdElementorPopup.style.display = `block`;
                        })
                    }
                    getDataWebNearFormClose.addEventListener(`click`, function(){
                        getDataWebNearForm.setAttribute(`show_status`, false);
                    })
					
                }
            </script>';
    }
    if (is_page([30086, 31596])) {
        echo '<div id="delayed-elementor-popup" style="display: none;">';
        echo do_shortcode('[elementor-template id="30803"]');
        echo '</div>';

        echo '<script>
                {
                    const getDataWebNearShowBtn = document.querySelectorAll(`[href="#data_webinar_form"]`);
                    const getDataWebNearForm = document.querySelector(`.data_en_wb`);
                    const getDataWebNearFormClose = document.querySelector(`.data_web_near_close`);
                    const delayesdElementorPopup = document.getElementById("delayed-elementor-popup");
                    for(let eachWebNearBtn of getDataWebNearShowBtn){
                        eachWebNearBtn.addEventListener(`click`, function(e){
                            e.preventDefault();
                            getDataWebNearForm.setAttribute(`show_status`, true);
                            delayesdElementorPopup.style.display = `block`;
                        })
                    }
                    getDataWebNearFormClose.addEventListener(`click`, function(){
                        getDataWebNearForm.setAttribute(`show_status`, false);
                    })
					
                }
            </script>';
    }
	// AI News letter
	if (is_page('35536')) {
        echo do_shortcode('[elementor-template id="35772"]');
        echo '<script>
                {
                    const getDataWebNearShowBtn = document.querySelectorAll(`[href="#data_webinar_form"]`);
                    const getDataWebNearForm = document.querySelector(`.data_en_wb`);
                    const getDataWebNearFormClose = document.querySelector(`.data_web_near_close`);
                    for(let eachWebNearBtn of getDataWebNearShowBtn){
                        eachWebNearBtn.addEventListener(`click`, function(e){
                            e.preventDefault();
                            getDataWebNearForm.setAttribute(`show_status`, true);
                        })
                    }
                    getDataWebNearFormClose.addEventListener(`click`, function(){
                        getDataWebNearForm.setAttribute(`show_status`, false);
                    })
					
                }
            </script>';
    }
//Unsubscribe Page
	if (is_page('38736')) {
        echo do_shortcode('[elementor-template id="51527"]');
		 echo '<script>
                {   
					const getDataWebNearForm = document.querySelector(`.data_en_wb`);
					const getDataWebNearFormClose = document.querySelector(`.data_web_near_close`);
                    getDataWebNearFormClose.addEventListener(`click`, function(){
                        getDataWebNearForm.setAttribute(`show_status`, false);
                    })
					
                }
            </script>';
    }
    if (strpos($_SERVER['REQUEST_URI'], '/blogs/') !== false) {
        echo do_shortcode('[elementor-template id="20452"]');
        echo do_shortcode('[elementor-template id="31798"]');
    }

    $page_ids = [32187, 32659, 32446, 40435, 40611, 40723];

    if (is_page($page_ids)) {
        echo do_shortcode('[elementor-template id="32238"]');
        echo '<script>
                {
                    const getDataWebNearShowBtn = document.querySelectorAll(`[href="#data_webinar_form"]`);
                    const getDataWebNearForm = document.querySelector(`.data_en_wb`);
                    const getDataWebNearFormClose = document.querySelector(`.data_web_near_close`);
                    for(let eachWebNearBtn of getDataWebNearShowBtn){
                        eachWebNearBtn.addEventListener(`click`, function(e){
                            e.preventDefault();
                            getDataWebNearForm.setAttribute(`show_status`, true);
                        })
                    }
                    getDataWebNearFormClose.addEventListener(`click`, function(){
                        getDataWebNearForm.setAttribute(`show_status`, false);
                    })
                }
            </script>';
    }


    if (is_page('48055')) {
        echo do_shortcode('[elementor-template id="48401"]');
        echo '<script>
                {
                    const getDataWebNearShowBtn = document.querySelectorAll(`[href="#data_webinar_form"]`);
                    const getDataWebNearForm = document.querySelector(`.data_en_wb`);
                    const getDataWebNearFormClose = document.querySelector(`.data_web_near_close`);
                    for(let eachWebNearBtn of getDataWebNearShowBtn){
                        eachWebNearBtn.addEventListener(`click`, function(e){
                            e.preventDefault();
                            getDataWebNearForm.setAttribute(`show_status`, true);
                        })
                    }
                    getDataWebNearFormClose.addEventListener(`click`, function(){
                        getDataWebNearForm.setAttribute(`show_status`, false);
                    })
                }
            </script>';
    }


    if (is_singular('masterclass')) {
		$terms = wp_get_post_terms( get_the_ID(), 'masterclass-category' );
		
		if ( empty( $terms ) || is_wp_error( $terms ) ) return ;
		$template_print_status = false;
		foreach ( $terms as $term ) {
			if($term->slug === 'on-demand'){
				echo do_shortcode('[elementor-template id="32334"]');
				$template_print_status = true;
				break;
			}elseif($term->slug === 'live'){
// 				echo do_shortcode('[elementor-template id="44777"]');
				echo do_shortcode('[elementor-template id="46557"]');
				$template_print_status = true;
				break;
			}
		}
        if(!$template_print_status) return;
        echo '<script>
                {
                    const getDataWebNearShowBtn = document.querySelectorAll(`[href="#data_webinar_form"]`);
                    const getDataWebNearForm = document.querySelector(`.data_en_wb`);
                    const getDataWebNearFormClose = document.querySelector(`.data_web_near_close`);
                    for(let eachWebNearBtn of getDataWebNearShowBtn){
                        eachWebNearBtn.addEventListener(`click`, function(e){
                            e.preventDefault();
                            getDataWebNearForm.setAttribute(`show_status`, true);
                        })
                    }
                    getDataWebNearFormClose.addEventListener(`click`, function(){
                        getDataWebNearForm.setAttribute(`show_status`, false);
                    })
                }
            </script>';
    	
	}
	
	if (is_singular('ai-masterclass')) {
		if(is_single([42078])){
			echo do_shortcode('[elementor-template id="41981"]');
		}else{
			echo do_shortcode('[elementor-template id="48855"]');
		}
        echo '<script>
                {
                    const getDataWebNearShowBtn = document.querySelectorAll(`[href="#data_webinar_form"]`);
                    const getDataWebNearForm = document.querySelector(`.data_en_wb`);
                    const getDataWebNearFormClose = document.querySelector(`.data_web_near_close`);
                    for(let eachWebNearBtn of getDataWebNearShowBtn){
                        eachWebNearBtn.addEventListener(`click`, function(e){
                            e.preventDefault();
                            getDataWebNearForm.setAttribute(`show_status`, true);
                        })
                    }
                    getDataWebNearFormClose.addEventListener(`click`, function(){
                        getDataWebNearForm.setAttribute(`show_status`, false);
                    })
                }
            </script>';
    }
	
	
    if (is_page([41646])) {
        echo do_shortcode('[elementor-template id="41981"]');
        echo '<script>
                {
                    const getDataWebNearShowBtn = document.querySelectorAll(`[href="#data_webinar_form"]`);
                    const getDataWebNearForm = document.querySelector(`.data_en_wb`);
                    const getDataWebNearFormClose = document.querySelector(`.data_web_near_close`);
                    for(let eachWebNearBtn of getDataWebNearShowBtn){
                        eachWebNearBtn.addEventListener(`click`, function(e){
                            e.preventDefault();
                            getDataWebNearForm.setAttribute(`show_status`, true);
                        })
                    }
                    getDataWebNearFormClose.addEventListener(`click`, function(){
                        getDataWebNearForm.setAttribute(`show_status`, false);
                    })
                }
            </script>';
    }
	
	
	// 	P: 137	AI Launchpad Start
    if (is_page([42729])) {
        echo do_shortcode('[elementor-template id="43129"]');
        echo '<script>
                {
                    const getDataWebNearShowBtn = document.querySelectorAll(`[href="#data_webinar_form"]`);
                    const getDataWebNearForm = document.querySelector(`.data_en_wb`);
                    const getDataWebNearFormClose = document.querySelector(`.data_web_near_close`);
                    for(let eachWebNearBtn of getDataWebNearShowBtn){
                        eachWebNearBtn.addEventListener(`click`, function(e){
                            e.preventDefault();
                            getDataWebNearForm.setAttribute(`show_status`, true);
                        })
                    }
                    getDataWebNearFormClose.addEventListener(`click`, function(){
                        getDataWebNearForm.setAttribute(`show_status`, false);
                    })
                }
            </script>';
    }
	// 	P: 137	AI Launchpad End
	// 	P: 146	AI Launchpad 2 Start
    if (is_page([46259])) {
        echo do_shortcode('[elementor-template id="46263"]');
        echo '<script>
                {
                    const getDataWebNearShowBtn = document.querySelectorAll(`[href="#data_webinar_form"]`);
                    const getDataWebNearForm = document.querySelector(`.data_en_wb`);
                    const getDataWebNearFormClose = document.querySelector(`.data_web_near_close`);
                    for(let eachWebNearBtn of getDataWebNearShowBtn){
                        eachWebNearBtn.addEventListener(`click`, function(e){
                            e.preventDefault();
                            getDataWebNearForm.setAttribute(`show_status`, true);
                        })
                    }
                    getDataWebNearFormClose.addEventListener(`click`, function(){
                        getDataWebNearForm.setAttribute(`show_status`, false);
                    })
                }
            </script>';
    }
	// 	P: 146	AI Launchpad 2 End
	
	// IP Event
	if (is_page([46166,46624])) {
        echo do_shortcode('[elementor-template id="46250"]');
        echo '<script>
                {
                    const getDataWebNearShowBtn = document.querySelectorAll(`[href="#data_webinar_form"]`);
                    const getDataWebNearForm = document.querySelector(`.data_en_wb`);
                    const getDataWebNearFormClose = document.querySelector(`.data_web_near_close`);
                    for(let eachWebNearBtn of getDataWebNearShowBtn){
                        eachWebNearBtn.addEventListener(`click`, function(e){
                            e.preventDefault();
                            getDataWebNearForm.setAttribute(`show_status`, true);
                        })
                    }
                    getDataWebNearFormClose.addEventListener(`click`, function(){
                        getDataWebNearForm.setAttribute(`show_status`, false);
                    })
                }
            </script>';
    }
	
	//AI FOR MARKETING
	if (is_page([46307])) {
        echo do_shortcode('[elementor-template id="46575"]');
        echo '<script>
                {
                    const getDataWebNearShowBtn = document.querySelectorAll(`[href="#data_webinar_form"]`);
                    const getDataWebNearForm = document.querySelector(`.data_en_wb`);
                    const getDataWebNearFormClose = document.querySelector(`.data_web_near_close`);
                    for(let eachWebNearBtn of getDataWebNearShowBtn){
                        eachWebNearBtn.addEventListener(`click`, function(e){
                            e.preventDefault();
                            getDataWebNearForm.setAttribute(`show_status`, true);
                        })
                    }
                    getDataWebNearFormClose.addEventListener(`click`, function(){
                        getDataWebNearForm.setAttribute(`show_status`, false);
                    })
                }
            </script>';
    }
	// 	P: 137	reinvent2026
    if (is_page([50571])) {
        echo do_shortcode('[elementor-template id="50643"]');
        echo '<script>
                {
                    const getDataWebNearShowBtn = document.querySelectorAll(`[href="#data_webinar_form"]`);
                    const getDataWebNearForm = document.querySelector(`.data_en_wb`);
                    const getDataWebNearFormClose = document.querySelector(`.data_web_near_close`);
                    for(let eachWebNearBtn of getDataWebNearShowBtn){
                        eachWebNearBtn.addEventListener(`click`, function(e){
                            e.preventDefault();
                            getDataWebNearForm.setAttribute(`show_status`, true);
                        })
                    }
                    getDataWebNearFormClose.addEventListener(`click`, function(){
                        getDataWebNearForm.setAttribute(`show_status`, false);
                    })
                }
            </script>';
    }
    if (is_page([52668])) {
        echo do_shortcode('[elementor-template id="52697"]');
        echo '<script>
                {
                    const getDataWebNearShowBtn = document.querySelectorAll(`[href="#data_webinar_form"]`);
                    const getDataWebNearForm = document.querySelector(`.data_en_wb`);
                    const getDataWebNearFormClose = document.querySelector(`.data_web_near_close`);
                    for(let eachWebNearBtn of getDataWebNearShowBtn){
                        eachWebNearBtn.addEventListener(`click`, function(e){
                            e.preventDefault();
                            getDataWebNearForm.setAttribute(`show_status`, true);
                        })
                    }
                    getDataWebNearFormClose.addEventListener(`click`, function(){
                        getDataWebNearForm.setAttribute(`show_status`, false);
                    })
                }
            </script>';
    }
	

}

add_action('wp_footer', 'webnear_from');

// Filter Review Serial

add_action('elementor/query/review_query', function ($query) {
    $query->set('post_type', 'review');
    $query->set('meta_key', 'display_order');
    $query->set('orderby', 'meta_value_num'); // Order by numeric value of display_order
    $query->set('order', 'ASC'); // Ascending order
});

// Add Global Variable
function add_global_variable()
{
    $webinar_type = get_post_meta(get_the_ID(), 'webinar_type', true);
    $slot_type = get_post_meta(get_the_ID(), 'slot_type', true);
	$event_name = get_post_meta(get_the_ID(), 'event_name', true);
	$is_dual_webinar_type = get_post_meta(get_the_ID(), 'IS_DUAL_WEBINAR_TYPE', true);
	$lead_magnet = get_post_meta(get_the_ID(), 'lead_magnet_value', true);
	$instructor_details = get_post_meta(get_the_ID(), 'instructor_details', true);
	$is_masterclass = (is_singular('masterclass') && has_term('live', 'masterclass-category')) ? 'true' : 'false';
	$program_name = get_post_meta(get_the_ID(), 'program_name', true);
    if (!$webinar_type) $webinar_type = "REGULAR";
    echo "
        <script>
            let webinarType = '{$webinar_type}';
            let slotType = '{$slot_type}';
			let leadMagnet = '{$lead_magnet}';
			let pageEnventName = '{$event_name}'.trim();
			let IS_DUAL_WEBINAR_TYPE = '{$is_dual_webinar_type}';
			let instructorDetails = '{$instructor_details}';
			let isMasterclass = {$is_masterclass};
			let programName = '{$program_name}';
        </script>
    ";
}

add_action("wp_head", "add_global_variable");

// slug 

function update_blog_rewrite_rules($args, $post_type)
{
    $target_post_types = ['articles', 'interview-questions', 'problems', 'learn', 'companies', 'career-advice'];

    if (in_array($post_type, $target_post_types)) {
        $args['rewrite'] = [
            'slug' => 'blogs/' . $post_type,
            'with_front' => false
        ];
    }

    return $args;
}
add_filter('register_post_type_args', 'update_blog_rewrite_rules', 10, 2);

// Page title

function post_title_shortcode($atts)
{
    $atts = shortcode_atts(array(
        'id' => get_the_ID(),
    ), $atts, 'post_title');

    $post_title = get_the_title($atts['id']);
    return $post_title;
}
add_shortcode('post_title', 'post_title_shortcode');



// Page Slug

function get_page_slug_shortcode()
{
    global $post;

    if (is_object($post) && isset($post->post_name)) {
        return $post->post_name;
    }

    return '';
}
add_shortcode('page_slug', 'get_page_slug_shortcode');

function add_geo_json_to_frontend()
{
    // Get client IP
    $ip = $_SERVER['REMOTE_ADDR'];

    // Fetch geolocation data from GeoJS
    $geo_url = "https://get.geojs.io/v1/ip/geo/{$ip}.json";
    $geo_data = wp_remote_get($geo_url);

    // Decode response
    if (!is_wp_error($geo_data) && !empty($geo_data['body'])) {
        $geo_info = json_decode($geo_data['body'], true);
        $geo_json = json_encode($geo_info, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    } else {
        $geo_json = json_encode(["error" => "Unable to retrieve geolocation data"]);
    }

    // Add hidden input field with geolocation data
    echo "<input type='hidden' id='geo-data' value='" . esc_attr($geo_json) . "'>";
}

// Hook into WordPress footer
add_action('wp_footer', 'add_geo_json_to_frontend');

function display_acf_body_content() {
    $body_content = get_field('body');

    if ($body_content) {
        return '<div class="acf-body-content">' . $body_content . '</div>';
    } else {
        return '<div class="acf-body-content">No content available.</div>';
    }
}
add_shortcode('acf_body', 'display_acf_body_content');
add_filter('http_api_debug', function($response, $context, $class, $args, $url) {
    error_log("HTTP API Debug: " . print_r($args, true));
}, 10, 5);


add_action('wp_ajax_resume_api', 'handle_proxy_resume_api');
add_action('wp_ajax_nopriv_resume_api', 'handle_proxy_resume_api');

function handle_proxy_resume_api() {
    $api_url = 'https://0th2m8jcj2.execute-api.us-west-1.amazonaws.com/qa/resume/job-roles';

    // Expect JSON string from POST param 'data'
        $payload = json_decode(file_get_contents('php://input'), true);
    if (empty($payload)) {
        wp_send_json_error(['message' => 'Invalid or empty payload.'], 400);
    }

    $args = [
        'headers' => [
            'Content-Type' => 'application/json',
            'x-api-key' => 'Q6XgZ2uukP7BLeDGIP1467PKHOjMsLRs2VL9E53q',
            'Workflow'    => 'RESUME_ANALYSIS_SU',
        ],
        'body'    => wp_json_encode($payload),
        'method'  => 'POST',
        'timeout' => 20,
    ];

    $response = wp_remote_post($api_url, $args);

    if (is_wp_error($response)) {
        wp_send_json_error(['message' => 'Server request failed.', 'error' => $response->get_error_message()], 500);
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    if (isset($data['error'])) {
        wp_send_json_error(['message' => $data['error']], 400);
    }

    wp_send_json_success($data);
}

// Hook into WordPress AJAX action (both logged-in and not logged-in users)
add_action('wp_ajax_send_gql_payload', 'send_gql_payload'); // For logged-in users
add_action('wp_ajax_nopriv_send_gql_payload', 'send_gql_payload'); // For non-logged-in users

function send_gql_payload()
{
    // Retrieve the posted data
    $email = sanitize_email($_POST['email']);
    $full_name = sanitize_text_field($_POST['name']);
    $phone_number = sanitize_text_field($_POST['phone_number']);
    $session_id = sanitize_text_field($_POST['session_id']);
    $uuid = sanitize_text_field($_POST['uuid']);
    $domain = sanitize_text_field($_POST['domain']);
    $experience = sanitize_text_field($_POST['experience']);
    $country = sanitize_text_field($_POST['country']);
    $timezone = sanitize_text_field($_POST['timezone']);
    $linkedin_id = sanitize_text_field($_POST['linkedin_url']);
    $utm_params = array(
        'utm_source' => sanitize_text_field($_POST['utm_source'] ?? ''),
        'utm_medium' => sanitize_text_field($_POST['utm_medium'] ?? ''),
        'utm_campaign' => sanitize_text_field($_POST['utm_campaign'] ?? ''),
        'utm_term' => sanitize_text_field($_POST['utm_term'] ?? ''),
        'utm_content' => sanitize_text_field($_POST['utm_content'] ?? '')
    );
    // Prepare the payload
    $gql_payload = array(
        'email' => $email,
        'name' => $full_name,
        'phone_number' => $phone_number,
        'session_id' => $session_id,
        'uuid' => $uuid,
        'domain' => $domain,
        'experience' => $experience,
        'country' => $country,
        'timezone' => $timezone,
        'linkedin_url' => $linkedin_id,
        'workflow' => "RESUME_ANALYSIS_SU",
        'utm_params' => $utm_params
    );

    // API URL and key
    $api_url = 'https://0th2m8jcj2.execute-api.us-west-1.amazonaws.com/qa/resume/gql';
    $api_key = 'Q6XgZ2uukP7BLeDGIP1467PKHOjMsLRs2VL9E53q';

    // Make the API request
    $response = wp_remote_post($api_url, array(
        'headers' => array(
            'Content-Type' => 'application/json',
            'x-api-key' => $api_key
        ),
        'body' => json_encode($gql_payload)
    ));

    // Check for error
    if (is_wp_error($response)) {
        wp_send_json_error(array('message' => 'API request failed.'));
    }

    $response_body = wp_remote_retrieve_body($response);
    $data = json_decode($response_body, true);

    if (isset($data['error'])) {
        wp_send_json_error(['message' => $data['error']], 400);
    }

    wp_send_json_success($data);
}

// add_filter('http_api_debug', function($response, $context, $class, $args, $url) {
//     error_log("HTTP API Debug: " . print_r($args, true));
// }, 10, 5);


add_action('wp_ajax_poll_resume_analysis', 'handle_poll_resume_analysis');
add_action('wp_ajax_nopriv_poll_resume_analysis', 'handle_poll_resume_analysis');

function handle_poll_resume_analysis()
{
    $uuid = isset($_GET['uuid']) ? sanitize_text_field($_GET['uuid']) : '';
    if (!$uuid) {
        wp_send_json_error(['message' => 'Missing UUID']);
    }

    $api_key = 'Q6XgZ2uukP7BLeDGIP1467PKHOjMsLRs2VL9E53q';
    $url = "https://0th2m8jcj2.execute-api.us-west-1.amazonaws.com/qa/resume/poll?uuid={$uuid}&api=RESUME_ANALYSIS";

    $response = wp_remote_get($url, [
        'headers' => [
            'x-api-key' => $api_key
        ]
    ]);
	
	//error_log("Response API Key: " . print_r($response, true));

    if (is_wp_error($response)) {
        wp_send_json_error(['message' => 'API request failed']);
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    wp_send_json_success($data);
}

//Interview Questions redirect

add_action('template_redirect', function() {
    if (is_404() && strpos($_SERVER['REQUEST_URI'], '/blogs/interview-questions/') !== false) {
        wp_redirect(home_url('/blogs/interview-questions/'), 301);
        exit;
    }
});



add_action('save_post', 'regenerate_elementor_css_and_purge_nitropack', 20, 2);

function regenerate_elementor_css_and_purge_nitropack($post_id, $post)
{
    if (wp_is_post_autosave($post_id) || wp_is_post_revision($post_id)) {
        return;
    }

    // Only proceed if Elementor data exists
    $has_elementor_data = get_post_meta($post_id, '_elementor_data', true);
    if (empty($has_elementor_data)) {
        return;
    }

    // Path to Elementor CSS file
    $upload_dir = wp_upload_dir();
    $css_file_path = trailingslashit($upload_dir['basedir']) . "elementor/css/post-{$post_id}.css";

    // Check if CSS file already exists
    if (!file_exists($css_file_path)) {
        if (function_exists('\Elementor\Plugin')) {
            $elementor = \Elementor\Plugin::instance();
            $elementor->files_manager->clear_cache();
            $elementor->files_manager->remove_post_css($post_id);
            $elementor->files_manager->generate_post_css($post_id);
        }
    }

    // 2. Purge NitroPack cache for this page
    $url = get_permalink($post_id);

    if (function_exists('nitropack_sdk_purge')) {
        nitropack_sdk_purge($url, null, 'Elementor Update: hard cache removed');
    }

    // 3. Warm the page so CSS is re-cached properly
    $response = wp_remote_get($url);

    if (is_wp_error($response)) {
        error_log('Error warming cache for URL: ' . $url . ' — ' . $response->get_error_message());
    } else {
        $status_code = wp_remote_retrieve_response_code($response);
        $body = wp_remote_retrieve_body($response);
        error_log('Cache warm status for ' . $url . ': HTTP ' . $status_code);
        // Optional: log body for debugging
        // error_log( 'Response body: ' . $body );
    }

}




// Master class archive

$selected_posts = [];
add_action( "wp_head", "getMasterClassPostId");

add_action('elementor/query/live_masterclass', function( $query ){
	global $selected_posts;
	$post_show = empty($selected_posts) ? [0] : $selected_posts;
	$query->set('post__in', $post_show);
});

add_action('elementor/query/recorded_masterclasses', function( $query ){
	global $selected_posts;
	$query->set('post__not_in', $selected_posts);
});

function getMasterClassPostId() {

	global $selected_posts;
    $args = [
        'post_type'      => 'masterclass',
        'posts_per_page' => -1,
        'post_status'    => 'publish'
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
				
            $query->the_post();
            $post_id = get_the_ID();
            $question = get_post_meta($post_id, 'event_time', true);
       
            $isTakeThis = isFutureDateInString($question);
            if($isTakeThis == true){
                $selected_posts[] = $post_id;
            }
        }
        wp_reset_postdata();
    }
}


function isFutureDateInString($str) {
    $patterns = [
        '/(\d{1,2}\s+[A-Za-z]{3,9},?\s+\d{1,2}:\d{2}\s*(AM|PM))/i',
        '/(\d{1,2}[\/\-]\d{1,2}[\/\-]\d{2,4}[ T]?\d{1,2}:\d{2})/',
        '/([A-Za-z]{3,9}\s+\d{1,2},?\s+\d{4}\s+\d{1,2}:\d{2}\s*(AM|PM))/i',
        '/(\d{4}-\d{2}-\d{2}[ T]\d{2}:\d{2})/',
        '/(\d{1,2}[\s\-\/][A-Za-z]{3,9}(?:[\s\-\/]\d{4})?).*?(\d{1,2}:\d{2}\s*(?:AM|PM)?)/i',
    ];

    foreach ($patterns as $pattern) {
        if (preg_match($pattern, $str, $matches)) {
            $dateStr = (count($matches) >= 3 && strpos($pattern, '.*?') !== false)
                ? $matches[1] . ' ' . $matches[2]
                : $matches[1];

            try {
                $date = new DateTime($dateStr);
                $now = new DateTime();
                return $date > $now;
            } catch (Exception $e) {
                return null; // invalid date
            }
        }
    }

    return null; // no date found 
}





// Add a new column to the All Pages list
add_filter('manage_page_posts_columns', function($columns) {
    $columns['webinar_type'] = 'Webinar Type';
    return $columns;
});

// Display the ACF field value in the new column
add_action('manage_page_posts_custom_column', function($column, $post_id) {
    if ($column === 'webinar_type') {
        $value = get_field('webinar_type', $post_id);
        echo esc_html($value ?: '—'); // Show "—" if empty
    }
}, 10, 2);

//inaccessible to anonymous users
// add_filter('rest_authentication_errors', function ($result) {
//     if (true === $result || is_wp_error($result)) {
//         return $result;
//     }

//     // Allow specific REST route(s)
//     $allowed_routes = [
//         '/elementor-pro/v1/refresh-loop',
//     ];

//     $request_uri = $_SERVER['REQUEST_URI'];

//     foreach ($allowed_routes as $route) {
//         if (strpos($request_uri, $route) !== false) {
//             return $result; // Skip login requirement for this route
//         }
//     }

//     if (!is_user_logged_in()) {
//         return new WP_Error(
//             'rest_not_logged_in',
//             'You must be logged in to access the REST API',
//             array('status' => 401)
//         );
//     }

//     return $result;
// });


// Shortcode to display categories of the current post
function ik_post_categories_shortcode() {
    global $post;
    if ( ! $post ) return '';
    // Get categories of the current post
    $categories = get_the_category( $post->ID );
    if ( empty( $categories ) ) return '';
    // Extract category names
   $category_links = array();
foreach ( $categories as $cat ) {
    $category_links[] = '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a>';
}
return '<span class="ik-categories">' . implode( '<span class="separator"> > </span>', $category_links ) . '</span>';
}
add_shortcode( 'post_categories', 'ik_post_categories_shortcode' );




function bh_remove_expired_live_masterclass() {
    $args = [
        'post_type'      => 'masterclass',
        'posts_per_page' => -1,
        'tax_query'      => [
            [
                'taxonomy' => 'masterclass-category',
                'field'    => 'slug',
                'terms'    => 'live',
            ],
        ],
        'post_status'    => 'publish',
        'fields'         => 'ids', 
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $now = current_time('timestamp');

        foreach ($query->posts as $post_id) {
            $event_date = get_post_meta($post_id, 'event_date_and_time', true);

            if (empty($event_date)) {
                // No event date → remove from "live"
                wp_remove_object_terms($post_id, 'live', 'masterclass-category');
                continue;
            }

            $event_timestamp = strtotime($event_date);

            if ($event_timestamp === false || $event_timestamp < $now) {
                // Invalid or past date → remove from "live"
                wp_remove_object_terms($post_id, 'live', 'masterclass-category');
            }
        }
    }

    wp_reset_postdata();
}
add_action('template_redirect', 'bh_remove_expired_live_masterclass');



function update_ab_config($request) {
    $config = $request->get_json_params();
    $config_file = WP_CONTENT_DIR . '/ab-config.json';
    $result = file_put_contents($config_file, json_encode($config));
    if ($result === false) {
        return new WP_REST_Response(['error' => 'Failed to save configuration'], 500);
    }
//     if (function_exists('nitropack_sdk_purge')) {
//         nitropack_sdk_purge(NULL, NULL, 'ab-config updated');
//     }
    return new WP_REST_Response(['status' => 'success'], 200);
}

add_action('rest_api_init', function() {
    register_rest_route('ab-config/v1', '/update', [
        'methods' => 'POST',
        'callback' => 'update_ab_config',
        'permission_callback' => function() {
            return current_user_can('manage_options');
        }
    ]);
});


function render_ab_config() {
    $config_file = WP_CONTENT_DIR . '/ab-config.json';
    if (!file_exists($config_file)) {
        echo "<script nitro-exclude>window.ABConfig = {};</script>";
        return;
    }
    $config_content = file_get_contents($config_file);
    echo "<script nitro-exclude>window.ABConfig = {$config_content};</script>";
}
add_action('wp_head', 'render_ab_config', 1);




add_action('wp_head', function () {

    // Safety guards
    if (
        is_admin() ||
        wp_doing_ajax() ||
        is_feed() ||
        is_preview()
    ) {
        return;
    }

    // Approved hreflang slug allowlist
    $allowed_paths = [
        '/',
        '/instructors/',
        '/contact-us/',
        '/privacy-policy/',
        '/careers/',
        '/about-us/',
        '/reviews/',
        '/courses/technical-product-manager-interview-masterclass/',
        '/courses/early-engineering-interview-masterclass/',
        '/courses/cloud-engineering-interview-masterclass/',
        '/courses/data-science-interview-masterclass/',
        '/courses/engineering-manager-interview-masterclass/',
        '/courses/android-engineering-interview-masterclass/',
        '/courses/embedded-software-engineering-interview-masterclass/',
        '/courses/data-engineering-interview-masterclass/',
        '/courses/test-engineering-interview-masterclass/',
        '/courses/security-engineering-interview-masterclass/',
        '/courses/machine-learning-interview-masterclass/',
        '/courses/technical-program-manager-interview-masterclass/',
        '/courses/site-reliability-engineering-interview-masterclass/',
        '/courses/full-stack-engineering-interview-masterclass/',
        '/courses/back-end-engineering-interview-masterclass/',
        '/courses/ios-engineering-interview-masterclass/',
    ];

    $request_path = trailingslashit(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

    // HARD STOP: no global hreflang
    if (!in_array($request_path, $allowed_paths, true)) {
        return;
    }

    // STAGING URLs (fully reciprocal)
    $us_url = 'https://staging-07b2-interviewkickstart.wpcomstaging.com' . untrailingslashit($request_path);
    $in_url = 'https://staging-4eb7-ininterviewkickstart.wpcomstaging.com' . untrailingslashit($request_path);

    echo "\n<!-- hreflang: USA staging (reciprocal) -->";
    echo "\n<link rel=\"alternate\" hreflang=\"en-us\" href=\"" . esc_url($us_url) . "\" />";
    echo "\n<link rel=\"alternate\" hreflang=\"en-in\" href=\"" . esc_url($in_url) . "\" />";
    echo "\n<link rel=\"alternate\" hreflang=\"x-default\" href=\"" . esc_url($us_url) . "\" />\n";

}, 1);

add_action('wp_head', function () {

    // Rank Math hreflang (if present)
    remove_action('wp_head', 'rank_math_the_hreflang', 10);

    // WPML / Polylang safety (even if not installed)
    remove_action('wp_head', 'wpml_add_hreflang', 10);
    remove_action('wp_head', 'pll_rel_hreflang', 10);

}, 0);

/**
 * Noindex all WordPress feeds (RSS / Atom)
 */
add_action('template_redirect', function () {
    if (is_feed()) {
        header('X-Robots-Tag: noindex, follow', true);
    }
}, 1);


add_action('parse_request', function ($wp) {

    if (is_admin()) {
        return;
    }

    $path = trim($wp->request ?? '', '/');

    // Kill all HTML sitemap URLs
    if (preg_match('/sitemap.*\.html$/i', $path)) {
        header('HTTP/1.1 410 Gone');
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('Pragma: no-cache');
        exit;
    }

});


<?php
/**
 * Add mime types
 *
 * @param $existing_mimes
 * @return mixed
 */
if( ! function_exists( 'theme_mime_types' ) ){
    function theme_mime_types( $existing_mimes ) {
        $existing_mimes['webp']     = 'video/webp';
        $existing_mimes['svg']      = 'image/svg+xml';
        $existing_mimes['svgz']     = 'image/svg+xml';

        return $existing_mimes;
    }
    add_filter( 'upload_mimes', 'theme_mime_types' );
}

/**
 * Remove [] from the_excerpt();
 *
 * @param $more
 * @return string
 */
if( ! function_exists( 'theme_excerpt_more' ) ) {
    function theme_excerpt_more( $more ) {
        return '...';
    }
    add_filter( 'excerpt_more', 'theme_excerpt_more' );
}

/**
 * Add special classes to pages
 *
 * @param $classes
 * @return mixed
 */
if( ! function_exists( 'theme_body_class' ) ) {
    function theme_body_class( $classes ) {
        if( is_home() ) $classes[] = 'home';

        return $classes;
    }
    add_filter( 'body_class', 'theme_body_class' );
}

/**
 * Rename default post type to Blog Posts
 *
 * @param object $labels
 * @hooked post_type_labels_post
 * @return object $labels
 */
if( ! function_exists( 'ds_blog_rename_labels' ) ) {
    function ds_blog_rename_labels($labels)
    {
        $labels->menu_name = 'Blog Posts';
        $labels->all_items = 'All Blog Posts';
        $labels->name_admin_bar = 'Blog Posts';

        return $labels;
    }

    add_filter('post_type_labels_post', 'ds_blog_rename_labels');
}

/**
 * Rename default post type labels
 *
 * @param string $title,
 * @hooked enter_title_here
 * @return string $title
 */
if( ! function_exists( 'ds_blog_new_title_text' ) ) {
    function ds_blog_new_title_text($title, $post)
    {
        if ('post' == $post->post_type) {
            $title = 'Add Headline/H1';
        }

        return $title;
    }

    add_filter('enter_title_here', 'ds_blog_new_title_text', 10, 2);
}

/**
 * Transforms absolute link to relative.
 *
 * @param $results
 * @param $query
 *
 * @return array
 */
if ( !function_exists('custom_wp_link_query') ) {
    add_filter('wp_link_query', 'custom_wp_link_query', 10, 2);
    function custom_wp_link_query($results, $query) {
        $results_filtered = $results;

        if ($results && is_array($results)) {
            $results_filtered = array();
            if (is_multisite()) {
                $site_url = network_site_url();
            } else {
                $site_url = site_url();
            }

            foreach ($results as $result) {
                if (!empty($result['permalink'])) {
                    $result['permalink'] = str_replace($site_url, '', $result['permalink']);
                }
                $results_filtered[] = $result;
            }
        }

        return $results_filtered;
    }
}
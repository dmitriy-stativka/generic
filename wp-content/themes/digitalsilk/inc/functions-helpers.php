<?php
/**
 * Display post excerpt with custom characters amount
 *
 * @returns string
 */
if( ! function_exists( 'ds_the_excerpt' ) ) {
    function ds_the_excerpt( $length = 90, $post_id = NULL ){
        if( !$post_id ) $post_id = get_the_ID();
        if( !$post_id ) return false;

        $page_object = get_post( $post_id );
        echo substr( strip_tags( $page_object->post_content ),0,$length ) . '...';
    }
}

/**
 * Pagination for archive.php templates
 *
 * @returns string
 */
if( ! function_exists( 'ds_pagination' ) ) {
    function ds_pagination(){
        if (is_singular())
            return;

        global $wp_query;

        /** Stop execution if there's only 1 page */
        if ($wp_query->max_num_pages <= 1)
            return;

        $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
        $max = intval($wp_query->max_num_pages);

        /** Add current page to the array */
        if ($paged >= 1)
            $links[] = $paged;

        /** Add the pages around the current page to the array */
        if ($paged >= 3) {
            $links[] = $paged - 1;
            $links[] = $paged - 2;
        }

        if (($paged + 2) <= $max) {
            $links[] = $paged + 2;
            $links[] = $paged + 1;
        }

        echo '<div class="navigation"><ul>' . "\n";

        /** Previous Post Link */
        if (get_previous_posts_link())
            printf('<li class="prev">%s</li>' . "\n", get_previous_posts_link());

        /** Link to first page, plus ellipses if necessary */
        if (!in_array(1, $links)) {
            $class = 1 == $paged ? ' class="active"' : '';

            printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

            if (!in_array(2, $links))
                echo '<li>…</li>';
        }

        /** Link to current page, plus 2 pages in either direction if necessary */
        sort($links);
        foreach ((array)$links as $link) {
            $class = $paged == $link ? ' class="active"' : '';
            printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
        }

        /** Link to last page, plus ellipses if necessary */
        if (!in_array($max, $links)) {
            if (!in_array($max - 1, $links))
                echo '<li>…</li>' . "\n";

            $class = $paged == $max ? ' class="active"' : '';
            printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
        }

        /** Next Post Link */
        if (get_next_posts_link())
            printf('<li class="next">%s</li>' . "\n", get_next_posts_link());

        echo '</ul></div>' . "\n";

    }
}

/**
 * Simple functions to display ACF field type "link"
 *
 * @param $button "acf link field - array"
 * @param $args "attributes array"
 * @param $icon "icon tag"
 * @returns string
 */
if ( ! function_exists( 'acf_button' ) ) {
    function acf_button($button, $args = [], $icon = ''){
        if( !isset($button['title']) && !isset($button['url']) ) return;

        $attrs = '';
        foreach ($args as $attr => $value) {
            $attrs .= $attr . '="' . $value . '"';
        }
        $target = !empty($button['target']) ? 'target="' . $button['target'] . '"' : false;
        return sprintf('<a href="%2$s" %3$s %4$s>%1$s %5$s</a>', $button['title'], $button['url'], $target, $attrs, $icon);
    }
}

/**
 * Drupal Library to display cropped images images
 *
 * @param $options
 * @returns string
 */
if ( ! function_exists( 'ds_image' ) ) {
    function ds_image( $options ) {
        // Set up global image variables
        $width             = ( $options['width'] ? $options['width'] : 800 );
        $height            = ( $options['height'] ? $options['height'] : 500 );
        $class             = ( ! empty( $options['class'] ) ? $options['class'] : '' );
        $altText           = strip_tags( ( $options['alt'] ? $options['alt'] : get_bloginfo( 'name' ) ) );
        $placeholder_image = get_field( 'placeholder_image', 'options' );

        // Set up image
        if ( ! $options['image'] && $placeholder_image ) {
            // if no image specified, output placeholder from options page
            $image = $placeholder_image;

        } else if ( ! $options['image'] && ! $placeholder_image ) {
            // if no image specified, and no placeholder in options page
            $image = get_template_directory_uri() . '/img/placeholder.jpg';

        } else {
            // otherwise specified crop the image and output it
            $imageArray = matthewruddy_image_resize( $options['image'], $width, $height, false, false );
            $image      = $imageArray['url'];
        }
        ?>
        <figure class="img<?php echo $class ? ' ' . $class : ''; ?>"
                style="background-image:url(<?php echo $image; ?>);">
            <img width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="<?php echo $image; ?>"
                 alt="<?php echo $altText; ?>"/>
        </figure>
        <?php
    }
}
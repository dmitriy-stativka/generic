<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DS_Theme
 */

get_header(); ?>

    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post();

            get_template_part( 'templates/content/content', 'archive' );

        endwhile;

        get_template_part( 'templates/parts/pagination', 'archive' );

    else :

        get_template_part( 'templates/content/content', 'none' );

    endif; ?>

<?php get_footer(); ?>
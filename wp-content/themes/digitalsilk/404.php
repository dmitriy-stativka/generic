<?php
/**
 * The template for displaying an 404 page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DS_Theme
 */

get_header(); ?>

<div class="container">

    <div class="page-content error-content">

        <h1 class="page-title"><?php _e( '404', 'dstheme' ); ?></h1>

        <div class="page-sub-title">
            <?php _e( 'Oops! The page you\'re looking for appears to have moved, been deleted or does not exists.', 'dstheme' ); ?>
        </div>

        <div>
            <?php echo  get_search_form(); ?>
        </div>

    </div>
</div>


<?php get_footer(); ?>


<?php
/**
 * Scripts to load page.php instead category archive.php or 404 with same slug and URL hierarchy
 * Taxonomy Term URL /%post_type%/%category%/
 * Page URL /%post_type%/%page%/
 */

class ArchiveTemplateRedirect_v1{

    public function __construct(){
        add_action( 'pre_get_posts', array( __CLASS__, 'loadTaxTemplate' ) );
    }

    public static function loadTaxTemplate( $query ){
        if( strlen( strtok($_SERVER["REQUEST_URI"],'?') ) > 2 ){
            if( is_404() || is_tax() || is_archive() ) {
                $url = strtok( $_SERVER["REQUEST_URI"],'?' );

                if( CURRENT_BLOG != 1 ){
                    $url_array = explode( '/', substr($url, 1, -1) );
                    unset( $url_array[0] );
                    $url = '/'.implode( '/', $url_array ).'/';
                }

                $matchingPage = get_page_by_path( $url );

                if ( $matchingPage ) {
                    global $wp_query;

                    $wp_query->is_404 = false;
                    $query->set( 'page_id', $matchingPage->ID );
                    query_posts( 'page_id=' . $matchingPage->ID );
                }

                return $query;
            }
            else if( empty( get_queried_object() ) && empty( $query->queried_object ) ){
                $url = strtok( $_SERVER["REQUEST_URI"],'?' );

                if( CURRENT_BLOG != 1 ){
                    $url_array = explode( '/', substr($url, 1, -1) );
                    unset( $url_array[0] );
                    $url = '/'.implode( '/', $url_array ).'/';
                }

                $matchingPage = get_page_by_path( $url );

                if ( $matchingPage ) {
                    $query->set( 'post_type', 'page' );
                    $query->set( 'page_id', $matchingPage->ID );
                    $query->set( 'queried_object', $matchingPage );
                }
            }
        }

        return $query;
    }

}
//new ArchiveTemplateRedirect_v1();

class ArchiveTemplateRedirect_v2{

    public function __construct() {
        add_action( 'template_redirect', array( __CLASS__, 'pageInsteadArchive' ) );
    }

    public static function pageInsteadArchive() {
        if ( is_tax() || is_archive() ) {
            $slug = strtok( $_SERVER["REQUEST_URI"], '?' );

            if ( CURRENT_BLOG != 1 ) {
                $url_array = explode( '/', substr( $slug, 1, - 1 ) );
                unset( $url_array[0] );
                $slug = '/' . implode( '/', $url_array ) . '/';
            }

            $matchingPage = get_page_by_path( $slug );

            if ( $matchingPage && $matchingPage->post_status == 'publish' ) {
                $pageQuery = new WP_Query( [ 'page_id' => $matchingPage->ID ] );
                if ( $pageQuery->have_posts() ) :

                    global $post;

                    get_header();
                    while ( $pageQuery->have_posts() ): $pageQuery->the_post();
                        get_template_part( 'templates/page/content', 'page' );
                    endwhile;
                    get_footer();
                    die;
                endif;
            }
        }
    }

}
//new ArchiveTemplateRedirect_v2();


<?php
/**
 * Change Shop Page
 */
Class DS_ArchiveProduct{

    public function __construct(){
        add_filter( 'woocommerce_show_page_title', '__return_false' );

        // Register Widgets for filters and recently viewed products
        add_action( 'widgets_init', array( $this, 'register_woocommerce_filters' ) );

        add_action( 'woocommerce_before_main_content', array( $this, 'add_cat_custom_description' ), 20 );
        add_action( 'woocommerce_before_main_content', array( $this, 'remove_archive_breadcrumbs' ) );

        remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
        remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
        add_action( 'woocommerce_before_shop_loop', array( $this, 'add_shop_filters' ), 30 );
    }
	
	public function add_cat_custom_description(){
        if ( !is_product() ) get_template_part( 'templates/parts/subheader' );
    }

    public function remove_archive_breadcrumbs() {
        if( is_shop() || is_archive() )
            remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20 );
    }

	public function add_shop_filters(){
        if ( !is_product() ) get_template_part( 'templates/shop/filters' );
	}

    public function register_woocommerce_filters( $checkout_fields ){
        register_sidebar( array(
            'name'          => __( 'Shop Filters', 'dstheme' ),
            'id'            => "shop-filters",
            'description'   => '',
            'class'         => '',
            'before_title'  => '<span>',
            'after_title'  => '</span>',
        ) );
    }

}
new DS_ArchiveProduct();
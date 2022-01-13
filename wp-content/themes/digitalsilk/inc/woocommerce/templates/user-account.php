<?php
/**
 * Change User Account Layout
 */
Class  DS_UserAccount{

    public function __construct(){
        add_filter('woocommerce_account_menu_items', array( $this, 'user_menu_items' ), 10, 1);

        add_action( 'woocommerce_account_content', array( $this, 'user_widgets' ) );
    }

    public function user_menu_items( $items ){
        unset( $items['downloads'] );
        return $items;
    }

	public function user_widgets( $items ) {
		if ( ! is_wc_endpoint_url() ) {
			get_template_part( 'templates/my-account/widgets' );
		}
	}


}
new DS_UserAccount();
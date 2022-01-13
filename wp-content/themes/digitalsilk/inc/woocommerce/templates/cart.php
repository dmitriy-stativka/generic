<?php
/**
 * Change Cart Account Layout
 */
Class  DS_Cart{

    public function __construct(){
        add_action( 'woocommerce_before_cart', array( $this, 'cart_widgets' ) );
    }

    public function cart_widgets( $items ){
        get_template_part( 'templates/cart/widgets' );
    }

}
new DS_Cart();
<div class="footer-top">

    <?php $logo_footer = get_field('footer_logo', 'options');
    if ( !empty( $logo_footer ) ) : ?>
        <img src="<?php echo esc_url( $logo_footer ); ?>" class="footer-top--logo" alt="<?php bloginfo( 'name' ); ?>" />
    <?php endif; ?>


        <div class="footer-top-right">

            <div class="footer-top-right--item">
                <span class="footer-top-right--item-top">Download Our Product Catalog</span>
                <a href="#" class="btn purple">
                    <i class="icon-download"></i>
                    <span>DOWNLOAD CATALOG</span>
                </a>
            </div>
            
            <div class="footer-top-right--item">
                <span class="footer-top-right--item-top">Our Address</span>
                <address>270 Cleveland Avenue NY 13308</address>
            </div>
        </div>
 
</div>
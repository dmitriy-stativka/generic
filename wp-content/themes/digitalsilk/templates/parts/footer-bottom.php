<div class="footer-bottom">
    <?php if( has_nav_menu( 'footer-menu' ) ) : ?>
        <?php wp_nav_menu(
            array(
                'theme_location' => 'footer-menu',
                'container' => 'ul',
                'menu_class' => 'footer-bottom-navbar',
            )
        );
        ?>
    <?php endif; ?>
    <div class="footer-bottom--item">
        <?php $copyright = get_field('copyright', 'options');
        if ( !empty( $copyright ) ) : ?>
            <div class="copyright"><?php echo do_shortcode( $copyright ); ?></div>
        <?php endif; ?>
        <a class="footer-bottom--tel" href="tel:<?php the_field('phone_number', 'options');?>"><i class="icon-tel"></i><?php the_field('phone_number', 'options');?></a>
    </div>
</div>
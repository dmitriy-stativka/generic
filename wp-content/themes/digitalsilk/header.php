<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        <?php wp_title('|', true, 'right'); ?>
    </title>

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">

    <!--[if IE]>
    <link rel="shortcut icon" href="/favicon.ico">    <![endif]-->

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >

<?php // conflict test ?>

<div class="wrapper">

    <header class="site-header" role="banner">
        <div class="site-header_top">
            <div class="inner-frame">
                <ul class="site-header_top-list">
                    <li class="site-header_top-item">
                        <a href="tel:<?php the_field('phone_number', 'options');?>"><i class="icon-tel"></i><?php the_field('phone_number', 'options');?></a>
                    </li>
                    <li class="site-header_top-item">
                        <a href="#"><i class="icon-about"></i>About</a>
                    </li>
                    <li class="site-header_top-item">
                        <a href="#"><i class="icon-support"></i>Support</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="inner-frame">
            <div class="site-header__content">
                <?php $logo = get_field('logo', 'options');
                if (!empty($logo)) : ?>
                    <a href="<?php echo home_url(); ?>" class="site-header__logo">
                        <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>" class="logo-img" />
                    </a>
                <?php endif; ?>

                <div class="site-header__nav">

        

                        <form id="searchform" class="site-header__nav-search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <input type="text" class="search-field" name="s" placeholder="Search for products" value="<?php echo get_search_query(); ?>">
                            <button><i class="icon-search"></i></button>
                        </form>



                        <ul class="site-header__nav-list">
                            <li class="site-header__nav-item"><a href="#" class="site-header__nav-link"><i class="icon-cart"></i>Cart</a></li>
                            <li class="site-header__nav-item"><a href="#" class="site-header__nav-link"><i class="icon-login"></i>Log In</a></li>
                            <li class="site-header__nav-item"><a href="#" class="site-header__nav-link"><i class="icon-register"></i>Register</a></li>
                        </ul>


                </div>
            </div>
        </div>


        <div class="site-header__navigation">
            <div class="inner-frame">
                <button class="site-header__navigation-btn">Menu <i class="btn-icon"></i></button>
                <?php 
                    wp_nav_menu( [
                        'theme_location'  => '',
                        'menu'            => 'header-menu',
                        'container'       => '',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'site-header__menu',
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => '',
                    ] );
                ?>
            </div>
        </div>

        
    </header>

    <main class="site-content" role="main">
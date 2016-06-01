<?php
/**
 * @package WordPress
 * @subpackage Inspira_ac
 * @since Inspira 0.1
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
    <link rel="alternate" href="http://inspira.ac" hreflang="es-mx" />
    <link rel="alternate" href="http://www.inspira.ac" hreflang="es-mx" />
    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->
    <meta name="google-site-verification" content="BsPT3SuFT7ujgnzp9SK7b_QArTcTslJlv9ja1lGLWKs" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>><div class="remodal-bg">
<div id="tip"></div>

<div id="page" class="hfeed site"><div id="no-footer">
    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyfifteen' ); ?></a>

    <header class="masthead" role="main"><div class="contents">
        <?php
            if ( is_front_page() && is_home() ) : ?>
                <h1 id="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            <?php else : ?>
                <h1 id="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php endif; ?>

            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <nav class="main-nav" role="navigation">
                    <?php
                        $walker = new Menu_With_Description;

                        // Primary navigation menu.
                        wp_nav_menu( array(
                            'menu_class'     => 'nav-menu',
                            'theme_location' => 'primary',
                            'walker'         => $walker
                        ) );
                    ?>
                </nav>
            <?php endif; ?>
    </div></header><!-- /.masthead -->

    <main role="main">

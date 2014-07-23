<?php
/**
 * Div Admin setup
 * This file handles the admin area and functions.
 * You can use this file to make changes to the
 * dashboard.
 *
 * @author: Div Truth
 * @license GPL
 */

/*=====// CUSTOM LOGIN/ADMIN PAGE //===================*/

# Calling your own login css so you can style it
function df_login_styles() {
    wp_enqueue_style( 'theme_login_styles', THEME_APPEARANCE_URL.'css/login.css', false );
}

function df_admin_styles() {
    wp_enqueue_style( 'theme_admin_styles', THEME_APPEARANCE_URL.'css/admin.css', false );
}

# Calling it only on the login page
add_action( 'login_enqueue_scripts', 'df_login_styles', 10 );

# Calling it only admin
add_action( 'admin_enqueue_scripts', 'df_admin_styles', 15 );

# Custom Backend Footer
add_filter('admin_footer_text', 'df_custom_admin_footer');
function df_custom_admin_footer() {
    _e('<span id="footer-thankyou">Powered by <a href="http://www.divblend.com" target="_blank">The Div Framework</a></span>.', 'div-framework');
}

/*=====// THEME SUPPORTS //===================*/

# TODO: Need to make these theme support options available on a developers options page

add_theme_support( 'post-formats', apply_filters( 'df_post_formats', array( 'gallery', 'image' ) ) );
add_theme_support( 'widgets' );
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' ); 
add_theme_support( 'html5' ); 


/*=====// REGISTERED MENUS //===================*/

# Enable the default menus
register_nav_menus(
    array(
        'top-nav' => __( 'Top Navigation', 'df_framework' ),            // top nav in header
        'primary-nav' => __( 'Primary Navigation', 'df_framework' ),   // primary nav in header
        'mobile-nav' => __( 'Mobile Navigation', 'df_framework' ),    // alternative main menu for mobile
        'footer-nav' => __( 'Footer Navigation', 'df_framework' ),    // alternative main menu for mobile
    )
);

function df_primary_nav($newOptions = array()) {
    $options = array(
        'container' => 'nav',
        'container_id' => 'primary-navigation',
        'container_class' => 'full primary-nav clearfix',
        'menu' => __( 'Primary Navigation', 'df_framework' ),
        'menu_class' => 'inner-nav clearfix',
        'theme_location' => 'primary-nav',
        'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'depth' => 3,
        'fallback_cb' => 'df_framework_main_nav_cb',
    );
    wp_nav_menu(array_merge($options, apply_filters( 'df_primary_nav', $newOptions ) ));
} /* end df_framework primary nav */

function df_top_nav($newOptions = array()) {
    $options = array(
        'container' => 'nav',
        'container_id' => 'top-navigation',
        'container_class' => 'full top-nav clearfix',
        'menu' => __( 'Top Bar Navigation', 'df_framework' ),
        'menu_class' => 'inner-nav clearfix',
        'theme_location' => 'top-nav',
        'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'depth' => 3,
        'fallback_cb' => '__return_false',
    );
    wp_nav_menu(array_merge($options, apply_filters( 'df_top_nav', $newOptions ) ));
} /* end df_framework main nav */

function df_mobile_nav($newOptions = array()) {
    $options = array(
        'container' => 'nav',
        'container_id' => 'mobile',
        'container_class' => 'mobile-nav clearfix',
        'menu' => __( 'Mobile Navigation', 'df_framework' ),
        'menu_class' => 'inner-nav clearfix',
        'theme_location' => 'mobile-nav',
        'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'depth' => 2,
        'fallback_cb' => 'df_framework_mobile_nav_cb'
    );
    wp_nav_menu(array_merge($options, apply_filters( 'df_mobile_nav', $newOptions ) ));
} /* end df_framework mobile nav */

function df_footer_nav($newOptions = array()) {
    $options = array(
        'container' => 'nav',
        'container_class' => 'footer-nav clearfix',
        'menu' => __( 'Footer Navigation', 'df_framework' ),
        'menu_class' => 'inner-nav clearfix',
        'theme_location' => 'footer-nav',
        'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'depth' => 1,
        'fallback_cb' => '__return_false',
    );
    wp_nav_menu(array_merge($options, apply_filters( 'df_footer_nav', $newOptions ) ));
} /* end df_framework footer nav */

function df_framework_main_nav_cb(){
    echo '<nav class="nav">';
        echo '<ul class="inner-nav clearfix">';
            wp_list_pages('sort_column=menu_order&title_li=');
        echo '</ul>';
    echo '</nav>';
}

function df_framework_mobile_nav_cb(){
    echo '<nav id="mobile" class="navigation">';
        echo '<ul class="inner-nav clearfix">';
            wp_list_pages('sort_column=menu_order&title_li=');
        echo '</ul>';
    echo '</nav>';
}
?>
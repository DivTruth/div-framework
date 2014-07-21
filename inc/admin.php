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
		'main-nav' => __( 'Main Navigation', 'df_framework' ),   // main nav in header
		'mobile-nav' => __( 'Mobile Navigation', 'df_framework' ), // alternative main menu for mobile
	)
);

function df_main_nav($newOptions = array()) {
    $options = array(
        'container' => false,                               	// remove nav container
        'container_class' => 'menu clearfix',               	// class of container (should you choose to use it)
        'menu' => __( 'Main Navigation', 'df_framework' ),   	// nav name
        'menu_class' => 'nav top-nav clearfix',             	// adding custom nav class
        'theme_location' => 'main-nav',                     	// where it's located in the theme
        'before' => '',                                     	// before the menu
        'after' => '',                                      	// after the menu
        'link_before' => '',                                	// before each link
        'link_after' => '',                                 	// after each link
        'depth' => 0,                                       	// limit the depth of the nav
        'fallback_cb' => 'df_framework_main_nav_cb',         	// Callback function if no menu found
    );
    wp_nav_menu(array_merge($options, $newOptions));
} /* end df_framework main nav */

function df_mobile_nav($newOptions = array()) {
    $options = array(
        'container' => false,                               	// remove nav container
        'container_class' => 'menu clearfix',               	// class of container (should you choose to use it)
        'menu' => __( 'Mobile Navigation', 'df_framework' ), 	// nav name
        'menu_class' => 'nav top-nav clearfix',             	// adding custom nav class
        'theme_location' => 'mobile-nav',                   	// where it's located in the theme
        'before' => '',                                     	// before the menu
        'after' => '',                                      	// after the menu
        'link_before' => '',                                	// before each link
        'link_after' => '',                                 	// after each link
        'depth' => 0,                                       	// limit the depth of the nav
        'fallback_cb' => 'df_framework_main_nav_cb'
    );
    wp_nav_menu(array_merge($options, $newOptions));
} /* end df_framework mobile nav */

function df_framework_main_nav_cb(){
    echo '<ul id="menu-main-menu-1" class="nav top-nav clearfix">';
        wp_list_pages('sort_column=menu_order&title_li=');
    echo '</ul>';
}
?>
<?php
/**
 * @package Div-Framework
 * @author 	Div Truth
 * @license GPL
 *
 * NOTE:   
 * This file should not be edited as it will be overwritten with any future
 * updates. Instead any necessary changes should be done within the child theme
 * For more information see the documention on the Div Blend website
 * http://divblend.com/div-framework
 */

/* **************  PARENT THEME Path constants *********************** */
define( 'DIV_NAME', 			wp_get_theme('Div Framework') );
define( 'DIV_APPEARANCE_DIR', 	TEMPLATEPATH.'/appearance/' );
define( 'DIV_APPEARANCE_URL', 	get_template_directory_uri().'/appearance/' );
define( 'DIV_INC_DIR', 			TEMPLATEPATH.'/inc/' );
define( 'DIV_INC_URL', 			get_template_directory_uri().'/inc/' );
define( 'DIV_IMAGES_DIR',		DIV_APPEARANCE_DIR.'images/' );
define( 'DIV_IMAGES_URL', 		DIV_APPEARANCE_URL.'images/' );
define( 'DIV_JS_DIR', 			DIV_INC_DIR.'js/' );
define( 'DIV_JS_URL', 			DIV_INC_URL.'js/' );

/* *************  CHILD THEME Path constants *********************** */
define( 'THEME_NAME', 			wp_get_theme() );
define( 'THEME_APPEARANCE_DIR', get_stylesheet_directory().'/appearance/' );
define( 'THEME_APPEARANCE_URL', get_stylesheet_directory_uri().'/appearance/' );
define( 'THEME_INC_DIR', 		get_stylesheet_directory().'/inc/' );
define( 'THEME_INC_URL', 		get_template_directory_uri().'/inc/' );
define( 'THEME_IMAGES_DIR', 	THEME_APPEARANCE_DIR.'images/' );
define( 'THEME_IMAGES_URL', 	THEME_APPEARANCE_URL.'images/' );
define( 'THEME_JS_DIR', 		THEME_INC_DIR.'js/' );
define( 'THEME_JS_URL', 		THEME_INC_URL.'js/' );

/**
 * CONSTANT: Theme Options Prefix
 * This constant is used for retrieving theme defined options from the options table.
 *
 * @example get_option(DIV_OPTION.'framework_version');
 * @since   1.0
 */
if(!defined('DIV_OPTION')) define('DIV_OPTION', 'div_option_');

/**
 * CONSTANT: Child Theme Version
 * theme version number for appending to script and style enqueue
 *
 * @since   1.0
 */
$theme_data = wp_get_theme();
define('THEME_VERSION', $theme_data['Version']);

/**
 * Framework Includes
 * Div Engine: This is the control panel for all Div Framework functionality
 * Admin: This file handles the admin area and functions. 
 * Options: Addes ACF theme option pages and menus
 *
 * @since   1.0
 */
require_once(DIV_INC_DIR.'/div.php');
require_once(DIV_INC_DIR.'/admin.php');

/**
 * Theme Includes
 * This is the control panel for all child theme functionality
 *
 * @since   1.0
 */
if( file_exists(THEME_INC_DIR.'sidebars.php') )
	require_once(THEME_INC_DIR.'sidebars.php');

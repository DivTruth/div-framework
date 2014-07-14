<?php
/**
 * Div Engine
 * This is the control panel for all Div Framework functionality
 *
 * @author: Div Truth
 * @license GPL
 */

include( dirname(__FILE__) .'/div-filters.php');  #Include Div Filters
include( dirname(__FILE__) .'/div-hooks.php');    #Include Div Hooks

/**
 * Initialize Div
 * Start the div engine
 * 
 * @since 1.0
 */
add_action('after_setup_theme','initialize_div', 16);
function initialize_div() {
    # enqueue base scripts and styles
    add_action('wp_enqueue_scripts', 'div_scripts_and_styles', 999);
}

/**
 * Enque Scripts and Styles
 * Register and enque all Div Framework scripts and styles
 * 
 * @since 1.0
 */
function div_scripts_and_styles() {
  if (!is_admin()) {
    # modernizr (without media query polyfill)
    wp_register_script( 'div-modernizr', DIV_JS_URL.'modernizr.custom.min.js', array('jquery'), '2.5.3', true );

    # register main stylesheets
    if( file_exists( THEME_APPEARANCE_DIR.'css/style.css' ) )
      wp_register_style( 'div-theme-stylesheet', THEME_APPEARANCE_URL.'css/style.css', array(), '', 'all', true );
    else 
      wp_register_style( 'div-theme-stylesheet', DIV_APPEARANCE_URL.'css/style.css', array(), '', 'all', true );

    # ie-only style sheet
    wp_register_style( 'div-ie-only', THEME_APPEARANCE_URL.'css/ie.css', array('div-starter-stylesheet'), '' );

    # load child theme custom scripts file in the footer
    if ( file_exists(DIV_JS_DIR.'scripts.min.js') )
      wp_register_script( 'div-js', DIV_JS_URL.'scripts.min.js', array( 'jquery' ), '', true );
    else
      wp_register_script( 'div-js', DIV_JS_URL.'scripts.js', array( 'jquery' ), '', true );

    // enqueue styles and scripts
    wp_enqueue_script( 'div-modernizr' );
    wp_enqueue_script( 'div-js' );

    function theme_styles(){
      if(preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT'])){
        // if IE<=8
        wp_enqueue_style( 'div-ie-only' );
      } else {
        wp_enqueue_style( 'div-theme-stylesheet' );
      }
    }
    add_action( 'wp_footer', 'theme_styles');
    
  }
}

/**
 * Div Build Action
 * A quick solution for building or rebuilding action
 * 
 * @since 1.0
 */
function div_build_action( $tag, $hooks=array() ){
  remove_all_actions( $tag );
  global $wp_filter;
  foreach ($hooks as $hook => $priority) {
    add_action( $tag, $hook, $priority );
  }
}

/**
 * Div Get Field w/ ACF
 * All Div Framework options are registered with ACF (a required plugin),
 * this funtion is used for getting fields in case ACF isn't loaded.
 * 
 * @since 1.0
 */
function div_get_field( $field, $id="options" ){
  if( class_exists('acf') )
    return get_field( $field, $id );
  else
    return false;
}
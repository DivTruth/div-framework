<?php
/**
 * Div Engine
 * This is the control panel for all Div Framework functionality
 *
 * @author: Div Truth
 * @license GPL
 */

/**
 * Initialize Div
 * Start the div engine
 * 
 * @since 1.0
 */
add_action('after_setup_theme','initialize_div', 16);
function initialize_div() {
  # enqueue base scripts and styles
  add_action('wp_enqueue_scripts', 'df_scripts_and_styles', 999);
}

/**
 * Enque Scripts and Styles
 * Register and enque all Div Framework scripts and styles
 * 
 * @since 1.0
 */
function df_scripts_and_styles() {
  if (!is_admin()) {
    # modernizr (without media query polyfill)
    wp_register_script( 'df-modernizr', DF_JS_URL.'modernizr.custom.min.js', array('jquery'), '2.5.3', true );

    # register main stylesheets
    if( file_exists( THEME_APPEARANCE_DIR.'css/style.css' ) )
      wp_register_style( 'df-theme-stylesheet', THEME_APPEARANCE_URL.'css/style.css', array(), null, 'all' );
    else 
      wp_register_style( 'df-theme-stylesheet', DF_APPEARANCE_URL.'css/style.css', array(), null, 'all' );

    # ie-only style sheet
    wp_register_style( 'df-ie-only', THEME_APPEARANCE_URL.'css/ie.css', array('df-starter-stylesheet'), '' );

    # load child theme custom scripts file in the footer
    if ( file_exists(THEME_JS_DIR.'scripts.min.js') )
      wp_register_script( 'df-js', THEME_JS_URL.'scripts.min.js', array( 'jquery' ), false, true );
    elseif( file_exists(THEME_JS_DIR.'scripts.js') )
      wp_register_script( 'df-js', THEME_JS_URL.'scripts.js', array( 'jquery' ), false, true );
    else
      wp_register_script( 'df-js', DF_JS_URL.'scripts.js', array( 'jquery' ), false, true );

    // enqueue styles and scripts
    wp_enqueue_script( 'df-modernizr' );
    wp_enqueue_script( 'df-js' );

    function theme_styles(){
      if(preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT'])){
        // if IE<=8
        wp_enqueue_style( 'df-ie-only' );
      } else {
        wp_enqueue_style( 'df-theme-stylesheet' );
      }
    }
    add_action( 'wp_footer', 'theme_styles');
    
  }
}
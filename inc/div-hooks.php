<?php
/**
 * Div Hooks
 * All Div Framework actions are declared here
 *
 * @author    Div Truth
 * @category  Framework
 * @license   GPL
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*=====// HEADER //===================*/

  /**
   * Head Tag
   *
   * @see div_page_title() - 10
   * @see div_charset() - 15
   * @see div_google_frame() - 20
   * @see div_mobile_meta() - 25
   * @see div_favicon() - 30
   * @see div_pingback() - 35
   * @see div_html5_shiv() - 40
   */
  add_action( 'div_head', 'div_page_title', 10 );
  add_action( 'div_head', 'div_charset', 15 );
  add_action( 'div_head', 'div_google_frame', 20 );
  add_action( 'div_head', 'div_mobile_meta', 25 );
  add_action( 'div_head', 'div_favicon', 30 );
  add_action( 'div_head', 'div_pingback', 35 );
  add_action( 'div_head', 'div_html5_shiv', 40 );

/*=====// CONTENT //===================*/

  /**
   * Begin Content Container
   *
   * @see div_begin_content_container() - 10
   * @see div_begin_main_container() - 15
   */
  add_action( 'div_begin_content', 'div_begin_content_container', 10 );
  add_action( 'div_begin_content', 'div_begin_main_container', 15 );

  /**
   * End Content Container
   *
   * @see div_end_main_container() - 5
   * @see div_load_sidebar() - 10
   * @see div_end_content_container() - 15
   */
  add_action( 'div_end_content', 'div_end_main_container', 5 );
  add_action( 'div_end_content', 'get_sidebar', 10 );

/*=====// LOOP //======================*/

  /**
   * Loop not found output
   *
   * @see div_404_message() - 10
   */
  add_action( 'div_post_not_found', 'div_404_message', 10 );
  

/*====// FOOTER //=====================*/

/**
 * Div open footer tag
 *
 * @see div_begin_footer_container() - 10
 */
add_action('div_begin_footer','div_begin_footer_container', 10);

/**
 * Div close footer tag
 *
 * @see div_copyright() - 10
 * @see div_end_footer_container() - 15
 */
add_action('div_end_footer','div_copyright', 10);
add_action('div_end_footer','div_end_footer_container', 15);

?>
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
  div_build_action( 'div_head' , array(
    'div_page_title' => 10,
    'div_charset' => 15,
    'div_google_frame' => 20,
    'div_mobile_meta' => 25,
    'div_favicon' => 30,
    'div_pingback' => 35,
    'div_html5_shiv' => 40,
    )
  );

/*=====// CONTENT //===================*/

  /**
   * Begin Content Container
   *
   * @see div_begin_content_container() - 10
   * @see div_begin_main_container() - 15
   */
  div_build_action( 'div_begin_content' , array(
    'div_begin_content_container' => 10,
    'div_begin_main_container' => 15,
    )
  );

  /**
   * End Content Container
   *
   * @see div_end_main_container() - 5
   * @see div_load_sidebar() - 10
   * @see div_end_content_container() - 15
   */
  div_build_action( 'div_end_content' , array(
    'div_end_main_container' => 10,
    'get_sidebar' => 15,
    )
  );

/*=====// LOOP //======================*/

  /**
   * Loop not found output
   *
   * @see div_404_message() - 10
   */
  div_build_action( 'div_post_not_found' , array(
    'div_404_message' => 10,
    )
  );

/*====// FOOTER //=====================*/

/**
 * Div open footer tag
 *
 * @see div_begin_footer_container() - 10
 */
div_build_action( 'div_begin_footer' , array(
  'div_begin_footer_container' => 10,
  )
);

/**
 * Div close footer tag
 *
 * @see div_copyright() - 10
 * @see div_end_footer_container() - 15
 */
div_build_action( 'div_end_footer' , array(
  'div_copyright' => 10,
  'div_end_footer_container' => 15,
  )
);

?>
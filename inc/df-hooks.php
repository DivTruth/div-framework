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
   * @see df_page_title() - 10
   * @see df_charset() - 15
   * @see df_google_frame() - 20
   * @see df_mobile_meta() - 25
   * @see df_favicon() - 30
   * @see df_pingback() - 35
   * @see df_html5_shiv() - 40
   */
  DF::add_action( 'df_head' , array(
    'df_page_title' => 10,
    'df_charset' => 15,
    'df_google_frame' => 20,
    'df_mobile_meta' => 25,
    'df_favicon' => 30,
    'df_pingback' => 35,
    'df_html5_shiv' => 40,
    )
  );

/*=====// CONTENT //===================*/

  /**
   * Begin Content Container
   *
   * @see df_begin_content_container() - 10
   * @see df_begin_main_container() - 15
   */
  DF::add_action( 'df_begin_content' , array(
    'df_begin_content_container' => 10,
    'df_begin_main_container' => 15,
    )
  );

  /**
   * Post Content
   *
   * @see df_title_output() - 10
   * @see df_post_info() - 15
   * @see the_content() - 20
   * @see df_post_meta() - 25
   * @see df_clear() - 30
   */
  DF::add_action( 'df_post_content' , array(
    'df_title_output' => 10,
    'df_post_info' => 15,
    'the_content' => 20,
    'df_post_meta' => 25,
    'df_clear' => 30,
    )
  );

  /**
   * End Content Container
   *
   * @see df_end_main_container() - 10
   * @see get_sidebar() - 15
   * @see df_end_content_container() - 20
   */
  DF::add_action( 'df_end_content' , array(
    'df_end_main_container' => 10,
    'get_sidebar' => 15,
    'df_end_content_container' => 20
    )
  );

/*=====// LOOP //======================*/

  /**
   * Loop not found output
   *
   * @see df_404_message() - 10
   */
  DF::add_action( 'df_post_not_found' , array(
    'df_404_message' => 10,
    )
  );

/*====// FOOTER //=====================*/

/**
 * Footer tag
 *
 * @see df_copyright() - 10
 */
DF::add_action( 'df_footer' , array(
  'df_copyright' => 10,
  )
);

?>
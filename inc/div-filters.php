<?php
/**
 * Div Template Filters
 * All Div Framework template filters are declared here
 *
 * @author    Div Truth
 * @category  Framework
 * @license   GPL
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*===================// HEAD //===================*/

if ( ! function_exists( 'div_page_title' ) ) {

  /**
   * Output the site page title
   * @access public
   * @subpackage  Framework/Head
   * @return void
   */
  function div_page_title($title){
    $title = '<title>'.get_bloginfo('name').' | ';
      $title .= is_home() ? get_bloginfo('description') : wp_title('');
    $title .= '</title>';
    echo apply_filters( 'div_page_title', $title );
  }

}

if ( ! function_exists( 'div_charset' ) ) {

  /**
   * Output the meta tag for charset
   * @access public
   * @subpackage  Framework/Head
   * @return void
   */
  function div_charset(){
    echo apply_filters( 'div_charset', '<meta charset="'.get_bloginfo( 'charset' ).'">' );
  }

}

if ( ! function_exists( 'div_mobile_meta' ) ) {

  /**
   * Output the meta tag for charset
   * @access public
   * @subpackage  Framework/Head
   * @return void
   */
  function div_mobile_meta(){
    $meta = '<meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
    echo apply_filters( 'div_mobile_meta', $meta );
  }

}

if ( ! function_exists( 'div_google_frame' ) ) {

  /**
   * Output the Google Chrome Frame for IE meta tag 
   * @access public
   * @subpackage  Framework/Head
   * @return void
   */
  function div_google_frame(){
    $meta = '<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->';
    echo apply_filters( 'div_google_frame', $meta );
  }

}

if ( ! function_exists( 'div_favicon' ) ) {

  /**
   * Output the icons & favicon tag 
   * @access public
   * @subpackage  Framework/Head
   * @return void
   */
  function div_favicon(){
    if( file_exists(get_stylesheet_directory().'/favicon.ico') )
      $meta = '<link rel="shortcut icon" href="'.get_stylesheet_directory_uri().'/favicon.ico">';
    else
      $meta = '<link rel="shortcut icon" href="'.get_template_directory_uri().'/favicon.ico">';
    echo apply_filters( 'div_favicon', $meta );
  }

}

if ( ! function_exists( 'div_pingback' ) ) {

  /**
   * Output pingboack link tag 
   * @access public
   * @subpackage  Framework/Head
   * @return void
   */
  function div_pingback(){
    $meta = '<link rel="pingback" href="'.get_bloginfo("pingback_url").'">';
    echo apply_filters( 'div_pingback', $meta );
  }

}

if ( ! function_exists( 'div_html5_shiv' ) ) {

  /**
   * Output html5 shive script tag 
   * @access public
   * @subpackage  Framework/Head
   * @return void
   */
  function div_html5_shiv(){
    $meta = '<!--[if lt IE 9]>
      <script src="'.DIV_JS_URL.'html5shiv.js"></script>
    <![endif]-->';
    echo apply_filters( 'div_html5_shiv', $meta );
  }

}

/*===================// CONTENT //===================*/

if ( ! function_exists( 'div_begin_content_container' ) ) {

  /**
   * Output opening Content Tags
   * #container->#inner-container
   *
   * @access public
   * @subpackage  Framework/Body
   * @return void
   */
  function div_begin_content_container(){
    $html = '<div id="content"> 
      <div id="inner-content" class="wrap clearfix">';
    echo apply_filters( 'div_begin_content_container', $html );
  }

}
  
  if ( ! function_exists( 'div_begin_main_container' ) ) {

    /**
     * Output opening Main Tags
     * #main
     *
     * @access public
     * @subpackage  Framework/Body
     * @return void
     */
    function div_begin_main_container(){
      $html = '<div id="main" class="clearfix" role="main">';
      echo apply_filters( 'div_begin_main_container', $html );
    }

  }   

  if ( ! function_exists( 'div_title_output' ) ) {

    /**
     * Output Post title
     *
     * @access public
     * @subpackage  Framework/Post
     * @return void
     */
    function div_title_output(){
      $html = '<h1>'. get_the_title(). '</h1>';
      echo apply_filters( 'div_title_output', $html );
    }

  } 

  if ( ! function_exists( 'div_get_post_info' ) ) {

    /**
     * Output Post meta details
     *
     * @access public
     * @subpackage  Framework/Post
     * @return void
     */
    function div_get_post_info($post_specified=""){
      if(!empty($post_specified)) {
        setup_postdata($post_specified);
      }

      //instead of rebuilding html function, using output buffer to get html into string
      ob_start();
      comments_number( '0 Comments', '1 Comment', '% Comments' );
      $get_comments_number_html = ob_get_clean();

      //setup the post info html string
      $post_info = '
        <ul class="post-info">
          <li class="post-date">'.get_the_time('F jS Y').'</li>
          <li class="post-author">'.get_the_author().'</li>
          <li class="post-comment-count">
            <a href="'.get_comments_link().'" title="Comment on '.get_the_title().'">'.$get_comments_number_html.'</a>
          </li>
        </ul>';
      wp_reset_postdata();
      return apply_filters( 'div_get_post_info', $post_info );
    }

  } 

    if ( ! function_exists( 'div_post_info' ) ) {

      /**
       * Output Post meta details
       *
       * @access public
       * @subpackage  Framework/Post
       * @see div_get_post_info()
       * @return void
       */
      function div_post_info($post_specified=""){
        echo div_get_post_info($post_specified);
      }

    } 

  if ( ! function_exists( 'div_end_main_container' ) ) {

    /**
     * Output closing Main Tags
     * #main
     *
     * @access public
     * @subpackage  Framework/Body
     * @return void
     */
    function div_end_main_container(){
      $html = '</div>';
      echo apply_filters( 'div_end_main_container', $html );
    }

  }

if ( ! function_exists( 'div_end_content_container' ) ) {

  /**
   * Output Content Tags
   * @access public
   * @subpackage  Framework/Body
   * @return void
   */
  function div_end_content_container(){
    $html = '</div></div>';
    echo apply_filters( 'div_end_content_container', $html );
  }

}

if ( ! function_exists( 'div_clear' ) ) {

  /**
   * Output Content Tags
   * @access public
   * @subpackage  Framework/Body
   * @return void
   */
  function div_clear(){
    $html = '<div class="clearfix"></div>';
    echo apply_filters( 'div_clear', $html );
  }

}


/*===================// LOOP //=====================*/

if ( ! function_exists( 'div_404_message' ) ) {

  /**
   * Output 404 Message
   * @access public
   * @subpackage  Framework/Body
   * @return void
   */
  function div_404_message(){
    $html = '<header class="article-header">
      <h1>Post Not Found</h1>
    </header>';
    echo apply_filters( 'div_404_message', $html );
  }

}

/*===================// FOOTER //===================*/


if ( ! function_exists( 'div_begin_footer_container' ) ) {

  /**
   * Output Footer Opening Tags
   * @access public
   * @subpackage  Framework/Footer
   * @return void
   */
  function div_begin_footer_container(){
    $html = '<footer class="footer" role="contentinfo">
      <div id="inner-footer" class="wrap clearfix">';
    echo apply_filters( 'div_begin_footer_container', $html );
  }

}

if ( ! function_exists( 'div_copyright' ) ) {
  /**
   * Site Copyright
   * 
   * @since 1.0
   */

  function div_copyright(){
    // if( div_get_field('site_copyright') != "" || !div_get_field('site_copyright') ) :
    //   echo div_get_field('site_copyright');
    // else : 
      $copyright = '&copy; '.date('Y').' '.get_bloginfo('name').' All Rights Reserved. <br>';
      $copyright .= 'Site powered by <a href="http://www.divblend.com" target="_blank">Div Framework</a>.</p>';
      echo apply_filters( 'div_copyright', $copyright );
    // endif;  
  }
}

if ( ! function_exists( 'div_end_footer_container' ) ) {

  /**
   * Output Footer Closing Tags
   * @access public
   * @subpackage  Framework/Footer
   * @return void
   */
  function div_end_footer_container(){
    $html = '</div></footer>';
    echo apply_filters( 'div_end_footer_container', $html );
  }

}
?>
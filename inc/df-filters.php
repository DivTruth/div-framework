<?php
/**
 * Div Template Filters
 * All Div Framework template filters are declared here
 *
 * @author    Div Blend Team
 * @category  Framework
 * @license   GPL
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*===================// HEAD //===================*/

if ( ! function_exists( 'df_page_title' ) ) {

  /**
   * Output the site page title
   * @access public
   * @subpackage  Framework/Head
   * @return void
   */
  function df_page_title($title){
    $title = '<title>'.get_bloginfo('name').' | ';
      $title .= is_home() ? get_bloginfo('description') : wp_title('', false);
    $title .= '</title>';
    echo apply_filters( 'df_page_title', $title );
  }

}

if ( ! function_exists( 'df_charset' ) ) {

  /**
   * Output the meta tag for charset
   * @access public
   * @subpackage  Framework/Head
   * @return void
   */
  function df_charset(){
    echo apply_filters( 'df_charset', '<meta charset="'.get_bloginfo( 'charset' ).'">' );
  }

}

if ( ! function_exists( 'df_mobile_meta' ) ) {

  /**
   * Output the meta tag for charset
   * @access public
   * @subpackage  Framework/Head
   * @return void
   */
  function df_mobile_meta(){
    $meta = '<meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
    echo apply_filters( 'df_mobile_meta', $meta );
  }

}

if ( ! function_exists( 'df_google_frame' ) ) {

  /**
   * Output the Google Chrome Frame for IE meta tag 
   * @access public
   * @subpackage  Framework/Head
   * @return void
   */
  function df_google_frame(){
    $meta = '<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->';
    echo apply_filters( 'df_google_frame', $meta );
  }

}

if ( ! function_exists( 'df_favicon' ) ) {

  /**
   * Output the icons & favicon tag 
   * @access public
   * @subpackage  Framework/Head
   * @return void
   */
  function df_favicon(){
    if( file_exists(get_stylesheet_directory().'/favicon.ico') )
      $meta = '<link rel="shortcut icon" href="'.get_stylesheet_directory_uri().'/favicon.ico">';
    else
      $meta = '<link rel="shortcut icon" href="'.get_template_directory_uri().'/favicon.ico">';
    echo apply_filters( 'df_favicon', $meta );
  }

}

if ( ! function_exists( 'df_pingback' ) ) {

  /**
   * Output pingboack link tag 
   * @access public
   * @subpackage  Framework/Head
   * @return void
   */
  function df_pingback(){
    $meta = '<link rel="pingback" href="'.get_bloginfo("pingback_url").'">';
    echo apply_filters( 'df_pingback', $meta );
  }

}

if ( ! function_exists( 'df_html5_shiv' ) ) {

  /**
   * Output html5 shive script tag 
   * @access public
   * @subpackage  Framework/Head
   * @return void
   */
  function df_html5_shiv(){
    $meta = '<!--[if lt IE 9]>
      <script src="'.DF_JS_URL.'html5shiv.js"></script>
    <![endif]-->';
    echo apply_filters( 'df_html5_shiv', $meta );
  }

}

/*===================// CONTENT //===================*/

if ( ! function_exists( 'main_nav_logo' ) ) {

  /**
   * Output the logo
   * @access public
   * @subpackage  Framework/Head
   * @return void
   */
  function df_nav_logo($s){
      return apply_filters( 'df_nav_logo', DF::nav_logo().$s );
  }

}
add_filter( 'df_primary_nav_items', 'df_nav_logo' );

if ( ! function_exists( 'df_begin_content_container' ) ) {

  /**
   * Output opening Content Tags
   * #container->#inner-container
   *
   * @access public
   * @subpackage  Framework/Body
   * @return void
   */
  function df_begin_content_container(){
    $html = '<div id="content"> 
      <div id="inner-content" class="wrap clearfix">';
    echo apply_filters( 'df_begin_content_container', $html );
  }

}
  
  if ( ! function_exists( 'df_begin_main_container' ) ) {

    /**
     * Output opening Main Tags
     * #main
     *
     * @access public
     * @subpackage  Framework/Body
     * @return void
     */
    function df_begin_main_container(){
      $html = '<div id="main" class="clearfix" role="main">';
      echo apply_filters( 'df_begin_main_container', $html );
    }

  }   

  if ( ! function_exists( 'df_title_output' ) ) {

    /**
     * Output Post title
     *
     * @access public
     * @subpackage  Framework/Post
     * @return void
     */
    function df_title_output(){
      if( is_single() || is_page() )
        $html = '<h1>'. get_the_title(). '</h1>';
      else
        $html = '<a href="'.get_permalink().'"><h1>'. get_the_title(). '</h1></a>';
      echo apply_filters( 'df_title_output', $html );
    }

  } 

  if ( ! function_exists( 'df_post_info' ) ) {

    /**
     * Output Post meta details
     *
     * @access public
     * @subpackage  Framework/Post
     * @return void
     */
    function df_post_info(){
      return get_template_part( 'parts/post/loop', 'post-info' );
    }

  } 

  if ( ! function_exists( 'df_post_meta' ) ) {

    /**
     * Output Post meta details
     *
     * @access public
     * @subpackage  Framework/Post
     * @return void
     */
    function df_post_meta(){
      return get_template_part( 'parts/post/loop', 'post-meta' );
    }

  } 

  if ( ! function_exists( 'df_end_main_container' ) ) {

    /**
     * Output closing Main Tags
     * #main
     *
     * @access public
     * @subpackage  Framework/Body
     * @return void
     */
    function df_end_main_container(){
      $html = '</div>';
      echo apply_filters( 'df_end_main_container', $html );
    }

  }

if ( ! function_exists( 'df_end_content_container' ) ) {

  /**
   * Output Content Tags
   * @access public
   * @subpackage  Framework/Body
   * @return void
   */
  function df_end_content_container(){
    $html = '</div></div>';
    echo apply_filters( 'df_end_content_container', $html );
  }

}

if ( ! function_exists( 'df_clear' ) ) {

  /**
   * Output Content Tags
   * @access public
   * @subpackage  Framework/Body
   * @return void
   */
  function df_clear(){
    $html = '<div class="clearfix"></div>';
    echo apply_filters( 'df_clear', $html );
  }

}


/*===================// LOOP //=====================*/

if ( ! function_exists( 'df_404_message' ) ) {

  /**
   * Output 404 Message
   * @access public
   * @subpackage  Framework/Body
   * @return void
   */
  function df_404_message(){
    $html = '<header class="article-header">
      <h1>Post Not Found</h1>
    </header>';
    echo apply_filters( 'df_404_message', $html );
  }

}

/*===================// FOOTER //===================*/

if ( ! function_exists( 'df_copyright' ) ) {

  /**
   * Site Copyright
   * 
   * @since 1.0
   */

  function df_copyright(){
    // if( $DF::get_field('site_copyright') != "" || !$DF::get_field('site_copyright') ) :
    //   echo $DF::get_field('site_copyright');
    // else : 
      $copyright = '<p class="copyright">';
        $copyright .= '&copy; '.date('Y').' '.get_bloginfo('name').' All Rights Reserved. <br>';
        $copyright .= 'Site powered by <a href="http://www.divblend.com" target="_blank">Div Framework</a>.</p>';
      $copyright .= '</p>';
      echo apply_filters( 'df_copyright', $copyright );
    // endif;  
  }

}

if ( ! function_exists( 'df_end_footer_container' ) ) {

  /**
   * Output Footer Closing Tags
   * @access public
   * @subpackage  Framework/Footer
   * @return void
   */
  function df_end_footer_container(){
    $html = '</div></footer>';
    echo apply_filters( 'df_end_footer_container', $html );
  }

}
?>
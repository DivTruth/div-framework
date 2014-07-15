<?php
/**
 * Div Framework Classes
 * Framework class that includes helpful static functions for theme development
 *
 * @author      DivTruth
 * @category    Core
 * @package     Div Framework/Classes
 * @version     1.0
 */

if( ! defined( 'ABSPATH' ) ) exit;

class DF{

	function __construct() {

    }

    /**
     * Rearrange hooks within an action
     *
     * @param string $tag
     * @param array $hooks
     * @return void
     *
     * @since 1.0
     *
     */
    function build_action( $tag, $hooks=array() ){
	    foreach ($hooks as $hook => $priority) {
	      add_action( $tag, $hook, $priority );
	    }
	}

    /**
     * Rearrange hooks within an action
     *
     * @param string $tag
     * @param array $hooks
     * @return void
     *
     * @since 1.0
     *
     */
    static function arrange_action( $tag, $hooks=array() ){
	  $f = $GLOBALS['wp_filter'];
	  
	  if(isset($f[$tag])) {
	    $prev_filter = $f[$tag];
	  } else {
	    return; #nothing to arrange
	  }

	  foreach ($hooks as $hook => $priority) {
	    remove_action($tag, $hook, $prev_filter[$hook])
	    add_action( $tag, $hook, $priority );
	  }
	}
}
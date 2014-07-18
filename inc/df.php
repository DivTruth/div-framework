<?php
/**
 * Div Framework Class
 * Defining some constants, loading all the required files and Adding some core functionality.
 *
 * @author      DivTruth
 * @category    Core
 * @package     Div Framework/Classes
 * @version     1.0
 */

if( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists('DF') ) {

    class DF{

        /**
         * @var string
         */
        public $version = '1.0';

        /**
         * @var DF The single instance of the class
         * @since 1.0
         */
        protected static $_instance = null;

        /**
         * Main DivStarter Instance
         *
         * Ensures only one instance of DivStarter is loaded or can be loaded.
         *
         * @since 1.0
         * @static
         * @see DIV()
         * @return DivStarter - Main instance
         */
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        function __construct() {
            # Define constants
            $this->define_constants();

            # If child theme active, then start the DF engine, else load splash page
            if( DIV_NAME != "Div Framework")
                $this->df_engine();
            else
                add_action( 'template_redirect', array( $this,'df_fallback') );

        }

        /**
         * Cloning is forbidden.
         *
         * @since 2.1
         */
        public function __clone() {
            _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'divstarter' ), '2.1' );
        }

        /**
         * Unserializing instances of this class is forbidden.
         *
         * @since 2.1
         */
        public function __wakeup() {
            _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'divstarter' ), '2.1' );
        }

        /**
         * Define DIV Constants
         */
        public function define_constants() {

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
             * Parent theme path constants
             */
            define( 'DIV_NAME',             wp_get_theme() );
            define( 'DIV_APPEARANCE_DIR',   TEMPLATEPATH.'/appearance/' );
            define( 'DIV_APPEARANCE_URL',   get_template_directory_uri().'/appearance/' );
            define( 'DIV_INC_DIR',          TEMPLATEPATH.'/inc/' );
            define( 'DIV_INC_URL',          get_template_directory_uri().'/inc/' );
            define( 'DIV_IMAGES_DIR',       DIV_APPEARANCE_DIR.'images/' );
            define( 'DIV_IMAGES_URL',       DIV_APPEARANCE_URL.'images/' );
            define( 'DIV_JS_DIR',           DIV_INC_DIR.'js/' );
            define( 'DIV_JS_URL',           DIV_INC_URL.'js/' );

            /**
             * Child theme path constants
             */
            define( 'THEME_NAME',           wp_get_theme() );
            define( 'THEME_APPEARANCE_DIR', get_stylesheet_directory().'/appearance/' );
            define( 'THEME_APPEARANCE_URL', get_stylesheet_directory_uri().'/appearance/' );
            define( 'THEME_INC_DIR',        get_stylesheet_directory().'/inc/' );
            define( 'THEME_INC_URL',        get_template_directory_uri().'/inc/' );
            define( 'THEME_IMAGES_DIR',     THEME_APPEARANCE_DIR.'images/' );
            define( 'THEME_IMAGES_URL',     THEME_APPEARANCE_URL.'images/' );
            define( 'THEME_JS_DIR',         THEME_INC_DIR.'js/' );
            define( 'THEME_JS_URL',         THEME_INC_URL.'js/' );

        }

        /**
         * DF Engine
         *
         * @return void
         *
         * @since 1.0
         *
         */
        function df_engine(){
            require_once( DIV_INC_DIR.'/div.php' );
            require_once( DIV_INC_DIR.'/admin.php' );
            require_once( DIV_INC_DIR.'/div-filters.php' );  #Include Div Framework Filters
            require_once( DIV_INC_DIR.'/div-hooks.php' );    #Include Div Framework Hooks

            if( file_exists(THEME_INC_DIR.'sidebars.php') )
                require_once(THEME_INC_DIR.'sidebars.php');
        }

        /**
         * DF Fallback
         *
         * @return void
         *
         * @since 1.0
         *
         */
        function df_fallback(){
            include( get_template_directory() . '/fallback.php' );
            exit;
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
        static function add_action( $tag, $hooks=array() ){
            $prev_filter = array();
            $f = $GLOBALS['wp_filter'];
            if(isset($f[$tag])) {
                foreach($f[$tag] as $p => $h) {
                    foreach($h as $t => $args) {
                        $prev_filter[$t] = $p;
                    }
                }
            } 

            foreach ($hooks as $hook => $priority) {
                if( array_key_exists ($hook, $prev_filter) )
                    remove_action($tag, $hook, $prev_filter[$hook]);
                add_action( $tag, $hook, $priority );
            }
    	}
    }

    function Div_Framework() {
        return DF::instance();
    }

    Div_Framework();
}
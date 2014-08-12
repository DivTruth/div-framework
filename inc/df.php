<?php
/**
 * Div Framework Class
 * Defining some constants, loading all the required files and Adding some core functionality.
 *
 * @author      Div Blend Team
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
        public static $version = '0.2.6';

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
            if( DF_NAME != "Div Framework")
                $this->df_engine();
            else
                add_action( 'template_redirect', array( $this,'df_fallback') );
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
            require_once( DF_INC_DIR.'/engine.php' );
            require_once( DF_INC_DIR.'/admin.php' );
            require_once( DF_INC_DIR.'/df-filters.php' );  #Include Div Framework Filters
            require_once( DF_INC_DIR.'/df-hooks.php' );    #Include Div Framework Hooks
            
            #register default sidebars from Div Framework or custom sidebars from child theme
            get_template_part('inc/register-sidebars');

            #register customizer options
            add_action('customize_register', array( $this, 'df_customizer') );
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
         * Cloning is forbidden.
         *
         * @since 2.1
         */
        public function __clone() {
            _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', DF_TEXT_DOMAIN ), '2.1' );
        }

        /**
         * Unserializing instances of this class is forbidden.
         *
         * @since 2.1
         */
        public function __wakeup() {
            _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', DF_TEXT_DOMAIN ), '2.1' );
        }

        /**
         * Define DIV Constants
         */
        public function define_constants() {

            /**
             * CONSTANT: Theme Options Prefix
             * This constant is used for retrieving theme defined options from the options table.
             *
             * @example get_option(DF_OPTION.'framework_version');
             * @since   1.0
             */
            if(!defined('DF_OPTION')) define('DF_OPTION', 'df_option_');

            /**
             * CONSTANT: Div Framework Version
             * theme version number for appending to script and style enqueue
             *
             * @since   1.0
             */
            $theme_data = wp_get_theme();
            define('DF_THEME_VERSION', $theme_data['Version']);

	        /**
	         * CONSTANT: Div Framework Text Domain
	         * Used for internationalization or multi-language methods
	         *
	         * @since   1.0
	         */
	        define('DF_TEXT_DOMAIN', 'div_framework');

            /**
             * Parent theme path constants
             */
            define( 'DF_NAME',             wp_get_theme() );
            define( 'DF_APPEARANCE_DIR',   TEMPLATEPATH.'/appearance/' );
            define( 'DF_APPEARANCE_URL',   get_template_directory_uri().'/appearance/' );
            define( 'DF_INC_DIR',          TEMPLATEPATH.'/inc/' );
            define( 'DF_INC_URL',          get_template_directory_uri().'/inc/' );
            define( 'DF_IMAGES_DIR',       DF_APPEARANCE_DIR.'images/' );
            define( 'DF_IMAGES_URL',       DF_APPEARANCE_URL.'images/' );
            define( 'DF_JS_DIR',           DF_INC_DIR.'js/' );
            define( 'DF_JS_URL',           DF_INC_URL.'js/' );

            /**
             * Child theme path constants
             */
            define( 'THEME_NAME',           wp_get_theme() );
            define( 'THEME_APPEARANCE_DIR', get_stylesheet_directory().'/appearance/' );
            define( 'THEME_APPEARANCE_URL', get_stylesheet_directory_uri().'/appearance/' );
            define( 'THEME_INC_DIR',        get_stylesheet_directory().'/inc/' );
            define( 'THEME_INC_URL',        get_stylesheet_directory_uri().'/inc/' );
            define( 'THEME_IMAGES_DIR',     THEME_APPEARANCE_DIR.'images/' );
            define( 'THEME_IMAGES_URL',     THEME_APPEARANCE_URL.'images/' );
            define( 'THEME_JS_DIR',         THEME_INC_DIR.'js/' );
            define( 'THEME_JS_URL',         THEME_INC_URL.'js/' );

        }

        /**
         * DF Customizer
         *
         * @param wp_customizer
         * @return void
         *
         * @since 1.0
         *
         */
        function df_customizer( $wp_customize ) {

            /**
             * Setup nav_logo
             */
            $wp_customize->add_section( 'df_nav_logo_section', array(
                'title'         => __( 'Navigation Logo', 'div-framework' ),
                'priority'      => 120,
                'description'   => 'Upload a logo if you wish to include within the navigation bar',
            ) );
            $wp_customize->add_setting( 'df_nav_logo' );
            $wp_customize->add_setting( 'df_nav_logo_float', array('default'   => 'left') );
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'df_nav_logo', array(
                'label'     => __( 'Logo', 'div-framework' ),
                'section'   => 'df_nav_logo_section',
                'settings'  => 'df_nav_logo',
            ) ) );

            $wp_customize->add_control(
                'df_nav_logo_float',
                array(
                    'type' => 'select',
                    'label' => 'Alignment',
                    'section' => 'df_nav_logo_section',
                    'choices' => array(
                        'left' => 'Left',
                        'right' => 'Right',
                    ),
                )
            );
        }

        public static function nav_logo(){
            $align = ( get_theme_mod( 'df_nav_logo_float' ) ) ? "float:".esc_attr( get_theme_mod( 'df_nav_logo_float' ) ).";" : "";
            if ( get_theme_mod( 'df_nav_logo' ) ) :
                $nav_logo = '<li class="logo" style="'.$align.'">
                    <a href="'.esc_url( home_url() ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">
                        <img src="'.esc_url( get_theme_mod( 'df_nav_logo' ) ).'" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'">
                    </a>
                </li>';
                return apply_filters( 'nav_logo', $nav_logo );
            else :
                return null;
            endif;
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
        public static function add_action( $tag, $hooks=array() ){
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
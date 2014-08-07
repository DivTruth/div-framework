<?php
/**
 * @package Div Framework
 * @since 	1.0
 *
 * BEFORE YOU CHANGE ANYTHING:
 * Please note that you shouldn't need to change anything in this file. To control how the page is built, 
 * please consider using actions like add_action('df_head', 'new_function_name') to control 
 * elements loaded on the page. 
 */
?>

<!doctype html>  

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
	<head>
		<?php 
		/**
		 * df_head hook
		 *
		 * @hooked df_page_title - 10
		 * @hooked df_charset - 15
		 * @hooked df_google_frame - 20
		 * @hooked df_mobile_meta - 25
		 * @hooked df_favicon - 30
		 * @hooked df_pingback - 35
		 * @hooked df_html5_shiv - 40
		 */
		do_action('df_head'); ?>

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
	</head>
	
	<body <?php body_class(); ?> style="<?php echo apply_filters('body_styles', ''); ?>">

		<div id="container">
			<header class="header">
				
				<?php df_top_nav(); ?>

				<?php get_template_part('parts/header/part','mobile-menu'); ?>

				<div id="inner-header" class="wrap clearfix">
					
					<?php get_template_part('parts/header/part','titlespace'); ?>
					
				</div> <!-- end #inner-header -->
					
				<?php df_primary_nav(); ?>
			
			</header> <!-- end header -->
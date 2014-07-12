<?php
/**
 * @package Div Framework
 * @since 	1.0
 *
 * BEFORE YOU CHANGE ANYTHING:
 * Please note that you shouldn't need to change anything in this file. To control how the page is built, 
 * please consider using actions like add_action('build_theme_head', 'new_function_name') to control 
 * elements loaded on the page. Alternatively you can also edit files like part.head-meta.inc.php or 
 * better yet, create that file in yoru child theme to overwrite it completely.
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
		 * div_head hook
		 *
		 * @hooked div_page_title - 10
		 * @hooked div_charset - 15
		 * @hooked div_google_frame - 20
		 * @hooked div_mobile_meta - 25
		 * @hooked div_favicon - 30
		 * @hooked div_pingback - 35
		 * @hooked div_html5_shiv - 40
		 */
		do_action('div_head'); ?>

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
	</head>
	
	<body <?php body_class(); ?> style="opacity:0;filter: alpha(opacity=0); display:none;">

		<div id="container">
			<header class="header">

				<?php get_template_part('templates/header','mobile-menu') ?>

				<div id="inner-header" class="wrap clearfix">
					
					<?php get_template_part('templates/header','titlespace') ?>
					
					<nav id="full" class="full" role="navigation">
						<?php div_main_nav(); ?>
					</nav>

				</div> <!-- end #inner-header -->
			
			</header> <!-- end header -->
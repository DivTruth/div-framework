<?php
/**
 * @package Div Framework
 * @since 	1.0
 *
 * BEFORE YOU CHANGE ANYTHING:
 * Please note that you shouldn't need to change anything in this file. To control how the page is built, 
 * please consider using actions like add_action('div_head', 'new_function_name') to control 
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
	
	<?php 
	/**
	 * The body is hidden until the CSS is loaded so that nothing appears until it is styled,
	 * therefore the CSS must reset this to be displayed.
	 */ ?>
	<body <?php body_class(); ?>>

		<div style="margin: 20px auto; text-align: center;">
			<img src="<?php echo DF_APPEARANCE_URL; ?>images/header-logo.png">
		</div>
		<div id="welcome_container" style="border-radius:10px; background:#eee; border: 1px solid #ccc; margin: 20px auto; padding:40px; max-width: 800px; width: 80%;">
			<h1>Welcome to the Div Framework</h1>
			<p>You have successfully installed and activated the Div Framework, but as a framework it requires now a child theme. This can be done with our <a href="#" onclick="return false;">single-click child-theme installer</a>, or if you have you're own child theme you wish to use you can simply install it in the themes directory and activate it.</p>
		</div>
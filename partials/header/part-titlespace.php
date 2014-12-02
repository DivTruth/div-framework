<div id="header-top" class="clearfix">
	<div id="logo-wrap">
		<?php do_action( 'df_insert_logo' ); // Used by customizer ?>
		<!-- to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> -->
		<p class="h1 logo"><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></p>
		<!-- if you'd like to use the site description you can un-comment it below -->
		<p class="desc"><?php bloginfo('description'); ?></p>
	</div>
</div>
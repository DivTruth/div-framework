<?php
/**
 * The template for displaying featured content
 *
 * @package Div Framework
 * @since 1.0
 */
?>

<div id="featured-content" class="featured-content">
	<div class="featured-content-inner">
	<?php
		/**
		 * Fires before the featured content.
		 */
		do_action( 'div_featured_posts_before' );

		# Setup custom loop
		$featured_posts = get_posts();
		foreach ( (array) $featured_posts as $order => $post ) :
			setup_postdata( $post );

			 // Include the featured content template.
			get_template_part( 'content', 'featured-post' );
		endforeach;

		/**
		 * Fires after the featured content.
		 */
		do_action( 'div_featured_posts_after' );

		wp_reset_postdata();
	?>
	</div><!-- .featured-content-inner -->
</div><!-- #featured-content .featured-content -->

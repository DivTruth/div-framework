<?php
/**
 * @package Div Framework
 * @since   1.0
*/
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php 
	/**
	 * div_post_content hook
	 *
	 * @hooked div_title_output - 10
	 * @hooked div_post_info - 15 (if single)
	 * @hooked the_content - 20
	 * @hooked div_clear - 25
	 */
	do_action('div_post_content'); ?>

    <?php do_action('before_post_close'); ?>

</div><!-- #post-## -->

<?php //echo apply_filters( 'wlfw_entry-meta', '<div class="entry-meta">'. wlfw_posted_in(). '</div><!-- .entry-meta -->'); ?>
<?php //do_action('wlfw_comments_template', '', true); ?>
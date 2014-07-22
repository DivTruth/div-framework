<?php
/**
 * @package Div Framework
 * @since   1.0
*/
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php 
	/**
	 * df_post_content hook
	 *
	 * @hooked df_title_output - 10
	 * @hooked df_post_info - 15 (if single)
	 * @hooked the_content - 20
	 * @hooked df_post_meta - 25
	 * @hooked df_clear - 30
	 */
	do_action('df_post_content'); ?>

    <?php do_action('before_post_close'); ?>

</div><!-- #post-## -->

<?php //echo apply_filters( 'wlfw_entry-meta', '<div class="entry-meta">'. wlfw_posted_in(). '</div><!-- .entry-meta -->'); ?>
<?php //do_action('wlfw_comments_template', '', true); ?>
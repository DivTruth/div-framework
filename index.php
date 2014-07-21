<?php
/**
 * @package Div Framework
 * @since   1.0
*/
?>

<?php get_header(); ?>

    <?php 
    /**
     * df_begin_content hook
     *
     * @hooked df_begin_content_container - 10
     * @hooked df_begin_main_container - 15
     */
    do_action('df_begin_content') ?>
         
        <?php #The Loop ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>   

            <?php do_action('df_before_loop_content') ?>

                <?php 
                /*
                 * Include the post format-specific template for the content. If you want to
                 * use this in a child theme, then include a file called called content-___.php
                 * (where ___ is the post format) and that will be used instead.
                 * NOTE: content.php is the default format
                 */
                get_template_part( 'content', get_post_format() ); ?>                 
            
            <?php do_action('df_after_loop_content') ?>

        <?php endwhile; ?>

            <?php //TODO: Pagination functionality ?>
    
        <?php else : ?>
            
            <?php 
            /**
             * df_post_not_found hook
             *
             * @hooked df_end_main_container - 5
             * @hooked df_load_sidebar - 10
             * @hooked df_end_content_container - 15
             */
            _e('<article id="post-not-found" class="hentry clearfix">');
                do_action('df_post_not_found'); 
            _e('</article>'); ?>
    
        <?php endif; ?>
                  
    <?php 
    /**
     * df_end_content hook
     *
     * @hooked df_end_main_container - 5
     * @hooked get_sidebar - 10
     * @hooked df_end_content_container - 15
     */
    do_action('df_end_content') ?>

<?php get_footer(); ?>
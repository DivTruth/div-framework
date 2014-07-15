<?php
/**
 * @package Div Framework
 * @since   1.0
*/
?>

<?php get_header(); ?>

    <?php 
    /**
     * div_begin_content hook
     *
     * @hooked div_begin_content_container - 10
     * @hooked div_begin_main_container - 15
     */
    do_action('div_begin_content') ?>
         
        <?php #The Loop ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>   

            <?php do_action('div_before_loop_content') ?>

                <?php 
                /*
                 * Include the post format-specific template for the content. If you want to
                 * use this in a child theme, then include a file called called content-___.php
                 * (where ___ is the post format) and that will be used instead.
                 * NOTE: content.php is the default format
                 */
                get_template_part( 'content', get_post_format() ); ?>                 
            
            <?php do_action('div_after_loop_content') ?>

        <?php endwhile; ?>

            <?php //TODO: Pagination functionality ?>
    
        <?php else : ?>
            
            <?php 
            /**
             * div_post_not_found hook
             *
             * @hooked div_end_main_container - 5
             * @hooked div_load_sidebar - 10
             * @hooked div_end_content_container - 15
             */
            _e('<article id="post-not-found" class="hentry clearfix">');
                do_action('div_post_not_found'); 
            _e('</article>'); ?>
    
        <?php endif; ?>
                  
    <?php 
    /**
     * div_end_content hook
     *
     * @hooked div_end_main_container - 5
     * @hooked get_sidebar - 10
     * @hooked div_end_content_container - 15
     */
    do_action('div_end_content') ?>

<?php get_footer(); ?>
<?php get_header(); ?>

    <?php 
    /**
     * div_begin_content hook
     *
     * @hooked div_begin_content_container - 10
     * @hooked div_begin_content_container - 15
     */
    do_action('div_begin_content') ?>
         
        <?php #The Loop ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>   

            <?php get_template_part( 'loop', 'main' ); ?>                  
    
        <?php endwhile; ?>  
    
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
     * @hooked div_load_sidebar - 10
     * @hooked div_end_content_container - 15
     */
    do_action('div_end_content') ?>

<?php get_footer(); ?>
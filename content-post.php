<?php
/**
 * The template for displaying posts in the Aside post format
 *
 * @package Div Framework
 * @since 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

    <header class="article-header">

        <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
        <p class="byline vcard"><?php
            printf(__('<time class="updated" datetime="%1$s" pubdate>%2$s @ %3$s </time>', 'divtruth'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_time('g:iA'));
            printf(__('<span class="tags">%1$s</span', 'divtruth'), get_the_category_list(', '));
        ?></p>

    </header> <!-- end article header -->

    <section class="entry-content clearfix">
        <?php the_content(); ?>
    </section> <!-- end article section -->

    <footer class="article-footer">
        <p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'divtruth') . '</span> ', ', ', ''); ?></p>
    </footer> <!-- end article footer -->
    
</article> <!-- end article -->
<?php 

ob_start();
comments_number( '0 Comments', '1 Comment', '% Comments' );
$get_comments_number_html = ob_get_clean(); ?>

<?php //TODO: Need to remove font awesome, add through filter in child ?>
<ul class="post-info">
  <li class="post-date"><i class="fa fa-calendar"></i><?php apply_filters('post_info_date', the_time('F jS Y') ); ?></li>
  <li class="post-author"><i class="fa fa-user"></i><?php apply_filters('post_info_author', the_author() ); ?></li>
  <li class="post-comment-count"><i class="fa fa-comments"></i>
    <a href="<?php get_comments_link() ?>" title="Comment on <?php the_title() ?>"><?php echo $get_comments_number_html ?></a>
  </li>
</ul>
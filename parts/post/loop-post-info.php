<?php 

ob_start();
comments_number( '0 Comments', '1 Comment', '% Comments' );
$get_comments_number_html = ob_get_clean(); ?>

<ul class="post-info">
  <li class="post-date"><?php apply_filters('post_info_date', get_the_time('F jS Y') ); ?></li>
  <li class="post-author"><?php apply_filters('post_info_author', get_the_author() ); ?></li>
  <?php $comments_count = '<a href="'.get_comments_link().'" title="Comment on '.get_the_title().'">'.$get_comments_number_html.'</a>'; ?>
  <li class="post-comment-count"><?php apply_filters('post_info_comments_count', $comments_count ); ?></li>
</ul>
<?php
/**
 * @package Div Framework
 * @since   1.0
 *
*/
?>
<div id="sidebars" class="sidebar fourcol last clearfix">
  <div id="sidebar1" class="sidebar" role="complementary">

    <?php if ( is_active_sidebar( 'primary' ) ) : ?>

      <?php dynamic_sidebar( 'primary' ); ?>

    <?php else : ?>
    <?php endif; ?>

  </div>

  <div id="sidebar2" class="sidebar" role="complementary">

    <?php if ( is_active_sidebar( 'secondary' ) ) : ?>

      <?php dynamic_sidebar( 'secondary' ); ?>

    <?php else : ?>
    <?php endif; ?>

  </div>
</div>
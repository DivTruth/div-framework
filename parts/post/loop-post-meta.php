<footer class="post-meta">
  <?php 
    $posted_in = '';
    // Retrieves tag list of current post, separated by commas.
    $tag_list = get_the_tag_list( '', ', ' );
    if ( $tag_list ) {
        $posted_in = __( '<span class="intro">This entry was posted in </span>%1$s and tagged %2$s.', 'wlfw' );
    } elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
        $posted_in = __( '<span class="intro">This entry was posted in </span>%1$s.', 'wlfw' );
    }
    $posted_in .= ' <span class="permalink bookmark">'.__( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'wlfw' ).'</span>';
    // Prints the string, replacing the placeholders.
    echo sprintf(
        $posted_in,
        get_the_category_list( ', ' ),
        $tag_list,
        get_permalink(),
        the_title_attribute( 'echo=0' )
    );
  ?>
</footer>


<article id="post-<?php the_id(); ?>" <?php post_class('full-post'); ?>>
    <?php    
    if(has_post_thumbnail() ) {
        print '<div class="post-thumbnail">';
        the_post_thumbnail(array( 1024, 1024 ));
        print '</div>';
    }

    // since 1.2.2
    do_action( 'before_page_content' );

    ?>
    <div class="post-content">
    <?php the_content(); ?>
    </div>
    <?php
    global $numpages;
        
    if($numpages > 1 ) {
        print '<div class="post-pages">';
        wp_link_pages();
        print '</div>';            
    }
    
    // since 1.2.2
    do_action( 'after_page_content' );
    
    ?>
</article>


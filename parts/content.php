

<article id="post-<?php the_id(); ?>" <?php post_class('full-post'); ?>>
    <div class="post-meta">
        <span class="post-author"><i class="fas fa-user"></i> <?php the_author(); ?></span>
        <span class="post-date"><i class="fas fa-calendar"></i> <?php the_date(); ?></span>
        <span class="post-categories"><i class="fas fa-folder"></i> <?php tdt_one_the_category(); ?></span>
    </div>
    <?php    
    if(has_post_thumbnail() ) {
        print '<div class="post-thumbnail">';
        the_post_thumbnail(array( 1024, 1024 ));
        print '</div>';
    }

    // since 1.2.2
    do_action( 'before_post_content' );

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
    ?>
    <div class="post-tags">
    <?php the_tags('<span class="label">' . __('Tags', 'tdt-one') . '</span><span class="tag">', '</span>, <span class="tag">', '</span>'); ?>
    </div>
    <?php

    // since 1.2.2
    do_action( 'after_post_content' );
    ?>
    <div class="prev-next-post-links ts-ns-2 ts-s-align-center">
        <div><?php previous_post_link(); ?></div>
        <div class="ts-ns-align-right"><?php next_post_link(); ?></div>
    </div>
    <?php
    if( tdt_one_show_comments() ) {
        comments_template();
    }
    ?>
</article>


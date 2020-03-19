
<!-- excerpt-quote -->
<article id="post-<?php the_id(); ?>" <?php post_class(); ?>>
    <meta content="<?php the_author(); ?>" />
    <meta content="<?php tdt_one_the_date(); ?>" />
    <meta content="<?php the_permalink(); ?>" />
    <div class="post-content">
        <a href="<?php echo esc_url( get_the_permalink() ); ?>">
            <?php
            $content = get_the_content();
                    
            print tdt_one_wrap_with_blockquote($content);
            ?>
        </a>
    </div>
</article>


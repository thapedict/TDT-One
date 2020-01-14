
<!-- excerpt-quote -->
<article id="post-<?php the_id(); ?>" <?php post_class(); ?>>
    <meta content="<?php the_author(); ?>" />
    <meta content="<?php tdt_one_the_date(); ?>" />
    <meta content="<?php the_permalink(); ?>" />
    <div class="post-content">
    <?php
    $content = get_the_content();
            
    print tdt_one_wrap_with_blockquote($content);
    ?>
    </div>
</article>


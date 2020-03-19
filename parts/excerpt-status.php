
<!-- excerpt-status -->
<article id="post-<?php the_id(); ?>" <?php post_class(); ?>>
    <div class="post-content">
        <a href="<?php echo esc_url( get_the_permalink() ); ?>">
            <?php the_content(); ?>
        </a>
    </div>
    <div class="post-meta align-center">
        <span class="post-date"><i class="fas fa-calendar"></i> <?php tdt_one_the_date(); ?></span>
    </div>
</article>


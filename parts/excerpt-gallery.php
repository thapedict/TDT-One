
<!-- excerpt-gallery -->
<article id="post-<?php the_id(); ?>" <?php post_class('post-excerpt'); ?>>
    <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="post-meta">
        <span class="post-date"><i class="fas fa-calendar"></i> <?php tdt_one_the_date(); ?></span>
        <span class="post-categories"><i class="fas fa-folder"></i><?php tdt_one_the_category(); ?></span>
    </div>
    <div class="post-excerpt">
    <?php 
    the_excerpt();
    ?>
    </div>
    <div class="other-links" class="ts-dl-1-2 small">
        <div class="post-more">
    <?php printf('<a href="%s" class="button">%s</a>', tdt_one_esc_permalink(), __('Read More', 'tdt-one')); ?>
        </div>
    </div>
</article>


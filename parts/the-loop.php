
<div id="main-content" class="doing-the-loop">
    <?php
    while( have_posts() ) {
        the_post();

        get_template_part('parts/excerpt', get_post_format());
    }    

    the_posts_navigation(
        array( 
                'prev_text' => __('&larr; Previous Posts', 'tdt-one'),
                'next_text' => __('Next Posts &rarr;', 'tdt-one')
        )
    );
    ?>
</div>

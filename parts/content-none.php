

<article id="post-0"  class="align-center post no-results not-found">
    <div class="wrap">
        <h2>
            <?php
            // no posts
            if(is_search() ) {
                _e('This search returned an empty result', 'tdt-one');
            } elseif(is_category() || is_tag() ) {
                _e('This term has no posts associated with it', 'tdt-one');
            } else {
                    _e('Nothing Found', 'tdt-one');
            }
            ?>
        </h2>
        <h4><?php _e('Try search using different keywords', 'tdt-one'); ?></h4>
    <?php
    get_search_form();
    ?>
    </div>
</article>


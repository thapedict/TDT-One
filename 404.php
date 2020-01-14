<?php

get_header();

?>

<section id="main">
<div class="container">
    <div id="main-content">
        <article id="post-0"  class="align-center post no-results not-found">
            <div class="wrap">
                <h2><?php _e('The page you are looking for cannot be found.', 'tdt-one'); ?></h2>
                <h4><?php _e('Try using search form below.', 'tdt-one'); ?></h4>
                <?php
                    get_search_form();
                ?>
            </div>
        </article>
    </div>
</div>
</section>

<?php

get_footer();

?>


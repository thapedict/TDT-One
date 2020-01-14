<?php

do_action('before_sidebar', 'page_sidebar');

    echo '<div id="page-sidebar" class="ts-m-2">';

        dynamic_sidebar('page_sidebar');

    echo '</div><!-- #page-sidebar -->';

do_action('after_sidebar', 'page_sidebar');

?>


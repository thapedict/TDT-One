<?php

do_action('before_sidebar', 'footer_sidebar');

if ( is_active_sidebar('footer_sub_1_sidebar') ||
    ( is_active_sidebar('footer_sub_2_sidebar') || is_active_sidebar('footer_sub_3_sidebar') ) ):
    ?>
    <section id="footer-sidebar">
        <div class="container smaller">
        <div class="ts-dl-2">
            <div id="left">
                <?php dynamic_sidebar('footer_sub_1_sidebar'); ?>
            </div>
            <div id="right" class="ts-ns-2">
                <div>
                    <?php dynamic_sidebar('footer_sub_2_sidebar'); ?>
                </div>
                <div>
                    <?php dynamic_sidebar('footer_sub_3_sidebar'); ?>
                </div>
            </div>
        </div>
        </div>
    </section>
    <?php
endif;

do_action('after_sidebar', 'footer_sidebar');

?>


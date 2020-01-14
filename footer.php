<?php

do_action('body_footer_before');

?>

<footer>
    <?php
    get_sidebar('footer');
    ?>
    <section id="footer-strip">
        <div class="container">
            <div class="align-center">
                <span id="copyright-notice"><?php tdt_one_copyright(); ?></span> | 
                <?php tdt_one_credits(); ?>
            </div>
        </div>
    </section><!-- #footer-strip -->
</footer>

<?php

wp_footer();

?>

</body>
</html>


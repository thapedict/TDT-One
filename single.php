<?php

get_header();

the_post();
?>

<section id="main-content">
<div class="container">
    <div class="ts-dl-2-1 ts-sm-vs-2">
    <?php
    get_template_part('parts/content', get_post_format());
            
    get_sidebar();
    ?>
    </div>
</div>
</section>

<?php

get_footer();

?>


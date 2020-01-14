<?php

get_header();

the_post();
?>

<section id="main">
<div class="container">
    <div class="ts-dl-2-1 ts-sm-vs-2">
    <?php        
    get_template_part('parts/content', 'page');
            
    get_sidebar();
    ?>
    </div>
</div>
</section>

<?php

get_footer();

?>


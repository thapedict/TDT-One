<?php
/**
Template Name: Fixed Width Sidebar
Template Post Type: post, page, product
*/

// remove page-full-width
tdt_one_remove_full_width();

get_header();

the_post();
?>

<section id="main-content">
<div class="container">
    <div class="ts-dl-2-1 ts-sm-vs-2">
    <?php
    if( is_page() ) {
        get_template_part( 'parts/content', 'page' );
    } else {
        get_template_part('parts/content', get_post_format());
    }
            
    get_sidebar();
    ?>
    </div>
</div>
</section>

<?php

get_footer();

?>


<?php
/**
Template Name: No Sidebar
Template Post Type: post, page, product
*/
?>

<?php
get_header();

the_post();
?>

<section id="main">
<div class="container">
<?php
    if( is_page() ) {
        get_template_part( 'parts/content', 'page' );
    } else {
        get_template_part( 'parts/content' );
    }
?>
</div>
</section>

<?php

get_footer();

?>
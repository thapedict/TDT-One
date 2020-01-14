<?php
/**
Template Name: Full Width Post
Template Post Type: post, product
*/
?>

<?php
get_header();

the_post();
?>

<section id="main">
<div class="container">
<?php        
get_template_part('parts/content');
?>
</div>
</section>

<?php

get_footer();

?>
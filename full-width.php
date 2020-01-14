<?php
/**
Template Name: Full Width
*/
?>

<?php
get_header();

the_post();
?>

<section id="main">
<div class="container">
<?php        
get_template_part('parts/content', 'page');
?>
</div>
</section>

<?php

get_footer();

?>
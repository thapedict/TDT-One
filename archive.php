<?php

get_header();

// @since 1.2.2
$archive_description = get_the_archive_description();

if( $archive_description ):
?>
<section id="description">
    <div class="container align-center">
        <?php echo wp_kses_post( wpautop( $archive_description ) ); ?>
    </div>
</section>
<?php endif; ?>

<section id="main">
    <div class="container">
    <?php
    if(have_posts() ) {
                
        echo '<div class="ts-dl-2-1 ts-sm-vs-2">';
                
        get_template_part('parts/the-loop');
                        
        get_sidebar();
                        
        echo '</div>';
                
    } else {
        get_template_part('parts/content-none');
    }
    ?>
    </div>
</section>

<?php

get_footer();

?>


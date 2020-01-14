<?php

get_header();

?>

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


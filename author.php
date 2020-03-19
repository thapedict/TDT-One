<?php

get_header('no-title');

?>
<section id="main-title">
    <div class="container align-center">
        <h1 id="main-title">
            <span><?php the_archive_title(); ?></span>
        </h1>
    </div>
</section>
<section id="main">
    <div class="container">
    <?php
    if(have_posts() ) {
                
        echo '<div class="ts-dl-2-1 ts-sm-vs-2">';
        
        echo '<div class="first-col">'; // first-col
            $user_id = get_the_author_meta('ID');
            $author = get_userdata($user_id);
        
            if( ! $author ){
                return;
            }
        
            $name = esc_html( $author->display_name );
            $bio = esc_html( $author->description );
            $url = esc_url( get_author_posts_url($user_id) );
            ?>
            <div class="about-the-author">
                <h3 class="about"><?php _e( 'About The author', 'tdt-one' ); ?>:</h3>
                <div class="author">
                    <?php echo get_avatar( $user_id, 150, 'mystery' ); ?>
                    <h5 class="name"><?php echo $name; ?></h5>
                    <?php
                        tdt_one_social_icons();
                    ?>
                </div>
                <p class="bio"><?php echo $bio; ?></p>
            </div>
            <?php
            get_template_part('parts/the-loop');
        echo '</div>'; // first-col
                        
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


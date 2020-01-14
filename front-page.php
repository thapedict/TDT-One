<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    wp_head();
    ?>
    
</head>

<body <?php body_class( 'front-page' ); ?>>
<header>
    <section id="site-header-wrapper">
        <div class="container">
            <div id="site-header" class="align-center">
                <?php
                    tdt_one_site_header(array( 'print_description' => true ));
                ?>
            </div>
            <div id="menu-wrap" class="ts-ns-3-1 ts-s-1-3">
                <div id="menu">
                    <?php
                        tdt_one_header_menu();
                    ?>
                </div>
                <div id="social" class="align-right">
                    <?php
                        tdt_one_social_icons();
                    ?>
                </div>
            </div>
        </div>
    </section>
</header>

<?php

    do_action('after_header');

?>
<section id="main">
    <div class="container">
        <?php
            if(is_home()&&is_front_page()){
                if(have_posts() ) {
                    get_template_part('parts/the-loop');
                } else {
                    get_template_part('parts/content-none');
                }
            } else {
                the_post();
                
                get_template_part('parts/content', 'page');
            }
        ?>
    </div>
</section>

<?php

    get_footer();

?>


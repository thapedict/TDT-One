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

<body <?php body_class(); ?>>

<?php

do_action('body_header_before');

?>

<header>
    <section id="site-header-wrapper">
        <div class="container">
            <?php
                tdt_one_woo_site_header_menu();
            ?>
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

do_action('body_header_after');

// print title on all pages/posts
if(! is_home() && ! is_front_page() ) {
    printf(
        '<section id="main-title">
            <div class="container align-center">
                <h1 id="main-title"><span>%s</span></h1>
            </div>
        </section>', wp_kses_post( tdt_one_wp_title() )
    );
}

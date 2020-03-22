<?php

/**
 *  Add theme settings section
 */
function tdt_one_customize_theme_settings_section( $customize )
{
    $customize->add_section(
        'tdt_one_theme_settings',
        array(
            'title' => __('Theme Settings', 'tdt-one'),
        )
    );
}
add_action('customize_register', 'tdt_one_customize_theme_settings_section');

/**
 *  We will handle the live preview
 */
function tdt_one_customize_blogname_live_preview( $customize )
{
    $customize->get_setting('blogname')->transport = 'postMessage';
    $customize->get_setting('blogdescription')->transport = 'postMessage';
    $customize->get_setting('header_textcolor')->transport = 'postMessage';
}
add_action('customize_register', 'tdt_one_customize_blogname_live_preview');

function tdt_one_customize_social_links( $customize )
{
    $customize->add_section('tdt_one_social_links', array( 'title' => __('Social Links', 'tdt-one'), 'priority' => 60 ));
    
    // DRY
    $link_settings = array(
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'postMessage'
    );

    // facebook link
    $customize->add_setting('tdt_one_social_link_facebook', $link_settings );
    $customize->add_control(
        new WP_Customize_Control(
            $customize, 'tdt_one_social_link_facebook',
            array( 'label' => __('Facebook Link', 'tdt-one'), 'section' => 'tdt_one_social_links' ) 
        ) 
    );
    // twitter link
    $customize->add_setting('tdt_one_social_link_twitter', $link_settings );
    $customize->add_control(
        new WP_Customize_Control(
            $customize, 'tdt_one_social_link_twitter',
            array( 'label' => __('Twitter Link', 'tdt-one'), 'section' => 'tdt_one_social_links' ) 
        ) 
    );
    // instagram link
    $customize->add_setting('tdt_one_social_link_instagram', $link_settings );
    $customize->add_control(
        new WP_Customize_Control(
            $customize, 'tdt_one_social_link_instagram',
            array( 'label' => __('Instagram Link', 'tdt-one'), 'section' => 'tdt_one_social_links' ) 
        ) 
    );
    // linkedin link
    $customize->add_setting('tdt_one_social_link_linkedin', $link_settings );
    $customize->add_control(
        new WP_Customize_Control(
            $customize, 'tdt_one_social_link_linkedin',
            array( 'label' => __('LinkedIn Link', 'tdt-one'), 'section' => 'tdt_one_social_links' ) 
        ) 
    );
    // github link
    $customize->add_setting('tdt_one_social_link_github', $link_settings );
    $customize->add_control(
        new WP_Customize_Control(
            $customize, 'tdt_one_social_link_github',
            array( 'label' => __('Github Link', 'tdt-one'), 'section' => 'tdt_one_social_links' ) 
        ) 
    );
    // pinterest link
    $customize->add_setting('tdt_one_social_link_pinterest', $link_settings );
    $customize->add_control(
        new WP_Customize_Control(
            $customize, 'tdt_one_social_link_pinterest',
            array( 'label' => __('Pinterest Link', 'tdt-one'), 'section' => 'tdt_one_social_links' ) 
        ) 
    );
}
add_action('customize_register',  'tdt_one_customize_social_links');

/**
 *  The copyright text
 *
 *  @since 1.1.7
 */
function tdt_one_customize_copyright( $customize )
{
    $customize->add_section( 'tdt_one_copyright', array( 'title' => __('Copyright Text', 'tdt-one'), 'priority' => 60 ) );

    $customize->add_setting(
        'tdt_one_copyright_text',
        array(
            'default' => '2018 &copy; All Rights Reserved.',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
            )
    );

    $customize->add_control(
        new WP_Customize_Control(
            $customize,
            'tdt_one_copyright_text',
            array(
                'label' => __( 'Copyright Text', 'tdt-one' ),
                'section' => 'tdt_one_copyright',
                )
        )
    );
}
add_action( 'customize_register', 'tdt_one_customize_copyright' );


$tdt_one_primary_color = '#ff0000';
$tdt_one_primary_backcolor = '#ffd4d4';
$tdt_one_footer_textcolor = '#000';
$tdt_one_footer_backcolor = '#ffabab';

/**
 *  Add some color options
 */
function tdt_one_customize_colors( $customize )
{
    global $tdt_one_primary_color, $tdt_one_primary_backcolor, $tdt_one_footer_backcolor, $tdt_one_footer_textcolor;
    
    $customize->remove_control('header_textcolor');
    $customize->remove_control('background_color');

    // DRY
    $color_settings = array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    );

    // primary_color
    $color_settings[ 'default' ] = $tdt_one_primary_color;
    $customize->add_setting('primary_color', $color_settings );
    $customize->add_control(
        new WP_Customize_Color_Control(
            $customize, 'primary_color',
            array( 'label' => __('Primary Color', 'tdt-one'), 'section' => 'colors' )
        ) 
    );
    // primary_backcolor
    $color_settings[ 'default' ] = $tdt_one_primary_backcolor;
    $customize->add_setting('primary_backcolor', $color_settings );
    $customize->add_control(
        new WP_Customize_Color_Control(
            $customize, 'primary_backcolor',
            array( 'label' => __('Primary Back Color', 'tdt-one'), 'section' => 'colors' )
        ) 
    );
    // footer_textcolor
    $color_settings[ 'default' ] = $tdt_one_footer_textcolor;
    $customize->add_setting('footer_textcolor', $color_settings );
    $customize->add_control(
        new WP_Customize_Color_Control(
            $customize, 'footer_textcolor',
            array( 'label' => __('Footer Text Color', 'tdt-one'), 'section' => 'colors' )
        ) 
    );
    // footer_backcolor
    $color_settings[ 'default' ] = $tdt_one_footer_backcolor;
    $customize->add_setting('footer_backcolor', $color_settings );
    $customize->add_control(
        new WP_Customize_Color_Control(
            $customize, 'footer_backcolor',
            array( 'label' => __('Footer Background Color', 'tdt-one'), 'section' => 'colors' )
        ) 
    );
}
add_action('customize_register', 'tdt_one_customize_colors');

function tdt_one_load_customizerjs()
{    
    wp_enqueue_script('tdt-one-customizer', tdt_one_get_uri() . '/js/theme-customizer.js', array( 'jquery', 'customize-preview' ), '1.0', true);
}
add_action('customize_preview_init', 'tdt_one_load_customizerjs');


function tdt_one_print_theme_colors()
{
    global $tdt_one_primary_color, $tdt_one_primary_backcolor, $tdt_one_footer_backcolor, $tdt_one_footer_textcolor;
    
    $primary_color = esc_attr( get_theme_mod('primary_color', $tdt_one_primary_color) );
    $primary_backcolor = esc_attr( get_theme_mod('primary_backcolor', $tdt_one_primary_backcolor) );
    $footer_textcolor = esc_attr( get_theme_mod('footer_textcolor', $tdt_one_footer_textcolor) );
    $footer_backcolor = esc_attr( get_theme_mod('footer_backcolor', $tdt_one_footer_backcolor) );
    
    $css =  
    "<style id=\"tdt-one-theme-colors\">
        i.fas,
        i.fab,
        #site-header #site-name a,
        #section-title,
        section#main-title,
        .widget-title,
        div.post-meta .category,
        div#main-content h1,
        div#main-content h2,
        div#main-content h3,
        #cta-text #title,
        #items.items-loop #icon i.fas,
        #items.items-loop #icon i.fab,
        .format-link .post-content a,
        .full-post .post-pages a,
        .full-post > .post-tags > .tag,
        header #header-menu .current_page_item > a,
        #mobilenav-menu ul .current_page_item > a,
        .post-summary a.excerpt-more,
        .prev-next-post-links a,
        nav.posts-navigation,
        #comments h2.header,
        .comment.bypostauthor .fn,
        .woocommerce div.product p.price,
        .woocommerce div.product span.price,
        .woocommerce ul.products li.product .price {
            color: $primary_color;
        }
        button, .button, .big-button, input[type=submit], input[type=reset],
        body > footer #footer-strip,
        section.call-to-action #cta-action .button:hover,
        .has-primary-background-color,
        .wp-block-button__link,
        .woocommerce #respond input#submit,
        .woocommerce a.button,
        .woocommerce button.button,
        .woocommerce input.button,
        .woocommerce span.onsale,
        .woocommerce #respond input#submit.alt,
        .woocommerce a.button.alt,
        .woocommerce button.button.alt,
        .woocommerce input.button.alt,
        .woocommerce #respond input#submit.alt:hover,
        .woocommerce a.button.alt:hover,
        .woocommerce button.button.alt:hover,
        .woocommerce input.button.alt:hover {
            background-color: $primary_color;
        }
        blockquote,
        #site-header #site-name a,
        #site-header-wrapper #menu-wrap,
        section#main-title span,
        body.home > section,
        header #menu-wrap,
        .wp-caption,
        .gallery-caption,
        .doing-the-loop article,
        .prev-next-post-links,
        nav.posts-navigation,
        .page-sidebar-widget,
        .home-widget-sidebar-widget,
        body > footer,
        input, select, textarea,
        form.search-form,
        #comments {
            border-color: $primary_color;
        }
        blockquote,
        .wp-caption,
        .gallery-caption,
        .doing-the-loop .post-excerpt.sticky,
        table.shaded tr:nth-child(2n+3),
        .full-post .post-pages,
        .woocommerce div.product .woocommerce-tabs ul.tabs li,
        .about-the-author {
            background-color: $primary_backcolor;
        }
        body > footer {
            background-color: $footer_backcolor;
            color: $footer_textcolor;
        }
        </style>";
        
    $css = trim(preg_replace('#\s{2,}#', ' ', $css)); // well, I tried
    
    print $css;
}
add_action('wp_head', 'tdt_one_print_theme_colors');

/**
 *  Setting the site to full width
 *
 *  @since 1.2.0
 */
function tdt_one_customize_full_width( $customize )
{
    $customize->add_setting(
        'tdt_one_is_full_width',
        array(
            'default' => true,
            'transport' => 'postMessage',
        )
    );

    $customize->add_control(
        new WP_Customize_Control(
            $customize,
            'tdt_one_is_full_width',
            array(
                'label' => __('Site is Full Width', 'tdt-one'),
                'type' => 'checkbox',
                'section' => 'tdt_one_theme_settings',
            )
        )
    );
}
add_action('customize_register', 'tdt_one_customize_full_width');

/**
 *  Adding full-width to the body class
 *
 *  @since 1.2.0
 * 
 * @param array $classes Classes passed down the filter queue.
 * @return array Classes after adding
 */
function tdt_one_add_full_width_class( $classes )
{
    if( tdt_one_site_is_full_width() ) {
        $classes[] = 'page-full-width';
    }

    return $classes;
}
add_filter('body_class', 'tdt_one_add_full_width_class');

/**
 * Setting to show Post Author Dialog.
 * 
 * @since 1.2.2
 * 
 * @param Customizer $customize The WP_Customize_Manager.
 */
function tdt_one_customize_author_dialog( $customize ) {
    $customize->add_setting(
        'tdt_one_show_author_dialog',
        array(
            'default' => true,
        )
    );

    $customize->add_control(
        new WP_Customize_Control(
            $customize,
            'tdt_one_show_author_dialog',
            array(
                'label' => __('Show Post Author Dialog', 'tdt-one'),
                'type' => 'checkbox',
                'section' => 'tdt_one_theme_settings',
            )
        )
    );
}
add_action('customize_register', 'tdt_one_customize_author_dialog');

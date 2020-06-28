<?php

define( 'TDT_ONE_VERSION', '1.3.1', true );

require_once 'inc/theme-customizer.php';

if(! isset($content_width) ) {
    $content_width = 800;
}

function tdt_one_get_uri( $append = '' )
{
    return esc_url( get_template_directory_uri() . $append );
}

function tdt_one_esc_permalink( $append = '' )
{
    return esc_url( get_permalink() . $append );
}

/**
 *    Enqueue some scripts (front-end)
 */
if(! function_exists('tdt_one_wp_enqueue_scripts') ) :
    function tdt_one_wp_enqueue_scripts()
    {
        $css = tdt_one_get_uri() . '/css/';
        $js = tdt_one_get_uri() . '/js/';

        wp_enqueue_style('tdt-one-grid-basic', $css . 'grid-basic.min.css', false, TDT_ONE_VERSION );
        wp_enqueue_style('fontawesome', $css . 'fontawesome-all.min.css', false, '5.2.0' );
        wp_enqueue_style('tdt-one-mobilenav-css', $css . 'jquery.mobilenav.css', false, TDT_ONE_VERSION );
        wp_enqueue_style('tdt-one-scrolltotop-css', $css . 'jquery.scrolltotop.css', false, TDT_ONE_VERSION );

        wp_enqueue_style('tdt-one-style', get_stylesheet_uri(), array( 'tdt-one-grid-basic', 'tdt-one-mobilenav-css', 'tdt-one-scrolltotop-css' ), TDT_ONE_VERSION );
        
        wp_enqueue_script('tdt-one-mobilenav-js', $js . 'jquery.mobilenav.js', array( 'jquery' ), TDT_ONE_VERSION );
        wp_enqueue_script('tdt-one-scrolltotop-js', $js . 'jquery.scrolltotop.js', array( 'jquery' ), TDT_ONE_VERSION );
        wp_enqueue_script('tdt-one-woo-cart-js', $js . 'woo-header-cart.js', array( 'jquery' ), TDT_ONE_VERSION );
        wp_enqueue_script('main', $js . 'main.js', array( 'jquery', 'tdt-one-mobilenav-js', 'tdt-one-scrolltotop-js' ), TDT_ONE_VERSION );
        
        if(is_singular() && comments_open() && get_option('thread_comments') ) {
            wp_enqueue_script('comment-reply');
        }
    }
    add_action('wp_enqueue_scripts', 'tdt_one_wp_enqueue_scripts');
endif;


/**
 *    Register Sidebars
 */
if(! function_exists('tdt_one_register_sidebars') ) :
    function tdt_one_register_sidebars()
    {        
        // optional
        $sidebars = array(
        'header_sidebar' => array(
        'id'    => 'header_sidebar',
        'name'    => __('Header Sidebar', 'tdt-one'),
        'description'    =>    __('Appears in or after the header section of every page/post', 'tdt-one'),
        'before_widget'    =>    '<div id="%1$s" class="header-sidebar-widget %2$s">',
        'after_widget'    =>    '</div>',
        'before_title'    =>    '<h4 class="widget-title">',
        'after_title'    =>    '</h4>'),
        // ---------------------------- //
        'page_sidebar' => array(
                    'id'    =>    'page_sidebar',
                    'name'    => __('Page Sidebar', 'tdt-one'),
                    'description'    =>    __('Appears on the right side (by default) of every page/post', 'tdt-one'),
                    'before_widget'    =>    '<div id="%1$s" class="page-sidebar-widget %2$s">',
                    'after_widget'    =>    '</div>',
                    'before_title'    =>    '<h4 class="widget-title">',
                    'after_title'    =>    '</h4>'),
        // ---------------------------- //
        'left_sidebar' => array(
                    'id'    =>    'left_sidebar',
                    'name'    => __('Left Sidebar', 'tdt-one'),
                    'description'    =>    __('Appears on the left side of every page/post', 'tdt-one'),
                    'before_widget'    =>    '<div id="%1$s" class="left-sidebar-widget %2$s">',
                    'after_widget'    =>    '</div>',
                    'before_title'    =>    '<h4 class="widget-title">',
                    'after_title'    =>    '</h4>'),
        // ---------------------------- //
        'right_sidebar' => array(
                    'id'    =>    'right_sidebar',
                    'name'    => __('Right Sidebar', 'tdt-one'),
                    'description'    =>    __('Appears on the right side of every page/post', 'tdt-one'),
                    'before_widget'    =>    '<div id="%1$s" class="right-sidebar-widget %2$s">',
                    'after_widget'    =>    '</div>',
                    'before_title'    =>    '<h4 class="widget-title">',
                    'after_title'    =>    '</h4>'),
        // ---------------------------- //
        'footer_sidebar' => array(
                    'id'    =>    'footer_sidebar',
                    'name'    => __('Footer Sidebar', 'tdt-one'),
                    'description'    =>    __('Appears in the footer section of every page/post', 'tdt-one'),
                    'before_widget'    =>    '<div id="%1$s" class="footer-sidebar-widget %2$s">',
                    'after_widget'    =>    '</div>',
                    'before_title'    =>    '<h4 class="widget-title">',
                    'after_title'    =>    '</h4>'),
        // ---------------------------- //
        'footer_sub_1_sidebar' => array(
                    'id'    =>    'footer_sub_1_sidebar',
                    'name'    => __('Footer Sub 1 Sidebar', 'tdt-one'),
                    'description'    =>    __('Appears in the footer section of every page/post', 'tdt-one'),
                    'before_widget'    =>    '<div id="%1$s" class="footer-sub-1-widget %2$s">',
                    'after_widget'    =>    '</div>',
                    'before_title'    =>    '<h4 class="widget-title">',
                    'after_title'    =>    '</h4>'),
        // ---------------------------- //
        'footer_sub_2_sidebar' => array(
                    'id'    =>    'footer_sub_2_sidebar',
                    'name'    => __('Footer Sub 2 Sidebar', 'tdt-one'),
                    'description'    =>    __('Appears in the footer section of every page/post', 'tdt-one'),
                    'before_widget'    =>    '<div id="%1$s" class="footer-sub-2-widget %2$s">',
                    'after_widget'    =>    '</div>',
                    'before_title'    =>    '<h4 class="widget-title">',
                    'after_title'    =>    '</h4>'),
        // ---------------------------- //
        'footer_sub_3_sidebar' => array(
                    'id'    =>    'footer_sub_3_sidebar',
                    'name'    => __('Footer Sub 3 Sidebar', 'tdt-one'),
                    'description'    =>    __('Appears in the footer section of every page/post', 'tdt-one'),
                    'before_widget'    =>    '<div id="%1$s" class="footer-sub-3-widget %2$s">',
                    'after_widget'    =>    '</div>',
                    'before_title'    =>    '<h4 class="widget-title">',
                    'after_title'    =>    '</h4>'),
        // ---------------------------- //
        'footer_sub_4_sidebar' => array(
                    'id'    =>    'footer_sub_4_sidebar',
                    'name'    => __('Footer Sub 4 Sidebar', 'tdt-one'),
                    'description'    =>    __('Appears in the footer section of every page/post', 'tdt-one'),
                    'before_widget'    =>    '<div id="%1$s" class="footer-sub-4-widget %2$s">',
                    'after_widget'    =>    '</div>',
                    'before_title'    =>    '<h4 class="widget-title">',
                    'after_title'    =>    '</h4>')
        );
        
        // allow user changes
        $to_register = (array) apply_filters('tdt_one_register_sidebars', array( 'page_sidebar', 'footer_sidebar' ));
        
        if(! empty($to_register) ) {
            $to_register = array_unique($to_register);
            
            foreach( $to_register as $s ) {
                if(isset($sidebars[ $s ]) ) {
                    register_sidebar($sidebars[ $s ]);
                }
            }
        }
    }
    add_action('widgets_init', 'tdt_one_register_sidebars');
endif;


/**
 *    after_setup_theme
 */
if(! function_exists('tdt_one_after_setup_theme') ) :
    function tdt_one_after_setup_theme()
    {    
        add_theme_support('woocommerce');
        add_theme_support('post-thumbnails');
        add_theme_support(
            'post-formats',
                array(
                    'aside', 'gallery', 'quote', 'image'
                )
        );
        add_theme_support('automatic-feed-links');
        add_theme_support(
            'html5',
                array(
                    'search-form', 'comment-form', 'comment-list'
                )
        );
        add_theme_support(
            'custom-background',
                array(
                    'default-repeat' => 'no-repeat',
                    'default-attachment' => 'fixed'
                ) 
        );
        add_theme_support(
            'custom-logo',
                array(
                    'width' => 400,
                    'height' => 100,
                    'flex-height' => true,
                    'flex-width' => true
                ) 
        );
        add_theme_support('title-tag');
        
        register_nav_menu('header', 'Header Menu');
        
        add_editor_style('style-editor.css');
        add_theme_support('editor-styles');
        
        load_theme_textdomain('tdt-one', get_template_directory() . '/langauges');

        add_theme_support('align-wide');

    }
    add_action('after_setup_theme', 'tdt_one_after_setup_theme');
endif;


/**
 *    limit the excerpt-length
 */
if(! function_exists('tdt_one_excerpt_length') ) :
    function tdt_one_excerpt_length( $length )
    {
        if(is_admin() ) {
            return $length;
        }
        
        return 40;
    }
    add_filter('excerpt_length', 'tdt_one_excerpt_length');
endif;


/**
 * For displaying of post formats "quote"
 *    wrap content with blockquote
 */
if(! function_exists('tdt_one_wrap_with_blockquote') ) :
    function tdt_one_wrap_with_blockquote( $content )
    {
        /* Check if we're displaying a 'quote' post. */
        if (has_post_format('quote') ) {
            /* Match any <blockquote> elements. */
            preg_match('/<blockquote.*?>/', $content, $matches);

            /* If no <blockquote> elements were found, wrap the entire content in one. */
            if (empty($matches) ) {
                $content = "<blockquote>{$content}</blockquote>";
            }
        }

        return $content;
    }
endif;


/**
 *        custom title
 */
if(! function_exists('tdt_one_wp_title') ) :
    function tdt_one_wp_title( $title = '' )
    {
        $title = get_the_title();
        
        if(is_feed() ) {
            return $title;
        }

        if(is_front_page() ) {
            return get_bloginfo('name'). ' | ' . get_bloginfo('description');
        }
        
        if(is_home() ) {
            $pp = get_option('page_for_posts');
            if($pp ) {
                $page = get_page($pp);
                $title = $page->post_title;
            }
        }elseif(is_archive() ) {
            // @since 1.3.0
            $title = get_the_archive_title();
        }elseif(is_search() ) {
            $title = __('Search Results For', 'tdt-one') . ': '  . htmlspecialchars($_GET['s']);
        }elseif(is_404() ) {
            $title = '404: ' . __('Page Not Found', 'tdt-one');
        }
        
        return $title;
    }
endif;


/**
 *        custom document title
 */
if(! function_exists('tdt_one_doc_title') ) :
    function tdt_one_doc_title( $title = '', $sep = '|' )
    {
        if(is_home() ) {
            return tdt_one_wp_title();
        } else {
            return tdt_one_wp_title() . " $sep " . get_bloginfo('name');
        }
    }
    add_filter('wp_title', 'tdt_one_doc_title');
endif;


/**
 *        handling the category
 */
if(! function_exists('tdt_one_the_category') ) :
    function tdt_one_the_category( $print = true )
    {
        $cats = get_the_category();
        
        if($cats ) {
            $str = array();
            foreach( $cats as $c ) {
                $link = esc_url(get_category_link($c->term_id));
                $name = esc_html( $c->name );
                $title = esc_attr( __('View all in', 'tdt-one') . " {$name}" );
                $str[] = sprintf(
                    '<span class="category">
                        <a href="%1$s" title="%2$s" id="category-%3$s">%4$s</a>
                    </span>',
                    $link, $title, $c->term_id, $name
                ); 
            }
            $str = implode(', ', $str);
        } else {
            $str = '';
        }
        
        if($print ) {
            print $str;
        } else {
            return $str;
        }
    }
endif;


/**
 *    the header menu
 */
if(! function_exists('tdt_one_header_menu') ) :
    function tdt_one_header_menu( $options = array() )
    {
        $args = array(    
         'theme_location' => 'header',
         'container_id' => 'header-nav',
         'container_class' => '',
         'menu_id' => 'header-menu',
         'menu_class' => 'nav-menu',
         'container' => 'nav'
        );
        
        $args = array_merge($args, $options);
        
        if(has_nav_menu('header') ) {
            wp_nav_menu($args);
        } else {
            // or maybe we should just do nothing?
            $id = empty($args[ 'container_id' ]) ? '': sprintf(' id="%s"', esc_attr($args[ 'container_id' ]));
            $class = empty($args[ 'container_class' ]) ? '': sprintf(' class="%s"', esc_attr($args[ 'container_class' ]));
            
            printf('<nav%s%s>', $id, $class);
            
            $id = empty($args[ 'menu_id' ]) ? '': sprintf(' id="%s"', esc_attr($args[ 'menu_id' ]));
            $class = empty($args[ 'menu_class' ]) ? '': sprintf(' class="%s"', esc_attr($args[ 'menu_class' ]));
            
            printf('<ul%s%s>', $id, $class);
            
            $class = 'page_item page-item-0';
            $class .= is_home() ? ( is_front_page() ? ' current_page_item current-menu-item': '' ): '';
            
            printf('<li class="%1$s"><a href="%2$s" >%3$s</a></li>', $class, esc_url(home_url()), __('Home', 'tdt-one'));
            
            wp_list_pages('depth=1&title_li=');
            
            print '</ul>';
            
            print '</nav>';            
        }
        
        if(! ( isset($options[ 'with_button' ]) && $options[ 'with_button' ] == false ) ) {
            print '<div id="tdt-mobilenav" for="#header-menu" style="display:none">
                        <i class="fas fa-bars"></i>
                    </div>';
        }
    }
endif;


/**
 *    site header (blog name or header image)
 */
if(! function_exists('tdt_one_site_header') ) :
    function tdt_one_site_header( $args = array() )
    {        
        print( '<div id="site-identity">' );
        
        if(has_custom_logo() ) {
            the_custom_logo();
        } else {
            if('' == get_theme_mod('header_textcolor', '') ) :
                 $tag = is_home() ? 'h1': 'span';
                    
                printf(
                    '<%4$s id="site-name">
                        <a href="%1$s" title="%2$s %3$s">%2$s</a>
                    </%4$s>',
                    esc_url(home_url()), esc_html(get_bloginfo('name')), __('Home', 'tdt-one'), $tag
                );
                            
                if(isset($args[ 'print_description' ]) && $args[ 'print_description' ] == true ) {
                    print '<div id="site-description">' . esc_html(get_bloginfo('description')) . '</div>';
                }
            endif;
        }
        
        print( '</div>' );
    }
endif;


/**
 *    our social links
 */
if(! function_exists('tdt_one_get_social_links') ) :
    function tdt_one_get_social_links()
    {
        $sites = array( 'facebook', 'twitter', 'github', 'instagram', 'googleplus', 'pinterest' );
        
        $social_links = array();
        
        foreach( $sites as $site ) {
            if($link = get_theme_mod("tdt_one_social_link_{$site}") ) {
                $social_links[ $site ] = array( 'url' => $link );
            }
        }
        
        return (array) apply_filters('tdt_one_social_links', $social_links);
    }
endif;


/**
 *    printing our social icons
 */
if(! function_exists('tdt_one_social_icons') ) :
    function tdt_one_social_icons( $args = array() )
    {
        $social_links = tdt_one_get_social_links();
        
        $defaults = array(    'wrapper'        =>    'div',
          'wrapper_id'    =>    'social-links',
          'wrapper_class'    =>    'social-icons' );
                                    
        $args = array_merge($defaults, $args);
        
        $links = '';
        foreach( $social_links as $key => $value ) {
            if(! isset($value['url'])){
                continue;
            }
            if(strpos($value[ 'url' ], 'https://') !== 0 && strpos($value[ 'url' ], 'http://') !== 0 ) {
                $value[ 'url' ] = 'https://' . $value[ 'url' ];
            }

            $value[ 'url' ] = esc_url($value[ 'url' ]);
            
            $links .= sprintf('<a class="%2$s-social-link" href="%1$s">
                                    <i class="fab fa-%2$s"></i>
                                </a>', $value[ 'url' ], esc_attr($key) );
        }
        
        
        if ($args[ 'wrapper'] ) {
            $id = empty($args[ 'wrapper_id' ]) ? '': sprintf(' id="%1$s"', esc_attr($args[ 'wrapper_id' ]));
            $class = empty($args[ 'wrapper_class' ]) ? '': sprintf(' class="%1$s"', esc_attr($args[ 'wrapper_class' ]));
            
            $html = sprintf('<div%1$s%2$s>%3$s</div>', $id, $class, $links);
        } else {
            $html = $links;            
        }
        
        print $html;
    }
endif;


/**
 *    handling the copyright notice
 */
if(! function_exists('tdt_one_copyright') ) :
    function tdt_one_copyright( $print = true )
    {
        $default_copyright = __( '2020 &copy; All Rights Reserved', 'tdt-one' );

        $copyright = get_theme_mod( 'tdt_one_copyright_text', $default_copyright );

        $copyright = esc_html( $copyright );
        
        if($print ) {
            print $copyright;
        } else {
            return $copyright;
        }
    }
endif;


/**
 *    Theme designer credits
 */
if(! function_exists('tdt_one_credits') ) :
    function tdt_one_credits( $print = true )
    {
        /* translator: %s: Theme designer link */
        $default_credits = sprintf( __( 'TDT-One Theme By %s', 'tdt-one' ), '<a href="https://thapedict.co.za">Thapedict</a>' );

        if($print ) {
            print $default_credits;
        } else {
            return $default_credits;
        }
    }
endif;


/**
 *    handling showing of the post thumbnail. defaults to image provided by the theme if post doesn't have thumbnail.
 */
if(! function_exists('tdt_one_the_post_thumbnail') ) :
    function tdt_one_the_post_thumbnail()
    {        
        $image = '<img class="attachment-post-thumbnail" src="' . esc_url(get_template_directory_uri()) . '/img/no-post-thumbnail.jpg" />';
        
        if(has_post_thumbnail() ) {
            $image = get_the_post_thumbnail();
        }
        
        echo '<div id="post-thumbnail" class="post-thumbnail">', $image, '</div>';
    }
endif;


/**
 *  for some speed improvements flush header as soon as possible
 */
if(! function_exists('tdt_one_flush_header') ) :
    function tdt_one_flush_header()
    {
        if(! ob_get_level() ) { // only flush at the top level (i.e. when not buffering)
            flush();
        }
    }
    add_action('after_header', 'tdt_one_flush_header');
endif;

/**
 *    handle the preview (excerpts) of the gallery post formats
 */
if(! function_exists('tdt_one_preview_gallery') ) :
    function tdt_one_preview_gallery()
    {
        $galleries = get_post_galleries( 0, false );

        $no_of_thumbs = (int) apply_filters( 'tdt_one_gallery_thumb_count', 4 );

        $gallery = current( $galleries );
        $thumbnail_urls = $gallery[ 'src' ];

        // if we don't have all required thumbs, try and get them from other galleries
        while( $no_of_thumbs > count( $thumbnail_urls ) ) {
            $gallery = next( $galleries );

            if( false === $gallery ) { // no more galleries?
                break;
            }

            $thumbnail_urls = array_merge( $thumbnail_urls, $gallery[ 'src' ] );
        }

        $thumbnail_urls = array_slice( $thumbnail_urls, 0, $no_of_thumbs );
        
        print '<div class="gallery-preview">';
        
        foreach( $thumbnail_urls as $thumbnail ) {
            echo '<img rel="thumbnail" alt="thumbnail" src="', esc_url( $thumbnail ), '" />';
        }
            
        print '</div>';
    }
endif;

/**
 *  registering our sidebars
 */
if( ! function_exists( 'tdt_one_sidebars' )):
    function tdt_one_sidebars()
    {
        return array( 'page_sidebar', 'footer_sub_1_sidebar', 'footer_sub_2_sidebar', 'footer_sub_3_sidebar' );    
    }
    add_filter('tdt_one_register_sidebars', 'tdt_one_sidebars');
endif;

/**
 *  whether to show comments
 */
if( ! function_exists( 'tdt_one_show_comments' ) ):
    function tdt_one_show_comments()
    {
        $comments = (int) apply_filters('tdt_one_show_comments', 1);
        
        return (bool) $comments;
    }
endif;

/**
 *  because the date only shows only when the previous post day is different then current
 */
if( ! function_exists( 'tdt_one_the_date' ) ):
    function tdt_one_the_date()
    {
        echo get_the_date();
    }
endif;

/**
 * WordPress v5.2 requires themes to support wp_body_open.
 * 
 * @since 1.2.0
 */
function tdt_one_before_header() {
    if( function_exists('wp_body_open') ) {
        wp_body_open();
    } else {
        do_action('wp_body_open');
    }
}
add_action('body_header_before', 'tdt_one_before_header');

/**
 * Check to see if woocommerce is activated.
 * 
 * @since 1.2.0
 * 
 * @return bool True if activatec, false if not.
 */
function tdt_one_is_woocommerce_activated() {
    if( class_exists( 'WooCommerce', false ) ) {
        return true;
    } else {
        return false;
    }
}

/**
 * Print header WooCommerce menu & cart.
 * 
 * @since 1.2.0
 */
function tdt_one_woo_site_header_menu() {
    if( ! tdt_one_is_woocommerce_activated() ) {
        return;
    }
?>
    <div id="woo-site-header-menu">
        <?php tdt_one_print_header_cart(); ?>
    </div>
<?php
}

/**
 * Prints the woocommerce header cart
 * 
 * @since 1.2.0
 */
function tdt_one_print_header_cart() {
    if( ! tdt_one_is_woocommerce_activated() ) {
        return;
    }

    $cart_count = intval( WC()->cart->get_cart_contents_count() );
    $cart_total = WC()->cart->get_cart_subtotal();
    $cart_url = esc_url( wc_get_cart_url() );

    $tmpl_0 = __( '0 items', 'tdt-one' );
    $tmpl_1 = __( '%d item', 'tdt-one' );
    $tmpl_2 = __( '%d items', 'tdt-one' );

    ?>
    <div id="site-header-cart">
        <div id="the-link">
            <i class="drop-arrow fa fa-angle-down"></i>
            <span class="cart-total">
                <?php echo $cart_total; ?>
            </span> - 
            <a class="cart-items-total" href="<?php echo $cart_url; ?>" title="<?php esc_attr_e( __( 'View Your Shopping Cart', 'tdt-one' ) ); ?>">
                <?php
                    printf( _n( '%d item', '%d items', $cart_count, 'tdt-one' ), $cart_count );
                ?>
                <tmpl id="zero"><?php echo $tmpl_0; ?></tmpl>
                <tmpl id="single"><?php echo $tmpl_1; ?></tmpl>
                <tmpl id="many"><?php echo $tmpl_2; ?></tmpl>
                <style>
                    tmpl { display: none}
                </style>
            </a>
            <i class="fa fa-shopping-basket"></i>
        </div>
        <div id="the-cart">
            <?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
        </div>
    </div>
    <?php
}

/**
 * Prints out the post author's dialog
 * 
 * @since 1.3.0
 * 
 * @param int $id Optional. The user ID of the post author.
 */
function tdt_one_post_author_dialog( $id = false ) {
    $user_id = $id | get_the_author_meta('ID');
    $author = get_userdata($user_id);

    if( ! $author ){
        return;
    }

    $name = esc_html( $author->display_name );
    $bio = esc_html( $author->description );
    $url = esc_url( get_author_posts_url($user_id) );
    $view_all_label = __( 'View All Posts By', 'tdt-one' ) . " $name &raquo;";
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
        <a class="all-posts" href="<?php echo $url; ?>" title="<?php ; echo $view_all_label; ?>"><?php ; echo $view_all_label; ?></a>
    </div>
    <?php
}

/**
 * Check if we can show post dialog.
 * 
 * @since 1.3.0
 */
function tdt_one_show_post_author_dialog() {
    if( get_theme_mod( 'tdt_one_show_author_dialog', true ) ) {
        tdt_one_post_author_dialog();
    }
}
add_action( 'after_post_content', 'tdt_one_show_post_author_dialog' );

/**
 * Add new Pullquote block style.
 * 
 * @since 1.3.0
 */
function tdt_one_pullquotes_withquotes() {
    register_block_style(
        'core/pullquote',
        array(
            'name' => 'with-quotes',
            'label' => __( 'With Quotes', 'tdt-one' ),
            'style_handle' => 'style-editor'
        )
        );
}
add_action( 'init', 'tdt_one_pullquotes_withquotes' );

/**
 * Loading dynamic CSS editable only in the customizer
 * 
 * @since 1.3.0
 */
function tdt_one_gutenberg_assets() {
    $dynamic_css = tdt_one_get_dynamic_editor_css();

    // Because the editor has it's own life, let's do some overrides
    $editor_css = get_template_directory_uri() . 'css/gutenberg-editor.css';
    wp_enqueue_style( 'tdt-one-gutenberg-editor', esc_url( $editor_css ), array(), TDT_ONE_VERSION );

    wp_add_inline_style( 'wp-block-editor', $dynamic_css );
}
add_action( 'enqueue_block_editor_assets', 'tdt_one_gutenberg_assets' );

/**
 * Gets CSS (only for post-content children) modified in the customizer.
 * 
 * @since 1.3.0
 * 
 * @return string The CSS as string.
 */
function tdt_one_get_dynamic_editor_css() {
    global $tdt_one_primary_color, $tdt_one_primary_backcolor, $tdt_one_footer_backcolor, $tdt_one_footer_textcolor;
    
    $primary_color = esc_attr( get_theme_mod('primary_color', $tdt_one_primary_color) );
    $primary_backcolor = esc_attr( get_theme_mod('primary_backcolor', $tdt_one_primary_backcolor) );
    $footer_textcolor = esc_attr( get_theme_mod('footer_textcolor', $tdt_one_footer_textcolor) );
    $footer_backcolor = esc_attr( get_theme_mod('footer_backcolor', $tdt_one_footer_backcolor) );

    // Background: $primary_color
    $css = "
        button, .button, input[type=submit], input[type=reset],
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
            color: #fff;
        }";

    // Color: $primary_color
    $css .= "
        .woocommerce div.product p.price,
        .woocommerce div.product span.price,
        .woocommerce ul.products li.product .price {
            color: $primary_color;
        }";

    // Border: $primary_color
    $css .= "
        blockquote,
        .wp-block-quote,
        .wp-block-quote.has-text-align-right,
        .wp-caption,
        .gallery-caption,
        input, select, textarea {
            border-color: $primary_color;
        }";

    // Background: $primary_backcolor
    $css .= "
        blockquote,
        .wp-caption,
        .gallery-caption,
        table.shaded tr:nth-child(2n+3),
        .woocommerce div.product .woocommerce-tabs ul.tabs li {
            background-color: $primary_backcolor;
        }";

    return $css;
}

/**
 * Check if Jetpack is active.
 * 
 * @since 1.3.0
 * 
 * @return bool true if Jetpack is active, false if not.
 */
function tdt_one_is_jetpack_active() {
    return defined( 'JETPACK__VERSION' );
}

/**
 * Load Jetpack override CSS.
 * 
 * @since 1.3.0
 */
function tdt_one_jetpack_css() {
        wp_enqueue_style( 'tdt-one-jetpack', tdt_one_get_uri( '/css/jetpack.css' ), array('sharedaddy'), TDT_ONE_VERSION );
}
if( tdt_one_is_jetpack_active() ) {
    add_action( 'wp_enqueue_scripts', 'tdt_one_jetpack_css' );
}

/**
 * Load Woocommerce override CSS.
 * 
 * @since 1.3.0
 */
function tdt_one_woocommerce_css() {
        wp_enqueue_style( 'tdt-one-woocommerce', tdt_one_get_uri( '/css/woocommerce.css' ), array('tdt-one-style'), TDT_ONE_VERSION );
}
if( tdt_one_is_woocommerce_activated() ) {
    add_action( 'wp_enqueue_scripts', 'tdt_one_woocommerce_css' );
}

/**
 * Checks to see if site is full width
 * 
 * @since 1.3.0
 * 
 * @return bool TRUE when set to full width, false if not.
 */
function tdt_one_site_is_full_width() {
    $is_full_width = false;

    $is_full_width = (bool) get_theme_mod( 'tdt_one_is_full_width', true );

    return $is_full_width;
}

/**
 * Remove full width class from body class array
 * 
 * @since 1.3.0
 */
function tdt_one_remove_full_width() {
    add_filter( 'body_class', function( $classes ) {
        if( in_array( 'page-full-width', $classes ) ) {
            $classes = array_filter( $classes, function( $val ) {
                if( 'page-full-width' === $val ) {
                    return false;
                }
                return true;
            });

            $classes = array_merge( $classes );
        }

        return $classes;
    });
}

/**
 * Change template name when site is in full width.
 * 
 * @since 1.3.0
 * 
 * @param string $template The default template to load.
 * 
 * @return string The new template filename to load.
 */
function tdt_one_templates_with_sidebar( $template ) {
    // Check to see if we are in full width
    if( ! tdt_one_site_is_full_width() ) {
        return $template;
    }
    
    $_template = basename( $template );

    $no_sidebar_templates = array(
        '404.php',
        'front-page.php',
        'full-width.php',
        'full-width-post.php'
    );
    
    if( ! in_array( $_template, $no_sidebar_templates ) ) {
        tdt_one_remove_full_width();
        tdt_one_add_sidebar_full_width();
    }

    return $template;
}
add_filter( 'template_include', 'tdt_one_templates_with_sidebar' );

/**
 * Adds class for pages with sidebar
 * 
 * @param array $classes List of already added classes.
 * 
 * @return array List of classes after addition
 */
function tdt_one_add_sidebar_full_width() {
    add_filter( 'body_class', function($classes){
        if( ! in_array( 'sidebar-full-width', $classes ) ) {
            $classes[] = 'sidebar-full-width';
        }

        return $classes;
    });
}

/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function ( $ ) {

    // Update the site title in real time...
    wp.customize(
        'blogname', function ( value ) {
            value.bind(
                function ( newval ) {
                    $('#site-name a').html(newval);
                } 
            );
        } 
    );
    
    //Update the site description in real time...
    wp.customize(
        'blogdescription', function ( value ) {
            value.bind(
                function ( newval ) {
                    $('#site-description').html(newval);
                } 
            );
        } 
    );
    
    //Update twitter link...
    wp.customize(
        'tdt_one_social_link_twitter', function ( value ) {
            value.bind(
                function ( newval ) {
                    var button = 'twitter';
            
                    tdt_update_button(button, newval);
                } 
            );
        } 
    );
    
    //Update facebook link...
    wp.customize(
        'tdt_one_social_link_facebook', function ( value ) {
            value.bind(
                function ( newval ) {
                    var button = 'facebook';
            
                    tdt_update_button(button, newval);
                } 
            );
        } 
    );
    
    //Update instagram link...
    wp.customize(
        'tdt_one_social_link_instagram', function ( value ) {
            value.bind(
                function ( newval ) {
                    var button = 'instagram';
            
                    tdt_update_button(button, newval);
                } 
            );
        } 
    );
    
    //Update github link...
    wp.customize(
        'tdt_one_social_link_github', function ( value ) {
            value.bind(
                function ( newval ) {
                    var button = 'github';
            
                    tdt_update_button(button, newval);
                } 
            );
        } 
    );
    
    //Update linkedin link...
    wp.customize(
        'tdt_one_social_link_linkedin', function ( value ) {
            value.bind(
                function ( newval ) {
                    var button = 'linkedin';
            
                    tdt_update_button(button, newval);
                } 
            );
        } 
    );
    
    //Update pinterest link...
    wp.customize(
        'tdt_one_social_link_pinterest', function ( value ) {
            value.bind(
                function ( newval ) {
                    var button = 'pinterest';
            
                    tdt_update_button(button, newval);
                } 
            );
        } 
    );
    
    //Update the copyright notice
    // @since 1.1.7
    wp.customize(
        'tdt_one_copyright_text', function ( value ) {
            value.bind(
                function ( newval ) {
                    $('section#footer-strip #copyright-notice').html(newval);
                } 
            );
        } 
    );

    // Add full-width class to body
    // @since 1.2.0
    wp.customize(
        'tdt_one_is_full_width', function ( value ) {
            value.bind(
                function( newval ) {
                    if( newval ) {
                        $('body').addClass('full-width');
                    } else {
                        $('body').removeClass('full-width');
                    }
                }
            );
        }
    );
    
    var tdt_update_button = function ( button, newval ) {        
        if(newval ) {
            newval = auto_https(newval);
            
            if(tdt_button_exists(button) ) {
                $('#social-links .' + button + '-social-link').show();
                $('#social-links .' + button + '-social-link').attr('href', newval);
            } else {
                tdt_add_button(button, newval);
            }                    
        } else {
            tdt_hide_button(button);
        }
    };
    
    var tdt_add_button = function ( name, url ) {
        url = auto_https(url);
        var html = '<a class="' + name + '-social-link" href="' + url + '"><i class="fab fa-' + name + '"></i></a>';
        
        $('#social-links').append(html);
    };
    
    var tdt_show_button = function ( name ) {
        $('#social-links .' + name + '-social-link').show();
    };
    
    var tdt_hide_button = function ( name ) {
        $('#social-links .' + name + '-social-link').hide();
    };
    
    var tdt_button_exists = function ( name ) {
        if($('#social-links .' + name + '-social-link').length > 0 ) {
            return true;
        } else {
            return false;
        }
    };

    var auto_https = function ( url ) {
        url = url.trim();

        if(! url ) {
            return url;
        }

        if(url.indexOf("https://") !== 0 && url.indexOf("http://") !== 0 ) {
            url = "https://" + url;
        }

        return url;
    };
    
} )(jQuery);

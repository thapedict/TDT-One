/**
 * jQuery ScrollToTop
 * Version: 0.1
 * Author: Thapelo Moeti
 * License: GNU General Public License v2 or later
 */
 
(function ( $, undefined ) {
    
    if($ === undefined ) { // no jQuery
        return;
    }
        
    // activate
    $(document).ready(
        function () {
    
            SCROLLTOTOP = function () {
                var BTN;
            
                var top = function () {
                    $(window).scrollTop(0);
                };
            
                // runs on scroll event
                var scroll = function () {
                    wh = $(window).height();
                    s = $(window).scrollTop();
                    if(s > ( wh / 4 ) ) {
                        BTN.addClass('shown');
                    } else {
                        BTN.removeClass('shown');
                    }
                };
            
                var init = function () {            
                    // add the button
                    $('body').append('<a id="scroll-to-top"><i class="fas fa-angle-up"></i></a>');
                    // reference
                    BTN = $('#scroll-to-top');            
                    // events
                    $(window).on('scroll', scroll);
                    BTN.on('click', top);
                    // run first instance
                    scroll();
                };
            
                init();
            };
    
            new SCROLLTOTOP();
        }
    );

})(jQuery);

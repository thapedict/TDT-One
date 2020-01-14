

;(function ($) {
    
    $(document).ready(
        function () {

            // responsive tables
            $( 'body > section#main table' ).wrap('<div style="overflow-x:scroll"></div>');
        
            // mobile menu
            $('#tdt-mobilenav').mobilenav({style:'from-left'});
        
        }
    );
    
})(jQuery);



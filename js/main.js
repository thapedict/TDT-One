

;(function ($) {
    
    $(document).ready(
        function () {

            // responsive tables
            if($('body').width()<768){
                $( 'body > section#main table' ).wrap('<div class="tdt-reponsive-table-overflow" style="overflow-x:scroll"></div>');
            }
            // mobile menu
            $('#tdt-mobilenav').mobilenav({style:'from-left'});
        
        }
    );
    
})(jQuery);



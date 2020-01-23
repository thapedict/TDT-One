/**
 * Handle the updating of the link (in the header) to the cart
 * 
 * @since 1.2.0
 */
jQuery(function($){
    var _total = $('#woo-site-header-menu #the-link .amount'),
        _items = $('#woo-site-header-menu #the-link .cart-items-total'),
        _linkTmplOne = $('#woo-site-header-menu tmpl#single').text(),
        _linkTmplMany = $('#woo-site-header-menu tmpl#many').text();


    $( document.body ).on( 'added_to_cart removed_from_cart', function() {
        setTimeout(updateLink, 500);
    });

    var Cart = $('#woo-site-header-menu #the-cart');

    var updateLink = function () {
        var _cartTotal = Cart.find('.woocommerce-mini-cart__total .amount').first(),
            itemsCount = 0,
            wooWidgetItems = Cart.find('.product_list_widget .quantity');

        wooWidgetItems.each(function(i,el){
            var _num,
                _txt = $(el).text();

            _num = _txt.match(/[0-9]+/)[0];

            itemsCount += parseInt(_num);
        });

        // update
        _total.html(_cartTotal.html());
        if(itemsCount === 1) {
            _items.html( _linkTmplOne.replace(/\%d/, itemsCount) );
        } else {
            _items.html( _linkTmplMany.replace(/\%d/, itemsCount) );
        }

    };

    var inLink = false,
        inCart = false;

    function inAny() {
        return !! (inCart || inLink );
    }

    function hideMenu() {
        if( inAny() ) {
            return;
        }

        Cart.hide();
    }

    function pauseThenHide() {
        setTimeout(function(){
            if( inAny() ) {
                return;
            }

            hideMenu();
        }, 100);
    }

    _items.on('mouseenter', ()=> {
        inLink = true;
        Cart.show();
    });

    Cart.on('mouseenter',()=> {
        inCart = true;
    })

    Cart.on('mouseleave', ()=> {
        inCart = false;
        pauseThenHide();
    });

    _items.on('mouseleave', ()=> {
        inLink = false;
        pauseThenHide();
    });
});
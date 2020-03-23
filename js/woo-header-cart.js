/**
 * Handle the updating of the link (in the header) to the cart
 * 
 * @since 1.2.0
 */
jQuery(function($){
    var _total = $('#woo-site-header-menu #the-link .amount'),
        _items = $('#woo-site-header-menu #the-link .cart-items-total'),
        _droparrow = $('#woo-site-header-menu #the-link .drop-arrow'),
        _linkTmplZero = $('#woo-site-header-menu tmpl#zero').text(),
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
        if(itemsCount === 0) {
            _total.html( _total.text().replace(/\d+\.\d+/,'0.00') );
            _items.html( _linkTmplZero );
        } else {
            _total.html(_cartTotal.html());
            if(itemsCount === 1) {
                _items.html( _linkTmplOne.replace(/\%d/, itemsCount) );
            } else {
                _items.html( _linkTmplMany.replace(/\%d/, itemsCount) );
            }
        }

    };

    var inLink = false,
        inCart = false;

    function inAny() {
        return !! (inCart || inLink );
    }

    function hideCart() {
        if( inAny() ) {
            return;
        }

        Cart.hide();
        _droparrow.removeClass('fa-angle-up').addClass('fa-angle-down');
    }

    function showCart() {
        Cart.show();
        _droparrow.removeClass('fa-angle-down').addClass('fa-angle-up');
    }

    function pauseThenHide() {
        setTimeout(function(){
            if( inAny() ) {
                return;
            }

            hideCart();
        }, 100);
    }

    _items.on('mouseenter', ()=> {
        inLink = true;
        showCart();
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

    _droparrow.toggle(showCart, hideCart);
});
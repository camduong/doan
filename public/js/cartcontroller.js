var cart = {
    init: function () {
        cart.regEvents();
    },

    regEvents: function () {
        $('#btnCheckout').off('click').on('click', function () {
            window.location.href = "/Home/Checkout";
        });
        $('#btnUpdate').off('click').on('click', function () {
            var listTour = $('.quantity');
            var cartList = [];
            $.each(listTour, function (i, item) {
                cartList.push({
                    Quatity: $(item).val(),
                    Tour: $(item).data('id')
                    
                });
            });

            $.ajax({
                url: '/update',
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { cartModel: cartList },
                dataType: 'json',
                type: 'POST',
                success: function (res) {
                    if (res == true) {
                        window.location.href = '/tour';
                    }
                }
            })
        });

        $('.btn-delete').off('click').on('click', function (e) {
            e.preventDefault();
            $.ajax({
                url: '/delete',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { id: $(this).data('id') },
                dataType: 'json',
                type: 'POST',
                success: function (res) {
                    if (res == true) {
                        window.location.href = '/tour';
                    }
                }
            })
        });

        $('#btnDelete').off('click').on('click', function () {

            $.ajax({
                url: "/deleteall",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                type: 'POST',
                success: function (res) {
                    if (res == true) {
                        window.location.href = '/';
                    }
                }
            })
        });
    }
}
cart.init();
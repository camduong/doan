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
                    Tour: {
                        Id: $(item).data('id')
                    }
                });
            });

            $.ajax({
                url: '/update',
                data: { cartModel: JSON.stringify(cartList) },
                dataType: 'json',
                type: 'POST',
                
            })
        });

        $('.btn-delete').off('click').on('click', function (e) {
            e.preventDefault();
            $.ajax({
                url: '/delete',
                data: { id: $(this).data('id') },
                dataType: 'json',
                type: 'POST',
                
            })
        });

        $('#btnDelete').off('click').on('click', function () {

            $.ajax({
                url: "{{ route ('deleteall')}}",
                dataType: 'json',
                type: 'POST',
                
            })
        });
    }
}
cart.init();
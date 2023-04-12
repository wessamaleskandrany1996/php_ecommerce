$(document).ready(function(){
    $('.increment-btn').click(function(e){
        var qty = $(this).closest('.product-data').find('.input-qty').val();
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value ;
        if (value < 10 ) {
            value++;
            $(this).closest('.product-data').find('.input-qty').val(value);
        }
    });
    $('.decrement-btn').click(function(e){
        var qty = $(this).closest('.product-data').find('.input-qty').val();
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value ;
        if (value > 1 ) {
            value--;
            $(this).closest('.product-data').find('.input-qty').val(value);
        }
    })
})
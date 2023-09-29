$(document).ready(function(){


    loadecart();
    function loadecart(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
       });
        $.ajax({
            method:"post",
            url:"/load-cart-data",
           
            success:function (response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count)

            }
            });
    }
    loadewishlist();
    function loadewishlist(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
       });
        $.ajax({
            method:"post",
            url:"/load-wislist-data",
           
            success:function (response) {
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count)

            }
            });
    }

    $('.addtocartbtn').click(function (e) {
        e.preventDefault();
        var product_id=$(this).closest('.product_data').find('.prod_id').val();
        var product_qty=$(this).closest('.product_data').find('.qty-input').val();
          
    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
               });
    $.ajax({
        method:"POST",
        url:"/add-to-cart",
        data:{
            'product_id':product_id,
            'product_qty':product_qty,
        },
        success:function (response) {
            swal(response.status);
            loadecart();



        }
    });
    

    });
        $('.addtowishlist').click(function (e) {
            e.preventDefault();
            var product_id=$(this).closest('.product_data').find('.prod_id').val();
      
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
           });
           $.ajax({
            method:"POST",
            url:"/add-to-wishlist",
            data:{
                'product_id':product_id,
            },
            success:function (response) {
                swal(response.status);
                loadewishlist();

            }
        });
        });
    $('.increment-btn').click(function (e) {
        e.preventDefault();
        var inc_value = $(this).closest('.product_data').find(".qty-input").val();
        var value = parseInt(inc_value ,10);
        value = isNaN(value) ? 0 : value;
        if (value < 10){
            value=value+1;
            $(this).closest('.product_data').find(".qty-input").val(value);
        }
    
    });
     
    $('.decrement-btn').click(function (e) {
        e.preventDefault();
        var dec_value = $(this).closest('.product_data').find(".qty-input").val();    
        var value = parseInt(dec_value ,10);
        value = isNaN(value) ? 0 : value;
        if (value < 10){
            value=value-1;
            $(this).closest('.product_data').find(".qty-input").val(value);            }
    
    });

    $('.delete-prod-item').click(function (e) {
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find(".prod_id").val();    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
       });

        $.ajax({
        method:"POST",
        url:"delet-cart-item",
        data:{
            'prod_id':prod_id,      
          },
        success:function (response) {
            window.location.reload();
            swal(response.status);

        }
        });
        });

        $('.changequantity').click(function (e) {
                e.preventDefault();
                var prod_id=$(this).closest('.product_data').find('.prod_id').val();
                var qty=$(this).closest('.product_data').find('.qty-input').val();
            data = {
                'prod_id': prod_id,
                'prod_qty' : qty,
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
           });
    
            $.ajax({
            method:"PUT",
            url:"/update-cart",
            data:data,
            success:function (response) {
                window.location.reload();
    
            }
            });
        });



        $('.remove').click(function (e) {
            e.preventDefault();
            var prod_id = $(this).closest('.product_data').find(".prod_id").val();    
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
           });
    
            $.ajax({
            method:"POST",
            url:"delete-item",
            data:{
                'prod_id':prod_id,      
              },
            success:function (response) {
                window.location.reload();
                swal(response.status);
    
            }
            });

           
            });
});
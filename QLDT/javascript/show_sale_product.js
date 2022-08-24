$(document).ready(function(){


    function show_sales_product()
    {
        $.ajax({    
            url: 'function/show_sales_product.php',
            type: 'GET',
            success:function(data){
                $('.owl-stage').html(data);
            },
        });
    }
    show_sales_product();
                
});    
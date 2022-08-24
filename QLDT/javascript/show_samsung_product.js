$(document).ready(function(){


    function show_samsung_product()
    {
        $.ajax({    
            url: 'function/show_samsung_product.php',
            type: 'GET',
            success:function(data){
                $('#row_pd').html(data);
                
            },
        });
    }
    show_samsung_product();
                
});    
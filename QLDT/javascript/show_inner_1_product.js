function show_inner_1_product()
{
    $.ajax(
        {
            url: 'function/show_inner_1_product.php',
            type: 'GET',
            success: function(data)
            {
                $('.products').html(data);
            },
        }
    );
}
show_inner_1_product();
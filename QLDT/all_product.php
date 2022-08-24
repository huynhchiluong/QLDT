<?php
include_once 'header.php';
?>
    <div class="allPhone mt-5">
        
<div class="main">
    <hr><hr>
<h3 style="font-weight: bolder;">Tất cả sản phẩm</h3>
    <ul class="filter">

            <script>
                $('#price').change(function() {
                    var price = $(this).val();
                    console.log(price)
                    $.ajax({
                        url: 'function/all_product_value.php',
                        type: 'GET',
                        data: {
                            price: price
                        },
                        success: function(data) {
                            $('#row_pd').html(data)
                        }


                    });
                });

                function show_samsung_product() {
                    $.ajax({
                        url: 'function/all_product_value.php',
                        type: 'GET',
                        success: function(data) {
                            $('#row_pd').html(data);

                        },
                    });
                }
                show_samsung_product();
            </script>
        </li>
    </ul>

    <div class="container">
        <div class="row" id="row_pd">
        </div>
    </div>
</div>
<script>
    function show_iphone_product() {
        $.ajax({
            url: 'function/all_product_value.php',
            type: 'GET',
            success: function(data) {
                $('#row_pd').html(data);

            },
        });
    }
    show_samsung_product();
</script>
    </div>

<?php
include_once'header.php';
?>
        <div class="main">
            <div class="breadcrumb">
                <ul>
                    <li class="home">
                            <a href="Home.html">Trang chủ</a>
                            <span> > </span>
                        </li>
                        <li class="Typephone">
                            <a href=""> Iphone</a>
                        </li>
                </ul>
            </div>
            <ul class="filter">
                <li class="title">
                    <p>Chọn mức giá: </p>
                </li>
                <li class="frange">
                    
                <select id="price" class="selectbox_price" style="height: 20px;">
						<option value="10000000000">Tất cả</option>
						<option value="10000000">Dưới vnd 10,000,000</option>
						<option value="20000000">Dưới vnd 20,000,000</option>
						<option value="25000000">Dưới vnd 25,000,000</option>
						<option value="40000000">Dưới vnd 40,000,000</option>
                    </select>
                    <script>
                        $('#price').change(function(){
    var price=$(this).val();
    console.log(price)
    $.ajax
    ({
        url:'function/show_iphone_value.php',
        type:'GET',
        data:{
            price:price
        },
        success:function(data)
        {
             $('#row_pd').html(data) 
        }


    });
});
function show_iphone_product()
    {
        $.ajax({    
            url: 'function/show_iphone_value.php',
            type: 'GET',
            success:function(data){
                $('#row_pd').html(data);
                
            },
        });
    }
    show_iphone_product();
                
                    </script>
                </li>
            </ul>
            
            <div class="container">
            <div class="row" id="row_pd">
            </div>
        </div>
        </div>
      <script>
          function show_iphone_product()
    {
        $.ajax({    
            url: 'function/show_iphone_value.php',
            type: 'GET',
            success:function(data){
                $('#row_pd').html(data);
                
            },
        });
    }
    show_iphone_product();
      </script>
    <?php
    include_once'footer.php'; 
    ?>

<!DOCTYPE html>
<html lang=en>
    <head>
        
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" />
        <link rel ="stylesheet" href ="Home.css">
        <link rel="stylesheet" href="content.css">
        <link rel ="stylesheet" href="footer.css">
        <link rel ="stylesheet" href ="Samsung.css">
        <link rel ="stylesheet"  href ="page.css">
        <script src = "Home.js"> </script>
        <title>Smartphone store</title>
        <link rel="icon" href="https://cdn0.iconfinder.com/data/icons/luchesa-vol-6/128/Ecommerce-512.png">
        <link rel="stylesheet" href="header.css">
             
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">    
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
        
      
         <script src="https://kit.fontawesome.com/a076d05399.js"></script>
         <!-- them-->

<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

        
    </head>
    <body>
      
       <header id="header">
        <div class="navbar">
          <ul class="list-item-nav">
            <li class="item-nav" ><a href="index.php">Trang Chủ</a></li>
            <li id="dropdown" class="item-nav"><a class="dropdown" href="all_product.php">Điện Thoại</a>
                <div class="list-phone">
                    <ul class="list-phone-ul">
                        <li class="phone-li"><a href="Apple.php">Apple</a></li>
                        <li class="phone-li"><a href="Samsung.php">Samsung</a></li>
                        <li class="phone-li"><a href="Xiaomi.php">XiaoMi</a></li>
                        <li class="phone-li"><a href="Hauwei.php">Hauwei</a></li>
                        <li class="phone-li"><a href="Oppo.php">Oppo</a></li>
                    </ul>
                </div>
            </li>
          <li class="item-nav"><a href="#BaoHanh">Bảo hành</a></li>
          <li class="item-nav"><a href="lienhe.php">Liên hệ</a></li>
          <li class="item-nav"><a href="function/Cart.php">Giỏ Hàng</a></li>
          <li class="item-nav">
              <form> <div class="search-box">
        <input type="text" autocomplete="off" id="key" placeholder="Tìm sản phẩm khác..." />
        <div class="result"></div></div></form>
        <ul>
    </div>
    
    <script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
    <div class="result_search">

    </div></form></li>
        </ul>
        </div>
    </header>
    
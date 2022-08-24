<?php
include_once 'header.php'

?>

<div class="content">
    <div class="row_1">
        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="page.php?id=81"><img src="IMAGES/quangcao.jpg" alt="Quang Cao 1"></a>
                </div>
                <div class="carousel-item">
                    <a href="all_product.php"><img ><img src="IMAGES/quangcao2.jpg" alt="Chicago"></img></a>
                </div>
                <div class="carousel-item">
                    <a href="page.php?id=16"><img ><img src="IMAGES/quangcao3.jpg" alt="New York"></img></a>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        <div class="advertisement">
            <div class="marquee">
                <div class="col_1">
                    <p style="color:red;font-size:108%;text-align:center; font-weight: bold;">Tin công nghệ</p>
                </div>
                <div class="col_2">
                    <marquee><a href="http://genk.vn/apple-duoc-cap-bang-sang-che-cam-bien-van-tay-touch-id-trong-man-hinh-se-xuat-hien-tren-iphone-2021-20191222123220941.chn">Apple được cấp bằng sáng chế cảm biến vân tay Touch ID trong màn hình, sẽ xuất hiện trên iPhone 2021?</a></marquee>
                </div>
            </div>
            <div class="ad_1">
                <div class="col_1">
                    <img class="img_1" src="IMAGES/iphone11pro.jpg">
                </div>
                <div class="col_2">
                    <div class="row_3">
                        iPhone 11 Pro Max là mẫu smartphone cao cấp nhất của Apple được ra mắt năm 2019
                    </div>
                    <div class="row_4">
                        <i class="fa fa-calendar" aria-hidden="true"></i> 20-11-2019
                        <i class="fas fa-user-alt  "></i> smartphone store
                        <i class="fa fa-comments" aria-hidden="true"></i> 0
                    </div>
                </div>
            </div>
            <div class="ad_2" style="padding: auto;">
                <img href="page.php?id=12"><img src="IMAGES/QuangCao.png"></img>
            </div>
        </div>
    </div>
    <div class="row_2">
        <a href="page.php?id=78"><img src="IMAGES/quangcaodai.jpg.png"></a>
    </div>
    <div class="inner">
        <div class="Tieude_1">
            <div class="Chude">
                <p>SẢN PHẨM KHUYẾN MÃI HOT NHẤT</p>
            </div>
            <div class="Thoigian">
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                <div id="time" align="right">

                </div>
            </div>
        </div>
        <div class="Sanpham_Khuyenmaihotnhat">
            <div class="owl-stage">


            </div>

            <script src="javascript/show_sale_product.js"></script>

        </div>

    </div>
    <div class="inner_1">
        <div class="head">
            <div class=tittle>
                <h3> ĐIỆN THOẠI NỔI BẬT NHẤT</h3>
            </div>
            <div class="list">
                <ul class="list_name">
                    <li class="Iphone"><a href="Apple.php">Iphone</a></li>
                    <li class="Iphone"><a href="Samsung.php">SamSung</a></li>
                    <li class="Iphone"><a href="Xiaomi.php">Xiaomi</a></li>
                    <li class="Iphone"><a href="Hauwei.php">Huawei</a></li>
                    <li class="Iphone"><a href="Oppo.php">Oppo</a></li>
                    <li class="Xem tất cả"><a href="all_product.php">Xem tất cả</a></li>

                </ul>
            </div>

        </div>
        <div class="products">



        </div>
        <script src="javascript/show_inner_1_product.js">
        </script>
    </div>
<hr>
    <div class="allPhone mt-5">
        <?php
        include_once('all_product.php');
        ?>
    </div>
</div>
        <?php
        include_once 'footer.php';
        ?></div>
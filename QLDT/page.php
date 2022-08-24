<?php
    include ('Connect.php');
    include 'header.php';
?>
<?php
    if(!isset($_GET['id'])||$_GET['id']==NULL)
    {
    echo "<script> wordwrap(str)indow.location ='404.php'</script>";
    }else{
        $id=$_GET['id'];
    }
    ?>

<body>
 <?php   
    $id=$_GET['id'];
     $query=mysqli_query($connect,"select * from DienThoai,Img,NhaSanXuat where DienThoai.MaDT=Img.MaDT and DienThoai.MaDT='$id' limit 1");
      
      if(mysqli_num_rows($query)>0)
      {
        while ($result=mysqli_fetch_array($query)) 
        {
          ?>
          
    <div class="main">
        <div class="breadcrumb">
                <div class="home">
                    <a href="index.php">Trang chủ</a>
                    <span> > </span>
                </div>
                <div class="Typephone">
                    <a href="Apple.php"> <?php echo $result['TenNSX']?></a>
                    <h1 id="madt" style="display:none;"><?php echo $result['MaDT']?></h1>
                </div>
                <div class="namephone">
                    <p style="color:black;"><?php echo $result['TenDT']?></p>
                </div>
        </div>
    
        <div class="namephone" >
            <h1 id="name"> 
            <?php echo $result['TenDT']?>
            </h1>
        </div>
            
        <div class="rowdetail"> 
            <div class="img-phone">
                <img class="img" src="<?php echo $result['img2']?>" >
                <h2 style="display:none" id="img_none"><?php echo $result['img2']?></h2>
            </div>
            <div class="price">
                <div class="cost">
                    <b><h1 style="color:brown"class="cost-1" id="gia"><?php  echo $result['GiaDT']?> </h1></b>
                    <div class="pg">
                        <div class="cs">
                            <a class="cost-2"> <?php  echo $result['GiaDT']+2500000?></a> 
                        </div>
                        <div class="giamgia"> 
                            <b style="display:none ">Giảm giá 8%</b>                        
                        </div>
                    </div>
                </div>
                <div class="promotion">
                    <h3><b>Khuyến mãi</b></h3>
                    <label> - Giảm giá 2 triệu đồng khi mua hóa đơn có trị giá trên 20 triệu đồng.</label> <br>
                    <label> - Giảm ngay 2 triệu (áp dụng cho đơn hàng đặt và nhận hàng trong ngày 23 - 24/11) (đã trừ vào giá)</label>

                </div>
              
                <div class="order">
                    <div class="addpro">
                        <hr>
                        <label>&emsp; Số lượng:&emsp; </label>
                        <input type="number" class="sl" value="1">
                        <button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"  id="addcart" >Thêm vào giỏ hàng</button>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            function showcart()
                            {
                                $.ajax({
                                    url:'function/cart.php',
                                    type:'GET',
                                   
                                    success:function(data)
                                    {
                                        $('.cart').html(data);
                                        
                                    }
                                });
                            }
                            showcart();
                            $('#addcart').on('click',function(){
                                var ten=$('.namephone').children('#name').text();
                                var gia=$('.price').find('#gia').text();
                                var img=$('.img-phone').find('#img_none').text();
                                var sl=$('.sl').val();
                                var madt=$('.Typephone').find('#madt').text();
                                console.log(madt)
                                $.ajax({
                                    url:'function/cart.php',
                                    type:'GET',
                                    data:{
                                        ten,gia,img,sl,madt
                                    },
                                    success:function(data)
                                    {
                                        showcart();
                                    }
                                });
                                
                            });
                                                    
                                $(document).ready(function(){
                                    $(document).on('click','#del',function(){
                                    var id  = $(this).data('id_del');
                                    console.log(id);
                                    $.ajax({
                                        type : 'GET',
                                        url : 'function/delete_cart.php',
                                        data : {id},
                                        success: function(data){
                                            showcart();
                                        }
                                    })
                                    

                                    
                                    } )
                                });

                        });
                            
                    </script>

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button> -->

<div class="modal fade bs-example-modal-lg" id="showcart" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
          <table class="cart table table-stripped"></table>              
    </div>
  </div>
</div>



                    <div class="choosebuy">
                        <button id="buy" >Mua ngay</button>
                    </div>
                </div>
            </div>
            <div class="parameter">
                <h2> Thông số kỹ thuật</h2>
                <table>
                    <tr>
                    <td id="1">Màu sắc:</td>
                        <td itemprop="mausac">
                        <?php echo $result['MauSac']?>
                        </td>
                    </tr>
                    <tr>
                        <td id="1">Kích thước:</td>
                        <td itemprop="kichthuoc">
                        <?php echo $result['KichThuoc']?>
                        </td>
                    </tr>
                    <tr>
                        <td id="1">Trọng lượng</td>
                        <td itemprop="trongluong">
                        <?php echo $result['TrongLuong']?>
                        </td>
                    </tr>
                    <tr>
                        <td id="1">Dung lượng </td>
                        <td item="dungluong">
                        <?php echo $result['DungLuong']?>
                        
                        </td>
                    </tr>
                    <tr>
                        <td id="1">Hệ điều hành:</td>
                        <td itemprop="HDH"> 
                        <?php echo $result['HDH']?>
                        </td>
                    </tr>
                    <tr>
                        <td id="1">Camera</td>
                        <td> <?php echo $result['Camera']?></td>
                    </tr>
                    <tr>
                        <td id="1">CPU:</td>
                        <td itemprop="CPU">	
                        <?php echo $result['CPU']?>
                        </td>
                    </tr>
                    <tr>
                        <td id="1">Bluetooth</td>
                        <td itemprop="bluetooth">
                        <?php echo $result['Bluetooth']?>
                        </td>
                    </tr>
                    <tr>
                        <td id="1">Wifi</td>
                        <td itemprop="wifi">
                        <?php echo $result['Wifi']?>
                        </td>
                    </tr>
                    <tr>
                        <td id="1"> Thẻ SIM</td>
                        <td itemprop="SIM">
                        <?php echo $result['Sim']?>
                        </td>
                    </tr>
                    <tr>
                        <td id="1">Pin</td>
                        <td itemprop="pin">
                        <?php echo $result['Pin']?>
                        </td>
                    </tr>
                    <tr>
                        <td id="1">Ngày sản xuất</td>
                        <td itemprop="Ngaysx">
                        <?php echo $result['NgaySX']?>
                        </td>
                    </tr>
                    <tr>
                        <td id="1">Bảo hành</td>
                        <td itemprop="Baohanh">
                        <?php echo $result['ThoiGianBH']?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="content">
        <div class="info">
            <div class="description">
                <label >Mô tả sản phẩm</label>
                <h4>
                <?php echo $result['MoTa']?>
                </h4>
                <div class="img-des">
                    <img src= "<?php echo $result['img3']?>" >
                </div>
     
            </div>
            
        </div>
        </div>
        
    </div>
  
           <?php
            }
        }
        
    ?>
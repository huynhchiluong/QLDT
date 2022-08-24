<?php
    include 'Connect.php';
?>
<?php
    include 'header.php';
?>
<!DOCTYPE html>
<html>
    <header<>
        <title>
            HOÁ ĐƠN 
        </title>
        <link rel="stylesheet" href="hoadon.css">
    </header>
    <body>
    
        <div class="main">
            
            <div class="infbill">
                <hr>
                <br><br>
                <h1>Thông tin hóa đơn đặt hàng</h1>
                <p style="color:black; margin-left:30px;font-weight: bolder">Mã hóa đơn:</p> <p style="color:black; margin-left:30px;" id="hoadonid"><?php echo rand(); ?></p>
             <?php
            $query=mysqli_query($connect,"Select * from Cart");
            $subtotal=0;
            $total=0;
            if (mysqli_num_rows($query)>0) {
                while ($row=mysqli_fetch_array($query)) {
                    ?>
                <div class="pro">
               
                    <div class="img">
                        <img src="<?php echo $row['img']?>">
                    </div>
                    <div class="infm">
                        <h2><?php echo $row['ten']?></h2>
                        <!-- <h4>Giảm giá 3%</h4> -->
                        <div class="sl">
                            <b> Số lượng: <p style="color:black;"><?php echo $row['soluong']?></p></b>
                            
                        </div>
                    </div>
                    <div class="price">
                        
                        <b>Đơn giá: </b> <b style="color:red;"><?php echo number_format($row['gia'])?> VNĐ</b><br>
                        <p>Tổng:  <?php echo number_format($row['gia']*$row['soluong'])?> VNĐ</p>
                        <?php
                            $subtotal=$row['gia']*$row['soluong'];
                            $total+=$subtotal;
                        ?>
                    </div>
              
                </div>
                <?php
                }
            }?>
                <div class="sum-price">
                    <b> Thành tiền:</b>
                    <h4 style="color:red; font-weight: bolder;"> <?php echo number_format($total)?> VNĐ</h4>
                </div>
                <div class="pay">
                    <button id="thanhtien" class="btn btn-secondary">Thanh toán</button>
                </div>
            </div>
            <div class="infcus">
            <hr>
                <br><br>
                <h1>Thông tin khách hàng</h1>
                <div class="cus">
                    <div class="name">
                        <p style="color: black; font-weight: bold;"> Họ tên khách hàng</p>
                        <input type="text" id="name" name="ten" placeholder="Họ và tên">
                    </div>
                    <div class="phonenumber">
                        <p style="color: black; font-weight: bold;"> Số điện thoại:</p>
                        <input type="tel" id="sdt" name="sdt" placeholder="0985622463">
                    </div>
                    <div class="mail">
                        <p style="color: black; font-weight: bold;">Gmail</p>
                        <input type="email" id="email" name="gmail" placeholder="e@gmail.com" >
                    </div>
                    <div class="address">
                        <p style="color: black; font-weight: bold;">Địa chỉ</p>
                        <input type="text" id="dc" name="dc" placeholder="TPHCM" >
                        
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $('#thanhtien').on('click',function(){
                    var name=$('#name').val();
                    var sdt=$('#sdt').val();
                    var email=$('#email').val();
                    var dc=$('#dc').val();
                    var mahd=$('.infbill').find('#hoadonid').text();
                    console.log(mahd)
                    $.ajax({
                        url:'function/ajax_thanhtoan.php',
                        type:'POST',
                        data:{name,sdt,email,dc,mahd},
                        success:function(data)
                        {
                            alert('Thành công rồi nhé');
                            header("Location: index.php");
                           
                        },
                    });
                });
            });
        </script>
    </body>
</html>
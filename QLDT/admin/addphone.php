<?php
include_once('Connect.php');
include_once('include/header.php');
include_once('include/navbar.php');
// include('process-add-phone.php');

if (isset($_POST['add_product'])) {
    $addphoneStatus = false;

    $TenDT = $_POST['tenDT'];
    $GiaDT = $_POST['gia'];
    $MaNSX = $_POST['MaNSX'];
    $MoTa = $_POST['mota'];
    $KichThuoc = $_POST['kichThuoc'];
    $TrongLuong = $_POST['TrongLuong'];
    $MauSac = $_POST['Mau'];
    $DungLuong = $_POST['kichThuoc'];
    $HDH = $_POST['HDH'];
    $CPU = $_POST['CPU'];
    $Camera = $_POST['Camera'];
    $ThoiGianBH = $_POST['ThoiGianBH'];
    $Bluetooth = $_POST['Bluetooth'];
    $Wifi = $_POST['Wifi'];
    $Sim = $_POST['Sim'];
    $Pin = $_POST['Pin'];
    $NgaySX = $_POST['NgaySX'];
    $SoLuong = $_POST['SoLuong'];
    $Image = '';
    $Image2 = '';
    $Image3 = '';
    

    switch($MaNSX) {
        case 'NSX001':
            $Image = 'img/iphone/' . $_FILES['Image']['name'];
            $Image2 = 'img/iphone/' . $_FILES['Image2']['name'];
            $Image3 = 'img/iphone/' . $_FILES['Image3']['name'];
            move_uploaded_file($_FILES['Image']['tmp_name'], '../img/iphone/' . $_FILES['Image']['name']);
            move_uploaded_file($_FILES['Image2']['tmp_name'], '../img/iphone/' . $_FILES['Image2']['name']);
            move_uploaded_file($_FILES['Image3']['tmp_name'], '../img/iphone/' . $_FILES['Image3']['name']);
        break;
        case 'NSX002':
            $Image = 'img/samsung/' . $_FILES['Image']['name'];
            $Image2 = 'img/samsung/' . $_FILES['Image2']['name'];
            $Image3 = 'img/samsung/' . $_FILES['Image3']['name'];
            move_uploaded_file($_FILES['Image']['tmp_name'], '../img/samsung/' . $_FILES['Image']['name']);
            move_uploaded_file($_FILES['Image2']['tmp_name'], '../img/samsung/' . $_FILES['Image2']['name']);
            move_uploaded_file($_FILES['Image3']['tmp_name'], '../img/samsung/' . $_FILES['Image3']['name']);
        break;
        case 'NSX003':
            $Image = 'img/huawei/' . $_FILES['Image']['name'];
            $Image2 = 'img/huawei/' . $_FILES['Image2']['name'];
            $Image3 = 'img/huawei/' . $_FILES['Image3']['name'];
            move_uploaded_file($_FILES['Image']['tmp_name'], '../img/huawei/' . $_FILES['Image']['name']);
            move_uploaded_file($_FILES['Image2']['tmp_name'], '../img/huawei/' . $_FILES['Image2']['name']);
            move_uploaded_file($_FILES['Image3']['tmp_name'], '../img/huawei/' . $_FILES['Image3']['name']);
        break;
        case 'NSX004':
            $Image = 'img/xiaomi/' . $_FILES['Image']['name'];
            $Image2 = 'img/xiaomi/' . $_FILES['Image2']['name'];
            $Image3 = 'img/xiaomi/' . $_FILES['Image3']['name'];
            move_uploaded_file($_FILES['Image']['tmp_name'], '../img/xiaomi/' . $_FILES['Image']['name']);
            move_uploaded_file($_FILES['Image2']['tmp_name'], '../img/xiaomi/' . $_FILES['Image2']['name']);
            move_uploaded_file($_FILES['Image3']['tmp_name'], '../img/xiaomi/' . $_FILES['Image3']['name']);
        break;
        case 'NSX005':
            $Image = 'img/oppo/' . $_FILES['Image']['name'];
            $Image2 = 'img/oppo/' . $_FILES['Image2']['name'];
            $Image3 = 'img/oppo/' . $_FILES['Image3']['name'];
            move_uploaded_file($_FILES['Image']['tmp_name'], '../img/oppo/' . $_FILES['Image']['name']);
            move_uploaded_file($_FILES['Image2']['tmp_name'], '../img/oppo/' . $_FILES['Image2']['name']);
            move_uploaded_file($_FILES['Image3']['tmp_name'], '../img/oppo/' . $_FILES['Image3']['name']);
        break;
    }

    
    //Check connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }
    $sql = "INSERT INTO DienThoai (MaNSX,TenDT,MoTa,GiaDT,KichThuoc ,MauSac ,TrongLuong,DungLuong ,HDH ,CPU, Camera , ThoiGianBH ,Bluetooth ,Wifi,Sim ,Pin ,NgaySX )
    values('$MaNSX','$TenDT','$MoTa','$GiaDT','$KichThuoc','$TrongLuong','$MauSac','$DungLuong','$HDH','$CPU','$Camera','$ThoiGianBH','$Bluetooth','$Wifi','$Sim','$Pin','$NgaySX'); ";
    
    if($connect->query($sql)){
    $sql="select max(MaDT) as `Lon` from `dienthoai` ";
    $result=mysqli_query($connect,$sql);
    $ma=mysqli_fetch_array($result);
    $MaDT = $ma['Lon'];
    $sql_image = "INSERT INTO img (img1,img2,img3,MaDT) values ('$Image','$Image2','$Image3','$MaDT');";
    $sql_tonKho = "INSERT INTO tonkho (MaDT,SoLuongTon) values('$MaDT','$SoLuong');";
    if ($connect->query($sql_image) === TRUE && $connect->query($sql_tonKho) === TRUE) {
        echo '<script type="text/JavaScript">
            alert("Thêm thành công");
        </script>';
    } else {
        echo '<script type="text/JavaScript">
            alert("Thêm thất bại ! ! !");
        </script>';
    }
    } else {
        echo '<script type="text/JavaScript">
            alert("Thêm thất bại ! ! !");
        </script>';}
}


?>

<div id="content-wrapper">

    <div class="container-fluid">
        <form method="post" action="addphone.php" enctype="multipart/form-data" class="d-flex justify-content-center align-items-center">
            <table class="w-50">
                <th colspan="2">Thêm Thông Tin Sản Phẩm</th>
                <tr>
                
                    <td class="ThongTin">Tên Điện Thoại</td>
                    <td><input name=" tenDT" class="w-100" id="TenDT" type="text" placeholder="Iphone 11 Pro Max"></td> </tr>
                <tr>
                    <td class="ThongTin">Nhà Sản Xuất</td>
                    <td>
                        <select name=" MaNSX" id="TenNSX">
                            <?php
                            $SQLQuery = "select * from nhasanxuat";
                            $result = mysqli_query($connect, $SQLQuery);

                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['MaNSX'] . '">' . $row['TenNSX'] . '</option>';
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="ThongTin">Giá</td>
                    <td><input name=" gia" id="Gia" type="number" placeholder="39.000.000 VND"></td>
                </tr>
                <tr>
                    <td>Thêm Ảnh</td>
                    <td><input type="file" name="Image" id="Image"><input type="file" name="Image2" id="Image2"><input type="file" name="Image3" id="Image3"></td>
                </tr>
                <tr>
                    <td>Mô Tả</td>
                    <td><textarea name="mota" id="Mota" cols="30" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td>Kích Thước</td>
                    <td><input name="kichThuoc" id="KichThuoc" type="text" placeholder="Dài 163.6 mm - Ngang 75.6 mm - Dày 9.1 mm"></td>
                </tr>
                <tr>
                    <td>Màu Sắc</td>
                    <td><input name="Mau" id="Mau" type="text" placeholder="Black"></td>
                </tr>
                <tr>
                    <td>Trọng Lượng</td>
                    <td><input name="TrongLuong" id="TrongLuong" type="text" placeholder="195 g"></td>
                </tr>
                <tr>
                    <td>Dung Lượng</td>
                    <td><input name="DungLuong" id="DungLuong" type="text" placeholder="128GB"></td>
                </tr>
                <tr>
                    <td>Hệ Điều Hành</td>
                    <td><input name="HDH" id="HDH" type="text" placeholder="iOS"></td>
                </tr>
                <tr>
                    <td>CHIP xử lý</td>
                    <td><input name="CPU" id="CPU" type="text" placeholder="Apple A12 Bionic"></td>
                </tr>
                <tr>
                    <td>Camera</td>
                    <td><input name="Camera" id="Camera" type="text" placeholder="Chính 12 MP & Phụ 8 MP"></td>
                </tr>
                <tr>
                    <td>Thời Gian Bảo Hành</td>
                    <td><input name="ThoiGianBH" id="ThoiGianBH" type="text" placeholder="1 Năm"></td>
                </tr>
                <tr>
                    <td>Bluetooth</td>
                    <td><input name="Bluetooth" id="Bluetooth" type="text" placeholder="A2DP, LE, apt-X, v5.0"></td>
                </tr>
                <tr>
                    <td>Wifi</td>
                    <td><input name="Wifi" id="Wifi" type="text" placeholder="Wi-Fi 802.11 a/b/g/n/ac/ax Dual-band Wi-Fi Direct, Wi-Fi hotspot"></td>
                </tr>
                <tr>
                    <td>Sim</td>
                    <td><input name="Sim" id="Sim" type="text" placeholder="2 Sim nano"></td>
                </tr>
                <tr>
                    <td>Dung Lượng Pin</td>
                    <td><input name="Pin" type="text" id="Pin" placeholder="5000mAh"></td>
                </tr>
                <tr>
                    <td>Ngày Ra Mắt</td>
                    <td><input name="NgaySX" type="date" id="NgaySX" placeholder="1/1/2019"></td>
                </tr>
                <tr>
                    <td>Số Lượng</td>
                    <td><input name="SoLuong" type="number" id="SoLuong"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" id="submit" name="add_product" value="Thêm Sản Phẩm"></td>
                </tr>
            </table>
        </form>
    </div>
    
    <style>

.addPhone
{
    position: relative;
    width: 50%;
    margin: auto;
    background-color: white;
    border-radius: 30px;
    opacity: 0.8;
}
.addPhone form ,table{
    width: 100%;
}
.addPhone th{
    font-size: 250%;
    width: 100%;
}
.addPhone .w-50 td{
    width: 40%;
    padding: 0.5% 3%;
    text-align: left;
}
.addPhone textarea{
    width: 100%;
}
.addPhone form input{
    width: 100%;
}
#submit{
    color:floralwhite;
    background-color:rgba(129, 127, 127, 0.8);
    width: 65%;
    height: 100%;
    border:0;
    border-radius: 30px;
    font-size: 150%;
    color:black;
    margin: auto;
}
    </style>

    </script>
    
    <?php
    include_once('include/script.php');
    include_once('include/footer.php');
    ?>
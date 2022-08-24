<?php
include_once '../Connect.php' ;
?>
<?php

    if(isset($_POST['name']))
    {
        $mahd=$_POST['mahd'];
        $name=$_POST['name'];
        $sdt=$_POST['sdt'];
        $email=$_POST['email'];
        $dc=$_POST['dc'];
        $query=mysqli_query($connect,"Insert into KhachHang(TenKH,Email,SDT,DiaChi)values('$name','$email','$sdt','$dc')");
        $query_select_makh=mysqli_query($connect,"Select MaKH from KhachHang where TenKH='$name' and Email='$email'");
        $result=mysqli_fetch_assoc($query_select_makh);
        $MaKH=$result['MaKH'];
        $query_insert_hoadon=mysqli_query($connect,"insert into HoaDon(MaHD,MaNV,MaKH,MaKM)values('$mahd','1','$MaKH','KM000')");
        $query_select_cart=mysqli_query($connect,"select *  from Cart");
        $Tong=0;
        if($query_select_cart)
        {
            while($row=mysqli_fetch_array($query_select_cart))
            {
                $ten=$row['ten'];
                $madt=$row['MaDT'];
                $gia=$row['gia'];
                $soluong=$row['soluong'];
                $dongia=$row['soluong']*$row['gia'];
                $Tong+=$dongia;
                
                
            //    // $query_select_product=mysqli_query($connect,"select MaDT from DienThoai where MaDT='$madt'");
                
            //     $lol=mysqli_fetch_assoc($query_select_product);
            //     $Madt=$lol['MaDT'];
                $query_insert_cthd=mysqli_query($connect,"Insert into CTHD(MaDT,MaHD,SoLuong,DonGia)values('$madt','$mahd','$soluong','$dongia')");
                $sql_capnhat= mysqli_query($connect,"update hoadon set TongTien='$Tong'where hoadon.MaHD='$mahd'");
                $query_delete_cart=mysqli_query($connect,"delete from Cart");
                     
            }
        }
    }
?>
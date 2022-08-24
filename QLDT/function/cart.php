<?php
include_once '../Connect.php' ;
?>
<?php
 if(isset($_GET['ten'])) {
    $ten=$_GET['ten'];
    $gia=$_GET['gia'];
    $img=$_GET['img'];
    $sl=$_GET['sl'];
    $MaDT=$_GET['madt'];
    $query_select=mysqli_query($connect,"select * from Cart where ten='$ten'");
    if(mysqli_num_rows($query_select))
    {
        $query_update=mysqli_query($connect,"update Cart set soluong =soluong+'$sl' where ten='$ten'");
    }
    else{
        $query=mysqli_query($connect, "insert into Cart(ten,img,gia,soluong,MaDT)values('$ten','$img','$gia','$sl','$MaDT')");
    }
    
}
$output='';
$output.=' <tr><td colspan="4" style="text-align:center">Giỏ hàng của bạn</td></tr> ';
$output.='
    <tr>
    <th>
    STT
    </th>
    <th>
    Tên
    </th>
    <th>Giá</th>
    <th>Hình ảnh</th>
    <th>Số lượng</th>
    <th>Xoá</th>
    </tr>
    ';
    $i=0;
$query=mysqli_query($connect,"Select * from Cart");
if($query)
{
    while($row=mysqli_fetch_array($query))
    {
        $i++;
        $output.='
        <tr>
        <td>
       '.$i.'
        </td>
        <td>
        '.$row['ten'].'
        </td>
        <td>'.number_format($row['gia']).'</td>
        <td><img style= "width:20%" src="'.$row['img'].'"</td>
        <td>'.$row['soluong'].'</td>
        <td><button  id="del" data-id_del='.$row['id'].'><i class="fas fa-trash-alt"></i></button></td>
        </tr>
        ';
    }
    $output.='<tr><td colspan="6"><a href="hoadon.php"><button style="float:right" class="btn btn-info">Thanh toán</button></a></td></tr>';
    
}
echo $output;
?>



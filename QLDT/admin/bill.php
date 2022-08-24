<?php
include_once('include/header.php');
include_once('include/navbar.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"> <i class="fas fa-money-bill-wave"></i></i>&ensp;Hóa đơn</h1>
    <p class="mb-4">Hóa đơn là chứng từ do người bán lập, ghi nhận thông tin bán hàng hóa, cung ứng dịch vụ theo quy định. Chi tiết tất cả các Hóa đơn </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tất cả hóa đơn &ensp;</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" style="text-align: center; color:black;" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>MaHD</th>
                            <th>Thời gian đặt hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Tình trạng</th>
                            <th>Xác nhận</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $out = "";
                        $i=0;
                        $query = "select *from hoadon,khachhang where hoadon.MaKH=khachhang.MaKH";
                        $result = mysqli_query($connect, $query);
                        if ($result) {
                            while ($row = mysqli_fetch_array($result)) {
                               $i++;
                        ?>

                                <tr id="<?php echo $row['MaHD'];?>">
                                    <td ><?php echo $i ?></td>
                                    <td data-target="MaHD" ><?php echo $row['MaHD'] ?></td>
                                    <td data-target="NgayLap"><?php echo $row['NgayLap'] ?></td>
                                    <td data-target="TenKH"><?php echo $row['TenKH'] ?></td>
                                    <td data-target="SDT"><?php echo $row['SDT'] ?></td>
                                    <td data-target="DiaChi"><?php echo $row['DiaChi'] ?></td>
                                    <?php if(!($row['TinhTrang']=='Thanh toan')){
                                        echo '<td data-target="TinhTrang" style="color:red;">Chưa Thanh Toán</td>';
                                        echo '<td><a href="#" data-role="update" data-id="'.$row['MaHD'].'" class="btn btn-outline-danger" role="button" aria-disabled="true"><i class="fas fa-pencil-alt"></i>&nbsp Xác nhận </a></td>';
                                    }else{echo '<td data-target="TinhTrang";">Đã Thanh Toán</td>';
                                        echo '<td><p>----------</p></td>';
                                    }
                                    ?>
                                    
                                </tr>
                                
                        <?php
                            }
                        };

                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                             <th>STT</th>
                            <th>MaHD</th>
                            <th>Thời gian đặt hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Tình trạng</th>
                            <th>Xác nhận</th>
                        </tr>
                    </tfoot>


                </table>
            </div>
            <script>
    $(document).ready(function(){
        $(document).on('click','a[data-role=update]',function(){
            var id = $(this).data('id');
            $.ajax({
                type: 'POST',
                url:'updateBill.php',
                data: {id},
                success: function(data){
                    alert(data);
                },
                error:function(){
                    alert('Không thành công');
                }
            })
        })
    });

</script>

<?php
include_once('include/footer.php');
include_once('include/script.php');

?>
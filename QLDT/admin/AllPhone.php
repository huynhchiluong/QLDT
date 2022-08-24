<?php

include_once('include/header.php');
include_once('include/navbar.php');
include_once('Connect.php')
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"> <i class="fa fa-mobile" aria-hidden="true"></i>&ensp;Điện Thoại</h1>
    <p class="mb-4">Chi tiết tất cả các điện thoại. Không được phép xóa các sản phẩm đã thêm </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tất cả điện thoại &ensp;<a href="addphone.php" class="btn btn-primary btn-lg" role="button" aria-disabled="true">Thêm Mới </a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" style="text-align: center; color:black;" cellspacing="0">
                    <thead>
                        <tr>
                            <th>MaDT</th>
                            <th>Hãng</th>
                            <th>Tên điện thoại</th>
                            <th>Giá</th>
                            <th>Ảnh</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $out = "";
                        $query = "select *from dienthoai,nhasanxuat,Img where dienthoai.MaNSX=nhasanxuat.MaNSX and dienthoai.MaDT=img.MaDT order by dienthoai.MaDT";
                        $result = mysqli_query($connect, $query);
                        if ($result) {
                            while ($row = mysqli_fetch_array($result)) {
                               $english_format_number = number_format($row['GiaDT']);
                        ?>

                                <tr id="<?php echo $row['MaDT'];?>">
                                    <td data-target="MaDT" ><?php echo $row['MaDT'] ?></td>
                                    <td data-target="TenNSX"><?php echo $row['TenNSX'] ?></td>
                                    <td data-target="TenDT"><?php echo $row['TenDT'] ?></td>
                                    <td data-target="GiaDT" > <?php echo $english_format_number ?></td>
                                    <td> <img style="height: 100px" src="../<?php echo $row['img1'] ?>"></td>
                                    <td><a href="#" data-role="update" data-id="<?php echo $row['MaDT'];?>" class="btn btn-success" role="button" aria-disabled="true"><i class="fas fa-pencil-alt"></i>&nbsp Sửa </a></td>
                                </tr>
                        <?php
                            }
                        };

                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>MaDT</th>
                            <th>Hãng</th>
                            <th>Tên điện thoại</th>
                            <th>Giá</th>
                            <th>Ảnh</th>
                            <th>Sửa</th>
                        </tr>
                    </tfoot>


                </table>
            </div>
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
        </div>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 class="modal-title">Cập nhật giá bán sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="ThongTin">Mã điện thoại</label>
                        <input name="MaDTm" class="w-100" id="MaDTm" type="text" disabled="disabled"></<input>
                    </div>
                    <div class="form-group">
                        <label class="ThongTin">Tên Điện Thoại</label>
                        <input name="TenDTm" class="w-100" id="TenDTm" type="text"></<input>
                    </div>
                    <div class="form-group">
                        <label class="ThongTin">Giá</label>
                        <input name="GiaDTm" class="w-100" id="GiaDTm" type="text"></<input>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" id="save" class="btn btn-primary pull-right">Cập Nhật</a>
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /.container-fluid -->
<script>
    $(document).ready(function(){
        $(document).on('click','a[data-role=update]',function(){
            var id = $(this).data('id');
            var MaDT = $('#'+id).children('td[data-target=MaDT]').text();
            var TenDT = $('#'+id).children('td[data-target=TenDT]').text();
            var GiaDT = $('#'+id).children('td[data-target=GiaDT]').text();
             GiaDT=parseInt(GiaDT.split(',').join(''));
            $('#MaDTm').val(MaDT);
            $('#TenDTm').val(TenDT);
            $('#GiaDTm').val(GiaDT);
            $('#myModal').modal('toggle');
        })
    });
    $(document).ready(function(){
    $('#myModal').on('click','#save', function (e) {
        
        var rowid = $('#MaDTm').val();
        var TenDT =$('#TenDTm').val();
        var GiaDT = $('#GiaDTm').val();
        $.ajax({
            type : 'post',
            url : 'updatePhone.php', 
            data :  {rowid,TenDT,GiaDT},
            success : function(data){ 
                $('#myModal').modal('hide');
                alert('Cập nhật thành công');
                window.location.reload();
            }
        });
     });
});
</script>
</div>
<!-- End of Main Content -->

<?php
include_once('include/script.php');
include_once('include/footer.php');
?>
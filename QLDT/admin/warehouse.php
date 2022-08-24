<?php

include_once('include/header.php');
include_once('include/navbar.php');

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"> <i class="fas fa-warehouse"></i>&ensp;</i>Kho</h1>
    <p class="mb-4">Thông tin chi tiết các sản phẩm có trong kho</p>   

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table  class="table table-bordered" id="dataTable" width="100%" style="text-align: center; color:black;"cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Hãng</th>
                            <th>Tên điện thoại</th>
                            <th>Số Lượng Còn Lại</th>
                            <th>Cập Nhật</th>
                        </tr>
                    </thead>           
                    <tbody>

                        <?php
                        $out ="";
                        $query = "select MaKho,TenNSX,TenDT,SoLuongTon from dienthoai,tonkho,nhasanxuat 
                        where dienthoai.MaDT=tonkho.MaDT and nhasanxuat.MaNSX=dienthoai.MaNSX order by dienthoai.MaDT";
                        $result = mysqli_query($connect, $query);
                        if($result){
                        while($row=mysqli_fetch_array($result))
                        {
                            $english_format_number = number_format($row['SoLuongTon']);
                        ?>
                        
                            <tr id="<?php echo $row['MaKho'] ?>">
                                <td data-target='MaKho' > <?php echo $row['MaKho'] ?></td>
                                <td data-target='TenNSX'><?php echo $row['TenNSX'] ?></td>
                                <td data-target='TenDT'><?php echo $row['TenDT'] ?></td>
                                <td data-target='SoLuongTon'><?php echo $english_format_number ?></td>
                                <td><a href="#" data-role="update" data-id="<?php echo $row['MaKho'];?>" class="btn btn-danger" role="button" aria-disabled="true"><i class="fas fa-wrench"></i>&nbsp Cập nhật</a></td>
                            </tr>
                        <?php
                                }
                            };
                            
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Mã</th>
                            <th>Hãng</th>
                            <th>Tên điện thoại</th>
                            <th>Số Lượng Còn Lại</th>
                            <th>Cập Nhật</th>
                        </tr>
                    </tfoot>


                </table>
                   <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 class="modal-title">Cập nhật số lượng sản phẩm trong kho</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="ThongTin">MaKho</label>
                        <input name="MaKhom" class="w-100" id="MaKhom" type="text" disabled="disabled"></<input>
                    </div>
                    <div class="form-group">
                        <label class="ThongTin">Tên Điện Thoại</label>
                        <input name="TenDTm" class="w-100" id="TenDTm" type="text" disabled="disabled"></<input>
                    </div>
                    <div class="form-group">
                        <label class="ThongTin">Số lượng còn lại:</label>
                        <input name="SoLuongTonm" class="w-100" id="SoLuongTonm" type="number"></<input>
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
    <script>
    $(document).ready(function(){
        $(document).on('click','a[data-role=update]',function(){
            var id = $(this).data('id');
            var MaKho = $('#'+id).children('td[data-target=MaKho]').text();
            var TenDT = $('#'+id).children('td[data-target=TenDT]').text();
            var SoLuongTon = $('#'+id).children('td[data-target=SoLuongTon]').text();
             SoLuongTon=parseInt(SoLuongTon);
            $('#MaKhom').val(MaKho);
            $('#TenDTm').val(TenDT);
            $('#SoLuongTonm').val(SoLuongTon);
            $('#myModal').modal('toggle');
        })
    });
    $(document).ready(function(){
    $('#myModal').on('click','#save', function (e) {
        
        var rowid = $('#MaKhom').val();
        var TenDT =$('#TenDTm').val();
        var SoLuongTon = $('#SoLuongTonm').val();
        console.log(rowid,TenDT,SoLuongTon);
        $.ajax({
            type : 'post',
            url : 'updateWH.php', 
            data :  {rowid,SoLuongTon},
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

<?php
include_once('include/script.php');
include_once('include/footer.php');
?>
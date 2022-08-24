<!-- <?php 
      include_once "../Connect.php";
      $strSQL = "select DienThoai.TenDT,GiaDT,Img.img1,CPU,Camera,HDH from DienThoai,Img 
      where DienThoai.MaNSX='NSX001' and DienThoai.MaDT= Img.MaDT order by GiaDT desc "; 
      $output='';
      $result = mysqli_query($connect, $strSQL);
                if( $result)
                {
                    while ($row = mysqli_fetch_array($result)) 
                    {
                        
                        $output.='<div class="col-3">
                                        <div class="product_img">
                                        <img style="width:70%" src="'.$row["img1"].'">
                                        </div>
                                        <div class="product_name">
                                        <p style="color:red">'.$row["TenDT"].'</p>  
                                        <span style="color:blue;align="center"">'.$row["GiaDT"].'</span>
                                        </div>
                                        <hr style= "dashed">
                                        <div class="Thongtin" >
                                                 <p style="color:black" > CPU: '.$row["CPU"].'</p>
                                                 <p style="color:black">HDH: '.$row["HDH"].'</p>
                                                 <p style="color:black">Camera: '.$row["Camera"].'</p>
                                        </div>
                                       
                    </div>
                    ';
                    }
                }
           else {
               $output.='khong ton tai san pham ';
           }
           echo $output; 
?> -->
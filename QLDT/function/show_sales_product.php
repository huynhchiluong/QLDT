<?php 
                include_once "../Connect.php";
                $strSQL = "select * from DienThoai,Img 
                where DienThoai.MaNSX='NSX001' and DienThoai.MaDT= Img.MaDT order by GiaDT desc LIMIT 5";
                $output='';
                
                $result = mysqli_query($connect, $strSQL);
                if( mysqli_num_rows($result)>0)
                {
                    while ($row = mysqli_fetch_array($result)) 
                    {
                        $_Giacu=$row["GiaDT"]+2500000;
                        $output.='
                        <div class="owl-item"> 
                       
                       <div class="item">
                       <div class="product-item">
                           <div class="product-item-img">
                               <a>
                                   <img src="'.$row["img1"].'">
                               </a>
                           </div>
                           <div class="product-item-info">
                               <div class="product-title">
                               <a href="page.php?id='.$row['MaDT'].'">'.$row["TenDT"].'</a>
                               </div>
                               <div class="product-price">
                                   <span class="gia-moi">'.number_format($row["GiaDT"]).'</span>
                                   <span class="gia-cu">'.number_format($_Giacu).'</span>
                               </div>
                           </div>
                           
                       </div>
                   </div>
                       
                    </div>';
                    }
                 }
            else {
                $output.='khong ton tai san pham ';
            }
            echo $output; 

                ?>
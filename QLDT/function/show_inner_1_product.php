<?php
    include_once '../Connect.php' ;
    $strSQL = "select * from DienThoai,Img 
    where DienThoai.MaNSX='NSX001' and DienThoai.MaDT= Img.MaDT and Year(NgaySX) > 2010 and Month(NgaySX) > 01 and Day(NgaySX) >00 
    order by NgaySX desc LIMIT 5";
    $output=''; 
    $result = mysqli_query($connect,$strSQL);
    if (mysqli_num_rows($result)>0) 
    {
        while ($row = mysqli_fetch_array($result))
        {
            $output.=' <div class="owl-item"> 
            <a  href="page.php?id='.$row['MaDT'].'">
            <div class="item"> 
                <div class="product-item">
                    <div class="product-item-img">
                        <a >
                            <img src="'.$row["img1"].'">
                        </a>
                    </div>
                    <div class="product-item-info">
                        <div class="product-title">
                        <a href="page.php?id='.$row['MaDT'].'">'.$row["TenDT"].'</a>
                        </div>
                        <div class="product-price">
                            <span class="gia-moi" style="color:red;">'.number_format($row["GiaDT"]).'</span>
                            
                        </div>
                    </div>
                    
                </div>
              

            </div>
            </a>
        </div>';
        }
    
    }
    else {
        $output.='khong ton tai san pham ';
    }
    echo $output;
?>
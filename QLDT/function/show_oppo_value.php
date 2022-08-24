<?php
     include_once "../Connect.php";
if(isset($_GET['price']))
{
	$price=$_GET['price'];
	$query=mysqli_query($connect,"SELECT * from DienThoai,Img 
	where DienThoai.MaNSX='NSX005' and DienThoai.MaDT= Img.MaDT and GiaDT<'$price' order by GiaDT desc ");
	$output ='';
     if(mysqli_num_rows($query)>0)
     {
     	
     	
     	while ($row=mysqli_fetch_array($query)) {
     		$total=0;
     		$output .='<div class="col-xl-3">
			 <a href="page.php?id='.$row['MaDT'].'"><img style="width:60%" src="'.$row["img1"].'">
			
			 <div class="product_name">
			 <p style="color:blue">'.$row["TenDT"].'</p>  
			 <span style="color:red;align="center"">'.number_format($row["GiaDT"]).'</span>
			 </div>
			 <hr style= "dashed">
			 <div class="Thongtin" >
					  <p style="color:black" > CPU: '.$row["CPU"].'</p>
					  <p style="color:black">HDH: '.$row["HDH"].'</p>
					  <p style="color:black">Camera: '.$row["Camera"].'</p>
			 </div>
								
			</div>
						
         
        ';	
     		# code...
     	}
     }
     else
     {
     	$output .='<p class="">Danh mục trống</p>';
     }
     $output.='';
     echo $output;
}
else
{ 
	
	$strSQL = "select * from DienThoai,Img 
	where DienThoai.MaNSX='NSX005' and DienThoai.MaDT= Img.MaDT order by GiaDT desc "; 
	$output1='';
	$result1 = mysqli_query($connect, $strSQL);
			  if($result1)
			  {
				  while ($row = mysqli_fetch_array($result1)) 
				  {
					  
					  $output1.='<div class="col-xl-3">
									<a href="page.php?id='.$row['MaDT'].'"><img style="width:60%" src="'.$row["img1"].'">
									
									<div class="product_name">
									<p style="color:blue">'.$row["TenDT"].'</p>  
									<span style="color:red;align="center"">'.number_format($row["GiaDT"]).'</span>
									</div>
									<hr style= "dashed">
									<div class="Thongtin" >
											 <p style="color:black" > CPU: '.$row["CPU"].'</p>
											 <p style="color:black">HDH: '.$row["HDH"].'</p>
											 <p style="color:black">Camera: '.$row["Camera"].'</p>
									</div></a>
									 
				  </div>
				  ';
				  }
			  }
		 else {
			 $output1.='Chưa có sản phẩm nào';
		 }
		 echo $output1; 

}    

?>

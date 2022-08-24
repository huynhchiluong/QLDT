<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include('Connect.php');

if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM dienthoai WHERE TenDT LIKE ?";
    
    if($stmt = mysqli_prepare($connect, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = $_REQUEST["term"] . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo '<p><a href="page.php?id='.$row['MaDT'].'">'. $row["TenDT"] . '</a></p>';
                }
            } else{
                echo "<p>---Không tìm thấy--</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
        }
    }
    
    // Close statement

}
//  if(isset($_GET['key']))
//  {
//      $output='';
//      $i=0;
//      $key=$_GET['key'];
//      $query=mysqli_query($connect,"SELECT * FROM dienthoai WHERE TenDT LIKE '%$key%'");

//      if(mysqli_num_rows($query)>0)
//      {
         
//          while($row=mysqli_fetch_array($query))
//          {
//              $i++;
//              $output.='
//              <p>'.$row["TenDT"].'</p>';
//          }
//      }
//      else{
//          $output.='Khoong co san pham nao';
//      }
//      echo $output;
//  }
// close connection

?>

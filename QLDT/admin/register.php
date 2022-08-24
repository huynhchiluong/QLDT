<?php 
// REGISTER USER
  include_once('Connect.php');
// if (isset($_POST['user'])) {

//   // receive all input values from the form
  
//   $username = mysqli_real_escape_string($connect, $_POST['username']);
  
//   $email = mysqli_real_escape_string($connect, $_POST['email']);
  
//   $password_1 = mysqli_real_escape_string($connect, $_POST['password_1']);
  
//   $password_2 = mysqli_real_escape_string($connect, $_POST['password_2']);
  
//   // form validation: ensure that the form is correctly filled ...
  
//   // by adding (array_push()) corresponding error unto $errors array
  
//   if (empty($username)) { array_push($errors, "Username is required"); }
  
//   if (empty($email)) { array_push($errors, "Email is required"); }
  
//   if (empty($password_1)) { array_push($errors, "Password is required"); }
  
//   if ($password_1 != $password_2) {
  
//   array_push($errors, "Mật khẩu không khớp");
  
//   }
  
//   // first check the database to make sure
  
//   // a user does not already exist with the same username and/or email
  
//   $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  
//   $result = mysqli_query($connect, $user_check_query);
  
//   $user = mysqli_fetch_assoc($result);
  
//   if ($user) { // if user exists
  
//   if ($user['username'] === $username) {
  
//   array_push($errors, "Username đã tồn tại");
  
//   }
  
//   if ($user['email'] === $email) {
  
//   array_push($errors, "email đã tồn tại");
  
//   }
  
//   }
  // Finally, register user if there are no errors in the form
  
  // if (count($errors) == 0) {
  
  // $password = md5($password_1);//encrypt the password before saving in the database
  
  // echo $password ;
  
  // $query = "INSERT INTO users(username, email, password)
  
  // VALUES('$username', '$email', '$password')";
  
  // mysqli_query($connect, $query);
  
  // $_SESSION['username'] = $username;
  
  // $_SESSION['success'] = "You are now logged in";
  
  // header('location: login.php');
  
  // }
  if(isset($_POST['submit']))
  {
    $username=$_POST['username'];
    $password=$_POST['password_1'];
    $email=$_POST['email'];
    $query=mysqli_query($connect,"INSERT INTO users(username,email,password)
  
    VALUES('$username', '$email', '$password')");
    if($query)
    {
      echo "Đã thêm";
      header('location: login.php');
    }
    else
    {
      echo "Thất bại";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Tạo tài khoản</h1>
              </div>
              <form class="user" method="POST" action="">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="username" id="exampleFirstName" placeholder="User Name">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" placeholder="Nhập vào Email ">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="password_1" id="exampleInputPassword" placeholder="Mật Khẩu">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" name="password_2" placeholder="Nhập lại mật khẩu">
                  </div>
                </div>
                <input type="submit" value="Tạo" name="submit" style="width:100%; font-size:140% ;color:white; background-color:lime; border:0; border-radius:30px; font-family:inherit">

              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>
</html>
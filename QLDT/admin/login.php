<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="icon" href="https://cdn0.iconfinder.com/data/icons/luchesa-vol-6/128/Ecommerce-512.png">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/login.css">
</head>
<?php 
        
       include_once('Connect.php');
        if (isset($_POST['submit'])) {
        
            $email = $_POST['email'];
            $password = $_POST['password'];
            if(empty($email) || empty($password)){
                 $error = "Vui lòng nhập tài khoản và mật khẩu";
            }
            else {
                $sql = "select * from users where email = '$email'and password ='$password'";
                $result = mysqli_query($connect, $sql);
                $row = mysqli_fetch_assoc($result);
                if (mysqli_num_rows($result) == 1) {

                    if($username == 'admin'){
                        session_start();
                    $_SESSION['userid'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    header("Location: admin-index.php");
                    exit();
                    }
                    else{
                        session_start();
                        $_SESSION['userid'] = $row['id'];
                        $_SESSION['username'] = $row['username'];
                        header("Location: index.php");
                        exit();
                    }
                }
            }
            } else {
                $error = "Sai tên tài khoản hoặc mật khẩu";
            }
            
       

?>
<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row"  style="box-shadow: 5px 10px 8px 10px #888888;">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h1 text-gray-900 mb-4">Đăng Nhập</h1>
                  </div>
                  <form class="user" method="POST" action="">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" aria-describedby="emailHelp" placeholder="Nhập email ...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Mật Khẩu">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Nhớ Mật Khẩu</label>
                      </div>
                    </div>
                    <input type="submit" value="Đăng Nhập" name="submit" style="width:100%; font-size:170% ;color:white; background-color:royalblue; border:0; border-radius:30px;font-family: initial;">
                    <hr>
                    <a href="#" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Đăng Nhập với Google
                    </a>
                    <a href="#" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Đăng Nhập với Facebook
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Quên Mật Khẩu</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Tạo mới tài khoản</a>
                  </div>
                </div>
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

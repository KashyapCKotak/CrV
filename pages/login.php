<?php
include "dbconnect.php";
session_start();
if(isset($_POST['signin'])){
  $username = $_POST["username"];
  $password = $_POST["password"];
  $username = stripslashes($username);
  $password = stripslashes($password);
  $username = $mysqli->real_escape_string($username);
  $password = $mysqli->real_escape_string($password);

  if($username!="" && $password!=""){
    $sql = "SELECT `username`, `portfolio`  FROM `portfolio` WHERE `username` LIKE '$username' AND `password` LIKE '$password'";
    $result = $mysqli->query( $sql);
    $num_rows = $result->num_rows;
    $row = $result->fetch_assoc();
    if($num_rows==1){
      $_SESSION['cryptoview_user'] = $username;
      header("Location: ../dashboard.php");
    }else{
      echo "<script> alert('Username or password is incorrect'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CryptoView | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css"> -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="height: 100vh">
  <div class="loginBackground" style="width:100%;height:100%"></div>
  <!-- <img src="../dist/img/small_login_back.jpg"> -->
  <div class="login-box">
    <div class="login-logo">
      <a href="../index2.html"><b>CryptoView</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg" style="font-size: 35px">Log in</p>

      <form action="" method="post">
        <div class="form-group has-feedback">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row" style="width: 100%;margin: 0">
          <div class="col-xs-8" style="padding: 0">
            <div class="checkbox icheck" style="margin-top:0 !important;margin-bottom:15px !important;text-align: left;text-align:  -webkit-left;">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>
        </div>
        <div class="row" style="text-align: center">
          <div class="col-xs-4" style="float:left">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
          <div class="col-xs-4" style="float:right">
            <button type="submit" name="signin" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
      </div>
      <!-- /.social-auth-links -->

      <a href="#">I forgot my password</a><br>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->


  <!-- jQuery 3 -->
  <script src="../bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <!-- <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
  <!-- iCheck -->
  <script src="../plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
    });
  </script>
</body>
</html>



<?php
include "dbconnect.php";
session_start();
// if(isset($_POST['signin'])){
//   $username = $_POST["username"];
//   $password = $_POST["password"];
//   $username = stripslashes($username);
//   $password = stripslashes($password);
//   $username = $mysqli->real_escape_string($username);
//   $password = $mysqli->real_escape_string($password);

//   if($username!="" && $password!=""){
//     $sql = "SELECT `userid`, `username`, `prsn_portfolio`, `prtc_portfolio`  FROM `portfolio` WHERE `username` LIKE '$username' AND `password` LIKE '$password'";
//     var_dump($sql);
//     $result = $mysqli->query( $sql);
//     var_dump($result);
//     $num_rows = $result->num_rows;
//     $row = $result->fetch_assoc();
//     if($num_rows==1){
//       $_SESSION['cryptoview_user'] = $username;
//       $_SESSION['prsn_portfolio'] = $row["prsn_portfolio"];
//       $_SESSION['prtc_portfolio'] = $row["prtc_portfolio"];
//       $_SESSION['userid'] = $row["userid"];
//       header("Location: ../dashboard.php");
//     }else{
//       echo "<script> alert('Username or password is incorrect'); </script>";
//     }
//   }
// }
if(isset($_POST['userSub'])){
  $userSub=$_POST["userSub"];
  $userName=$_POST["userName"];
  $userImg=$_POST["userImage"];
  if($userSub!=""){
    $sql = "SELECT `userid`, `prsn_portfolio`, `prtc_portfolio`  FROM `portfolio` WHERE `userid` LIKE '$userSub'";
    // var_dump($sql);
    $result = $mysqli->query( $sql);
    // var_dump($result);
    $num_rows = $result->num_rows;
    $row = $result->fetch_assoc();
    if($num_rows==1){
      $_SESSION['cryptoview_user'] = $userName;
      $_SESSION['prsn_portfolio'] = $row["prsn_portfolio"];
      $_SESSION['prtc_portfolio'] = $row["prtc_portfolio"];
      $_SESSION['userid'] = $userSub;
      $_SESSION['cryptoview_userImg'] = $userImg;
      header("Location: ../dashboard.php");
    }else{
      echo "<script> alert('Username or password is incorrect'); </script>";
      // header("Location: login.php");
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
  <script src="https://apis.google.com/js/api:client.js"></script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="google-signin-client_id" content="136324385380-hr0pv6mj0vdjn853sri3qdskouoggulk.apps.googleusercontent.com">
  <title>CryptoView | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
  <!-- Google Login -->
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script>
      var googleUser = {};
      var startApp = function() {
        gapi.load('auth2', function(){
          // Retrieve the singleton for the GoogleAuth library and set up the client.
          auth2 = gapi.auth2.init({
            client_id: '136324385380-2mfaqdpgj2e2a97rtis3jccrrbutcf8s.apps.googleusercontent.com',
            cookiepolicy: 'single_host_origin',
            // Request scopes in addition to 'profile' and 'email'
            //scope: 'additional_scope'
          });
          attachSignin(document.getElementById('GPlusSignInButton'));
        });
      };

      function attachSignin(element) {
        console.log(element.id);
        auth2.attachClickHandler(element, {},
            function(googleUser) {
              // document.getElementById('name').innerText = "Signed in: " +googleUser.getBasicProfile().getName();
                  var id_token = googleUser.getAuthResponse().id_token;
                  console.log(googleUser);
                  var xhr = new XMLHttpRequest();
                  xhr.open('GET', 'https://www.googleapis.com/oauth2/v3/tokeninfo?id_token='+id_token);
                  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                  xhr.onload = function() {
                    var googleUser=JSON.parse(xhr.responseText);
                    console.log('Signed in as: ');
                    console.log(googleUser);
                    if(googleUser.aud=='136324385380-2mfaqdpgj2e2a97rtis3jccrrbutcf8s.apps.googleusercontent.com'){
                      console.log("Google Login Successfull");
                      var form = document.createElement("form");
                      form.setAttribute("method", "post");
                      form.setAttribute("action", "");
                      var tokenField = document.createElement("input");
                      tokenField.setAttribute("type", "hidden");
                      tokenField.setAttribute("name", "userSub");
                      tokenField.setAttribute("value", googleUser.sub);
                      form.appendChild(tokenField);
                      tokenField = document.createElement("input");
                      tokenField.setAttribute("type", "hidden");
                      tokenField.setAttribute("name", "userName");
                      tokenField.setAttribute("value", googleUser.given_name+" "+googleUser.family_name);
                      form.appendChild(tokenField);
                      tokenField = document.createElement("input");
                      tokenField.setAttribute("type", "hidden");
                      tokenField.setAttribute("name", "userImage");
                      tokenField.setAttribute("value", googleUser.picture);
                      form.appendChild(tokenField);
                      document.body.appendChild(form);
                      form.submit();
                    }
                  };
                  xhr.send('idtoken=' + id_token);
            }, function(error) {
              alert(JSON.stringify(error, undefined, 2));
            });
      }
    </script>
</head>
<body class="hold-transition login-page" style="height: 100vh">
<script>

  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    if (response.status === 'connected') {
      testAPI();
    } else {
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }
  
  function checkLoginState() {
      FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
      });
    }

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '287390465399302',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     console.log("FB Initiated");
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

   function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }

  function fbLogin(){
      FB.login(function(response) {
      console.log('statusChangeCallback');
      console.log(response);
      if (response.status === 'connected') {
        testAPI();
      } else {
        document.getElementById('status').innerHTML = 'Please log ' +
          'into this app.';
      }
    });
  }
</script>

  <div class="loginBackground" style="width:100%;height:100%"></div>
  <!-- <img src="../dist/img/small_login_back.jpg"> -->
  <div class="login-box">
    <div class="login-logo">
      <a href="../index2.html"><b>CryptoView</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg" style="font-size: 35px">Log in/Sign up</p>

      <form action="" method="post" style="display:none">
        <div class="form-group has-feedback">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row" style="width: 100%;margin: 0; display:none">
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
            <button class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
          <div class="col-xs-4" style="float:right">
            <button type="submit" name="signin" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p style="display:none">- OR -</p>
        <a href="#" onclick="FB.login()" class="btn btn-block btn-social btn-facebook btn-flat customSignInButtons"><i class="fa fa-facebook"></i> Log in/Sign up using
        Facebook</a>
        <div id="GPlusSignInButton" class="btn btn-block btn-social btn-google btn-flat customSignInButtons"><i class="fa fa-google-plus"></i> Log in/Sign up using
        Google</div>
      </div>
      <script>startApp();</script>
      <!-- /.social-auth-links -->

      <a href="#" style="display:none">I forgot my password</a><br>

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



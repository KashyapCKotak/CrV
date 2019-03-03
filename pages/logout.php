<?php
session_start();
session_destroy();
unset($_SESSION['cryptoview_user']);
unset($_SESSION['userid']);
// header("Location: ../dashboard.php");
?>
<html>
<body>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="google-signin-client_id" content="136324385380-hr0pv6mj0vdjn853sri3qdskouoggulk.apps.googleusercontent.com">
<!-- <script src="https://apis.google.com/js/api:client.js"></script> -->
<script type="text/javascript">
// var startApp = function() {
//   gapi.load('auth2', function(){
//     // Retrieve the singleton for the GoogleAuth library and set up the client.
//     auth2 = gapi.auth2.init({
//       client_id: '136324385380-2mfaqdpgj2e2a97rtis3jccrrbutcf8s.apps.googleusercontent.com',
//       cookiepolicy: 'single_host_origin',
//       // Request scopes in addition to 'profile' and 'email'
//       //scope: 'additional_scope'
//     });
//     attachSignin(document.getElementById('GPlusSignInButton'));
//   });
// };
// function signOut() {
//     auth2= gapi.auth2.getAuthInstance();
//     auth2.signOut().then(function () {
//       console.log('User signed out.');
//       window.location="/dashboard.php";
//     });
// }
  try{
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

    FB.logout(function(response) {
      // user is now logged out
    });

    function signOut() {
      var auth2 = gapi.auth2.getAuthInstance();
      auth2.signOut().then(function () {
        console.log('User signed out.');
      });
    }

    function onLoad() {
      gapi.load('auth2', function() {
        gapi.auth2.init();
      });
    }
  } catch(err) {
    window.location="../dashboard";
  }
// startApp();
window.location="/adminlte-2.4.2/dashboard";
onLoad();
signOut();
</script>
<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
</body>
</html>
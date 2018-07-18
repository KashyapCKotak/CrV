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
// startApp();
window.location="/adminlte-2.4.2/dashboard.php";
onLoad();
signOut();
</script>
<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
</body>
</html>
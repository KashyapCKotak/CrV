<?php
session_start();
session_destroy();
unset($_SESSION['cryptoview_user']);
unset($_SESSION['userid']);
// header("Location: ../dashboard.php");
?>

<script src="https://apis.google.com/js/api:client.js"></script>
<script type="text/javascript">
var auth2=null;
var gapi=null;
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
function signOut() {
    auth2= gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
}
startApp();
signOut();
</script>
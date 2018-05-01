<?php
session_start();
session_destroy();
unset($_SESSION['cryptoview_user']);
header("Location: ../dashboard.php");
?>

<script src="https://apis.google.com/js/api:client.js"></script>
<script type="text/javascript">
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
  signOut();
  </script>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<script type="text/javascript">
  function myFunction() {
    // console.log(document.getElementById("cryptsyb"));
    // console.log(($('#marketsDataTable').is(':visible')));
    // console.log(($('#cryptsyb').is(':visible')));
    console.log("PAGE LOAD COMPLETE");
    // startStream(currSubList);
  }
</script>
<body class="hold-transition skin-blue sidebar-mini fixed sidebar-collapse" onload="myFunction()">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <!-- <a href="index2.html" class="logo"> -->
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <!-- <span class="logo-mini"><b>A</b>LT</span> -->
    <!-- logo for regular state and mobile devices -->
    <!-- <span class="logo-lg"><b>Admin</b>LTE</span> -->
    <!-- </a> -->
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img alt="user image" src=
                <?php
                  if (!isset($_SESSION['userid']) || $_SESSION['userid'] == ''){
                    echo '"dist/img/notSigned.jpg"';
                  }
                  else {
                    echo '"'.$_SESSION['cryptoview_userImg'].'"';
                  }
                  ?>
                class="user-image" alt="User Image">
              <span class="hidden-xs">
              <?php 
                if (!isset($_SESSION['userid']) || $_SESSION['userid'] == ''){
                  echo 'Sign In';
                }
                else {
                  echo $_SESSION['cryptoview_user'];
                }
                ?>
              </span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img alt="user image" src=
                    <?php
                      if (!isset($_SESSION['userid']) || $_SESSION['userid'] == ''){
                        echo '"dist/img/notSigned.jpg"';
                      }
                      else {
                        echo '"'.$_SESSION['cryptoview_userImg'].'"';
                      }
                      ?>
                    class="img-circle" alt="User Image">
                  <p style="font-size: 25px">
                    <strong>
                    <?php
                      if (!isset($_SESSION['userid']) || $_SESSION['userid'] == ''){
                        echo 'Anonymous User';
                      }
                      else {
                        echo $_SESSION['cryptoview_user'];
                      }
                      ?>
                    </strong>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <?php
                    if (!isset($_SESSION['userid']) || $_SESSION['userid'] == ''){
                      echo '<div class="pull-left">
                    <a href="pages/login.php" name="signin" class="btn btn-primary btn-block btn-flat" style="width:100%;background-color:#3c8dbc;border-color:#367fa9;color:#fff">Sign In</a>
                    </div>';
                    }
                    else {
                      echo '<div class="pull-left">
                    <a href="#" name="profile" class="btn btn-default btn-block btn-flat" style="width:84px;background-color:#3c8dbc;border-color:#367fa9;color:#fff">My Profile</a>
                    </div>
                    <div class="pull-right">
                    <a href="pages/logout.php" name="signout" class="btn btn-default btn-block btn-flat" style="width:84px;background-color:#d67070;border-color:#a93636;color:#fff">Sign out</a>
                    </div>';
                    }
                    ?>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            
          </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
          <!-- <li class="header">
            <center>MENU</center>
          </li> -->
          <li class="active">
            <a href="dashboard.php">
              <i class="fas fa-tachometer-alt"></i>
              <span>&nbsp;Dashboard</span>
            </a>
          </li>
          <li>
            <a href="portfolio.php">
              <i class="fas fa-donate"></i>
              <span>&nbsp;Manage Portfolio</span>
            </a>
          </li>
          <li>
            <a href="exchange.php">
              <i class="fas fa-chart-line"></i>
              <span>&nbsp;Exchange</span>
            </a>
          </li>
          <li>
            <a href="ico.php">
              <i class="far fa-calendar-alt"></i>
              <span>&nbsp;ICO Calender</span>
            </a>
          </li>
          <li>
            <a href="news.php">
              <i class="fas fa-newspaper"></i>
              <span>&nbsp;News around the World</span>
            </a>
          </li>
          <li>
            <a href="analytical-articles.php">
              <i class="fas fa-chart-pie"></i>
              <span>&nbsp;Analytical Articles</span>
            </a>
          </li>
          <li>
            <a href="advertise.php">
              <i class="fab fa-buysellads"></i>
              <span>&nbsp;Advertise</span>
            </a>
          </li>
          <li>
            <a id="loginMenuItemLink" href="pages/login.php">
              <i id="loginMenuItemIcon" class="fas fa-share"></i>
              <span id="loginMenuItemText">&nbsp;Login/Sign up</span>
            </a>
          </li>
          <li>
            <a href="about.php">
              <i class="far fa-smile"></i>
              <span>&nbsp;About & Contact</span>
            </a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
      <script>
        if((document.getElementsByClassName("user-image")[0].currentSrc).includes("notSigned")){
          //do Nothing
        }
        else{
          document.getElementById("loginMenuItemLink").setAttribute("href","profile.php");
          document.getElementById("loginMenuItemText").innerHTML="&nbsp;My Profile";
          document.getElementById("loginMenuItemIcon").className="fas fa-user";
        }
      </script>
    </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <script type="text/javascript">
        var globalCryptoValue = "BTC";
        var globalFiatValue = "USD";
      </script>
      <!-- <script src="livedatatop.js"></script> -->
    <section class="content-header">
      <h1 style="text-align:center">
        About Us<br>
          <small style="width: 100%;background: #ffa635;border-radius: 50px;width: 80%;margin: 0 auto;margin-bottom:15px;color: black;height: 26px;padding: 5px;font-weight:400">Know how we deliver value to you...!</small>
      </h1>
      <!-- <ol class="breadcrumb" style="text-align:center;background: #ffa635;border-radius: 50px;width: 80%;margin: 0 auto">
        let us make the masses notice you...
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <!-- <div class="box-header with-border" style="display:none">
          <h3 class="box-title">Sample Ad Spaces</h3>
        </div> -->
        <div class="box-header with-border">
            <div class="box-title" style="text-align:center;width:100%">
                <span style="font-size:18px;color: #3c8dbc"><strong><_Name_> brings you all the content you need to know about the Crypto World.</strong></span><br><span style="font-size:15px"><strong>Whether it is Trading, Predicting, Researching Market, Managing Portfolio and much more!</strong></span>
            </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-6" style="margin-left:-10px">
                <span class="AdpageText">View useful insights about what your next actions should be using the <b>Artificial Intelligence</b> advise on the <a href="dashboard.php">Dashboard</a>!</span>
            </div>
            <div class="col-md-6" style="background-image:url('dist/img/about-dashboard-ai.jpg');background-size:100% 100%;height: 350px;margin-right:  5px;background-clip:  content-box;">
              <!-- <img style="display:inline !important;height:37vh" src="dist/img/mainChartRight2.jpg"/> -->
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-6 customadright" style="margin-left:-10px">
              <span class="AdpageText">Manage your portfolio in the <b>most sophisticated way</b> on the <a href="portfolio.php">Portfolio Tracker</a>!</span>
            </div>
            <div class="col-md-6 customadleft" style="background-image:url('dist/img/icoBig.JPG');background-size:100% 100%;height: 300px;margin-right:  5px;background-clip:  content-box;">
              <!-- <img style="display:inline !important;height:37vh" src="dist/img/mainChartRight2.jpg"/> -->
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-6 " style="margin-left:-10px">
              <span class="AdpageText">Get all the important crypto news <b>consolidated from all around the world</b> at the <a href="news.php">News Page</a>. Our AI shows you calculated <b>Sentiment Analysis</b> of the news so that you can get quick insights from an ocean of news!</span>
            </div>
            <div class="col-md-6 " style="/*background-image:url('dist/img/aboveMarketsMobile.JPG');*/background-size:100% 100%;height: 300px;margin-right:  5px;background-clip:  content-box;">
              <img alt="ad loction screenshot" class="customadimage" style="display:block;height:100%;margin:auto" src="dist/img/aboveMarketsMobile.JPG"/>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-6 customadright" style="margin-left:-10px">
              <span class="AdpageText">Know about all the past, new & upcoming <b>Initial Coin Offerings</b> at the <a href="ico.php">ICO Tracker</a>!</span>
            </div>
            <div class="col-md-6 customadleft" style="/*background-image:url('dist/img/aboveMarketsMobile.JPG');*/background-size:100% 100%;height: 300px;margin-right:  5px;background-clip:  content-box;">
              <img alt="ad loction screenshot" class="customadimage" style="display:block;height:100%;margin:auto" src="dist/img/newsMobile.JPG"/>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-6 " style="margin-left:-10px">
              <span class="AdpageText"><b>Exchange</b> Cryptocurrencies/Fiat Currencies in as convenient as possible way on the <a href="exchange.php">Exchange Page</a>!</span>
            </div>
            <div class="col-md-6 " style="/*background-image:url('dist/img/aboveMarketsMobile.JPG');*/background-size:100% 100%;height: 300px;margin-right:  5px;background-clip:  content-box;">
              <img alt="ad loction screenshot" class="customadimage" style="display:block;height:100%;margin:auto" src="dist/img/aboveMarketsMobile.JPG"/>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-6 customadright" style="margin-left:-10px">
              <span class="AdpageText">Access the analysis of Cryptos and Market at the <a href="analytical-articles.php">Analytical Articles Page</a>!</span>
            </div>
            <div class="col-md-6 customadleft" style="/*background-image:url('dist/img/aboveMarketsMobile.JPG');*/background-size:100% 100%;height: 300px;margin-right:  5px;background-clip:  content-box;">
              <img alt="ad loction screenshot" class="customadimage" style="display:block;height:100%;margin:auto" src="dist/img/newsMobile.JPG"/>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12" style="text-align:center">
              <span style="font-size: 16px;font-weight: 1000;color: #205a77;">
              All this on One Single Platform - <_NAME_> !!!
              </span>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>

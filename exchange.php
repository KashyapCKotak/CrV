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
    document.getElementById("excahngeWidgetHolder").innerHTML='<iframe src="https://changelly.com/widget/v1?auth=email&from=BTC&to=ETH&merchant_id=8d450131fbb6&address=&amount=1&ref_id=8d450131fbb6&color=00cf70" width="600" height="500" class="changelly" scrolling="no" style="overflow-y: hidden; border: none" > Cannot load widget </iframe>';
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
        <!-- Sidebar user panel -->
        <!-- <div class="user-panel">
                <div class="pull-left image">
                  <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                  <p>Login</p>
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
              </div> -->
        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
                </div>
              </form> -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <!-- <li class="header">
            <center>MENU</center>
          </li> -->
          <li class="active treeview">
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
            <a href="login.php">
              <i class="fas fa-share"></i>
              <span>&nbsp;Login/Sign up</span>
            </a>
          </li>
          <li>
            <a href="help.php">
              <i class="far fa-smile"></i>
              <span>&nbsp;About & Contact</span>
            </a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="overflow-x:scroll">
    <!-- Content Header (Page header) -->
    <div class="row">
        <div class="top-price-bar">
          <div class="top-price-bar-cryptos" style="text-align:center">
            <span class="top-label" style="font-weight:600"> Impact on your business:<br><small style="font-weight:100">(representational numbers)</small></span>
          </div>
          <div class="top-price-bar-cryptos">
            <img alt="price direction image" class="top-image" src="dist/img/up.png" alt=⌛ />
            <span class="top-label"> Views</span>
            <br />
            <span class="top-price">5M&nbsp;
              <span class="top-pct" style="color: #00C605">100%</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img alt="price direction image" class="top-image" src="dist/img/up.png" />
            <span class="top-label"> User Base</span>
            <br />
            <span class="top-price">4.1M&nbsp;
              <span class="top-pct" style="color: #00C605">80%</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img alt="price direction image" class="top-image" src="dist/img/up.png" />
            <span class="top-label"> User Reach</span>
            <br />
            <span class="top-price">2.9M&nbsp;
              <span class="top-pct" style="color: #00C605">77%</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img alt="price direction image" class="top-image" src="dist/img/up.png" />
            <span class="top-label"> Populatrity</span>
            <br />
            <span class="top-price">9.1/10&nbsp;
              <span class="top-pct" style="color: #00C605">63%</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img alt="price direction image" class="top-image" src="dist/img/up.png" />
            <span class="top-label"> Unique Visitors</span>
            <br />
            <span class="top-price">3.7M&nbsp;
              <span class="top-pct" style="color: #00C605">51%</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img alt="price direction image" class="top-image" src="dist/img/up.png" />
            <span class="top-label"> Revenue</span>
            <br />
            <span class="top-price">$30M&nbsp;
              <span class="top-pct" style="color: #00C605">59%</span>
            </span>
          </div>
        </div>
      </div>
      <!-- Content Header (Page header) -->
      <script type="text/javascript">
        var globalCryptoValue = "BTC";
        var globalFiatValue = "USD";
      </script>
      <!-- <script src="livedatatop.js"></script> -->
    <!-- <section class="content-header">
      <h1 style="text-align:center">
          Exchange<br>
          <small style="width: 100%;background: #ffa635;border-radius: 50px;width: 80%;margin: 0 auto;color: black;height: 26px;padding: 5px;font-weight:400">BuySell CryptoCurrencies instantly...</small>
      </h1>
    </section> -->
    <section class="content-header">
        <h1 style="text-align:center">
        Exchange
        <br><small>BuySell CryptoCurrencies instantly...</small>
        </h1>
    </section>

    <!-- Main content -->
    <div style="overflow-x:auto">
    <section class="content" style="width:650px;margin:auto">

      <!-- Default box -->
      <div class="box">
        <!-- <div class="box-header with-border" style="display:none">
          <h3 class="box-title">Sample Ad Spaces</h3>
        </div> -->
        <div class="box-body">
            <div id="excahngeWidgetHolder">
                
            </div>
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    </div>
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
  <!-- /.control-sidebar -->
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

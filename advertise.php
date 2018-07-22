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
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
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
            <a href="pages/login.php">
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
  <div class="content-wrapper">
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
    <section class="content-header">
      <h1 style="text-align:center">
          Advertise With Us<br>
          <small style="width: 100%;background: #ffa635;border-radius: 50px;width: 80%;margin: 0 auto;color: black;height: 26px;padding: 5px;font-weight:400">let us take you to the masses...</small>
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
        <div class="box-body">
          <div class="row">
            <div class="col-md-6" style="margin-left:-10px">
              <span class="AdpageText">Let the users view your business near the most famous information source... A full fledged Chart!<span>
            </div>
            <div class="col-md-6" style="background-image:url('dist/img/mainChartRight2.jpg');background-size:100% 100%;height: 300px;margin-right:  5px;background-clip:  content-box;">
              <!-- <img style="display:inline !important;height:37vh" src="dist/img/mainChartRight2.jpg"/> -->
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-6 customadright" style="margin-left:-10px">
              <span class="AdpageText">Get your ICO Listed on the most comprehensive ICO list in the world!!<span>
            </div>
            <div class="col-md-6 customadleft" style="background-image:url('dist/img/icoBig.JPG');background-size:100% 100%;height: 300px;margin-right:  5px;background-clip:  content-box;">
              <!-- <img style="display:inline !important;height:37vh" src="dist/img/mainChartRight2.jpg"/> -->
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-6 " style="margin-left:-10px">
              <span class="AdpageText">Show your business to our users when they go through important content...<span>
            </div>
            <div class="col-md-6 " style="/*background-image:url('dist/img/aboveMarketsMobile.JPG');*/background-size:100% 100%;height: 300px;margin-right:  5px;background-clip:  content-box;">
              <img alt="ad loction screenshot" class="customadimage" style="display:block;height:100%;margin:auto" src="dist/img/aboveMarketsMobile.JPG"/>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-6 customadright" style="margin-left:-10px">
              <span class="AdpageText">Flaunt about the change you bring when users look for what's happening in the world in the News Page with sentiment analysis!<span>
            </div>
            <div class="col-md-6 customadleft" style="/*background-image:url('dist/img/aboveMarketsMobile.JPG');*/background-size:100% 100%;height: 300px;margin-right:  5px;background-clip:  content-box;">
              <img alt="ad loction screenshot" class="customadimage" style="display:block;height:100%;margin:auto" src="dist/img/newsMobile.JPG"/>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12" style="text-align:center">
              <span style="font-size: 16px;font-weight: 1000;color: #205a77;">
                For all above spaces and more on many other pages, know more by reaching out to <a href="mailto:kckotak99@gmail.com?Subject=Advertise%20Query" target="_top">Kashyap Kotak</a> by mail.<br><br>We'll soon get back to you.
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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
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

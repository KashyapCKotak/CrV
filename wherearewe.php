<!DOCTYPE html>
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
<body class="hold-transition skin-blue sidebar-mini fixed sidebar-collapse" onload="onLoadPage()">
  <div class="wrapper">
  <div id="techIndiScripts"></div>
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
        <!-- <div class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </div> -->
        <script>
          function menuToggle(x) {
            x.classList.toggle("change");
          }
        </script>
        <div class="custom-sidebar-toggle" data-toggle="push-menu" role="button" onclick="menuToggle(this)">
          <div class="bar1" style="margin-top:15px"></div>
          <div class="bar2"></div>
          <div class="bar3"></div>
        </div>

        <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src=
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
                    <img src=
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
            <i class="fas fa-line-chart"></i>
            <span>&nbsp;Portfolio</span>
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
            <span>&nbsp;Latest News</span>
          </a>
        </li>
        <li>
          <a href="analytical-articles.php">
            <i class="fas fa-chart-pie"></i>
            <span>&nbsp;Analytical Articles</span>
          </a>
        </li>
        <li>
          <a href="help.php">
            <i class="far fa-question-circle"></i>
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
    <!-- <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section> -->

    <!-- Main content -->
    <section class="content" style="padding:0">

      <!-- Default box -->
      <!-- <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          Start creating your amazing application!
        </div>
        /.box-body -->
        <!--<div class="box-footer">
          Footer
        </div>
         /.box-footer-->
      <!-- </div> -->
      <!-- /.box -->
      <div background-img="dist/img/404.jpg" style="height:100vh;width:100vw"></div>

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

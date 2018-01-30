<!DOCTYPE html>
<html>
<head>
  <?php
  session_start();
  ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    
    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition skin-blue sidebar-mini fixed sidebar-collapse">
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
                    <img src=
                    <?php
                    if (!isset($_SESSION['cryptoview_user']) || $_SESSION['cryptoview_user'] == ''){
                      echo '"dist/img/notSigned.jpg"';
                    }
                    else {
                      echo '"dist/img/signedIn.jpg"';
                    }
                    ?>
                    class="user-image" alt="User Image">
                    <span class="hidden-xs">
                      <?php 
                      if (!isset($_SESSION['cryptoview_user']) || $_SESSION['cryptoview_user'] == ''){
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
                      if (!isset($_SESSION['cryptoview_user']) || $_SESSION['cryptoview_user'] == ''){
                        echo '"dist/img/notSigned.jpg"';
                      }
                      else {
                        echo '"dist/img/signedIn.jpg"';
                      }
                      ?>
                      class="img-circle" alt="User Image">

                      <p style="font-size: 25px">
                        <strong>
                          <?php
                          if (!isset($_SESSION['cryptoview_user']) || $_SESSION['cryptoview_user'] == ''){
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
                      if (!isset($_SESSION['cryptoview_user']) || $_SESSION['cryptoview_user'] == ''){
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
        <!-- Left side column. contains the logo and sidebar -->
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
                <li class="header"><center>MENU</center></li>
                <li class="active treeview">
                  <a href='dashboard.php'>
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <!-- <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span> -->
                  </a>
                  <!-- <ul class="treeview-menu">
                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                    <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                  </ul> -->
                </li>
                <li class="treeview">
                  <a href="portfolio.php">
                    <i class="fa fa-line-chart"></i> <span>Portfolio</span>
                  </a>
                </li>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Layout Options</span>
                    <span class="pull-right-container">
                      <span class="label label-primary pull-right">4</span>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                    <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                    <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                    <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                  </ul>
                </li>
                <li>
                  <a href="pages/widgets.html">
                    <i class="fa fa-th"></i> <span>Widgets</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green">new</small>
                    </span>
                  </a>
                </li>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Charts</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                    <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                    <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>UI Elements</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                    <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                    <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                    <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                    <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                    <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-edit"></i> <span>Forms</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                    <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                    <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-table"></i> <span>Tables</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                    <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
                  </ul>
                </li>
                <li>
                  <a href="pages/calendar.html">
                    <i class="fa fa-calendar"></i> <span>Calendar</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-red">3</small>
                      <small class="label pull-right bg-blue">17</small>
                    </span>
                  </a>
                </li>
                <li>
                  <a href="pages/mailbox/mailbox.html">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-yellow">12</small>
                      <small class="label pull-right bg-green">16</small>
                      <small class="label pull-right bg-red">5</small>
                    </span>
                  </a>
                </li>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-folder"></i> <span>Examples</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                    <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                    <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                    <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                    <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                    <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                    <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                    <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                    <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-share"></i> <span>Multilevel</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    <li class="treeview">
                      <a href="#"><i class="fa fa-circle-o"></i> Level One
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                        <li class="treeview">
                          <a href="#"><i class="fa fa-circle-o"></i> Level Two
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                  </ul>
                </li>
                <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
                <li class="header">LABELS</li>
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
              </ul>
            </section>
            <!-- /.sidebar -->
          </aside>
          
          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <div class="row">
              <div class="top-price-bar">
                <div class="top-price-bar-cryptos">
                  <img class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> Bitcoin</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> Ethereum</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> Ripple</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> B Cash</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> Litecoin</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> TRON</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> Dash</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> B Gold</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> ZCash</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> Monero</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> ETH Classic</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> IOTA</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> NXT</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> EOS</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> NEO</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
              </div>
            </div>
            <script src="livedatatop.js"></script>
            <!-- Content Header (Page header) -->
            <script>
              var globalCryptoValue="BTC";
              var globalFiatValue="INR";
            </script>            
            <!-- Main content -->
            <section class="content" style="padding-left:5px;padding-right:5px">


              <div class="row box" style="width:100%;margin-left:0px;margin-right:0px;height:auto">
                <!-- <div class="col-md-6"> -->
                  <!-- Custom Tabs -->
                  <div class="nav-tabs-custom" style="margin:0">
                    <ul class="nav nav-tabs">
                      <li class="active portfolioTab"><a href="#tab_1" data-toggle="tab">Personal Portfolio</a></li>
                      <li class="portfolioTab"><a href="#tab_2" data-toggle="tab">Practice Portfolio</a></li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab_1">
                        <div class="row col-md-6" style="margin: 0; padding: 0">
                          <div class="box-body no-padding" style="overflow-x: auto">
                            <table class="table table-condensed table-striped">
                              <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Investment</th>
                                <th>Value</th>
                                <th style="width: 80px">%</th>
                              </tr>
                              <tr>
                                <td>1.</td>
                                <td>Ethereum Classic</td>
                                <td>9999999.6523</td>
                                <td>58569689.56</td>
                                <td>98569689.56</td>
                                <td><span class="badge bg-green">55%</span></td>
                              </tr>
                              <tr>
                                <td>1.</td>
                                <td>Ethereum Classic</td>
                                <td>9999999.6523</td>
                                <td>98569689.56</td>
                                <td>58569689.56</td>
                                <td><span class="badge bg-red">55%</span></td>
                              </tr>
                              <tr>
                                <td>1.</td>
                                <td>Ethereum Classic</td>
                                <td>9999999.6523</td>
                                <td>58569689.56</td>
                                <td>98569689.56</td>
                                <td><span class="badge bg-green">55%</span></td>
                              </tr>
                              <tr>
                                <td>1.</td>
                                <td>Ethereum Classic</td>
                                <td>9999999.6523</td>
                                <td>58569689.56</td>
                                <td>98569689.56</td>
                                <td><span class="badge bg-green">500%</span></td>
                              </tr>
                              <tr>
                                <td>1.</td>
                                <td>Ethereum Classic</td>
                                <td>9999999.6523</td>
                                <td>98569689.56</td>
                                <td>58569689.56</td>
                                <td><span class="badge bg-red">55%</span></td>
                              </tr>
                              <tr>
                                <td>1.</td>
                                <td>Ethereum Classic</td>
                                <td>9999999.6523</td>
                                <td>58569689.56</td>
                                <td>98569689.56</td>
                                <td><span class="badge bg-green">1015654.56%</span></td>
                              </tr>
                              <tr>
                                <td>1.</td>
                                <td>Ethereum Classic</td>
                                <td>9999999.6523</td>
                                <td>58569689.56</td>
                                <td>98569689.56</td>
                                <td><span class="badge bg-green">55%</span></td>
                              </tr>
                              <tr>
                                <td>1.</td>
                                <td>Ethereum Classic</td>
                                <td>9999999.6523</td>
                                <td>58569689.56</td>
                                <td>98569689.56</td>
                                <td><span class="badge bg-green">55%</span></td>
                              </tr>
                              <tr>
                                <td>1.</td>
                                <td>Ethereum Classic</td>
                                <td>9999999.6523</td>
                                <td>58569689.56</td>
                                <td>98569689.56</td>
                                <td><span class="badge bg-green">55%</span></td>
                              </tr>
                              <tr>
                                <td>1.</td>
                                <td>Ethereum Classic</td>
                                <td>9999999.6523</td>
                                <td>58569689.56</td>
                                <td>98569689.56</td>
                                <td><span class="badge bg-green">55%</span></td>
                              </tr>
                            </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                      <div class="col-md-6" >
                      <b>How to use:</b>

                      <p>Exactly like the original bootstrap tabs except you should use
                        the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>
                        A wonderful serenity has taken possession of my entire soul,
                        like these sweet mornings of spring which I enjoy with my whole heart.
                        I am alone, and feel the charm of existence in this spot,
                        which was created for the bliss of souls like mine. I am so happy,
                        my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
                        that I neglect my talents. I should be incapable of drawing a single stroke
                        at the present moment; and yet I feel that I never was a greater artist than now.
                      </div>
                      </div>
                      <!-- /.tab-pane -->
                      <div class="tab-pane" id="tab_2">
                        The European languages are members of the same family. Their separate existence is a myth.
                        For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                        in their grammar, their pronunciation and their most common words. Everyone realizes why a
                        new common language would be desirable: one could refuse to pay expensive translators. To
                        achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                        words. If several languages coalesce, the grammar of the resulting language is more simple
                        and regular than that of the individual languages.
                      </div>
                      <!-- /.tab-pane -->
                      <div class="tab-pane" id="tab_3">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        It has survived not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                        sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                        like Aldus PageMaker including versions of Lorem Ipsum.
                      </div>
                      <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                    <!-- </div> -->
                    <!-- nav-tabs-custom -->
                  </div>
                  <!-- /.col -->
                </div>

                <!-- Small boxes (Stat box) -->
                <div class="row">
                  <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                      <div class="inner">
                        <h3>150</h3>

                        <p>New Orders</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                      <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                        <p>Bounce Rate</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                      <div class="inner">
                        <h3>44</h3>

                        <p>User Registrations</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                      <div class="inner">
                        <h3>65</h3>

                        <p>Unique Visitors</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                  <!-- Left col -->
                  <section class="col-lg-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="nav-tabs-custom">
                      <!-- Tabs within a box -->
                      <ul class="nav nav-tabs pull-right">
                        <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                        <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                        <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                      </ul>
                      <div class="tab-content no-padding">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                      </div>
                    </div>
                    <!-- /.nav-tabs-custom -->

                    <!-- Chat box -->
                    <div class="box box-success">
                      <div class="box-header">
                        <i class="fa fa-comments-o"></i>

                        <h3 class="box-title">Chat</h3>

                        <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                          <div class="btn-group" data-toggle="btn-toggle">
                            <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
                            </button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                          </div>
                        </div>
                      </div>
                      <div class="box-body chat" id="chat-box">
                        <!-- chat item -->
                        <div class="item">
                          <img src="dist/img/user4-128x128.jpg" alt="user image" class="online">

                          <p class="message">
                            <a href="#" class="name">
                              <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                              Mike Doe
                            </a>
                            I would like to meet you to discuss the latest news about
                            the arrival of the new theme. They say it is going to be one the
                            best themes on the market
                          </p>
                          <div class="attachment">
                            <h4>Attachments:</h4>

                            <p class="filename">
                              Theme-thumbnail-image.jpg
                            </p>

                            <div class="pull-right">
                              <button type="button" class="btn btn-primary btn-sm btn-flat">Open</button>
                            </div>
                          </div>
                          <!-- /.attachment -->
                        </div>
                        <!-- /.item -->
                        <!-- chat item -->
                        <div class="item">
                          <img src="dist/img/user3-128x128.jpg" alt="user image" class="offline">

                          <p class="message">
                            <a href="#" class="name">
                              <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                              Alexander Pierce
                            </a>
                            I would like to meet you to discuss the latest news about
                            the arrival of the new theme. They say it is going to be one the
                            best themes on the market
                          </p>
                        </div>
                        <!-- /.item -->
                        <!-- chat item -->
                        <div class="item">
                          <img src="dist/img/user2-160x160.jpg" alt="user image" class="offline">

                          <p class="message">
                            <a href="#" class="name">
                              <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                              Susan Doe
                            </a>
                            I would like to meet you to discuss the latest news about
                            the arrival of the new theme. They say it is going to be one the
                            best themes on the market
                          </p>
                        </div>
                        <!-- /.item -->
                      </div>
                      <!-- /.chat -->
                      <div class="box-footer">
                        <div class="input-group">
                          <input class="form-control" placeholder="Type message...">

                          <div class="input-group-btn">
                            <button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.box (chat box) -->

                    <!-- TO DO List -->
                    <div class="box box-primary">
                      <div class="box-header">
                        <i class="ion ion-clipboard"></i>

                        <h3 class="box-title">To Do List</h3>

                        <div class="box-tools pull-right">
                          <ul class="pagination pagination-sm inline">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">&raquo;</a></li>
                          </ul>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                        <ul class="todo-list">
                          <li>
                            <!-- drag handle -->
                            <span class="handle">
                              <i class="fa fa-ellipsis-v"></i>
                              <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <!-- checkbox -->
                            <input type="checkbox" value="">
                            <!-- todo text -->
                            <span class="text">Design a nice theme</span>
                            <!-- Emphasis label -->
                            <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                              <i class="fa fa-edit"></i>
                              <i class="fa fa-trash-o"></i>
                            </div>
                          </li>
                          <li>
                            <span class="handle">
                              <i class="fa fa-ellipsis-v"></i>
                              <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <input type="checkbox" value="">
                            <span class="text">Make the theme responsive</span>
                            <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                            <div class="tools">
                              <i class="fa fa-edit"></i>
                              <i class="fa fa-trash-o"></i>
                            </div>
                          </li>
                          <li>
                            <span class="handle">
                              <i class="fa fa-ellipsis-v"></i>
                              <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <input type="checkbox" value="">
                            <span class="text">Let theme shine like a star</span>
                            <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                            <div class="tools">
                              <i class="fa fa-edit"></i>
                              <i class="fa fa-trash-o"></i>
                            </div>
                          </li>
                          <li>
                            <span class="handle">
                              <i class="fa fa-ellipsis-v"></i>
                              <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <input type="checkbox" value="">
                            <span class="text">Let theme shine like a star</span>
                            <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
                            <div class="tools">
                              <i class="fa fa-edit"></i>
                              <i class="fa fa-trash-o"></i>
                            </div>
                          </li>
                          <li>
                            <span class="handle">
                              <i class="fa fa-ellipsis-v"></i>
                              <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <input type="checkbox" value="">
                            <span class="text">Check your messages and notifications</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                            <div class="tools">
                              <i class="fa fa-edit"></i>
                              <i class="fa fa-trash-o"></i>
                            </div>
                          </li>
                          <li>
                            <span class="handle">
                              <i class="fa fa-ellipsis-v"></i>
                              <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <input type="checkbox" value="">
                            <span class="text">Let theme shine like a star</span>
                            <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
                            <div class="tools">
                              <i class="fa fa-edit"></i>
                              <i class="fa fa-trash-o"></i>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer clearfix no-border">
                        <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
                      </div>
                    </div>
                    <!-- /.box -->

                    <!-- quick email widget -->
                    <div class="box box-info">
                      <div class="box-header">
                        <i class="fa fa-envelope"></i>

                        <h3 class="box-title">Quick Email</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                          <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                          title="Remove">
                          <i class="fa fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                      </div>
                      <div class="box-body">
                        <form action="#" method="post">
                          <div class="form-group">
                            <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" name="subject" placeholder="Subject">
                          </div>
                          <div>
                            <textarea class="textarea" placeholder="Message"
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                          </div>
                        </form>
                      </div>
                      <div class="box-footer clearfix">
                        <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
                          <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                      </div>

                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-5 connectedSortable">

                      <!-- Map box -->
                      <div class="box box-solid bg-light-blue-gradient">
                        <div class="box-header">
                          <!-- tools box -->
                          <div class="pull-right box-tools">
                            <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip"
                            title="Date range">
                            <i class="fa fa-calendar"></i></button>
                            <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
                            data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                            <i class="fa fa-minus"></i></button>
                          </div>
                          <!-- /. tools -->

                          <i class="fa fa-map-marker"></i>

                          <h3 class="box-title">
                            Visitors
                          </h3>
                        </div>
                        <div class="box-body">
                          <div id="world-map" style="height: 250px; width: 100%;"></div>
                        </div>
                        <!-- /.box-body-->
                        <div class="box-footer no-border">
                          <div class="row">
                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                              <div id="sparkline-1"></div>
                              <div class="knob-label">Visitors</div>
                            </div>
                            <!-- ./col -->
                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                              <div id="sparkline-2"></div>
                              <div class="knob-label">Online</div>
                            </div>
                            <!-- ./col -->
                            <div class="col-xs-4 text-center">
                              <div id="sparkline-3"></div>
                              <div class="knob-label">Exists</div>
                            </div>
                            <!-- ./col -->
                          </div>
                          <!-- /.row -->
                        </div>
                      </div>
                      <!-- /.box -->

                      <!-- solid sales graph -->
                      <div class="box box-solid bg-teal-gradient">
                        <div class="box-header">
                          <i class="fa fa-th"></i>

                          <h3 class="box-title">Sales Graph</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                          </div>
                        </div>
                        <div class="box-body border-radius-none">
                          <div class="chart" id="line-chart" style="height: 250px;"></div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer no-border">
                          <div class="row">
                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                              <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                              data-fgColor="#39CCCC">

                              <div class="knob-label">Mail-Orders</div>
                            </div>
                            <!-- ./col -->
                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                              <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                              data-fgColor="#39CCCC">

                              <div class="knob-label">Online</div>
                            </div>
                            <!-- ./col -->
                            <div class="col-xs-4 text-center">
                              <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                              data-fgColor="#39CCCC">

                              <div class="knob-label">In-Store</div>
                            </div>
                            <!-- ./col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.box-footer -->
                      </div>
                      <!-- /.box -->

                      <!-- Calendar -->
                      <div class="box box-solid bg-green-gradient">
                        <div class="box-header">
                          <i class="fa fa-calendar"></i>

                          <h3 class="box-title">Calendar</h3>
                          <!-- tools box -->
                          <div class="pull-right box-tools">
                            <!-- button with a dropdown -->
                            <div class="btn-group">
                              <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bars"></i></button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                  <li><a href="#">Add new event</a></li>
                                  <li><a href="#">Clear events</a></li>
                                  <li class="divider"></li>
                                  <li><a href="#">View calendar</a></li>
                                </ul>
                              </div>
                              <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                              <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                              </button>
                            </div>
                            <!-- /. tools -->
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body no-padding">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%"></div>
                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer text-black">
                            <div class="row">
                              <div class="col-sm-6">
                                <!-- Progress bars -->
                                <div class="clearfix">
                                  <span class="pull-left">Task #1</span>
                                  <small class="pull-right">90%</small>
                                </div>
                                <div class="progress xs">
                                  <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                                </div>

                                <div class="clearfix">
                                  <span class="pull-left">Task #2</span>
                                  <small class="pull-right">70%</small>
                                </div>
                                <div class="progress xs">
                                  <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                                </div>
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-6">
                                <div class="clearfix">
                                  <span class="pull-left">Task #3</span>
                                  <small class="pull-right">60%</small>
                                </div>
                                <div class="progress xs">
                                  <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                                </div>

                                <div class="clearfix">
                                  <span class="pull-left">Task #4</span>
                                  <small class="pull-right">40%</small>
                                </div>
                                <div class="progress xs">
                                  <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                                </div>
                              </div>
                              <!-- /.col -->
                            </div>
                            <!-- /.row -->
                          </div>
                        </div>
                        <!-- /.box -->

                      </section>
                      <!-- right col -->
                    </div>
                    <!-- /.row (main row) -->
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
                    
                    
                    <!-- Morris.js charts -->
                    <script src="bower_components/raphael/raphael.min.js"></script>
                    <script src="bower_components/morris.js/morris.min.js"></script>
                    <!-- Sparkline -->
                    <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
                    <!-- jvectormap -->
                    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
                    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
                    <!-- jQuery Knob Chart -->
                    <script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
                    
                    <!-- daterangepicker -->
                    <script src="bower_components/moment/min/moment.min.js"></script>
                    <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
                    <!-- datepicker -->
                    <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
                    <!-- Bootstrap WYSIHTML5 -->
                    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
                    <!-- Slimscroll -->
                    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
                    <!-- FastClick -->
                    <script src="bower_components/fastclick/lib/fastclick.js"></script>
                    <!-- AdminLTE App -->
                    <script src="dist/js/adminlte.min.js"></script>
                    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
                    <script src=dist/js/pages/dashboard.js"></script>
                    <!-- AdminLTE for demo purposes -->
                    <script src="dist/js/demo.js"></script>
                    <!-- DataTables -->
                    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
                    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
                    <script>
                      $(function () {
                        $('#example1').DataTable()
                        $('#example2').DataTable({
                          'paging'      : true,
                          'lengthChange': false,
                          'searching'   : false,
                          'ordering'    : true,
                          'info'        : true,
                          'autoWidth'   : false
                        })
                      })
                    </script>
                    
                    <!-- Select2 -->
                    <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
                    <script>
                      $(function () {
                        //Initialize Select2 Elements
                        $('.select2').select2()
                        //Datemask dd/mm/yyyy
                        // $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
                        //Datemask2 mm/dd/yyyy
                        // $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
                        //Money Euro
                        // $('[data-mask]').inputmask()
                        
                        //Date range picker
                        // $('#reservation').daterangepicker()
                        //Date range picker with time picker
                        // $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
                        //Date range as a button
                        // $('#daterange-btn').daterangepicker(
                        //   {
                          //     ranges   : {
                            //       'Today'       : [moment(), moment()],
                            //       'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                            //       'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                            //       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                            //       'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                            //       'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                            //     },
                            //     startDate: moment().subtract(29, 'days'),
                            //     endDate  : moment()
                            //   },
                            //   function (start, end) {
                              //     $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                              //   }
                              // )
                              
                              //Date picker
                              // $('#datepicker').datepicker({
                                //   autoclose: true
                                // })
                                
                                //iCheck for checkbox and radio inputs
                                // $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                                  //   checkboxClass: 'icheckbox_minimal-blue',
                                  //   radioClass   : 'iradio_minimal-blue'
                                  // })
                                  //Red color scheme for iCheck
                                  // $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                                    //   checkboxClass: 'icheckbox_minimal-red',
                                    //   radioClass   : 'iradio_minimal-red'
                                    // })
                                    //Flat red color scheme for iCheck
                                    // $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                                      //   checkboxClass: 'icheckbox_flat-green',
                                      //   radioClass   : 'iradio_flat-green'
                                      // })
                                      
                                      //Colorpicker
                                      // $('.my-colorpicker1').colorpicker()
                                      //color picker with addon
                                      // $('.my-colorpicker2').colorpicker()
                                      
                                      //Timepicker
                                      // $('.timepicker').timepicker({
                                        //   showInputs: false
                                        // })
                                      })
                                    </script>
                                  </body>
                                  </html>
                                  
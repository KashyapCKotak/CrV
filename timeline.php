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
    <!-- jvectormap -->
    <!-- Date Picker -->
    <!-- Daterange picker -->
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
      $(document).ajaxStart(function() { Pace.restart(); });
    </script>
    <script type="text/javascript">
      var globalCryptoValue="BTC";
      var globalFiatValue="USD";
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
  <script type="text/javascript">
    function myFunction(){
      console.log("PAGE LOAD COMPLETE");
    }
  </script>
  <body class="hold-transition skin-blue sidebar-mini fixed sidebar-collapse" onload="myFunction()">
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
            <li class="header">
              <center>MENU</center>
            </li>
            <li class="active treeview">
              <a href="dashboard.php">
              <i class="fa fa-dashboard"></i> 
              <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="portfolio.php">
              <i class="fa fa-line-chart"></i> 
              <span>Portfolio</span>
              </a>
            </li>
            <li>
              <a href="https://adminlte.io/docs">
              <i class="fa fa-book"></i> <span>Documentation</span>
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
              <a href="pages/calendar.php">
              <i class="fa fa-calendar"></i> 
              <span>Calendar</span>
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
              <img class="top-image" src="dist/img/unavailable.png" alt=⌛ /><span class="top-label"> Bitcoin</span><br />
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
        <section class="content-header">
          <h1>
            &nbsp;&nbsp;News & Analysis
            <small>Combinig more than 19 news & analysis sources, worldwide</small>
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- row -->
          <div class="row">
            <div class="col-md-8" style="padding-right: 10px; padding-left: 10px">
              <!-- The time line -->
              <ul class="timeline">
                <!-- timeline item -->
                <li>
                  <div class="timeline-item">
                    <img src="https://www.cryptocompare.com/media/30002133/elpetromoneda.png?center=0.52877697841726623,0.48&mode=crop&width=300&height=300&rnd=131685227150000000">
                    <div class="title-and-time-holder">
                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                    <h3 class="timeline-header"><a href="#">Support Team sent you an email kjagsjdgjkagdjkf adjksf gfjk ajksdgf jgdsjkfgklasdgf</a></h3></div>
                    <div class="timeline-body">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                      weebly ning heekya handango imeem plugg dopplr jibjab, movity
                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                      quora plaxo ideeli hulu weebly balihoo...<a href="crypto.com">&nbsp;CryptoGlobe.com</a>
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>
                    <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>
                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                    <div class="timeline-body">
                      Take me to your leader!
                      Switzerland is small and neutral!
                      We are more like Germany, ambitious and misunderstood!
                    </div>
                    <div class="timeline-footer">
                      <div class="btn btn-warning btn-flat btn-xs">View comment</div>
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline time label -->
                <li class="time-label">
                  <span class="bg-green">
                  3 Jan. 2014
                  </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>
                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                    <div class="timeline-body">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                    </div>
                  </div>
                </li>

                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 5 days ago</span>
                    <h3 class="timeline-header"><a href="#">Mr. Doe</a> shared a video</h3>
                    <div class="timeline-body">
                      <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs"
                          frameborder="0" allowfullscreen></iframe>
                      </div>
                    </div>
                    <div class="timeline-footer">
                      <a href="#" class="btn btn-xs bg-maroon">See comments</a>
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <li>
                  <i class="fa fa-clock-o bg-gray"></i>
                </li>
              </ul>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="row" style="margin-top: 10px;">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"><i class="fa fa-code"></i> Timeline Markup</h3>
                </div>
                <div class="box-body">
                  <pre style="font-weight: 600;">
&lt;ul class="timeline">

    &lt;!-- timeline time label -->
    &lt;li class="time-label">
        &lt;span class="bg-red">
            10 Feb. 2014
        &lt;/span>
    &lt;/li>
    &lt;!-- /.timeline-label -->

    &lt;!-- timeline item -->
    &lt;li>
        &lt;!-- timeline icon -->
        &lt;i class="fa fa-envelope bg-blue">&lt;/i>
        &lt;div class="timeline-item">
            &lt;span class="time">&lt;i class="fa fa-clock-o">&lt;/i> 12:05&lt;/span>

            &lt;h3 class="timeline-header">&lt;a href="#">Support Team&lt;/a> ...&lt;/h3>

            &lt;div class="timeline-body">
                ...
                Content goes here
            &lt;/div>

            &lt;div class="timeline-footer">
                &lt;a class="btn btn-primary btn-xs">...&lt;/a>
            &lt;/div>
        &lt;/div>
    &lt;/li>
    &lt;!-- END timeline item -->

    ...

&lt;/ul>
<script src="loadNewsPage.js"></script>>
                  </pre>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2018-2019 Yogeshwar Studio.</strong> All rights
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
    
    <!-- Slimscroll -->
    <!-- <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> -->
    <!-- FastClick -->
    <!-- <script src="bower_components/fastclick/lib/fastclick.js"></script> -->
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="dist/js/pages/dashboard.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="dist/js/demo.js"></script> -->
    <!-- DataTables -->
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
    <script type="text/javascript">
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
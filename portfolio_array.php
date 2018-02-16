<!DOCTYPE html>
<html>
<head>
  <?php
  include ($_SERVER['DOCUMENT_ROOT'].'/AdminLTE-2.4.2/pages/checkLogin.php');
  ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Portfolio</title>
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
    <!-- [if lt IE 9]> -->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <!-- <![endif] -->

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
            <script type="text/javascript">
              var buyPrtfRate=null;
              var sellPrtfRate=null;
              var updatePrtfRate=null;
              var initialPrtfRate=null;

              var xhttpFirst = new XMLHttpRequest();
              xhttpFirst.onreadystatechange = function() {
                if (xhttpFirst.readyState == 4 && xhttpFirst.status == 200) {
                  initialPrtfRate = JSON.parse(xhttpFirst.responseText).INR;
                  // console.log(initialPrtfRate);
                  buyPrtfRate=initialPrtfRate;
                  sellPrtfRate=initialPrtfRate;
                  updatePrtfRate=initialPrtfRate;
                }
              };
              xhttpFirst.open("GET", "https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=INR", true);
              xhttpFirst.send();
            </script>
            <script>
              var buyCryptoValue="BTC";
              var buyFiatValue="INR";
              var sellCryptoValue="BTC";
              var sellFiatValue="INR";
              var updateCryptoValue="BTC";
              var updateFiatValue="INR";
              var currentCryptoValue="BTC";
              var currentFiatValue="INR";



              function selectFiat(which){
                if(which==1){
                  buyFiatValue=document.getElementById("fiatSelectBoxBuy").value;
                  currentFiatValue=buyFiatValue;
                  updateCurrentRate(which);
                }
                else if (which==2){
                  sellFiatValue=document.getElementById("fiatSelectBoxSell").value;
                  currentFiatValue=sellFiatValue;
                  updateCurrentRate(which);
                }
                else if (which==3){
                  updateFiatValue=document.getElementById("fiatSelectBoxUpdate").value;
                  currentFiatValue=updateFiatValue;
                  updateCurrentRate(which);
                }
              }

              function selectCrypto(which){
                if(which==1){
                  var buyCryptoValue=document.getElementById("cryptoSelectBoxBuy").value;
                  currentCryptoValue=buyCryptoValue;
                  updateCurrentRate(which);
                }
                else if(which==2){
                  var sellCryptoValue=document.getElementById("cryptoSelectBoxSell").value;
                  currentCryptoValue=sellCryptoValue;
                  updateCurrentRate(which);
                }
                else if(which==3){
                  var updateCryptoValue=document.getElementById("cryptoSelectBoxUpdate").value;
                  currentCryptoValue=updateCryptoValue;
                  updateCurrentRate(which);
                }
              }

              function updateCurrentRate(which){
                //console.log("updating data");
                //console.log(which);
                var rateUrl="https://min-api.cryptocompare.com/data/price?fsym="+currentCryptoValue+"&tsyms="+currentFiatValue;
                //console.log("URL: ===========================");
                //console.log(rateUrl);
                var xhttpUpdate = new XMLHttpRequest();
                xhttpUpdate.onreadystatechange = function() {
                  if (xhttpUpdate.readyState == 4 && xhttpUpdate.status == 200) {
                    if(which==1){
                      buyPrtfRate = JSON.parse(xhttpUpdate.responseText)[currentFiatValue];
                      convertToFiat(which,1);
                    }
                    else if(which==2){
                      sellPrtfRate = JSON.parse(xhttpUpdate.responseText)[currentFiatValue];
                      convertToFiat(which,1);
                    }
                    else if(which==3){
                      updatePrtfRate = JSON.parse(xhttpUpdate.responseText)[currentFiatValue];
                      convertToFiat(which,1);
                    }
                  }
                };
                xhttpUpdate.open("GET", rateUrl, true);
                xhttpUpdate.send();
              }

              function convertToFiat(which,typ){
                console.log(typ);
                typ=typ+1;
                if(typ==3){
                  console.log(typ);
                  typ==1;
                  document.getElementsByClassName("cryptoInputBuy")[typ-1].value=document.getElementsByClassName("cryptoInputBuy")[typ+1-1].value;
                }
                else{
                  console.log(typ);
                  document.getElementsByClassName("cryptoInputBuy")[typ-1].value=document.getElementsByClassName("cryptoInputBuy")[typ-1-1].value;
                }
                
                //console.log("in convert");
                if(which == 1) {
                  //console.log("buy updating");
                  var cryptoInputToUse="cryptoInputBuy";
                  var fiatInputToUse="fiatInputBuy";
                  var currentConversionRate=buyPrtfRate;
                  var feesInputToUse="feesInputBuy";
                  var feesApplySign=1;
                }
                else if(which == 2) {
                  var cryptoInputToUse="cryptoInputSell";
                  var fiatInputToUse="fiatInputSell";
                  var currentConversionRate=sellPrtfRate;
                  var feesInputToUse="feesInputSell";
                  var feesApplySign=-1;
                }
                else if(which == 3) {
                  var cryptoInputToUse="cryptoInputUpdate";
                  var fiatInputToUse="fiatInputUpdate";
                  var currentConversionRate=updatePrtfRate;
                }

                if(document.getElementById(feesInputToUse).value=="" && document.getElementsByClassName(cryptoInputToUse)[0].value!=""){
                  document.getElementById(feesInputToUse).value=0;
                }

                if(isNaN(parseFloat((document.getElementsByClassName(cryptoInputToUse)[0].value).replace(/,/g, '')))) {
                  document.getElementById(fiatInputToUse).value="Enter Correct Number!";
                  if(document.getElementsByClassName(cryptoInputToUse)[0].value == "")
                    document.getElementById(fiatInputToUse).value="";
                  return;
                }
                //console.log("ahead 2");
                var fiatClaculatedValue=parseFloat((document.getElementsByClassName(cryptoInputToUse)[0].value).replace(/,/g, ''))*currentConversionRate;
                var fiatClaculatedValue=fiatClaculatedValue+((fiatClaculatedValue*(parseFloat(document.getElementById(feesInputToUse).value))/100)*feesApplySign);
                document.getElementById(fiatInputToUse).value=fiatClaculatedValue.toLocaleString();
              }

              function convertToCrypto(which){
                if(which == 1) {
                  var cryptoInputToUse="cryptoInputBuy";
                  var fiatInputToUse="fiatInputBuy";
                  var currentConversionRate=buyPrtfRate;
                  var feesInputToUse="feesInputBuy";
                  var feesApplySign=-1;
                }
                else if(which == 2) {
                  var cryptoInputToUse="cryptoInputSell";
                  var fiatInputToUse="fiatInputSell";
                  var currentConversionRate=sellPrtfRate;
                  var feesInputToUse="feesInputSell";
                  var feesApplySign=1;
                }
                else if(which == 3) {
                  var cryptoInputToUse="cryptoInputUpdate";
                  var fiatInputToUse="fiatInputUpdate";
                  var currentConversionRate=updatePrtfRate;
                }

                if(isNaN(parseFloat((document.getElementById(fiatInputToUse).value).replace(/,/g, '')))){
                  document.getElementsByClassName(cryptoInputToUse)[0].value="Enter Correct Number!";
                  if(document.getElementById(fiatInputToUse).value == "")
                    document.getElementsByClassName(cryptoInputToUse)[0].value="";
                  return;
                }

                var fiatInputValueToClac=parseFloat((document.getElementById(fiatInputToUse).value).replace(/,/g, ''));
                var fiatInputValueToClac=fiatInputValueToClac+((fiatInputValueToClac*(parseFloat(document.getElementById(feesInputToUse).value))/100)*feesApplySign);
                var cryptoCalculatedValue=fiatInputValueToClac/currentConversionRate;

                if(which!=3){
                  document.getElementsByClassName(cryptoInputToUse)[0].value=cryptoCalculatedValue.toLocaleString();
                  document.getElementsByClassName(cryptoInputToUse)[1].value=cryptoCalculatedValue.toLocaleString();
                }
              }
              //////////////////////////////////////////////////////////////////////////
              function openTab(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("BuySellTabContent");
                for (i = 0; i < tabcontent.length; i++) {
                  tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                  tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "inline-block";
                evt.currentTarget.className += " active";
              }
              /////////////////////////////////////////////////////////////////////////
              
            </script>           
            <!-- Main content -->

            <section class="content" style="padding-left:5px;padding-right:5px;">
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
                          <div id="portfolioTablePersonal" lass="box-body no-padding">
                            <script src="PortfolioFill2.php"></script>
                            <script>
                              triggerLoadTableAndUrl(1);
                            </script>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <!-- //////////////////////////////////////////////////////// -->
                        <div class="BuySellTabHolder col-md-6">
                          <div class="BuySellTab">
                            <button class="tablinks active" onclick="openTab(event, 'BuyTab')">Buy</button>
                            <button class="tablinks" onclick="openTab(event, 'SellTab')">Sell</button>
                            <button class="tablinks" onclick="openTab(event, 'UpdateTab')">Update</button>
                          </div>
                          <br>
                          <div id="BuyTab" class="BuySellTabContent" style="display: inline-block;">
                            <br>
                            <div class="crypto-select" style="display: inline-block; float: left;">
                              <label class="label-enable" style="width: 108px;display: inline-block;text-align: left;">Crypto Currency: </label>
                              <select id="cryptoSelectBoxBuy" class="form-control select2" style="width:157px" onchange="selectCrypto(1)">
                                <option id="default-crypto" selected="selected" value="BTC">Bitcoin (BTC)</option>
                                <option value="ETH">Ethereum (ETH)</option>
                                <option value="XRP">Ripple (XRP)</option>
                                <option value="BCH">Bitcoin Cash (BCH)</option>
                                <option value="LTC">Litecoin (LTC)</option>
                                <option value="TRX">Tron (TRX)</option>
                                <option value="DASH">Dash (DASH)</option>
                              </select>
                            </div>
                            <br>
                            <br>
                            <div class="fiat-select" style="display: inline-block; float: left;">
                              <label class="label-enable" style="width: 108px;display: inline-block;text-align: left;">Fiat Currency:</label>
                              <select id="fiatSelectBoxBuy" class="form-control select2" style="width:auto" onchange="selectFiat(1)">
                                <option class="default-fiat" selected="selected">INR</option>
                                <option>USD</option>
                                <option>EUR</option>
                                <option>JPY</option>
                                <option>CNY</option>
                              </select>
                            </div>
                            <br>
                            <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                              <input id="cryptoInputBuy" class="input_convert cryptoInputBuy" style="font-size: 15px; width: 100%" type="text" oninput="convertToFiat(1,1)" required>
                              <!-- <span class="highlight"></span> -->
                              <span class="bar_convert" style="width: 100%"></span>
                              <label class="label_convert" style="font-size: 15px; left: 0">Crypto Currency</label>
                              <button class="label_convert" style="font-size: 15px; width: auto; text-align: right; border: none; background-color: #3c8dbc; color: #fff; border-radius: 10px; left: auto; right: 0; pointer-events: auto;">See All</button>
                            </div>
                            <br>
                            <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                              <input id ="feesInputBuy" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToFiat(1,1)" required>
                              <!-- <span class="highlight"></span> -->
                              <span class="bar_convert" style="width: 100%"></span>
                              <label class="label_convert" style="font-size: 15px;left: 0">Fees (%)</label>
                            </div>
                            <br>
                            <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                              <input id ="fiatInputBuy" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToCrypto(1)" required>
                              <!-- <span class="highlight"></span> -->
                              <span class="bar_convert" style="width: 100%"></span>
                              <label class="label_convert" style="font-size: 15px;left: 0">Fiat Cost</label>
                            </div>
                            <br>
                            <br>
                            <button onclick='buyPortfolio("Personal")' style="font-size: 17px; padding: 14px 16px; width: auto; text-align: right; border: none; background-color: #3c8dbc; color: #fff; border-radius: 15px; left: auto; right: 0; pointer-events: auto;">Update</button>
                          </div>
                          <!-- /////////////////////////// -->

                          <!-- ////////////////////////////// -->
                          <div id="SellTab" class="BuySellTabContent">
                            <br>
                            <div class="crypto-select" style="display: inline-block; float: left;">
                              <label class="label-enable" style="width: 108px;display: inline-block;text-align: left;">Crypto Currency: </label>
                              <select id="cryptoSelectBoxSell" class="form-control select2" style="width:157px" onchange="selectCrypto(2)">
                                <option id="default-crypto" selected="selected" value="BTC">Bitcoin (BTC)</option>
                                <option value="ETH">Ethereum (ETH)</option>
                                <option value="XRP">Ripple (XRP)</option>
                                <option value="BCH">Bitcoin Cash (BCH)</option>
                                <option value="LTC">Litecoin (LTC)</option>
                                <option value="TRX">Tron (TRX)</option>
                                <option value="DASH">Dash (DASH)</option>
                              </select>
                            </div>
                            <br>
                            <br>
                            <div class="fiat-select" style="display: inline-block; float: left;">
                              <label class="label-enable" style="width: 108px;display: inline-block;text-align: left;">Fiat Currency:</label>
                              <select id="fiatSelectBoxSell" class="form-control select2" style="width:auto" onchange="selectFiat(2)">
                                <option class="default-fiat" selected="selected">INR</option>
                                <option>INR</option>
                                <option>USD</option>
                                <option>EUR</option>
                                <option>JPY</option>
                                <option>CNY</option>
                              </select>
                            </div>
                            <br>
                            <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                              <input id="cryptoInputSell" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToFiat(2,1)" required>
                              <!-- <span class="highlight"></span> -->
                              <span class="bar_convert" style="width: 100%"></span>
                              <label class="label_convert" style="font-size: 15px; left: 0">Crypto Currency</label>
                              <button  class="label_convert" style="font-size: 15px; width: auto; text-align: right; border: none; background-color: #3c8dbc; color: #fff; border-radius: 10px; left: auto; right: 0; pointer-events: auto;">See All</button>
                            </div>
                            <br>
                            <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                              <input id ="feesInputSell" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToFiat(2,1)" required>
                              <!-- <span class="highlight"></span> -->
                              <span class="bar_convert" style="width: 100%"></span>
                              <label class="label_convert" style="font-size: 15px;left: 0">Fees (%)</label>
                            </div>
                            <br>
                            <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                              <input id ="fiatInputSell" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToCrypto(2)" required>
                              <!-- <span class="highlight"></span> -->
                              <span class="bar_convert" style="width: 100%"></span>
                              <label class="label_convert" style="font-size: 15px;left: 0">Fiat Value</label>
                            </div>
                            <br>
                            <br>
                            <button onclick='sellPortfolio("Personal")' style="font-size: 17px; padding: 14px 16px; width: auto; text-align: right; border: none; background-color: #3c8dbc; color: #fff; border-radius: 15px; left: auto; right: 0; pointer-events: auto;">Update</button>
                          </div>
                          <!-- ////////////////////////////// -->
                          <div id="UpdateTab" class="BuySellTabContent">
                            <br>
                            <div class="crypto-select" style="display: inline-block; float: left;">
                              <label class="label-enable" style="width: 108px;display: inline-block;text-align: left;">Crypto Currency: </label>
                              <select id="cryptoSelectBoxUpdate" class="form-control select2" style="width:157px" onchange="selectCrypto(3)">
                                <option id="default-crypto" selected="selected" value="BTC">Bitcoin (BTC)</option>
                                <option value="ETH">Ethereum (ETH)</option>
                                <option value="XRP">Ripple (XRP)</option>
                                <option value="BCH">Bitcoin Cash (BCH)</option>
                                <option value="LTC">Litecoin (LTC)</option>
                                <option value="TRX">Tron (TRX)</option>
                                <option value="DASH">Dash (DASH)</option>
                              </select>
                            </div>
                            <br>
                            <br>
                            <div class="fiat-select" style="display: inline-block; float: left;">
                              <label class="label-enable" style="width: 108px;display: inline-block;text-align: left;">Fiat Currency:</label>
                              <select id="fiatSelectBoxUpdate" class="form-control select2" style="width:auto" onchange="selectFiat(3)">
                                <option class="default-fiat" selected="selected">INR</option>
                                <option>INR</option>
                                <option>USD</option>
                                <option>EUR</option>
                                <option>JPY</option>
                                <option>CNY</option>
                              </select>
                            </div>
                            <br>
                            <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                              <input id="cryptoInputUpdate" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToFiat(3,1)" required>
                              <!-- <span class="highlight"></span> -->
                              <span class="bar_convert" style="width: 100%"></span>
                              <label class="label_convert" style="font-size: 15px; left: 0">Crypto Amount</label>
                              <!-- <button class="label_convert" style="font-size: 15px; width: auto; text-align: right; border: none; background-color: #3c8dbc; color: #fff; border-radius: 10px; left: auto; right: 0; pointer-events: auto;">See All</button> -->
                            </div>
                            <br>
                            <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                              <input id ="fiatInputUpdate" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToCrypto(3)" required>
                              <!-- <span class="highlight"></span> -->
                              <span class="bar_convert" style="width: 100%"></span>
                              <label class="label_convert" style="font-size: 15px;left: 0">Investment Cost</label>
                            </div>
                            <br>
                            <br>
                            <button onclick='updatePortfolio("Personal")' style="font-size: 17px; padding: 14px 16px; width: auto; text-align: right; border: none; background-color: #3c8dbc; color: #fff; border-radius: 15px; left: auto; right: 0; pointer-events: auto;">Update</button>
                          </div>
                          <!-- ////////////////////////////// -->
                        </div>

                        <!-- //////////////////////////////////////////////////////// -->

                        <!-- //////////////////////////////////////////////////////// -->

                        <!-- //////////////////////////////////////////////////////// -->

                        <!-- //////////////////////////////////////////////////////// -->

                        <!-- //////////////////////////////////////////////////////// -->

                        <!-- //////////////////////////////////////////////////////// -->

                        <!-- //////////////////////////////////////////////////////// -->

                        <!-- //////////////////////////////////////////////////////// -->

                        <!-- //////////////////////////////////////////////////////// -->

                        <!-- //////////////////////////////////////////////////////// -->

                        <!-- //////////////////////////////////////////////////////// -->

                        <!-- //////////////////////////////////////////////////////// -->

                        </div>
                        <!-- ////////////// TAB 1 End ///////////////.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                          
                        <div class="row col-md-6" style="margin: 0; padding: 0">
                          <div id="portfolioTablePractice" lass="box-body no-padding">
                            <script src="PortfolioFill2.php"></script>
                            <script>
                              triggerLoadTableAndUrl(2);
                            </script>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <!-- //////////////////////////////////////////////////////// -->
                        <div class="BuySellTabHolder col-md-6">
                          <div class="BuySellTab">
                            <button class="tablinks active" onclick="openTab(event, 'BuyTab')">Buy</button>
                            <button class="tablinks" onclick="openTab(event, 'SellTab')">Sell</button>
                            <button class="tablinks" onclick="openTab(event, 'UpdateTab')">Update</button>
                          </div>
                          <br>
                          <div id="BuyTab" class="BuySellTabContent" style="display: inline-block;">
                            <br>
                            <div class="crypto-select" style="display: inline-block; float: left;">
                              <label class="label-enable" style="width: 108px;display: inline-block;text-align: left;">Crypto Currency: </label>
                              <select id="cryptoSelectBoxBuy" class="form-control select2" style="width:157px" onchange="selectCrypto(1)">
                                <option id="default-crypto" selected="selected" value="BTC">Bitcoin (BTC)</option>
                                <option value="ETH">Ethereum (ETH)</option>
                                <option value="XRP">Ripple (XRP)</option>
                                <option value="BCH">Bitcoin Cash (BCH)</option>
                                <option value="LTC">Litecoin (LTC)</option>
                                <option value="TRX">Tron (TRX)</option>
                                <option value="DASH">Dash (DASH)</option>
                              </select>
                            </div>
                            <br>
                            <br>
                            <div class="fiat-select" style="display: inline-block; float: left;">
                              <label class="label-enable" style="width: 108px;display: inline-block;text-align: left;">Fiat Currency:</label>
                              <select id="fiatSelectBoxBuy" class="form-control select2" style="width:auto" onchange="selectFiat(1)">
                                <option class="default-fiat" selected="selected">INR</option>
                                <option>INR</option>
                                <option>USD</option>
                                <option>EUR</option>
                                <option>JPY</option>
                                <option>CNY</option>
                              </select>
                            </div>
                            <br>
                            <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                              <input id="cryptoInputBuy" class="input_convert cryptoInputBuy" style="font-size: 15px; width: 100%" type="text" oninput="convertToFiat(1,2)" required>
                              <!-- <span class="highlight"></span> -->
                              <span class="bar_convert" style="width: 100%"></span>
                              <label class="label_convert" style="font-size: 15px; left: 0">Crypto Currency</label>
                              <button class="label_convert" style="font-size: 15px; width: auto; text-align: right; border: none; background-color: #3c8dbc; color: #fff; border-radius: 10px; left: auto; right: 0; pointer-events: auto;">See All</button>
                            </div>
                            <br>
                            <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                              <input id ="feesInputBuy" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToFiat(1,2)" required>
                              <!-- <span class="highlight"></span> -->
                              <span class="bar_convert" style="width: 100%"></span>
                              <label class="label_convert" style="font-size: 15px;left: 0">Fees (%)</label>
                            </div>
                            <br>
                            <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                              <input id ="fiatInputBuy" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToCrypto(1)" required>
                              <!-- <span class="highlight"></span> -->
                              <span class="bar_convert" style="width: 100%"></span>
                              <label class="label_convert" style="font-size: 15px;left: 0">Fiat Cost</label>
                            </div>
                            <br>
                            <br>
                            <button onclick='buyPortfolio("Practice")' style="font-size: 17px; padding: 14px 16px; width: auto; text-align: right; border: none; background-color: #3c8dbc; color: #fff; border-radius: 15px; left: auto; right: 0; pointer-events: auto;">Update</button>
                          </div>
                          <!-- /////////////////////////// -->

                          <!-- ////////////////////////////// -->
                          <div id="SellTab" class="BuySellTabContent">
                            <br>
                            <div class="crypto-select" style="display: inline-block; float: left;">
                              <label class="label-enable" style="width: 108px;display: inline-block;text-align: left;">Crypto Currency: </label>
                              <select id="cryptoSelectBoxSell" class="form-control select2" style="width:157px" onchange="selectCrypto(2)">
                                <option id="default-crypto" selected="selected" value="BTC">Bitcoin (BTC)</option>
                                <option value="ETH">Ethereum (ETH)</option>
                                <option value="XRP">Ripple (XRP)</option>
                                <option value="BCH">Bitcoin Cash (BCH)</option>
                                <option value="LTC">Litecoin (LTC)</option>
                                <option value="TRX">Tron (TRX)</option>
                                <option value="DASH">Dash (DASH)</option>
                              </select>
                            </div>
                            <br>
                            <br>
                            <div class="fiat-select" style="display: inline-block; float: left;">
                              <label class="label-enable" style="width: 108px;display: inline-block;text-align: left;">Fiat Currency:</label>
                              <select id="fiatSelectBoxSell" class="form-control select2" style="width:auto" onchange="selectFiat(2)">
                                <option class="default-fiat" selected="selected">INR</option>
                                <option>INR</option>
                                <option>USD</option>
                                <option>EUR</option>
                                <option>JPY</option>
                                <option>CNY</option>
                              </select>
                            </div>
                            <br>
                            <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                              <input id="cryptoInputSell" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToFiat(2,2)" required>
                              <!-- <span class="highlight"></span> -->
                              <span class="bar_convert" style="width: 100%"></span>
                              <label class="label_convert" style="font-size: 15px; left: 0">Crypto Currency</label>
                              <button  class="label_convert" style="font-size: 15px; width: auto; text-align: right; border: none; background-color: #3c8dbc; color: #fff; border-radius: 10px; left: auto; right: 0; pointer-events: auto;">See All</button>
                            </div>
                            <br>
                            <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                              <input id ="feesInputSell" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToFiat(2,2)" required>
                              <!-- <span class="highlight"></span> -->
                              <span class="bar_convert" style="width: 100%"></span>
                              <label class="label_convert" style="font-size: 15px;left: 0">Fees (%)</label>
                            </div>
                            <br>
                            <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                              <input id ="fiatInputSell" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToCrypto(2)" required>
                              <!-- <span class="highlight"></span> -->
                              <span class="bar_convert" style="width: 100%"></span>
                              <label class="label_convert" style="font-size: 15px;left: 0">Fiat Value</label>
                            </div>
                            <br>
                            <br>
                            <button onclick='sellPortfolio("Practice")' style="font-size: 17px; padding: 14px 16px; width: auto; text-align: right; border: none; background-color: #3c8dbc; color: #fff; border-radius: 15px; left: auto; right: 0; pointer-events: auto;">Update</button>
                          </div>
                          <!-- ////////////////////////////// -->
                          <div id="UpdateTab" class="BuySellTabContent">
                            <br>
                            <div class="crypto-select" style="display: inline-block; float: left;">
                              <label class="label-enable" style="width: 108px;display: inline-block;text-align: left;">Crypto Currency: </label>
                              <select id="cryptoSelectBoxUpdate" class="form-control select2" style="width:157px" onchange="selectCrypto(3)">
                                <option id="default-crypto" selected="selected" value="BTC">Bitcoin (BTC)</option>
                                <option value="ETH">Ethereum (ETH)</option>
                                <option value="XRP">Ripple (XRP)</option>
                                <option value="BCH">Bitcoin Cash (BCH)</option>
                                <option value="LTC">Litecoin (LTC)</option>
                                <option value="TRX">Tron (TRX)</option>
                                <option value="DASH">Dash (DASH)</option>
                              </select>
                            </div>
                            <br>
                            <br>
                            <div class="fiat-select" style="display: inline-block; float: left;">
                              <label class="label-enable" style="width: 108px;display: inline-block;text-align: left;">Fiat Currency:</label>
                              <select id="fiatSelectBoxUpdate" class="form-control select2" style="width:auto" onchange="selectFiat(3)">
                                <option class="default-fiat" selected="selected">INR</option>
                                <option>INR</option>
                                <option>USD</option>
                                <option>EUR</option>
                                <option>JPY</option>
                                <option>CNY</option>
                              </select>
                            </div>
                            <br>
                            <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                              <input id="cryptoInputUpdate" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToFiat(3,2)" required>
                              <!-- <span class="highlight"></span> -->
                              <span class="bar_convert" style="width: 100%"></span>
                              <label class="label_convert" style="font-size: 15px; left: 0">Crypto Amount</label>
                              <!-- <button class="label_convert" style="font-size: 15px; width: auto; text-align: right; border: none; background-color: #3c8dbc; color: #fff; border-radius: 10px; left: auto; right: 0; pointer-events: auto;">See All</button> -->
                            </div>
                            <br>
                            <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                              <input id ="fiatInputUpdate" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToCrypto(3)" required>
                              <!-- <span class="highlight"></span> -->
                              <span class="bar_convert" style="width: 100%"></span>
                              <label class="label_convert" style="font-size: 15px;left: 0">Investment Cost</label>
                            </div>
                            <br>
                            <br>
                            <button onclick='updatePortfolio("Practice")' style="font-size: 17px; padding: 14px 16px; width: auto; text-align: right; border: none; background-color: #3c8dbc; color: #fff; border-radius: 15px; left: auto; right: 0; pointer-events: auto;">Update</button>
                          </div>
                          <!-- ////////////////////////////// -->
                        </div>
                        </div>
                        <!-- /.tab-pane -->
                        <!-- /.tab-pane -->
                      </div>
                      <!-- /.tab-content -->
                      <!-- </div> -->
                      <!-- nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row (main row) -->
                </section>
                <!-- /.content -->
              </div>
              <!-- /.content-wrapper -->
<!-- 
        <script>
          if( <?php echo $loggedIn ?> )
        </script>
      -->

      <script type="text/javascript">
        function buyPortfolio(portType){
          var selectedCryptoValue=document.getElementById("cryptoSelectBoxBuy").value;
          var selectedFiatValue=document.getElementById("fiatSelectBoxBuy").value;
          var inputCryptoAmount=document.getElementsByClassName("cryptoInputBuy")[0].value.replace(/,/g, '');
          var inputFiatAmount=document.getElementById("fiatInputBuy").value.replace(/,/g, '');

          if(isNaN(parseFloat(inputCryptoAmount.replace(/,/g, ''))) || isNaN(parseFloat(inputFiatAmount.replace(/,/g, ''))) || inputCryptoAmount == "" || inputFiatAmount == "") {
            alert( "Please Enter Correct Details" );
            return;
          }

          $.ajax({
            type: "POST",
            url: "BuyPort.php",
            data: { "cryptoVal" : selectedCryptoValue, "fiatVal" : selectedFiatValue, "cryptoAmt" : inputCryptoAmount, "fiatAmt" : inputFiatAmount, "portfolioType" : portType}
          }).done(function( msg ) {
            if(msg == 1){
              alert( portType + " Portfolio Updated!" );
              updtLclPrtObj(selectedCryptoValue, selectedFiatValue, inputCryptoAmount, inputFiatAmount, portType, 1);
            }
            else if(msg == 2){
              alert( portType+" Portfolio Updated, But something wrong while executing this operation. Please contact support immediately." );
              updtLclPrtObj(selectedCryptoValue, selectedFiatValue, inputCryptoAmount, inputFiatAmount, portType, 1);
            }
            else if(msg == 3){
              alert( portType + " Portfolio Update Unsuccessful. Please contact support immediately" );
            }
          });
        }

        function sellPortfolio(portType){
          var selectedCryptoValue=document.getElementById("cryptoSelectBoxSell").value;
          var selectedFiatValue=document.getElementById("fiatSelectBoxSell").value;
          var inputCryptoAmount=document.getElementById("cryptoInputSell").value.replace(/,/g, '');
          var inputFiatAmount=document.getElementById("fiatInputSell").value.replace(/,/g, '');

          if(isNaN(parseFloat(inputCryptoAmount.replace(/,/g, ''))) || isNaN(parseFloat(inputFiatAmount.replace(/,/g, ''))) || inputCryptoAmount == "" || inputFiatAmount == "") {
            alert( "Please Enter Correct Details" );
            return;
          }

          $.ajax({
            type: "POST",
            url: "SellPort.php",
            data: { "cryptoVal" : selectedCryptoValue, "fiatVal" : selectedFiatValue, "cryptoAmt" : inputCryptoAmount, "fiatAmt" : inputFiatAmount, "portfolioType" : portType}
          }).done(function( msg ) {
            if(msg == 1){
              alert( portType + " Portfolio Updated!" );
              updtLclPrtObj(selectedCryptoValue, selectedFiatValue, inputCryptoAmount, inputFiatAmount, portType, 2);
            }
            else if(msg == 2){
              alert( portType+" Portfolio Updated, But something wrong while executing this operation. Please contact support immediately." );
              updtLclPrtObj(selectedCryptoValue, selectedFiatValue, inputCryptoAmount, inputFiatAmount, portType, 2);
            }
            else if(msg == 3){
              alert( portType + " Portfolio Update Unsuccessful. Please contact support immediately" );
            }
            else {
              alert( msg);
            }
          });
        }

        function updatePortfolio(portType){
          var selectedCryptoValue=document.getElementById("cryptoSelectBoxUpdate").value;
          var selectedFiatValue=document.getElementById("fiatSelectBoxUpdate").value;
          var inputCryptoAmount=document.getElementById("cryptoInputUpdate").value.replace(/,/g, '');
          var inputFiatAmount=document.getElementById("fiatInputUpdate").value.replace(/,/g, '');

          if(isNaN(parseFloat(inputCryptoAmount.replace(/,/g, ''))) || isNaN(parseFloat(inputFiatAmount.replace(/,/g, ''))) || inputCryptoAmount == "" || inputFiatAmount == "") {
            alert( "Please Enter Correct Details" );
            return;
          }
          //console.log(selectedCryptoValue);
          //console.log(selectedFiatValue);
          //console.log(inputCryptoAmount);
          //console.log(inputFiatAmount);
          //console.log(portType);

          $.ajax({
            type: "POST",
            url: "UpdatePort.php",
            data: { "cryptoVal" : selectedCryptoValue, "fiatVal" : selectedFiatValue, "cryptoAmt" : inputCryptoAmount, "fiatAmt" : inputFiatAmount, "portfolioType" : portType}
          }).done(function( msg ) {
            if(msg == 1){
              alert( portType + " Portfolio Updated!" );
              updtLclPrtObj(selectedCryptoValue, selectedFiatValue, inputCryptoAmount, inputFiatAmount, portType, 3);
            }
            else if(msg == 2){
              alert( portType+" Portfolio Updated, But something wrong while executing this operation. Please contact support immediately." );
              updtLclPrtObj(selectedCryptoValue, selectedFiatValue, inputCryptoAmount, inputFiatAmount, portType, 3);
            }
            else if(msg == 3){
              alert( portType + " Portfolio Update Unsuccessful. Please contact support immediately" );
            }
          });
        }

      </script>
      <script src="updtLocalPortObject.js"></script>
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
                    <!-- <script src="dist/js/pages/dashboard.js"></script> -->
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
                                  
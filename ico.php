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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
        <!-- Ionicons -->
        <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.css">
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
        <!-- Moment js for dates -->
        <script src="dist/js/moment.js"></script>
        <script src="icoFill.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
            $(document).ajaxStart(function () {
                Pace.restart();
            });
        </script>
        <script type="text/javascript">
            var globalCryptoValue = "BTC";
            var globalFiatValue = "USD";
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
    function myFunction() {
        console.log("PAGE LOAD COMPLETE");
        loadICOs();
    }
</script>

<body class="hold-transition skin-blue sidebar-mini fixed sidebar-collapse" onload="myFunction()">
    <div id="bodyWrapper" class="wrapper lightsOn">
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
                      echo '"dist/img/signedIn.jpg"';
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
                          echo '"dist/img/signedIn.jpg"';
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
                  <hr style="margin-top: 0px;margin-bottom: 0px;">
<li class="user-footer">
                    <?php
                      if (!isset($_SESSION['userid']) || $_SESSION['userid'] == ''){
                        echo '<div class="pull-left">
                      <a href="pages/login.php" name="signin" class="userLogAction user-buttons btn btn-primary btn-block btn-flat" style="width:100%;background-color:#3c8dbc;color:#fff">Sign In</a>
                      </div>';
                      }
                      else {
                        echo '<div class="pull-left">
                      <a href="profile.php" name="profile" class="userLogAction user-buttons btn btn-default btn-block btn-flat" style="width:84px;background-color:#3c8dbc;color:#fff">My Profile</a>
                      </div>
                      <div class="pull-right">
                      <a href="pages/logout.php" name="signout" class="user-buttons btn btn-default btn-block btn-flat" style="width:84px;background-color:#a93636;color:#fff">Sign out</a>
                      </div>';
                      }
                      ?>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
          <!-- <li class="header">
            <center>MENU</center>
          </li> -->
          <li>
            <a href="index.php">
              <i class="fas fa-home"></i>
              <span>&nbsp;Home</span>
            </a>
          </li>
          <li>
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
          <li class="active">
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
          <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i>
              <span>UI Colors</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="clearfix treeview-menu"><!-- style="color:#8aa4af"-->
              <li style="float:left; width: 33.33333%; padding: 5px;">
                <a href="javascript:void(0)" data-skin="lightsOn" style="display: block; padding-left:5px ;" class="clearfix full-opacity-hover">
                  <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span></div>
                  <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                  <br>
                  <p class="text-center no-margin" style="font-size: 12px">Lights on</p>
                </a>
              </li>
              <li style="float:left; width: 33.33333%; padding: 5px;">
                <a href="javascript:void(0)" data-skin="lightsOff" style="display: block; padding-left:5px ; " class="clearfix full-opacity-hover">
                  <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span></div>
                  <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #000"></span></div>
                  <br>
                  <p class="text-center no-margin" style="font-size: 12px">Lights off</p>
                </a>
              </li>
              <li style="float: left;color: #8aa4af;width: 90%;margin: 0 5% 0 5%;"><hr></li>
              <li style="float:left; width: 33.33333%; padding: 5px;">
                <a href="javascript:void(0)" data-skin="skin-blue" style="display: block; padding-left:5px ; " class="clearfix full-opacity-hover">
                  <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span><span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                  <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                  <br>
                  <p class="text-center no-margin">Blue</p>
                </a>
              </li>
              <li style="float:left; width: 33.33333%; padding: 5px;">
                <a href="javascript:void(0)" data-skin="skin-yellow" style="display: block; padding-left:5px ; " class="clearfix full-opacity-hover">
                  <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span><span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                  <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                  <br>
                  <p class="text-center no-margin">Orange</p>
                </a>
              </li>
              <li style="float:left; width: 33.33333%; padding: 5px;">
                <a href="javascript:void(0)" data-skin="skin-purple" style="display: block; padding-left:5px ; " class="clearfix full-opacity-hover">
                  <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span><span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                  <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                  <br>
                  <p class="text-center no-margin">Purple</p>
                </a>
              </li>
              <li style="float:left; width: 33.33333%; padding: 5px;">
                <a href="javascript:void(0)" data-skin="skin-green" style="display: block; padding-left:5px ; " class="clearfix full-opacity-hover">
                  <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span><span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                  <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                  <br>
                  <p class="text-center no-margin">Green</p>
                </a>
              </li>
              <li style="float:left; width: 33.33333%; padding: 5px;">
                <a href="javascript:void(0)" data-skin="skin-red" style="display: block; padding-left:5px ; " class="clearfix full-opacity-hover">
                  <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span><span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                  <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                  <br>
                  <p class="text-center no-margin">Red</p>
                </a>
              </li>
              <li style="float:left; width: 33.33333%; padding: 5px; display:none">
                <a href="javascript:void(0)" data-skin="skin-black" style="display: block; padding-left:5px ; " class="clearfix full-opacity-hover">
                  <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span></div>
                  <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                  <br>
                  <p class="text-center no-margin">Black</p>
                </a>
              </li>
              <!-- <li style="float: left;color: #8aa4af;width: 90%;margin: 0 5% 0 5%;"><hr></li>
              <li style="float:left; width: 33.33333%; padding: 5px;">
                <a href="javascript:void(0)" data-skin="skin-blue-light" style="display: block; padding-left:5px ; " class="clearfix full-opacity-hover">
                  <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span><span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                  <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                  <br>
                  <p class="text-center no-margin" style="font-size: 12px">Blue Light</p>
                </a>
              </li>
              <li style="float:left; width: 33.33333%; padding: 5px;">
                <a href="javascript:void(0)" data-skin="skin-yellow-light" style="display: block; padding-left:5px ; " class="clearfix full-opacity-hover">
                  <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span><span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                  <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                  <br>
                  <p class="text-center no-margin" style="font-size: 12px">Orange Light</p>
                </a>
              </li>
              <li style="float:left; width: 33.33333%; padding: 5px;">
                <a href="javascript:void(0)" data-skin="skin-purple-light" style="display: block; padding-left:5px ; " class="clearfix full-opacity-hover">
                  <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span><span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                  <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                  <br>
                  <p class="text-center no-margin" style="font-size: 12px">Purple Light</p>
                </a>
              </li>
              <li style="float:left; width: 33.33333%; padding: 5px;">
                <a href="javascript:void(0)" data-skin="skin-green-light" style="display: block; padding-left:5px ; " class="clearfix full-opacity-hover">
                  <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span><span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                  <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                  <br>
                  <p class="text-center no-margin" style="font-size: 12px">Green Light</p>
                </a>
              </li>
              <li style="float:left; width: 33.33333%; padding: 5px;">
                <a href="javascript:void(0)" data-skin="skin-red-light" style="display: block; padding-left:5px ; " class="clearfix full-opacity-hover">
                  <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span><span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                  <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                  <br>
                  <p class="text-center no-margin" style="font-size: 12px">Red Light</p>
                </a>
              </li>
              <li style="float:left; width: 33.33333%; padding: 5px; display:none">
                <a href="javascript:void(0)" data-skin="skin-black-light" style="display: block; padding-left:5px ; " class="clearfix full-opacity-hover">
                  <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span></div>
                  <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                  <br>
                  <p class="text-center no-margin" style="font-size: 12px">Back Light</p>
                </a>
              </li> -->
            </ul>
            <!-- <ul class="treeview-menu">
              <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
              <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
              <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
              <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
            </ul> -->
          </li>
          <li>
            <a href="contact.php">
              <i class="far fa-smile"></i>
              <span>&nbsp;About & Contact</span>
            </a>
          </li>
          <li style="height:100px">
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
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="row">
                <div class="top-price-bar">
                    <div class="top-price-bar-cryptos">
                        <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" alt=⌛ />
                        <span class="top-label"> Bitcoin</span>
                        <br />
                        <span class="top-price">updating&nbsp;
                            <span class="top-pct" style="color: #aaaaaa">--</span>
                        </span>
                    </div>
                    <div class="top-price-bar-cryptos">
                        <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" />
                        <span class="top-label"> Ethereum</span>
                        <br />
                        <span class="top-price">updating&nbsp;
                            <span class="top-pct" style="color: #aaaaaa">--</span>
                        </span>
                    </div>
                    <div class="top-price-bar-cryptos">
                        <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" />
                        <span class="top-label"> Ripple</span>
                        <br />
                        <span class="top-price">updating&nbsp;
                            <span class="top-pct" style="color: #aaaaaa">--</span>
                        </span>
                    </div>
                    <div class="top-price-bar-cryptos">
                        <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" />
                        <span class="top-label"> B Cash</span>
                        <br />
                        <span class="top-price">updating&nbsp;
                            <span class="top-pct" style="color: #aaaaaa">--</span>
                        </span>
                    </div>
                    <div class="top-price-bar-cryptos">
                        <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" />
                        <span class="top-label"> Litecoin</span>
                        <br />
                        <span class="top-price">updating&nbsp;
                            <span class="top-pct" style="color: #aaaaaa">--</span>
                        </span>
                    </div>
                    <div class="top-price-bar-cryptos">
                        <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" />
                        <span class="top-label"> TRON</span>
                        <br />
                        <span class="top-price">updating&nbsp;
                            <span class="top-pct" style="color: #aaaaaa">--</span>
                        </span>
                    </div>
                    <div class="top-price-bar-cryptos">
                        <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" />
                        <span class="top-label"> Dash</span>
                        <br />
                        <span class="top-price">updating&nbsp;
                            <span class="top-pct" style="color: #aaaaaa">--</span>
                        </span>
                    </div>
                    <div class="top-price-bar-cryptos">
                        <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" />
                        <span class="top-label"> B Gold</span>
                        <br />
                        <span class="top-price">updating&nbsp;
                            <span class="top-pct" style="color: #aaaaaa">--</span>
                        </span>
                    </div>
                    <div class="top-price-bar-cryptos">
                        <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" />
                        <span class="top-label"> ZCash</span>
                        <br />
                        <span class="top-price">updating&nbsp;
                            <span class="top-pct" style="color: #aaaaaa">--</span>
                        </span>
                    </div>
                    <div class="top-price-bar-cryptos">
                        <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" />
                        <span class="top-label"> Monero</span>
                        <br />
                        <span class="top-price">updating&nbsp;
                            <span class="top-pct" style="color: #aaaaaa">--</span>
                        </span>
                    </div>
                    <div class="top-price-bar-cryptos">
                        <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" />
                        <span class="top-label"> ETH Classic</span>
                        <br />
                        <span class="top-price">updating&nbsp;
                            <span class="top-pct" style="color: #aaaaaa">--</span>
                        </span>
                    </div>
                    <div class="top-price-bar-cryptos">
                        <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" />
                        <span class="top-label"> IOTA</span>
                        <br />
                        <span class="top-price">updating&nbsp;
                            <span class="top-pct" style="color: #aaaaaa">--</span>
                        </span>
                    </div>
                    <div class="top-price-bar-cryptos">
                        <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" />
                        <span class="top-label"> NXT</span>
                        <br />
                        <span class="top-price">updating&nbsp;
                            <span class="top-pct" style="color: #aaaaaa">--</span>
                        </span>
                    </div>
                    <div class="top-price-bar-cryptos">
                        <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" />
                        <span class="top-label"> EOS</span>
                        <br />
                        <span class="top-price">updating&nbsp;
                            <span class="top-pct" style="color: #aaaaaa">--</span>
                        </span>
                    </div>
                    <div class="top-price-bar-cryptos">
                        <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" />
                        <span class="top-label"> NEO</span>
                        <br />
                        <span class="top-price">updating&nbsp;
                            <span class="top-pct" style="color: #aaaaaa">--</span>
                        </span>
                    </div>
                </div>
            </div>
            <script src="livedatatop.js"></script>
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1 style="text-align:center">
                    ICO List
                    <br>
                    <small>Most comprehensive ICO List</small>
                </h1>
            </section>
            <script type="text/javascript">
                function initChartTypeChange(evt, icoType) {
                    var i, tabcontent, tablinks;
                    tablinks = document.getElementsByClassName("tabChartTyp");
                    document.getElementById("icoUpcomingTable").style.display="none";
                    document.getElementById("icoFinishedTable").style.display="none";
                    document.getElementById("icoLiveTable").style.display="none";
                    document.getElementById(icoType).style.display="";
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    evt.currentTarget.className += " active";
                }
            </script>
            <!-- Main content -->
            <section class="content">
                <!-- row -->
                <div class="row">
                    <div class="chartTypeTabHolder" style="margin-bottom:15px;text-align:center">
                        <div class="chartTypeTab">
                            <button class="tabChartTyp" onclick="initChartTypeChange(event,'icoFinishedTable')">Missed</button>
                            <button class="tabChartTyp active" onclick="initChartTypeChange(event,'icoLiveTable')">Ongoing</button>
                            <button class="tabChartTyp" onclick="initChartTypeChange(event,'icoUpcomingTable')">Upcoming</button>
                        </div>
                    </div>
                    <!-- <div id="newsLoaderHolder">
                        <div class="loader"></div>
                    </div> -->
                    <div id="newsLoaderHolder">
                        <div class="loader"></div>
                    </div>
                    <div class="col-xs-12">
                    <div id="icoHolder" class="box" style="display:none">
                        <div class="box-body table-responsive no-padding">
                        <table class="table table-striped icoTable" id="icoUpcomingTable" style="display:none">
                        <table class="table table-striped icoTable" id="icoFinishedTable" style="display:none">
                        <table class="table table-striped icoTable" id="icoLiveTable">
                            <!-- <tr>
                            <th><div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 col-xl-2">ICO Name</div></th>
                            <th><div class="hidden-sm hidden-xs col-xs-8 col-sm-3 col-md-3 col-lg-3 col-xl-2">Description</div></th>
                            <th><div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 col-xl-2">Time</div></th>
                            <th><div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 col-xl-2">Timeline</div></th>
                            <th><div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 col-xl-2">Details</div></th>
                            </tr> -->
                            <!-- <tr><th></th></tr> -->
                            <tr>
                            <td>
                            
                                <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 col-xl-2 imageIcoHolder">
                                    <img alt="ico logo" class="imageIco" src="https:\/\/icowatchlist.com\/logos\/smrt.png">
                                </div>
                            <!-- </td>
                            <td> -->
                                <div class="hidden-sm hidden-xs col-xs-8 col-sm-3 col-md-3 col-lg-3 col-xl-2">
                                    The Smart Startup Token project is Making Blockchain Accessible to Startups and Small Businesses
                                </div>
                            <!-- </td>
                            <td> -->
                                <div class="col-xs-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 timeIco show-in-small">
                                    <div class="ico-date-holder-small">
                                    <p style="font-size:14px;margin:0px;padding-left:3px">Ends IN:</p>			
                                        <div class="time-unit-div">
                                            <p class="project-time">27</p>
                                            <!-- 2018-04-28 06:35:04am||2018-05-25 13:00:00||2018-05-25 14:00:00||27||6 -->
                                            <p class="small-time">Days</p>
                                        </div>
                                        <div class="time-unit-div">
                                            <p class="project-time">06</p>
                                            <p class="small-time">Hours</p>
                                        </div>
                                        <div class="time-unit-div seconds">
                                            <p class="project-time">24</p>
                                            <p class="small-time">Minutes</p>
                                        </div>
                                    </div>
                                </div>
                            <!-- </td>
                            <td> -->
                                <div class="hidden-xs col-xs-4 col-sm-4 col-md-2 col-lg-3 col-xl-2">
                                    <div class="progress progress-xs progress-striped active progressIco">
                                        <div class="progress-bar progress-bar-primary" style="width: 90%"></div>
                                        <!-- <div style="width: 90%;text-align:center">90%<div> -->
                                    </div>
                                    <p class="progress-percent">90%</p>
                                </div>
                            <!-- </td>
                            <td> -->
                                <div class="detailsIco col-xs-4 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                    <a href="#" class="btn btn-block btn-primary btn-sm">ICO Details</a>
                                </div>
                            
                            </td>
                            
                    </tr>
                        <tr>
                                <td>
                                    <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 col-xl-2 imageIcoHolder">
                                        <img alt="ico logo" class="imageIco" src="https:\/\/icowatchlist.com\/logos\/smrt.png">
                                    </div>
                                <!-- </td>
                                <td> -->
                                    <div class="hidden-sm hidden-xs col-xs-8 col-sm-3 col-md-3 col-lg-3 col-xl-2">
                                        The Smart Startup Token project is Making Blockchain Accessible to Startups and Small Businesses
                                    </div>
                                <!-- </td>
                                <td> -->
                                    <div class="hidden-xs col-xs-4 col-sm-3 col-md-2 col-lg-2 col-xl-2">
                                        From:<br><b>24-5-2018&nbsp;&nbsp;&nbsp;12:00</b><br>To:<br><b>24-5-2018&nbsp;&nbsp;&nbsp;12:00</b>
                                    </div>
                                <!-- </td>
                                <td> -->
                                    <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 col-xl-2 show-in-small">
                                        <div class="ico-date-holder-small">
                                        <p style="font-size:14px;margin:0px;padding-left:3px">STARTS IN:</p>			
                                        <div class="time-unit-div">
                                            <p class="project-time">27</p>
                                            <!-- 2018-04-28 06:35:04am||2018-05-25 13:00:00||2018-05-25 14:00:00||27||6 -->
                                            <p class="small-time">Days</p>
                                        </div>
                                        <div class="time-unit-div">
                                            <p class="project-time">06</p>
                                            <p class="small-time">Hours</p>
                                        </div>
                                        <div class="time-unit-div seconds">
                                            <p class="project-time">24</p>
                                            <p class="small-time">Minutes</p>
                                        </div>
                                        </div>
                                        <!-- <p style="float:left;width:90%;padding-left:5px;">2017-10-24&nbsp;&nbsp;&nbsp;12:00</p> -->
                                    </div>
                                <!-- </td>
                                <td> -->
                                    <div class="detailsIco col-xs-4 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <button type="button" class="btn btn-block btn-primary btn-sm">ICO Details</button>
                                    </div>
                                </td>
                        </tr>
                        <tr>
                                <td>
                                    <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 col-xl-2 imageIcoHolder">
                                        <img alt="ico logo" class="imageIco" src="https:\/\/icowatchlist.com\/logos\/smrt.png">
                                    </div>
                                <!-- </td>
                                <td> -->
                                    <div class="hidden-sm hidden-xs col-xs-8 col-sm-3 col-md-3 col-lg-3 col-xl-2">
                                        The Smart Startup Token project is Making Blockchain Accessible to Startups and Small Businesses
                                    </div>
                                <!-- </td>
                                <td> -->
                                    <div class="hidden-xs col-xs-4 col-sm-3 col-md-2 col-lg-2 col-xl-2">
                                        From:<br><b>24-5-2018&nbsp;&nbsp;&nbsp;12:00</b><br>To:<br><b>24-5-2018&nbsp;&nbsp;&nbsp;12:00</b>
                                    </div>
                                <!-- </td>
                                <td> -->
                                    <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 col-xl-2">
                                        All Time ROI: <b>3,051.57%</b><br>
                                        Ticker: <b>REP</b><br>
                                        USD Price: <b>18.28</b>
                                    </div>
                                <!-- </td>
                                <td> -->
                                    <div class="detailsIco col-xs-4 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <button type="button" class="btn btn-block btn-primary btn-sm">ICO Details</button>
                                    </div>
                                </td>
                        </tr>
                        </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    </div>
                    <!-- column -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- <script src="loadNewsPage.js"></script> -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2018-2019 Yogeshwar Studio.</strong> All rights reserved.
        </footer>
        <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- Slimscroll -->
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <!-- <script src="bower_components/fastclick/lib/fastclick.js"></script> -->
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="dist/js/pages/dashboard.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
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
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
      <link rel="stylesheet" href="dist/css/skins/_all-skins.css">
      <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
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
              <li style="float: left;color: #8aa4af;width: 90%;margin: 0 5% 0 5%;"><hr></li>
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
              </li>
            </ul>
            <!-- <ul class="treeview-menu">
              <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
              <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
              <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
              <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
            </ul> -->
          </li>
          <li>
            <a href="about.php">
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
                        <span style="font-size:18px;color: #3c8dbc">
                           <strong>
                              <_Name_>
                              brings you all the content you need to know about the Crypto World.
                           </strong>
                        </span>
                        <br><span style="font-size:15px"><strong>Whether it is Trading, Predicting, Researching Market, Managing Portfolio and much more!</strong></span>
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
                              All this on One Single Platform - 
                              <_NAME_>
                              !!!
                           </span>
                        </div>
                     </div>
                     <hr>
                     <div class="row">
                     <div class="col-md-6 " style="margin-left:-10px">
                        <span class="AdpageText">Have a <b>Suggestion, Feedback, Complain or want just want to express Gratitue?</b> We would love to hear from you!</span>
                      </div>
                     <div class="col-md-6">
                     <div class="box box-success">
                        <div class="box-header">
                          <i class="fa fa-envelope"></i>

                          <h3 class="box-title" style"text-align:center">Send Feedback</h3>
                          <!-- /. tools -->
                        </div>
                        <div class="box-body">
                          <form action="https://formspree.io/kashyap.kotak@ves.ac.in" method="post">
                            <div class="form-group">
                              <input type="text" class="form-control" name="subject" placeholder="Subject">
                            </div>
                            <div>
                              <textarea class="textarea" placeholder="Message" name="message"
                                        style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                          
                        </div>
                        <div class="box-footer clearfix" style="text-align:center">
                          <button type="submit" class="btn btn-success" id="sendEmail" style="margin:0 auto;width:50%">Send</button>
                        </div>
                      </form>
                      </div>
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
      <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
      <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
      <script src="dist/js/pages/dashboard.js"></script>
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
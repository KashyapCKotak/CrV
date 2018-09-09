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
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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
      <script>
            $(function() {
        $('a[href*=#]').on('click', function(e) {
          e.preventDefault();
          $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
        });
      });
      </script>
      <style> .small-box:hover{text-decoration:none;color:inherit} body,h1{font-family:Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif !important} .particles-js-canvas-el{position:absolute;top:0} canvas{ display: block; vertical-align: bottom; } /* ---- particles.js container ---- */ #particles-js{ background-color: #000; background-image: url("https://images.pexels.com/photos/956999/milky-way-starry-sky-night-sky-star-956999.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"); background-repeat: no-repeat; background-size: cover; background-position: 50% 50%; } /* ---- stats.js ---- */ .count-particles{ background: #000022; position: absolute; top: 48px; left: 0; width: 80px; color: #13E8E9; font-size: .8em; text-align: left; text-indent: 4px; line-height: 14px; padding-bottom: 2px; font-family: Helvetica, Arial, sans-serif; font-weight: bold; } .js-count-particles{ font-size: 1.1em; } #stats, .count-particles{ -webkit-user-select: none; margin-top: 5px; margin-left: 5px; } #stats{ border-radius: 3px 3px 0 0; overflow: hidden; } .count-particles{ border-radius: 0 0 3px 3px; }</style>
      <style>
        section::after {
          position: absolute;
          bottom: 0;
          left: 0;
          content: '';
          width: 100%;
          /* height: 80%; */
        }
        .demo a {
          position: absolute;
          bottom: 0px;
          left: 50%;
          z-index: 2;
          display: inline-block;
          /* -webkit-transform: translate(0, -50%);
          transform: translate(0, -50%); */
          color: #fff;
          font : normal 400 20px/1 'Josefin Sans', sans-serif;
          letter-spacing: .1em;
          text-decoration: none;
          transition: opacity .3s;
        }
        .demo a:hover {
          opacity: .5;
        }
        #section10 a {
          padding-top: 60px;
        }
        #section10 a span {
          position: absolute;
          top: 0;
          left: 50%;
          width: 25px;
          height: 40px;
          margin-left: -15px;
          border: 2px solid #ffffff1c;
          border-radius: 50px;
          box-sizing: border-box;
        }
        #section10 a span::before {
          position: absolute;
          top: 10px;
          left: 50%;
          content: '';
          width: 6px;
          height: 6px;
          margin-left: -3px;
          background-color: #ffffff1c;
          border-radius: 100%;
          -webkit-animation: sdb10 2s infinite;
          animation: sdb10 2s infinite;
          box-sizing: border-box;
        }
        @-webkit-keyframes sdb10 {
          0% {
            -webkit-transform: translate(0, 0);
            opacity: 0;
          }
          40% {
            opacity: 1;
          }
          80% {
            -webkit-transform: translate(0, 15px);
            opacity: 0;
          }
          100% {
            opacity: 0;
          }
        }
        @keyframes sdb10 {
          0% {
            transform: translate(0, 0);
            opacity: 0;
          }
          40% {
            opacity: 1;
          }
          80% {
            transform: translate(0, 15px);
            opacity: 0;
          }
          100% {
            opacity: 0;
          }
        }
      </style>
   </head>
   <script type="text/javascript">
      function loadFunctino() {
        // console.log(document.getElementById("cryptsyb"));
        // console.log(($('#marketsDataTable').is(':visible')));
        // console.log(($('#cryptsyb').is(':visible')));
        console.log("PAGE LOAD COMPLETE");
        // startStream(currSubList);
      }
   </script>
   <body class="hold-transition skin-blue sidebar-mini fixed sidebar-collapse" onload="loadFunctino()">
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
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <script type="text/javascript">
               var globalCryptoValue = "BTC";
               var globalFiatValue = "USD";
            </script>
            <!-- <script src="livedatatop.js"></script> -->
            <section class="content-header homeHeadSect" id="particles-js" style="height: 90vh;">

               <h1 style="text-align:center;top: 25%;position: relative; color:#fff;font-size:60px">
                  <_NAME_><br>
                  <!-- <small style="width: 100%;background: #ffa635;border-radius: 50px;width: 80%;margin: 0 auto;margin-bottom:15px;color: black;height: 26px;padding: 5px;font-weight:400">Know how we deliver value to you...!</small> -->
                  <small style="width: 100%;border-radius: 50px;width: 80%;margin: 0 auto;margin-bottom:15px;color: white;height: 26px;padding: 5px;font-weight:400">Know how we deliver value to you...!</small>
               </h1>
               <!-- <ol class="breadcrumb" style="text-align:center;background: #ffa635;border-radius: 50px;width: 80%;margin: 0 auto">
                  let us make the masses notice you...
                  </ol> -->
              <section id="section10" class="demo">
                <a href="#sectionBody"><span></span><span></span><span></span></a>
              </section>
            </section>
            <!-- Main content -->
            <section class="content" id="sectionBody">
               <!-- Default box -->
               <div class="box" style="border-top-width: 0px;">
                  <!-- <div class="box-header with-border" style="display:none">
                     <h3 class="box-title">Sample Ad Spaces</h3>
                     </div> -->
                  <div class="box-header">
                     <div class="box-title" style="text-align:center;width:100%;margin: 10px 0 10px 0">
                        <span class="sysTitle" style="font-size:18px;text-shadow: none;">
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
                      <div style="text-align:center;margin:30px 35px 0">
                        <h1><b>Features</b><h1>
                      </div>
                      <div class="col-lg-3 col-xs-6 featuresBoxContain">
                        <!-- small box -->
                        <div class="small-box customFeaturesLook">
                          <div class="inner" style="padding-bottom: 0px;">
                            <h4><b>Artificial <br class="hidden-md hidden-lg hidden-sm">Intelligence</b></h4>

                            <p style="margin-bottom: 0px;">based price prediction<br>&nbsp;</p>
                          </div>
                          <div class="icon customIcon">
                            <i class="fas fa-robot"></i>
                          </div>
                          <a href="#" class="small-box-footer" style="padding-top: 2px;">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-xs-6 featuresBoxContain">
                        <!-- small box -->
                        <div class="small-box customFeaturesLook">
                          <div class="inner" style="padding-bottom: 0px;">
                            <h4><b>News/Market <br class="hidden-md hidden-lg hidden-sm">Sentitments</b></h4>

                            <p style="margin-bottom: 0px;">for quick insights<br>&nbsp;</p>
                          </div>
                          <div class="icon customIcon">
                          <i class="fas fa-brain"></i>
                          </div>
                          <a href="#" class="small-box-footer" style="padding-top: 2px;">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-xs-6 featuresBoxContain">
                        <!-- small box -->
                        <div class="small-box customFeaturesLook">
                          <div class="inner" style="padding-bottom: 0px;">
                            <h4><b>Excellent <br class="hidden-md hidden-lg hidden-sm">Dashboard</b></h4>

                            <p style="margin-bottom: 0px;">charts,markets,arbitrage,<br>indicators,etc!</p>
                          </div>
                          <div class="icon customIcon">
                            <i class="fas fa-tachometer-alt"></i>
                          </div>
                          <a href="#" class="small-box-footer" style="padding-top: 2px;">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-xs-6 featuresBoxContain">
                        <!-- small box -->
                        <div class="small-box customFeaturesLook">
                          <div class="inner" style="padding-bottom: 0px;">
                            <h4><b>Personal <span><br class="hidden-md hidden-lg hidden-sm">Porfolio</b></h4>
                            <p style="margin-bottom: 0px;">with any number of<br>currencies!</p>
                          </div>
                          <div class="icon customIcon">
                            <i class="fas fa-chart-line"></i>
                          </div>
                          <a href="#" class="small-box-footer" style="padding-top: 2px;">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-xs-6 featuresBoxContain">
                        <!-- small box -->
                        <div class="small-box customFeaturesLook">
                          <div class="inner" style="padding-bottom: 0px;">
                            <h4><b>Worldwide News</b></h4>

                            <p style="margin-bottom: 0px;">for a global view<br>&nbsp;</p>
                          </div>
                          <div class="icon customIcon">
                            <i class="fas fa-newspaper"></i>
                          </div>
                          <a href="#" class="small-box-footer" style="padding-top: 2px;">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-xs-6 featuresBoxContain">
                        <!-- small box -->
                        <div class="small-box customFeaturesLook">
                          <div class="inner" style="padding-bottom: 0px;">
                            <h4><b>Analysis<br class="hidden-md hidden-lg hidden-sm"><span class="hidden-md hidden-lg hidden-sm">&nbsp;</span></b></h4>

                            <p style="margin-bottom: 0px;">from major sources<br>&nbsp;</p>
                          </div>
                          <div class="icon customIcon">
                            <i class="ion ion-pie-graph"></i>
                          </div>
                          <a href="#" class="small-box-footer" style="padding-top: 2px;">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-xs-6 featuresBoxContain">
                        <!-- small box -->
                        <div class="small-box customFeaturesLook">
                          <div class="inner" style="padding-bottom: 0px;">
                            <h4><b>Exchange</b></h4>

                            <p style="margin-bottom: 0px;">between currencies quickly<br>&nbsp;</p>
                          </div>
                          <div class="icon customIcon">
                            <i class="fas fa-exchange-alt"></i>
                          </div>
                          <a href="#" class="small-box-footer" style="padding-top: 2px;">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-xs-6 featuresBoxContain">
                        <!-- small box -->
                        <div class="small-box customFeaturesLook">
                          <div class="inner" style="padding-bottom: 0px;">
                            <h4><b>ICO List<br class="hidden-md hidden-lg hidden-sm"><span class="hidden-md hidden-lg hidden-sm">&nbsp;</span></b></h4>

                            <p style="margin-bottom: 0px;">view upcoming<br>opportunities</p>
                          </div>
                          <div class="icon customIcon">
                            <i class="fas fa-gem"></i>
                          </div>
                          <a href="#" class="small-box-footer" style="padding-top: 2px;">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                    </div>
                    <hr style="border-color: #fff0;">
                    <div style="text-align:center;margin:-20px 0 45px 0">
                      <h1><b>Here's how you can leverage the most...</b><h1>
                    </div>
                     <div class="row">
                        <div class="col-md-6" style="margin-left:-10px">
                           <span class="AdpageText">View useful insights about what your next actions should be using the <b>Artificial Intelligence</b> advise on the <a href="dashboard.php">Dashboard</a>!</span>
                        </div>
                        <!-- <div class="col-md-6" style="background-image:url('dist/img/about-dashboard-ai.jpg');background-size:100% 100%;height: 350px;margin-right:  5px;background-clip:  content-box;"> -->
                        <div class="col-md-6" style="height: 350px;margin-right:5px;">
                           <img class="shadow" style="width:100%;height:100%" src="dist/img/about-dashboard-ai.jpg"/>
                        </div>
                     </div>
                     <hr class="hrLightsOff">
                     <div class="row">
                        <div class="col-md-6 customadright" style="margin-left:-10px">
                           <span class="AdpageText">Manage your portfolio in the <b>most sophisticated way</b> on the <a href="portfolio.php">Portfolio Tracker</a>!</span>
                        </div>
                        <!-- <div class="col-md-6 customadleft" style="background-image:url('dist/img/icoBig.JPG');background-size:100% 100%;height: 300px;margin-right:  5px;background-clip:  content-box;"> -->
                        <div class="col-md-6 customadleft" style="height: 300px;margin-right: 5px;">
                           <img class="shadow" style="width:100%;height:100%" src="dist/img/icoBig.JPG"/>
                        </div>
                     </div>
                     <hr class="hrLightsOff">
                     <div class="row">
                        <div class="col-md-6 " style="margin-left:-10px">
                           <span class="AdpageText">Get all the important crypto news <b>consolidated from all around the world</b> at the <a href="news.php">News Page</a>. Our AI shows you calculated <b>Sentiment Analysis</b> of the news so that you can get quick insights from an ocean of news!</span>
                        </div>
                        <div class="col-md-6 " style="/*background-image:url('dist/img/aboveMarketsMobile.JPG');*/background-size:100% 100%;height: 300px;margin-right:  5px;background-clip:  content-box;">
                           <img class="shadow" alt="ad loction screenshot" class="customadimage" style="display:block;height:100%;margin:auto" src="dist/img/aboveMarketsMobile.JPG"/>
                        </div>
                     </div>
                     <hr class="hrLightsOff">
                     <div class="row">
                        <div class="col-md-6 customadright" style="margin-left:-10px">
                           <span class="AdpageText">Know about all the past, new & upcoming <b>Initial Coin Offerings</b> at the <a href="ico.php">ICO Tracker</a>!</span>
                        </div>
                        <div class="col-md-6 customadleft" style="/*background-image:url('dist/img/aboveMarketsMobile.JPG');*/background-size:100% 100%;height: 300px;margin-right:  5px;background-clip:  content-box;">
                           <img class="shadow" alt="ad loction screenshot" class="customadimage" style="display:block;height:100%;margin:auto" src="dist/img/newsMobile.JPG"/>
                        </div>
                     </div>
                     <hr class="hrLightsOff">
                     <div class="row">
                        <div class="col-md-6 " style="margin-left:-10px">
                           <span class="AdpageText"><b>Exchange</b> Cryptocurrencies/Fiat Currencies in as convenient as possible way on the <a href="exchange.php">Exchange Page</a>!</span>
                        </div>
                        <div class="col-md-6 " style="/*background-image:url('dist/img/aboveMarketsMobile.JPG');*/background-size:100% 100%;height: 300px;margin-right:  5px;background-clip:  content-box;">
                           <img class="shadow" alt="ad loction screenshot" class="customadimage" style="display:block;height:100%;margin:auto" src="dist/img/aboveMarketsMobile.JPG"/>
                        </div>
                     </div>
                     <hr class="hrLightsOff">
                     <div class="row">
                        <div class="col-md-6 customadright" style="margin-left:-10px">
                           <span class="AdpageText">Access the analysis of Cryptos and Market at the <a href="analytical-articles.php">Analytical Articles Page</a>!</span>
                        </div>
                        <div class="col-md-6 customadleft" style="/*background-image:url('dist/img/aboveMarketsMobile.JPG');*/background-size:100% 100%;height: 300px;margin-right:  5px;background-clip:  content-box;">
                           <img class="shadow" alt="ad loction screenshot" class="customadimage" style="display:block;height:100%;margin:auto" src="dist/img/newsMobile.JPG"/>
                        </div>
                     </div>
                     <hr class="hrLightsOff">
                     <div class="row">
                        <div class="col-md-12" style="text-align:center">
                           <span class="homeFooter" style="font-size: 16px;font-weight: 1000;">
                              Go ahead... Start from the excellent <a href="dashboard.php"><u>Dashboard</u></a>...
                           </span>
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
      <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
      <script>particlesJS("particles-js", {"particles":{"number":{"value":80,"density":{"enable":true,"value_area":800}},"color":{"value":"#ffffff"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":0.5,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":3,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":true,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":6,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"grab"},"onclick":{"enable":true,"mode":"repulse"},"resize":true},"modes":{"grab":{"distance":200,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true});var count_particles, stats, update; count_particles = document.querySelector('.js-count-particles'); update = function() { stats.begin(); stats.end(); if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) { count_particles.innerText = window.pJSDom[0].pJS.particles.array.length; } requestAnimationFrame(update); }; requestAnimationFrame(update);;</script>
   </body>
</html>
<?php
include ($_SERVER['DOCUMENT_ROOT'].'/AdminLTE-2.4.2/pages/dbconnect.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><_Name_> - A Cryptomaster's Profile</title>
  <meta name="description" content="Manage your preferences for the <_Name_> profile. This is useful to unlock the full power of Portfolio management.">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.css">

  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script type="text/javascript">
    function onLoad(){
      if(typeof prsnRootFiat=="undefined"){
        document.getElementById("fiatSelectBox").disabled=true;
      }
      else{
        $("#fiatSelectBox").val(prsnRootFiat);
        $('#fiatSelectBox').trigger('change');
      }
    }
  </script>
</head>
<body class="hold-transition skin-blue sidebar-mini fixed sidebar-collapse" onload="onLoad()">
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
                    echo 'Log In/Sign up';
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
                  <hr style="margin-top: 0px;margin-bottom: 0px;">
<li class="user-footer">
                    <?php
                      if (!isset($_SESSION['userid']) || $_SESSION['userid'] == ''){
                        echo '<div class="pull-left">
                      <a href="pages/login.php" name="signin" class="userLogAction user-buttons btn btn-primary btn-block btn-flat" style="width:100%;background-color:#3c8dbc;color:#fff">Log In/Sign up</a>
                      </div>';
                      }
                      else {
                        echo '<div class="pull-left">
                      <a href="profile.php" name="profile" class="userLogAction user-buttons btn btn-default btn-block btn-flat" style="width:80px;background-color:#3c8dbc;color:#fff;padding-left:10px">My Profile</a>
                      </div>
                      <div style="float:left">
                      <a href="portfolio.php" name="portfolio" class="user-buttons btn btn-default btn-block btn-flat" style="width:86px;background-color:#246224;color:#fff;padding-left:8px;margin:auto;margin-left:6px">My Portfolio</a>
                      </div>
                      <div class="pull-right">
                      <a href="pages/logout.php" name="signout" class="user-buttons btn btn-default btn-block btn-flat" style="width:80px;background-color:#762727;color:#fff">Sign out</a>
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
          <li class="active">
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
    <!-- Content Header (Page header) -->
    <section class="content-header" style="text-align:center">
      <h1 class="col-md-3">
        My Profile
      </h1>
    </section>

    <!-- Main content -->
    <section class="content" style="padding-top:53px">

      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src=
              <?php
                if (!isset($_SESSION['userid']) || $_SESSION['userid'] == ''){
                  echo '"dist/img/notSigned.jpg"';
                }
                else {
                  echo '"'.$_SESSION['cryptoview_userImg'].'"';
                }
              ?>
              alt="User profile picture">

              <h3 class="profile-username text-center">
                <?php
                  if (!isset($_SESSION['userid']) || $_SESSION['userid'] == ''){
                    echo 'Anonymous User';
                  }
                  else {
                    echo $_SESSION['cryptoview_user'];
                  }
                ?>
              </h3>

              <p id="userType" class="text-muted text-center">Golden User</p>

              <ul class="list-group list-group-unbordered">
								<!-- <li class="list-group-item">
                  <b>Rank</b> <a class="pull-right">13,287</a>
                </li> -->
                <li class="list-group-item">
                  <b>Cryptocurrencies<br>Invested</b> <a class="pull-right">
                  <script type="text/javascript">
                    var myPrsnPort = <?php
                    if(isset($_SESSION['prsn_portfolio']) && $_SESSION['prsn_portfolio'] != ''){
                      echo $_SESSION['prsn_portfolio'];
                    }
                    else
                      echo "'NotSet'";
                    ?>;
                    var totPrsnPort=0;
                    if(myPrsnPort!="NotSet"){
                      prsnRootFiat=Object.keys(myPrsnPort)[0];
                      myPrsnPort=myPrsnPort[prsnRootFiat];
                      var cryptosPrsn=[];
                      for(fiatPort in myPrsnPort)
                        for(cryptoPort in myPrsnPort[fiatPort]){
                          if(!cryptosPrsn.includes(cryptoPort))
                            cryptosPrsn.push(cryptoPort);
                        }
                      if(cryptosPrsn.length!=0){
                        loggedIn=true;
                        document.write(cryptosPrsn.length);
                      }
                      else{
                        loggedIn=true;
                        document.write("None yet. Invest!<br>Start Something New!");
                      }
                    }
                    else{
                      loggedIn=false;
                      document.write("Please Login"); 
                    }
                  </script>
                  <!--</?php
                    if(!isset($_SESSION['prsn_portfolio']) || $_SESSION['prsn_portfolio'] == ''){
                      echo "Login again";
                    }
                    else {
                      $portfolioVar=json_decode($_SESSION['prsn_portfolio'],true);
                      $prsnroot=array_keys($portfolioVar);
                      $prsnroot=$prsnroot[0];
                      $prsnroot=$portfolioVar[$prsnroot];
											if(count($prsnroot)>0)
												echo count($prsnroot);
											else
                      	echo "None yet. Invest!<br>Start Something New!";
                    }
                  ?>-->
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Cryptocurrencies<br>Practicing</b> <a class="pull-right">
                  <script>
                    var myPrtcPort = <?php
                    if(isset($_SESSION['prtc_portfolio']) && $_SESSION['prtc_portfolio'] != ''){
                      echo $_SESSION['prtc_portfolio'];
                    }
                    else
                      echo "'NotSet'";
                    ?>;
                    var totPrtcPort=0;
                    if(myPrtcPort!="NotSet"){
                      prtcRootFiat=Object.keys(myPrtcPort)[0];
                      myPrtcPort=myPrtcPort[prtcRootFiat];
                      var cryptosPrtc=[];
                      for(fiatPort in myPrtcPort)
                        for(cryptoPort in myPrtcPort[fiatPort]){
                          if(!cryptosPrtc.includes(cryptoPort))
                            cryptosPrtc.push(cryptoPort);
                        }
                      if(cryptosPrtc.length!=0)
                        document.write(cryptosPrtc.length);
                      else
                        document.write("None yet. Invest!<br>Start Something New!");
                    }
                    else
                     document.write("Please Login"); 
                  </script>
                  <!--</?php
                    if(!isset($_SESSION['prtc_portfolio']) || $_SESSION['prtc_portfolio'] == ''){
                      echo "Login again";
                    }
                    else {
                      $portfolioVar=json_decode($_SESSION['prtc_portfolio'],true);
                      $prtcroot=array_keys($portfolioVar);
                      $prtcroot=$prtcroot[0];
                      $prtcroot=$portfolioVar[$prtcroot];
											if(count($prtcroot)>0)
												echo count($prtcroot);
											else
                      	echo "None yet. Invest!<br>Start Something New!";
                    }
                  ?>--> 
                  </a>
                </li>
              </ul>

              <a href="portfolio.php" class="btn btn-success btn-block"><div style="font-size:17px">Manage Protfolio</div></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <!-- <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Records</h3>
            </div> -->
            <!-- /.box-header -->
            <!-- <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Rank</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div> -->
            <!-- /.box-body -->
          <!-- </div> -->
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#info" data-toggle="tab">Info</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
              <!-- <li><a href="#activity" data-toggle="tab">Activity</a></li>
              <li><a href="#timeline" data-toggle="tab">Timeline</a></li> -->
            </ul>
            <script type="text/javascript">
            function updateBaseCcy(){
              $.ajax({
              type: "POST",
              url: "changeBaseCcy.php",
              data: { "baseCurrency" : document.getElementById("fiatSelectBox").value},
              success: function( msg ) {
                console.log("Done");
                if(msg == 1){
                  alert("Base Currency Updated!" );
                  $("#fiatSelectBox").val(document.getElementById("fiatSelectBox").value);
                  $('#fiatSelectBox').trigger('change');
                }
                else if(msg == 2){
                  alert("Something went wrong and its very serious. Please contact support immediately" );
                  $("#fiatSelectBox").val(document.getElementById("fiatSelectBox").value);
                  $('#fiatSelectBox').trigger('change');
                }
                else if(msg == 3){
                  alert("Base Currency Update Unsuccessful. Please contact support." );
                }
              }
              });
              return false;
            }
            </script>
            <div class="tab-content">
              <div class="tab-pane" id="settings">
                <form class="form-horizontal" action="" method="post">
                  <div class="profile-form-entry">
                    <label for="inputName" class="col-xs-4 col-sm-4 control-label">Base Currency:</label>
                    <div class="col-xs-2 col-sm-8">
                    <select name="baseCurrency" id="fiatSelectBox" class="form-control select2" style="width:auto">
                    <option value="INR">INR</option>
                    <option value="CNY">CNY</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <option value="GBP">GBP</option>
                    <option value="JPY">JPY</option>
                    <option value="RUB">RUB</option>
                    <option value="SGD">SGD</option>
                    <option value="KRW">KRW</option>
                    <option value="PLN">PLN</option>
                    <option value="HUF">HUF</option>
                    <option value="AUD">AUD</option>
                    <option value="CAD">CAD</option>
                    <option value="ZAR">ZAR</option>
                    <option value="SEK">SEK</option>
                    <option value="AED">AED</option>
                    <option value="INR">INR</option>
                    <option value="DKK">DKK</option>
                    <option value="MXN">MXN</option>
                    <option value="RON">RON</option>
                    <option value="CHF">CHF</option>
                    <option value="NOK">NOK</option>
                    <option value="PHP">PHP</option>
                    <option value="HKD">HKD</option>
                    <option value="CZK">CZK</option>
                    <option value="BRL">BRL</option>
                    <option value="VEF">VEF</option>
                    </select>
                    </div>
                  </div>
                  <div class="profile-form-entry">
                    <label for="inputEmail" class="col-xs-4 col-sm-4 control-label">Mail daily updates:</label>
                    <div class="col-xs-4 col-sm-8">
                      <!-- Rounded switch -->
                      <label class="switch">
                        <input name="mail" type="checkbox">
                        <span class="slider round"></span>
                      </label>
                      <span style="padding-top:8px;padding-left:7px;position:absolute">Coming Soon!</span>
                    </div>
                  </div>
                  <div class="profile-form-entry" style="margin-top:80px">
                    <button id="saveButton" name="save" type="button" onclick="updateBaseCcy()" class="col-xs-3 col-sm-2 col-md-1 btn btn-success" style="float:right;margin:0px 15px 0px 5px">Save</button>
                    <button id="resetButton" type="reset" class="col-xs-3 col-sm-2 col-md-1 btn btn-danger" style="float:right;margin:0px 10px 0px 5px">Cancel</button>
                  </div>
                </form>
              </div>
              <script type="text/javascript">
                if(myPrsnPort=="NotSet"){
                  document.getElementById("saveButton").disabled="true";
                  document.getElementById("resetButton").disabled="true";
                }
              </script>
              <!-- /.tab-pane -->
              <div class="active tab-pane" id="info">
                <form class="form-horizontal" action="" method="get">
                  <div class="profile-form-entry">
                    <label for="inputName" class="col-sm-4 control-label" style="font-weight:400">Cryptos Invested:</label>
                    <div class="col-sm-2" style="padding-top:7px;font-weight:650">
                      <script type="text/javascript">
                        var fiatArray=Object.keys(myPrsnPort);
                        if(myPrsnPort=="NotSet"){
                          document.write("Please Login to view");
                          document.getElementById("userType").innerHTML="<a href='login.php'>Login Here</a>";
                          document.getElementById("userType").style.fontSize="20px";
                        }
                        else{
                          document.write(fiatArray);
                        }
                      </script>
                    </div>
                  </div>
                  <div class="profile-form-entry">
                    <label for="inputName" class="col-sm-4 control-label" style="font-weight:400">Fiats used for Investing:</label>
                    <div class="col-sm-2" style="padding-top:7px;font-weight:650">
                      <script type="text/javascript">
                        if(myPrsnPort=="NotSet"){
                          document.write("--");
                        }
                        else{
                          document.write(cryptosPrsn);
                        }
                      </script>
                    </div>
                  </div>
                  <hr style="width:95%">
                  <div class="profile-form-entry">
                    <label for="inputName" class="col-sm-4 control-label" style="font-weight:400">Cryptos Practicing:</label>
                    <div class="col-sm-2" style="padding-top:7px;font-weight:650">
                      <script type="text/javascript">
                        var fiatArray=Object.keys(myPrtcPort);
                        if(myPrtcPort=="NotSet"){
                          document.write("Please Login to view");
                        }
                        else{
                          document.write(fiatArray);
                        }
                      </script>
                    </div>
                  </div>
                  <div class="profile-form-entry">
                    <label for="inputName" class="col-sm-4 control-label" style="font-weight:400">Fiats used for Practicing:</label>
                    <div class="col-sm-2" style="padding-top:7px;font-weight:650">
                      <script type="text/javascript">
                        if(myPrsnPort=="NotSet"){
                          document.write("--");
                        }
                        else{
                          document.write(cryptosPrtc);
                        }
                      </script>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
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
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript">
    $(function () {
      $('.select2').select2()
    })
  </script>
</body>
</html>
<?php
if(isset($_GET['save'])){
  $mail=$_GET['mail'];
  $baseCurr=$_GET['baseCurrency'];
  $prsnPort=json_decode($_SESSION['prsn_portfolio']);
  $prtcPort=json_decode($_SESSION['prtc_portfolio']);
  $userid=$_SESSION['userid'];
  if(!$baseCurr==$prsnroot){
    $prsnPort[$baseCurr]=$prsnPort[$prsnroot];
    $prtcPort[$baseCurr]=$prtcPort[$prtcroot];
    //$sql = "SELECT `userid`, `username`, `prsn_portfolio`, `prtc_portfolio`  FROM `portfolio` WHERE `username` LIKE '$username' AND `password` LIKE '$password'";
    $sql = "UPDATE `portfolio` SET `prsn_portfolio`='$prsnPort' and `prtc_portfolio`='$prtcPort' WHERE `userid`='$userid'";
    $mysqli->query($sql);
    if(($mysqli->affected_rows) > 0 ) {
			if(($mysqli->affected_rows)==1) {
        $_SESSION['prsn_portfolio'] = $prsnPort;
        $_SESSION['prtc_portfolio'] = $prtcPort;
        echo "Personal Preferences Updated!";
			}
			else {
        $_SESSION['prsn_portfolio'] = $prsnPort;
        $_SESSION['prtc_portfolio'] = $prtcPort;
				echo "Personal Preferences Updated, But something unusual happened while executing this operation. Please contact support immediately";
			}
		}
		else {
			echo "Update Unsuccessful";
		}
  }
  else{

  }
}
?>

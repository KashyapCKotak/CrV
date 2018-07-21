<!DOCTYPE html>
<html>
<head>
  <?php
  include ($_SERVER['DOCUMENT_ROOT'].'/AdminLTE-2.4.2/pages/checkLogin.php');
  ?>
  <!-- <script src="mobileConsole.js"></script> -->
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
  <script src="bower_components/Chart.js/Chart.js"></script>
  <script src="pieChartPortfolio.js"></script>
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
                <img id="userImg" src=
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
          
          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <div class="row">
              <div class="top-price-bar">
                <div class="top-price-bar-cryptos">
                  <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> Bitcoin</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> Ethereum</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> Ripple</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> B Cash</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> Litecoin</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> TRON</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> Dash</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> B Gold</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> ZCash</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> Monero</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> ETH Classic</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> IOTA</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> NXT</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> EOS</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
                <div class="top-price-bar-cryptos">
                  <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" /><span class="top-label"> NEO</span><br />
                  <span class="top-price">updating&nbsp;
                    <span class="top-pct" style="color: #aaaaaa">--</span>
                  </span>
                </div>
              </div>
            </div>
            <script src="livedatatop.js"></script>
            <!-- Content Header (Page header) -->
            <script type="text/javascript">
              var buyPrtfRatePrsn=null;
              var sellPrtfRatePrsn=null;
              var updatePrtfRatePrsn=null;
              var buyPrtfRatePrtc=null;
              var sellPrtfRatePrtc=null;
              var updatePrtfRatePrtc=null;
              var initialPrtfRate=null;

              var xhttpFirst = new XMLHttpRequest();
              xhttpFirst.onreadystatechange = function() {
                if (xhttpFirst.readyState == 4 && xhttpFirst.status == 200) {
                  initialPrtfRate = JSON.parse(xhttpFirst.responseText).INR;
                  // console.log(initialPrtfRate);
                  buyPrtfRatePrsn=initialPrtfRate;
                  sellPrtfRatePrsn=initialPrtfRate;
                  updatePrtfRatePrsn=initialPrtfRate;
                  buyPrtfRatePrtc=initialPrtfRate;
                  sellPrtfRatePrtc=initialPrtfRate;
                  updatePrtfRatePrtc=initialPrtfRate;
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



              function selectFiat(which,typ){
                if(which==1){
                  buyFiatValue=document.getElementById("fiatSelectBoxBuy"+typ).value;
                  currentFiatValue=buyFiatValue;
                  updateCurrentRate(which,typ);
                }
                else if (which==2){
                  sellFiatValue=document.getElementById("fiatSelectBoxSell"+typ).value;
                  currentFiatValue=sellFiatValue;
                  updateCurrentRate(which,typ);
                }
                else if (which==3){
                  updateFiatValue=document.getElementById("fiatSelectBoxUpdate"+typ).value;
                  currentFiatValue=updateFiatValue;
                  updateCurrentRate(which,typ);
                }
              }

              function selectCrypto(which,typ){
                if(which==1){
                  var buyCryptoValue=document.getElementById("cryptoSelectBoxBuy"+typ).value;
                  currentCryptoValue=buyCryptoValue;
                  updateCurrentRate(which,typ);
                }
                else if(which==2){
                  var sellCryptoValue=document.getElementById("cryptoSelectBoxSell"+typ).value;
                  currentCryptoValue=sellCryptoValue;
                  updateCurrentRate(which,typ);
                }
                else if(which==3){
                  var updateCryptoValue=document.getElementById("cryptoSelectBoxUpdate"+typ).value;
                  currentCryptoValue=updateCryptoValue;
                  updateCurrentRate(which,typ);
                }
              }

              function updateCurrentRate(which,typ){
                //console.log("updating data");
                //console.log(which);
                var rateUrl="https://min-api.cryptocompare.com/data/price?fsym="+currentCryptoValue+"&tsyms="+currentFiatValue;
                //console.log("URL: ===========================");
                //console.log(rateUrl);
                var xhttpUpdate = new XMLHttpRequest();
                xhttpUpdate.onreadystatechange = function() {
                  if (xhttpUpdate.readyState == 4 && xhttpUpdate.status == 200) {
                    if(typ=="Prsn"){
                      if(which==1){
                        buyPrtfRatePrsn = JSON.parse(xhttpUpdate.responseText)[currentFiatValue];
                        convertToFiat(which,typ);
                      }
                      else if(which==2){
                        sellPrtfRatePrsn = JSON.parse(xhttpUpdate.responseText)[currentFiatValue];
                        convertToFiat(which,typ);
                      }
                      else if(which==3){
                        updatePrtfRatePrsn = JSON.parse(xhttpUpdate.responseText)[currentFiatValue];
                        convertToFiat(which,typ);
                      }
                    }
                    else if(typ=="Prtc"){
                      if(which==1){
                        buyPrtfRatePrtc = JSON.parse(xhttpUpdate.responseText)[currentFiatValue];
                        convertToFiat(which,typ);
                      }
                      else if(which==2){
                        sellPrtfRatePrtc = JSON.parse(xhttpUpdate.responseText)[currentFiatValue];
                        convertToFiat(which,typ);
                      }
                      else if(which==3){
                        updatePrtfRatePrtc = JSON.parse(xhttpUpdate.responseText)[currentFiatValue];
                        convertToFiat(which,typ);
                      }
                    }
                  }
                };
                xhttpUpdate.open("GET", rateUrl, true);
                xhttpUpdate.send();
              }

              function convertToFiat(which,typ){
                var feesInputValue=0;
                //console.log("in convert");
                if(which == 1) {
                  //console.log("buy updating");
                  var cryptoInputToUse="cryptoInputBuy"+typ;
                  var fiatInputToUse="fiatInputBuy"+typ;
                  if(typ=="Prsn")
                    var currentConversionRate=buyPrtfRatePrsn;
                  else if(typ=="Prtc")
                    var currentConversionRate=buyPrtfRatePrtc;
                  var feesInputToUse="feesInputBuy"+typ;
                  var feesApplySign=1;   
                }
                else if(which == 2) {
                  var cryptoInputToUse="cryptoInputSell"+typ;
                  var fiatInputToUse="fiatInputSell"+typ;
                  if(typ=="Prsn")
                    var currentConversionRate=sellPrtfRatePrsn;
                  else if(typ=="Prtc")
                    var currentConversionRate=sellPrtfRatePrtc;
                  var feesInputToUse="feesInputSell"+typ;
                  var feesApplySign=-1;
                }
                else if(which == 3) {
                  var cryptoInputToUse="cryptoInputUpdate"+typ;
                  var fiatInputToUse="fiatInputUpdate"+typ;
                  if(typ=="Prsn")
                    var currentConversionRate=updatePrtfRatePrsn;
                  else if(typ=="Prtc")
                    var currentConversionRate=updatePrtfRatePrtc;
                  feesApplySign=1;
                }

                if(which != 3 && document.getElementById(feesInputToUse).value=="" && document.getElementById(cryptoInputToUse).value!=""){
                  document.getElementById(feesInputToUse).value=0;
                }

                if(which != 3)
                  feesInputValue=parseFloat(document.getElementById(feesInputToUse).value);
                else
                  feesInputValue=parseFloat(0);

                if(isNaN(parseFloat((document.getElementById(cryptoInputToUse).value).replace(/,/g, '')))) {
                  document.getElementById(fiatInputToUse).value="Enter Correct Number!";
                  if(document.getElementById(cryptoInputToUse).value == "")
                    document.getElementById(fiatInputToUse).value="";
                  return;
                }
                //console.log("ahead 2");
                var fiatClaculatedValue=parseFloat((document.getElementById(cryptoInputToUse).value).replace(/,/g, ''))*currentConversionRate;
                var fiatClaculatedValue=fiatClaculatedValue+((fiatClaculatedValue*(parseFloat(feesInputValue))/100)*feesApplySign);

                if(which!=3){
                  document.getElementById(fiatInputToUse).value=fiatClaculatedValue.toLocaleString();
                }
              }

              function convertToCrypto(which,typ){
                var feesInputValue=0;
                if(which == 1) {
                  var cryptoInputToUse="cryptoInputBuy"+typ;
                  var fiatInputToUse="fiatInputBuy"+typ;
                  if(typ=="Prsn")
                    var currentConversionRate=buyPrtfRatePrsn;
                  else if(typ=="Prtc")
                    var currentConversionRate=buyPrtfRatePrtc;
                  var feesInputToUse="feesInputBuy"+typ;
                  var feesApplySign=-1;
                  // feesInputValue=parseFloat(document.getElementById(feesInputToUse).value);

                }
                else if(which == 2) {
                  var cryptoInputToUse="cryptoInputSell"+typ;
                  var fiatInputToUse="fiatInputSell"+typ;
                  if(typ=="Prsn")
                    var currentConversionRate=sellPrtfRatePrsn;
                  else if(typ=="Prtc")
                    var currentConversionRate=sellPrtfRatePrtc;
                  var feesInputToUse="feesInputSell"+typ;
                  var feesApplySign=1;
                  // feesInputValue=parseFloat(document.getElementById(feesInputToUse).value);
                }
                else if(which == 3) {
                  var cryptoInputToUse="cryptoInputUpdate"+typ;
                  var fiatInputToUse="fiatInputUpdate"+typ;
                  if(typ=="Prsn")
                    var currentConversionRate=updatePrtfRatePrsn;
                  else if(typ=="Prtc")
                    var currentConversionRate=updatePrtfRatePrtc;
                  feesApplySign=1;
                  // feesInputValue=0;
                }

                if(which != 3 && document.getElementById(feesInputToUse).value=="" && document.getElementById(fiatInputToUse).value!=""){
                  document.getElementById(feesInputToUse).value=0;
                  console.log("set 0?");
                }

                if(which != 3)
                  feesInputValue=parseFloat(document.getElementById(feesInputToUse).value);
                else
                  feesInputValue=parseFloat(0);

                if(isNaN(parseFloat((document.getElementById(fiatInputToUse).value).replace(/,/g, '')))){
                  document.getElementById(cryptoInputToUse).value="Enter Correct Number!";
                  if(document.getElementById(fiatInputToUse).value == "")
                    document.getElementById(cryptoInputToUse).value="";
                  return;
                }

                var fiatInputValueToClac=parseFloat((document.getElementById(fiatInputToUse).value).replace(/,/g, ''));
                var fiatInputValueToClac=fiatInputValueToClac+((fiatInputValueToClac*(parseFloat(feesInputValue))/100)*feesApplySign);
                var cryptoCalculatedValue=fiatInputValueToClac/currentConversionRate;

                if(which!=3){
                  document.getElementById(cryptoInputToUse).value=cryptoCalculatedValue.toLocaleString();
                }
              }
              //////////////////////////////////////////////////////////////////////////
              function openTabPrsn(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("BuySellTabContentPrsn");
                for (i = 0; i < tabcontent.length; i++) {
                  tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinksPrsn");
                for (i = 0; i < tablinks.length; i++) {
                  tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "inline-block";
                evt.currentTarget.className += " active";
              }
              function openTabPrtc(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("BuySellTabContentPrtc");
                for (i = 0; i < tabcontent.length; i++) {
                  tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinksPrtc");
                for (i = 0; i < tablinks.length; i++) {
                  tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "inline-block";
                evt.currentTarget.className += " active";
              }
              /////////////////////////////////////////////////////////////////////////
              
              function redrawPie(whichInit){
                console.log("REEEEEDRWAAAAAN");
              }

            </script>           
            <!-- Main content -->

            <section class="content" style="padding-left:5px;padding-right:5px;">
              <div class="row box" style="width:100%;margin-left:0px;margin-right:0px;height:auto">
                <!-- <div class="col-md-6"> -->
                  <!-- Custom Tabs -->
                  <div class="nav-tabs-custom" style="margin:0">
                    <ul class="nav nav-tabs">
                      <li class="active portfolioTab"><a id="portTab1" tabindex="0" href="#tab_1" data-toggle="tab">Personal Portfolio</a></li>
                      <li class="portfolioTab"><a id="portTab2" tabindex="0" href="#tab_2" data-toggle="tab">Practice Portfolio</a></li>
                      <li class="portfolioTab" style="display:none;pointer-events:none"><a id="portTab3" tabindex="0" href="#tab_3" data-toggle="tab">Practice Portfolio</a></li>
                    </ul>
                    <script type="text/javascript">
                    var maxTime = 2000; // 2 seconds
                    var time = 0;
                    function prsnPortVisible(){
                      var interval = setInterval(function () {
                        if($('#portfolioTablePersonal').is(':visible')) {
                            console.log("visible now");
                            drawPie(invstListForPiePrsn,1);
                            clearInterval(interval);
                          } else {
                            if (time > maxTime) {
                              // still hidden, after 2 seconds, stop checking
                              clearInterval(interval);
                              return;
                            }
                            // not visible yet, do something
                            time += 100;
                          }
                        }, 200);
                    }
                    function prtcPortVisible(){
                      var interval = setInterval(function () {
                        if($('#portfolioTablePractice').is(':visible')) {
                          console.log("visible now");
                          drawPie(invstListForPiePrtc,2);
                          clearInterval(interval);
                        } else {
                          if (time > maxTime) {
                            // still hidden, after 2 seconds, stop checking
                            clearInterval(interval);
                            return;
                          }
                          // not visible yet, do something
                          time += 100;
                        }
                      }, 200);
                    }
                    $("#portTab1").focusin(function() {
                      console.log("REEEEEDRWAAAAAN");
                      //drawPie(invstListForPiePrsn,1);
                      prsnPortVisible();
                    });
                    $("#portTab2").focusin(function() {
                      console.log("REEEEEDRWAAAAAN");
                      //drawPie(invstListForPiePrtc,2);
                      prtcPortVisible();
                    });
                    $("#portTab1").focusout(function() {
                      //drawPie(invstListForPiePrtc,2);
                    });
                    $("#portTab2").focusout(function() {
                      //drawPie(invstListForPiePrtc,2);
                    });
                    </script>
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab_1">

                        <div class="row col-md-6" style="margin: 0; padding: 0">
                          <div id="portfolioTablePersonal" class="box-body">

                          </div>
                          <div>
                            <div class="box-header with-border" style="text-align: center;">
                              <h3 class="box-title">Investment Distribution</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body" style="height=50vh">
                              <div class="row">
                                <div class="col-md-8">
                                  <div class="chart-responsive1">
                                    <canvas id="1pieChart" height="150"></canvas>
                                  </div>
                                  <!-- ./chart-responsive -->
                                </div>
                                <!-- /.col -->
                                <div id="piePortfolio1" class="col-md-4"></div>
                                <!-- /.col -->
                              </div>
                              <!-- /.row -->
                            </div>
                            <!-- /.box-body -->
                            </div>
                            <!-- /.col -->
                            <script src="PortfolioFill3.php"></script>
                            <script>
                              triggerLoadTableAndUrl(1);
                            </script>
                            </div>
                            <!-- /.row -->
                            <!-- //////////////////////////////////////////////////////// -->
                            <div class="BuySellTabHolder col-md-6">
                              <div class="BuySellTab">
                                <button class="tablinksPrsn active" onclick="openTabPrsn(event, 'BuyTabPrsn')">Buy</button>
                                <button class="tablinksPrsn" onclick="openTabPrsn(event, 'SellTabPrsn')">Sell</button>
                                <button class="tablinksPrsn" onclick="openTabPrsn(event, 'UpdateTabPrsn')">Update</button>
                              </div>
                              <br>
                              <div id="BuyTabPrsn" class="BuySellTabContentPrsn" style="display: inline-block;">
                                <br>
                                <div class="crypto-select" style="display: inline-block; float: left;">
                                  <label class="label-enable" style="width: 108px;display: inline-block;text-align: left;">Crypto Currency: </label>
                                  <select id="cryptoSelectBoxBuyPrsn" class="form-control select2" style="width:157px" onchange="selectCrypto(1,'Prsn')">
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
                                  <select id="fiatSelectBoxBuyPrsn" class="form-control select2" style="width:auto" onchange="selectFiat(1,'Prsn')">
                                    <option class="default-fiat" selected="selected">INR</option>
                                    <option>USD</option>
                                    <option>EUR</option>
                                    <option>JPY</option>
                                    <option>CNY</option>
                                  </select>
                                </div>
                                <br>
                                <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                                  <input id="cryptoInputBuyPrsn" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToFiat(1,'Prsn')" required>
                                  <!-- <span class="highlight"></span> -->
                                  <span class="bar_convert" style="width: 100%"></span>
                                  <label class="label_convert" style="font-size: 15px; left: 0">Crypto Currency</label>
                                  <button class="label_convert" style="font-size: 15px; width: auto; text-align: right; border: none; background-color: #3c8dbc; color: #fff; border-radius: 10px; left: auto; right: 0; pointer-events: auto;">See All</button>
                                </div>
                                <br>
                                <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                                  <input id ="feesInputBuyPrsn" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToFiat(1,'Prsn')" required>
                                  <!-- <span class="highlight"></span> -->
                                  <span class="bar_convert" style="width: 100%"></span>
                                  <label class="label_convert" style="font-size: 15px;left: 0">Fees (%)</label>
                                </div>
                                <br>
                                <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                                  <input id ="fiatInputBuyPrsn" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToCrypto(1,'Prsn')" required>
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
                              <div id="SellTabPrsn" class="BuySellTabContentPrsn" style="display: none;">
                                <br>
                                <div class="crypto-select" style="display: inline-block; float: left;">
                                  <label class="label-enable" style="width: 108px;display: inline-block;text-align: left;">Crypto Currency: </label>
                                  <select id="cryptoSelectBoxSellPrsn" class="form-control select2" style="width:157px" onchange="selectCrypto(2,'Prsn')">
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
                                  <select id="fiatSelectBoxSellPrsn" class="form-control select2" style="width:auto" onchange="selectFiat(2,'Prsn')">
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
                                  <input id="cryptoInputSellPrsn" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToFiat(2,'Prsn')" required>
                                  <!-- <span class="highlight"></span> -->
                                  <span class="bar_convert" style="width: 100%"></span>
                                  <label class="label_convert" style="font-size: 15px; left: 0">Crypto Currency</label>
                                  <button  class="label_convert" style="font-size: 15px; width: auto; text-align: right; border: none; background-color: #3c8dbc; color: #fff; border-radius: 10px; left: auto; right: 0; pointer-events: auto;">See All</button>
                                </div>
                                <br>
                                <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                                  <input id ="feesInputSellPrsn" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToFiat(2,'Prsn')" required>
                                  <!-- <span class="highlight"></span> -->
                                  <span class="bar_convert" style="width: 100%"></span>
                                  <label class="label_convert" style="font-size: 15px;left: 0">Fees (%)</label>
                                </div>
                                <br>
                                <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                                  <input id ="fiatInputSellPrsn" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToCrypto(2,'Prsn')" required>
                                  <!-- <span class="highlight"></span> -->
                                  <span class="bar_convert" style="width: 100%"></span>
                                  <label class="label_convert" style="font-size: 15px;left: 0">Fiat Value</label>
                                </div>
                                <br>
                                <br>
                                <button onclick='sellPortfolio("Personal")' style="font-size: 17px; padding: 14px 16px; width: auto; text-align: right; border: none; background-color: #3c8dbc; color: #fff; border-radius: 15px; left: auto; right: 0; pointer-events: auto;">Update</button>
                              </div>
                              <!-- ////////////////////////////// -->
                              <div id="UpdateTabPrsn" class="BuySellTabContentPrsn" style="display: none;">
                                <br>
                                <div class="crypto-select" style="display: inline-block; float: left;">
                                  <label class="label-enable" style="width: 108px;display: inline-block;text-align: left;">Crypto Currency: </label>
                                  <select id="cryptoSelectBoxUpdatePrsn" class="form-control select2" style="width:157px" onchange="selectCrypto(3,'Prsn')">
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
                                  <select id="fiatSelectBoxUpdatePrsn" class="form-control select2" style="width:auto" onchange="selectFiat(3,'Prsn')">
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
                                  <input id="cryptoInputUpdatePrsn" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToFiat(3,'Prsn')" required>
                                  <!-- <span class="highlight"></span> -->
                                  <span class="bar_convert" style="width: 100%"></span>
                                  <label class="label_convert" style="font-size: 15px; left: 0">Crypto Amount</label>
                                  <!-- <button class="label_convert" style="font-size: 15px; width: auto; text-align: right; border: none; background-color: #3c8dbc; color: #fff; border-radius: 10px; left: auto; right: 0; pointer-events: auto;">See All</button> -->
                                </div>
                                <br>
                                <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                                  <input id ="fiatInputUpdatePrsn" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToCrypto(3,'Prsn')" required>
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
                          </div>
                          <!-- ////////////// TAB 1 End ///////////////.tab-pane -->
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
                          <div class="tab-pane" id="tab_2">

                            <div class="row col-md-6" style="margin: 0; padding: 0">
                              <div id="portfolioTablePractice" class="box-body">
                                <!-- <script src="PortfolioFill2.php"></script> -->
                              </div>
                                <div>
                                  <div class="box-header with-border" style="text-align: center;">
                                    <h3 class="box-title">Investment Distribution</h3>
                                  </div>
                                  <!-- /.box-header -->
                                  <div class="box-body" style="height=50vh">
                                    <div class="row">
                                      <div class="col-md-8">
                                        <div class="chart-responsive2">
                                          <canvas id="2pieChart" height="150"></canvas>
                                        </div>
                                        <!-- ./chart-responsive -->
                                      </div>
                                      <!-- /.col -->
                                      <div id="piePortfolio2" class="col-md-4"></div>
                                      <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                  </div>
                                  <!-- /.box-body -->
                                </div>
                                <!-- /.col -->
                                <script>
                                  triggerLoadTableAndUrl(2);
                                </script>
                            </div>
                            <!-- //////////////////////////////////////////////////////// -->
                            <div class="BuySellTabHolder col-md-6">
                              <div class="BuySellTab">
                                <button class="tablinksPrtc active" onclick="openTabPrtc(event, 'BuyTabPrtc')">Buy</button>
                                <button class="tablinksPrtc" onclick="openTabPrtc(event, 'SellTabPrtc')">Sell</button>
                                <button class="tablinksPrtc" onclick="openTabPrtc(event, 'UpdateTabPrtc')">Update</button>
                              </div>
                              <br>
                              <div id="BuyTabPrtc" class="BuySellTabContentPrtc" style="display: inline-block;">
                                <br>
                                <div class="crypto-select" style="display: inline-block; float: left;">
                                  <label class="label-enable" style="width: 108px;display: inline-block;text-align: left;">Crypto Currency: </label>
                                  <select id="cryptoSelectBoxBuyPrtc" class="form-control select2" style="width:157px" onchange="selectCrypto(1,'Prtc')">
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
                                  <select id="fiatSelectBoxBuyPrtc" class="form-control select2" style="width:auto" onchange="selectFiat(1,'Prtc')">
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
                                  <input id="cryptoInputBuyPrtc" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToFiat(1,'Prtc')" required>
                                  <!-- <span class="highlight"></span> -->
                                  <span class="bar_convert" style="width: 100%"></span>
                                  <label class="label_convert" style="font-size: 15px; left: 0">Crypto Currency</label>
                                  <button class="label_convert" style="font-size: 15px; width: auto; text-align: right; border: none; background-color: #3c8dbc; color: #fff; border-radius: 10px; left: auto; right: 0; pointer-events: auto;">See All</button>
                                </div>
                                <br>
                                <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                                  <input id ="feesInputBuyPrtc" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToFiat(1,'Prtc')" required>
                                  <!-- <span class="highlight"></span> -->
                                  <span class="bar_convert" style="width: 100%"></span>
                                  <label class="label_convert" style="font-size: 15px;left: 0">Fees (%)</label>
                                </div>
                                <br>
                                <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                                  <input id ="fiatInputBuyPrtc" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToCrypto(1,'Prtc')" required>
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
                              <div id="SellTabPrtc" class="BuySellTabContentPrtc"  style="display: none;">
                                <br>
                                <div class="crypto-select" style="display: inline-block; float: left;">
                                  <label class="label-enable" style="width: 108px;display: inline-block;text-align: left;">Crypto Currency: </label>
                                  <select id="cryptoSelectBoxSellPrtc" class="form-control select2" style="width:157px" onchange="selectCrypto(2,'Prtc')">
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
                                  <select id="fiatSelectBoxSellPrtc" class="form-control select2" style="width:auto" onchange="selectFiat(2,'Prtc')">
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
                                  <input id="cryptoInputSellPrtc" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToFiat(2,'Prtc')" required>
                                  <!-- <span class="highlight"></span> -->
                                  <span class="bar_convert" style="width: 100%"></span>
                                  <label class="label_convert" style="font-size: 15px; left: 0">Crypto Currency</label>
                                  <button  class="label_convert" style="font-size: 15px; width: auto; text-align: right; border: none; background-color: #3c8dbc; color: #fff; border-radius: 10px; left: auto; right: 0; pointer-events: auto;">See All</button>
                                </div>
                                <br>
                                <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                                  <input id ="feesInputSellPrtc" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToFiat(2,'Prtc')" required>
                                  <!-- <span class="highlight"></span> -->
                                  <span class="bar_convert" style="width: 100%"></span>
                                  <label class="label_convert" style="font-size: 15px;left: 0">Fees (%)</label>
                                </div>
                                <br>
                                <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                                  <input id ="fiatInputSellPrtc" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToCrypto(2,'Prtc')" required>
                                  <!-- <span class="highlight"></span> -->
                                  <span class="bar_convert" style="width: 100%"></span>
                                  <label class="label_convert" style="font-size: 15px;left: 0">Fiat Value</label>
                                </div>
                                <br>
                                <br>
                                <button onclick='sellPortfolio("Practice")' style="font-size: 17px; padding: 14px 16px; width: auto; text-align: right; border: none; background-color: #3c8dbc; color: #fff; border-radius: 15px; left: auto; right: 0; pointer-events: auto;">Update</button>
                              </div>
                              <!-- ////////////////////////////// -->
                              <div id="UpdateTabPrtc" class="BuySellTabContentPrtc"  style="display: none;">
                                <br>
                                <div class="crypto-select" style="display: inline-block; float: left;">
                                  <label class="label-enable" style="width: 108px;display: inline-block;text-align: left;">Crypto Currency: </label>
                                  <select id="cryptoSelectBoxUpdatePrtc" class="form-control select2" style="width:157px" onchange="selectCrypto(3,'Prtc')">
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
                                  <select id="fiatSelectBoxUpdatePrtc" class="form-control select2" style="width:auto" onchange="selectFiat(3,'Prtc')">
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
                                  <input id="cryptoInputUpdatePrtc" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToFiat(3,'Prtc')" required>
                                  <!-- <span class="highlight"></span> -->
                                  <span class="bar_convert" style="width: 100%"></span>
                                  <label class="label_convert" style="font-size: 15px; left: 0">Crypto Amount</label>
                                  <!-- <button class="label_convert" style="font-size: 15px; width: auto; text-align: right; border: none; background-color: #3c8dbc; color: #fff; border-radius: 10px; left: auto; right: 0; pointer-events: auto;">See All</button> -->
                                </div>
                                <br>
                                <div class="group_convert claculatorComponents" style=" margin-bottom: 0; width: 100%; padding: 0">      
                                  <input id ="fiatInputUpdatePrtc" class="input_convert" style="font-size: 15px; width: 100%" type="text" oninput="convertToCrypto(3,'Prtc')" required>
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
                          <!-- ////////////////////////////////////////////////////// -->
                          <!-- ////////////////////////////////////////////////////// -->
                          <!-- ////////////////////////////////////////////////////// -->
                          <!-- ////////////////////////////////////////////////////// -->
                          <!-- ////////////////////////////////////////////////////// -->
                          <!-- ////////////////////////////////////////////////////// -->
                          <div class="tab-pane active" id="tab_3" style="text-align:center">
                            <span style="margin: 20vh 10px 85vh 10px;display:inline-block;font-size:15px;">Please <a href="pages/login.php">login</a> to unlock the most comprehensive system to track your funds and cryptos!!<br>Go ahead, we won't charge you for this...</span>
                          </div>
                            <!-- ////////////////////////////////////////////////////// -->
                            <!-- ////////////////////////////////////////////////////// -->
                            <!-- ////////////////////////////////////////////////////// -->
                            <!-- ////////////////////////////////////////////////////// -->
                            <!-- ////////////////////////////////////////////////////// -->
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
          if(portType=="Personal")
            var domToSelectSuffix="Prsn";
          else if(portType=="Practice")
            var domToSelectSuffix="Prtc";
          var selectedCryptoValue=document.getElementById("cryptoSelectBoxBuy"+domToSelectSuffix).value;
          var selectedFiatValue=document.getElementById("fiatSelectBoxBuy"+domToSelectSuffix).value;
          var inputCryptoAmount=document.getElementById("cryptoInputBuy"+domToSelectSuffix).value.replace(/,/g, '');
          var inputFiatAmount=document.getElementById("fiatInputBuy"+domToSelectSuffix).value.replace(/,/g, '');

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

          if(portType=="Personal")
            var domToSelectSuffix="Prsn";
          else if(portType=="Practice")
            var domToSelectSuffix="Prtc";
          var selectedCryptoValue=document.getElementById("cryptoSelectBoxSell"+domToSelectSuffix).value;
          var selectedFiatValue=document.getElementById("fiatSelectBoxSell"+domToSelectSuffix).value;
          var inputCryptoAmount=document.getElementById("cryptoInputSell"+domToSelectSuffix).value.replace(/,/g, '');
          var inputFiatAmount=document.getElementById("fiatInputSell"+domToSelectSuffix).value.replace(/,/g, '');

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
          if(portType=="Personal")
            var domToSelectSuffix="Prsn";
          else if(portType=="Practice")
            var domToSelectSuffix="Prtc";
          var selectedCryptoValue=document.getElementById("cryptoSelectBoxUpdate"+domToSelectSuffix).value;
          var selectedFiatValue=document.getElementById("fiatSelectBoxUpdate"+domToSelectSuffix).value;
          var inputCryptoAmount=document.getElementById("cryptoInputUpdate"+domToSelectSuffix).value.replace(/,/g, '');
          var inputFiatAmount=document.getElementById("fiatInputUpdate"+domToSelectSuffix).value.replace(/,/g, '');

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

            

                    <!-- Pie Chart -->
                    
                    <!-- Pie Chart Data -->
                    
                    

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
                    <script type="text/javascript">
                      // drawPie(myPortfolioPrsn,1);
                      // drawPie(myPortfolioPrtc,2);
                    </script>
                    <!-- Select2 -->
                    <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
                    <script type="text/javascript">
                      console.log("checking");
                      let userImg=document.getElementById("userImg").src;
                      console.log(userImg);
                      if(userImg.indexOf("notSigned")!=-1){
                        document.getElementById("portTab3").click();
                        document.getElementById("portTab1").style.pointerEvents="none";
                        document.getElementById("portTab2").style.pointerEvents="none";
                      }
                    </script>
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
                                  
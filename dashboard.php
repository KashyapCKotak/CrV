<!DOCTYPE html>
<html>

<head>
  <?php
    session_start();
    $marketSent=file_get_contents("finalMarketSentiment.txt");
  ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><__> - Bitcoin/Altcoins Prices, Prediction, News and more!!</title>
    <meta name="description" content="Price, Historic Graph, Artificail Intelligence prediction, Indicators, Markets, Arbitrage, Exchange, Trends & Discuss! All in one place!">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- jQuery 3 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css"><!-- IMP : too many custom changes. don't use CDN-->
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.css">
    <!-- Data Tables -->
    <!-- <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> -->
    <!-- socket.io -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.23.0/polyfill.min.js"></script>
    <script defer src="https://unpkg.com/technicalindicators@1.1.13/dist/browser.js"></script>
    <!-- <script src="select2.multi-checkboxes.js"></script> -->
    <script type="text/javascript">
        //console.log("Start Scripts Start");
      </script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.2/socket.io.js"></script>
    <script defer src="ccc-streamer-utilities.js"></script>
    <script defer src="stream.js"></script>
    <script defer src="MarketsTableFill_2.js" onload="onStreamLoad()"></script>
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous"> -->
    <script async defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonymous"></script>
    <!-- Bootstrap 3.3.7 -->
    <script async defer src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="coinData.js"></script>
    <!-- Morris chart -->

    <!-- jvectormap -->

    <!-- Date Picker -->

    <!-- Daterange picker -->

    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->

    <!--GOOGLE TRANSLATE-->
    <!-- <script>
      $.widget.bridge('uibutton', $.ui.button);
      $(document).ajaxStart(function () {
        Pace.restart();
      });
      function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
      }
    </script> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script type="text/javascript">
      function onStreamLoad(){
        getMarketData();
      }
      function onSelect2Load(){
        $('.select2').select2();
      }
      function onChartsLoad(){
        drawMainChart();
      }
      function onLoadPage() {
        console.log("PAGE LOAD COMPLETE!");

        document.getElementById("buysellButton").innerHTML="<link rel=\"stylesheet\" href=\"https://changelly.com/widget.css\"/> <a id=\"changellyButton\" href=\"https://changelly.com/widget/v1?auth=email&from=USD&to=BTC&merchant_id=8d450131fbb6&address=&amount=999&ref_id=8d450131fbb6&color=00cf70\" target=\"_blank\"> <img alt=\"Buy/Sell Now\" src=\"dist/img/pay_button.png\" style=\"height:40px;margin-top:14px\"/> </a> <div id=\"changellyModal\" style=\"display:none\"> <div class=\"changellyModal-content\"> <span class=\"changellyModal-close\">x</span> <iframe src=\"https://changelly.com/widget/v1?auth=email&from=USD&to=BTC&merchant_id=8d450131fbb6&address=&amount=999&ref_id=8d450131fbb6&color=00cf70\" width=\"600\" height=\"500\" class=\"changelly\" scrolling=\"no\" style=\"overflow-y: hidden; border: none\" > Can't load widget </iframe> </div></div>";
        var changellyModal = document.getElementById('changellyModal');
        var changellyButton = document.getElementById('changellyButton');
        var changellyCloseButton = document.getElementsByClassName('changellyModal-close')[0];
        changellyCloseButton.onclick = function() { 
          changellyModal.style.display = 'none';
        };
        changellyButton.onclick = function widgetClick(e) {
          e.preventDefault(); changellyModal.style.display = 'block';
        };
        let indicatorOptions='<option value="none">No Indicator</option>'+
                '<option value="macd">MACD (Moving Average Convergence Divergence)</option>'+
                '<option value="rsi">RSI (Relative Strength Index)</option>'+
                '<option value="ao">AO (Awesome Oscillator)</option>'+
                '<option value="so">STOCH (Stochastic Oscillators)</option>'+
                '<option value="adx">ADX (Average Directional Index)</option>'+
                '<option value="mfi">MFI (Money Flow Index)</option>'+
                '<option value="trix">TRIX (Triple Exponential Average)</option>'+
                '<option value="bollinger">Bollinger Bands</option>'+
                '<option value="sma25">SMA 25 (Simple Moving Average-25)</option>'+
                '<option value="sma50">SMA 50 (Simple Moving Average-50)</option>'+
                '<option value="sma100">SMA 100 (Simple Moving Average-100)</option>'+
                '<option value="sma200">SMA 200 (Simple Moving Average-200)</option>'+
                '<option value="adl">ADL (Accumulation Distribution Line)</option>'+
                '<option value="atr">ATR (Average True Range)</option>'+
                '<option value="cci">CCI (Commodity Change Index)</option>'+
                '<option value="FI1">FI 1 (Force Index-1 Day)</option>'+
                '<option value="FI13">FI 13 (Force Index-13 Day)</option>';
        document.getElementById("chartIndiSelect1").innerHTML=indicatorOptions;
        document.getElementById("chartIndiSelect2").innerHTML=indicatorOptions;
      }
    </script>
</head>

<body class="hold-transition skin-blue sidebar-mini fixed sidebar-collapse" onload="onLoadPage()">
  <div id="bodyWrapper" class="wrapper lightsOn">
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
                  <hr style="
                      margin-top: 0px;
                      margin-bottom: 0px;
                  ">
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
              <!-- Control Sidebar Toggle Button -->
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
              <i class="fas fa-palette"></i>
              <span>&nbsp;Customise Theme</span>
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
          </li>
          <li>
            <a href="contact.php">
              <i class="far fa-smile"></i>
              <span>&nbsp;About & Contact</span>
            </a>
          </li>
          <li>
            <a>
              <span>&nbsp;<div id="google_translate_element"></div></span>
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
            <img alt="price direction" class="top-image" src="dist/img/unavailable.png" alt=⌛ />
            <span class="top-label"> Bitcoin</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img alt="price direction" class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> Ethereum</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img alt="price direction" class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> Ripple</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img alt="price direction" class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> B Cash</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img alt="price direction" class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> Litecoin</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img alt="price direction" class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> TRON</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img alt="price direction" class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> Dash</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img alt="price direction" class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> B Gold</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div alt="price direction" class="top-price-bar-cryptos">
            <img alt="price direction image" class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> ZCash</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img alt="price direction" class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> Monero</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img alt="price direction" class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> ETH Classic</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img alt="price direction" class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> IOTA</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img alt="price direction" class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> NXT</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img alt="price direction" class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> EOS</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img alt="price direction" class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> NEO</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
        </div>
      </div>
      <div id="marketSentiment" style="display:none"><?php echo $marketSent;?></div>
      <!-- <script src="livedatatop.js"></script> -->
      <!-- Content Header (Page header) -->
      <script type="text/javascript">
        twitterLoaded=false;
        twitterWidgetTheme="light";
        twitterLinksColor="#2B7BB9";
        var globalCryptoValue = "BTC";
        var globalFiatValue = "USD";
        arbDisplayed=false;
        firstSltd=false;
        secondSltd=false;
      </script>
      
      <script type="text/javascript">
        //console.log("Start Scripts End");
      </script>
      <section class="content-header custom-content-header">
        <div class="crypto-select">
          <label class="label-enable">Crypto Currency: </label>
          <select id="cryptoSelectBox" class="form-control select2" style="width:140px;display:inline" onchange="selectCrypto()">
            <option id="default-fiat" selected="selected" value="BTC">Bitcoin (BTC)</option>
            <option value="ETH">Ethereum (ETH)</option>
            <option value="XRP">Ripple (XRP)</option>
            <option value="BCH">Bitcoin Cash (BCH)</option>
            
          </select>
        </div>
        <div class="fiat-select">
          <label class="label-enable">Fiat Currency: </label>
          <select id="fiatSelectBox" class="form-control select2" style="width:140px;display:inline" onchange="selectFiat()">
            <option id="default-fiat" selected="selected">USD</option>
            <option>RUB</option>
            <option>GBP</option>
            <option>EUR</option>
            <option>INR</option>
            <option>JPY</option>
            <option>CNY</option>
            <option>SGD</option>
            <option>KRW</option>
            <option>PLN</option>
            <option>HUF</option>
            <option>AUD</option>
            <option>CAD</option>
            <option>ZAR</option>
            <option>SEK</option>
            <option>AED</option>
            <option>INR</option>
            <option>DKK</option>
            <option>MXN</option>
            <option>RON</option>
            <option>CHF</option>
            <option>NOK</option>
            <option>PHP</option>
            <option>HKD</option>
            <option>CZK</option>
            <option>BRL</option>
            <option>VEF</option>
            <option>USDT</option>
            <option>BTC</option>
            <option>ETH</option>
          </select>
        </div>
        <script type="text/javascript">
          function loadGTrenGraph(){
            let currSelection=document.getElementById("cryptoSelectBox");
            document.getElementById("gTrenGraph").innerHTML="";
            trends.embed.renderExploreWidgetTo(document.getElementById("gTrenGraph"),"TIMESERIES", {"comparisonItem":[{"keyword":currSelection.options[currSelection.selectedIndex].text,"geo":"","time":"today 12-m"}],"category":0,"property":""}, {"exploreQuery":"q="+currSelection.options[currSelection.selectedIndex].text+"&date=today 12-m","guestPath":"https://trends.google.com:443/trends/embed/"}); 
          } 
          function loadGTrenGeo(){
            let currSelection1=document.getElementById("cryptoSelectBox");
            document.getElementById("gTrenGeo").innerHTML="";
            trends.embed.renderExploreWidgetTo(document.getElementById("gTrenGeo"),"GEO_MAP", {"comparisonItem":[{"keyword":currSelection1.options[currSelection1.selectedIndex].text,"geo":"","time":"today 12-m"}],"category":0,"property":""}, {"exploreQuery":"q="+currSelection1.options[currSelection1.selectedIndex].text+"&date=today 12-m","guestPath":"https://trends.google.com:443/trends/embed/"}); 
          }
          function selectCrypto() {
            document.getElementById("chartLoadOverlay").style.display="block";
            clearInterval(otherMarketsTimer);
            clearInterval(typewriterTimer);
            predicted=false;
            globalCryptoValue = document.getElementById("cryptoSelectBox").value; //.match(/\(([^)]+)\)/)[1];
            resetStrm();
            changeAllTop();
            drawMainChart();
            getMarketData();
            loadCoinLogo();
            loadGTrenGraph();
            loadGTrenGeo();
            console.log("Change Crypto");
            document.getElementById("MarketBox").innerHTML='Markets for '+globalCryptoValue+"/"+globalFiatValue;
            disqusReset();
          }
          function selectFiat() {
            document.getElementById("chartLoadOverlay").style.display="block";
            clearInterval(otherMarketsTimer);
            clearTimeout(typewriterTimer);
            predicted=false;
            globalFiatValue = document.getElementById("fiatSelectBox").value;
            resetStrm();
            changeAllTop();
            drawMainChart();
            getMarketData();
            console.log("Change Fiat");
            document.getElementById("MarketBox").innerHTML='Markets for '+globalCryptoValue+"/"+globalFiatValue;
            disqusReset();
          }
          /**
           * Updates displayed custom arb prices
           * chgArbPrs(which: buy/sell, updt: called from stream for price changes if to be updtd)
           * which==4 do nothing
           */
          function chgArbPrs(which=4,updt=false){
            if(updt==true){
              if(firstSltd && secondSltd)
                chgArbPrs(3);
              else if(firstSltd)
                chgArbPrs(1);
              else if(secondSltd)
                chgArbPrs(2);
            }
            if(which==1){
              if(document.getElementById("othSel1").value=="NoMarket")
                return;
              let buyPr=parseFloat(displayVals[document.getElementById("othSel1").value.toLowerCase()+"bn"]);
              firstSltd=true;
              document.getElementById("othBuyPr").innerHTML=currFSymb + (buyPr+((parseFloat(document.getElementById("arbBuyFee").value)*buyPr)/100)).toFixed(3);
              document.getElementById("othProfPr").innerHTML="Select Market to Sell";
            }
            else if(which==2){
              if(document.getElementById("othSel2").value=="NoMarket")
                return;
              let sellPr=parseFloat(displayVals[document.getElementById("othSel2").value.toLowerCase()+"bn"]);
              secondSltd=true;
              document.getElementById("othSellPr").innerHTML=currFSymb + (sellPr-((parseFloat(document.getElementById("arbSellFee").value)*sellPr)/100)).toFixed(3);
              document.getElementById("othProfPr").innerHTML="Select Market to Buy";
            }
            if((firstSltd && secondSltd) || which==3){
              let buyPr=parseFloat(displayVals[document.getElementById("othSel1").value.toLowerCase()+"bn"]);
              let sellPr=parseFloat(displayVals[document.getElementById("othSel2").value.toLowerCase()+"bn"]);
              document.getElementById("othProfPr").innerHTML=currFSymb + parseFloat(
                (sellPr-((parseFloat(document.getElementById("arbSellFee").value)*sellPr)/100))-
                (buyPr+((parseFloat(document.getElementById("arbBuyFee").value)*buyPr)/100))
                ).toFixed(3);
            }
          }
          function onArbFeeInp(e,which){
            if(isNaN(e.value) || e.value==""){
              e.value=0;
              return;
            }
            chgArbPrs(which);
          }
        </script>
        <br class="break-enable">
        <br class="break-enable">
        <!-- <div class="btn-group crypto-select">
                <button type="button" class="btn btn-default">Bitcoin</button>
                <button type="button" class="btn btn-default dropdown-toggle dropdown-btn-size-20pc" data-toggle="dropdown">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Bitcoin</a></li>
                  <li><a href="#">Ethereum</a></li>
                  <li><a href="#">Bitcoin Cash</a></li>
                </ul>
              </div> -->
        <!-- <div class="btn-group fiat-select">
                <button type="button" class="btn btn-default">INR</button>
                <button type="button" class="btn btn-default dropdown-toggle dropdown-btn-size-20pc" data-toggle="dropdown">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Bitcoin</a></li>
                  <li><a href="#">Ethereum</a></li>
                  <li><a href="#">Bitcoin Cash</a></li>
                </ul>
              </div> -->
        <h1 class="custom-h1-header">
          <div id="cryptoCurr-name-logo">
            <!-- <img src="https://www.cryptocompare.com/media/19633/btc.png" class="logo-img">   Bitcoin (BTC) -->
            <!-- <img id="titleLogo" src="" class="logo-img"> -->
            <img alt="coin logo" id="titleLogo" src="https://www.cryptocompare.com//media/19633/btc.png" class="logo-img">
            <span id="titleCurr"> Bitcoin (BTC)</span>
          </div>
        </h1>
        <!-- <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
              </ol> -->
      </section>

      <!-- Main content -->
      <section class="content" style="padding-left:5px;padding-right:5px">
        <div style="margin-top:-15px" class="row" style="margin:0">
          <div id="mainPrice">----</div>
        </div>

        <div class="row">
          <div id="mainFactsHolder">
            <div>
              <div class="mainFacts">
                <span class="mainFactsTitle">24H Change</span>
                <br>
                <span class="mainFactsValue">----</span>
              </div>
              <div class="mainFacts">
                <span class="mainFactsTitle">24H Change %</span>
                <br>
                <span class="mainFactsValue">----</span>
              </div>
              <div class="mainFacts">
                <span class="mainFactsTitle">24H Volume from</span>
                <br>
                <span class="mainFactsValue">----</span>
              </div>
              <div class="mainFacts">
                <span class="mainFactsTitle">24H Volume to</span>
                <br>
                <span class="mainFactsValue">----</span>
              </div>
              <div class="mainFacts">
                <span class="mainFactsTitle">24H Open</span>
                <br>
                <span class="mainFactsValue">----</span>
              </div>
              <div class="mainFacts">
                <span class="mainFactsTitle">24H High</span>
                <br>
                <span class="mainFactsValue">----</span>
              </div>
              <div class="mainFacts">
                <span class="mainFactsTitle">24H Low</span>
                <br>
                <span class="mainFactsValue">----</span>
              </div>
            </div>
            <!-- <link rel="stylesheet" href="https://changelly.com/widget.css"/> <a id="changellyButton" href="https://changelly.com/widget/v1?auth=email&from=USD&to=ETH&merchant_id=8d450131fbb6&address=&amount=10&ref_id=8d450131fbb6&color=045fe0" target="_blank"> <img src="dist/img/pay_button.png" style="height:40px;margin-top:14px"/> </a> <div id="changellyModal"> <div class="changellyModal-content"> <span class="changellyModal-close">x</span> <iframe src="https://changelly.com/widget/v1?auth=email&from=USD&to=ETH&merchant_id=8d450131fbb6&address=&amount=10&ref_id=8d450131fbb6&color=045fe0" width="600" height="500" class="changelly" scrolling="no" style="overflow-y: hidden; border: none" > Can't load widget </iframe> </div> <script type="text/javascript"> var changellyModal = document.getElementById('changellyModal'); var changellyButton = document.getElementById('changellyButton'); var changellyCloseButton = document.getElementsByClassName('changellyModal-close')[0]; changellyCloseButton.onclick = function() { changellyModal.style.display = 'none'; }; changellyButton.onclick = function widgetClick(e) { e.preventDefault(); changellyModal.style.display = 'block'; }; </script> </div> -->
            
            <span id="buysellButton"><!--<link rel="stylesheet" href="https://changelly.com/widget.css"/> <a id="changellyButton" href="https://changelly.com/widget/v1?auth=email&from=USD&to=BTC&merchant_id=8d450131fbb6&address=&amount=999&ref_id=8d450131fbb6&color=00cf70" target="_blank"> <img src="dist/img/pay_button.png" style="height:40px;margin-top:14px"/> </a> <div id="changellyModal"> <div class="changellyModal-content"> <span class="changellyModal-close">x</span> <iframe src="https://changelly.com/widget/v1?auth=email&from=USD&to=BTC&merchant_id=8d450131fbb6&address=&amount=999&ref_id=8d450131fbb6&color=00cf70" width="600" height="500" class="changelly" scrolling="no" style="overflow-y: hidden; border: none" > Can't load widget </iframe> </div> <script type="text/javascript"> var changellyModal = document.getElementById('changellyModal'); var changellyButton = document.getElementById('changellyButton'); var changellyCloseButton = document.getElementsByClassName('changellyModal-close')[0]; changellyCloseButton.onclick = function() { changellyModal.style.display = 'none'; }; changellyButton.onclick = function widgetClick(e) { e.preventDefault(); changellyModal.style.display = 'block'; }; </script> </div>--></span>
          </div>
        </div>
        
        <script type="text/javascript">
          //console.log("Live Data Top Start");
        </script>
        <script async defer src="livedatatop.js"></script>
        <script async defer src="loadCoinLogo.js"></script>
        <script type="text/javascript">
          function initChartTypeChange(evt, chartType) {
            var i, tabcontent, tablinks;
            changeChartType(chartType);
            tablinks = document.getElementsByClassName("tabChartTyp");
            for (i = 0; i < tablinks.length; i++) {
              tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            evt.currentTarget.className += " active";
          }
          function initChartTypeChangeNew(){console.log(document.getElementById("chartTypeSelect").value);
            document.getElementById("chartLoadOverlay").style.display = "block";
            changeChartType(document.getElementById("chartTypeSelect").value);
          }
          function initChartIndicatorChange(whichIndicator){
            document.getElementById("chartLoadOverlay").style.display = "block";
            changeIndiType(document.getElementById("chartIndiSelect"+whichIndicator).value,whichIndicator)
          }
        </script>
        
        <script type="text/javascript">
          //console.log("Live Data Top End");
        </script>
        
        <script type="text/javascript">
          //console.log("Chart Load Start");
        </script>
        <script async src="LineChartMain.js"></script>
        <script src="indi.js"></script>
        <div class="row box" style="width:100%;margin-left:0px;margin-right:0px;height:auto;padding-left:5px;padding-right:5px;padding-top:5px">
          <table>
          <tr><td><img alt="future prediction robot/AI image" src="dist/img/robot.png" srcset="" style="height:10vh"></td>
          <td style="padding: 5px"><b><div id="AIPredictionTd"><span id="AIPredictionSpan">Jay Yogeshwar! </span></div></b></td>
          </tr>
          </table>
        </div>
        <div class="row" style="width:100%;margin-left:0px;margin-right:0px;height:auto;">
        <div class="col-md-12" style="padding-left:0px;padding-right:0px">
        <div class="box" style="padding:5px 5px 1px 5px">
        <div id="chartLoadOverlay">
          <div id="loaderHolder" style="height:100%">
            <div class="loader" style="width: 60px;height: 60px !important;border-radius: 0 !important;top: 40%;position: relative;"></div>
          </div>
        </div>
          <!-- <div class="chartTypeTabHolder">
            <div class="chartTypeTab">
              <button class="tabChartTyp" onclick="initChartTypeChange(event,'candlestick')">CandleStick</button>
              <button class="tabChartTyp active" onclick="initChartTypeChange(event,'smoothedLine')">Line</button>
              <button class="tabChartTyp" onclick="initChartTypeChange(event,'ohlc')">OHLC</button>
            </div>
          </div> -->
          <div class="chartTypeTabHolder">
            <div class="chartType" style="float: left">
            <b class="hidden-xs">Chart Type:</b><!--<div class="hidden-sm hidden-lg hidden-md"></div>-->
              <select id="chartTypeSelect" onchange="initChartTypeChangeNew()" style="width:94px">
                <option value="smoothedLine">Line Chart</option>
                <option value="candlestick">CandleStick Chart</option>
                <option value="ohlc">OHLC Chart</option>
              </select>
            </div>
            <div class="chartIndicator1">
            <b class="hidden-xs">1<sup>st</sup> Indicator:</b><!--<div class="hidden-sm hidden-lg hidden-md"></div>-->
              <select id="chartIndiSelect1" onchange="initChartIndicatorChange(1)" style="width:94px">
                
              </select>
            </div>
            <div class="chartIndicator2" style="float: right">
            <b class="hidden-xs">2<sup>nd</sup> Indicator:</b><!--<div class="hidden-sm hidden-lg hidden-md"></div>-->
              <select id="chartIndiSelect2" onchange="initChartIndicatorChange(2)" style="width:94px">
                
              </select>
            </div>
          </div>
          <div id="chartdiv" class="chartdivlight">
            <script defer src="https://www.amcharts.com/lib/3/amcharts.js"></script>
            <script defer src="https://www.amcharts.com/lib/3/serial.js"></script>
            <!-- <script src="/amCharts/amstock.js"></script> -->

            <!-- <script src="https://www.amcharts.com/lib/3/amstock.js"></script> -->
            <!-- <script defer src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script> -->
            <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
            <script defer src="amCharts/light.js"></script>
            <script defer src="amCharts/amstock.js" onload="onChartsLoad()"></script>

            <!--<div style='clear:both;'>clear</div>-->
            <!-- <script type="text/javascript">
              drawMainChart();
            </script> -->
            <script type="text/javascript">
              //console.log("Chart Load End");
            </script>
          </div>
          </div>
          </div>
          <div class="col-md-4" style="display:none">
          <div class="box" style="text-align:center;/*background-color:#68d5f3;background-size: 100% 210%;*/background-image: url('backgroundb1.3.jpeg');margin-bottom:0px;height:589px;font-weight:600">
          <br><br><br><br><br><br><br><br><br><br><br>
          <span style="color:#fff;font-size:40px;font-weight:800;">Your Ad Here</span>
          </div>
          </div>
        </div>

        <script type="text/javascript">
          function convertToFiat() {
            if (isNaN(parseFloat((document.getElementById("CryptoInput").value).replace(/,/g, '')))) {
              document.getElementById("FiatInput").value = "Enter Correct Number!";
              if (document.getElementById("CryptoInput").value == "")
                document.getElementById("FiatInput").value = "";
              return;
            }
            document.getElementById("FiatInput").value = (parseFloat((document.getElementById("CryptoInput").value).replace(
              /,/g, '')) * currTopPriceAmount).toLocaleString();
          }

          function convertToCrypto() {
            if (isNaN(parseFloat((document.getElementById("FiatInput").value).replace(/,/g, '')))) {
              document.getElementById("CryptoInput").value = "Enter Correct Number!";
              if (document.getElementById("FiatInput").value == "")
                document.getElementById("CryptoInput").value = "";
              return;
            }
            document.getElementById("CryptoInput").value = (parseFloat((document.getElementById("FiatInput").value).replace(
              /,/g, '')) / currTopPriceAmount).toLocaleString();
          }
        </script>

        <div class="row" style="margin:0">
          <div class="box" style="width:auto">
            <!-- <div class="box-header"> -->
            <!-- <h3 class="box-title">Convert</h3> -->
            <!-- </div> -->
            <div class="box-body no-padding calculatorHolder">
              <div class="group_convert claculatorComponents">
                <input id="FiatInput" class="input_convert" type="text" oninput="convertToCrypto()" required>
                <!-- <span class="highlight"></span> -->
                <span class="bar_convert"></span>
                <label class="label_convert">Fiat Currency</label>
              </div>
              <br class="hidden-sm hidden-md hidden-lg"/>
              <div class="claculatorComponents" style="width:100px">
                <i class="fas fa-exchange-alt" style="font-size:20px"></i>
              </div>
              <br class="hidden-sm hidden-md hidden-lg"/>
              <div class="group_convert claculatorComponents">
                <input id="CryptoInput" class="input_convert" type="text" oninput="convertToFiat()" required>
                <!-- <span class="highlight"></span> -->
                <span class="bar_convert"></span>
                <label class="label_convert">Crypto Currency</label>
              </div>
              <div style="float:left;color:#807f7f;padding-left:5px" class="adjustLaptopL">
                Current & Historical price quotes above, coin details below from <a href="https://www.cryptocompare.com/">Cryptocompare</a>.
              </div>
            </div>
          </div>
        </div>

        <div class="row" style="margin:0">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Details for<script>document.write(" "+globalCryptoValue)</script></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding" style="overflow:auto">
              <table class="table table-striped table-bordered" id="OtherDetailsTable">
                <tr>
                  <th>Max Supply</th>
                  <th>Algorithm</th>
                  <th>Proof Type</th>
                  <th>BlockTime</th>
                </tr>
                <tr>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                </tr>
                <tr>
                  <th>Current Supply</th>
                  <th>BlockNumber</th>
                  <th>Network Hash/s</th>
                  <th>Block Reward</th>
                </tr>
                <tr>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.row -->
        <script src="OthDetTbl.js"></script>

        <div class="row box" style="display:none;height:80px;margin: 0px 0px 15px 0px;text-align:center;/*background-color:#68d5f38;*/background-image:url('background3.jpg')">
          <br><span style="font-weight:600;font-size: 40px;top: 10px;position:  absolute;color: #fff;margin-left: -70px;">Your Ad Here</span><br>
        </div>

        <div class="row">
          <div class="col-xs-12">

            <!-- /.box -->

            <div class="box">
              <div class="box-header">
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
                <h3 class="box-title" id="MarketBox">Markets for <script>document.write(globalCryptoValue+"/"+globalFiatValue)</script></h3>
              </div>
              <div class="box-body" style="padding:0">
                <div id="marketsDataTable" style="overflow-x:scroll">
                  Loading ⌛
                </div>
                <div style="float:left;color:#807f7f;padding-left:5px">
                  Market quotes from <a href="https://www.cryptocompare.com/">Cryptocompare</a> and <_Name_>.
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
          <script type="text/javascript">
            //console.log("Streaming Start");
          </script>
          <script type="text/javascript">
            // getMarketData();
            //console.log("Streaming End");
          </script>
        </div>

        <div class="row">
          <div class="col-xs-12">
            <div class="box collapsed-box">
              <div class="box-header">
              <div class="box-tools pull-right" style="width:100%;padding-left:18px">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" style="width:100%"><i class="fa fa-plus" style="float:right"></i>
                </button>
              </div>
                <h3 class="box-title" id="MarketBox">Arbitrage Opportunities for <script>document.write(globalCryptoValue+"/"+globalFiatValue)</script></h3>
              </div>
              <div id="arbitrage-div" class="box-body" style="padding=0">
                <div class="alert alert-success" style="overflow:auto">
                  <h4> Best Opportunity:</h4>
                  <div id="best-arbitrage">
                    <div id="bestBuyArbDiv" class="col-md-4">Buy at <span id="bestBuyMark" class="arbText">Loading ⌛</span> for <span id="bestBuyPr" class="arbText">Loading ⌛</span></div>
                    <div id="bestBuyArbDiv" class="col-md-4">Sell at <span id="bestSellMark" class="arbText">Loading ⌛</span> for <span id="bestSellPr" class="arbText">Loading ⌛</span></div><br>
                    <div id="bestBuyArbDiv" class="col-md-6">For a Profit of : <span id="bestProfPr" class="arbText">Loading ⌛</span></div>
                  </div>
                </div>
                <div class="alert alert-warning" style="overflow:auto">
                  <h4> Or Choose your Exchanges:</h4>
                  <div id="other-arbitrage">
                    <div id="othBuyArbDiv" class="col-md-6">Buy at &nbsp;<select id="othSel1" onChange="chgArbPrs(1)" style="color:#000;border-radius:9px;border-style:none"></select>&nbsp; with &nbsp;<input type="text" oninput="onArbFeeInp(this,1)" id="arbBuyFee" style="color: #000 !important;width:40px;border-radius:9px;border-style:none;padding:1px 5px 1px 5px;background-color:#fff !important;" value=0></input>% fee, for <span id="othBuyPr" class="arbText">&nbsp;--&nbsp;</span></div>
                    <div id="othBuyArbDiv" class="col-md-6">Sell at &nbsp;<select id="othSel2" onChange="chgArbPrs(2)" style="color:#000;border-radius:9px;border-style:none"></select>&nbsp; with &nbsp;<input type="text" oninput="onArbFeeInp(this,2)" id="arbSellFee" style="color: #000 !important;width:40px;border-radius:9px;border-style:none;padding:1px 5px 1px 5px;background-color:#fff !important" value=0></input>% fee, for <span id="othSellPr" class="arbText">&nbsp;--&nbsp;</span></div><br>
                    <div id="othBuyArbDiv" class="col-md-6">For a Profit of : &nbsp;<span id="othProfPr" class="arbText">&nbsp;--&nbsp;</span></div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
          
        <div class="row box" style="margin:0;width:auto;margin-bottom:20px">
          <div class="col-md-6" style="margin-left:0;margin-right:0;margin-bottom:10px;height:70vh;padding:10px">
            <div style="height:100%;overflow:auto">
              <script type="text/javascript">
                //console.log("Twitter Start");
              </script>
              <div id="twitter" style="height:100%">
              <div id="loaderHolder">
                <div class="loader"></div>
              </div>
              <!-- <a class="twitter-timeline" href="https://twitter.com/Bitcoin?ref_src=twsrc%5Etfw">Tweets by Bitcoin</a> -->
              <!-- <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> -->
              </div>
              <script type="text/javascript">
              twitterLoaded=false;
              gTrendLoaded=false;
                //console.log("Twitter End");
                function loadTwitter(){
                  let currSelection=document.getElementById("cryptoSelectBox");
                  let twitterUrl=coinData[globalCryptoValue];
                  if(twitterUrl==undefined){
                    twitterUrl="https://twitter.com/blockchain";
                  }
                  document.getElementById("twitter").innerHTML='<a class="twitter-timeline" data-theme="'+ twitterWidgetTheme +'" data-link-color="'+ twitterLinksColor +'" href="'+twitterUrl+'">Tweets by '+currSelection.options[currSelection.selectedIndex].text+'</a>'+
                  '<script async src="https://platform.twitter.com/widgets.js" charset="utf-8">\<\/script>';
                  
                  var twitterScript = document.createElement('script');
                  twitterScript.setAttribute('src','https://platform.twitter.com/widgets.js');
                  twitterScript.setAttribute('charset',"utf-8");
                  
                  //console.log(document.getElementById("loaderHolder"));
                  // document.getElementById("loaderHolder").style.display="none";
                  document.getElementById("twitter").appendChild(twitterScript);
                }
                $(window).scroll(function() {
                var hT = $('#twitter').offset().top,
                    hTG = $('#gTrenGraph').offset().top,
                    wH = $(window).height(),
                    wS = $(this).scrollTop();
                if(!twitterLoaded)
                if (wS > (hT-wH)){
                  twitterLoaded=true;
                  loadTwitter();
                  //loadDashNews();
                  //console.log("Loading Twitter");
                }
                if(!gTrendLoaded)
                if (wS > (hTG-wH)){
                  gTrendLoaded=true;
                  loadGTrenGraph();
                  loadGTrenGeo();
                  //console.log("Loading GTrends");
                }
              });
              </script>
            </div>
          </div>
          <div class="col-md-6" style="margin-left:0;margin-right:0;margin-bottom:10px;height:70vh;padding:10px;">
            <div class="NewsWidgetHolder" style="height: 100%; overflow-y: auto">
              <div id="disqus_thread"></div>
                <script>
                /**
                *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                var disqus_config = function () {
                let dPageUrl="http://localhost";
                let dIdentifier=globalCryptoValue+"/"+globalFiatValue;
                this.page.url = dPageUrl;  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = dIdentifier; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };
                (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://localhost-adminlte-2-4-2.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
                })();
                function disqusReset(){
                  let dPageUrl="http://localhost";
                  let dIdentifier=globalCryptoValue+"/"+globalFiatValue;
                  console.log(dIdentifier);
                  DISQUS.reset({
                    reload: true,
                    config: function () {
                      this.page.url = dPageUrl;  // Replace PAGE_URL with your page's canonical URL variable
                      this.page.identifier = dIdentifier;
                    }
                  });
                }
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
              </div>                         
              <!-- <div class="NewsWidgetMainHeading">
                <h1 style="margin:0">Cointelegraph.com News</h1>
                <div id="loaderHolder">
                  <div class="loader"></div>
                </div>
              </div> -->
              
              <!-- <div class="NewsWidgetItemHolder"> -->
              <!-- 
                            <img class="NewsWidgetItemLeftImg" src="https://cointelegraph.com/images/528_Ly9jb2ludGVsZWdyYXBoLmNvbS9zdG9yYWdlL3VwbG9hZHMvdmlldy83MjYzNGFmYmVhZWYwN2Y0MzdkOGYwYzdlOTFkMzQwNy5qcGc=.jpg"></img>
                            <div class="NewsWidgetItemRightHeading">
                              <div>Coinbase Joins Blockchain Common App Jobs Initiative, Calls For ‘Senior Engineers’</div>
                            </div>
                            <div class="NewsWidgetItemRightSmallContent">
                              <div>Coinbase has joined the Blockchain Common App jobs initiative, seeking senior engineers for Bitcoin, Ethereum protocols.</div>
                            </div> 
                            -->
              <!-- </div> -->
          </div>
        </div>
        <script type="text/javascript">
          //console.log("Google Trends Start");
        </script>
        <script type="text/javascript" src="https://ssl.gstatic.com/trends_nrtr/1420_RC05/embed_loader.js"></script>
				<div class="row box" style="margin:0;width:auto;margin-bottom:20px">
					<div class="col-md-6" id="gTrenGraph" style="margin-bottom:10px;padding-top:10px">
            <div id="loaderHolder">
              <div class="loader"></div>
            </div>
            <script type="text/javascript"> 
              //loadGTrenGraph();
            </script> 
					</div>
					<div class="col-md-6" id="gTrenGeo" style="margin-bottom:10px;padding-top:10px">
            <div id="loaderHolder">
              <div class="loader"></div>
            </div>
            <script type="text/javascript">
              //loadGTrenGeo();
            </script> 
					</div>
				</div>
        <script type="text/javascript">
          //console.log("Google Trends End");
        </script>

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; 2018-2019 Yogeshwar Studio.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    
    <!-- Add the sidebar's background. This div must be placed
                      immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->
  <script type="text/javascript">
    //console.log("Cointelegraph News Start");
  </script>
  <script type="text/javascript">
  function loadDashNews(){
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        // console.log(this.responseText);
        document.getElementsByClassName("NewsWidgetHolder")[0].innerHTML = this.responseText;
      }
    }
    xmlhttp.open("GET", "GetRss.php?q=Cointelegraph", true);
    xmlhttp.send();
  }
  </script>
  <script type="text/javascript">
    //console.log("Cointelegraph News End");
  </script>


  <script type="text/javascript">
    //console.log("Bottom Scripts Start");
  </script>
  <!-- Slimscroll -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <!-- <script src="bower_components/fastclick/lib/fastclick.js"></script> -->
  <!-- AdminLTE App -->
  <!-- <script src="dist/js/adminlte.min.js"></script>-->
  <!--TODO: Decide if below is needed-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.0/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="dist/js/pages/dashboard.js"></script> -->
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- DataTables -->
  <!-- <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script> -->
  <!-- <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> -->

  <!-- Select2 -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.1/js/select2.min.js"></script> -->
  <script async src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" onload="onSelect2Load()"></script>
  <!-- Select2 -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.1/css/select2.min.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
  <script type="text/javascript">
    $(function () {
      //Initialize Select2 Elements
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
  <script type="text/javascript">
    //console.log("Bottom Scripts End");
  </script>
  
</body>

</html>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
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
    <!-- socket.io -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.2/socket.io.js"></script>
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
      $(document).ajaxStart(function () {
        Pace.restart();
      });
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
              <i class="far fa-newspaper"></i>
              <span>&nbsp;CrV Blog</span>
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
              <span>&nbsp;How to Use CrV</span>
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
            <img class="top-image" src="dist/img/unavailable.png" alt=⌛ />
            <span class="top-label"> Bitcoin</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> Ethereum</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> Ripple</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> B Cash</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> Litecoin</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> TRON</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> Dash</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> B Gold</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> ZCash</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> Monero</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> ETH Classic</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> IOTA</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> NXT</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> EOS</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
          <div class="top-price-bar-cryptos">
            <img class="top-image" src="dist/img/unavailable.png" />
            <span class="top-label"> NEO</span>
            <br />
            <span class="top-price">updating&nbsp;
              <span class="top-pct" style="color: #aaaaaa">--</span>
            </span>
          </div>
        </div>
      </div>
      <!-- <script src="livedatatop.js"></script> -->
      <!-- Content Header (Page header) -->
      <script type="text/javascript">
        var globalCryptoValue = "BTC";
        var globalFiatValue = "INR";
      </script>
      <section class="content-header custom-content-header">
        <div class="crypto-select">
          <label class="label-enable">Crypto Currency: </label>
          <select id="cryptoSelectBox" class="form-control select2" style="width:157px" onchange="selectCrypto()">
            <option id="default-fiat" selected="selected" value="BTC">Bitcoin (BTC)</option>
            <option value="ETH">Ethereum (ETH)</option>
            <option value="XRP">Ripple (XRP)</option>
            <option value="BCH">Bitcoin Cash / BCC (BCH)</option>
            <option value="LTC">Litecoin (LTC)</option>
            <option value="NXT">Nxt (NXT)</option>
            <option value="XMR">Monero (XMR)</option>
            <option value="ETC">Ethereum Classic (ETC)</option>
            <option value="BTG">Bitcoin Gold (BTG)</option>
            <option value="ZEC">ZCash (ZEC)</option>
            <option value="TRON">Positron (TRON)</option>
            <option value="DOGE">Dogecoin (DOGE)</option>
            <option value="BTS">Bitshares (BTS)</option>
            <option value="DGB">DigiByte (DGB)</option>
            <option value="PPC">PeerCoin (PPC)</option>
            <option value="CRAIG">CraigsCoin (CRAIG)</option>
            <option value="XBS">Bitstake (XBS)</option>
            <option value="XPY">PayCoin (XPY)</option>
            <option value="PRC">ProsperCoin (PRC)</option>
            <option value="YBC">YbCoin (YBC)</option>
            <option value="DANK">DarkKush (DANK)</option>
            <option value="GIVE">GiveCoin (GIVE)</option>
            <option value="KOBO">KoboCoin (KOBO)</option>
            <option value="DT">DarkToken (DT)</option>
            <option value="CETI">CETUS Coin (CETI)</option>
            <option value="SUP">Supcoin (SUP)</option>
            <option value="XPD">PetroDollar (XPD)</option>
            <option value="GEO">GeoCoin (GEO)</option>
            <option value="CHASH">CleverHash (CHASH)</option>
            <option value="SPR">Spreadcoin (SPR)</option>
            <option value="NXTI">NXTI (NXTI)</option>
            <option value="WOLF">Insanity Coin (WOLF)</option>
            <option value="XDP">DogeParty (XDP)</option>
            <option value="AC">Asia Coin (AC)</option>
            <option value="ACOIN">ACoin (ACOIN)</option>
            <option value="AERO">Aero Coin (AERO)</option>
            <option value="ALF">AlphaCoin (ALF)</option>
            <option value="AGS">Aegis (AGS)</option>
            <option value="AMC">AmericanCoin (AMC)</option>
            <option value="ALN">AlienCoin (ALN)</option>
            <option value="APEX">ApexCoin (APEX)</option>
            <option value="ARCH">ArchCoin (ARCH)</option>
            <option value="ARG">Argentum (ARG)</option>
            <option value="ARI">AriCoin (ARI)</option>
            <option value="AUR">Aurora Coin (AUR)</option>
            <option value="AXR">AXRON (AXR)</option>
            <option value="BCX">BattleCoin (BCX)</option>
            <option value="BEN">Benjamins (BEN)</option>
            <option value="BET">BetaCoin (BET)</option>
            <option value="BITB">BitBean (BITB)</option>
            <option value="BLU">BlueCoin (BLU)</option>
            <option value="BLK">BlackCoin (BLK)</option>
            <option value="BOST">BoostCoin (BOST)</option>
            <option value="BQC">BQCoin (BQC)</option>
            <option value="XMY">MyriadCoin (XMY)</option>
            <option value="MOON">MoonCoin (MOON)</option>
            <option value="ZET">ZetaCoin (ZET)</option>
            <option value="QTL">Quatloo (QTL)</option>
            <option value="ENRG">EnergyCoin (ENRG)</option>
            <option value="QRK">QuarkCoin (QRK)</option>
            <option value="RIC">Riecoin (RIC)</option>
            <option value="DGC">DigiCoin (DGC)</option>
            <option value="LIMX">LimeCoinX (LIMX)</option>
            <option value="BTB">BitBar (BTB)</option>
            <option value="CAIX">CAIx (CAIx)</option>
            <option value="BTE">ByteCoin (BTE)</option>
            <option value="BTG*">BitGem (BTG*)</option>
            <option value="BTM">BitMark (BTM)</option>
            <option value="BUK">CryptoBuk (BUK)</option>
            <option value="CACH">Cachecoin (CACH)</option>
            <option value="CANN">CannabisCoin (CANN)</option>
            <option value="CAP">BottleCaps (CAP)</option>
            <option value="CASH">CashCoin (CASH)</option>
            <option value="CAT1">Catcoin (CAT1)</option>
            <option value="CBX">CryptoBullion (CBX)</option>
            <option value="CCN">CannaCoin (CCN)</option>
            <option value="CIN">CinderCoin (CIN)</option>
            <option value="CINNI">CINNICOIN (CINNI)</option>
            <option value="CXC">CheckCoin (CXC)</option>
            <option value="CLAM">CLAMS (CLAM)</option>
            <option value="CLOAK">CloakCoin (CLOAK)</option>
            <option value="300">300 token (300)</option>
            <option value="365">365Coin (365)</option>
            <option value="404">404Coin (404)</option>
            <option value="42">42 Coin (42)</option>
            <option value="611">SixEleven (611)</option>
            <option value="808">808 (808)</option>
            <option value="888">Octocoin (888)</option>
            <option value="1337">1337 (1337)</option>
            <option value="2015">2015 coin (2015)</option>
            <option value="CLR">CopperLark (CLR)</option>
            <option value="CMC">CosmosCoin (CMC)</option>
            <option value="CNC">ChinaCoin (CNC)</option>
            <option value="CNL">ConcealCoin (CNL)</option>
            <option value="COMM">Community Coin (COMM)</option>
            <option value="COOL">CoolCoin (COOL)</option>
            <option value="CRACK">CrackCoin (CRACK)</option>
            <option value="CRC*">CraftCoin (CRC*)</option>
            <option value="CRYPT">CryptCoin (CRYPT)</option>
            <option value="DEM">eMark (DEM)</option>
            <option value="DMD">Diamond (DMD)</option>
            <option value="DRKC">DarkCash (DRKC)</option>
            <option value="DSB">DarkShibe (DSB)</option>
            <option value="DVC">DevCoin (DVC)</option>
            <option value="EAC">EarthCoin (EAC)</option>
            <option value="EFL">E-Gulden (EFL)</option>
            <option value="ELC">Elacoin (ELC)</option>
            <option value="EMC2">Einsteinium (EMC2)</option>
            <option value="EMD">Emerald (EMD)</option>
            <option value="EXCL">Exclusive Coin (EXCL)</option>
            <option value="EXE">ExeCoin (EXE)</option>
            <option value="EZC">EZCoin (EZC)</option>
            <option value="FLAP">Flappy Coin (FLAP)</option>
            <option value="FC2">Fuel2Coin (FC2)</option>
            <option value="FFC">FireflyCoin (FFC)</option>
            <option value="FIBRE">FIBRE (FIBRE)</option>
            <option value="FRC">FireRoosterCoin (FRC)</option>
            <option value="FLT">FlutterCoin (FLT)</option>
            <option value="FRK">Franko (FRK)</option>
            <option value="FRAC">FractalCoin (FRAC)</option>
            <option value="FST">FastCoin (FST)</option>
            <option value="FTC">FeatherCoin (FTC)</option>
            <option value="GDC">GrandCoin (GDC)</option>
            <option value="GLC">GlobalCoin (GLC)</option>
            <option value="GLD">GoldCoin (GLD)</option>
            <option value="GLX">GalaxyCoin (GLX)</option>
            <option value="GLYPH">GlyphCoin (GLYPH)</option>
            <option value="GML">GameLeagueCoin (GML)</option>
            <option value="GUE">GuerillaCoin (GUE)</option>
            <option value="HAL">Halcyon (HAL)</option>
            <option value="HBN">HoboNickels (HBN)</option>
            <option value="HUC">HunterCoin (HUC)</option>
            <option value="HVC">HeavyCoin (HVC)</option>
            <option value="HYP">Hyperstake (HYP)</option>
            <option value="ICB">IceBergCoin (ICB)</option>
            <option value="IFC">Infinite Coin (IFC)</option>
            <option value="IOC">IOCoin (IOC)</option>
            <option value="IXC">IXcoin (IXC)</option>
            <option value="JBS">JumBucks Coin (JBS)</option>
            <option value="JKC">JunkCoin (JKC)</option>
            <option value="JUDGE">JudgeCoin (JUDGE)</option>
            <option value="KDC">Klondike Coin (KDC)</option>
            <option value="KEY*">KeyCoin (KEY*)</option>
            <option value="KGC">KrugerCoin (KGC)</option>
            <option value="LAB*">CoinWorksCoin (LAB*)</option>
            <option value="LGD*">Legendary Coin (LGD*)</option>
            <option value="LK7">Lucky7Coin (LK7)</option>
            <option value="LKY">LuckyCoin (LKY)</option>
            <option value="LSD">LightSpeedCoin (LSD)</option>
            <option value="LTB">Litebar (LTB)</option>
            <option value="LTCD">LitecoinDark (LTCD)</option>
            <option value="LTCX">LitecoinX (LTCX)</option>
            <option value="LXC">LibrexCoin (LXC)</option>
            <option value="LYC">LycanCoin (LYC)</option>
            <option value="MAX">MaxCoin (MAX)</option>
            <option value="MEC">MegaCoin (MEC)</option>
            <option value="MED">MediterraneanCoin (MED)</option>
            <option value="MIN">Minerals Coin (MIN)</option>
            <option value="MINT">MintCoin (MINT)</option>
            <option value="MN">Cryptsy Mining Contract (MN)</option>
            <option value="MNC">MinCoin (MNC)</option>
            <option value="MRY">MurrayCoin (MRY)</option>
            <option value="MYST*">MysteryCoin (MYST*)</option>
            <option value="MZC">MazaCoin (MZC)</option>
            <option value="NAN">NanoToken (NAN)</option>
            <option value="NAUT">Nautilus Coin (NAUT)</option>
            <option value="NAV">NavCoin (NAV)</option>
            <option value="NBL">Nybble (NBL)</option>
            <option value="NEC">NeoCoin (NEC)</option>
            <option value="NET">NetCoin (NET)</option>
            <option value="NMB">Nimbus Coin (NMB)</option>
            <option value="NRB">NoirBits (NRB)</option>
            <option value="NOBL">NobleCoin (NOBL)</option>
            <option value="NRS">NoirShares (NRS)</option>
            <option value="NVC">NovaCoin (NVC)</option>
            <option value="NMC">NameCoin (NMC)</option>
            <option value="NYAN">NyanCoin (NYAN)</option>
            <option value="OPAL">OpalCoin (OPAL)</option>
            <option value="ORB">Orbitcoin (ORB)</option>
            <option value="OSC">OpenSourceCoin (OSC)</option>
            <option value="PHS">PhilosophersStone (PHS)</option>
            <option value="POINTS">Cryptsy Points (POINTS)</option>
            <option value="POT">PotCoin (POT)</option>
            <option value="PSEUD">PseudoCash (PSEUD)</option>
            <option value="PTS*">Protoshares (PTS*)</option>
            <option value="PXC">PhoenixCoin (PXC)</option>
            <option value="PYC">PayCoin (PYC)</option>
            <option value="RDD">ReddCoin (RDD)</option>
            <option value="RIPO">RipOffCoin (RIPO)</option>
            <option value="RPC">RonPaulCoin (RPC)</option>
            <option value="RT2">RotoCoin (RT2)</option>
            <option value="RYC">RoyalCoin (RYC)</option>
            <option value="RZR">RazorCoin (RZR)</option>
            <option value="SAT2">Saturn2Coin (SAT2)</option>
            <option value="SBC">StableCoin (SBC)</option>
            <option value="SDC">ShadowCash (SDC)</option>
            <option value="SFR">SaffronCoin (SFR)</option>
            <option value="SHADE">ShadeCoin (SHADE)</option>
            <option value="SHLD">ShieldCoin (SHLD)</option>
            <option value="SILK">SilkCoin (SILK)</option>
            <option value="SLG">SterlingCoin (SLG)</option>
            <option value="SMC">SmartCoin (SMC)</option>
            <option value="SOLE">SoleCoin (SOLE)</option>
            <option value="SPT">Spots (SPT)</option>
            <option value="SRC">SecureCoin (SRC)</option>
            <option value="SSV">SSVCoin (SSV)</option>
            <option value="XLM">Stellar (XLM)</option>
            <option value="SUPER">SuperCoin (SUPER)</option>
            <option value="SWIFT">BitSwift (SWIFT)</option>
            <option value="SYNC">SyncCoin (SYNC)</option>
            <option value="SYS">SysCoin (SYS)</option>
            <option value="TAG">TagCoin (TAG)</option>
            <option value="TAK">TakCoin (TAK)</option>
            <option value="TGC">TigerCoin (TGC)</option>
            <option value="TIT">TitCoin (TIT)</option>
            <option value="TOR">TorCoin (TOR)</option>
            <option value="TRC">TerraCoin (TRC)</option>
            <option value="TTC">TittieCoin (TTC)</option>
            <option value="ULTC">Umbrella (ULTC)</option>
            <option value="UNB">UnbreakableCoin (UNB)</option>
            <option value="UNO">Unobtanium (UNO)</option>
            <option value="URO">UroCoin (URO)</option>
            <option value="USDE">UnitaryStatus Dollar (USDE)</option>
            <option value="UTC">UltraCoin (UTC)</option>
            <option value="UTIL">Utility Coin (UTIL)</option>
            <option value="VDO">VidioCoin (VDO)</option>
            <option value="VIA">ViaCoin (VIA)</option>
            <option value="VOOT">VootCoin (VOOT)</option>
            <option value="VRC">VeriCoin (VRC)</option>
            <option value="WC">WhiteCoin (WC)</option>
            <option value="WDC">WorldCoin (WDC)</option>
            <option value="XAI">SapienceCoin (XAI)</option>
            <option value="XBOT">SocialXbotCoin (XBOT)</option>
            <option value="XC">X11 Coin (XC)</option>
            <option value="XCASH">Xcash (XCASH)</option>
            <option value="XCR">Crypti (XCR)</option>
            <option value="XJO">JouleCoin (XJO)</option>
            <option value="XLB">LibertyCoin (XLB)</option>
            <option value="XPM">PrimeCoin (XPM)</option>
            <option value="XST">StealthCoin (XST)</option>
            <option value="XXX">XXXCoin (XXX)</option>
            <option value="YAC">YAcCoin (YAC)</option>
            <option value="ZCC">ZCC Coin (ZCC)</option>
            <option value="ZED">ZedCoins (ZED)</option>
            <option value="ZRC*">ZiftrCoin (ZRC*)</option>
            <option value="BCN">ByteCoin (BCN)</option>
            <option value="EKN">Elektron (EKN)</option>
            <option value="XDN">DigitalNote (XDN)</option>
            <option value="XAU">XauCoin (XAU)</option>
            <option value="TMC">TimesCoin (TMC)</option>
            <option value="XEM">NEM (XEM)</option>
            <option value="BURST">BurstCoin (BURST)</option>
            <option value="NBT">NuBits (NBT)</option>
            <option value="SJCX">StorjCoin (SJCX)</option>
            <option value="START">StartCoin (START)</option>
            <option value="HUGE">BigCoin (HUGE)</option>
            <option value="XCP">CounterParty (XCP)</option>
            <option value="MAID">MaidSafe Coin (MAID)</option>
            <option value="7">007 coin (007)</option>
            <option value="NSR">NuShares (NSR)</option>
            <option value="MONA">MonaCoin (MONA)</option>
            <option value="CELL">SolarFarm (CELL)</option>
            <option value="TEK">TekCoin (TEK)</option>
            <option value="BAY">BitBay (BAY)</option>
            <option value="NTRN">Neutron (NTRN)</option>
            <option value="SLING">Sling Coin (SLING)</option>
            <option value="XVC">Vcash (XVC)</option>
            <option value="CRAVE">CraveCoin (CRAVE)</option>
            <option value="BLOCK">BlockNet (BLOCK)</option>
            <option value="XSI">Stability Shares (XSI)</option>
            <option value="GHS">Giga Hash (GHS)</option>
            <option value="BYC">ByteCent (BYC)</option>
            <option value="GRC">GridCoin (GRC)</option>
            <option value="GEMZ">Gemz Social (GEMZ)</option>
            <option value="KTK">KryptCoin (KTK)</option>
            <option value="HZ">Horizon (HZ)</option>
            <option value="FAIR">FairCoin (FAIR)</option>
            <option value="QORA">QoraCoin (QORA)</option>
            <option value="RBY">RubyCoin (RBY)</option>
            <option value="KORE">Kore (KORE)</option>
            <option value="WBB">Wild Beast Coin (WBB)</option>
            <option value="SSD">Sonic Screw Driver Coin (SSD)</option>
            <option value="XTC">TileCoin (XTC)</option>
            <option value="NOTE">Dnotes (NOTE)</option>
            <option value="GRID*">GridPay (GRID*)</option>
            <option value="FLO">FlorinCoin (FLO)</option>
            <option value="MMXIV">MaieutiCoin (MMXIV)</option>
            <option value="8BIT">8BIT Coin (8BIT)</option>
            <option value="STV">Sativa Coin (STV)</option>
            <option value="EBS">EbolaShare (EBS)</option>
            <option value="AM">AeroMe (AM)</option>
            <option value="XMG">Coin Magi (XMG)</option>
            <option value="AMBER">AmberCoin (AMBER)</option>
            <option value="NKT">NakomotoDark (NKT)</option>
            <option value="J">JoinCoin (J)</option>
            <option value="GHC">GhostCoin (GHC)</option>
            <option value="DTC*">DayTrader Coin (DTC)</option>
            <option value="ABY">ArtByte (ABY)</option>
            <option value="LDOGE">LiteDoge (LDOGE)</option>
            <option value="MTR">MasterTraderCoin (MTR)</option>
            <option value="TRI">Triangles Coin (TRI)</option>
            <option value="BTCD">BitcoinDark (BTCD)</option>
            <option value="SWARM">SwarmCoin (SWARM)</option>
            <option value="BBR">Boolberry (BBR)</option>
            <option value="BTCRY">BitCrystal (BTCRY)</option>
            <option value="BCR">BitCredit (BCR)</option>
            <option value="XPB">Pebble Coin (XPB)</option>
            <option value="XDQ">Dirac Coin (XDQ)</option>
            <option value="FLDC">Folding Coin (FLDC)</option>
            <option value="SLR">SolarCoin (SLR)</option>
            <option value="SMAC">Social Media Coin (SMAC)</option>
            <option value="TRK">TruckCoin (TRK)</option>
            <option value="U">Ucoin (U)</option>
            <option value="UIS">Unitus (UIS)</option>
            <option value="CYP">CypherPunkCoin (CYP)</option>
            <option value="UFO">UFO Coin (UFO)</option>
            <option value="ASN">Ascension Coin (ASN)</option>
            <option value="OC">OrangeCoin (OC)</option>
            <option value="GSM">GSM Coin (GSM)</option>
            <option value="NXTTY">NXTTY (NXTTY)</option>
            <option value="QBK">QuBuck Coin (QBK)</option>
            <option value="BLC">BlakeCoin (BLC)</option>
            <option value="MARYJ">MaryJane Coin (MARYJ)</option>
            <option value="OMC">OmniCron (OMC)</option>
            <option value="GIG">GigCoin (GIG)</option>
            <option value="CC">CyberCoin (CC)</option>
            <option value="BITS">BitstarCoin (BITS)</option>
            <option value="LTBC">LTBCoin (LTBC)</option>
            <option value="NEOS">NeosCoin (NEOS)</option>
            <option value="HYPER">HyperCoin (HYPER)</option>
            <option value="VTR">Vtorrent (VTR)</option>
            <option value="METAL">MetalCoin (METAL)</option>
            <option value="PINK">PinkCoin (PINK)</option>
            <option value="GRE">GreenCoin (GRE)</option>
            <option value="XG">XG Sports (XG)</option>
            <option value="CHILD">ChildCoin (CHILD)</option>
            <option value="BOOM">BOOM Coin (BOOM)</option>
            <option value="MINE">Instamine Nuggets (MINE)</option>
            <option value="ROS">ROS Coin (ROS)</option>
            <option value="UNAT">Unattanium (UNAT)</option>
            <option value="SLM">SlimCoin (SLM)</option>
            <option value="GAIA">GAIA Platform (GAIA)</option>
            <option value="TRUST">TrustPlus (TRUST)</option>
            <option value="FCN">FantomCoin (FCN)</option>
            <option value="XCN">Cryptonite (XCN)</option>
            <option value="CURE">Curecoin (CURE)</option>
            <option value="GMC">Gridmaster (GMC)</option>
            <option value="MMC">MemoryCoin (MMC)</option>
            <option value="XBC">BitcoinPlus (XBC)</option>
            <option value="CYC">ConSpiracy Coin (CYC)</option>
            <option value="OCTO">OctoCoin (OCTO)</option>
            <option value="MSC">MasterCoin (MSC)</option>
            <option value="EGG">EggCoin (EGG)</option>
            <option value="C2">Coin.2 (C2)</option>
            <option value="GSX">GlowShares (GSX)</option>
            <option value="CAM">Camcoin (CAM)</option>
            <option value="RBR">Ribbit Rewards (RBR)</option>
            <option value="XQN">Quotient (XQN)</option>
            <option value="ICASH">ICASH (ICASH)</option>
            <option value="NODE">Node (NODE)</option>
            <option value="SOON">SoonCoin (SOON)</option>
            <option value="BTMI">BitMiles (BTMI)</option>
            <option value="EVENT">Event Token (EVENT)</option>
            <option value="1CR">1Credit (1CR)</option>
            <option value="VIOR">ViorCoin (VIOR)</option>
            <option value="XCO">XCoin (XCO)</option>
            <option value="VMC">VirtualMining Coin (VMC)</option>
            <option value="MRS">MarsCoin (MRS)</option>
            <option value="VIRAL">Viral Coin (VIRAL)</option>
            <option value="EQM">Equilibrium Coin (EQM)</option>
            <option value="ISL">IslaCoin (ISL)</option>
            <option value="QSLV">Quicksilver coin (QSLV)</option>
            <option value="XWT">World Trade Funds (XWT)</option>
            <option value="XNA">DeOxyRibose (XNA)</option>
            <option value="RDN">RadonPay (RDN)</option>
            <option value="SKB">SkullBuzz (SKB)</option>
            <option value="BSTY">GlobalBoost (BSTY)</option>
            <option value="FCS">CryptoFocus (FCS)</option>
            <option value="GAM">Gambit coin (GAM)</option>
            <option value="NXS">Nexus (NXS)</option>
            <option value="CESC">Crypto Escudo (CESC)</option>
            <option value="TWLV">Twelve Coin (TWLV)</option>
            <option value="EAGS">EagsCoin (EAGS)</option>
            <option value="MWC">MultiWallet Coin (MWC)</option>
            <option value="ADC">AudioCoin (ADC)</option>
            <option value="MARS">MarsCoin (MARS)</option>
            <option value="XMS">Megastake (XMS)</option>
            <option value="SPHR">Sphere Coin (SPHR)</option>
            <option value="SIGU">Singular (SIGU)</option>
            <option value="BTX*">BitcoinTX (BTX*)</option>
            <option value="DCC">DarkCrave (DCC)</option>
            <option value="M1">SupplyShock (M1)</option>
            <option value="DB">DarkBit (DB)</option>
            <option value="CTO">Crypto (CTO)</option>
            <option value="EDGE">EdgeCoin (EDGE)</option>
            <option value="LUX*">BitLux (LUX*)</option>
            <option value="FUTC">FutCoin (FUTC)</option>
            <option value="GLOBE">Global (GLOBE)</option>
            <option value="TAM">TamaGucci (TAM)</option>
            <option value="MRP">MorpheusCoin (MRP)</option>
            <option value="CREVA">Creva Coin (CREVA)</option>
            <option value="XFC">Forever Coin (XFC)</option>
            <option value="NANAS">BananaBits (NANAS)</option>
            <option value="LOG">Wood Coin (LOG)</option>
            <option value="XCE">Cerium (XCE)</option>
            <option value="ACP">Anarchists Prime (ACP)</option>
            <option value="DRZ">Droidz (DRZ)</option>
            <option value="BUCKS*">GorillaBucks (BUCKS*)</option>
            <option value="BSC">BowsCoin (BSC)</option>
            <option value="DRKT">DarkTron (DRKT)</option>
            <option value="CIRC">CryptoCircuits (CIRC)</option>
            <option value="NKA">IncaKoin (NKA)</option>
            <option value="VERSA">Versa Token (VERSA)</option>
            <option value="EPY">Empyrean (EPY)</option>
            <option value="SQL">Squall Coin (SQL)</option>
            <option value="POLY">PolyBit (POLY)</option>
            <option value="PIGGY">Piggy Coin (PIGGY)</option>
            <option value="CHA">Charity Coin (CHA)</option>
            <option value="MIL">Milllionaire Coin (MIL)</option>
            <option value="CRW">Crown Coin (CRW)</option>
            <option value="GEN">Genstake (GEN)</option>
            <option value="XPH">PharmaCoin (XPH)</option>
            <option value="GRM">GridMaster (GRM)</option>
            <option value="QTZ">Quartz (QTZ)</option>
            <option value="ARB">Arbit Coin (ARB)</option>
            <option value="LTS">Litestar Coin (LTS)</option>
            <option value="SPC">SpinCoin (SPC)</option>
            <option value="GP">GoldPieces (GP)</option>
            <option value="BITZ">Bitz Coin (BITZ)</option>
            <option value="DUB">DubCoin (DUB)</option>
            <option value="GRAV">Graviton (GRAV)</option>
            <option value="BOB">Bob Coin (BOB)</option>
            <option value="MCN">MonetaVerde (MCN)</option>
            <option value="QCN">Quazar Coin (QCN)</option>
            <option value="HEDG">Hedgecoin (HEDG)</option>
            <option value="SONG">Song Coin (SONG)</option>
            <option value="XSEED">BitSeeds (XSEED)</option>
            <option value="CRE">Credits (CRE)</option>
            <option value="AXIOM">Axiom Coin (AXIOM)</option>
            <option value="SMLY">SmileyCoin (SMLY)</option>
            <option value="RBT">Rimbit (RBT)</option>
            <option value="CHIP">Chip (CHIP)</option>
            <option value="SPEC">SpecCoin (SPEC)</option>
            <option value="GRAM">Gram Coin (GRAM)</option>
            <option value="UNC">UnCoin (UNC)</option>
            <option value="SPRTS">Sprouts (SPRTS)</option>
            <option value="ZNY">BitZeny (ZNY)</option>
            <option value="BTQ">BitQuark (BTQ)</option>
            <option value="PKB">ParkByte (PKB)</option>
            <option value="STR*">StarCoin (STR*)</option>
            <option value="SNRG">Synergy (SNRG)</option>
            <option value="GHOUL">Ghoul Coin (GHOUL)</option>
            <option value="HNC">Hellenic Coin (HNC)</option>
            <option value="DIGS">Diggits (DIGS)</option>
            <option value="EXP">Expanse (EXP)</option>
            <option value="GCR">Global Currency Reserve (GCR)</option>
            <option value="MAPC">MapCoin (MAPC)</option>
            <option value="MI">XiaoMiCoin (MI)</option>
            <option value="CON">Paycon (CON_)</option>
            <option value="NEU*">NeuCoin (NEU*)</option>
            <option value="TX">Transfer (TX)</option>
            <option value="GRS">Groestlcoin (GRS)</option>
            <option value="CLV">CleverCoin (CLV)</option>
            <option value="FCT">Factoids (FCT)</option>
            <option value="LYB">LyraBar (LYB)</option>
            <option value="BST">BitStone (BST)</option>
            <option value="PXI">Prime-X1 (PXI)</option>
            <option value="CPC">CapriCoin (CPC)</option>
            <option value="AMS">Amsterdam Coin (AMS)</option>
            <option value="OBITS">Obits Coin (OBITS)</option>
            <option value="CLUB">ClubCoin (CLUB)</option>
            <option value="RADS">Radium (RADS)</option>
            <option value="BLITZ">BlitzCoin (BLITZ)</option>
            <option value="HIRE*">BitHIRE (HIRE*)</option>
            <option value="EGC">EverGreenCoin (EGC)</option>
            <option value="MND">MindCoin (MND)</option>
            <option value="I0C">I0coin (I0C)</option>
            <option value="BTA">Bata (BTA)</option>
            <option value="KARMA">Karmacoin (KARMA)</option>
            <option value="DCR">Decred (DCR)</option>
            <option value="NAS2">Nas2Coin (NAS2)</option>
            <option value="PAK">Pakcoin (PAK)</option>
            <option value="CRB">Creditbit (CRB)</option>
            <option value="DOGED">DogeCoinDark (DOGED)</option>
            <option value="REP">Augur (REP)</option>
            <option value="OK">OKCash (OK)</option>
            <option value="VOX">Voxels (VOX)</option>
            <option value="AMP">Synereo (AMP)</option>
            <option value="HODL">HOdlcoin (HODL)</option>
            <option value="DGD">Digix DAO (DGD)</option>
            <option value="EDRC">EDRCoin (EDRC)</option>
            <option value="WAVES">Waves (WAVES)</option>
            <option value="HTC">Hitcoin (HTC)</option>
            <option value="GAME">Gamecredits (GAME)</option>
            <option value="DSH">Dashcoin (DSH)</option>
            <option value="DBIC">DubaiCoin (DBIC)</option>
            <option value="XHI">HiCoin (XHI)</option>
            <option value="SPOTS">Spots (SPOTS)</option>
            <option value="BIOS">BiosCrypto (BIOS)</option>
            <option value="CAB">CabbageUnit (CAB)</option>
            <option value="DIEM">CarpeDiemCoin (DIEM)</option>
            <option value="GBT">GameBetCoin (GBT)</option>
            <option value="SAR">SARCoin (SAR)</option>
            <option value="RCX">RedCrowCoin (RCX)</option>
            <option value="PWR">PowerCoin (PWR)</option>
            <option value="TRUMP">TrumpCoin (TRUMP)</option>
            <option value="PRM">PrismChain (PRM)</option>
            <option value="BCY">BitCrystals (BCY)</option>
            <option value="RBIES">Rubies (RBIES)</option>
            <option value="STEEM">Steem (STEEM)</option>
            <option value="BLRY">BillaryCoin (BLRY)</option>
            <option value="XWC">WhiteCoin (XWC)</option>
            <option value="DOT">Dotcoin (DOT)</option>
            <option value="SCOT">Scotcoin (SCOT)</option>
            <option value="DNET">Darknet (DNET)</option>
            <option value="BAC">BitalphaCoin (BAC)</option>
            <option value="XID*">International Diamond Coin (XID*)</option>
            <option value="GRT">Grantcoin (GRT)</option>
            <option value="TCR">Thecreed (TCR)</option>
            <option value="POST">PostCoin (POST)</option>
            <option value="INFX">Influxcoin (INFX)</option>
            <option value="ETHS">EthereumScrypt (ETHS)</option>
            <option value="PXL">Phalanx (PXL)</option>
            <option value="NUM">NumbersCoin (NUM)</option>
            <option value="SOUL">SoulCoin (SOUL)</option>
            <option value="ION">Ionomy (ION)</option>
            <option value="GROW">GrownCoin (GROW)</option>
            <option value="UNITY">SuperNET (UNITY)</option>
            <option value="OLDSF">OldSafeCoin (OLDSF)</option>
            <option value="SSTC">SunShotCoin (SSTC)</option>
            <option value="NETC">NetworkCoin (NETC)</option>
            <option value="GPU">GPU Coin (GPU)</option>
            <option value="TAGR">Think And Get Rich Coin (TAGR)</option>
            <option value="HMP">HempCoin (HMP)</option>
            <option value="ADZ">Adzcoin (ADZ)</option>
            <option value="GAP">Gapcoin (GAP)</option>
            <option value="MYC">MayaCoin (MYC)</option>
            <option value="IVZ">InvisibleCoin (IVZ)</option>
            <option value="VTA">VirtaCoin (VTA)</option>
            <option value="SLS">SaluS (SLS)</option>
            <option value="SOIL">SoilCoin (SOIL)</option>
            <option value="CUBE">DigiCube (CUBE)</option>
            <option value="YOC">YoCoin (YOC)</option>
            <option value="COIN*">Coin (COIN*)</option>
            <option value="APC">AlpaCoin (APC)</option>
            <option value="STEPS">Steps (STEPS)</option>
            <option value="DBTC">DebitCoin (DBTC)</option>
            <option value="UNIT">Universal Currency (UNIT)</option>
            <option value="AEON">AeonCoin (AEON)</option>
            <option value="MOIN">MoinCoin (MOIN)</option>
            <option value="SIB">SibCoin (SIB)</option>
            <option value="ERC">EuropeCoin (ERC)</option>
            <option value="AIB">AdvancedInternetBlock (AIB)</option>
            <option value="PRIME">PrimeChain (PRIME)</option>
            <option value="BERN">BERNcash (BERN)</option>
            <option value="BIGUP">BigUp (BIGUP)</option>
            <option value="KR">Krypton (KR)</option>
            <option value="XRE">RevolverCoin (XRE)</option>
            <option value="MEME">Pepe (MEME)</option>
            <option value="XDB">DragonSphere (XDB)</option>
            <option value="ANTI">Anti Bitcoin (ANTI)</option>
            <option value="BRK">BreakoutCoin (BRK)</option>
            <option value="COLX">ColossusCoinXT (COLX)</option>
            <option value="MNM">Mineum (MNM)</option>
            <option value="ADCN">Asiadigicoin (ADCN)</option>
            <option value="ZEIT">ZeitCoin (ZEIT)</option>
            <option value="2GIVE">2GiveCoin (2GIVE)</option>
            <option value="CGA">Cryptographic Anomaly (CGA)</option>
            <option value="SWING">SwingCoin (SWING)</option>
            <option value="SAFEX">SafeExchangeCoin (SAFEX)</option>
            <option value="NEBU">Nebuchadnezzar (NEBU)</option>
            <option value="AEC">AcesCoin (AEC)</option>
            <option value="FRN">Francs (FRN)</option>
            <option value="ADN">Aiden (ADN)</option>
            <option value="PULSE">Pulse (PULSE)</option>
            <option value="N7">Number7 (N7)</option>
            <option value="CYG">Cygnus (CYG)</option>
            <option value="LGBTQ">LGBTQoin (LGBTQ)</option>
            <option value="UTH">Uther (UTH)</option>
            <option value="MPRO">MediumProject (MPRO)</option>
            <option value="KAT">KATZcoin (KAT)</option>
            <option value="SPM">Supreme (SPM)</option>
            <option value="MOJO">Mojocoin (MOJO)</option>
            <option value="BELA">BelaCoin (BELA)</option>
            <option value="FLX">Flash (FLX)</option>
            <option value="BOLI">BolivarCoin (BOLI)</option>
            <option value="CLUD">CludCoin (CLUD)</option>
            <option value="DIME">DimeCoin (DIME)</option>
            <option value="FLY">FlyCoin (FLY)</option>
            <option value="HVCO">High Voltage Coin (HVCO)</option>
            <option value="GIZ">GIZMOcoin (GIZ)</option>
            <option value="GREXIT">GrexitCoin (GREXIT)</option>
            <option value="CARBON">Carboncoin (CARBON)</option>
            <option value="DEUR">DigiEuro (DEUR)</option>
            <option value="TUR">Turron (TUR)</option>
            <option value="LEMON">LemonCoin (LEMON)</option>
            <option value="STS">STRESScoin (STS)</option>
            <option value="DISK">Dark Lisk (DISK)</option>
            <option value="NEVA">NevaCoin (NEVA)</option>
            <option value="CYT">Cryptokenz (CYT)</option>
            <option value="FUZZ">Fuzzballs (FUZZ)</option>
            <option value="NKC">Nukecoinz (NKC)</option>
            <option value="SCRT">SecretCoin (SCRT)</option>
            <option value="XRA">Ratecoin (XRA)</option>
            <option value="XNX">XanaxCoin (XNX)</option>
            <option value="STAR*">StarCoin (STAR*)</option>
            <option value="STHR">Stakerush (STHR)</option>
            <option value="DBG">Digital Bullion Gold (DBG)</option>
            <option value="BON">BonesCoin (BON*)</option>
            <option value="WMC">WMCoin (WMC)</option>
            <option value="GOTX">GothicCoin (GOTX)</option>
            <option value="FLVR">FlavorCoin (FLVR)</option>
            <option value="SHREK">ShrekCoin (SHREK)</option>
            <option value="STA*">Stakers (STA*)</option>
            <option value="RISE">Rise (RISE)</option>
            <option value="REV">Revenu (REV)</option>
            <option value="PBC">PabyosiCoin (PBC)</option>
            <option value="OBS">Obscurebay (OBS)</option>
            <option value="EXIT">ExitCoin (EXIT)</option>
            <option value="EDC">EducoinV (EDC)</option>
            <option value="CLINT">Clinton (CLINT)</option>
            <option value="CKC">Clockcoin (CKC)</option>
            <option value="VIP">VIP Tokens (VIP)</option>
            <option value="NXE">NXEcoin (NXE)</option>
            <option value="ZOOM">ZoomCoin (ZOOM)</option>
            <option value="DRACO">DT Token (DRACO)</option>
            <option value="YOVI">YobitVirtualCoin (YOVI)</option>
            <option value="ORLY">OrlyCoin (ORLY)</option>
            <option value="KUBO">KubosCoin (KUBO)</option>
            <option value="INCP">InceptionCoin (INCP)</option>
            <option value="SAK">SharkCoin (SAK)</option>
            <option value="EVIL">EvilCoin (EVIL)</option>
            <option value="OMA">OmegaCoin (OMA)</option>
            <option value="MUE">MonetaryUnit (MUE)</option>
            <option value="COX">CobraCoin (COX)</option>
            <option value="BSD">BitSend (BSD)</option>
            <option value="DES">Destiny (DES)</option>
            <option value="BIT16">16BitCoin (BIT16)</option>
            <option value="PDC">Project Decorum (PDC)</option>
            <option value="CMT">CometCoin (CMT)</option>
            <option value="CHESS">ChessCoin (CHESS)</option>
            <option value="SPACE">SpaceCoin (SPACE)</option>
            <option value="REE">ReeCoin (REE)</option>
            <option value="LQD">Liquid (LQD)</option>
            <option value="MARV">Marvelous (MARV)</option>
            <option value="XDE2">XDE II (XDE2)</option>
            <option value="VEC2">VectorCoin 2.0 (VEC2)</option>
            <option value="OMNI">Omni (OMNI)</option>
            <option value="GSY">GenesysCoin (GSY)</option>
            <option value="TKN*">TrollTokens (TKN*)</option>
            <option value="LIR">Let it Ride (LIR)</option>
            <option value="MMNXT">MMNXT (MMNXT)</option>
            <option value="SCRPT">ScryptCoin (SCRPT)</option>
            <option value="LBC">LBRY Credits (LBC)</option>
            <option value="SBD">Steem Backed Dollars (SBD)</option>
            <option value="CJ">CryptoJacks (CJ)</option>
            <option value="PUT">PutinCoin (PUT)</option>
            <option value="KRAK">Kraken (KRAK)</option>
            <option value="DLISK">Dlisk (DLISK)</option>
            <option value="IBANK">iBankCoin (IBANK)</option>
            <option value="STRAT">Stratis (STRAT)</option>
            <option value="VOYA">Voyacoin (VOYA)</option>
            <option value="ENTER">EnterCoin (ENTER) (ENTER)</option>
            <option value="WGC">World Gold Coin (WGC)</option>
            <option value="BM">BitMoon (BM)</option>
            <option value="FRWC">Frankywillcoin (FRWC)</option>
            <option value="PSY">Psilocybin (PSY)</option>
            <option value="XT">ExtremeCoin (XT)</option>
            <option value="RUST">RustCoin (RUST)</option>
            <option value="NZC">NewZealandCoin (NZC)</option>
            <option value="SNGLS">SingularDTV (SNGLS)</option>
            <option value="XAUR">Xaurum (XAUR)</option>
            <option value="BFX">BitFinex Tokens (BFX)</option>
            <option value="UNIQ">Uniqredit (UNIQ)</option>
            <option value="CRX">ChronosCoin (CRX)</option>
            <option value="DCT">Decent (DCT)</option>
            <option value="XPOKE">PokeChain (XPOKE)</option>
            <option value="MUDRA">MudraCoin (MUDRA)</option>
            <option value="WARP">WarpCoin (WARP)</option>
            <option value="CNMT">Coinomat (CNMT)</option>
            <option value="PIZZA">PizzaCoin (PIZZA)</option>
            <option value="LC">Lutetium Coin (LC)</option>
            <option value="HEAT">Heat Ledger (HEAT)</option>
            <option value="ICN">Iconomi (ICN)</option>
            <option value="EXB">ExaByte (EXB) (EXB)</option>
            <option value="WINGS">Wings DAO (WINGS)</option>
            <option value="CDX*">Cryptodex (CDX*)</option>
            <option value="RBIT">ReturnBit (RBIT)</option>
            <option value="DCS.">deCLOUDs (DCS)</option>
            <option value="KMD">Komodo (KMD)</option>
            <option value="GB">GoldBlocks (GB)</option>
            <option value="ANC">Anoncoin (ANC)</option>
            <option value="SYNX">Syndicate (SYNX)</option>
            <option value="MC">Mass Coin (MC)</option>
            <option value="EDR">E-Dinar Coin (EDR)</option>
            <option value="JWL">Jewels (JWL)</option>
            <option value="WAY">WayCoin (WAY)</option>
            <option value="TAB">MollyCoin (TAB)</option>
            <option value="TRIG">Trigger (TRIG)</option>
            <option value="BITCNY">bitCNY (BITCNY)</option>
            <option value="BITUSD">bitUSD (BITUSD)</option>
            <option value="ATM*">Autumncoin (ATM*)</option>
            <option value="STO">Save The Ocean (STO)</option>
            <option value="SNS">Sense (SNS)</option>
            <option value="FSN">Fusion (FSN)</option>
            <option value="CTC">CarterCoin (CTC)</option>
            <option value="TOT">TotCoin (TOT)</option>
            <option value="BTD">Bitcloud (BTD)</option>
            <option value="BOTS">ArkDAO (BOTS)</option>
            <option value="MDC">MedicCoin (MDC)</option>
            <option value="FTP">FuturePoints (FTP)</option>
            <option value="ZET2">Zeta2Coin (ZET2)</option>
            <option value="COV*">CovenCoin (COV*)</option>
            <option value="KRB">Karbo (KRB)</option>
            <option value="TELL">Tellurion (TELL)</option>
            <option value="ENE">EneCoin (ENE)</option>
            <option value="TDFB">TDFB (TDFB)</option>
            <option value="BLOCKPAY">BlockPay (BLOCKPAY)</option>
            <option value="BXT">BitTokens (BXT)</option>
            <option value="MST">MustangCoin (MST)</option>
            <option value="GOON">Goonies (GOON)</option>
            <option value="VLT">Veltor (VLT)</option>
            <option value="ZNE">ZoneCoin (ZNE)</option>
            <option value="DCK">DickCoin (DCK)</option>
            <option value="COVAL">Circuits of Value (COVAL)</option>
            <option value="DGDC">DarkGold (DGDC)</option>
            <option value="TODAY">TodayCoin (TODAY)</option>
            <option value="VRM">Verium (VRM)</option>
            <option value="ROOT">RootCoin (ROOT)</option>
            <option value="1ST">FirstBlood (1ST)</option>
            <option value="GPL">Gold Pressed Latinum (GPL)</option>
            <option value="DOPE">DopeCoin (DOPE)</option>
            <option value="B3">B3 Coin (B3)</option>
            <option value="FX">FCoin (FX)</option>
            <option value="PIO">Pioneershares (PIO)</option>
            <option value="GAY">GayCoin (GAY)</option>
            <option value="SMSR">Samsara Coin (SMSR)</option>
            <option value="UBIQ">Ubiqoin (UBIQ)</option>
            <option value="ARM">Armory Coin (ARM)</option>
            <option value="RING">RingCoin (RING)</option>
            <option value="ERB">ERBCoin (ERB)</option>
            <option value="LAZ">Lazarus (LAZ)</option>
            <option value="FONZ">FonzieCoin (FONZ)</option>
            <option value="BTCR">BitCurrency (BTCR)</option>
            <option value="SANDG">Save and Gain (SANDG)</option>
            <option value="PNK">SteamPunk (PNK)</option>
            <option value="MOOND">Dark Moon (MOOND)</option>
            <option value="DLC">DollarCoin (DLC)</option>
            <option value="SEN">Sentaro (SEN)</option>
            <option value="SCN">Swiscoin (SCN)</option>
            <option value="WEX">Wexcoin (WEX)</option>
            <option value="LTH">Lathaan (LTH)</option>
            <option value="BRONZ">BitBronze (BRONZ)</option>
            <option value="SH">Shilling (SH)</option>
            <option value="BUZZ">BuzzCoin (BUZZ)</option>
            <option value="MG">Mind Gene (MG)</option>
            <option value="PSI">PSIcoin (PSI)</option>
            <option value="XPO">Opair (XPO)</option>
            <option value="NLC">NoLimitCoin (NLC)</option>
            <option value="PSB">PesoBit (PSB)</option>
            <option value="XBTS">Beats (XBTS)</option>
            <option value="FIT">Fitcoin (FIT)</option>
            <option value="PINKX">PantherCoin (PINKX)</option>
            <option value="FIRE">FireCoin (FIRE)</option>
            <option value="UNF">Unfed Coin (UNF)</option>
            <option value="SPORT">SportsCoin (SPORT)</option>
            <option value="PPY">Peerplays (PPY)</option>
            <option value="NTC">NineElevenTruthCoin (NTC)</option>
            <option value="EGO">EGOcoin (EGO)</option>
            <option value="BTCL*">BitluckCoin (BTCL*)</option>
            <option value="RCN*">RCoin (RCN*)</option>
            <option value="X2">X2Coin (X2)</option>
            <option value="MT">Mycelium Token (MT)</option>
            <option value="TIA">Tianhe (TIA)</option>
            <option value="GBRC">GBR Coin (GBRC)</option>
            <option value="XUP">UPcoin (XUP)</option>
            <option value="HALLO">Halloween Coin (HALLO)</option>
            <option value="BBCC">BaseballCardCoin (BBCC)</option>
            <option value="EMIGR">EmiratesGoldCoin (EMIGR)</option>
            <option value="BHC">BighanCoin (BHC)</option>
            <option value="CRAFT">Craftcoin (CRAFT)</option>
            <option value="INV">Invictus (INV)</option>
            <option value="OLYMP">OlympCoin (OLYMP)</option>
            <option value="DPAY">DelightPay (DPAY)</option>
            <option value="ATOM">Atomic Coin (ATOM)</option>
            <option value="HKG">Hacker Gold (HKG)</option>
            <option value="ANTC">AntiLitecoin (ANTC)</option>
            <option value="JOBS">JobsCoin (JOBS)</option>
            <option value="DGORE">DogeGoreCoin (DGORE)</option>
            <option value="THC">The Hempcoin (THC)</option>
            <option value="TRA">Tetra (TRA)</option>
            <option value="RMS">Resumeo Shares (RMS)</option>
            <option value="FJC">FujiCoin (FJC)</option>
            <option value="VAPOR">Vaporcoin (VAPOR)</option>
            <option value="SDP">SydPakCoin (SDP)</option>
            <option value="RRT">Recovery Right Tokens (RRT)</option>
            <option value="XZC">ZCoin (XZC)</option>
            <option value="PRE">Premium (PRE)</option>
            <option value="CALC">CaliphCoin (CALC)</option>
            <option value="LEA">LeaCoin (LEA)</option>
            <option value="CF">Californium (CF)</option>
            <option value="CRNK">CrankCoin (CRNK)</option>
            <option value="CFC">CoffeeCoin (CFC)</option>
            <option value="VTY">Victoriouscoin (VTY)</option>
            <option value="SFE">Safecoin (SFE)</option>
            <option value="ARDR">Ardor (ARDR)</option>
            <option value="BS">BlackShadowCoin (BS)</option>
            <option value="JIF">JiffyCoin (JIF)</option>
            <option value="CRAB">CrabCoin (CRAB)</option>
            <option value="AIR*">Aircoin (AIR*)</option>
            <option value="HILL">President Clinton (HILL)</option>
            <option value="FOREX">ForexCoin (FOREX)</option>
            <option value="MONETA">Moneta (MONETA)</option>
            <option value="EC">Eclipse (EC)</option>
            <option value="RUBIT">Rublebit (RUBIT)</option>
            <option value="HCC">HappyCreatorCoin (HCC)</option>
            <option value="BRAIN">BrainCoin (BRAIN)</option>
            <option value="VTX">Vertex (VTX)</option>
            <option value="KRC">KRCoin (KRC)</option>
            <option value="LFC">BigLifeCoin (LFC)</option>
            <option value="ZUR">Zurcoin (ZUR)</option>
            <option value="NUBIS">NubisCoin (NUBIS)</option>
            <option value="TENNET">Tennet (TENNET)</option>
            <option value="PEC">PeaceCoin (PEC)</option>
            <option value="GMX">Goldmaxcoin (GMX)</option>
            <option value="32BIT">32Bitcoin (32BIT)</option>
            <option value="GNJ">GanjaCoin V2 (GNJ)</option>
            <option value="TEAM">TeamUP (TEAM)</option>
            <option value="SCT">ScryptToken (SCT)</option>
            <option value="LANA">LanaCoin (LANA)</option>
            <option value="ELE">Elementrem (ELE)</option>
            <option value="GCC">GuccioneCoin (GCC)</option>
            <option value="AND">AndromedaCoin (AND)</option>
            <option value="GBYTE">Byteball (GBYTE)</option>
            <option value="EQUAL">EqualCoin (EQUAL)</option>
            <option value="SWEET">SweetStake (SWEET)</option>
            <option value="2BACCO">2BACCO Coin (2BACCO)</option>
            <option value="DKC">DarkKnightCoin (DKC)</option>
            <option value="COC">Community Coin (COC)</option>
            <option value="CHOOF">ChoofCoin (CHOOF)</option>
            <option value="CSH">CashOut (CSH)</option>
            <option value="ZCL">ZClassic (ZCL)</option>
            <option value="RYCN">RoyalCoin 2.0 (RYCN)</option>
            <option value="PCS">Pabyosi Coin (PCS)</option>
            <option value="NBIT">NetBit (NBIT)</option>
            <option value="WINE">WineCoin (WINE)</option>
            <option value="DAR">Darcrus (DAR)</option>
            <option value="ARK">ARK (ARK)</option>
            <option value="IFLT">InflationCoin (IFLT)</option>
            <option value="ZECD">ZCashDarkCoin (ZECD)</option>
            <option value="ZXT">Zcrypt (ZXT)</option>
            <option value="WASH">WashingtonCoin (WASH)</option>
            <option value="TESLA">TeslaCoilCoin (TESLA)</option>
            <option value="VSL">vSlice (VSL)</option>
            <option value="TPG">Troll Payment (TPG)</option>
            <option value="LEO">LEOcoin (LEO)</option>
            <option value="MDT">Midnight (MDT)</option>
            <option value="CBD">CBD Crystals (CBD)</option>
            <option value="PEX">PosEx (PEX)</option>
            <option value="INSANE">InsaneCoin (INSANE)</option>
            <option value="PEN">PenCoin (PEN)</option>
            <option value="BASH">LuckChain (BASH)</option>
            <option value="FAME">FameCoin (FAME)</option>
            <option value="LIV">LiviaCoin (LIV)</option>
            <option value="SP">Sex Pistols (SP)</option>
            <option value="MEGA">MegaFlash (MEGA)</option>
            <option value="VRS">Veros (VRS)</option>
            <option value="ALC">Arab League Coin (ALC)</option>
            <option value="DOGETH">EtherDoge (DOGETH)</option>
            <option value="KLC">KiloCoin (KLC)</option>
            <option value="HUSH">Hush (HUSH)</option>
            <option value="BTLC">BitLuckCoin (BTLC)</option>
            <option value="DRM8">Dream8Coin (DRM8)</option>
            <option value="FIST">FistBump (FIST)</option>
            <option value="EBZ">Ebitz (EBZ)</option>
            <option value="DRS">Digital Rupees (DRS)</option>
            <option value="FGZ">Free Game Zone (FGZ)</option>
            <option value="BOSON">BosonCoin (BOSON)</option>
            <option value="ATX">ArtexCoin (ATX)</option>
            <option value="PNC">PlatiniumCoin (PNC)</option>
            <option value="BRDD">BeardDollars (BRDD)</option>
            <option value="TIME">Time (TIME)</option>
            <option value="BIP">BipCoin (BIP)</option>
            <option value="XNC">XenCoin (XNC)</option>
            <option value="EMB">EmberCoin (EMB)</option>
            <option value="BTTF">Coin to the Future (BTTF)</option>
            <option value="DLR">DollarOnline (DLR)</option>
            <option value="CSMIC">Cosmic (CSMIC)</option>
            <option value="FIRST">FirstCoin (FIRST)</option>
            <option value="SCASH">SpaceCash (SCASH)</option>
            <option value="XEN">XenixCoin (XEN)</option>
            <option value="JIO">JIO Token (JIO)</option>
            <option value="IW">iWallet (IW)</option>
            <option value="JNS">Janus (JNS)</option>
            <option value="TRICK">TrickyCoin (TRICK)</option>
            <option value="DCRE">DeltaCredits (DCRE)</option>
            <option value="FRE">FreeCoin (FRE)</option>
            <option value="NPC">NPCcoin (NPC)</option>
            <option value="PLNC">PLNCoin (PLNC)</option>
            <option value="DGMS">Digigems (DGMS)</option>
            <option value="ICOB">Icobid (ICOB)</option>
            <option value="ARCO">AquariusCoin (ARCO)</option>
            <option value="KURT">Kurrent (KURT)</option>
            <option value="XCRE">Creatio (XCRE)</option>
            <option value="ENT">Eternity (ENT)</option>
            <option value="UR">UR (UR)</option>
            <option value="MTLM3">Metal Music v3 (MTLM3)</option>
            <option value="ODNT">Old Dogs New Tricks (ODNT)</option>
            <option value="EUC">Eurocoin (EUC)</option>
            <option value="CCX">CoolDarkCoin (CCX)</option>
            <option value="BCF">BitcoinFast (BCF)</option>
            <option value="SEEDS">SeedShares (SEEDS)</option>
            <option value="POSW">PoSWallet (POSW)</option>
            <option value="TKS">Tokes (TKS)</option>
            <option value="BCCOIN">BitConnect Coin (BCCOIN)</option>
            <option value="SHORTY">ShortyCoin (SHORTY)</option>
            <option value="PCM">Procom (PCM)</option>
            <option value="KC">Kernalcoin (KC)</option>
            <option value="CORAL">CoralPay (CORAL)</option>
            <option value="BamitCoin">BAM (BAM)</option>
            <option value="NXC">Nexium (NXC)</option>
            <option value="MONEY">MoneyCoin (MONEY)</option>
            <option value="BSTAR">Blackstar (BSTAR)</option>
            <option value="HSP">Horse Power (HSP)</option>
            <option value="HZT">HazMatCoin (HZT)</option>
            <option value="XSP">PoolStamp (XSP)</option>
            <option value="BULLS">BullshitCoin (BULLS)</option>
            <option value="INCNT">Incent (INCNT)</option>
            <option value="ICON">Iconic (ICON)</option>
            <option value="NIC">NewInvestCoin (NIC)</option>
            <option value="ACN">AvonCoin (ACN)</option>
            <option value="XNG">Enigma (XNG)</option>
            <option value="XCI">Cannabis Industry Coin (XCI)</option>
            <option value="LOOK">LookCoin (LOOK)</option>
            <option value="LOC">Loco (LOC)</option>
            <option value="MMXVI">MMXVI (MMXVI)</option>
            <option value="TRST">TrustCoin (TRST)</option>
            <option value="MIS">MIScoin (MIS)</option>
            <option value="WOP">WorldPay (WOP)</option>
            <option value="CQST">ConquestCoin (CQST)</option>
            <option value="IMPS">Impulse Coin (IMPS)</option>
            <option value="IN">InCoin (IN)</option>
            <option value="CHIEF">TheChiefCoin (CHIEF)</option>
            <option value="GOAT">Goat (GOAT)</option>
            <option value="ANAL">AnalCoin (ANAL)</option>
            <option value="RC">Russiacoin (RC)</option>
            <option value="PND">PandaCoin (PND)</option>
            <option value="PX">PXcoin (PX)</option>
            <option value="CND*">Canada eCoin (CND*)</option>
            <option value="OPTION">OptionCoin (OPTION)</option>
            <option value="AV">Avatar Coin (AV)</option>
            <option value="LTD">Limited Coin (LTD)</option>
            <option value="UNITS">GameUnits (UNITS)</option>
            <option value="HEEL">HeelCoin (HEEL)</option>
            <option value="GAKH">GAKHcoin (GAKH)</option>
            <option value="SHIFT">Shift (SHIFT)</option>
            <option value="S8C">S88 Coin (S8C)</option>
            <option value="LVG">Leverage Coin (LVG)</option>
            <option value="DRA">DraculaCoin (DRA)</option>
            <option value="ASAFE2">Allsafe (ASAFE2)</option>
            <option value="LTCR">LiteCreed (LTCR)</option>
            <option value="QBC">Quebecoin (QBC)</option>
            <option value="XPRO">ProCoin (XPRO)</option>
            <option value="AST*">Astral (AST*)</option>
            <option value="GIFT">GiftNet (GIFT)</option>
            <option value="VIDZ">PureVidz (VIDZ)</option>
            <option value="INC">Incrementum (INC)</option>
            <option value="PTA">PentaCoin (PTA)</option>
            <option value="ACID">AcidCoin (ACID)</option>
            <option value="ZLQ">ZLiteQubit (ZLQ)</option>
            <option value="RADI">RadicalCoin (RADI)</option>
            <option value="RNC">ReturnCoin (RNC)</option>
            <option value="GOLOS">Golos (GOLOS)</option>
            <option value="PASC">Pascal Coin (PASC)</option>
            <option value="TWIST">TwisterCoin (TWIST)</option>
            <option value="PAYP">PayPeer (PAYP)</option>
            <option value="DETH">DarkEther (DETH)</option>
            <option value="YAY">YAYcoin (YAY)</option>
            <option value="YES">YesCoin (YES)</option>
            <option value="LENIN">LeninCoin (LENIN)</option>
            <option value="MRSA">MrsaCoin (MRSA)</option>
            <option value="OS76">OsmiumCoin (OS76)</option>
            <option value="BOSS">BitBoss (BOSS)</option>
            <option value="MKR">Maker (MKR)</option>
            <option value="BIC">Bikercoins (BIC)</option>
            <option value="CRPS">CryptoPennies (CRPS)</option>
            <option value="MOTO">Motocoin (MOTO)</option>
            <option value="NTCC">NeptuneClassic (NTCC)</option>
            <option value="XNC*">Numismatic Collections (XNC*)</option>
            <option value="HXX">HexxCoin (HXX)</option>
            <option value="SPKTR">Ghost Coin (SPKTR)</option>
            <option value="SEL">SelenCoin (SEL)</option>
            <option value="NOO">Noocoin (NOO)</option>
            <option value="CHAO">23 Skidoo (CHAO)</option>
            <option value="XGB">GoldenBird (XGB)</option>
            <option value="YMC">YamahaCoin (YMC)</option>
            <option value="JOK">JokerCoin (JOK)</option>
            <option value="GBIT">GravityBit (GBIT)</option>
            <option value="TEC">TeCoin (TEC)</option>
            <option value="BOMB">BombCoin (BOMB)</option>
            <option value="RIDE">Ride My Car (RIDE)</option>
            <option value="PIVX">Private Instant Verified Transaction (PIVX)</option>
            <option value="KED">Klingon Empire Darsek (KED)</option>
            <option value="CNO">Coino (CNO)</option>
            <option value="WEALTH">WealthCoin (WEALTH)</option>
            <option value="XSPEC">Spectre (XSPEC)</option>
            <option value="PEPECASH">Pepe Cash (PEPECASH)</option>
            <option value="CLICK">Clickcoin (CLICK)</option>
            <option value="ELS">Elysium (ELS)</option>
            <option value="KUSH">KushCoin (KUSH)</option>
            <option value="ERY">Eryllium (ERY)</option>
            <option value="PRES">President Trump (PRES)</option>
            <option value="BTZ">BitzCoin (BTZ)</option>
            <option value="OPES">Opes (OPES)</option>
            <option value="WCT">Waves Community Token (WCT)</option>
            <option value="UBQ">Ubiq (UBQ)</option>
            <option value="RATIO">Ratio (RATIO)</option>
            <option value="BAN">Babes and Nerds (BAN)</option>
            <option value="NICE">NiceCoin (NICE)</option>
            <option value="SMF">SmurfCoin (SMF)</option>
            <option value="CWXT">CryptoWorldXToken (CWXT)</option>
            <option value="TECH">TechCoin (TECH)</option>
            <option value="CIR">CircuitCoin (CIR)</option>
            <option value="LEPEN">LePenCoin (LEPEN)</option>
            <option value="ROUND">RoundCoin (ROUND)</option>
            <option value="MAR">MarijuanaCoin (MAR)</option>
            <option value="MARX">MarxCoin (MARX)</option>
            <option value="TAT">Tatiana Coin (TAT)</option>
            <option value="HAZE">HazeCoin (HAZE)</option>
            <option value="PRX">Printerium (PRX)</option>
            <option value="NRC">Neurocoin (NRC)</option>
            <option value="IMPCH">Impeach (IMPCH)</option>
            <option value="ERR">ErrorCoin (ERR)</option>
            <option value="TIC">TrueInvestmentCoin (TIC)</option>
            <option value="NUKE">NukeCoin (NUKE)</option>
            <option value="EOC">EveryonesCoin (EOC)</option>
            <option value="SFC">Solarflarecoin (SFC)</option>
            <option value="JANE">JaneCoin (JANE)</option>
            <option value="PARA">ParanoiaCoin (PARA)</option>
            <option value="MM">MasterMint (MM)</option>
            <option value="BXC">Bitcedi (BXC)</option>
            <option value="NDOGE">NinjaDoge (NDOGE)</option>
            <option value="ZBC">Zilbercoin (ZBC)</option>
            <option value="MLN">Melon (MLN)</option>
            <option value="FRST">FirstCoin (FRST)</option>
            <option value="PAY">TenX (PAY)</option>
            <option value="ORO">OroCoin (ORO)</option>
            <option value="ALEX">Alexandrite (ALEX)</option>
            <option value="TBCX">TrashBurn (TBCX)</option>
            <option value="MCAR">MasterCar (MCAR)</option>
            <option value="THS">TechShares (THS)</option>
            <option value="ACES">AcesCoin (ACES)</option>
            <option value="UAEC">United Arab Emirates Coin (UAEC)</option>
            <option value="EA">EagleCoin (EA)</option>
            <option value="PIE">Persistent Information Exchange (PIE)</option>
            <option value="CREA">CreativeChain (CREA)</option>
            <option value="WISC">WisdomCoin (WISC)</option>
            <option value="BVC">BeaverCoin (BVC)</option>
            <option value="FIND">FindCoin (FIND)</option>
            <option value="MLITE">MeLite (MLITE)</option>
            <option value="STALIN">StalinCoin (STALIN)</option>
            <option value="TSE">TattooCoin (TSE)</option>
            <option value="VLTC">VaultCoin (VLTC)</option>
            <option value="BIOB">BioBar (BIOB)</option>
            <option value="SWT">Swarm City Token (SWT)</option>
            <option value="PASL">Pascal Lite (PASL)</option>
            <option value="CHAT">ChatCoin (CHAT)</option>
            <option value="CDN">Canada eCoin (CDN)</option>
            <option value="TPAY">TrollPlay (TPAY)</option>
            <option value="NETKO">Netko (NETKO)</option>
            <option value="HONEY">Honey (HONEY)</option>
            <option value="MXT">MartexCoin (MXT)</option>
            <option value="MUSIC">Musicoin (MUSIC)</option>
            <option value="DTB">Databits (DTB)</option>
            <option value="VEG">BitVegan (VEG)</option>
            <option value="MBIT">Mbitbooks (MBIT)</option>
            <option value="VOLT">BitVolt (VOLT)</option>
            <option value="MGO">MobileGo (MGO)</option>
            <option value="EDG">Edgeless (EDG)</option>
            <option value="B@">BankCoin (B@)</option>
            <option value="BEST">BestChain (BEST)</option>
            <option value="CHC">ChainCoin (CHC)</option>
            <option value="ZENI">Zennies (ZENI)</option>
            <option value="PLANET">PlanetCoin (PLANET)</option>
            <option value="DUCK">DuckDuckCoin (DUCK)</option>
            <option value="BNX">BnrtxCoin (BNX)</option>
            <option value="BSTK">BattleStake (BSTK)</option>
            <option value="RNS">RenosCoin (RNS)</option>
            <option value="DBIX">DubaiCoin (DBIX)</option>
            <option value="AMIS">AMIS (AMIS)</option>
            <option value="KAYI">Kayı (KAYI)</option>
            <option value="XVP">VirtacoinPlus (XVP)</option>
            <option value="BOAT">Doubloon (BOAT)</option>
            <option value="TAJ">TajCoin (TAJ)</option>
            <option value="IMX">Impact (IMX)</option>
            <option value="CJC">CryptoJournal (CJC)</option>
            <option value="AMY">Amygws (AMY)</option>
            <option value="QBT">Cubits (QBT)</option>
            <option value="SRC*">StarCredits (SRC*)</option>
            <option value="EB3">EB3coin (EB3)</option>
            <option value="XVE">The Vegan Initiative (XVE)</option>
            <option value="FAZZ">FazzCoin (FAZZ)</option>
            <option value="APT">Aptcoin (APT)</option>
            <option value="BLAZR">BlazerCoin (BLAZR)</option>
            <option value="ARPA">ArpaCoin (ARPA)</option>
            <option value="BNB*">Boats and Bitches (BNB*)</option>
            <option value="UNI">Universe (UNI)</option>
            <option value="ECO">ECOcoin (ECO)</option>
            <option value="XLR">Solaris (XLR)</option>
            <option value="DARK">Dark (DARK)</option>
            <option value="DON">DonationCoin (DON)</option>
            <option value="MER">Mercury (MER)</option>
            <option value="WGO">WavesGO (WGO)</option>
            <option value="RLC">iEx.ec (RLC)</option>
            <option value="ATMS">Atmos (ATMS)</option>
            <option value="INPAY">InPay (INPAY)</option>
            <option value="ETT">EncryptoTel (ETT)</option>
            <option value="WBTC*">wBTC (WBTC*)</option>
            <option value="VISIO">Visio (VISIO)</option>
            <option value="HPC">HappyCoin (HPC)</option>
            <option value="GOT">Giotto Coin (GOT)</option>
            <option value="CXT">Coinonat (CXT)</option>
            <option value="EMPC">EmporiumCoin (EMPC)</option>
            <option value="GNO">Gnosis (GNO)</option>
            <option value="LGD">Legends Cryptocurrency (LGD)</option>
            <option value="TAAS">Token as a Service (TAAS)</option>
            <option value="BUCKS">SwagBucks (BUCKS)</option>
            <option value="XBY">XtraBYtes (XBY)</option>
            <option value="GUP">Guppy (GUP)</option>
            <option value="MCRN">MacronCoin (MCRN)</option>
            <option value="LUN">Lunyr (LUN)</option>
            <option value="RAIN">Condensate (RAIN)</option>
            <option value="WSX">WeAreSatoshi (WSX)</option>
            <option value="IEC">IvugeoEvolutionCoin (IEC)</option>
            <option value="IMS">Independent Money System (IMS)</option>
            <option value="ARGUS">ArgusCoin (ARGUS)</option>
            <option value="CNT">Centurion (CNT)</option>
            <option value="LMC">LomoCoin (LMC)</option>
            <option value="TKN">TokenCard (TKN)</option>
            <option value="BTCS">Bitcoin Scrypt (BTCS)</option>
            <option value="PROC">ProCurrency (PROC)</option>
            <option value="XGR">GoldReserve (XGR)</option>
            <option value="WRC*">WarCoin (WRC*)</option>
            <option value="BENJI">BenjiRolls (BENJI)</option>
            <option value="HMQ">Humaniq (HMQ)</option>
            <option value="BCAP">Blockchain Capital (BCAP)</option>
            <option value="DUO">ParallelCoin (DUO)</option>
            <option value="RBX">RiptoBuX (RBX)</option>
            <option value="GRW">GrowthCoin (GRW)</option>
            <option value="APX">Apx (APX)</option>
            <option value="MILO">MiloCoin (MILO)</option>
            <option value="OLV">OldV (OLV)</option>
            <option value="ILC">ILCoin (ILC)</option>
            <option value="MRT">MinersReward (MRT)</option>
            <option value="IOU">IOU1 (IOU)</option>
            <option value="PZM">Prizm (PZM)</option>
            <option value="PHR">Phreak (PHR)</option>
            <option value="ANT">Aragon (ANT)</option>
            <option value="PUPA">PupaCoin (PUPA)</option>
            <option value="RICE">RiceCoin (RICE)</option>
            <option value="XCT">C-Bits (XCT)</option>
            <option value="RED">Redcoin (RED)</option>
            <option value="ZSE">ZSEcoin (ZSE)</option>
            <option value="CTIC">Coinmatic (CTIC)</option>
            <option value="TAP">TappingCoin (TAP)</option>
            <option value="BITOK">BitOKX (BITOK)</option>
            <option value="PBT">Primalbase (PBT)</option>
            <option value="MUU">MilkCoin (MUU)</option>
            <option value="INF8">Infinium-8 (INF8)</option>
            <option value="HTML5">HTML5 Coin (HTML5)</option>
            <option value="MNE">Minereum (MNE)</option>
            <option value="DICE">Etheroll (DICE)</option>
            <option value="SUB*">Subscriptio (SUB*)</option>
            <option value="USC">Ultimate Secure Cash (USC)</option>
            <option value="DUX">DuxCoin (DUX)</option>
            <option value="XPS">PoisonIvyCoin (XPS)</option>
            <option value="EQT">EquiTrader (EQT)</option>
            <option value="INSN">Insane Coin (INSN)</option>
            <option value="BAT">Basic Attention Token (BAT)</option>
            <option value="MAT*">Manet Coin (MAT*)</option>
            <option value="F16">F16Coin (F16)</option>
            <option value="HAMS">HamsterCoin (HAMS)</option>
            <option value="QTUM">QTUM (QTUM)</option>
            <option value="NEF">NefariousCoin (NEF)</option>
            <option value="BOS">BOScoin (BOS)</option>
            <option value="QWARK">Qwark (QWARK)</option>
            <option value="IOT">IOTA (IOT)</option>
            <option value="QRL">Quantum Resistant Ledger (QRL)</option>
            <option value="ADL">Adelphoi (ADL)</option>
            <option value="ECC*">E-CurrencyCoin (ECC*)</option>
            <option value="PTOY">Patientory (PTOY)</option>
            <option value="ZRC">ZrCoin (ZRC)</option>
            <option value="LKK">Lykke (LKK)</option>
            <option value="ESP">Espers (ESP)</option>
            <option value="MAD">SatoshiMadness (MAD)</option>
            <option value="DYN">Dynamic (DYN)</option>
            <option value="SEQ">Sequence (SEQ)</option>
            <option value="MCAP">MCAP (MCAP)</option>
            <option value="MYST">Mysterium (MYST)</option>
            <option value="VERI">Veritaseum (VERI)</option>
            <option value="SNM">SONM (SNM)</option>
            <option value="CFI">Cofound.it (CFI)</option>
            <option value="SNT">Status Network Token (SNT)</option>
            <option value="AVT">AventCoin (AVT)</option>
            <option value="CVC">Civic (CVC)</option>
            <option value="IXT">iXledger (IXT)</option>
            <option value="DENT">Dent (DENT)</option>
            <option value="BQX">Ethos (ETHOS)</option>
            <option value="STA">Starta (STA)</option>
            <option value="TFL">True Flip Lottery (TFL)</option>
            <option value="EFYT">Ergo (EFYT)</option>
            <option value="XTZ">Tezos (XTZ)</option>
            <option value="MCO">Monaco (MCO)</option>
            <option value="NMR">Numerai (NMR)</option>
            <option value="ADX">AdEx (ADX)</option>
            <option value="QAU">Quantum (QAU)</option>
            <option value="ECOB">EcoBit (ECOB)</option>
            <option value="PLBT">Polybius (PLBT)</option>
            <option value="USDT">Tether (USDT)</option>
            <option value="XRB">Nano (XRB)</option>
            <option value="AHT">Ahoolee (AHT)</option>
            <option value="ATB">ATB coin (ATB)</option>
            <option value="TIX">Blocktix (TIX)</option>
            <option value="CMP">Compcoin (CMP)</option>
            <option value="RVT">Rivetz (RVT)</option>
            <option value="HRB">Harbour DAO (HRB)</option>
            <option value="NET*">Nimiq Exchange Token (NET*)</option>
            <option value="8BT">8 Circuit Studios (8BT)</option>
            <option value="ACT">ACT (ACT)</option>
            <option value="DNT">district0x (DNT)</option>
            <option value="SUR">Suretly (SUR)</option>
            <option value="PING">CryptoPing (PING)</option>
            <option value="MIV">MakeItViral (MIV)</option>
            <option value="BET*">DAO.casino (BET*)</option>
            <option value="SAN">Santiment (SAN)</option>
            <option value="KIN">Kin (KIN)</option>
            <option value="WGR">Wagerr (WGR)</option>
            <option value="XEL">Elastic (XEL)</option>
            <option value="NVST">NVO (NVST)</option>
            <option value="FUN">FunFair (FUN)</option>
            <option value="FUNC">FunCoin (FUNC)</option>
            <option value="PQT">PAquarium (PQT)</option>
            <option value="WTT">Giga Watt (WTT)</option>
            <option value="MTL">Metal (MTL)</option>
            <option value="HVN">Hive Project (HVN)</option>
            <option value="MYB">MyBit (MYB)</option>
            <option value="PPT">Populous (PPT)</option>
            <option value="SNC">SunContract (SNC)</option>
            <option value="STAR">Starbase (STAR)</option>
            <option value="COR">Corion (COR)</option>
            <option value="XRL">Rialto.AI (XRL)</option>
            <option value="OROC">Orocrypt (OROC)</option>
            <option value="OAX">OpenANX (OAX)</option>
            <option value="MBI">Monster Byte Inc (MBI)</option>
            <option value="DDF">Digital Developers Fund (DDF)</option>
            <option value="DIM">DIMCOIN (DIM)</option>
            <option value="DNA">Encrypgen (DNA)</option>
            <option value="FYN">FundYourselfNow (FYN)</option>
            <option value="DCY">Dinastycoin (DCY)</option>
            <option value="CFT">CryptoForecast (CFT)</option>
            <option value="DNR">Denarius (DNR)</option>
            <option value="DP">DigitalPrice (DP)</option>
            <option value="VUC">Virta Unique Coin (VUC)</option>
            <option value="BTPL">Bitcoin Planet (BTPL)</option>
            <option value="UNIFY">Unify (UNIFY)</option>
            <option value="IPC">ImperialCoin (IPC)</option>
            <option value="BRIT">BritCoin (BRIT)</option>
            <option value="AMMO">Ammo Rewards (AMMO)</option>
            <option value="SOCC">SocialCoin (SOCC)</option>
            <option value="MASS">Mass.Cloud (MASS)</option>
            <option value="LA">LATOKEN (LA)</option>
            <option value="IML">IMMLA (IML)</option>
            <option value="STU">BitJob (STU)</option>
            <option value="PLR">Pillar (PLR)</option>
            <option value="GUNS">GeoFunders (GUNS)</option>
            <option value="IFT">InvestFeed (IFT)</option>
            <option value="CAT*">BitClave (CAT)</option>
            <option value="PRO">Propy (PRO)</option>
            <option value="SYC">SynchroCoin (SYC)</option>
            <option value="IND">Indorse (IND)</option>
            <option value="AHT*">Bowhead Health (AHT*)</option>
            <option value="TRIBE">TribeToken (TRIBE)</option>
            <option value="ZRX">0x (ZRX)</option>
            <option value="TNT">Tierion (TNT)</option>
            <option value="PRE*">Presearch (PRE*)</option>
            <option value="COSS">COSS (COSS)</option>
            <option value="STORM">Storm (STORM)</option>
            <option value="STORJ">Storj (STORJ)</option>
            <option value="SCORE">Scorecoin (SCORE)</option>
            <option value="OMG">OmiseGo (OMG)</option>
            <option value="OTX">Octanox (OTX)</option>
            <option value="EQB">Equibit (EQB)</option>
            <option value="VOISE">Voise (VOISE)</option>
            <option value="ETBS">EthBits (ETBS)</option>
            <option value="CVCOIN">Crypviser (CVCOIN)</option>
            <option value="DRP">DCORP (DRP)</option>
            <option value="ARC">ArcticCoin (ARC)</option>
            <option value="BOG">Bogcoin (BOG)</option>
            <option value="NDC">NeverDie (NDC)</option>
            <option value="POE">Po.et (POE)</option>
            <option value="ADT">AdToken (ADT)</option>
            <option value="AE">Aeternity (AE)</option>
            <option value="UET">Useless Ethereum Token (UET)</option>
            <option value="PART">Particl (PART)</option>
            <option value="AGRS">Agoras Token (AGRS)</option>
            <option value="SAND">BeachCoin (SAND)</option>
            <option value="XAI*">AICoin (XAI*)</option>
            <option value="DMT">DMarket (DMT)</option>
            <option value="DAS">DAS (DAS)</option>
            <option value="ADST">Adshares (ADST)</option>
            <option value="CAT">BlockCAT (CAT*)</option>
            <option value="XCJ">CoinJob (XCJ)</option>
            <option value="RKC">Royal Kingdom Coin (RKC)</option>
            <option value="NLC2">NoLimitCoin (NLC2)</option>
            <option value="LINDA">Linda (LINDA)</option>
            <option value="SPN">Spoon (SPN)</option>
            <option value="KING">King93 (KING)</option>
            <option value="ANCP">Anacrypt (ANCP)</option>
            <option value="ROOTS">RootProject (ROOTS)</option>
            <option value="SNK">Sosnovkino (SNK)</option>
            <option value="CABS">CryptoABS (CABS)</option>
            <option value="OPT">Opus (OPT)</option>
            <option value="ZNT">OpenZen (ZNT)</option>
            <option value="BITSD">Bits Digit (BITSD)</option>
            <option value="XLC">LeviarCoin (XLC)</option>
            <option value="SKIN">Skincoin (SKIN)</option>
            <option value="MSP">Mothership (MSP)</option>
            <option value="HIRE">HireMatch (HIRE)</option>
            <option value="BBT*">BrickBlock (BBT*)</option>
            <option value="REAL">REAL (REAL)</option>
            <option value="DFBT">DentalFix (DFBT)</option>
            <option value="EQ">EQUI (EQ)</option>
            <option value="WLK">Wolk (WLK)</option>
            <option value="ONION">DeepOnion (ONION)</option>
            <option value="BTX">Bitcore (BTX)</option>
            <option value="ICE">iDice (ICE)</option>
            <option value="XID">Sphre AIR (XID)</option>
            <option value="GCN">gCn Coin (GCN)</option>
            <option value="ATOM*">Cosmos (ATOM*)</option>
            <option value="ICOO">ICO OpenLedger (ICOO)</option>
            <option value="TME">Timereum (TME)</option>
            <option value="SMART">SmartCash (SMART)</option>
            <option value="SIGT">Signatum (SIGT)</option>
            <option value="ONX">Onix (ONX)</option>
            <option value="COE">CoEval (COE)</option>
            <option value="ARENA">Arena (ARENA)</option>
            <option value="WINK">Wink (WINK)</option>
            <option value="CRM">Cream (CRM)</option>
            <option value="DGPT">DigiPulse (DGPT)</option>
            <option value="MOBI">Mobius (MOBI)</option>
            <option value="CSNO">BitDice (CSNO)</option>
            <option value="KICK">KickCoin (KICK)</option>
            <option value="SDAO">Solar DAO (SDAO)</option>
            <option value="STX">Stox (STX)</option>
            <option value="BNB">Binance Coin (BNB)</option>
            <option value="CORE">Core Group Asset (CORE)</option>
            <option value="KCN">Kencoin (KCN)</option>
            <option value="QVT">Qvolta (QVT)</option>
            <option value="TIE">Ties Network (TIE)</option>
            <option value="AUT">Autoria (AUT)</option>
            <option value="CTT">CodeTract (CTT)</option>
            <option value="GRWI">Growers International (GRWI)</option>
            <option value="MNY">Monkey (MNY)</option>
            <option value="MTH">Monetha (MTH)</option>
            <option value="CCC">CCCoin (CCC)</option>
            <option value="UMC">Umbrella Coin (UMC)</option>
            <option value="BMXT">Bitmxittz (BMXT)</option>
            <option value="GAS">Gas (GAS)</option>
            <option value="FIL">FileCoin (FIL)</option>
            <option value="OCL">Oceanlab (OCL)</option>
            <option value="BNC">Benjacoin (BNC)</option>
            <option value="TOM">Tomahawkcoin (TOM)</option>
            <option value="BTM*">Bytom (BTM*)</option>
            <option value="XAS">Asch (XAS)</option>
            <option value="SMNX">SMNX (SMNX)</option>
            <option value="DCN">Dentacoin (DCN)</option>
            <option value="DLT">Agrello Delta (DLT)</option>
            <option value="MRV">Macroverse (MRV)</option>
            <option value="MBRS">Embers (MBRS)</option>
            <option value="SUB">Substratum Network (SUB)</option>
            <option value="MET">Memessenger (MET)</option>
            <option value="NEBL">Neblio (NEBL)</option>
            <option value="PGL">Prospectors (PGL)</option>
            <option value="AUTH">Authoreon (AUTH)</option>
            <option value="CASH*">Cash Poker Pro (CASH*)</option>
            <option value="CMPCO">CampusCoin (CMPCO)</option>
            <option value="DTCT">DetectorToken (DTCT)</option>
            <option value="CTR">Centra (CTR)</option>
            <option value="WNET">Wavesnode.net (WNET)</option>
            <option value="PRG">Paragon (PRG)</option>
            <option value="THNX">ThankYou (THNX)</option>
            <option value="WORM">HealthyWorm (WORM)</option>
            <option value="VNT">Veredictum (VNT)</option>
            <option value="SIFT">Smart Investment Fund Token (SIFT)</option>
            <option value="IGNIS">Ignis (IGNIS)</option>
            <option value="IWT">IwToken (IWT)</option>
            <option value="JDC">JustDatingSite (JDC)</option>
            <option value="ITT">Intelligent Trading Technologies (ITT)</option>
            <option value="AIX">Aigang (AIX)</option>
            <option value="EVX">Everex (EVX)</option>
            <option value="ENTRP">Entropy Token (ENTRP)</option>
            <option value="ICOS">ICOBox (ICOS)</option>
            <option value="PIX">Lampix (PIX)</option>
            <option value="MEDI">MediBond (MEDI)</option>
            <option value="HGT">Hello Gold (HGT)</option>
            <option value="LTA">Litra (LTA)</option>
            <option value="NIMFA">Nimfamoney (NIMFA)</option>
            <option value="SCOR">Scorista (SCOR)</option>
            <option value="MLS">CPROP (MLS)</option>
            <option value="KEX">KexCoin (KEX)</option>
            <option value="COB">Cobinhood (COB)</option>
            <option value="BRO">Bitradio (BRO)</option>
            <option value="MINEX">Minex (MINEX)</option>
            <option value="ATL">ATLANT (ATL)</option>
            <option value="ARI*">BeckSang (ARI*)</option>
            <option value="MAG*">Magos (MAG*)</option>
            <option value="DFT">Draftcoin (DFT)</option>
            <option value="VEN">Vechain (VEN)</option>
            <option value="UTK">Utrust (UTK)</option>
            <option value="LAT">Latium (LAT)</option>
            <option value="SOJ">Sojourn Coin (SOJ)</option>
            <option value="HDG">Hedge Token (HDG)</option>
            <option value="STCN">Stakecoin (STCN)</option>
            <option value="SQP">SqPay (SQP)</option>
            <option value="RIYA">Etheriya (RIYA)</option>
            <option value="LNK">Ethereum.Link (LNK)</option>
            <option value="AMB">Ambrosus (AMB)</option>
            <option value="WAN">Wanchain (WAN)</option>
            <option value="MNT">GoldMint (MNT)</option>
            <option value="ALTOCAR">AltoCar (ALTOCAR)</option>
            <option value="CFT*">Credo (CFT*)</option>
            <option value="BLX">Blockchain Index (BLX)</option>
            <option value="BKX">BANKEX (BKX)</option>
            <option value="BOU">Boulle (BOU)</option>
            <option value="OXY">Oxycoin (OXY)</option>
            <option value="AMT">Acumen (AMT)</option>
            <option value="GIM">Gimli (GIM)</option>
            <option value="LBTC">LiteBitcoin (LBTC)</option>
            <option value="FRAZ">FrazCoin (FRAZ)</option>
            <option value="EMT">EasyMine (EMT)</option>
            <option value="GXC">Gx Coin (GXC)</option>
            <option value="HBT">Hubiit (HBT)</option>
            <option value="KRONE">Kronecoin (KRONE)</option>
            <option value="SRT">Scrypto (SRT)</option>
            <option value="AVA">Avalon (AVA)</option>
            <option value="BT">BuildTeam (BT)</option>
            <option value="ACC">AdCoin (ACC)</option>
            <option value="Z2">Z2 Coin (Z2)</option>
            <option value="LINX">Linx (LINX)</option>
            <option value="XCXT">CoinonatX (XCXT)</option>
            <option value="BLAS">BlakeStar (BLAS)</option>
            <option value="GOOD">GoodCoin (GOOD)</option>
            <option value="TRV">Travel Coin (TRV)</option>
            <option value="CRTM">Cryptum (CRTM)</option>
            <option value="PST">Primas (PST)</option>
            <option value="MTX">Matryx (MTX)</option>
            <option value="PRIX">Privatix (PRIX)</option>
            <option value="CTX">CarTaxi (CTX)</option>
            <option value="ENJ">Enjin Coin (ENJ)</option>
            <option value="CNX">Cryptonex (CNX)</option>
            <option value="DRC">Dropcoin (DRC)</option>
            <option value="FUEL">Etherparty (FUEL)</option>
            <option value="ACE">TokenStars (ACE)</option>
            <option value="WRC">Worldcore (WRC)</option>
            <option value="WTC">Waltonchain (WTC)</option>
            <option value="BRX">Breakout Stake (BRX)</option>
            <option value="WRT">WRTcoin (WRT)</option>
            <option value="ORME">Ormeus Coin (ORME)</option>
            <option value="DEEP">Deep Gold (DEEP)</option>
            <option value="TMT">ToTheMoon (TMT)</option>
            <option value="WSH">Wish Finance (WSH)</option>
            <option value="ARNA*">ARNA Panacea (ARNA)</option>
            <option value="ABC">AB-Chain (ABC)</option>
            <option value="PRP">Papyrus (PRP)</option>
            <option value="BMC">Blackmoon Crypto (BMC)</option>
            <option value="SKR*">Skrilla Token (SKR*)</option>
            <option value="3DES">3DES (3DES)</option>
            <option value="PYN">Paycentos (PYN)</option>
            <option value="KAPU">Kapu (KAPU)</option>
            <option value="SENSE">Sense Token (SENSE)</option>
            <option value="VEE">BLOCKv (VEE)</option>
            <option value="FC">Facecoin (FC)</option>
            <option value="RCN">Ripio (RCN)</option>
            <option value="NRN">Doc.ai Neuron (NRN)</option>
            <option value="EVC">Eventchain (EVC)</option>
            <option value="LINK">ChainLink (LINK)</option>
            <option value="WIZ">Crowdwiz (WIZ)</option>
            <option value="EDO">Eidoo (EDO)</option>
            <option value="ATKN">A-Token (ATKN)</option>
            <option value="KNC">Kyber Network (KNC)</option>
            <option value="RUSTBITS">Rustbits (RUSTBITS)</option>
            <option value="REX">REX (REX)</option>
            <option value="ETHD">Ethereum Dark (ETHD)</option>
            <option value="SUMO">Sumokoin (SUMO)</option>
            <option value="TRX">Tronix (TRX)</option>
            <option value="8S">Elite 888 (8S)</option>
            <option value="H2O">Hydrominer (H2O)</option>
            <option value="TKT">Crypto Tickets (TKT)</option>
            <option value="RHEA">Rhea (RHEA)</option>
            <option value="ART">Maecenas (ART)</option>
            <option value="DRT">DomRaider (DRT)</option>
            <option value="SNOV">Snovio (SNOV)</option>
            <option value="DTT">DreamTeam Token (DTT)</option>
            <option value="MTN">TrackNetToken (MTN)</option>
            <option value="STOCKBET">StockBet (STOCKBET)</option>
            <option value="PLM">Algo.Land (PLM)</option>
            <option value="SALT">Salt Lending (SALT)</option>
            <option value="SND">Sandcoin (SND)</option>
            <option value="XP">Experience Points (XP)</option>
            <option value="LRC">Loopring (LRC)</option>
            <option value="HSR">Hshare (HSR)</option>
            <option value="GLA">Gladius (GLA)</option>
            <option value="ZNA">Zenome (ZNA)</option>
            <option value="EZM">EZMarket (EZM)</option>
            <option value="ODN">Obsidian (ODN)</option>
            <option value="POLL">ClearPoll (POLL)</option>
            <option value="MTK">Moya Token (MTK)</option>
            <option value="CAS">Cashaa (CAS)</option>
            <option value="MAT">MiniApps (MAT)</option>
            <option value="GJC">Global Jobcoin (GJC)</option>
            <option value="WIC">Wi Coin (WIC)</option>
            <option value="WAND">WandX (WAND)</option>
            <option value="ELIX">Elixir (ELIX)</option>
            <option value="YOYOW">Yoyow (YOYOW)</option>
            <option value="REC">Regalcoin (REC)</option>
            <option value="BIS">Bismuth (BIS)</option>
            <option value="OPP">Opporty (OPP)</option>
            <option value="ICX">ICON Project (ICX)</option>
            <option value="VSX">Vsync (VSX)</option>
            <option value="WISH*">WishFinance (WISH*)</option>
            <option value="FLASH">FLASH coin (FLASH)</option>
            <option value="BTCZ">BitcoinZ (BTCZ)</option>
            <option value="CZC">Crazy Coin (CZC)</option>
            <option value="PPP">PayPie (PPP)</option>
            <option value="GUESS">Peerguess (GUESS)</option>
            <option value="CAN">CanYaCoin (CAN)</option>
            <option value="ETP">Metaverse (ETP)</option>
            <option value="ERT">Esports.com (ERT)</option>
            <option value="BAC*">LakeBanker (BAC*)</option>
            <option value="FLIK">FLiK (FLIK)</option>
            <option value="TRIP">Trippki (TRIP)</option>
            <option value="MBT">Multibot (MBT)</option>
            <option value="JVY">Javvy (JVY)</option>
            <option value="ALIS">ALISmedia (ALIS)</option>
            <option value="LEV">Leverj (LEV)</option>
            <option value="ARBI">Arbi (ARBI)</option>
            <option value="ELT">Eloplay (ELT)</option>
            <option value="REQ">Request Network (REQ)</option>
            <option value="ARN">Aeron (ARN)</option>
            <option value="DAT">Datum (DAT)</option>
            <option value="VIBE">VIBEHub (VIBE)</option>
            <option value="ROK">Rockchain (ROK)</option>
            <option value="XRED">X Real Estate Development (XRED)</option>
            <option value="DAY">Chronologic (DAY)</option>
            <option value="AST">AirSwap (AST)</option>
            <option value="FLP">Gameflip (FLP)</option>
            <option value="HXT">HextraCoin (HXT)</option>
            <option value="CND">Cindicator (CND)</option>
            <option value="VRP*">Prosense.tv (VRP)</option>
            <option value="NTM">NetM (NTM)</option>
            <option value="TZC">TrezarCoin (TZC)</option>
            <option value="ENG">Enigma (ENG)</option>
            <option value="MCI">Musiconomi (MCI)</option>
            <option value="COV">Covesting (COV)</option>
            <option value="WAX">Worldwide Asset eXchange (WAX)</option>
            <option value="AIR">AirToken (AIR)</option>
            <option value="NTO">Fujinto (NTO)</option>
            <option value="ATCC">ATC Coin (ATCC)</option>
            <option value="KOLION">Kolion (KOLION)</option>
            <option value="WILD">Wild Crypto (WILD)</option>
            <option value="ELTC2">eLTC (ELTC2)</option>
            <option value="ILCT">ILCoin Token (ILCT)</option>
            <option value="POWR">Power Ledger (POWR)</option>
            <option value="C20">Crypto20 (C20)</option>
            <option value="RYZ">Anryze (RYZ)</option>
            <option value="GXC*">GenXCoin (GXC*)</option>
            <option value="ELM">Elements (ELM)</option>
            <option value="TER">TerraNovaCoin (TER)</option>
            <option value="XCS">CybCSec Coin (XCS)</option>
            <option value="BQ">Bitqy (BQ)</option>
            <option value="CAV">Caviar (CAV)</option>
            <option value="CLOUT">Clout (CLOUT)</option>
            <option value="PTC*">Propthereum (PTC*)</option>
            <option value="WABI">WaBi (WABI)</option>
            <option value="EVR">Everus (EVR)</option>
            <option value="TOA">TOA Coin (TOA)</option>
            <option value="MNZ">Monaize (MNZ)</option>
            <option value="VIVO">VIVO Coin (VIVO)</option>
            <option value="RPX">Red Pulse (RPX)</option>
            <option value="MDA">Moeda (MDA)</option>
            <option value="ZSC">Zeusshield (ZSC)</option>
            <option value="AURS">Aureus (AURS)</option>
            <option value="CAG">Change (CAG)</option>
            <option value="PKT">Playkey (PKT)</option>
            <option value="INXT">Internxt (INXT)</option>
            <option value="ATS">Authorship (ATS)</option>
            <option value="RGC">RG Coin (RGC)</option>
            <option value="EBET">EthBet (EBET)</option>
            <option value="R">Revain (R)</option>
            <option value="MOD">Modum (MOD)</option>
            <option value="BM*">Bitcomo (BM*)</option>
            <option value="CPAY">CryptoPay (CPAY)</option>
            <option value="RUP">Rupee (RUP)</option>
            <option value="BON*">Bonpay (BON)</option>
            <option value="APPC">AppCoins (APPC)</option>
            <option value="WHL">WhaleCoin (WHL)</option>
            <option value="UP">UpToken (UP)</option>
            <option value="ETG">Ethereum Gold (ETG)</option>
            <option value="WOMEN">WomenCoin (WOMEN)</option>
            <option value="MAY">Theresa May Coin (MAY)</option>
            <option value="RNDR">Render Token (RNDR)</option>
            <option value="EDDIE">Eddie coin (EDDIE)</option>
            <option value="SCT*">Soma (SCT*)</option>
            <option value="NAMO">NamoCoin (NAMO)</option>
            <option value="KCS">Kucoin (KCS)</option>
            <option value="GAT">GATCOIN (GAT)</option>
            <option value="BLUE">Ethereum Blue (BLUE)</option>
            <option value="WYR">Wyrify (WYR)</option>
            <option value="VZT">Vezt (VZT)</option>
            <option value="INDI">IndiCoin (INDI)</option>
            <option value="LUX">LUXCoin (LUX)</option>
            <option value="BAR">TBIS token (BAR)</option>
            <option value="PIRL">Pirl (PIRL)</option>
            <option value="ECASH">Ethereum Cash (ECASH)</option>
            <option value="DRGN">Dragonchain (DRGN)</option>
            <option value="ODMC">ODMCoin (ODMC)</option>
            <option value="CABS*">CyberTrust (CABS*)</option>
            <option value="DTR">Dynamic Trading Rights (DTR)</option>
            <option value="TKR">CryptoInsight (TKR)</option>
            <option value="KEY">SelfKey (KEY)</option>
            <option value="ELITE">EthereumLite (ELITE)</option>
            <option value="XIOS">Xios (XIOS)</option>
            <option value="DOVU">DOVU (DOVU)</option>
            <option value="ETN">Electroneum (ETN)</option>
            <option value="REA">Realisto (REA)</option>
            <option value="AVE">Avesta (AVE)</option>
            <option value="XNN">Xenon (XNN)</option>
            <option value="BTDX">Bitcloud 2.0 (BTDX)</option>
            <option value="LOAN*">Lendoit (LOAN)</option>
            <option value="ZAB">ZABERcoin (ZAB)</option>
            <option value="MDL">Modulum (MDL)</option>
            <option value="BT1">Bitfinex Bitcoin Future (BT1)</option>
            <option value="BT2">Bitcoin SegWit2X (BT2)</option>
            <option value="SHP">Sharpe Capital (SHP)</option>
            <option value="JCR">Jincor (JCR)</option>
            <option value="XSB">Extreme Sportsbook (XSB)</option>
            <option value="ATM">ATMChain (ATM)</option>
            <option value="EBST">eBoost (EBST)</option>
            <option value="KEK">KekCoin (KEK)</option>
            <option value="AID">AidCoin (AID)</option>
            <option value="BHC*">BlackholeCoin (BHC*)</option>
            <option value="ALTCOM">AltCommunity Coin (ALTCOM)</option>
            <option value="OST">Simple Token (OST)</option>
            <option value="DATA">Streamr DATAcoin (DATA)</option>
            <option value="UGC">ugChain (UGC)</option>
            <option value="DTC">Datacoin (DTC*)</option>
            <option value="PLAY">HEROcoin (PLAY)</option>
            <option value="PURE">Pure (PURE)</option>
            <option value="CLD">Cloud (CLD)</option>
            <option value="OTN">Open Trading Network (OTN)</option>
            <option value="POS">PoSToken (POS)</option>
            <option value="NEOG">NEO Gold (NEOG)</option>
            <option value="EXN">ExchangeN (EXN)</option>
            <option value="INS">INS Ecosystem (INS)</option>
            <option value="TRCT">Tracto (TRCT)</option>
            <option value="UKG">UnikoinGold (UKG)</option>
            <option value="BTCRED">Bitcoin Red (BTCRED)</option>
            <option value="EBCH">eBitcoinCash (EBCH)</option>
            <option value="AXT">AIX (AXT)</option>
            <option value="RDN*">Raiden Network (RDN*)</option>
            <option value="NEU">Neumark (NEU)</option>
            <option value="RUPX">Rupaya (RUPX)</option>
            <option value="BDR">BlueDragon (BDR)</option>
            <option value="DUTCH">Dutch Coin (DUTCH)</option>
            <option value="TIO">Trade.io (TIO)</option>
            <option value="HNC*">Huncoin (HNC*)</option>
            <option value="MDC*">MadCoin (MDC*)</option>
            <option value="PURA">Pura (PURA)</option>
            <option value="INN">Innova (INN)</option>
            <option value="HST">Decision Token (HST)</option>
            <option value="BCPT">BlockMason Credit Protocol (BCPT)</option>
            <option value="BDL">Bitdeal (BDL)</option>
            <option value="CMS">COMSA (CMS)</option>
            <option value="XBL">Billionaire Token (XBL)</option>
            <option value="ZEPH">Project Zephyr (ZEPH)</option>
            <option value="ATFS">ATFS Project (ATFS)</option>
            <option value="NULS">Nuls (NULS)</option>
            <option value="PHR*">Phore (PHR*)</option>
            <option value="LCASH">LitecoinCash (LCASH)</option>
            <option value="CFD">Confido (CFD)</option>
            <option value="SPHTX">SophiaTX (SPHTX)</option>
            <option value="PLC">PlusCoin (PLC)</option>
            <option value="SRN">SirinLabs (SRN)</option>
            <option value="WSC">WiserCoin (WSC)</option>
            <option value="DBET">Decent.bet (DBET)</option>
            <option value="XGOX">Go! (xGOx)</option>
            <option value="NEWB">Newbium (NEWB)</option>
            <option value="LIFE">LIFE (LIFE)</option>
            <option value="RMC">Russian Mining Coin (RMC)</option>
            <option value="CREDO">Credo (CREDO)</option>
            <option value="MSR">Masari (MSR)</option>
            <option value="ESC*">Ethersportcoin (ESC)</option>
            <option value="EVN">Envion (EVN)</option>
            <option value="BNK">Bankera (BNK)</option>
            <option value="ELLA">Ellaism (ELLA)</option>
            <option value="BPL">BlockPool (BPL)</option>
            <option value="ROCK*">RocketCoin (ROCK*)</option>
            <option value="DRXNE">Droxne (DRXNE)</option>
            <option value="SKR">Sakuracoin (SKR)</option>
            <option value="GRID">Grid+ (GRID)</option>
            <option value="XPTX">PlatinumBAR (XPTX)</option>
            <option value="GVT">Genesis Vision (GVT)</option>
            <option value="ETK">Energi Token (ETK)</option>
            <option value="ASTRO">Astronaut (ASTRO)</option>
            <option value="GMT">Mercury Protocol (GMT)</option>
            <option value="EPY*">Emphy (EPY*)</option>
            <option value="SOAR">Soarcoin (SOAR)</option>
            <option value="HOLD">Interstellar Holdings (HOLD)</option>
            <option value="MNX">MinexCoin (MNX)</option>
            <option value="CRDS">Credits (CRDS)</option>
            <option value="VIU">Viuly (VIU)</option>
            <option value="SCR">Scorum (SCR)</option>
            <option value="DBR">Düber (DBR)</option>
            <option value="STAC">STAC (STAC)</option>
            <option value="QSP">Quantstamp (QSP)</option>
            <option value="RIPT">RiptideCoin (RIPT)</option>
            <option value="BBT">BitBoost (BBT)</option>
            <option value="GBX">GoByte (GBX)</option>
            <option value="ICC">Insta Cash Coin (ICC)</option>
            <option value="JNT">Jibrel Network Token (JNT)</option>
            <option value="QASH">Quoine Liquid (QASH)</option>
            <option value="ALQO">Alqo (ALQO)</option>
            <option value="KNC**">KingN Coin (KNC**)</option>
            <option value="TRIA">Triaconta (TRIA)</option>
            <option value="PBL">Publica (PBL)</option>
            <option value="UFR">Upfiring (UFR)</option>
            <option value="LOCI">LociCoin (LOCI)</option>
            <option value="TAU">Lamden Tau (TAU)</option>
            <option value="LAB">Labrys (LAB)</option>
            <option value="FLIXX">Flixxo (FLIXX)</option>
            <option value="FRD">Farad (FRD)</option>
            <option value="ECA">Electra (ECA)</option>
            <option value="LDM">Ludum token (LDM)</option>
            <option value="LTG">LiteCoin Gold (LTG)</option>
            <option value="BCD">Bitcoin Diamond (BCD)</option>
            <option value="STP">StashPay (STP)</option>
            <option value="SPANK">SpankChain (SPANK)</option>
            <option value="WISH">MyWish (WISH)</option>
            <option value="AERM">Aerium (AERM)</option>
            <option value="PLX">PlexCoin (PLX)</option>
            <option value="NIO">Autonio (NIO)</option>
            <option value="ETHB">EtherBTC (ETHB)</option>
            <option value="CDX">Commodity Ad Network (CDX)</option>
            <option value="FOOD">FoodCoin (FOOD)</option>
            <option value="VOT">Votecoin (VOT)</option>
            <option value="UQC">Uquid Coin (UQC)</option>
            <option value="LEND">EthLend (LEND)</option>
            <option value="SETH">Sether (SETH)</option>
            <option value="TIO*">Tio Tour Guides (TIO*)</option>
            <option value="XSH">SHIELD (XSH)</option>
            <option value="BCD*">BitCAD (BCD*)</option>
            <option value="BCO*">BridgeCoin (BCO)</option>
            <option value="DSR">Desire (DSR)</option>
            <option value="BDG">BitDegree (BDG)</option>
            <option value="ONG">onG.social (ONG)</option>
            <option value="PRL">Oyster Pearl (PRL)</option>
            <option value="BTCM">BTCMoon (BTCM)</option>
            <option value="ETBT">Ethereum Black (ETBT)</option>
            <option value="ZCG">ZCashGOLD (ZCG)</option>
            <option value="MUT">Mutual Coin (MUT)</option>
            <option value="AION">Aion (AION)</option>
            <option value="MEOW">Kittehcoin (MEOW)</option>
            <option value="DIVX">Divi (DIVX)</option>
            <option value="CNBC">Cash & Back Coin (CNBC)</option>
            <option value="RHOC">RChain (RHOC)</option>
            <option value="ARC*">Arcade City (ARC*)</option>
            <option value="XUN">UltraNote (XUN)</option>
            <option value="RFL">RAFL (RFL)</option>
            <option value="COFI">CoinFi (COFI)</option>
            <option value="ELTCOIN">ELTCOIN (ELTCOIN)</option>
            <option value="GRX">Gold Reward Token (GRX)</option>
            <option value="NTK">Neurotoken (NTK)</option>
            <option value="ERO">Eroscoin (ERO)</option>
            <option value="CMT*">CyberMiles (CMT*)</option>
            <option value="RLX">Relex (RLX)</option>
            <option value="MAN">People (MAN)</option>
            <option value="CWV">CryptoWave (CWV)</option>
            <option value="ACT*">Achain (ACT*)</option>
            <option value="NRO">Neuro (NRO)</option>
            <option value="SEND">Social Send (SEND)</option>
            <option value="GLT">GlobalToken (GLT)</option>
            <option value="X8X">X8Currency (X8X)</option>
            <option value="COAL">BitCoal (COAL)</option>
            <option value="DAXX">DaxxCoin (DAXX)</option>
            <option value="BWK">Bulwark (BWK)</option>
            <option value="FNT">FinTab (FNT)</option>
            <option value="XMRG">Monero Gold (XMRG)</option>
            <option value="BTCE">EthereumBitcoin (BTCE)</option>
            <option value="FYP">FlypMe (FYP)</option>
            <option value="BOXY">BoxyCoin (BOXY)</option>
            <option value="EGAS">ETHGAS (EGAS)</option>
            <option value="DPP">Digital Assets Power Play (DPP)</option>
            <option value="ADB">Adbank (ADB)</option>
            <option value="TGT">TargetCoin (TGT)</option>
            <option value="BMT">BMChain (BMT)</option>
            <option value="BIO">Biocoin (BIO)</option>
            <option value="MTRC">ModulTrade (MTRC)</option>
            <option value="BTCL">BTC Lite (BTCL)</option>
            <option value="PCN">PeepCoin (PCN)</option>
            <option value="RBTC">Bitcoin Revolution (RBTC)</option>
            <option value="CRED">Verify (CRED)</option>
            <option value="SBTC">Super Bitcoin (SBTC)</option>
            <option value="KLK">Kalkulus (KLK)</option>
            <option value="AC3">AC3 (AC3)</option>
            <option value="GTO">GIFTO (GTO)</option>
            <option value="TNB">Time New Bank (TNB)</option>
            <option value="CHIPS*">CHIPS (CHIPS)</option>
            <option value="HKN">Hacken (HKN)</option>
            <option value="B2B">B2B (B2BX)</option>
            <option value="LOC*">LockChain (LOC*)</option>
            <option value="MNT*">Media Network Coin (MNT*)</option>
            <option value="ITNS">IntenseCoin (ITNS)</option>
            <option value="SMT*">SmartMesh (SMT*)</option>
            <option value="GER">GermanCoin (GER)</option>
            <option value="LTCU">LiteCoin Ultra (LTCU)</option>
            <option value="EMGO">MobileGo (EMGO)</option>
            <option value="BTCA">Bitair (BTCA)</option>
            <option value="HQX">HOQU (HQX)</option>
            <option value="ETF">EthereumFog (ETF)</option>
            <option value="BCX*">BitcoinX (BCX*)</option>
            <option value="LUX**">Luxmi Coin (LUX**)</option>
            <option value="STAK">Straks (STAK)</option>
            <option value="BCOIN">BannerCoin (BCOIN)</option>
            <option value="BNTY">Bounty0x (BNTY)</option>
            <option value="BRD">Bread token (BRD)</option>
            <option value="HAT">Hawala.Today (HAT)</option>
            <option value="ELF">aelf (ELF)</option>
            <option value="CWX">Crypto-X (CWX)</option>
            <option value="DBC">DeepBrain Chain (DBC)</option>
            <option value="ZEN*">Zen Protocol (ZEN*)</option>
            <option value="POP">PopularCoin (POP)</option>
            <option value="CRC">CrowdCoin (CRC)</option>
            <option value="PNX">PhantomX (PNX)</option>
            <option value="BAS">BitAsean (BAS)</option>
            <option value="UTT">United Traders Token (UTT)</option>
            <option value="HBC">HomeBlockCoin (HBC)</option>
            <option value="AMM">MicroMoney (AMM)</option>
            <option value="DAV">DavorCoin (DAV)</option>
            <option value="XCPO">Copico (XCPO)</option>
            <option value="GET">Guaranteed Entrance Token (GET)</option>
            <option value="ERC20">Index ERC20 (ERC20)</option>
            <option value="ITC">IoT Chain (ITC)</option>
            <option value="HTML">HTML Coin (HTML)</option>
            <option value="NMS">Numus (NMS)</option>
            <option value="PHO">Photon (PHO)</option>
            <option value="XTRA">ExtraCredit (XTRA)</option>
            <option value="NTWK">Network Token (NTWK)</option>
            <option value="SUCR">Sucre (SUCR)</option>
            <option value="SMART*">SmartBillions (SMART*)</option>
            <option value="GNX">Genaro Network (GNX)</option>
            <option value="NAS">Nebulas (NAS)</option>
            <option value="ACCO">Accolade (ACCO)</option>
            <option value="BTH">Bytether  (BTH)</option>
            <option value="TOK">TokugawaCoin (TOK)</option>
            <option value="EREAL">eREAL (EREAL)</option>
            <option value="CPN">CompuCoin (CPN)</option>
            <option value="XFT">Footy Cash (XFT)</option>
            <option value="QLC">QLINK (QLC)</option>
            <option value="BTSE">BitSerial (BTE*)</option>
            <option value="OMGC">OmiseGO Classic (OMGC)</option>
            <option value="Q2C">QubitCoin (Q2C)</option>
            <option value="BLT">Bloom Token (BLT)</option>
            <option value="SPF">SportyFi (SPF)</option>
            <option value="TDS">TokenDesk (TDS)</option>
            <option value="ORE">Galactrum (ORE)</option>
            <option value="SPK">Sparks (SPK)</option>
            <option value="GOA">GoaCoin (GOA)</option>
            <option value="FLS">Fuloos Coin (FLS)</option>
            <option value="PHILS">PhilsCurrency (PHILS)</option>
            <option value="GUN">GunCoin (GUN)</option>
            <option value="DFS">DFSCoin (DFS)</option>
            <option value="POLIS">PolisPay (POLIS)</option>
            <option value="FLOT">FireLotto (FLOT)</option>
            <option value="CL">CoinLancer (CL)</option>
            <option value="SHND">StrongHands (SHND)</option>
            <option value="AUA">ArubaCoin (AUA)</option>
            <option value="SAGA">SagaCoin (SAGA)</option>
            <option value="TSL">Energo (TSL)</option>
            <option value="IRL">IrishCoin (IRL)</option>
            <option value="TROLL">Trollcoin (TROLL)</option>
            <option value="FOR">Force Coin (FOR)</option>
            <option value="SGR">Sugar Exchange (SGR)</option>
            <option value="JET">Jetcoin (JET)</option>
            <option value="MDS">MediShares (MDS)</option>
            <option value="LCP">Litecoin Plus (LCP)</option>
            <option value="GTC">Game (GTC)</option>
            <option value="IETH">iEthereum (IETH)</option>
            <option value="GCC*">TheGCCcoin (GCC*)</option>
            <option value="SDRN">Sanderon (SDRN)</option>
            <option value="KBR">Kubera Coin (KBR)</option>
            <option value="HPB">High Performance Blockchain (HPB)</option>
            <option value="MONK">Monkey Project (MONK)</option>
            <option value="JINN">Jinn (JINN)</option>
            <option value="SET">Setcoin (SET)</option>
            <option value="MGN">MagnaCoin (MGN)</option>
            <option value="KZC">KZCash (KZC)</option>
            <option value="GNR">Gainer (GNR)</option>
            <option value="BRC">BrightCoin (BRC)</option>
            <option value="HIVE">Hive (HIVE)</option>
            <option value="GX">GameX (GX)</option>
            <option value="ETL">EtherLite (ETL)</option>
            <option value="TEL">Telcoin (TEL)</option>
            <option value="BRC*">BinaryCoin (BRC*)</option>
            <option value="ZAP">Zap (ZAP)</option>
            <option value="AIDOC">AI Doctor (AIDOC)</option>
            <option value="ECC">ECC (ECC)</option>
            <option value="LCT">LendConnect (LCT)</option>
            <option value="EBC">EBCoin (EBC)</option>
            <option value="INT">Internet Node Token (INT)</option>
            <option value="STN">Steneum Coin (STN)</option>
            <option value="PCOIN">Pioneer Coin (PCOIN)</option>
            <option value="BLN">Bolenum (BLN)</option>
            <option value="EDT">EtherDelta (EDT)</option>
            <option value="CYDER">Cyder Coin (CYDER)</option>
            <option value="EKO">EchoLink (EKO)</option>
            <option value="BTO">Bottos (BTO)</option>
            <option value="DOC*">Doc Coin (DOC)</option>
            <option value="ARCT">ArbitrageCT (ARCT)</option>
            <option value="IMV">ImmVRse (IMV)</option>
            <option value="AURA">Aurora (AURA)</option>
            <option value="IDH">IndaHash (IDH)</option>
            <option value="CBT">CommerceBlock Token (CBT)</option>
            <option value="ITZ">Interzone (ITZ)</option>
            <option value="XBP">Black Pearl Coin (XBP)</option>
            <option value="EXRN">EXRNchain (EXRN)</option>
            <option value="AGI">SingularityNET (AGI)</option>
            <option value="BFT">BF Token (BFT) (BFT)</option>
            <option value="SGL">Sigil (SGL)</option>
            <option value="TNC">Trinity Network Credit (TNC)</option>
            <option value="DTA">Data (DTA)</option>
            <option value="CV">CarVertical (CV)</option>
            <option value="OCN">Odyssey (OCN)</option>
            <option value="THETA">Theta (THETA)</option>
            <option value="MDT*">Measurable Data Token (MDT*)</option>
            <option value="PRPS">Purpose (PRPS)</option>
            <option value="DUBI">Decentralized Universal Basic Income (DUBI)</option>
            <option value="BPT">Blockport (BPT)</option>
            <option value="IOST">IOS token (IOST)</option>
            <option value="TCT">TokenClub (TCT)</option>
            <option value="TRAC">OriginTrail (TRAC)</option>
            <option value="MOT">Olympus Labs (MOT)</option>
            <option value="ZIL">Zilliqa (ZIL)</option>
            <option value="HORSE">Ethorse (HORSE)</option>
            <option value="QUN">QunQun (QUN)</option>
            <option value="ACC*">Accelerator Network (ACC*)</option>
            <option value="SWFTC">SwftCoin (SWFTC)</option>
            <option value="SENT">Sentinel (SENT)</option>
            <option value="IPL">InsurePal (IPL)</option>
            <option value="OPC">OP Coin (OPC)</option>
            <option value="SAF">Safinus (SAF)</option>
            <option value="SHA">Shacoin (SHA)</option>
            <option value="PYLNT">Pylon Network (PYLNT)</option>
            <option value="GRLC">Garlicoin (GRLC)</option>
            <option value="EVE">Devery (EVE)</option>
            <option value="YEE">Yee (YEE)</option>
            <option value="GTC*">Global Tour Coin (GTC*)</option>
            <option value="BTW">BitcoinWhite (BTW)</option>
            <option value="AXP">aXpire (AXP)</option>
            <option value="FOTA">Fortuna (FOTA)</option>
            <option value="CPC*">CPChain (CPC*)</option>
            <option value="PXS">Pundi X (PXS)</option>
            <option value="ZPT">Zeepin (ZPT)</option>
            <option value="CROAT">Croat (CROAT)</option>
            <option value="REF">RefToken (REF)</option>
            <option value="SXDT">SPECTRE Dividend Token (SXDT)</option>
            <option value="SXUT">SPECTRE Utility Token (SXUT)</option>
            <option value="FAIR*">FairGame (FAIR*)</option>
            <option value="VAL">Valorbit (VAL)</option>
            <option value="MAN*">Matrix AI Network (MAN*)</option>
            <option value="BCDN">BlockCDN (BCDN)</option>
            <option value="STK">STK Token (STK)</option>
            <option value="MZX">Mosaic Network (MZX)</option>
            <option value="POLY*">Polymath Network (POLY*)</option>
            <option value="XTO">Tao (XTO)</option>
            <option value="RUFF">Ruff (RUFF)</option>
            <option value="ELA">Elastos (ELA)</option>
            <option value="TPAY*">TokenPay (TPAY*)</option>
            <option value="CXO">CargoX (CXO)</option>
            <option value="SISA">Strategic Investments in Significant Areas (SISA)</option>
            <option value="EBIT">eBit (EBIT)</option>
            <option value="CUZ">Cool Cousin (CUZ)</option>
            <option value="ING">Iungo (ING)</option>
            <option value="LHC">LHCoin (LHC)</option>
            <option value="BLZ">Bluzelle (BLZ)</option>
            <option value="HALAL">Halal (HALAL)</option>
            <option value="CRAVE*">Crave-NG (CRAVE*)</option>
            <option value="CHSB">SwissBorg (CHSB)</option>
            <option value="MCT">1717 Masonic Commemorative Token (MCT)</option>
            <option value="CWIS">Crypto Wisdom Coin (CWIS)</option>
            <option value="MBC">My Big Coin (MBC)</option>
            <option value="MTN*">Medicalchain (MTN*)</option>
            <option value="WBTC">WorldBTC (WBTC)</option>
            <option value="TKY">THEKEY Token (TKY)</option>
            <option value="PARETO">Pareto Network Token (PARETO)</option>
            <option value="BEE">Bee Token (BEE)</option>
            <option value="MUN">MUNcoin (MUN)</option>
            <option value="TIG">Tigereum (TIG)</option>
            <option value="DXT">DataWallet (DXT)</option>
            <option value="USX">Unified Society USDEX (USX)</option>
            <option value="BCA">Bitcoin Atom (BCA)</option>
            <option value="FSN*">Fusion (FSN*)</option>
            <option value="ARY">Block Array (ARY)</option>
            <option value="BUN">BunnyCoin (BUN)</option>
            <option value="TRDT">Trident (TRDT)</option>
            <option value="XBTY">Bounty (XBTY)</option>
            <option value="JC">JesusCoin (JC)</option>
            <option value="JEW">Shekel (JEW)</option>
            <option value="CRDNC">Credence Coin (CRDNC)</option>
            <option value="XVG">Verge (XVG)</option>
            <option value="TTT">Tap Project (TTT)</option>
            <option value="INK">Ink (INK)</option>
            <option value="NEC*">Ethfinex Nectar Token (NEC*)</option>
            <option value="WPR">WePower (WPR)</option>
            <option value="DTC**">DivotyCoin (DTC**)</option>
            <option value="DRPU">DRP Utility (DRPU)</option>
            <option value="DADI">DADI (DADI)</option>
            <option value="GXS">GXShares (GXS)</option>
            <option value="BBP">BiblePay (BBP)</option>
            <option value="HLC">Halal-Chain (HLC)</option>
            <option value="MED*">MediBloc (MED*)</option>
            <option value="BOT">Bodhi (BOT)</option>
            <option value="QBT*">Qbao (QBT*)</option>
            <option value="XDCE">XinFin Coin (XDCE)</option>
            <option value="ECHT">e-Chat (ECHT)</option>
            <option value="KRM">Karma (KRM)</option>
            <option value="CDY">Bitcoin Candy (CDY)</option>
            <option value="SSS">ShareChain (SSS)</option>
            <option value="DDD">Scry.info (DDD)</option>
            <option value="BIFI">BitcoinFile (BIFI)</option>
            <option value="BTF">Blockchain Traded Fund (BTF)</option>
            <option value="IPC*">IPChain (IPC*)</option>
            <option value="RCT">RealChain (RCT)</option>
            <option value="SHOW">ShowCoin (SHOW)</option>
            <option value="STC">StarChain (STC)</option>
            <option value="AIT">AIT Token (AIT)</option>
            <option value="DTT*">Data Trading (DTT*)</option>
            <option value="STQ">Storiqa Token (STQ)</option>
            <option value="TEN">Tokenomy (TEN)</option>
            <option value="BETR">BetterBetting (BETR)</option>
            <option value="CRPT">Crypterium (CRPT)</option>
            <option value="LWF">Local World Forwarders (LWF)</option>
            <option value="DEB">Debitum Token (DEB)</option>
            <option value="PYP">PayPro (PYP)</option>
            <option value="GMR">Gimmer (GMR)</option>
            <option value="ALT">ALTcoin (ALT)</option>
            <option value="TRF">Travelflex (TRF)</option>
            <option value="KB3">B3Coin (KB3)</option>
            <option value="LCC">LitecoinCash (LCC)</option>
            <option value="NYX">NYXCOIN (NYX)</option>
            <option value="MWAT">RED MegaWatt (MWAT)</option>
            <option value="ZYD">ZayedCoin (ZYD)</option>
            <option value="DASH">DigitalCash (DASH)</option>
            <option value="PTR">Petro (PTR)</option>
            <option value="EBTC">eBitcoin (EBTC)</option>
            <option value="FLIP">BitFlip (FLIP)</option>
            <option value="NLG">Gulden (NLG)</option>
            <option value="UTN">Universa (UTN)</option>
            <option value="IQB">Intelligence Quotient Benefit (IQB)</option>
            <option value="EARTH">Earth Token (EARTH)</option>
            <option value="WCG">World Crypto Gold (WCG)</option>
            <option value="XMCC">Monoeci (XMCC)</option>
            <option value="CRC**">CryCash (CRC**)</option>
            <option value="HLP">Purpose Coin (HLP)</option>
            <option value="Q1S">Quantum1Net (Q1S)</option>
            <option value="EQL">EQUAL (EQL)</option>
            <option value="VULC">Vulcano (VULC)</option>
            <option value="SPA">SpainCoin (SPA)</option>
            <option value="UNRC">UniversalRoyalCoin (UNRC)</option>
            <option value="TOKC">Tokyo Coin (TOKC)</option>
            <option value="SXC">SexCoin (SXC)</option>
            <option value="HYS">Heiss Shares (HYS)</option>
            <option value="LCWP">LiteCoinW Plus (LCWP)</option>
            <option value="BCR*">Bitcoin Royal (BCR*)</option>
            <option value="SPC*">SpaceChain (SPC*)</option>
            <option value="GOOD*">Goodomy (GOOD*)</option>
            <option value="DTH">Dether (DTH)</option>
            <option value="SOC">All Sports Coin (SOC)</option>
            <option value="TDX">Tidex Token (TDX)</option>
            <option value="CLN">Colu Local Network (CLN)</option>
            <option value="MLT">MultiGames (MLT)</option>
            <option value="VST">Vestarin (VST)</option>
            <option value="REN">Republic Token (REN)</option>
            <option value="BAX">BABB (BAX)</option>
            <option value="SPX">Specie (SPX*)</option>
            <option value="BASHC">BashCoin (BASHC)</option>
            <option value="DIGIF">DigiFel (DIGIF)</option>
            <option value="NIHL">Nihilo Coin (NIHL)</option>
            <option value="CBS">Cerberus (CBS)</option>
            <option value="SPICE">SPiCE Venture Capital (SPICE)</option>
            <option value="FDX">fidentiaX (FDX)</option>
            <option value="ALX">ALAX (ALX)</option>
            <option value="LYM">Lympo (LYM)</option>
            <option value="NPX">Napoleon X (NPX)</option>
            <option value="LNC">BlockLancer (LNC)</option>
            <option value="BERRY">Rentberry (BERRY)</option>
            <option value="CPY">COPYTRACK (CPY)</option>
            <option value="EXY">Experty (EXY)</option>
            <option value="DTRC">Datarius (DTRC)</option>
            <option value="LIZ">Lizus Payment (LIZ)</option>
            <option value="DAI">Dai (DAI)</option>
            <option value="NCASH">Nucleus Vision (NCASH)</option>
            <option value="CIF">Crypto Improvement Fund (CIF)</option>
            <option value="MANA">Decentraland (MANA)</option>
            <option value="TRTL">TurtleCoin (TRTL)</option>
            <option value="CMCT">Crowd Machine (CMCT)</option>
            <option value="PUT*">Robin8 Profile Utility Token (PUT*)</option>
            <option value="SPD">Stipend (SPD)</option>
            <option value="VANY">Vanywhere (VANY)</option>
            <option value="POA">Poa Network (POA)</option>
            <option value="LOT">LottoCoin (LOT)</option>
            <option value="LEAF">LeafCoin (LEAF)</option>
            <option value="COMP">Compound Coin (COMP)</option>
            <option value="FUNK">Cypherfunks Coin (FUNK)</option>
            <option value="SCL">Sociall (SCL)</option>
            <option value="TES">TeslaCoin (TES)</option>
            <option value="LDC*">LeadCoin (LDC)</option>
            <option value="CHAN">ChanCoin (CHAN)</option>
            <option value="TFD">TE-FOOD (TFD)</option>
            <option value="ZOI">Zoin (ZOI)</option>
            <option value="HT">Huobi Token (HT)</option>
            <option value="BIX">BiboxCoin (BIX)</option>
            <option value="RFR">Refereum (RFR)</option>
            <option value="DGM">DigiMoney (DGM)</option>
            <option value="BTCH">Bitcoin Hush (BTCH)</option>
            <option value="CCRB">CryptoCarbon (CCRB)</option>
            <option value="PLU">Pluton (PLU)</option>
            <option value="FUND">Fund Platform (FUND)</option>
            <option value="NGC">NagaCoin (NGC)</option>
            <option value="CS*">Credits (CS*)</option>
            <option value="ROYAL">RoyalCoin (ROYAL)</option>
            <option value="DEA">Degas Coin (DEA)</option>
            <option value="RVN">Ravencoin (RVN)</option>
            <option value="FND">FundRequest (FND)</option>
            <option value="PUSHI">Pushi (PUSHI)</option>
            <option value="ZER">Zero (ZER)</option>
            <option value="SRNT">Serenity (SRNT)</option>
            <option value="LSK">Lisk (LSK)</option>
            <option value="VVI">VV Coin (VVI)</option>
            <option value="ELP">Ellerium (ELP)</option>
            <option value="NEO">NEO (NEO)</option>
            <option value="CCT">Crystal Clear Token (CCT)</option>
            <option value="CS">CryptoSpots (CS)</option>
            <option value="SWM">Swarm Fund (SWM)</option>
            <option value="PROPS">Props (PROPS)</option>
            <option value="BINS">Bitsense (BINS)</option>
            <option value="POKER">PokerCoin (POKER)</option>
            <option value="AXYS">Axys (AXYS)</option>
            <option value="EVN*">EvenCoin (EVN*)</option>
            <option value="BOLD">Bold (BOLD)</option>
            <option value="EXTN">Extensive Coin (EXTN)</option>
            <option value="ETS">ETH Share (ETS)</option>
            <option value="LIPC">LIpcoin (LIPC)</option>
            <option value="HELL">HELL COIN (HELL)</option>
            <option value="ACAT">Alphacat (ACAT)</option>
            <option value="CO2">CO2 Token (CO2)</option>
            <option value="SPX*">Sp8de (SPX)</option>
            <option value="CCOS">CrowdCoinage (CCOS)</option>
            <option value="HBZ">Helbiz (HBZ)</option>
            <option value="RKT">Rock Token (RKT)</option>
            <option value="SVD">Savedroid (SVD)</option>
            <option value="GNT">Golem Network Token (GNT)</option>
            <option value="DNN">DNN Token (DNN)</option>
            <option value="MAG">Magnet (MAG)</option>
            <option value="DIG">Dignity (DIG)</option>
            <option value="EON">Exscudo (EON)</option>
            <option value="VLX">Velox (VLX)</option>
            <option value="eFIC">FIC Network (eFIC)</option>
            <option value="ONT">Ontology (ONT)</option>
            <option value="CSC">CasinoCoin (CSC)</option>
            <option value="XNK">Ink Protocol (XNK)</option>
            <option value="FUCK">Fuck Token (FUCK)</option>
            <option value="CRU">Curium (CRU)</option>
            <option value="PFR">PayFair (PFR)</option>
            <option value="ELI*">Elicoin (ELI*)</option>
            <option value="VIB">Viberate (VIB)</option>
            <option value="GGS">Gilgam (GGS)</option>
            <option value="ELI">Eligma (ELI)</option>
            <option value="CLO">Callisto Network (CLO)</option>
            <option value="BEZ">Bezop (BEZ)</option>
            <option value="ENTRC">ENTER COIN (ENTRC)</option>
            <option value="CFTY">Crafty (CFTY)</option>
            <option value="PTC">PesetaCoin (PTC)</option>
            <option value="GRFT">Graft Blockchain (GRFT)</option>
            <option value="XUC">Exchange Union (XUC)</option>
            <option value="ABT">Advanced Browsing Token (ABT*)</option>
            <option value="ABT*">ArcBlock (ABT)</option>
            <option value="REM">REMME (REM)</option>
            <option value="STEX">STEX (STEX)</option>
            <option value="ACTN">Action Coin (ACTN)</option>
            <option value="CDT">Blox (CDT)</option>
            <option value="EXMR">eXMR Monero (EXMR)</option>
            <option value="UETL">Useless Eth Token Lite (UETL)</option>
            <option value="ANK">Ankorus Token (ANK)</option>
            <option value="VPRC">VapersCoin (VPRC)</option>
            <option value="SC">Siacoin (SC)</option>
            <option value="LUC">Play 2 Live (LUC)</option>
            <option value="MFG">SyncFab (MFG)</option>
            <option value="XTROPTIONS">TROPTIONS (XTROPTIONS)</option>
            <option value="BTCGO">BitcoinGo (BTCGO)</option>
            <option value="PGC">Pegascoin (PGC)</option>
            <option value="NDC*">NeedleCoin (NDC*)</option>
            <option value="IOP">Internet of People (IOP)</option>
            <option value="CSTL">Castle (CSTL)</option>
            <option value="BTCP">Bitcoin Private (BTCP)</option>
            <option value="PRFT">Proof Suite Token (PRFT)</option>
            <option value="DRG">Dragon Coin (DRG)</option>
            <option value="FLX*">BitFlux (FLX*)</option>
            <option value="SQOIN">StasyQ (SQOIN)</option>
            <option value="RAVE">Ravelous (RAVE)</option>
            <option value="MAG**">Maggie Token (MAG**)</option>
            <option value="ZUP">Zupply Token (ZUP)</option>
            <option value="INVOX">Invox Finance (INVOX)</option>
            <option value="ZEN">ZenCash (ZEN)</option>
            <option value="TBAR">Titanium BAR (TBAR)</option>
            <option value="IPBC">Interplanetary Broadcast Coin (IPBC)</option>
            <option value="AUTO">Cube (AUTO)</option>
            <option value="CIX">Cryptonetix (CIX)</option>
            <option value="CHG">Charg Coin (CHG)</option>
            <option value="ABYSS">The Abyss (ABYSS)</option>
            <option value="SMT**">Social Media Market (SMT)</option>
            <option value="HMT">Hamster Marketplace Token (HMT)</option>
            <option value="GENE">PARKGENE (GENE)</option>
            <option value="LYK">Loyakk Vega (LYK)</option>
            <option value="XCD">Capdax (XCD)</option>
            <option value="USDC">USCoin (USDC)</option>
            <option value="HAV">Havven (HAV)</option>
            <option value="TOMO">TomoChain (TOMO)</option>
            <option value="CHF">MobileBridge Momentum (CHF)</option>
            <option value="CEL">Celsius Network (CEL)</option>
            <option value="LTCH">Litecoin Cash (LTCH)</option>
            <option value="CRE*">Creditcoin (CRE*)</option>
            <option value="TKNL">Taklimakan (TKLN)</option>
            <option value="W3C">W3Coin (W3C)</option>
            <option value="DIN">Dinero (DIN)</option>
            <option value="INSTAR">Insights Network (INSTAR)</option>
            <option value="KIND">Kind Ads (KIND)</option>
            <option value="CHP">CoinPoker Token (CHP)</option>
            <option value="PSD">Poseidon (PSD)</option>
            <option value="J8T">JET8 (J8T)</option>
            <option value="SKC">Skeincoin (SKC)</option>
            <option value="BANCA">BANCA (BANCA)</option>
            <option value="VTC">Vertcoin (VTC)</option>
            <option value="LELE">Lelecoin (LELE)</option>
            <option value="ADA">Cardano (ADA)</option>
            <option value="DROP*">FaucetCoin (DROP*)</option>
            <option value="WELL">Well (WELL)</option>
            <option value="EMC">Emercoin (EMC)</option>
            <option value="SKY">Skycoin (SKY)</option>
            <option value="PMA">PumaPay (PMA)</option>
            <option value="BRAT">BROTHER (BRAT)</option>
            <option value="SHIP">ShipChain (SHIP)</option>
            <option value="DNO">Denaro (DNO)</option>
            <option value="redBUX">redBUX (redBUX)</option>
            <option value="SHPING">Shping Coin (SHPING)</option>
            <option value="ENK">Enkidu (ENK)</option>
            <option value="BNT">Bancor Network Token (BNT)</option>
            <option value="CARE">Care Token (CARE)</option>
            <option value="ORI">Origami (ORI)</option>
            <option value="CEDEX">CEDEX Coin (CEDEX)</option>
            <option value="NYC">NewYorkCoin (NYC)</option>
            <option value="JPC*">JackPotCoin (JPC*)</option>
            <option value="LGO">Legolas Exchange (LGO)</option>
            <option value="FLLW">Follow Coin (FLLW)</option>
            <option value="JTX">Project J (JTX)</option>
            <option value="AKA">Akroma (AKA)</option>
            <option value="DROP">Dropil (DROP)</option>
            <option value="UBTC">UnitedBitcoin (UBTC)</option>
            <option value="TRCK">Truckcoin (TRCK)</option>
            <option value="FSC">FriendshipCoin (FSC)</option>
            <option value="LUCKY">LuckyBlocks (LUCKY)</option>
            <option value="VEGA*">VEGA (VEGA)</option>
            <option value="REBL">REBL (REBL)</option>
            <option value="WT">WeToken (WT)</option>
            <option value="AMBT">AMBT Token (AMBT)</option>
            <option value="XEC">Eternal Coin (XEC)</option>
            <option value="PAC">PacCoin (PAC)</option>
            <option value="IHT">I-House Token (IHT)</option>
            <option value="LALA">LaLa World (LALA)</option>
            <option value="NBR">Niobio Cash (NBR)</option>
            <option value="MEE">CoinMeet (MEE)</option>
            <option value="NBX">Noxbox (NBX)</option>
            <option value="PKC">Pikciochain (PKC)</option>
            <option value="CAPP">Cappasity (CAPP)</option>
            <option value="BTRM">Betrium Token (BTRM)</option>
            <option value="ePRX">eProxy (ePRX)</option>
            <option value="KREDS">KREDS (KREDS)</option>
            <option value="ORGT">Organic Token (ORGT)</option>
            <option value="ZIX">ZIX Token (ZIX)</option>
            <option value="LOOM">Loom Network (LOOM)</option>
            <option value="PTC**">Plutocoin (PTC**)</option>
            <option value="ADBL">Adblurb (ADBL)</option>
            <option value="UCASH">U.CASH (UCASH)</option>
            <option value="RCC">Reality Clash (RCC)</option>
            <option value="MAC">MachineCoin (MAC)</option>
            <option value="GAI">GraphGrail AI (GAI)</option>
            <option value="ROCK">Ice Rock Mining (ROCK)</option>
            <option value="OMX">Project Shivom (OMX)</option>
            <option value="XIN">Infinity Economics (XIN)</option>
            <option value="LEDU">LiveEdu (LEDU)</option>
            <option value="BOTC">BotChain (BOTC)</option>
            <option value="ETKN">EasyToken (ETKN)</option>
            <option value="LVL">LevelNet Token (LVL)</option>
            <option value="LCK">Luckbox (LCK)</option>
            <option value="GOC">GoChain (GOC)</option>
            <option value="JOY">JoyToken (JOY)</option>
            <option value="DHT">DeHedge Token (DHT)</option>
            <option value="BITCAR">BitCar (BITCAR)</option>
            <option value="GFT">Giftcoin (GFT)</option>
            <option value="GRO">Gron Digital (GRO)</option>
            <option value="MOAT">Mother Of All Tokens (MOAT)</option>
            <option value="CRL">Cryptelo Coin (CRL)</option>
            <option value="SFU">Saifu (SFU)</option>
            <option value="HGS">HashGains (HGS)</option>
            <option value="ROX">Robotina (ROX)</option>
            <option value="CJT">ConnectJob Token (CJT)</option>
            <option value="MCU">MediChain (MCU)</option>
            <option value="XYO">XYO (XYO)</option>
            <option value="INV*">Invacio (INV*)</option>
            <option value="PAN">Pantos (PAN)</option>
            <option value="ILT">iOlite (ILT)</option>
            <option value="DOR">Dorado (DOR)</option>
            <option value="GEA">Goldea (GEA)</option>
            <option value="NVT">NaviAddress (NVT)</option>
            <option value="CPL">CoinPlace Token (CPL)</option>
            <option value="PROD">Darenta (PROD)</option>
            <option value="FILL">Fillit (FILL)</option>
            <option value="CLIN">Clinicoin (CLIN)</option>
            <option value="EOS">EOS (EOS)</option>
            <option value="HION">Handelion (HION)</option>
            <option value="LCS">LocalCoinSwap (LCS)</option>
            <option value="VLR">Valorem (VLR)</option>
            <option value="ADM">Adamant (ADM)</option>
            <option value="DEC">Darico (DEC)</option>
            <option value="FSBT">Forty Seven Bank (FSBT)</option>
            <option value="GES">Galaxy eSolutions (GES)</option>
            <option value="AUC">Auctus (AUC)</option>
            <option value="PROOF">PROVER (PROOF)</option>
            <option value="AR*">Ar.cash (AR*)</option>
            <option value="HHEM">Healthureum (HHEM)</option>
            <option value="REPUX">Repux (REPUX)</option>
            <option value="ET4">Eticket4 (ET4)</option>
            <option value="GOFF">Gift Off Token (GOFF)</option>
            <option value="KNW">Knowledge (KNW)</option>
            <option value="FOXT">Fox Trading (FOXT)</option>
            <option value="CBC">CashBagCoin (CBC)</option>
            <option value="SGN">Signals Network (SGN)</option>
            <option value="ONL">On.Live (ONL)</option>
            <option value="EQUI">EQUI Token (EQUI)</option>
            <option value="SPEND">Spend (SPEND)</option>
            <option value="MDX">Midex (MDX)</option>
            <option value="DTX">DataBroker DAO (DTX)</option>
            <option value="MNTS">Mint (MNTS)</option>
            <option value="VIN">VinChain (VIN)</option>
            <option value="SAT">Satisfaction Token (SAT)</option>
            <option value="CHI">Chimaera (CHI)</option>
            <option value="HAC">Hackspace Capital (HAC)</option>
            <option value="BIT">BitRewards (BIT)</option>
            <option value="BBI">BelugaPay (BBI)
          </select>
        </div>
        <div class="fiat-select">
          <label class="label-enable">Fiat Currency: </label>
          <select id="fiatSelectBox" class="form-control select2" style="width:auto" onchange="selectFiat()">
            <option id="default-fiat" selected="selected">INR</option>
            <option>CNY</option>
            <option>USD</option>
            <option>EUR</option>
            <option>GBP</option>
            <option>JPY</option>
            <option>RUB</option>
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
          </select>
        </div>
        <script type="text/javascript">
          function selectCrypto() {
            globalCryptoValue = document.getElementById("cryptoSelectBox").value; //.match(/\(([^)]+)\)/)[1];
            changeAllTop();
            drawMainChart();
            getMarketData();
          }

          function selectFiat() {
            globalFiatValue = document.getElementById("fiatSelectBox").value;
            changeAllTop();
            drawMainChart();
            getMarketData();
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
          </div>
        </div>

        <script src="livedatatop.js"></script>
        <script src="loadCoinLogo.js"></script>
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
        </script>

        <script src="LineChartMain.js"></script>
        <div class="row box" style="width:100%;margin-left:0px;margin-right:0px;height:auto;padding-left:5px;padding-right:5px;padding-top:5px">
          <div class="chartTypeTabHolder">
            <div class="chartTypeTab">
              <button class="tabChartTyp" onclick="initChartTypeChange(event,'candlestick')">CandleStick</button>
              <button class="tabChartTyp active" onclick="initChartTypeChange(event,'smoothedLine')">Line</button>
              <button class="tabChartTyp" onclick="initChartTypeChange(event,'ohlc')">OHLC</button>
            </div>
          </div>
          <div id="chartdiv" style="height:80vh;width:100%;overflow:visible">
            <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
            <script src="https://www.amcharts.com/lib/3/serial.js"></script>
            <!-- <script src="/amCharts/amstock.js"></script> -->

            <!-- <script src="https://www.amcharts.com/lib/3/amstock.js"></script> -->
            <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
            <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
            <script src="amCharts/light.js"></script>
            <script src="amCharts/amstock.js"></script>

            <!--<div style='clear:both;'>clear</div>-->
            <script type="text/javascript">
              drawMainChart();
              // alert("OK 1 ");
              // var xhttpConsChart = new XMLHttpRequest();
              // xhttpConsChart.onreadystatechange = function() {
              //   if (this.readyState == 4 && this.status == 200) {
              //     document.getElementById("chartdivholder").innerHTML = xhttpConsChart.responseText;
              //     console.log(xhttpConsChart.responseText);
              //     alert("OK");
              //   }
              // };
              //xhttpConsChart.open("GET", "LineChartMain.html", true);
              //xhttpConsChart.send();
            </script>
          </div>
        </div>



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
              <div class="claculatorComponents" style="width:100px">
                <i class="fas fa-exchange-alt" style="font-size:20px"></i>
              </div>
              <div class="group_convert claculatorComponents">
                <input id="CryptoInput" class="input_convert" type="text" oninput="convertToFiat()" required>
                <!-- <span class="highlight"></span> -->
                <span class="bar_convert"></span>
                <label class="label_convert">Crypto Currency</label>
              </div>
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
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Other Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding" style="overflow:auto">
              <table class="table table-striped table-bordered" id="OtherDetailsTable">
                <tr>
                  <th>Max Supply</th>
                  <th>Algorithm</th>
                  <th>Proof Type</th>
                  <th>Start Date</th>
                  <th>Twitter</th>
                  <th>Website</th>
                </tr>
                <tr>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                </tr>
                <tr>
                  <th>Difficulty Adj.</th>
                  <th>Block RR.</th>
                  <th>Block No.</th>
                  <th>Network Hash/s</th>
                  <th>Current Supply</th>
                  <th>Block Reward</th>
                </tr>
                <tr>
                  <td>-</td>
                  <td>-</td>
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


        <div class="row">
          <div class="col-xs-12">

            <!-- /.box -->

            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Markets for INR</h3>
              </div>
              <div id="marketsDataTable" class="box-body" style="padding:0">
                Loading ⌛
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
          <script src="ccc-streamer-utilities.js"></script>
          <script src="stream.js"></script>
          <script src="MarketsTableFill_2.js"></script>
          <script type="text/javascript">
            getMarketData();
          </script>
        </div>

        <div class="row box" style="margin:0;width:auto;margin-bottom: 20px">
          <div class="col-md-6" style="margin-left:0;margin-right:0;margin-bottom:10px;height:70vh;padding:10px">
            <div style="height:100%;overflow:auto">
              <a class="twitter-timeline" href="https://twitter.com/Bitcoin?ref_src=twsrc%5Etfw">Tweets by Bitcoin</a>
              <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
          </div>
          <div class="col-md-6" style="margin-left:0;margin-right:0;margin-bottom:10px;height:70vh;padding:10px;">
            <div class="NewsWidgetHolder" style="height: 100%; overflow-y: auto">
              <div class="NewsWidgetMainHeading">
                <h1 style="margin:0">Cointelegraph.com News</h1>
              </div>
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
        </div>

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
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li>
          <a href="#control-sidebar-home-tab" data-toggle="tab">
            <i class="fa fa-home"></i>
          </a>
        </li>
        <li>
          <a href="#control-sidebar-settings-tab" data-toggle="tab">
            <i class="fa fa-gears"></i>
          </a>
        </li>
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
                <a href="javascript:void(0)" class="text-red pull-right">
                  <i class="fa fa-trash-o"></i>
                </a>
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

  <script type="text/javascript">
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
  </script>

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
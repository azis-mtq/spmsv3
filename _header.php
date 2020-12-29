<?php 

session_start();

// jika tidak ada session login, redirect ke halaman login
if(!isset($_SESSION["login_session"])) {
    header("Location: auth/login.php");
    exit;
}
$useractive = $_SESSION["username"];

require_once "_config.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= BASEURL; ?>_assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= BASEURL; ?>_assets/webfonts/all.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?= BASEURL; ?>_assets/css/bootstrap-datepicker.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= BASEURL; ?>_assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= BASEURL; ?>_assets/css/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    .swal2-container {
      zoom: 1.5;
    }
  </style>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?= BASEURL; ?>" class="navbar-brand"><b>SPMS</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">

            <!-- jika ada session bernama role -->
            <?php if(isset($_SESSION["role"])) : ?>

              <!-- simpan session role ke dalam variabel $role -->
              <?php $role = $_SESSION["role"]; ?>

              <!-- jika $role sama dengan 1, maka tampilkan menu untuk operator -->
              <?php if($role == 1) : ?>
                <li class="<?= ($page == "main" ? "active" : "")?>"><a href="<?= BASEURL; ?>"><i class="fa fa-home"></i> Dashboard </a></li>
                <li class="<?= ($page == "loading" ? "active" : "")?>"><a href="<?= BASEURL; ?>loading"><i class="fa fa-cloud-download-alt"></i> Loading</a></li>
                <li class="<?= ($page == "unloading" ? "active" : "")?>"><a href="<?= BASEURL; ?>unloading"><i class="fa fa-cloud-upload-alt"></i> Unloading</a></li>
                <li class="<?= ($page == "drying" ? "active" : "")?>"><a href="#"><i class="fa fa-cloud-sun"></i> Drying</a></li>

              <!-- jika $role sama dengan 2, maka tampilkan menu untuk foreman -->
              <?php elseif($role == 2) : ?>
                <li class="<?= ($page == "main" ? "active" : "")?>"><a href="<?= BASEURL; ?>"><i class="fa fa-home"></i> Dashboard </a></li>
                <li class="<?= ($page == "loading" ? "active" : "")?>"><a href="<?= BASEURL; ?>loading"><i class="fa fa-cloud-download-alt"></i> Loading</a></li>
                <li class="<?= ($page == "unloading" ? "active" : "")?>"><a href="<?= BASEURL; ?>unloading"><i class="fa fa-cloud-upload-alt"></i> Unloading</a></li>
                <li class="<?= ($page == "drying" ? "active" : "")?>"><a href="#"><i class="fa fa-cloud-sun"></i> Drying</a></li>
                <li class="<?= ($page == "unloading" ? "active" : "")?>"><a href="#"><i class="fa fa-box"></i> Picking</a></li>
                <li class="<?= ($page == "drying" ? "active" : "")?>"><a href="#"><i class="fa fa-box-open"></i> Return</a></li>

              <?php endif; ?>
            <?php endif; ?>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login as  <?= $_SESSION["username"]; ?> <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?= BASEURL; ?>auth/logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
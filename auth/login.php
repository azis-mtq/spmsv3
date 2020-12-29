<?php

session_start();
// jika sudah ada session login, redirect ke halaman utama
if(isset($_SESSION["login_session"])) {
    header("Location: ../index.php");
    exit;
}

require_once "../_config.php";

if(isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM tbl_users WHERE username = '$username'");

    // cek username
    if(mysqli_num_rows($result) === 1) {

        //cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])) {
            // jika passwordnya benar, buat session bernama login_session
            $_SESSION["login_session"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["fullname"] = $row["fullname"];
            $_SESSION["role"] = $row["role_id"];
            
            // lalu redirect ke halaman utama
            header("Location: ../index.php");
            exit;
        }
    }

    // jika username dan password tidak ditemukan, set variabel $error menjadi bernilai true
    $error = true;
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPMS - Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= BASEURL; ?>_assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= BASEURL; ?>_assets/webfonts/all.css">
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
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>SPMS</b>Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username">
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4 pull-right">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?= BASEURL; ?>_assets/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= BASEURL; ?>_assets/js/bootstrap.min.js"></script>

</body>
</html>

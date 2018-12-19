<?php
require_once("../../../configuration/configuration.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=BASE_URL.'admin/ample-admin-lite/plugins/images/favicon.png'?>">
    <title>404.php</title>
    <!-- Bootstrap Core CSS -->

    <link href="<?=BASE_URL.'admin/ample-admin-lite/public/bootstrap/dist/css/bootstrap.min.css'?>" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?=BASE_URL.'admin/ample-admin-lite/public/css/animate.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=BASE_URL.'admin/ample-admin-lite/public/css/style.css'?>" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?=BASE_URL.'admin/ample-admin-lite/public/css/colors/default.css'?>" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?=BASE_URL.'admin/ample-admin-lite/public/js/html5shiv.js'?>"></script>
    <script src="<?=BASE_URL.'admin/ample-admin-lite/public/js/respond.min.js'?>"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <section id="wrapper" class="error-page">
        <div class="error-box">
            <div class="error-body text-center">
                <h1 class="text-danger">404</h1>
                <h3 class="text-uppercase">Page Not Found !</h3>
                <p class="text-muted m-t-30 m-b-30">YOU SEEM TO BE TRYING TO FIND YOUR WAY HOME</p>
                <a href="../login/index.php" class="btn btn-danger btn-rounded waves-effect waves-light m-b-40">Back to home</a> </div>
            <footer class="footer text-center">ADMINISTRATION</footer>
        </div>
    </section>
    <!-- jQuery -->
    <script src="<?=BASE_URL.'admin/ample-admin-lite/plugins/bower_components/jquery/dist/jquery.min.js'?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=BASE_URL.'admin/ample-admin-lite/public/bootstrap/dist/js/bootstrap.min.js'?>"></script>
</body>

</html>

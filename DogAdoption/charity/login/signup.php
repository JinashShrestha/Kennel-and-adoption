<?php
require_once("../configuration/configuration.php");
require_once(ROOT . 'database/connection.php');
require_once(ROOT . 'system/message/message.php');
require_once(ROOT . 'system/redirect/redirect.php');

if (!empty($_POST) || !empty($_FILES) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['password_confirmation']);

    if (($name == '') || ($phone == '') ||($email=='') ||($password=='') ||($cpassword=='')){
        $_SESSION['error'] = "Please Enter All Required Informations";
        To('login/signup.php');

    }

    if (!filter_var($phone, FILTER_VALIDATE_FLOAT)) {
        $_SESSION['error'] = 'Phone Number is not valid';
        To('login/signup.php');
    }

    if (strlen( $phone)!=10) {
        $_SESSION['error'] = 'Phone Number must be of 10 characters';
        To('login/signup.php');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Email is not valid';
        To('login/signup.php');
    }


    if ($password != $cpassword) {
        $_SESSION['error'] = 'Password did not match with confirmation';
        To('login/signup.php');
    }

    $ext = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);
    if ($ext!='jpg' && $ext!='jpeg' && $ext!='jpg' && $ext!='png' && $ext!='gif'){
        $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
        To('login/signup.php');

    }

    $imageName = md5(microtime()) . '.' . $ext;
    $error = $_FILES['upload']['error'];
    $size = $_FILES['upload']['size'];
    $tpm=$_FILES['upload']['tmp_name'];

    $uploadPath = ROOT . 'public/images/users/';


    if (!move_uploaded_file($tpm, $uploadPath.$imageName)) {
        $_SESSION['error'] = 'Problem uploading the image or Image was not selected';
        To('login/signup.php');
    }

    $image = $imageName;

    // insert query

    $query = "INSERT INTO tbl_users(name,phone,email,password,image)
              VALUES ('$name','$phone','$email','$password','$image')";

    $result1 = mysqli_query($conn, $query);
    if ($result1 == true) {
        $_SESSION['success'] = " Data was successfully inserted";
        To('login/index.php');
    }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="<?= BASE_URL . 'admin/ample-admin-lite/public/bootstrap/dist/css/bootstrap.css' ?>">
    <link rel="stylesheet"
          href="<?= BASE_URL . 'admin/ample-admin-lite/public/less/icons/font-awesome/css/font-awesome.css' ?>">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top: 100px">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= Messages() ?>
                            <center><h2><i class="fa fa-user"></i> USER REGISTRATION</h2></center>

                </div>
                <div class="panel-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                       placeholder="Enter your name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email"
                                       placeholder="Enter your email">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password"
                                       placeholder="Enter your password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cpassword">Password Confirmation</label>
                                <input type="password" name="password_confirmation" class="form-control" id="cpassword"
                                       placeholder="Enter your confirmation password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone"
                                       placeholder="Enter your phone number">
                            </div>
                        </div>
                       <div class="col-md-6">
                            <div class="form-group">
                                <label for="upload">Profile Picture</label>
                                <input type="file" name="upload" class="btn btn-default" id="upload">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-facebook "><i class="fa fa-plus"></i> Add Record</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=BASE_URL.'public/bootstrap/js/scripts.min.js'?>"></script>
<script src="<?=BASE_URL.'public/bootstrap/js/main.min.js'?>"></script>
<script src="<?=BASE_URL.'public/bootstrap/js/custom1.js'?>"></script>

</body>
</html>
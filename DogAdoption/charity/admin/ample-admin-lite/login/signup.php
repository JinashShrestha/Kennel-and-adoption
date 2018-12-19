<?php
require_once("../../../configuration/configuration.php");
require_once(ROOT . 'database/connection.php');
require_once(ROOT . 'admin/ample-admin-lite/layouts/header.php');
require_once(ROOT . 'system/message/message.php');
require_once(ROOT . 'system/redirect/redirect.php');

if (!empty($_POST) || !empty($_FILES) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['password_confirmation']);

    if (($name == '') || ($phone == '') || ($email == '') || ($password == '') || ($cpassword == '')) {
        $_SESSION['error'] = "Please Enter All Required Informations";
        To('admin/ample-admin-lite/login/signup.php');

    }

    if (!filter_var($phone, FILTER_VALIDATE_FLOAT)) {
        $_SESSION['error'] = 'Phone Number is not valid';
        To('admin/ample-admin-lite/login/signup.php');
    }

    if (strlen( $phone)!=10) {
        $_SESSION['error'] = 'Phone Number must be of 10 characters';
        To('admin/ample-admin-lite/login/signup.php');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Email is not valid';
        To('admin/ample-admin-lite/login/signup.php');
    }


    if ($password != $cpassword) {
        $_SESSION['error'] = 'Password did not match with confirmation';
        To('admin/ample-admin-lite/login/signup.php');
    }

    $ext = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);
    if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'jpg' && $ext != 'png' && $ext != 'gif') {
        $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
        To('admin/ample-admin-lite/login/signup.php');

    }

    $imageName = md5(microtime()) . '.' . $ext;
    $error = $_FILES['upload']['error'];
    $size = $_FILES['upload']['size'];
    $tpm = $_FILES['upload']['tmp_name'];

    $uploadPath = ROOT . 'admin/ample-admin-lite/public/images/admin/';


    if (!move_uploaded_file($tpm, $uploadPath . $imageName)) {
        $_SESSION['error'] = 'Problem uploading the image or Image was not selected';
        To('admin/ample-admin-lite/login/signup.php');
    }

    $image = $imageName;

    // insert query

    $query = "INSERT INTO tbl_admin(name,phone,email,password,image)
              VALUES ('$name','$phone','$email','$password','$image')";

    $result1 = mysqli_query($conn, $query);
    if ($result1 == true) {
        $_SESSION['success'] = "New Admin was successfully recorded";
        To('admin/ample-admin-lite/login/signup.php');
    }
    else{
        $_SESSION['error'] = " New Admin was not successfully inserted (May be due to Duplicate email)";
        To('admin/ample-admin-lite/login/signup.php');
    }
}


?>

    <div class="container-fluid">
        <div class="content">

            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3" style="margin-top: 100px">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <?= Messages() ?>
                            <center><h2><i class="fa fa-user"></i> ADMIN REGISTRATION</h2></center>

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
                                        <input type="password" name="password_confirmation" class="form-control"
                                               id="cpassword"
                                               placeholder="Enter your confirmation password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="phone" name="phone" class="form-control" id="phone"
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
                                        <button class="btn btn-ghost "><i class="fa fa-plus"></i> Add Admin</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
require_once(ROOT . 'admin/ample-admin-lite/layouts/footer.php');

?>
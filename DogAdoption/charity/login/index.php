<?php
require_once("../configuration/configuration.php");

require_once(ROOT.'database/connection.php');
require_once(ROOT.'system/message/message.php');
require_once(ROOT.'system/redirect/redirect.php');
//require_once(ROOT . 'system/redirect/logRedirect.php');

if (isset($_POST['register'])){
    To("login/signup.php");
}


 if (!empty($_POST) && $_SERVER['REQUEST_METHOD']=="POST"){

     $user_name=$_POST['user_name'];
     $password=md5($_POST['password']);
     $query="SELECT * FROM tbl_users WHERE name='$user_name' AND password='$password'";
     $result=mysqli_query($conn,$query);
     $countData=mysqli_num_rows($result);
     if($countData>0)
     {
         $userData=mysqli_fetch_assoc($result);
        $_SESSION['user_name']=$userData['name'];
        $_SESSION['phone']=$userData['phone'];
        $_SESSION['user_email']=$userData['email'];
        $_SESSION['user_image']=$userData['image'];
        $_SESSION['is_log_in']=true;
        To("view/");
        exit();
     }
     else{
         $_SESSION['is_log_in']=false;
         $_SESSION['error']="Username and Password didn't match.";
         To('login/');

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
    <link rel="stylesheet" href="<?=BASE_URL.'admin/ample-admin-lite/public/bootstrap/dist/css/bootstrap.css'?>">
    <link rel="stylesheet" href="<?=BASE_URL.'admin/ample-admin-lite/public/less/icons/font-awesome/css/font-awesome.css'?>">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="margin-top: 100px">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= Messages() ?>
                    <h3 class="panel-title"><center><b>User Login</b></center></h3>
                </div>
                <div class="panel-body">
                    <form action="" method="post">
                    <div class="form-group">
                        <label for="user_name">User Name</label>
                        <input type="text" name="user_name" id="user_name" placeholder="Enter Your User Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Your Password" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-facebook">Login</button>
                    </div>
                        <hr>
                        <div class="form-group">
                            <b>New Here, Please Register First:</b><br> <button name="register" class="btn btn-facebook" >Register</button>
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





<?php

//require_once("../../../../configuration/configuration.php");
require_once('redirect.php');

if(isset($_SESSION['user_name']))
{
}
else
{
        if($_SESSION['is_log_in']!= TRUE) {
        $_SESSION['error'] = "Invalid access";
        To('admin/ample-admin-lite/login/');
        exit();
    }
}
<?php
require_once("../../../configuration/configuration.php");
require_once(ROOT . 'system/redirect/redirect.php');
session_destroy();
session_start();
$_SESSION['success']="You have logged out successfully.";
$_SESSION['log_in']=false;
To('admin/ample-admin-lite/login/');



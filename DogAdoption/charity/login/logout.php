<?php
require_once("../configuration/configuration.php");
require_once(ROOT . 'system/redirect/redirect.php');
session_destroy();
session_start();
$_SESSION['success']="You have logged out successfully.";
$_SESSION['is_log_in']=false;
To('login/');



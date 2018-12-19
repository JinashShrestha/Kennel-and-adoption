<?php

//require_once("../../../../configuration/configuration.php");
require_once('redirect.php');

if(($_SESSION['is_log_in'])==TRUE)
{
}
else
{
        if($_SESSION['is_log_in']!= TRUE) {
        $_SESSION['error'] = "Please Login First";
        To('login/');
        exit();
    }
}
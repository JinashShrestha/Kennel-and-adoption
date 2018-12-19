<?php

define('HOST', '127.0.0.1');
define('USER', 'root');
define('PASSWORD', '');
define('DB', 'adoption');


$conn = mysqli_connect(HOST, USER, PASSWORD, DB);

if ($conn != true) {
    die(mysqli_errno($conn));
}
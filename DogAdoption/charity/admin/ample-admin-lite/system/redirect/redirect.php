<?php

if (!function_exists('To')) {
    function To($path = '')
    {
        $redirectPath = BASE_URL.$path;
        header('Location:' . $redirectPath);
        exit();


    }

}





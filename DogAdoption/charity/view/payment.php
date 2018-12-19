<?php
require_once("../configuration/configuration.php");
require_once(ROOT . 'database/connection.php');
require_once(ROOT . 'layouts/header2.php');
require_once(ROOT . 'system/message/message.php');
require_once(ROOT . 'system/redirect/redirect.php');
?>

<div class="container" xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <div class="col-md-12" style="margin-top: 100px">
            <?= Messages() ?>

            <center>  <h1>Payment Services</h1> </center>
        </div>
        <a class="col-md-12">
            <a href="https://esewa.com.np"><center><img src="<?= BASE_URL.'public/images/payment/esewa.png'?>" alt="image not found" height="150px" width="260px" ></center></a>
            <a href="https://khalti.com"><center>   <img src="<?= BASE_URL.'public/images/payment/khalti.png'?>" alt="image not found" height="150px" width="260px" ></center></a>
            <a href="https://ipay.com.np"><center><img src="<?= BASE_URL.'public/images/payment/ipay.jpg'?>" alt="image not found" height="150px" width="260px" ></center></a>
        </div>
    </div>
</div>
<hr>
<footer>
    <center>Best Friend : Different But Best Friend</center>
</footer>

<script src="<?=BASE_URL.'public/bootstrap/js/custom1.js'?>"></script>

</body>
</html>

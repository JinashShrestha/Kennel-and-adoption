<?php
require_once("../configuration/configuration.php");
if ($_SESSION['is_log_in'] == true) {
    require_once(ROOT . 'layouts/header2.php');
} else {
    require_once(ROOT . 'layouts/header.php');

}
//require_once(ROOT . 'system/redirect/logRedirect.php');
require_once(ROOT . 'database/connection.php');
require_once(ROOT . 'system/message/message.php');
require_once(ROOT . 'system/redirect/redirect.php');

$query = "SELECT *
From tbl_dogs INNER JOIN tbl_breeds ON tbl_dogs.breed_id=tbl_breeds.breed_id ORDER BY dog_id DESC ";
$dog_result = mysqli_query($conn, $query);
$numberOfRows = mysqli_fetch_row($dog_result);
?>


    <section class="probootstrap-hero probootstrap-hero-inner"
             style="background-image: url(../public/img/hero_bg_bw_1.jpg)" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                        <h1 class="probootstrap-heading probootstrap-animate">Our Gallery <span>Together we can make a difference</span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-10" style="margin-left: 100px">
                    <div class="white-box">
                        <div class="row">
                            <!--        <div class="content">-->
                            <!--            <div class="row probootstrap-gutter10">-->

                            <?php if ($numberOfRows > 0) : ?>
                            <?php $i = 1;
                            foreach ($dog_result as $dogs) : ?>
                            <tr>
                                <td class="zoom">
                                    <div class="col-md-4" style="margin-top:20px">
                                        <a href="" class="label label-info"
                                           style="font-size: larger" >Name: <?= strtoupper($dogs['dog_name']) ?></a>
                                        <br> <a href="" class="label label-success"
                                                style="font-size: larger">Breed: <?= strtoupper($dogs['breed_name']) ?></a>
                                        <br>
                                        <img src="<?= BASE_URL . 'admin/ample-admin-lite/public/images/dogs/' . $dogs['image'] ?>"
                                             alt="image not found"
                                             width="300" height="300">
                                    </div>

                                </td>


                                <?php

                                endforeach;
                                endif;
                                ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
require_once(ROOT . 'layouts/footer.php');

?>
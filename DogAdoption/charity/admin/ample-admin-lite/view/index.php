<!DOCTYPE html>

<?php
// require configuration file
require_once("../../../configuration/configuration.php");
require_once(ROOT . 'admin/ample-admin-lite/system/message/message.php');
require_once(ROOT . 'admin/ample-admin-lite/system/redirect/redirect.php');

$urlPage = isset($_GET['url']) ? $_GET['url'] : 'index';
$title = $urlPage;
$urlPage = $urlPage . '.php';

require_once(ROOT . 'admin/ample-admin-lite/layouts/header.php');

if (!isset($_SESSION['user_name'])){
    $_SESSION['error']="Invalid Access";
    To("admin/ample-admin-lite/login/index.php");
}
?>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                <h2>
                    <?php
                    date_default_timezone_set("Asia/Kathmandu");
                    echo "Date: " . date("Y-m-d") . "<br>";
                    echo "Time: " . date("h:i:sa");
                    ?>
                </h2>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <center><h1 >Welcome To Admin Page</h1></center>
                </div>
            </div>
        </div>
        
        <div class="img-responsive">
            <center><img src="<?=BASE_URL."admin/ample-admin-lite/public/images/front/index.jpeg"?>" alt="Image not found"></center>
        </div>    
    </div>
</div>


<?php
require_once(ROOT . 'admin/ample-admin-lite/layouts/footer.php');

?>
<?php
require_once("../../../configuration/configuration.php");
require_once(ROOT . 'admin/ample-admin-lite/system/redirect/logRedirect.php');
require_once(ROOT . 'admin/ample-admin-lite/layouts/header.php');
require_once(ROOT . 'database/connection.php');
require_once(ROOT . 'admin/ample-admin-lite/system/message/message.php');
require_once(ROOT . 'admin/ample-admin-lite/system/redirect/redirect.php');

$query = "SELECT *
From tbl_donations  ORDER BY donation_id DESC ";
$result = mysqli_query($conn, $query);
$numberOfRows = mysqli_fetch_row($result);
$number_of_results = mysqli_num_rows($result);

$results_per_page = 5;

// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);

// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;
// retrieve selected results from database and display them on page
$sql='SELECT *
From tbl_donations  ORDER BY donation_id DESC
 LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result0 = mysqli_query($conn, $sql);


?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">View Donors</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">View Donors</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="row">
                        <?= Messages() ?>
                        <form action="" method="post">
                            <table class="table">
                                <tr>
                                    <th>S.N</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Amount</th>
                                    <th>Note</th>
                                </tr>
                                <?php if ($numberOfRows > 0) : ?>
                                    <?php
                                    if (!isset($_GET['page'])) {
                                        $page = 1;
                                    } else {
                                        $page = $_GET['page'];
                                    }
                                    $sn = ($page - 1)* $results_per_page +1;

                                    foreach ($result0 as $donors) : ?>
                                        <tr>
                                            <td><?= $sn++ ?></td>
                                            <td><?= $donors['name'] ?></td>
                                            <td><?= $donors['email'] ?></td>
                                            <td><?= $donors['phone'] ?></td>
                                            <td><?= $donors['amount'] ?></td>
                                            <td><?= $donors['note'] ?></td>

<!--                                            <td>-->
<!--                                                <form action="" method="post">-->
<!--                                                    <input type="hidden" name="dog_id"-->
<!--                                                           value="--><?//= $donors['dog_id'] ?><!--">-->
<!--                                                    <button name="edit_dog" class="btn btn-primary btn-xs"-->
<!--                                                            onclick="return confirm('Do you sure wanna edit?')">-->
<!--                                                        <i class="fa fa-edit"></i> Edit-->
<!--                                                    </button>-->
<!--                                                    <button name="delete_dog" class="btn btn-danger btn-xs"-->
<!--                                                            onclick="return confirm('Do you want to delete ?')">-->
<!--                                                        <i class="fa fa-trash"></i> Delete-->
<!--                                                    </button>-->
<!--                                                </form>-->
<!--                                            </td>-->
                                        </tr>
                                        <?php
                                    endforeach; ?>
                                <?php else : ?>

                                    <tr>
                                        <td colspan="7"><a href=""> Data not found</a></td>
                                    </tr>
                                <?php endif; ?>
                            </table>
                            <?php
                            // display the links to the pages
                            for ($page=1;$page<=$number_of_pages;$page++) {
                                echo '<span style="border:2px solid #b9def0; margin-right:3px; font-size: 25px"><a href="donor.php? page=' . $page . '">' . $page . '</a> </span>';
                            }?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

require_once(ROOT . 'admin/ample-admin-lite/layouts/footer.php');
?>


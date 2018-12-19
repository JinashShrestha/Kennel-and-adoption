<?php
require_once("../configuration/configuration.php");
//require_once(ROOT . 'system/redirect/logRedirect.php');

if ($_SESSION['is_log_in']==true) {
    require_once(ROOT . 'layouts/header2.php');
}
else{
    require_once(ROOT . 'layouts/header.php');

}

require_once(ROOT . 'database/connection.php');
require_once(ROOT . 'system/message/message.php');
require_once(ROOT . 'system/redirect/redirect.php');

$breed_name = "SELECT * FROM tbl_breeds";
$breedResult = mysqli_query($conn, $breed_name);


$query = "SELECT *
From tbl_dogs INNER JOIN tbl_breeds ON tbl_dogs.breed_id=tbl_breeds.breed_id ORDER BY dog_id DESC ";
$dog_result = mysqli_query($conn, $query);
$numberOfRows = mysqli_fetch_row($dog_result);
$number_of_results = mysqli_num_rows($dog_result);

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
From tbl_dogs INNER JOIN tbl_breeds ON tbl_dogs.breed_id=tbl_breeds.breed_id ORDER BY dog_id DESC 
 LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result0 = mysqli_query($conn, $sql);


if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT *
From tbl_dogs INNER JOIN tbl_breeds ON tbl_dogs.breed_id=tbl_breeds.breed_id ORDER BY dog_id WHERE CONCAT('age','color','gender','breed_name',) LIKE '%".$valueToSearch."%'";
//    $search_result = mysqli_query($conn, $query);

    $search_result = filterTable($query);

}
else {
    $query = "SELECT *
From tbl_dogs INNER JOIN tbl_breeds ON tbl_dogs.breed_id=tbl_breeds.breed_id ORDER BY dog_id";
//    $search_result = mysqli_query($conn, $query);
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "adoption");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div style="margin-top: 130px">
                <?php if (isset($_SESSION['is_log_in'])) { ?>

                <?php if ($_SESSION['is_log_in']==true) { ?>


                <center><p class="probootstrap-animate"><a href="adopt.php"  class="btn btn-primary btn-lg">Adopt Now</a>
                        <a href="buy.php" class="btn btn-primary btn-lg">Buy Now</a></p></center>
                <center><h2 class="page-title" style="color: #FDBE34">Dogs</h2></center>
            </div>
<?php } }?>

            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-10" style="margin-left: 100px">
                <div class="white-box">
                    <div class="row">
                        <?= Messages() ?>
                        <form action="search.php" method="post">
                            <label for="search">
                                <input type="text" class="form-control" name="keywords"  placeholder="Breed Name/Color/Age" autocomplete="off">
                            </label>
                            <input type="submit" value="Search">
                        </form>
                        <form action="" method="post">
                            <?php
                            // display the links to the pages
                            for ($page=1;$page<=$number_of_pages;$page++) {
                                echo '<span style="border:2px solid orange; margin-right:3px; font-size: 25px"><a href="view_dogs.php? page=' . $page . '">' . $page . '</a> </span>';
                            }?>
                            <table class="table">
                                <tr>
                                    <th>S.N</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Color</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                    <th>Price</th>
                                    <th>Breed</th>

                                    <th style="text-align: center">Image</th>
                                </tr>
                                <?php if ($numberOfRows > 0) : ?>
                                    <?php
                                    if (!isset($_GET['page'])) {
                                        $page = 1;
                                    } else {
                                        $page = $_GET['page'];
                                    }
                                    $sn = ($page - 1)* $results_per_page +1;
                                    foreach ($result0 as $dogs) : ?>
                                        <tr>
                                            <td><?= $sn++; ?></td>
                                            <td><?= $dogs['dog_name'] ?></td>
                                            <td><?= $dogs['age'] ?></td>
                                            <td><?= $dogs['color'] ?></td>
                                            <td><?= $dogs['gender'] ?></td>
                                            <td><?= $dogs['action'] ?></td>
                                            <td><?= $dogs['price'] ?></td>

                                            <td><?= $dogs['breed_name'] ?></td>
                                            <td class="zoom">
                                                <!--                                                <td>-->

                                                <img src="<?= BASE_URL . 'admin/ample-admin-lite/public/images/dogs/' . $dogs['image'] ?>"
                                                     alt="image not found"
                                                     width="150" height="150">
                                                <div class="middle">
                                                    <form action="" method="post">
                                                        <input type="hidden" name="dog_id"
                                                               value="<?= $dogs['dog_id'] ?>">
                                                    </form>
                                                </div>
                                            </td>

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
                                echo '<span style="border:2px solid orange; margin-right:3px; font-size: 25px"><a href="view_dogs.php? page=' . $page . '">' . $page . '</a> </span>';
                            }?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

require_once(ROOT . 'layouts/footer.php');
?>


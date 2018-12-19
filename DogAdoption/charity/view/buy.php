<?php
require_once("../configuration/configuration.php");
require_once(ROOT . 'layouts/header2.php');
require_once(ROOT . 'system/redirect/logRedirect.php');
require_once(ROOT . 'database/connection.php');
require_once(ROOT . 'system/message/message.php');
require_once(ROOT . 'system/redirect/redirect.php');


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

if (isset($_POST['buy']) && $_SERVER['REQUEST_METHOD'] == 'POST')
{
    $name=$_SESSION['user_name'];
    $phone=$_SESSION['phone'];
    $email=$_SESSION['user_email'];

    $dog_id = $_POST['dog_id'];
    $dog_name = $_POST['dog_name'];
    $breed = $_POST['breed_name'];
    $age = $_POST['age'];
    $color = $_POST['color'];
    $gender = $_POST['gender'];
    $image = $_POST['image'];
    $price = $_POST['price'];


    $query = "INSERT INTO tbl_buyer(name,email,phone,dog_name,breed,age,color,gender,image,price)
              VALUES ('$name','$email','$phone','$dog_name','$breed','$age','$color','$gender','$image',$price)";
    $result1 = mysqli_query($conn, $query);
    if ($result1 == true) {
//        $_SESSION['success'] = "Thank you for purchasing :)";
        $dogId = $_POST['dog_id'];

//        DeleteWithImage($dogId);
        $sql = "DELETE FROM tbl_dogs WHERE dog_id={$dogId}";
        $deleteResult = mysqli_query($conn, $sql);

        To('view/payment.php');


    }
}
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div style="margin-top: 130px">
                <center><h2 class="page-title" style="color: #FDBE34">Buy Dogs</h2></center>
            </div>

            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-10" style="margin-left: 100px">
                <div class="white-box">
                    <div class="row">
                        <?= Messages() ?>

                            <form action="" method="post">
                                <?php
                                // display the links to the pages
                                for ($page=1;$page<=$number_of_pages;$page++) {
                                    echo '<span style="border:2px solid orange; margin-right:3px; font-size: 25px"><a href="buy.php? page=' . $page . '">' . $page . '</a> </span>';
                                }?>
                                <table class="table">
                                    <tr>
<!--                                        <th>S.N</th>-->
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Color</th>
                                        <th>Gender</th>
                                        <th>Price</th>
                                        <th>Breed</th>

                                        <th style="text-align: center">Image</th>
                                        <th>Adoption Process</th>
                                    </tr>
                                    <?php if ($numberOfRows > 0) : ?>
                                        <?php $i = 1;
                                        foreach ($result0 as $dogs) : ?>
                                            <?php if ($dogs['action']=='sell') : ?>
                                            <tr>
<!--                                                <td>--><?//= $i ?><!--</td>-->
                                                <td><?= $dogs['dog_name'] ?></td>
                                                <td><?= $dogs['age'] ?></td>
                                                <td><?= $dogs['color'] ?></td>
                                                <td><?= $dogs['gender'] ?></td>
                                                <td><?= $dogs['price'] ?></td>
                                                <td><?= $dogs['breed_name'] ?></td>

                                                <td class="zoom">
                                                    <!--                                                <td>-->

                                                    <img src="<?= BASE_URL . 'admin/ample-admin-lite/public/images/dogs/' . $dogs['image'] ?>"
                                                         alt="image not found"
                                                         width="300" height="150">
                                                </td>
                                                <td>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="dog_id"
                                                               value="<?= $dogs['dog_id'] ?>"
                                                        >
                                                        <input type="hidden" name="dog_name"
                                                               value="<?= $dogs['dog_name'] ?>"
                                                        >
                                                        <input type="hidden" name="age"
                                                               value="<?= $dogs['age'] ?>"
                                                        >
                                                        <input type="hidden" name="color"
                                                               value="<?= $dogs['color'] ?>"
                                                        >
                                                        <input type="hidden" name="gender"
                                                               value="<?= $dogs['gender'] ?>"
                                                        >
                                                        <input type="hidden" name="price"
                                                               value="<?= $dogs['price'] ?>"
                                                        >
                                                        <input type="hidden" name="breed_name"
                                                               value="<?= $dogs['breed_name'] ?>"
                                                        >
                                                        <input type="hidden" name="image"
                                                               value="<?= $dogs['image'] ?>"
                                                        >

                                                        <button name="buy" class="btn btn-primary btn-xs"
                                                                onclick="return confirm('There are more than 20,000 street dogs in urban Kathmandu, and over 35,000 in the Kathmandu Valley. We promote adoption :) Do you really want to buy?')">
                                                            <i class="fa fa-hand-o-left"></i> Buy
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                                <?php $i++; endif; ?>
                                            <?php  endforeach; ?>
                                    <?php else : ?>

                                        <tr>
                                            <td colspan="7"><a href=""> Data not found</a></td>
                                        </tr>
                                    <?php endif; ?>
                                </table>
                                <?php
                                // display the links to the pages
                                for ($page=1;$page<=$number_of_pages;$page++) {
                                    echo '<span style="border:2px solid orange; margin-right:3px; font-size: 25px"><a href="buy.php? page=' . $page . '">' . $page . '</a> </span>';
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


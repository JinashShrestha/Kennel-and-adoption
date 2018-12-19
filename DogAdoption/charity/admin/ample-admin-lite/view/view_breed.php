<?php
require_once("../../../configuration/configuration.php");
require_once(ROOT . 'admin/ample-admin-lite/system/redirect/logRedirect.php');
require_once(ROOT . 'admin/ample-admin-lite/layouts/header.php');
require_once(ROOT . 'database/connection.php');
require_once(ROOT . 'admin/ample-admin-lite/system/message/message.php');
require_once(ROOT . 'admin/ample-admin-lite/system/redirect/redirect.php');

$query = "SELECT * FROM tbl_breeds ORDER BY breed_id DESC ";
$result = mysqli_query($conn, $query);
$numberOfRows = mysqli_fetch_row($result);
$number_of_results = mysqli_num_rows($result);

$results_per_page = 5;

// determine number of total pages available
$number_of_pages = ceil($number_of_results / $results_per_page);

// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page - 1) * $results_per_page;
// retrieve selected results from database and display them on page
$sql = 'SELECT * FROM tbl_breeds ORDER BY breed_id DESC
 LIMIT ' . $this_page_first_result . ',' . $results_per_page;
$result0 = mysqli_query($conn, $sql);

if (isset($_POST['delete_breed'])) {
    $breedId = $_POST['breed_id'];
    $sql = "DELETE FROM tbl_breeds WHERE breed_id={$breedId}";
    $deleteResult = mysqli_query($conn, $sql);

    if ($deleteResult == true) {
        $_SESSION['success'] = "Breed was deleted";
        To('admin/ample-admin-lite/view/view_breed.php');
    } else {
        $_SESSION['error'] = "Breed was not deleted";
        To('admin/ample-admin-lite/view/view_breed.php');

    }
}

if (isset($_POST['edit_breed'])) {
    $criteria = $_POST['breed_id'];
    $id = $criteria;
    $edit = "SELECT * FROM tbl_breeds WHERE breed_id={$id}";
    $editResult = mysqli_query($conn, $edit);
    $editBreedData = mysqli_fetch_assoc($editResult);
}

if (isset($_POST['update_breed_info'])) {
    $criteria = $_POST['breed_id'];
    $name = $_POST['breed'];

    $updateQuery = "UPDATE tbl_breeds SET breed_name='$name' WHERE breed_id='$criteria'";
    $res = mysqli_query($conn, $updateQuery);
    if ($res == true) {
        $_SESSION['success'] = "Breed was updated.";
        To('admin/ample-admin-lite/view/view_breed.php');
    } else {
        $_SESSION['error'] = "Breed was not updated";
        To('admin/ample-admin-lite/view/view_breed.php');

    }

}
?>
    <div id="page-wrapper">
    <div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">View Breeds</h4></div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li class="active">View Breeds</li>
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
<?php if (isset($_POST['edit_breed'])) : ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="breed_id" value="<?= $editBreedData['breed_id'] ?>">
        <div class="col-md-12">
            <div class="form-group">
                <label for="breed">Breed</label>
                <input type="text" name="breed" value="<?= $editBreedData['breed_name'] ?>"
                       class="form-control" id="breed" placeholder="Enter Breed">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <button name="update_breed_info" class="btn btn-primary "><i
                            class="fa fa-plus"></i> Update Breed
                </button>
                <br><br>
                <!--                                            <a href="-->
                <? //=BASE_URL.'admin/ample-admin-lite/view/view_breed'?><!--" class="btn btn-primary btn-xs"">-->
                <!--                                            <i class="fa fa-eye"></i>View Breed</a>-->
            </div>
        </div>
    </form>

<?php else: ?>
    <form action="" method="post">
    <table class="table">
    <tr>
        <th>S.N</th>
        <th>Breed Name</th>
        <th>Action</th>

    </tr>
    <?php if ($numberOfRows > 0) : ?>
            <?php
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
            $sn = ($page - 1) * $results_per_page + 1;

            foreach ($result0 as $key => $breed) : ?>
                <tr>
                    <td><?= $sn++ ?></td>
                    <td><?= $breed['breed_name'] ?></td>
                    <!--                                                    <td>-->
                    <? //= $breed['breed_id'] ?><!--</td>-->
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="breed_id"
                                   value="<?= $breed['breed_id'] ?>">
                            <button name="edit_breed" class="btn btn-primary btn-xs"
                                    onclick="return confirm('Do you surely want to edit this breed?')">
                                <i class="fa fa-edit"></i> Edit
                            </button>
                            <button name="delete_breed" class="btn btn-danger btn-xs"
                                    onclick="return confirm('Do you really want to delete this breed?')">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>

                <?php endforeach; ?>
        <?php else : ?>

            <tr>
                <td colspan="7"><a href=""> Data not found</a></td>
            </tr>
        <?php endif; ?>

        </table>
        <?php
        // display the links to the pages
        for ($page=1;$page<=$number_of_pages;$page++) {
            echo '<span style="border:2px solid #b9def0; margin-right:3px; font-size: 25px"><a href="view_breed.php? page=' . $page . '">' . $page . '</a> </span>';
        }?>
        </form>
    <?php endif; ?>


    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <?php
    require_once(ROOT . 'admin/ample-admin-lite/layouts/footer.php');
    ?>
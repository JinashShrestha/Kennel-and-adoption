<?php
require_once("../../../configuration/configuration.php");
require_once(ROOT . 'admin/ample-admin-lite/system/redirect/logRedirect.php');
require_once(ROOT . 'admin/ample-admin-lite/layouts/header.php');
require_once(ROOT . 'database/connection.php');
require_once(ROOT . 'admin/ample-admin-lite/system/message/message.php');
require_once(ROOT . 'admin/ample-admin-lite/system/redirect/redirect.php');

if (!empty($_POST) || !empty($_FILES) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $breed = $_POST['breed'];
    if ($breed == '') {
        $_SESSION['error'] = "Please Enter Breed";
        To('admin/ample-admin-lite/view/add_breed.php');
        exit();
    }


    $name = "SELECT * FROM tbl_breeds WHERE breed_name='$breed'";
    $result = mysqli_query($conn, $name);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['error'] = "Breed has already been recorded.";
        To('admin/ample-admin-lite/view/add_breed.php');
        exit();
    } else {
        // insert query

        $query = "INSERT INTO tbl_breeds(breed_name) VALUES ('$breed')";
        $result = mysqli_query($conn, $query);
        if ($result == true) {
            $_SESSION['success'] = "Breed was successfully added";
            To('admin/ample-admin-lite/view/add_breed.php');
        }

    }
}

?>


    <div class="container-fluid">
        <div class="content">

            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3" style="margin-top: 100px">

                        <h2><a href="<?= ROOT . 'DogAdoption/admin/ample-admin-lite/view/pages/add_breed.php' ?>"><i
                                        class="fa fa-paw"></i> Add Breeds</a></h2>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <?= Messages() ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="breed">Breed</label>
                                            <input type="text" name="breed" class="form-control" id="breed"
                                                   placeholder="Enter Breed">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary "><i class="fa fa-plus"></i> Add Breed
                                            </button>
                                            <br><br>
                                            <a href="<?= BASE_URL . 'admin/ample-admin-lite/view/view_breed.php' ?>"
                                               class="btn btn-primary btn-xs"">
                                            <i class="fa fa-eye"></i>View Breed</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



<?php
require_once(ROOT . 'admin/ample-admin-lite/layouts/footer.php');
?>
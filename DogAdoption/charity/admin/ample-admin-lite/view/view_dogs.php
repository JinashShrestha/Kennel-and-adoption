<?php
require_once("../../../configuration/configuration.php");
require_once(ROOT . 'admin/ample-admin-lite/system/redirect/logRedirect.php');
require_once(ROOT . 'admin/ample-admin-lite/layouts/header.php');
require_once(ROOT . 'database/connection.php');
require_once(ROOT . 'admin/ample-admin-lite/system/message/message.php');
require_once(ROOT . 'admin/ample-admin-lite/system/redirect/redirect.php');

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
$sql='SELECT * FROM tbl_dogs INNER JOIN tbl_breeds ON tbl_dogs.breed_id=tbl_breeds.breed_id ORDER BY dog_id DESC
 LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result0 = mysqli_query($conn, $sql);


function DeleteWithImage($criteria = '')
{
    global $conn;
    $id = $criteria;
    $dsql = "SELECT * FROM tbl_dogs WHERE dog_id={$id}";
    $result1 = mysqli_query($conn, $dsql);
    $dogData = mysqli_fetch_assoc($result1);
    $dogImage = $dogData['image'];
    $imagePath = ROOT . 'admin/ample-admin-lite/public/images/dogs/' . $dogImage;

    if (file_exists($imagePath) && is_file($imagePath)) {
        return unlink($imagePath);
    }
    return false;
}

if (isset($_POST['update_image'])) {
    $criteria = $_POST['dog_id'];
    $id = $criteria;
    $edit = "SELECT * FROM tbl_dogs WHERE dog_id={$id}";
    $result = mysqli_query($conn, $edit);
    $editDogImage = mysqli_fetch_assoc($result);

}

if (isset($_POST['delete_all_data'])){
    $deleteAll=$_POST['delete_all'];
    $numberOfDeleteId=count($deleteAll);
    $x=0;
    foreach ($deleteAll as $dogId){
        DeleteWithImage($dogId);
        $sql = "DELETE FROM tbl_dogs WHERE dog_id={$dogId}";
        $deleteResult = mysqli_query($conn, $sql);
        $x++;
    }
    if ($numberOfDeleteId==$x){
        $_SESSION['success']="Selected datas were deleted";
        To('admin/ample-admin-lite/view/view_dogs.php');

    }
}

if (isset($_POST['update_dog_image'])) {
    $criteria = $_POST['dog_id'];

    if (!empty($_FILES['upload']['name'])) {

        $ext = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);
        $imageName = md5(microtime()) . '.' . $ext;
        $error = $_FILES['upload']['error'];
        $size = $_FILES['upload']['size'];
        $tpm = $_FILES['upload']['tmp_name'];
        $uploadPath = ROOT . 'admin/ample-admin-lite/public/images/dogs/';

        if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'jpg' && $ext != 'png' && $ext != 'gif') {
            $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
            To('admin/ample-admin-lite/view/view_dogs.php');
        }

        if (DeleteWithImage($criteria) && move_uploaded_file($tpm, $uploadPath . $imageName)) {
            $image = $imageName;
        } else {
            $_SESSION['error'] = 'Image Update Failed';
            To('admin/ample-admin-lite/view/view_dogs.php');
        }


        $updateQuery = "UPDATE tbl_dogs SET image='$image' WHERE dog_id='$criteria'";
        $res = mysqli_query($conn, $updateQuery);
        if ($res == true) {
            $_SESSION['success'] = "Dog's image was updated.";
            To('admin/ample-admin-lite/view/view_dogs.php');
        } else {
            $_SESSION['error'] = "Dog's image was not updated";
            To('admin/ample-admin-lite/view/view_dogs.php');

        }

    } else {
        $_SESSION['error'] = "Please Select Image To Update";
        To('admin/ample-admin-lite/view/view_dogs.php');
    }
}


if (isset($_POST['delete_dog'])) {
    $dogId = $_POST['dog_id'];
    DeleteWithImage($dogId);
    $sql = "DELETE FROM tbl_dogs WHERE dog_id={$dogId}";
    $deleteResult = mysqli_query($conn, $sql);


    if ($deleteResult == true) {
        $_SESSION['success'] = "Dog's information was deleted";
        To('admin/ample-admin-lite/view/view_dogs.php');
    } else {
        $_SESSION['error'] = "Dog's information was not deleted";
        To('admin/ample-admin-lite/view/view_dogs.php');

    }
}

if (isset($_POST['edit_dog'])) {
    $criteria = $_POST['dog_id'];
    $id = $criteria;
    $edit = "SELECT *
From tbl_dogs  WHERE dog_id={$id} ORDER BY dog_id ";
    $result = mysqli_query($conn, $edit);
    $editDogData = mysqli_fetch_assoc($result);

}

if (isset($_POST['update_dog_info'])) {
    $criteria = $_POST['dog_id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $color = $_POST['color'];
    $gender = $_POST['gender'];
    $action = $_POST['action'];
    $price = $_POST['price'];
    $breed = $_POST['breed'];

    if ($age < '1' || $age > '15') {
        $_SESSION['error'] = "Age Updated Wasn't Between 1 and 15";
        To('admin/ample-admin-lite/view/view_dogs.php');

    }

    if (($action == 'adopt') && !empty($price)) {
        $_SESSION['error'] = "Price is to be set only for sell not adopt";
        To('admin/ample-admin-lite/view/view_dogs.php');
    }

    if (($action == 'sell') && (empty($price))) {
        $_SESSION['error'] = "Please set price for selling";
        To('admin/ample-admin-lite/view/view_dogs.php');
    }

    $updateQuery = "UPDATE tbl_dogs SET dog_name='$name',age='$age',color='$color',action='$action',price='$price',breed_id='$breed' WHERE dog_id='$criteria'";
    $res = mysqli_query($conn, $updateQuery);
    if ($res == true) {
        $_SESSION['success'] = "Dog's information was updated.";
        To('admin/ample-admin-lite/view/view_dogs.php');
    } else {
        $_SESSION['error'] = "Dog's information was not updated";
        To('admin/ample-admin-lite/view/view_dogs.php');
    }
}

?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">View Dogs</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">View Dogs</li>
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
                        <?php if (isset($_POST['update_image'])) : ?>
                            <div class="col-md-8">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="dog_id" value="<?= $editDogImage['dog_id'] ?>">
                                    <div class="form-group">
                                        <label for="upload">Dog's image</label>
                                        <input type="file" name="upload" class="btn btn-default" id="upload">
                                    </div>
                                    <div class="form-group">
                                        <button name="update_dog_image" class="btn btn-primary "><i
                                                    class="fa fa-plus"></i> Update Image
                                        </button>
                                        <br><br>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <img src="<?= BASE_URL . 'admin/ample-admin-lite/public/images/dogs/' . $editDogImage['image'] ?>"
                                     alt="image not found" class="img-responsive thumbnail" style="margin-top: 20px">

                            </div>


                        <?php elseif (isset($_POST['edit_dog'])) : ?>
                            <div class="col-md-8">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="dog_id" value="<?= $editDogData['dog_id'] ?>">
                                    <div class="form-group">
                                        <label for="breed">Breed</label>
                                        <select name="breed" id="breed" class="form-control">

                                        <?php
                                        while($Bresult=mysqli_fetch_assoc($breedResult)){ ?>
                                            <option value="<?php echo($Bresult['breed_id']); ?>" <?php if($editDogData['breed_id']==$Bresult['breed_id'])
                                                {
                                            echo 'selected="selected"';
                                            }
                                            else
                                                echo ' ';
                                            ?> >

                                                <?php echo($Bresult['breed_name']); ?>

                                          </option>

                                        <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Dog Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                               value="<?= $editDogData['dog_name'] ?>"
                                               placeholder="Enter dog's name">
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="age">Age</label>
                                            <input type="number" name="age" class="form-control" id="age"
                                                   value="<?= $editDogData['age'] ?>"
                                                   placeholder="Enter dog's age">

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="color">Color</label>
                                            <input type="text" name="color" class="form-control" id="color"
                                                   value="<?= $editDogData['color'] ?>"
                                                   placeholder="Enter dog's color">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <center>
                                            <label for="action">Gender</label> &nbsp;
                                            <?php if ($editDogData['gender']=='male') : ?>
                                            <input type="radio" name="gender" id="gender" value="male" checked> Male&nbsp;
                                            <input type="radio" name="gender" id="gender" value="female"> Female
                                            <?php else: ?>
                                            <input type="radio" name="gender" id="gender" value="male" > Male&nbsp;
                                            <input type="radio" name="gender" id="gender" value="female" checked> Female
                                            <?php endif;?>
                                        </center>
                                    </div>

                                    <div class="form-group">
                                        <center>
                                            <label for="action">Action</label> &nbsp;
                                            <?php if ($editDogData['action']=='adopt') : ?>
                                            <input type="radio" name="action" id="action" value="adopt" checked> Adopt&nbsp;
                                            <input type="radio" name="action" id="action" value="sell"> Sell
                                            <?php else: ?>
                                            <input type="radio" name="action" id="action" value="adopt" > Adopt&nbsp;
                                            <input type="radio" name="action" id="action" value="sell" checked> Sell
                                            <?php endif;?>
                                        </center>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" class="form-control" id="price"
                                               value="<?= $editDogData['price'] ?>"
                                               placeholder="Enter dog's price">
                                    </div>

                                    <div class="form-group">
                                        <button name="update_dog_info" class="btn btn-primary "><i
                                                    class="fa fa-plus"></i> Update Dog
                                        </button>
                                        <br><br>
                                    </div>

                                </form>
                            </div>

                            <div class="col-md-4">
                                <img src="<?= BASE_URL . 'admin/ample-admin-lite/public/images/dogs/' . $editDogData['image'] ?>"
                                     alt="image not found" class="img-responsive thumbnail" style="margin-top: 20px">

                            </div>

                        <?php else: ?>

                            <form action="" method="post">
                                <?php
                                // display the links to the pages
                                for ($page=1;$page<=$number_of_pages;$page++) {
                                    echo '<span style="border:2px solid #b9def0; margin-right:3px; font-size: 25px"><a href="view_dogs.php? page=' . $page . '">' . $page . '</a> </span>';
                                }?>
                                <table class="table">
                                    <tr>
                                        <td><input type="checkbox" id="all_delete"></td>
                                        <th>S.N</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Color</th>
                                        <th>Gender</th>
                                        <th>Action</th>
                                        <th>Price</th>
                                        <th style="text-align: center">Image</th>
                                        <th>Breed</th>
                                        <th>Operations</th>
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
                                                <td><input type="checkbox" class="check_all_data" name="delete_all[]" value="<?=$dogs['dog_id']?>"></td>
                                                <td><?= $sn++ ?></td>
                                                <td><?= $dogs['dog_name'] ?></td>
                                                <td><?= $dogs['age'] ?></td>
                                                <td><?= $dogs['color'] ?></td>
                                                <td><?= $dogs['gender'] ?></td>
                                                <td><?= $dogs['action'] ?></td>
                                                <td><?= $dogs['price'] ?></td>
                                                <td class="zoom">
                                                    <!--                                                <td>-->

                                                    <img src="<?= BASE_URL . 'admin/ample-admin-lite/public/images/dogs/' . $dogs['image'] ?>"
                                                         alt="image not found"
                                                         width="150" height="150">
                                                    <div class="middle">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="dog_id"
                                                                   value="<?= $dogs['dog_id'] ?>">
                                                            <center>
                                                                <button class="btn btn-facebook" name="update_image">
                                                                    Change
                                                                </button>
                                                            </center>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td><?= $dogs['breed_name'] ?></td>

                                                <td>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="dog_id"
                                                               value="<?= $dogs['dog_id'] ?>">
                                                        <button name="edit_dog" class="btn btn-primary btn-xs"
                                                                onclick="return confirm('Do you sure wanna edit?')">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </button>
                                                        <button name="delete_dog" class="btn btn-danger btn-xs"
                                                                onclick="return confirm('Do you want to delete ?')">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </button>
                                                    </form>
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
                                <button name="delete_all_data" class="btn btn-danger btn-sm" id="delete_all_data"><i class="fa fa-warning"></i> Delete Select Data</button>
                            </form>
                        <?php endif;
                            // display the links to the pages
                            for ($page=1;$page<=$number_of_pages;$page++) {
                                echo '<span style="border:2px solid #b9def0; margin-right:3px; font-size: 25px"><a href="view_dogs.php? page=' . $page . '">' . $page . '</a> </span>';
                            }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

require_once(ROOT . 'admin/ample-admin-lite/layouts/footer.php');
?>


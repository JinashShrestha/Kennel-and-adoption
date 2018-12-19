<?php
require_once("../../../configuration/configuration.php");
require_once(ROOT . 'admin/ample-admin-lite/system/redirect/logRedirect.php');
require_once(ROOT . 'admin/ample-admin-lite/layouts/header.php');
require_once(ROOT . 'database/connection.php');
require_once(ROOT . 'admin/ample-admin-lite/system/message/message.php');
require_once(ROOT . 'admin/ample-admin-lite/system/redirect/redirect.php');

$breed_name = "SELECT * FROM tbl_breeds";
$result = mysqli_query($conn, $breed_name);

if (!empty($_POST) || !empty($_FILES) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $age = $_POST['age'];
    $color = $_POST['color'];
    $gender = $_POST['gender'];
    $action = $_POST['action'];
    $price = $_POST['price'];
    $breed = $_POST['breed'];

    if (($name == '') || ($age == '') || ($color == '') || ($gender == '') ||  ($action == '')) {
        $_SESSION['error'] = "Please Enter All Required Informations";
        To('admin/ample-admin-lite/view/add_dogs.php');

    }


    if ($age < '1' || $age > '15') {
        $_SESSION['error'] = "Age Should Be Between 1 and 15";
        To('admin/ample-admin-lite/view/add_dogs.php');

    }


    if (($action == 'adopt') && !empty($price)) {
        $_SESSION['error'] = "Price is to be set only for sell not adopt";
        To('admin/ample-admin-lite/view/add_dogs.php');
    }

    if (($action == 'sell') && (empty($price))) {
        $_SESSION['error'] = "Please set price for selling";
        To('admin/ample-admin-lite/view/add_dogs.php');
    }

    $ext = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);
    if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'jpg' && $ext != 'png' && $ext != 'gif') {
        $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
        To('admin/ample-admin-lite/view/add_dogs.php');

    }

    $imageName = md5(microtime()) . '.' . $ext;
    $error = $_FILES['upload']['error'];
    $size = $_FILES['upload']['size'];
    $tpm = $_FILES['upload']['tmp_name'];

    $uploadPath = ROOT . 'admin/ample-admin-lite/public/images/dogs/';


    if (!move_uploaded_file($tpm, $uploadPath . $imageName)) {
        $_SESSION['error'] = 'Problem uploading the image or Image was not selected';
        To('admin/ample-admin-lite/view/add_dogs.php');
    }

    $image = $imageName;

    // insert query

    $query = "INSERT INTO tbl_dogs(dog_name,age,color,gender,action,price,image,breed_id)
              VALUES ('$name','$age','$color','$gender','$action','$price','$image','$breed')";

    $result1 = mysqli_query($conn, $query);
    if ($result1 == true) {
        $_SESSION['success'] = " Data was successfully inserted";
        To('admin/ample-admin-lite/view/add_dogs.php');
    } else {
        $_SESSION['error'] = " Data was not successfully inserted";
        To('admin/ample-admin-lite/view/add_dogs.php');
    }

}


?>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2" style="margin-top: 60px">
                <h2><a href="<?= BASE_URL . 'admin/ample-admin-lite/view/add_dogs.php' ?>"><i class="fa fa-paw">Add
                            Dogs</i> </a></h2>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <?= Messages() ?>
                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="breed">Breed</label>
                                <select name="breed" id="breed" class="form-control">

                                    <?php
                                    $a = 1;
                                    foreach ($result as $key => $breedData): ?>
                                        <option value="<?= $breedData['breed_id'] ?>"><?= $breedData['breed_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Dog Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                       placeholder="Enter dog's name">
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <input type="number" name="age" class="form-control" id="age"
                                           placeholder="Enter dog's age">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="color">Color</label>
                                    <input type="text" name="color" class="form-control" id="color"
                                           placeholder="Enter dog's color">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <center>
                                        <label for="action">Gender</label> &nbsp;
                                        <input type="radio" name="gender" id="gender" value="male" checked> Male
                                        &nbsp;
                                        <input type="radio" name="gender" id="gender" value="female"> Female
                                    </center>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <center>
                                        <label for="action">Action</label> &nbsp;
                                        <input type="radio" name="action" id="action" value="adopt" checked> Adopt
                                        &nbsp;
                                        <input type="radio" name="action" id="action" value="sell"> Sell
                                    </center>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label> &nbsp;
                                <input type="text" name="price" class="form-control" id="price"
                                       placeholder="Enter dog's price">
                            </div>

                            <div class="form-group">
                                <label for="upload">Dog's Picture</label>
                                <input type="file" name="upload" class="btn btn-default" id="upload">
                            </div>


                            <div class="form-group">
                                <button class="btn btn-primary "><i class="fa fa-plus"></i> Add Dog</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<?php
echo "<br>";
echo "<br>";
require_once(ROOT . 'admin/ample-admin-lite/layouts/footer.php');
?>
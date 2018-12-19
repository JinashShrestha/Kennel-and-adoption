<?php
require_once("../configuration/configuration.php");
require_once(ROOT . 'database/connection.php');
require_once(ROOT . 'system/message/message.php');
require_once(ROOT . 'system/redirect/redirect.php');

$urlPage = isset($_GET['url']) ? $_GET['url'] : 'index';
$title = ucfirst($urlPage);
$urlPage = $urlPage . '.php';
require_once(ROOT . 'layouts/header.php');

if (!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $amt = $_POST['amount'];
    $note = $_POST['message'];


    if (($name == '') || ($email == '') || ($phone == '') || ($amt == '') || ($note == '')) {
        $_SESSION['error'] = "Please Enter All Required Informations";
        To('view/donate.php');

    }

    if (!filter_var($amt, FILTER_VALIDATE_FLOAT)) {
        $_SESSION['error'] = 'Amount is not valid';
        To('view/donate.php');
    }

    if (strlen( $phone)!=10) {
        $_SESSION['error'] = 'Phone Number must be of 10 characters';
        To('view/donate.php');
    }

    if (!filter_var($phone, FILTER_VALIDATE_FLOAT)) {
        $_SESSION['error'] = 'Phone number is not valid';
        To('view/donate.php');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Email is not valid';
        To('view/donate.php');
    }

    $query = "INSERT INTO tbl_donations(name,email,phone,amount,note)
              VALUES ('$name','$email','$phone','$amt','$note')";

//    // the message
//    $msg = "Thank you for donation.";
//
//// use wordwrap() if lines are longer than 70 characters
//    $msg = wordwrap($msg,70);
//
//    $result = mysqli_query($conn, $query);
//    if ($result == true) {
//        if (mail("$email","Regarding Donations",$msg))
//        {
//            echo "done";
//        }
//        else
//        {
//            echo "fa";
//        }

        $_SESSION['success'] = "Your Payment has been received";
       To('view/payment.php');
    }
//    else{
//        $_SESSION['error'] = " Data was not successfully inserted (May be due to Duplicate email)";
//        To('view/donate.php');
//    }
//}
?>

<section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(../public/img/hero_bg_bw_1.jpg)"
         data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                    <h1 class="probootstrap-heading probootstrap-animate">Donate
                        <span>Together we can make a difference</span></h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="probootstrap-section">
    <div class="container">
        <div class="row">
            <div class="col-md-5 probootstrap-animate">
                <?= Messages() ?>

                <form action="#" method="post" class="probootstrap-form">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="eg. Jinash Shrestha">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder="eg. jinash@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="eg. 9841434343">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount" placeholder="Rs. 1000.00">
                    </div>

                    <div class="form-group">
                        <label for="message">Note</label>
                        <textarea cols="30" rows="10" class="form-control" id="message" name="message"
                                  placeholder="eg. This donation is for the stray dogs who needs proper shelter and care."></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-lg" id="submit" name="submit" value="Donate">
                    </div>
                </form>
            </div>

            <div class="col-md-6 col-md-push-1 probootstrap-animate">


                <h4>Nepal Office</h4>
                <ul class="probootstrap-contact-info">
                    <li><i class="icon-pin"></i> <span>Chabahil, Kathmandu</span></li>
                    <li><i class="icon-email"></i><span>bestfriend@facebook.com</span></li>
                    <li><i class="icon-phone"></i><span>9843388588</span></li>
                </ul>

                <!--            <h4>Europe Office</h4>-->
                <!--            <ul class="probootstrap-contact-info">-->
                <!--              <li><i class="icon-pin"></i> <span>198 West 21th Street, Suite 721 New York NY 10016</span></li>-->
                <!--              <li><i class="icon-email"></i><span>info@domain.com</span></li>-->
                <!--              <li><i class="icon-phone"></i><span>+123 456 7890</span></li>-->
                <!--            </ul>-->
                <!---->
                <!--            <h4>Asia Office</h4>-->
                <!--            <ul class="probootstrap-contact-info">-->
                <!--              <li><i class="icon-pin"></i> <span>198 West 21th Street, Suite 721 New York NY 10016</span></li>-->
                <!--              <li><i class="icon-email"></i><span>info@domain.com</span></li>-->
                <!--              <li><i class="icon-phone"></i><span>+123 456 7890</span></li>-->
                <!--            </ul>-->

            </div>

        </div>
    </div>
</section>


<?php
require_once(ROOT . 'layouts/footer.php');

?>

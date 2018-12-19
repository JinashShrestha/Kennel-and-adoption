<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
    </title>
    <link rel="icon" href="<?=BASE_URL.'charity/public/img/logo1.png '?>">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Montserrat:300,400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="<?=BASE_URL.'public/bootstrap/css/bootstrap.css'?>">
    <link rel="stylesheet" href="<?=BASE_URL.'public/bootstrap/css/spinners.css'?>">
    <link rel="stylesheet" href="<?=BASE_URL.'public/bootstrap/css/bootstrap-theme.css'?>">
    <link rel="stylesheet" href="<?=BASE_URL.'public/less/icons/font-awesome/css/font-awesome.css'?>">
    <link rel="stylesheet" href="<?=BASE_URL.'public/bootstrap/css/styles-merged.css'?>">
    <link rel="stylesheet" href="<?=BASE_URL.'public/bootstrap/css/style.min.css'?>">
    <link rel="stylesheet" href="<?=BASE_URL.'public/bootstrap/css/custom.css'?>">

    <script src="<?=BASE_URL.'public/bootstrap/js/vendor/html5shiv.min.js'?>"></script>
    <script src="<?=BASE_URL.'public/bootstrap/js/custom1.js'?>"></script>
    <script src="<?=BASE_URL.'public/bootstrap/js/vendor/respond.min.js'?>"></script>
</head>
<body>

<nav class="navbar navbar-default probootstrap-navbar">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=BASE_URL.'view/index.php'?>" title="Different but Best Friend">
                <img src="<?=BASE_URL.'public/img/logo1.png'?>" width="180" height="60" style="margin-top: 0" alt="image not found" >
            </a>
        </div>

        <div id="navbar-collapse" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="<?=BASE_URL.'view/index.php'?>">Home</a></li>
<!--                <li><a href="--><?//=BASE_URL.'view/about.php'?><!--">About Us</a></li>-->
                <li><a href="<?=BASE_URL.'view/view_dogs.php'?>">Dogs</a></li>
                <li><a href="<?=BASE_URL.'view/gallery.php'?>">Gallery</a></li>
<!--                <li><a href="--><?//=BASE_URL.'view/causes.php'?><!--">Causes</a></li>-->
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Pages</a>
                    <ul class="dropdown-menu">
<!--                        <li><a href="--><?//=BASE_URL.'view/about.php'?><!--">About Us</a></li>-->
<!--                        <li><a href="--><?//=BASE_URL.'view/testimonial.php'?><!--">Testimonial</a></li>-->
<!--                        <li><a href="--><?//=BASE_URL.'view/cause-single.php'?><!--">Cause Single</a></li>-->
                        <li><a href="<?=BASE_URL.'view/gallery.php'?>">Gallery</a></li>
<!--                        <li class="dropdown-submenu dropdown">-->
<!--                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span>Sub Menu</span></a>-->
<!--                            <ul class="dropdown-menu">-->
<!--                                <li><a href="#">Second Level Menu</a></li>-->
<!--                                <li><a href="#">Second Level Menu</a></li>-->
<!--                                <li><a href="#">Second Level Menu</a></li>-->
<!--                                <li><a href="#">Second Level Menu</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
                        <li><a href="<?=BASE_URL.'view/buy.php'?>">Buy</a></li>
                        <li><a href="<?=BASE_URL.'view/adopt.php'?>">Adopt</a></li>
<!--                        <li><a href="--><?//=BASE_URL.'view/contact.php'?><!--">Contact</a></li>-->
                    </ul>
                </li>

                <li class="probootstra-cta-button last"><a href="<?=BASE_URL.'login/'?>" class="btn btn-primary">Login</a></li>
                <li class="probootstra-cta-button last"><a href="<?=BASE_URL.'view/donate.php'?>" class="btn btn-primary">Donate</a></li>
            </ul>
        </div>
    </div>
</nav>


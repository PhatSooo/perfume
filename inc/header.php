<?php
include 'lib/session.php';
Session::init();

include_once 'lib/database.php';

spl_autoload_register(function ($className) {
    include_once 'classes/' . $className . '.php';
});

$db = new Database();
$cate = new Category();
$prod = new Product();
$cart = new Cart();
$cus = new Customer();
$order = new Order();
?>

<!DOCTYPE html>
<html lang="en">
<?php $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1); ?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Sixteen Clothing HTML Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

</head>



<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <h2>Sixteen <em>Clothing</em></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item <?= $page == 'index.php' ? 'active' : '' ?>">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item <?= $page == 'products.php' ? 'active' : '' ?>">
                            <a class="nav-link" href="products.php">Our Products</a>
                        </li>
                        <li class="nav-item <?= $page == 'about.php' ? 'active' : '' ?>">
                            <a class="nav-link" href="about.php">About Us</a>
                        </li>
                        <li class="nav-item <?= $page == 'contact.php' ? 'active' : '' ?>">
                            <a class="nav-link" href="contact.php">Contact Us</a>
                        </li>

                        <?php
                        if (Session::get('cus_login')) {
                        ?>
                            <div class="nav-item dropdown">
                                <li class="dropdown-toggle" style="padding-top:11px;color: burlywood;" type="button" data-toggle="dropdown">Hello, <?= Session::get('cus_name') ?></li>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Edit Infor</a></li>
                                    <li><a href="ordered.php">Ordered</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </div>
                        <?php
                        } else echo '<li><a class="nav-link" href="login.php">Login</a></li>'
                        ?>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <a href="checkout.php?session=<?= session_id() ?>">
                                    <p class="mb-1">Shopping cart</p>
                                </a>
                                <p class="mb-0">You have <?= Session::get('cart') != 0 ? Session::get('cart') : 0 ?> items in your cart</p>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
        <div class="owl-banner owl-carousel">
            <div class="banner-item-01">
                <div class="text-content">
                    <h4>Best Offer</h4>
                    <h2>New Arrivals On Sale</h2>
                </div>
            </div>
            <div class="banner-item-02">
                <div class="text-content">
                    <h4>Flash Deals</h4>
                    <h2>Get your best products</h2>
                </div>
            </div>
            <div class="banner-item-03">
                <div class="text-content">
                    <h4>Last Minute</h4>
                    <h2>Grab last minute deals</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Ends Here -->
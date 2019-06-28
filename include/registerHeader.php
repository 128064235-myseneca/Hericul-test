<?php
/**
 * Created by PhpStorm.
 * User: Sumit Shrestha
 * Date: 17/08/2017
 * Time: 11:24
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../img/fav.png"/>
    <title>Deerwalk Training</title>
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet" >
    <link rel="stylesheet" href="../css/owl.carousel.css" >
    <link rel="stylesheet" href="../css/owl.theme.css" >
    <link rel="stylesheet" href="../css/owl.transitions.css" >
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/color/blue.css">
    <script src="../js/modernizr.custom.js"></script>
</head>

<body class="index">
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top"><img class="navLogo" src="../img/whiteLogo.png"></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="<?php if($currentPage =='home'){echo 'active';}?>">
                    <a class="page-scroll" href="../index.php">Home</a>
                </li>
                <li class="<?php if($currentPage =='courses'){echo 'active';}?>">
                    <a class="page-scroll" href="#">Courses</a>
                </li>
                <li class="<?php if($currentPage =='registerUser'){echo 'active';}?>">
                    <a class="page-scroll" href="../registerUser.php">Register</a>
                </li>
                <li class="<?php if($currentPage =='contact'){echo 'active';}?>">
                    <a class="page-scroll" href="contactUs.php">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


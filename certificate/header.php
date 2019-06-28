<?php
/**
 * Created by PhpStorm.
 * User: Sumit Shrestha
 * Date: 10/08/2017
 * Time: 17:11
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
    <meta name="keywords" content="Training, Deerwalk, DWIT, Java Training, Python Training, IELTS, TOEFEL">
    <meta property="og:title" content="Deerwalk Training Center">
    <meta property="og:image" content="http://training.dwit.edu.np/img/facebookImage.jpg">
    <meta property="og:url" content="http://training.dwit.edu.np/">
    <meta property="og:description" content="Deerwalk Training Center provides various training courses to the students.">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="http://training.dwit.edu.np/">
    <meta name="twitter:title" content="Deerwalk Training Center">
    <meta name="twitter:description" content="Deerwalk Training Center provides various training courses to the students.">
    <meta name="twitter:image" content="http://training.dwit.edu.np/img/facebookImage.jpg">
    <meta name="twitter:image:alt" content="About Us - Deerwalk Training Center">
    <link rel="shortcut icon" href="img/fav.png"/>
    <title>Deerwalk Training</title>
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/owl.carousel.css" >
    <link rel="stylesheet" href="css/owl.theme.css" >
    <link rel="stylesheet" href="css/owl.transitions.css" >
    <link rel="stylesheet" href="css/lobibox.css" >
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/color/blue.css">
    <script src="js/modernizr.custom.js"></script>
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/lobibox.js"></script>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="img/fav.png"/>
        <title>Deerwalk Training</title>
        <link href="asset/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/owl.transitions.css">
        <link rel="stylesheet" href="css/lobibox.css">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/color/blue.css">
        <link rel="stylesheet" type="text/css" href="asset/css/certificate.css">
        <script src="js/modernizr.custom.js"></script>
        <script src="js/jquery-2.1.1.min.js"></script>
        <script src="js/lobibox.js"></script>

    </head>

<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="index.php"><img class="navLogo" src="img/blueLogo.png"/></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="<?php if ($currentPage == 'home') {
                    echo 'active';
                } ?>">
                    <a class="page-scroll" href="http://training.dwit.edu.np/">Home</a>
                </li>
                <li class="<?php if ($currentPage == 'courses') {
                    echo 'active';
                } ?>">
                    <a class="page-scroll" href="courses.php">Courses</a>
                </li>
                <li class="<?php if ($currentPage == 'registerUser') {
                    echo 'active';
                } ?>">
                    <a class="page-scroll" href="registerUser.php">Register</a>
                </li>
                <li class="<?php if ($currentPage == 'ourTeam') {
                    echo 'active';
                } ?>">
                    <a class="page-scroll" href="team.php">Our Team</a>
                </li>
                <li class="<?php if ($currentPage == 'contact') {
                    echo 'active';
                } ?>">
                    <a class="page-scroll" href="contactUs.php">Contact</a>
                </li>

                <li class="<?php if ($currentPage == 'certificateShow') { echo 'active'; } ?>" data-toggle="modal" data-target="#verifyCertificate">
                    <a class="page-scroll" href="#">Verify Certificate</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="modal fade" id="verifyCertificate" tabindex="-1" role="dialog" aria-labelledby="certificateModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 25%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="certificateModalLabel">Validate Certificate</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="certificate/certificateDetails.php">

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Enter Validation ID</label>
                        <input type="text" class="form-control" name="verificationID" id="recipient-name" autofocus/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Verify"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

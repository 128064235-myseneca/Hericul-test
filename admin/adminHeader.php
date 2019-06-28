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
    <link rel="shortcut icon" href="../img/fav.png"/>
    <title>Hericule - Host</title>
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.css">
    <link rel="stylesheet" href="../css/owl.transitions.css">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/lobibox.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/color/blue.css">
    <script src="../js/modernizr.custom.js"></script>
    <script src="../js/jquery-2.1.1.min.js"></script>
    <script src="../js/formMultipleInput.js" language="Javascript" type="text/javascript"></script>
    <script src="../js/lobibox.js"></script>
    <script src="../js/FileSaver.min.js"></script>
    <script src="../js/tableExport.min.js"></script>
</head>

<body>
<div class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a target="_blank" href="http://training.dwit.edu.np/" class="navbar-brand"><img src="../img/blueLogo.png"
                                                                                             class="navLogo"/></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="<?php if ($currentPage == 'home') {
                    echo 'active';
                } ?>"><a href="adminPanel.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                        Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Upload
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="uploadCourse.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                Upload Event</a></li>
                    </ul>
                </li>
                <!--                <li class="dropdown">-->
                <!--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit <span class="caret"></span></a>-->
                <!--                    <ul class="dropdown-menu">-->
                <!--                        <li><a href="editCoursePage.php"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Course</a></li>-->
                <!--                        <li><a href="editSessionPage.php"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Session</a></li>-->
                <!--                        <li><a href="emailSettings.php"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Mailing List</a></li>-->
                <!--                    </ul>-->
                <!--                </li>-->
                <!--                <li class="-->
                <?php //if($currentPage =='viewRequests'){echo 'active';}?><!--"><a href="viewRequests.php"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Requests</a></li>-->
                <!---->
                <!--              <li class="-->
                <?php ////if($currentPage =='certificate'){echo 'active';}?><!--"><a href="certificate.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Certificate</a></li>-->

                <!---->
                <!--                <li class="dropdown -->
                <?php //if($currentPage =='certificate'){echo 'active';}?><!--">-->
                <!--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Certificate <span class="caret"></span></a>-->
                <!--                    <ul class="dropdown-menu">-->
                <!--                       <li><a href="addTrainer.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Trainer </a></li>-->
                <!--                        <li><a href="certificate.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Student Certificate </a></li>-->
                <!--                        <li><a href="teacherCertificate.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Teacher Certificate </a></li>-->
                <!---->
                <!--                        <li><a href="certificateView.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> View Student Certificate </a></li>-->
                <!---->
                <!--                        <li><a href="teacherCertificateView.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> View Teacher Certificate </a></li>-->
                <!---->
                <!--                    </ul>-->
                <!--                </li>-->
                <!---->
                <!--                <li class="dropdown -->
                <?php //if($currentPage =='trainer'){echo 'active';}?><!--">-->
                <!--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Trainer <span class="caret"></span></a>-->
                <!--                    <ul class="dropdown-menu">-->
                <!--                        <li><a href="addTrainer.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Trainer </a></li>-->
                <!--                        <li><a href="viewTrainer.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> View Trainer </a></li>-->
                <!---->
                <!--                    </ul>-->
                <!--                </li>-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> 
                        <strong>Welcome Admin</strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-6">
                                        <p>
                                        <form action="logout.php" method="POST">
                                            <button type="submit" class="btn btn-lg btn-danger" name="submit"><span
                                                        class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                                Logout
                                            </button>
                                        </form>
                                        </p>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>


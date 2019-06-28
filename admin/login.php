<?php
session_start();

if (isset($_SESSION['u_id'])) {
    header("location:adminPanel.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>AdminLogin</title>

</head>
<body>

<header>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../img/fav.png"/>
        <title>Admin Login</title>
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

    <body>
    <div class="container" style="margin-top:40px">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong> Sign in to continue</strong>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="loginHandle.php" method="POST">
                            <fieldset>
                                <div class="row">
                                    <div class="center-block">
                                        <img class="profile-img"
                                             src="../img/userAccount.png" alt="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                        <div class="form-group">
                                            <div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span>
                                                <input class="form-control" placeholder="Username" name="uid" type="text" autofocus required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
                                                <input class="form-control" placeholder="Password" name="pwd" type="password" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Sign in">
                                            <h4 class="text-danger"> <a class="text-danger" href="forgotPassword.php">Forgot Password?</a></h4>
                                        </div>


                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!--
    <form action="loginHandle.php" method="POST">
        <input type="text" name="uid" placeholder="e-mail" required="">
        <input type="password" name="pwd" placeholder="password" required>
        <button type="submit" name="submit">Login</button>
    </form>
-->

</header>
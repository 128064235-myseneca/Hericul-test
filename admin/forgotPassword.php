

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
    <link href="../css/lobibox.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/color/blue.css">
    <script src="../js/modernizr.custom.js"></script>
    <script src="../js/jquery-2.1.1.min.js"></script>
    <script src="../js/formMultipleInput.js" language="Javascript" type="text/javascript"></script>
    <script src="../js/lobibox.js"></script>
</head>
<body>
<?php

if(isset($_GET['status'])) {
    if ($_GET['status'] == 'success') {
        echo '<script> Lobibox.alert("success",{
                    msg:"Email with Login Details sent"
                }); </script>';
    }
    if ($_GET['status'] == 'failed') {
        echo '<script> Lobibox.alert("error",{
                    msg:"Sorry, invalid Credentials."
                }); </script>';
    }
}



?>


<div class="container" style="margin-top:40px">
<form class="form-signin" action = "forgotPasswordBackend.php" method="POST">
    <h2 class="form-signin-heading">Forgot Password</h2>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Email Address</span>
        <input type="email" name="email" class="form-control" required placeholder="Email">
    </div>
    <br />

    <button class="btn btn-primary text-capitalize" type="submit">Forgot Password</button>
    <a class="btn btn-success" href="login.php">Login</a>

</form>
</div>
</body>
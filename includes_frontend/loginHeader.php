<?php $x =  basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
$x =explode('.',$x)[0];
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets_frontend/css/login.css">
        <link href="assets_frontend/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets_frontend/css/custom.css" rel="stylesheet" type='text/css'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
              integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets_frontend/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets_frontend/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="assets_frontend/css/universal-parallax.min.css">
        <link rel="icon" type="image/png" href="assets_frontend/images/logo.png"/>
        <link rel="stylesheet" type="text/css" href="assets_frontend/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <link rel="stylesheet" type="text/css" href="assets_frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="assets_frontend/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="assets_frontend/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="assets_frontend/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="assets_frontend/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="assets_frontend/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="assets_frontend/util.css">
        <link rel="stylesheet" type="text/css" href="assets_frontend/main.css">
        <!-- <<<<<<< HEAD

        =======
        >>>>>>> 7a60e828e48bf4f05ca43aef3e699efcc696173b -->
        <!--===============================================================================================-->
        <title>Aaramba</title>

    </head>
<body>
<nav class="navbar navbar-expand-lg bg-light navbar-custom" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php"><img class="navbar-brand-size"
                                                          src="assets_frontend/images/logo.png"></a>
        </div>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#CollapsibleNavbar">
<span class="navbar-toggler-icon"><i class="fas fa-bars"></i>
</span>
        </button>

        <div class="collapse navbar-collapse" id="CollapsibleNavbar">
            <ul class="navbar-nav nav-pills ml-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link nav-text-blue nav-pad <?php if($x == 'deerwalk-training-center' || $x == 'index') echo "active active-blue"; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a href="courses.php" class="nav-link nav-text-blue nav-pad  <?php if($x == 'courses') echo "active active-blue"; ?>">Experiences</a>
                </li>
                <li class="nav-item">
                    <a href="team.php" class="nav-link nav-text-blue nav-pad  <?php if($x == 'team') echo "active active-blue"; ?>">Our Team</a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link nav-text-blue nav-pad  <?php if($x == 'contact') echo "active active-blue"; ?>">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="index.php" class="nav-link nav-text-blue nav-pad"  >Log Out</a>

                </li>

            </ul>
        </div>

    </div>
</nav>


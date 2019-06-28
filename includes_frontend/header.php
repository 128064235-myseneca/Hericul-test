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
                    <a href="login.php" class="nav-link nav-text-blue nav-pad"  >Login</a>
                <li class="nav-item">
                    <a href="#" class="nav-link nav-text-blue nav-pad" data-toggle="modal" data-target="#registerModal">SignUp</a>
                </li>
                </li>

            </ul>
        </div>

    </div>
</nav>


<!-- Modal -->
<!--<div class="modal fade" id="verifyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"-->
<!--     aria-hidden="true">-->
<!--    <div class="modal-dialog" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title nav-text-blue" id="exampleModalLabel">Verify Certificate</h5>-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true">&times;</span>-->
<!--                </button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <form method="post" action="certificate/certificateDetails.php">-->
<!--                    <div class="form-group">-->
<!--                        <label for="recipient-name" class="col-form-label">Enter Validation ID</label>-->
<!--                        <input type="text" class="form-control" name="verificationID" id="recipient-name" autofocus/>-->
<!--                    </div>-->
<!--                    <div class="modal-footer">-->
<!--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--                        <input type="submit" class="btn btn-primary" value="Verify"/>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Sign Up</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"
                                                                                                  style="color:black;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="companyRegisterForm" enctype="multipart/form-data" action="#" method="POST">
                    <div class="form-group">
                        <label for="companyName"> First Name <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" id="companyName" name="companyName" required>
                    </div>
                    <div class="form-group">
                        <label for="companyName"> Last Name <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" id="companyName" name="companyName" required>
                    </div>
                    <div class="form-group">
                        <label for="contactNumber"> Gender <span class="text-danger">*</span> </label>
                        <!--                        <input type="number" class="form-control" id="contactNumber" name="contactNumber" required>-->
                        <select class="form-control">
                            <option selected disabled>Select</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="contactNumber"> Interest <span class="text-danger">*</span> </label>
                        <!--                        <input type="number" class="form-control" id="contactNumber" name="contactNumber" required>-->
                        <select class="form-control">
                            <option selected disabled>Select Interest</option>
                            <option>Jatra</option>
                            <option>Cultural dance</option>
                            <option>Traditional foods</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="companyNumber"> User Name <span class="text-danger">*</span> </label>
                        <input type="tel" class="form-control" id="companyNumber" name="companyNumber"
                               pattern="[0-9]{10}" oninvalid="this.setCustomValidity('Please Enter a 10 digit number.')"
                               oninput="this.setCustomValidity('')" required>
                    </div>
                    <div class="form-group">
                        <label for="contactPerson"> Email <span class="text-danger">*</span> </label>
                        <input type="email" class="form-control" id="contactPerson" name="contactPerson" required>
                    </div>

                    <div class="form-group">
                        <label for="contactPerson"> Password <span class="text-danger">*</span> </label>
                        <input type="password" class="form-control" id="contactPerson" name="contactPerson" required>
                    </div>
<!--                    <div class="form-group">-->
<!--                        <label for="contactEmail"> Registration Date </label>-->
<!--                        <input type="text" class="form-control" id="contactEmail" name="contactEmail"-->
<!--                               placeholder="--><?php //echo date('jS M, Y'); ?><!--" readonly disabled>-->
<!--                    </div>-->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" name="registerCompany" data-toggle="modal" data-target="#registerhostModal" data-dismiss="modal" style="background-color: #f45b4f; border: none;">Sign Up as a Host</button>
                <input type="submit" class="btn btn-success" name="registerCompany" value="Register" style="background-color: #f45b4f; border: none;">
                </form>
            </div>
        </div>
        x
    </div>
</div>

<div class="modal fade" id="registerhostModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Sign Up as a Host</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"
                                                                                                  style="color:black;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="companyRegisterForm" enctype="multipart/form-data" action="#" method="POST">
                    <div class="form-group">
                        <label for="companyName"> First Name <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" id="companyName" name="companyName" required>
                    </div>
                    <div class="form-group">
                        <label for="companyName"> Last Name <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" id="companyName" name="companyName" required>
                    </div>
<!--                    <div class="form-group">-->
<!--                        <label for="contactNumber"> Gender <span class="text-danger">*</span> </label>-->
<!--                                                <input type="number" class="form-control" id="contactNumber" name="contactNumber" required>-->
<!--                        <select class="form-control">-->
<!--                            <option selected disabled>Select</option>-->
<!--                            <option>Male</option>-->
<!--                            <option>Female</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label for="contactNumber"> Interest <span class="text-danger">*</span> </label>-->
<!--                                             <input type="number" class="form-control" id="contactNumber" name="contactNumber" required>-->
<!--                        <select class="form-control">-->
<!--                            <option selected disabled>Select Interest</option>-->
<!--                            <option>Jatra</option>-->
<!--                            <option>Cultural dance</option>-->
<!--                            <option>Traditional foods</option>-->
<!--                        </select>-->
<!--                    </div>-->

                    <div class="form-group">
                        <label for="companyNumber"> User Name <span class="text-danger">*</span> </label>
                        <input type="tel" class="form-control" id="companyNumber" name="companyNumber"
                               pattern="[0-9]{10}" oninvalid="this.setCustomValidity('Please Enter a 10 digit number.')"
                               oninput="this.setCustomValidity('')" required>
                    </div>
                    <div class="form-group">
                        <label for="contactPerson"> Email <span class="text-danger">*</span> </label>
                        <input type="email" class="form-control" id="contactPerson" name="contactPerson" required>
                    </div>

                    <div class="form-group">
                        <label for="contactPerson"> Password <span class="text-danger">*</span> </label>
                        <input type="password" class="form-control" id="contactPerson" name="contactPerson" required>
                    </div>
<!--                    <div class="form-group">-->
<!--                        <label for="contactEmail"> Registration Date </label>-->
<!--                        <input type="text" class="form-control" id="contactEmail" name="contactEmail"-->
<!--                               placeholder="--><?php //echo date('jS M, Y'); ?><!--" readonly disabled>-->
<!--                    </div>-->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" name="registerCompany" data-toggle="modal" data-target="#registerModal" data-dismiss="modal" style="background-color: #f45b4f; border: none;">Sign Up as a Traveller</button>
                <input type="submit" class="btn btn-success" name="registerCompany" value="Register" style="background-color: #f45b4f; border: none;">
                </form>
            </div>
        </div>
        x
    </div>
</div>


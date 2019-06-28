<?php
/**
 * Created by PhpStorm.
 * User: saura
 * Date: 11/21/2018
 * Time: 3:50 PM
 */

session_start();

if (!isset($_SESSION['u_id'])) {
    header("location:exceptiontest.php");
    exit();
}
$currentPage = 'certificate';
include "adminHeader.php";
include '../DBConn/DBConnection.php';

?>

    <link rel="stylesheet" href="../css/jqueryui.css"/>
    <div class="container">
        <h2 class="text-capitalize text-center text-success">Add Teacher Certificate Data</h2>
        <br>
        <form id="certificate_teachers" action="teacherCertificate.php" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="firstname" class="col-form-label">First Name</label>
                    <input type="text" class="form-control required text-capitalize" id="firstname" name="firstname"
                           placeholder="First Name">
                </div>

                <div class="form-group col-md-4">
                    <label for="lastname" class="col-form-label">Last Name</label>
                    <input type="text" class="form-control required text-capitalize" id="lastname" name="lastname"
                           placeholder="Last Name">
                </div>

                <div class="form-group col-md-4">
                    <label for="gender" class="col-form-label">Gender</label>
                    <select class="form-control required" id="gender" name="gender">
                        <option selected="selected" disabled>Select</option>
                        <option value="MR. ">Male</option>
                        <option value="MS. ">Female</option>
                    </select>
                </div>


                <div class="form-group col-md-2">
                    <input type="submit" name="submit" id="submit" tabindex="4"
                           class="form-control btn btn-success" value="Submit">
                </div>
            </div>
        </form>
    </div>

    <script src="../js/jqueryui.js"></script>

    <script>
        $(document).ready(function () {
            $("#certificate_teachers").validate({
                rules: {
                    firstname: {
                        required: true
                    },
                    lastname: {
                        required: true
                    }
                },
                messages: {
                    firstname: {
                        required: "Please Enter First Name"
                    },
                    lastname: {
                        required: "Please Enter Last Name"
                    }
                }
            });
        });
    </script>
<?php

if (isset($_POST['submit'])) {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $title = $_POST['gender'];
    $name = $firstName . " " . $lastName;

//    $today = date("Y-m-d");

    $sqls = "SELECT max(`vid`) as vid FROM `certificate_teachers`";
//    echo $sqls;
    $res = mysqli_query($conn, $sqls);

    $count = mysqli_num_rows($res);
    $row = mysqli_fetch_array($res);

    if ($count == 1) {

        $vid = (int)$row["vid"];
        $vid = $vid + 1;
        $vid = (string)sprintf("%03d", $vid);

    } else {
        $vid = "001";
    }

    $verification_id = "DTT-20181124" . "-" . $vid;

    $sql = "INSERT INTO `certificate_teachers`(`name`, `vid`, `verification_id`,`title`)VALUES ('$name','$vid','$verification_id','$title')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $url = 'teacherCertificateView.php';
        echo "<script> Lobibox.alert('success',{
                    msg:'Successfully Added Teacher Certificate Data!! ID is $verification_id'
                }); </script>";
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
    } else {
        echo '<script> Lobibox.alert("error",{
                    msg:"Sorry, Please try again."
                }); </script>';
    }
}

?>
<?php include "adminFooter.php"; ?>
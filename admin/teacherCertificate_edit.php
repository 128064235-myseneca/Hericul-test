<?php
/**
 * Created by PhpStorm.
 * User: saura
 * Date: 11/21/2018
 * Time: 6:47 PM
 */



session_start();

if (!isset($_SESSION['u_id'])) {
    header("location:exceptiontest.php");
    exit();
}
$currentPage = 'certificate';
include "adminHeader.php";
include '../DBConn/DBConnection.php';


$id = $_REQUEST['cert_id'];

$sql = "select * from certificate_teachers WHERE id=$id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $oldname = explode(" ", $row['name']);
        $verification_id_from_table = $row['verification_id'];
        $ids = $row['id'];
        $gender = $row['title'];
        if ($gender == 'MR. ')
            $choice = 0;
        else
            $choice = 1
        ?>


        <link rel="stylesheet" href="../css/jqueryui.css"/>
        <div class="container">
            <h2 class="text-capitalize text-center text-success">Edit Teachers Certificate Data</h2>
            <br>
            <form id="certificate_teachers" action="teacherCertificate_edit.php" method="POST" role="form"
                  enctype="multipart/form-data">
                <input type="hidden" name="cert_id" value="<?php echo $id; ?>">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="firstname" class="col-form-label">First Name</label>
                        <input type="text" class="form-control required text-capitalize" id="firstname" name="firstname"
                               placeholder="First Name" value="<?php echo $oldname[0]; ?>">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="lastname" class="col-form-label">Last Name</label>
                        <input type="text" class="form-control required text-capitalize" id="lastname" name="lastname"
                               placeholder="Last Name" value="<?php echo $oldname[1]; ?>">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="gender" class="col-form-label">Gender</label>
                        <select class="form-control required" id="gender" name="gender">
                            <?php if ($choice == 0)
                                echo '<option selected="selected" value="MR. ">Male</option>' .
                                    '<option value="MS. ">Female</option>';
                            else
                                echo '<option selected="selected" value="MS. ">Female</option>' .
                                    '<option value="MR. ">Male</option>';
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-2">
                        <input type="submit" name="submit" id="submit" tabindex="4"
                               class="form-control btn btn-success" value="Update">
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
                            required: true,
                            nowhitespace: true,
                            lettersonly: true
                        },
                        lastname: {
                            required: true,
                            nowhitespace: true,
                            lettersonly: true
                        }
                    },
                    messages: {
                        firstname: {
                            required: "Please Enter First Name",
                            nowhitespace: "No whitespace is allowed",
                            lettersonly: "Please type letters only"
                        },
                        lastname: {
                            required: "Please Enter Last Name",
                            nowhitespace: "No whitespace is allowed",
                            lettersonly: "Please Type Letters Only"
                        }
                    }
                });
            });
        </script>
        <?php

        if (isset($_POST['submit'])) {
            $firstName = $_POST['firstname'];
            $lastName = $_POST['lastname'];
            $name = $firstName . " " . $lastName;
            $title =  $_POST['gender'];

            $sql = "UPDATE `certificate_teachers` SET `name`= '$name',`title` = '$title' WHERE id =$ids";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<SCRIPT type='text/javascript'>window.location.replace('teacherCertificateView.php');</SCRIPT>";
            } else {
                echo "<SCRIPT type='text/javascript'>window.location.replace('teacherCertificate_edit.php?cert_id=$id');</SCRIPT>";
            }
        }
    }
}

?>
<?php include "adminFooter.php"; ?>
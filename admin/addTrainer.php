<?php
session_start();

/**
 * Created by PhpStorm.
 * User: Saurav Bhandari
 * Date: 9/6/2018
 * Time: 5:38 PM
 */

if (!isset($_SESSION['u_id'])) {
    header("location:exceptiontest.php");
    exit();
}
$currentPage = 'trainer';
include "adminHeader.php";
include '../DBConn/DBConnection.php';

function displayAllTrainersDropdown()
{
    global $conn;
    $sqlC = "SELECT * from trainer";
    $allTrainer = mysqli_query($conn, $sqlC);
    while ($rows = mysqli_fetch_array($allTrainer)) {
        echo '<option value="' . $rows['name'] . '">' . $rows['name'] . '</option>';
    };
}

function displayAllTrainersTitlesDropdown()
{
    global $conn;
    $sqlC = "SELECT * from trainer";
    $allTrainer = mysqli_query($conn, $sqlC);
    while ($rows = mysqli_fetch_array($allTrainer)) {
        echo '<option value="' . $rows['title'] . '">' . $rows['title'] . '</option>';
    };
}

?>

    <link rel="stylesheet" href="../css/jqueryui.css"/>
    <div class="container">
        <h2 class="text-capitalize text-center text-success">Add Trainer Data</h2>
        <br>
        <form id="certificate" action="addTrainer.php" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name" class="col-form-label">Trainer Name</label>
                    <input type="text" class="form-control required text-capitalize" id="name" name="name"
                           placeholder="Trainer Name">
                </div>

                <div class="form-group col-md-6">
                    <label for="title" class="col-form-label">Trainer Title</label>
                    <input type="text" class="form-control required text-capitalize" id="title" name="title"
                           placeholder="Trainer Title">
                </div>
                <br>
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
            $("#certificate").validate({
                rules: {
                    name: {
                        required: true
                    },
                    title: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: "Please Enter Trainer's Name"
                    },
                    title: {
                        required: "Please Enter Trainer's Title"
                    }
                }
            });
        });
    </script>
<?php
/**
 * Created by PhpStorm.
 * User: saura
 * Date: 9/7/2018
 * Time: 8:52 AM
 */

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $title = $_POST['title'];

    $sql = "INSERT INTO `trainer`(`name`, `title`) VALUES ('$name','$title')";
//    echo $sql;
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $url = 'viewTrainer.php';
        echo "<script> Lobibox.alert('success',{
                    msg:'Successfully Added Trainer Data!!'
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
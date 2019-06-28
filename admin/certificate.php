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
$currentPage = 'certificate';
include "adminHeader.php";
include '../DBConn/DBConnection.php';

function displayAllCoursesDropdown()
{
    global $conn;
    $sqlC = "SELECT DISTINCT course_id,cname FROM course";
    $allCourses = mysqli_query($conn, $sqlC);
    while ($rows = mysqli_fetch_array($allCourses)) {
        echo '<option value="' . $rows['cname'] . '">' . $rows['cname'] . '</option>';
    };
}

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
        <h2 class="text-capitalize text-center text-success">Add Certificate Data</h2>
        <br>
        <form id="certificate" action="certificate.php" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstname" class="col-form-label">First Name</label>
                    <input type="text" class="form-control required text-capitalize" id="firstname" name="firstname"
                           placeholder="First Name">
                </div>

                <div class="form-group col-md-6">
                    <label for="lastname" class="col-form-label">Last Name</label>
                    <input type="text" class="form-control required text-capitalize" id="lastname" name="lastname"
                           placeholder="Last Name">
                </div>
                <div class="form-group col-md-6">
                    <label for="fromDate" class="col-form-label">Start Date</label>
                    <input class="form-control required" id="fromDate" name="fromDate" placeholder="Start Date">
                </div>
                <div class="form-group col-md-6">
                    <label for="toDate" class="col-form-label">End Date</label>
                    <input type="text" class="form-control required" id="toDate" name="toDate" placeholder="End Date">
                </div>
                <br>
                <div class="form-group col-md-6">
                    <label for="course"> Course</label>
                    <select onchange="getId(this.value);" class="form-control required" id="course" name="course">
                        <option selected="selected" disabled>Select</option>
                        <?php displayAllCoursesDropdown(); ?>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="course"> Course Duration</label>
                    <input type="number" class="form-control required" id="course_duration" name="course_duration" placeholder="Course Duration (in Hour)">
                </div>

                <div class="form-group col-md-6">
                    <label for="course"> Trainer</label>
                    <select class="form-control required" id="trainer" name="trainer">
                        <option selected="selected" disabled>Select</option>
                        <?php displayAllTrainersDropdown(); ?>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="course"> Trainer Title</label>
                    <select class="form-control required" id="trainer_title" name="trainer_title">
                        <option selected="selected" disabled>Select</option>
                        <?php displayAllTrainersTitlesDropdown(); ?>
                    </select>
                </div>

<!--                --><?php //$currentDate = date('F d, Y'); ?>
                <div class="form-group col-md-6">
                    <label for="gender" class="col-form-label">Gender</label>
                    <select class="form-control required" id="gender" name="gender">
                        <option selected="selected" disabled>Select</option>
                        <option value="MR. ">Male</option>
                        <option value="MS. ">Female</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="photo" class="col-form-label">Photo</label>
                    <input class="form-control" type="file" name="photo" id="photo" placeholder="Upload Photo"
                           style="height: 10%">
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
            $.datepicker.setDefaults({
                dateFormat: 'yy-mm-dd'
            });
            $.validator.addMethod('filesize', function(value, element, param) {
                // param = size (en bytes)
                // element = element to validate (<input>)
                // value = value of the element (file name)
                return this.optional(element) || (element.files[0].size <= param)
            });

            $(function () {
                $("#fromDate").datepicker({
                    numberOfMonths: 2,
                    onSelect: function (selected) {
                        var dt = new Date(selected);
                        dt.setDate(dt.getDate() + 1);
                        $("#toDate").datepicker("option", "minDate", dt);
                    }
                });
                $("#toDate").datepicker({
                    numberOfMonths: 2,
                    onSelect: function (selected) {
                        var dt = new Date(selected);
                        dt.setDate(dt.getDate() - 1);
                        $("#fromDate").datepicker("option", "maxDate", dt);
                    }
                });
            });

            $("#certificate").validate({
                rules: {
                    firstname: {
                        required: true,
                        nowhitespace: false,
                        lettersonly: false
                    },
                    lastname: {
                        required: true,
                        nowhitespace: true,
                        lettersonly: true
                    },
                    course: {
                        required: true
                    },
                    fromDate: {
                        required: true
                    },
                    toDate: {
                        required: true
                    },
                    photo: {
                        required: true,
                        extension: "png|jpg|jpeg|PNG|JPG|JPEG",
                        filesize: 3048576
                    },
                    course_duration:{
                        required: true
                    },
                    gender:{
                        required: true
                    },
                    trainer:{
                        required: true
                    },
                    trainer_title:{
                        required: true
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
                    },
                    course: {
                        required: "Please select a Course"
                    },
                    fromDate: {
                        required: "Please select a Start Date"
                    },
                    toDate: {
                        required: "Please select a End Date"
                    },
                    photo: {
                        required: "Please select an image",
                        extension: "Please select png or jpg or jpeg images only!",
                        filesize : "Please select image less than 3 MB"
                    },
                    course_duration: {
                        required: "Please enter the course duration"
                    },
                    gender: {
                        required: "Please enter a gender."
                    },
                    trainer:{
                        required: "Please enter a Trainer."
                    },
                    trainer_title:{
                        required: "Please enter a Title."
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
    $firstName = $_POST['firstname'];
    $names = explode(" ",$firstName);
    $firstName = ucfirst($names[0])." ".ucfirst($names[1]);
    $lastName = $_POST['lastname'];
    $name = $firstName . " " . $lastName;
    $fromDate = $_POST['fromDate'];
    $toDate = $_POST['toDate'];
    $course = $_POST['course'];
    $course_duration = $_POST['course_duration'];
    $user_title = $_POST['gender'];
    $trainer = $_POST['trainer'];
    $trainer_title = $_POST['trainer_title'];

    $today = date("Y-m-d");

    $sqls = "SELECT max(`vid`) as vid FROM `certificate` WHERE `today` = '$today'";
//    echo $sqls;
    $res = mysqli_query($conn, $sqls);

    $count = mysqli_num_rows($res);
    $row = mysqli_fetch_array($res);

    if ($count == 1) {
        $vid = (int)$row["vid"];
        $vid = $vid + 1;
//        echo "<br>==================<br>";
//    echo $vid;
        $vid = (string)sprintf("%03d", $vid);
//        echo $vid;
//        echo "<br>==================<br>";

    } else {
        $vid = "001";
    }

    $verification_id = "DTC-" . str_replace("-", "", $today) . "-" . $vid;
    $photo = image_upload($firstName,$verification_id);


    $sql = "INSERT INTO `certificate`(`verification_id`, `name`, `vid`, `today`, `fromDate`, `toDate`, `course`, `photo`, `course_duration`,`title`,`trainer`,`trainer_title`)
          VALUES ('$verification_id','$name','$vid','$today','$fromDate','$toDate','$course','$photo', '$course_duration','$user_title','$trainer','$trainer_title')";
//    echo $sql;
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $url = 'certificateView.php';
        echo "<script> Lobibox.alert('success',{
                    msg:'Successfully Added Certificate Data!! ID is $verification_id'
                }); </script>";
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
    } else {
        echo '<script> Lobibox.alert("error",{
                    msg:"Sorry, Please try again."
                }); </script>';
    }
}

function image_upload($name,$verification_id)
{
    global $fileDestination;
    $fileName = $_FILES['photo']['name'];
    $fileTmpName = $_FILES['photo']['tmp_name'];
    $fileSize = $_FILES['photo']['size'];
    $fileError = $_FILES['photo']['error'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    if ($fileError === 0) {
        if ($fileSize < 20485760) {
//            $fileNameNew = substr(md5(mt_rand()), 0, 7) . "." . $fileActualExt;
            $fileNameNew = $name . "_" . $verification_id . "." . $fileActualExt;
            $folderDestination = "../uploads/" . $fileNameNew;
            $fileDestination = "uploads/" . $fileNameNew;
            move_uploaded_file($fileTmpName, $folderDestination);
        }
    } else {
        echo "File Not Uploaded";
    }
    return $fileDestination;
}

?>
<?php include "adminFooter.php"; ?>
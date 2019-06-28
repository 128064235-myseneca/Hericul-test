<?php
/**
 * Created by PhpStorm.
 * User: saura
 * Date: 3/12/2019
 * Time: 4:09 PM
 */

session_start();
$currentPage = 'uploadCourse';
include '../DBConn/DBConnection.php';

if (!isset($_SESSION['u_id'])) {
    header("location:login.php");
    exit();
}
include "adminHeader.php";
if (isset($_POST['edit_course'])) {
    $cname = $_POST['cname'];
    $description = $_POST['description'];
    $id = $_POST['id'];
    $sql = "UPDATE `course` SET `cname`='$cname',`cdescription`='$description' WHERE `course_id`=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<SCRIPT type='text/javascript'>window.location.replace('editCoursePage.php');</SCRIPT>";
    } else {
        echo "<SCRIPT type='text/javascript'>window.location.replace('editCourse.php?id=$id');</SCRIPT>";
    }
}else{
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM course WHERE course_id=$id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $course = $row['cname'];
            $cdescription = $row['cdescription'];
        }
    }
}



?>
<div class="container">
    <h2 class="text-capitalize text-center text-success"> Edit Course </h2>
    <br>
    <form id="courseform" action="editCourse.php" enctype="multipart/form-data" method="POST" role="form">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="courseName" class="col-form-label">Course Name</label>
                <input type="text" class="form-control required" id="cname" name="cname" placeholder="Course Name"
                       value="<?php echo $course; ?>">
            </div>
        </div>

        <input type="hidden" name="id" value="<?php echo $id;?>"/>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="description" class="col-form-label">Course Description</label>
                <textarea rows="5" cols="50" name="description" form="courseform"
                          class="form-control"><?php echo $cdescription; ?></textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <button type="submit" name="edit_course" class="btn btn-primary">Update</button>
            </div>
        </div>

            <br><br>

    </form>
</div>

<?php include "adminFooter.php" ?>



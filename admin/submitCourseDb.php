<?php
/**
 * Created by PhpStorm.
 * User: Sumit Shrestha
 * Date: 16/08/2017
 * Time: 13:40
 */
session_start();

if (!isset($_SESSION['u_id'])) {
    header("location:login.php");
    exit();
}

require_once "../DBConn/DBConnection.php";

if(isset($_POST['submit'])) {
    $cname = $_POST['cname'];
    $description = $_POST['description'];
    $file_name_new = null;
    $courseId = null;
    echo $cname . $startDate . $duration . '<br>';

    //checking if course name already exists
    $sqlGetCourseName = "SELECT * FROM course WHERE cname = '$cname' ";
    $sameName = mysqli_query($conn,$sqlGetCourseName);
    if(mysqli_num_rows($sameName) >= 1){
        echo '<script> alert("Course already exists")</script>';
        header("location:uploadCourse.php?status=exist");
    }
    else{
//file pdf upload
        $file = $_FILES['file'];
        print_r($file);

        //file properties
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];

        //check file extension
        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));
        $allowed = array('pdf');
        if (in_array($file_ext, $allowed)) {
            if ($file_error === 0) {
                $file_name_new = uniqid('', true) . $file_name;
                $file_destination = 'coursePdf/' . $file_name_new;

                if (move_uploaded_file($file_tmp, $file_destination)) {
                    echo '<br>' . $file_destination . '<br>';
                }
            }

        }

        //get id of course for timing using unique content variable name

        $sql = "INSERT INTO course(cname,content,cdescription) VALUES ('$cname','$file_name_new','$description')";

        if ($conn->query($sql)) {
            header("location:uploadCourse.php?status=success");
        } else {
            header("location:uploadCourse.php?status=failed");
        }
        $conn->close();
    }
}
else{
    echo "<script>alert('Something is wrong.');</script>";
}
?>
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

global $conn;


if(isset($_POST['submit'])) {
    $cname = $_POST['course'];
    $startDate = $_POST['startDate'];
    $duration = $_POST['duration'];
    $course_id= null;
    $courseDateId = null;
    $course_id_t = null;
    //status active by default during insertion
    $status= 1;

    echo $cname;
    $a=  $_POST["myInputsStart"];
    $b = $_POST["myInputsEnd"];
    echo $a[0].$b[0];
    echo $a[1].$b[1];


    //get id of course for uploading in session database

    $sqlGetId = "SELECT * FROM course WHERE cname = '$cname' ";
    $resultGetId = mysqli_query($conn, $sqlGetId);

    if (mysqli_num_rows($resultGetId) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($resultGetId)) {

            $course_id = $row['course_id'];



        }
    } else {
        echo "0 results for cid for timing";
    }

    //get id of course for timing using unique content variable name

    $sql = "INSERT INTO coursedate(course_id,startDate,duration,status) VALUES ($course_id,'$startDate','$duration',$status)";



    if ($conn->query($sql)) {
        echo "<script> alert('New Session Added!!');</script>";
        header("location:uploadCourse.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    //get id of course for timing using unique content variable name
    $sql2 = "SELECT * FROM coursedate WHERE (course_id= $course_id) AND (startdate= '$startDate')";
    $resultTime = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($resultTime) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($resultTime)) {

            $courseDateId = $row['course_date_id'];
            $course_id_t=$row['course_id'];

        }
    } else {
        echo "0 results for cid for timing";
    }
    echo $course_id_t.$courseDateId;
    $myInputsStart = $_POST["myInputsStart"];
    $myInputsEnd = $_POST["myInputsEnd"];
    $count = count($myInputsStart);
    for ($i = 0; $i < $count; $i++) {
        $eachInputStart = $myInputsStart[$i];
        $eachInputEnd = $myInputsEnd[$i];
        echo 'start end'.$i.'='.$eachInputStart.'-'.$eachInputEnd;

        $sql3 = "INSERT INTO coursetime(starttime,endtime,coursedate_id,course_id) VALUES ('$eachInputStart','$eachInputEnd',$courseDateId,$course_id_t)";

    if ($conn->query($sql3)) {
        header("location:uploadSession.php?status=success");
    } else {
       header("location:uploadSession.php?status=failed");
    }}

    $conn->close();
}
else {
   header("location:uploadSession.php?status=failed");
}
?>
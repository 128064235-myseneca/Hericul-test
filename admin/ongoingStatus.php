<?php
session_start();

if (!isset($_SESSION['u_id'])) {
    header("location:login.php");
    exit();
}
/**
 * Created by PhpStorm.
 * User: Sumit
 * Date: 8/16/2017
 * Time: 10:27 PM
 */

require_once("../DBConn/DBConnection.php");
$id = $_REQUEST['id'];

$sql = "SELECT * FROM coursedate WHERE course_date_id = $id";
$statusq = mysqli_query($conn, $sql);
$rowstime = mysqli_fetch_array($statusq);
//if classes ongoing the value of status is 2
$status =2;




$sqlTiming = "UPDATE coursedate SET status=$status WHERE course_date_id=$id";

if (mysqli_query($conn, $sqlTiming)) {

    header("location:editSessionPage.php");
} else {
    echo'<br>';
    echo "Error changing status : " . mysqli_error($conn);
}







mysqli_close($conn);
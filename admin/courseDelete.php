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
$sql = "DELETE FROM course WHERE course_id=$id";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    header("location:editCoursePage.php");

} else {
    echo "Error deleting record: " . mysqli_error($conn);
}



mysqli_close($conn);

?>
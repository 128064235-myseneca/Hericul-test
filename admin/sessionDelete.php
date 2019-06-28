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

$sqlTiming = "DELETE FROM coursetime WHERE coursedate_id=$id";

if (mysqli_query($conn, $sqlTiming)) {
    echo'<br>';
    echo "Timing records deleted successfully";
} else {
    echo'<br>';
    echo "Error deleting Timing records: " . mysqli_error($conn);
}



$sql = "DELETE FROM coursedate WHERE course_date_id=$id";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    header("location:editSessionPage.php");

} else {
    echo "Error deleting record: " . mysqli_error($conn);
}



mysqli_close($conn);
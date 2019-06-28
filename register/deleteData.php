<?php
/**
 * Created by PhpStorm.
 * User: Sumit
 * Date: 8/16/2017
 * Time: 10:27 PM
 */

require_once("../DBConn/DBConnection.php");

$id = $_REQUEST['id'];
$sql = "DELETE FROM register WHERE register_id=$id";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Record deleted successfully');</script>";
    header("location:../admin/adminPanel.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
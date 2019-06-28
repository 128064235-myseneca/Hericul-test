<?php
/**
 * Created by PhpStorm.
 * User: saura
 * Date: 9/18/2018
 * Time: 1:32 PM
 */

require_once("../DBConn/DBConnection.php");

if (isset($_REQUEST['cert_id'])){
    $id = $_REQUEST['cert_id'];
    $sql = "DELETE FROM certificate WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        header("location: certificateView.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}else{
    header('Location: certificateView.php');
}
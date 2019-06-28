<?php
/**
 * Created by PhpStorm.
 * User: saura
 * Date: 11/21/2018
 * Time: 6:47 PM
 */


require_once("../DBConn/DBConnection.php");

if (isset($_REQUEST['cert_id'])){
    $id = $_REQUEST['cert_id'];
    $sql = "DELETE FROM certificate_teachers WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        header("location: teacherCertificateView.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}else{
    header('Location: teacherCertificateView.php');
}

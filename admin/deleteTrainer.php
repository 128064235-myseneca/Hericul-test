<?php
/**
 * Created by PhpStorm.
 * User: saura
 * Date: 10/1/2018
 * Time: 4:02 PM
 */


require_once("../DBConn/DBConnection.php");

if (isset($_REQUEST['tr_id'])){
    $id = $_REQUEST['tr_id'];
    $sql = "DELETE FROM trainer WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        header("location: viewTrainer.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}else{
    header('Location: viewTrainer.php');
}
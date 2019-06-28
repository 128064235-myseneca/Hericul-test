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
    $email = $_POST['email'];
    $type = $_POST['type'];








        $sql = "INSERT INTO mailinglist(mail_name,mail_type) VALUES ('$email',$type)";

        if ($conn->query($sql)) {
            header("location:emailSettings.php?status=success");
        } else {
            header("location:emailSettings.php?status=failed");
        }
        $conn->close();
    }

else{
    echo "<script>alert('Something is wrong.');</script>";
}
?>
<?php
session_start();

/**
 * Created by PhpStorm.
 * User: asus
 * Date: 8/16/2017
 * Time: 3:03 PM
 */


if (isset($_POST['submit'])) {

    include '../DBConn/DBConnection.php';

    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);




    $sql = "SELECT * FROM user WHERE user_name='$uid'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck < 1) {
//        header("Location:../login.php");
        echo "<script>window.location.href='../login.php'</script>";

        exit();
    } else {
        if ($row = mysqli_fetch_assoc($result)) {
            //password check
            $PwdCheck = strcmp($pwd,$row['password']);
            if ($PwdCheck == 1) {
//                header("Location:login.php");
                echo "<script>window.location.href='../login.php'</script>";

                exit();
            } elseif ($PwdCheck == 0) {
                //Log in the user here
                $_SESSION['u_id'] = $row['admin_id'];

//                header("Location:adminPanel.php");
                echo "<script>window.location.href='../loginIndex.php'</script>";
                exit();
            }
        }
    }

} else {
//    header("Location:login.php");
    echo "<script>window.location.href='../login.php'</script>";

    exit();
}
<?php
session_start();
if (!isset($_SESSION['u_id'])) {
    header("location:login.php");
    exit();
}
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 8/16/2017
 * Time: 3:04 PM
 */

if (isset($_POST['submit'])) {
    session_unset();
    session_destroy();
    header("location:../login.php");
    exit();
}
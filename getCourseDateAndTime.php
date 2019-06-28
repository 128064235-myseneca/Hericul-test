<?php
/**
 * Created by PhpStorm.
 * User: Sumit
 * Date: 8/27/2017
 * Time: 8:17 AM
 */

require_once "DBConn/DBConnection.php";

if(!empty($_POST["course_id"])){
    global $conn;
    $course_id = $_POST["course_id"];
    $sql = "SELECT * FROM coursetime A INNER JOIN course B on A.course_id=B.course_id INNER JOIN coursedate C on A.coursedate_id = C.course_date_id WHERE A.course_id = $course_id AND C.status=1";
    $dateAndTime = mysqli_query($conn, $sql);
    if(mysqli_num_rows($dateAndTime) == 0) {?>
        <option value="0"> Not Available | We will contact you soon after training is scheduled </option>
        <style>
            .startDateRegister{
                display: none !important;
            }
        </style>
    <?php
    }
    else{
        foreach ($dateAndTime as $results) {
            ?>
            <option
                value="<?php echo $results["coursetime_id"]; ?>"> <?php echo date('F d, Y', strtotime($results['startdate'])) . ' | ' . date('h:i A ', strtotime($results['starttime'])) . " - " . date('h:i A ', strtotime($results['endtime'])) ?></option>
        <?php
        }
    }
 }
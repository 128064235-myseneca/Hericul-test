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
 * Time: 9:42 PM
 */
$currentPage = 'editSessionPage';


if (!isset($_SESSION['u_id'])) {
    header("location:exceptiontest.php");
    exit();
}

require_once "../DBConn/DBConnection.php";
include "adminHeader.php";


?>
    <div class="container">
        <h2 class="text-capitalize text-center text-success"> Edit Sessions </h2>
        <br>

        <?php

        $output = '';
        $query = " SELECT * FROM coursedate ORDER BY startdate DESC";
        $result = mysqli_query($conn, $query);
        $sn = 1;
        $output .= '  
           <table class="table table-bordered">  
                <tr>  
                     <th>S.N.</th>  
                     <th>Course Name</th>  
                     <th>Start Date</th>  
                     <th>Duration</th>  
                     <th>Time</th> 
                     <th>Status</th>
                     <th>Status Control </th>
                     <th>Action</th>  
                </tr>  
      ';
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {

                //get the course name

                $course = null;
                $courseid = $row['course_id'];
                $sqltitle = "SELECT * FROM course WHERE course_id=$courseid";
                $title = mysqli_query($conn, $sqltitle);
                while ($rowstitle = mysqli_fetch_array($title)) {
                    $course = $rowstitle['cname'];
                }
                //get status
                $status = null;
                if($row['status']==1){
                    $status = 'Enabled';

                }
                elseif($row['status']==2){
                    $status = 'Ongoing';
                }
                elseif($row['status']==0){
                    $status = 'Disabled';
                }

                //get timings date
                $timings="";
                $cid1 = $row['course_date_id'];
                $sqltime = "SELECT * FROM coursetime WHERE coursedate_id=$cid1  ORDER BY starttime ASC";
                $latesttime = mysqli_query($conn, $sqltime);
                while ($rowstime = mysqli_fetch_array($latesttime)) {
                    $timings.= date('h : i A',strtotime($rowstime['starttime'])).' - ' .date('h : i A',strtotime($rowstime['endtime'])) . "<br><br>";
                }
                $output .= '  
                     <tr>  
                          <td>'. $sn .'</td>  
                          <td>'. $course .'</td>  
                          <td>'. date('F d, Y',strtotime($row["startdate"])) .'</td>
                          <td>'. $row["duration"] .' hours </td>   
                          <td>'.$timings.' </td>
                          <td>'.$status.'</td>
                          <td> <a class="btn btn-success" href="activeStatus.php?id='. $row['course_date_id'].'" onclick="return confirm(\'Are you sure?\')" >  <i class="fa fa-check fa-lg" aria-hidden="true"></i> Enable </a><br> <br>
                          <a class="btn btn-default" href="ongoingStatus.php?id='. $row['course_date_id'].'" onclick="return confirm(\'Are you sure?\')" > <i class="fa fa-circle-o-notch fa-lg" aria-hidden="true"></i> Ongoing </a></td>
                          <td> <a class="btn btn-danger" href="sessionDelete.php?id='. $row['course_date_id'].'" onclick="return confirm(\'Are you sure?\')" > <i class="fa fa-trash fa-lg" aria-hidden="true"></i> Delete </a><br><br>
                          <a class="btn btn-warning" href="disableStatus.php?id='. $row['course_date_id'].'" onclick="return confirm(\'Are you sure?\')" >  <i class="fa fa-close fa-lg" aria-hidden="true"></i> Disable </a></td>
                            
                     </tr>  
                ';
                $sn++;
            }
        }
        else
        {
            $output .= '  
                <tr>  
                     <td colspan="8" class="text-center">No Sessions has been Inserted!!</td>  
                </tr>  
           ';
        }
        $output .= '</table>';
        echo $output;

        ?>


    </div>
<br><br><br>
<?php include "adminFooter.php" ?>
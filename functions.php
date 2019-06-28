<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 8/17/2017
 * Time: 4:43 PM
 */

include 'DBConn/DBConnection.php';
global $conn;


//displays courses set at a date later than the current date at index
function getUpcomingCourses()
{

    global $conn;
    $dateCurrent= '20'.date("y-m-d");
    $sqlLatest = "SELECT * FROM course WHERE startDate > '$dateCurrent' ORDER BY startDate ASC";
    $latestCourses =mysqli_query($conn,$sqlLatest);
    $rows = mysqli_fetch_array($latestCourses);
    echo 'Course - ';
    echo $rows['cname'];
    echo '<br>';
    echo 'Start Date - ';
    echo date('F d, Y', strtotime($rows['startDate']));
    echo '<br>';
    echo 'Time - ';
    $cid1 = $rows['cid'];
    $sqltime = "SELECT * FROM coursetime WHERE cid=$cid1  ORDER BY startTime ASC";
    $latesttime = mysqli_query($conn, $sqltime);
    while ($rowstime = mysqli_fetch_array($latesttime)) {
        echo date('h:i A ',strtotime($rowstime['starttime'])) . '-' .date('h:i A ',strtotime($rowstime['endTime']));
        echo '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    }
    echo '<br>';
}
//displays all the course available at index
function displayAllCourses()
{
    global $conn;

    $sqlC = "SELECT DISTINCT  cname,course_id FROM course";
    $allCourses = mysqli_query($conn, $sqlC);


    while ($rows = mysqli_fetch_array($allCourses)) {
        echo  '<div class="oaerror success">
                        <a href="courseDetails.php?id='.$rows['course_id'].' "> <strong>'.$rows['cname'].'</strong></a>
                    </div>
                    <br>';
    }
}

//displays courses set at a date later than the current date inside courses page
function getUpcomingCoursesInsideCourses()
{
    global $conn;
    $dateCurrent= '20'.date("y-m-d");
    $sqlLatest = "SELECT course.cname,course.course_id,coursedate.startdate,coursedate.duration,coursedate.course_date_id FROM course INNER JOIN coursedate ON course.course_id =coursedate.course_id WHERE coursedate.startdate > '$dateCurrent' AND coursedate.status = 1 ORDER BY coursedate.startdate ASC";
    $latestCourses =mysqli_query($conn,$sqlLatest);
    if(mysqli_num_rows($latestCourses)>0) {
        while ($rows = mysqli_fetch_array($latestCourses)) {
            echo "<a href= 'courseDetails.php?id=" . $rows['course_id'] . "'><strong><i class='fa fa-book' aria-hidden='true'></i> Course Name: " . $rows['cname'] . "</strong></a>";
            echo '<br>';
            echo '<strong> <i class="fa fa-calendar-o"></i> Start Date : </strong>' . date('F d, Y', strtotime($rows['startdate']));
            echo '<br>';
            echo '<strong> <i class="fa fa-clock-o"></i> Duration : </strong>' . $rows['duration'] . ' hours';
            echo '<br>';
            echo '<strong>  <i class="fa fa-clock-o"></i> Available Timings : </strong>';
            $cid1 = $rows['course_date_id'];
            $sqltime = "SELECT * FROM coursetime WHERE coursedate_id=$cid1  ORDER BY startTime ASC";
            $latesttime = mysqli_query($conn, $sqltime);
            while ($rowstime = mysqli_fetch_array($latesttime)) {
                echo date('h:i A ', strtotime($rowstime['starttime'])) . '- ' . date('h:i A ', strtotime($rowstime['endtime']));
                echo '<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            }
            echo '<br><br>';
        }
    }

    else{
        echo "<h3 class='text-danger'>
                    No Upcoming Trainings</h3>";
    }
}

//display the course links to page with its information in courses page

function getCourseLinks()
{
    global $conn;

    $sql5 = "SELECT * FROM course";
    $allCourse = mysqli_query($conn, $sql5);
    while ($rows1 = mysqli_fetch_array($allCourse)) {
        echo "<a href= 'courseDetails.php?id=".$rows1['cid']."'>".$rows1['cname']."</a><br>";
    }
}

//get ongoing courses

function getOngoingCourses(){
    global $conn;
    $sqlOnGoing = "SELECT * from coursetime INNER JOIN course on coursetime.course_id 
  = course.course_id INNER JOIN coursedate on coursetime.coursedate_id = coursedate.course_date_id where coursedate.status=2";
    $OnGoingCourse = mysqli_query($conn, $sqlOnGoing);
    $namearray = array();
    while($results = mysqli_fetch_array($OnGoingCourse)){
        array_push($namearray," <i class='fa fa-book'></i> Course Name : ". $results['cname']);
        array_push($namearray, "<i class='fa fa-clock-o'></i> Start Time : ". date('h:i A ', strtotime($results['starttime'])));
        array_push($namearray," <i class='fa fa-clock-o'></i> End Time : ".  date('h:i A ', strtotime($results['endtime'])));
        array_push($namearray," <i class='fa fa-calendar-o'></i> Month : ". date('F', strtotime($results['startdate'])));
        array_push($namearray,"<hr>");
    }
    return $namearray;
}

//get latest session for index
function getLatestSession(){
    global $conn;
    $dateCurrent= '20'.date("y-m-d");
    $sqlLatest = "SELECT course.cname,course.cdescription,course.course_id,coursedate.startdate,coursedate.duration,coursedate.course_date_id FROM course INNER JOIN coursedate ON course.course_id =coursedate.course_id WHERE coursedate.startdate > '$dateCurrent' AND coursedate.status = 1 ORDER BY coursedate.startdate ASC";
    $latestCourses =mysqli_query($conn,$sqlLatest);
    $rows = mysqli_fetch_array($latestCourses);
    $cid1 = $rows['course_date_id'];
    $sqltime = "SELECT * FROM coursetime WHERE coursedate_id=$cid1  ORDER BY startTime ASC";
    $latesttime = mysqli_query($conn, $sqltime);
    return $rows;
}

//get the timing variables for the latest course model
function getLatestTimings($id)
{

    global $conn;
    $cid1 = $id;
    $sqltime = "SELECT * FROM coursetime WHERE coursedate_id=$cid1  ORDER BY startTime ASC";
    $latesttime = mysqli_query($conn, $sqltime);
    while ($rowstime = mysqli_fetch_array($latesttime)) {
        echo date('h:i A', strtotime($rowstime['starttime']));
        echo ' - ';
        echo date('h:i A', strtotime($rowstime['endtime']));
        echo '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    }


}

?>
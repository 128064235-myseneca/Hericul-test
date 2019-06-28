<?php
/**
 * Created by PhpStorm.
 * User: Sumit Shrestha
 * Date: 17/08/2017
 * Time: 11:11
 */

require_once "../DBConn/DBConnection.php";

 if(isset($_POST["from_date"], $_POST["to_date"])) {
     $output = '';
     $query = "SELECT * from register INNER JOIN coursetime on register.preferabletime = coursetime.coursetime_id INNER JOIN course on register.course_id = course.course_id WHERE register.registrationdate BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'";
     $notAvailableQuery = "SELECT * from register INNER JOIN course on register.course_id = course.course_id where register.preferabletime = 0 AND register.registrationdate BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'";
     $result = mysqli_query($conn, $query);
     $notAvailableQueryResult = mysqli_query($conn, $notAvailableQuery);
     $sn = 1;
     //flag to check registration present
     $flag = 0;
     echo "<br>";
     echo "<br>";
     echo "<br>";
     echo "<br>";
     $output .= '
           <table class="table table-bordered">  
                <tr>  
                     <th>S.N.</th>  
                     <th>First Name</th>  
                     <th>Last Name</th>  
                     <th>Email</th>  
                     <th>Phone</th>  
                     <th>Course</th>  
                     <th>Preferred Date</th>
                     <th>Preferred Time</th>
                     <th>Register Date</th>
                      
                </tr>  
      ';
     if(mysqli_num_rows($result) > 0)
     {
         $flag = 1;
         while($row = mysqli_fetch_array($result))
         {
             $cid = $row['coursetime_id'];
             $sql = "SELECT * FROM coursetime A INNER JOIN course B on A.course_id=B.course_id INNER JOIN coursedate C on A.coursedate_id = C.course_date_id WHERE coursetime_id = $cid";
             $resultSql = mysqli_query($conn, $sql);
             while ($resultSqlCourseDate = mysqli_fetch_array($resultSql)) {
                 if($resultSqlCourseDate != 0){
                     $courseStartDate = $resultSqlCourseDate['startdate'];
                     $courseStartTime= date('h : i A ',strtotime($resultSqlCourseDate['starttime'])) .'- '.date('h : i A ',strtotime($resultSqlCourseDate['endtime']));
                 }
                 else{
                     $courseStartDate = "Not Available";
                 }
             }
             $output .= '
                     <tr>
                          <td>'. $sn .'</td>
                          <td>'. $row["firstname"] .'</td>
                          <td>'. $row["lastname"] .'</td>
                          <td>'. $row["email"] .'</td>
                          <td>'. $row["phone"] .'</td>
                          <td>'. $row["cname"] .'</td>
                          <td>'. date('F d, Y',strtotime($courseStartDate )) .'</td>
                           <td>'.date('h : i A',strtotime($courseStartTime ))  .'</td>
                          <td>'. date('F d, Y - h : i A',strtotime($row["registrationdate"] )) .'</td>
                                      
                     </tr>
                ';
             $sn++;
         }
     }

     if(mysqli_num_rows($notAvailableQueryResult) > 0)
     {
         $flag = 1;
         while($row = mysqli_fetch_array($notAvailableQueryResult))
         {

             $output .= '
                     <tr>
                          <td>'. $sn .'</td>
                          <td>'. $row["firstname"] .'</td>
                          <td>'. $row["lastname"] .'</td>
                          <td>'. $row["email"] .'</td>
                          <td>'. $row["phone"] .'</td>
                          <td>'. $row["cname"] .'</td>
                          <td> Inquiry </td>
                          <td> Inquiry </td>
                          <td>'.  date('F d, Y - h : i A',strtotime($row["registrationdate"] )) .'</td>
                          

                     </tr>
                ';
             $sn++;
         }
     }
     if($flag==0)
     {
         echo "<br>";
         $output .= '  
                <tr>  
                     <td colspan="9" style="text-align:center">No Registration Found!!</td>  
                </tr>  
           ';
     }
     $output .= '</table>';

     header('Content-Type: application/xls');
     header('Content-Disposition: attachment; filename=Deerwalk Training Register Users.xls');
     echo $output;

 }
 ?>

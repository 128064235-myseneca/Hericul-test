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
    $query = "SELECT * from request WHERE CAST(requestdate as DATE)BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'";
    $result = mysqli_query($conn, $query);
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
                     <th>Class Size</th>
                     <th>Course Hours</th>
                     <th>Course Days</th>
                     <th>Requested Date</th>
                     <th>Action</th> 
                </tr>  
      ';
    if(mysqli_num_rows($result) > 0)
    {
        $flag = 1;
        while($row = mysqli_fetch_array($result))
        {
            $output .= '
                     <tr>
                          <td>' . $sn . '</td>
                          <td>' . $row["firstname"] . '</td>
                          <td>' . $row["lastname"] . '</td>
                          <td>' . $row["email"] . '</td>
                          <td>' . $row["phone"] . '</td>
                          <td>' . $row["requestcourse"] . '</td>
                          <td>' . $row["class_size"] . '</td>
                          <td>' . $row["duration_time"] . '</td>
                          <td>' . $row["duration_days"] . '</td>
                          <td>' . date('F d, Y , h : i A', strtotime($row["requestdate"])) . '</td>
                          <td> <a onclick="deleteRequest();" id="" class="btn btn-danger" href="../requests/deleteRequests.php?id=' . $row['request_id'] . '"> <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> Delete </a></td>

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
                     <td colspan="9" style="text-align:center">No Request Found!!</td>  
                </tr>  
           ';
    }
    $output .= '</table>';

    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=Deerwalk Training Register Users.xls');
    echo $output;

}
?>

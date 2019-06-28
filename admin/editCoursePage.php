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
$currentPage = 'editCourse';

if (!isset($_SESSION['u_id'])) {
    header("location:exceptiontest.php");
    exit();
}

require_once "../DBConn/DBConnection.php";
include "adminHeader.php";
?>
    <div class="container">
        <h2 class="text-capitalize text-center text-success"> Edit Course </h2>
        <br>

        <?php
        $output = '';
        $query = "SELECT * FROM course ORDER BY cname DESC";
        $result = mysqli_query($conn, $query);
        $sn = 1;
        $output .= '  
           <table class="table table-bordered">  
                <tr>  
                     <th>S.N.</th>  
                     <th>Course Name</th>  
                     <th>Action</th>  
                </tr>  
      ';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $output .= '  
                     <tr>  
                          <td>' . $sn . '</td>  
                          <td>' . $row["cname"] . '</td>  
                          <td><a class="btn btn-danger" href="courseDelete.php?id=' . $row['course_id'] . '" onclick="return confirm(\'Are you sure?\')" >  <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> Delete </a>
                          <a class="btn btn-warning" href="editCourse.php?id=' . $row['course_id'] . '">  <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> Edit </a>
                          </td>
                            
                     </tr>  
                ';
                $sn++;
            }
        } else {
            $output .= '  
                <tr>  
                     <td colspan="8" class="text-center">No Course has been Inserted!!</td>  
                </tr>  
           ';
        }
        $output .= '</table>';
        echo $output;
        ?>
    </div>
<br>
<br>
<?php include "adminFooter.php" ?>
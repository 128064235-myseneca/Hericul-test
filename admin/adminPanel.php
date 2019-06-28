<?php
session_start();

/**
 * Created by PhpStorm.
 * User: asus
 * Date: 8/16/2017
 * Time: 3:05 PM
 */

if (!isset($_SESSION['u_id'])) {
    header("location:exceptiontest.php");
    exit();
}
$currentPage = 'home';
include "adminHeader.php";
require_once "../DBConn/DBConnection.php";
?>

<link rel="stylesheet" href="../css/jqueryui.css"/>
<div class="container">
    <div class="row">
        <br>
        <div class="col-md-3">
            <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />
        </div>
        <div class="col-md-3">
            <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />
        </div>
        <div class="col-md-4">
            <input type="button" name="filter" id="filter" value="Search" class="btn btn-primary" />
        </div>
        <div class="col-md-2">
            <form action="../register/downloadCSV.php" onsubmit="downloadCSV();" method="POST">
                <button type="submit" class="btn btn-success" name="export_excel">
                    <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download CSV
                </button>
            </form>
        </div>
        <br />
        <div id="search_users">
            <?php
            $output = '';
            $query = "SELECT * from register INNER JOIN coursetime on register.preferabletime = coursetime.coursetime_id INNER JOIN course on register.course_id = course.course_id ORDER by registrationdate desc";
            $notAvailableQuery = "SELECT * from register INNER JOIN course on register.course_id = course.course_id where register.preferabletime = 0";
            $result = mysqli_query($conn, $query);
            $notAvailableQueryResult = mysqli_query($conn, $notAvailableQuery);
            $sn = 1;
            $flag= 0;
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
                     <th>Action</th>  
                </tr>  
      ';
            if(mysqli_num_rows($result) > 0) {
                $flag = 1;
                while ($row = mysqli_fetch_array($result)) {
                    $cid = $row['coursetime_id'];
                    $sql = "SELECT * FROM coursetime A INNER JOIN course B on A.course_id=B.course_id INNER JOIN coursedate C on A.coursedate_id = C.course_date_id WHERE coursetime_id = $cid ";
                    $resultSql = mysqli_query($conn, $sql);
                    while ($resultSqlCourseDate = mysqli_fetch_array($resultSql)) {
                        if ($resultSqlCourseDate != 0) {
                            $courseStartDate = $resultSqlCourseDate['startdate'];
                            $courseStartTime = date('h : i A ', strtotime($resultSqlCourseDate['starttime'])) . '- ' . date('h : i A ', strtotime($resultSqlCourseDate['endtime']));
                        } else {
                            $courseStartDate = "Not Available";
                        }
                    }
                    $output .= '
                     <tr>
                          <td>' . $sn . '</td>
                          <td>' . $row["firstname"] . '</td>
                          <td>' . $row["lastname"] . '</td>
                          <td>' . $row["email"] . '</td>
                          <td>' . $row["phone"] . '</td>
                          <td>' . $row["cname"] . '</td>
                          <td>' . date('F d, Y', strtotime($courseStartDate)) . '</td>
                           <td>' . $courseStartTime . '</td>
                          <td>' . date('F d, Y , h : i A', strtotime($row["registrationdate"])) . '</td>
                          <td> <a onclick="deleteUser();" id="" class="btn btn-danger" href="../register/deleteData.php?id=' . $row['register_id'] . '"> <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> Delete </a></td>

                     </tr>
                ';
                    $sn++;
                }
            }

                if(mysqli_num_rows($notAvailableQueryResult) > 0)
                {
                    $flag =1;
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
                          <td> <Inreg></Inreg>quiry </td>
                          <td>'. date('F d, Y , h : i A',strtotime($row["registrationdate"] )) .'</td>
                          <td> <a class="btn btn-danger" href="../register/deleteData.php?id='. $row['register_id'].'" class="" id="deleteUser">  <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> Delete </a></td>
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
                     <td colspan="10" style="text-align:center">No Registration Found!!</td>  
                </tr>  
           ';
            }
            $output .= '</table>';
            echo $output;
            ?>
        </div>
    </div>
</div>

<br>
<br>
<script src="../js/jqueryui.js"></script>

<script>
    $(document).ready(function(){
        $.datepicker.setDefaults({
            dateFormat: 'yy-mm-dd'
        });
        $(function () {
            $("#from_date").datepicker({
                numberOfMonths: 2,
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate() + 1);
                    $("#to_date").datepicker("option", "minDate", dt);
                }
            });
            $("#to_date").datepicker({
                numberOfMonths: 2,
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate() - 1);
                    $("#from_date").datepicker("option", "maxDate", dt);
                }
            });
        });
        $('#filter').click(function(){
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            if(from_date != '' && to_date != '')
            {
                $.ajax({
                    url:"../register/registerSearch.php",
                    method:"POST",
                    data:{from_date:from_date, to_date:to_date},
                    success:function(data)
                    {
                        $('#search_users').html(data);
                    }
                });
            }
            else
            {
                Lobibox.notify("error",{
                    msg:"Please Select Date"
                });
            }
        });
    });
</script>

<script>
    function deleteUser(){
        Lobibox.confirm({
            msg: "Are you sure you want to delete?"
        });
    });
    }
</script>
<script>
    function downloadCSV(){
        Lobibox.progress({
            title: 'Please wait',
            label: 'Downloading file',
            onShow: function ($this) {
                var i = 0;
                var inter = setInterval(function () {
                    window.console.log(i);
                    if (i > 100) {
                        inter = clearInterval(inter);
                    }
                    i = i + 0.1;
                    $this.setProgress(i);
                }, 0.5);
            }
        });
    }
</script>
<?php include "adminFooter.php"; ?>


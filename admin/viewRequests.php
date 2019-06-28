<?php
session_start();

/**
 * Created by PhpStorm.
 * User: Sushil Awale
 * Date: 11/03/2017
 * Time: 6:22 PM
 */



if (!isset($_SESSION['u_id'])) {
    header("location:exceptiontest.php");
    exit();
}
$currentPage = 'viewRequests';
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
        <!-- <div class="col-md-2">
            <form action="../register/downloadCSV.php" onsubmit="downloadCSV();" method="POST">
                <button type="submit" class="btn btn-success" name="export_excel">
                    <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download CSV
                </button>
            </form>
        </div> -->
        <br />
        <div id="search_requests">
            <?php
            $output = '';
            $query = "SELECT * from request ";
            $result = mysqli_query($conn, $query);
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
                     <th>Class Size</th>
                     <th>Level</th>
                     <th>Start Date</th>
                     <th>Requested Date</th>
                     <th>Action</th>  
                </tr>  
      ';
            if(mysqli_num_rows($result) > 0) {
                $flag = 1;
                while ($row = mysqli_fetch_array($result)) {

                    $output .= '
                     <tr>
                          <td>' . $sn . '</td>
                          <td>' . $row["firstname"] . '</td>
                          <td>' . $row["lastname"] . '</td>
                          <td>' . $row["email"] . '</td>
                          <td>' . $row["phone"] . '</td>
                          <td>' . $row["requestcourse"] . '</td>
                          <td>' . $row["class_size"] . '</td>
                          <td>' . $row["level"] . '</td>
                          <td>' . $row["start_date"] . '</td>
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
                     <td colspan="10" style="text-align:center">No Requests Found!!</td>  
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
                    url:"../requests/requestSearch.php",
                    method:"POST",
                    data:{from_date:from_date, to_date:to_date},
                    success:function(data)
                    {
                        $('#search_requests').html(data);
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
    function deleteRequest(){
        Lobibox.confirm({
            msg: "Are you sure you want to delete?"
        });
    });
    }
</script>
<!--
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
</script> -->
<?php include "adminFooter.php"; ?>


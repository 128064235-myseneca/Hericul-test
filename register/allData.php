<?php
/**
 * Created by PhpStorm.
 * User: Sumit
 * Date: 8/16/2017
 * Time: 9:42 PM
 */
require_once "../DBConn/DBConnection.php";

session_start();

if (!isset($_SESSION['u_id'])) {
    header("location:exceptiontest.php");
    exit();
}
?>
<html>
<head>
    <script src="../js/jquery-2.1.1.min.js"></script>
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css" />
    <link rel="shortcut icon" href="../img/fav.png"/>
    <script src="../js/jqueryui.js"></script>
    <link rel="stylesheet" href="../css/jqueryui.css"/>
    <title> Registered User </title>

    <script>
        $(document).ready(function(){
            $.datepicker.setDefaults({
                dateFormat: 'yy-mm-dd'
            });
            $(function(){
                $("#from_date").datepicker();
                $("#to_date").datepicker();
            });
            $('#filter').click(function(){
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                if(from_date != '' && to_date != '')
                {
                    $.ajax({
                        url:"registerSearch.php",
                        method:"POST",
                        data:{from_date:from_date, to_date:to_date},
                        success:function(data)
                        {
                            $('#order_table').html(data);
                        }
                    });
                }
                else
                {
                    alert("Please Select Date");
                }
            });
        });
    </script>
</head>
<!--<form name="frmSearch" method="post" action="">
    <p class="search_input">
        <input type="text" placeholder="From Date" id="register_at" name="search[register_at]"  value="<?php /*echo $register_at; */?>" class="input-control" />
        <input type="text" placeholder="To Date" id="register_at_to_date" name="search[register_at_to_date]" style="margin-left:10px"  value="<?php /*echo $register_at_to_date; */?>" class="input-control"  />
        <input type="submit" name="go" value="Search" >
    </p>
</form>-->

<body>
<br><br><br>

<div class="container">
    <div class="row"> </div>
    <div class="row">
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
            <form action="downloadCSV.php" method="POST">
                <button type="submit" class="btn btn-success" name="export_excel">
                    <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download CSV
                </button>
            </form>
        </div>
    <br />
    </div>
</div>
    <div id="order_table">
        <br><br><br>
<?php

$output = '';
$query = " SELECT * FROM register ";
$result = mysqli_query($conn, $query);
$sn = 1;
$output .= '  
           <table class="table table-bordered">  
                <tr>  
                     <th>ID</th>  
                     <th>First Name</th>  
                     <th>Last Name</th>  
                     <th>Email</th>  
                     <th>Phone</th>  
                     <th>Course</th>  
                     <th>Register Date</th>  
                     <th>Action</th>  
                </tr>  
      ';
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result))
    {
        $output .= '  
                     <tr>  
                          <td>'. $sn .'</td>  
                          <td>'. $row["firstname"] .'</td>  
                          <td>'. $row["lastname"] .'</td>  
                          <td>'. $row["email"] .'</td>  
                          <td>'. $row["phone"] .'</td>  
                          <td>'. $row["course"] .'</td>  
                          <td>'. $row["registerDate"] .'</td>
                          <td> <a href="deleteData.php?id='. $row['id'].'"> <span class="glyphicon glyphicon-trash" aria-hidden="true"> Delete </a></td>
                            
                     </tr>  
                ';
        $sn++;
    }
}
else
{
    $output .= '  
                <tr>  
                     <td colspan="7">No Registration Found!!</td>  
                </tr>  
           ';
}
$output .= '</table>';
echo $output;?>

</body>
</html>
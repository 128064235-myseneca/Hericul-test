<?php
/**
 * Created by PhpStorm.
 * User: saura
 * Date: 11/21/2018
 * Time: 3:50 PM
 */


session_start();

if (!isset($_SESSION['u_id'])) {
    header("location:exceptiontest.php");
    exit();
}
$currentPage = 'certificate';
include "adminHeader.php";
require_once "../DBConn/DBConnection.php";
?>

<link rel="stylesheet" href="../css/jqueryui.css"/>
<div class="container-fluid" style="max-width: 75%">
    <div class="row">
        <br>
        <div class="col-md-3">
            <!--            <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date"/>-->
        </div>
        <div class="col-md-5">
            <!--            <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date"/>-->
        </div>
        <div class="col-md-2">
            <a href="teacherCertificate.php"><button class="btn btn-success">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><span style="font-size: 118%">Add Teacher Certificate</span>
            </button></a>
        </div>
        <div class="col-md-2">
            <button class="btn btn-success" onclick="export_data();">
                <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download CSV
            </button>
        </div>
        <br/>
        <div id="search_users">
            <table id="certificate" class="table table-responsive table-bordered table-striped" style="margin-top: 50px;">
                <tr>
                    <th>S.N.</th>
                    <th>Name</th>
                    <th>Verification ID</th>
                    <th>Action</th>
                </tr>
                <?php
                $query = "SELECT * FROM `certificate_teachers`";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                             <tr>
                                <td>' . $i . '</td>
                                <td>' . $row["title"].$row["name"] . '</td>
                                <td>' . $row["verification_id"] . '</td>
                                <td style="width: 20%;">
                                <a class="btn btn-warning" href="teacherCertificate_edit.php?cert_id=' . $row['id'] . '" ><i class="fa fa-edit fa-lg" aria-hidden="true"></i> Edit </a>  
                                <a onclick="return confirm(\'Are you sure you want to delete this item?\');" class="btn btn-danger" href="teacherCertificate_delete.php?cert_id=' . $row['id'] . '"> <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> Delete </a></td>
                             </tr>';
                        $i = $i + 1;
                    }
                }
                ?>
            </table>
        </div>
    </div>
</div>

<br>
<br>
<script src="../js/jqueryui.js"></script>
<script>
    function export_data() {
        $('#certificate').tableExport({type: 'csv', ignoreColumn: [3]});
    }
</script>
<?php include "adminFooter.php"; ?>


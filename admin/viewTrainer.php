<?php
session_start();

/**
 * Created by PhpStorm.
 * User: Saurav Bhandari
 * Date: 9/6/2018
 * Time: 5:38 PM
 */

if (!isset($_SESSION['u_id'])) {
    header("location:exceptiontest.php");
    exit();
}
$currentPage = 'trainer';
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
            <a href="addTrainer.php">
                <button class="btn btn-success">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><span style="font-size: 118%">Add Trainer</span>
                </button>
            </a>
        </div>
        <div class="col-md-2">
            <button class="btn btn-success" onclick="export_data();">
                <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download CSV
            </button>
        </div>
        <br/>
        <div id="search_users" style="margin: 0 auto; padding-top: 47px;">
            <table id="certificate" class="table table-responsive table-bordered table-striped"
                   style="width: 60%; margin: 0 auto !important;">
                <tr>
                    <th style="width: 1%;">S.N.</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th style="width: 20%;">Action</th>
                </tr>
                <?php
                $query = "SELECT * FROM `trainer`";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                             <tr>
                                <td style="width: 1%;">' . $i . '</td>
                                <td style="width: 38%;">' . $row["name"] . '</td>
                                <td>' . $row["title"] . '</td>
                                <td style="width: 22%;">
                                <a class="btn btn-warning" href="editTrainer.php?tr_id=' . $row['id'] . '" ><i class="fa fa-edit fa-lg" aria-hidden="true"></i> Edit </a>  
                                <a onclick="return confirm(\'Are you sure you want to delete this item?\');" class="btn btn-danger" href="deleteTrainer.php?tr_id=' . $row['id'] . '"> <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> Delete </a></td>

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


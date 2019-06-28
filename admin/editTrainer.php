<?php
/**
 * Created by PhpStorm.
 * User: saura
 * Date: 10/1/2018
 * Time: 4:02 PM
 */

//if (!isset($_SESSION['u_id'])) {
//    header("location:exceptiontest.php");
//    exit();
//}
$currentPage = 'trainer';
include "adminHeader.php";
include '../DBConn/DBConnection.php';


$id = $_REQUEST['tr_id'];
echo $id;
$sql = "select * from `trainer` WHERE id=$id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
        $title = $row['title'];
        ?>

        <link rel="stylesheet" href="../css/jqueryui.css"/>
        <div class="container">
            <h2 class="text-capitalize text-center text-success">Edit Trainer Data</h2>
            <br>
            <form id="certificate" action="editTrainer.php" method="POST" role="form" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name" class="col-form-label">Trainer Name</label>
                        <input type="text" class="form-control required text-capitalize" id="name" name="name"
                               placeholder="Trainer Name" value="<?php echo $name; ?>">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                    <input type="hidden" name="tr_id" value="<?php echo $id; ?>"/>

                    <div class="form-group col-md-6">
                        <label for="title" class="col-form-label">Trainer Title</label>
                        <input type="text" class="form-control required text-capitalize" id="title" name="title"
                               placeholder="Trainer Title" value="<?php echo $title; ?>">
                    </div>
                    <br>
                    <div class="form-group col-md-2">
                        <input type="submit" name="submit" id="submit" tabindex="4"
                               class="form-control btn btn-success" value="Submit">
                    </div>
                </div>
            </form>
        </div>
        <?php
    }
}
?>
    <script src="../js/jqueryui.js"></script>

    <script>
        $(document).ready(function () {
            $("#certificate").validate({
                rules: {
                    name: {
                        required: true
                    },
                    title: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: "Please Enter Trainer's Name"
                    },
                    title: {
                        required: "Please Enter Trainer's Title"
                    }
                }
            });
        });
    </script>
<?php
/**
 * Created by PhpStorm.
 * User: saura
 * Date: 9/7/2018
 * Time: 8:52 AM
 */

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $title = $_POST['title'];
    $id = $_POST['id'];

    $sql = "UPDATE `trainer` SET `name`= '$name' , `title` = '$title' WHERE id =$id";
//    echo $sql;
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $url = 'viewTrainer.php';
        echo "<script> Lobibox.alert('success',{
                    msg:'Successfully Updated Trainer Data!!'
                }); </script>";
        echo '<META HTTP-EQUIV=REFRESH CONTENT="0.5; ' . $url . '">';
    } else {
        echo '<script> Lobibox.alert("error",{
                    msg:"Sorry, Please try again."
                }); </script>';
    }
}

?>
<?php include "adminFooter.php"; ?>
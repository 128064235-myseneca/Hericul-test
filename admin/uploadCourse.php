<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 8/16/2017
 * Time: 3:05 PM
 */

session_start();
$currentPage = 'uploadCourse';

if (!isset($_SESSION['u_id'])) {
    header("location:login.php");
    exit();
}
include "adminHeader.php";
if(isset($_GET['status'])) {
    if ($_GET['status'] == 'success') {
        echo '<script> Lobibox.alert("success",{
                    msg:"New Course Added."
                }); </script>';
    }
    if ($_GET['status'] == 'failed') {
        echo '<script> Lobibox.alert("error",{
                    msg:"Sorry, Please try again."
                }); </script>';
    }
    if ($_GET['status'] == 'exist') {
        echo '<script> Lobibox.alert("error",{
                    msg:"Course name already exist. "
                }); </script>';
    }
}
?>

    <script>
        $(document).ready(function () {
            $("#courseform").validate({
                rules:{
                    cname:{
                        required:true
                    },
                    startDate:{
                        required:true
                    },
                    description:{
                        required:true
                    },
                    file:{
                        required:true
                    },
                    duration:{
                        required:true,
                        number:true,
                        rangelength:[1,2]
                    }
                },
                messages:{
                    cname:{
                        required:"Please Enter Course Name"
                    },
                    startDate:{
                        required:"Please Select Date"
                    },
                    description:{
                        required:"Please Enter Course Description"
                    },
                    email:{
                        required: "Please Upload a File "
                    },
                    duration:{
                        required: "Please Enter Course Duration",
                        number: "Please Enter Number Onlys",
                        rangelength: "Duration must be limited"
                    }
                }
            });
        });
    </script>
    <div class="container">
        <h2 class="text-capitalize text-center text-success"> Upload Course </h2>
        <br>
        <form id="courseform" action="submitCourseDb.php" enctype="multipart/form-data" method="POST" role="form">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="courseName" class="col-form-label">Course Name</label>
                    <input type="text" class="form-control required" id="cname" name="cname" placeholder="Course Name" autocomplete="off">
                </div>


                <div class="form-group col-md-6">
                    <label for="description" class="col-form-label">Course Description</label>
                    <textarea rows="4" cols="50" name="description" form="courseform" class="form-control" ></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="file" class="col-form-label">Upload File</label>
                    <input type= "file" name= "file" class="form-control" >
                </div>

                <button type="submit" name="submit" class="btn btn-primary pull-left">Submit </button>
                <br><br>
            </div>
        </form>
    </div>
<br>
<br>

<script>
    var counter = 1;
    var limit = 2;
    function addInput(divName){
        if (counter == limit)  {
            alert("You have reached the limit of adding " + counter + " inputs");
        }
        else {
            var newdiv = document.createElement('div');
            newdiv.innerHTML = "<br> Start Time " + (counter + 1) + " <br> <input class='form-control required' type='time' name='myInputsStart[]'/>" +
                "End Time " + (counter + 1) + " <br> <input class='form-control required' type='time' name='myInputsEnd[]'/>";
            document.getElementById(divName).appendChild(newdiv);
            counter++;
        }
    }
</script>
<?php include "adminFooter.php" ?>



<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 8/16/2017
 * Time: 3:05 PM
 */

session_start();
$currentPage = 'uploadSession';

if (!isset($_SESSION['u_id'])) {
    header("location:login.php");
    exit();
}
require_once "../DBConn/DBConnection.php";


include "adminHeader.php";

function displayAllCoursesDropdown()
{
    global $conn;
    $sqlC = "SELECT DISTINCT  cname FROM course";
    $allCourses = mysqli_query($conn, $sqlC);
    while ($rows = mysqli_fetch_array($allCourses)) {
        echo '<option>'.$rows['cname'].'</option>';
        echo $rows['cname'];
    }
}
if(isset($_GET['status'])) {
    if ($_GET['status'] == 'success') {
        echo '<script> Lobibox.alert("success",{
                    msg:"New Course Session has been added."
                }); </script>';
    }
    if ($_GET['status'] == 'failed') {
        echo '<script> Lobibox.alert("error",{
                    msg:"Sorry, Please try again."
                }); </script>';
    }
}

?>
<link rel="stylesheet" href="../css/jqueryui.css"/>
<link rel="stylesheet" href="../css/timepicker.css"/>

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
                    rangelength:[1,3]
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

    <h2 class="text-capitalize text-center text-success"> Upload Session </h2>
    <br>
    <form id="courseform" action="submitSessionDb.php" enctype="multipart/form-data" method="POST" role="form">
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="exampleFormControlSelect1"> Course</label>
                <select class="form-control required" id="exampleFormControlSelect1" name="course" >
                    <?php displayAllCoursesDropdown();?>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="startDate" class="col-form-label">Start Date</label>
                <input type="date" class="form-control" id="startDate" name="startDate" placeholder="Start Date" autocomplete="off" >
            </div>
            <div class="form-group col-md-6">
                <label for="couseDuration" class="col-form-label">Course Duration (in hours)</label>
                <input type="text" class="form-control" id="duration" name="duration" placeholder="Duration" >
            </div>

            <div class="col-md-6 form-group">
                <div id="dynamicInput">
                    <div class="form-group col-md-6 no-pad pad-r">
                        Start Time 1<br><input class="form-control required startTime" id="startTime" type="text" name="myInputsStart[]"/>
                    </div>
                    <div class="col-md-6 form-group no-pad">
                        End Time 1<br><input class="form-control required endTime" id="endTime" type="text" name="myInputsEnd[]"/>
                    </div>
                </div>
                <br><br>
                <input type="button" class="btn btn-success" value="Add another Timing" id="addTime" onClick="addInput('dynamicInput');"/>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary pull-left">Submit </button>
        <br><br>
    </form>
</div>
<br>
<br>


<script src="../js/jqueryui.js"></script>
<script src="../js/timepicker.js"></script>

<script>
    $("#addTime").click(function () {
        $("#startTime1").timepicker({
            onSelect: function (selected) {
                $("#endTime1").timepicker({'scrollDefault': 'now'});
            }
        });
        $("#endTime1").timepicker({
            onSelect: function (selected) {
                $("#startTime1").timepicker({'scrollDefault': 'now'});
            }
        });
    });

    $(document).ready(function(){
        $.datepicker.setDefaults({
            dateFormat: 'yy-mm-dd'
        });
        //Date
        $(function () {
            $("#startDate").datepicker({
                minDate: 1,
                beforeShow: function() {
                    $(this).datepicker('option', 'maxDate');
                }
            });
        });
        //Time
        $(function() {
            $("#startTime").timepicker({
                onSelect: function (selected) {
                    $("#endTime").timepicker({'scrollDefault': 'now'});
                }
            });
            $("#endTime").timepicker({
                onSelect: function (selected) {
                    $("#startTime").timepicker({'scrollDefault': 'now'});
                }
            });

        });
    });
</script>
<script>
    var counter = 1;
    var limit = 2;

    function addInput(divName){
        if (counter == limit)  {
            alert("You have reached the limit of adding " + counter + " inputs");
        }
        else {
            var newdiv = document.createElement('div');
            newdiv.innerHTML = "<br>  <div class='form-group col-md-6 no-pad pad-r'>Start Time " + (counter + 1) + " <br> <input class='form-control required startTime' id='startTime1' type='text' name='myInputsStart[]'/></div>" +
                "<div class='form-group col-md-6 no-pad pad-r'> End Time " + (counter + 1) + " <br> <input class='form-control required endTime' id='endTime1'  type='text' name='myInputsEnd[]'/></div>";
            document.getElementById(divName).appendChild(newdiv);
            counter++;
        }
    }
</script>
<?php include "adminFooter.php" ?>



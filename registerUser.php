<?php
/**
 * Created by PhpStorm.
 * User: Sumit Shrestha
 * Date: 16/08/2017
 * Time: 10:38
 */
$currentPage = 'registerUser';
include "include/header.php";
include 'DBConn/DBConnection.php';
?>

<script>
    function getId(val){
        //ajax function
        $.ajax({
            type:"POST",
            url: "getCourseDateAndTime.php",
            data:"course_id="+val,
            success:function(data){
                $("#startDateAndTime").html(data);
            }
        });
    }
</script>
<?php

if(isset($_GET['status'])) {
    if ($_GET['status'] == 'success') {
        echo '<script> Lobibox.alert("success",{
                    msg:"Successfully Registered!! Please check your email for confirmation."
                }); </script>';
    }
    if ($_GET['status'] == 'failed') {
        echo '<script> Lobibox.alert("error",{
                    msg:"Sorry, Please try again."
                }); </script>';
    }
}

function displayAllCoursesDropdown()
{
    global $conn;
    $sqlC = "SELECT DISTINCT course_id,cname FROM course";
    $allCourses = mysqli_query($conn, $sqlC);
    while ($rows = mysqli_fetch_array($allCourses)) {
        echo '<option value="'.$rows[course_id].'">'.$rows['cname'].'</option>';
    };
}


function displayDataAndTimeCourses()
{
    global $conn;
    $sql = "SELECT * FROM coursetime A INNER JOIN course B on A.course_id=B.course_id INNER JOIN coursedate C on A.coursedate_id = C.course_date_id WHERE A.course_id = '$id'";
    $dateAndTime = mysqli_query($conn, $sql);
    while ($rows = mysqli_fetch_array($dateAndTime)) {
        echo '<option>'.$rows['startdate']. ' | ' . date('h:i A ', strtotime($rows['starttime'])).' - ' . date('h:i A ', strtotime($rows['endtime'])).'</option>';
    }
}
?>

<div class="container">
    <h2 class="text-capitalize text-center text-success"> Registration Form </h2>
    <br>
    <form id="register-form" action="" method="POST" role="form" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="firstname" class="col-form-label">First Name</label>
                <input type="text" class="form-control required text-capitalize" id="firstname" name="firstname" placeholder="First Name">
            </div>

            <div class="form-group col-md-6">
                <label for="lastname" class="col-form-label">Last Name</label>
                <input type="text" class="form-control required text-capitalize" id="lastname" name="lastname" placeholder="Last Name">
            </div>
            <div class="form-group col-md-6">
                <label for="email" class="col-form-label">Email</label>
                <input type="email" class="form-control required" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <label for="phone" class="col-form-label">Phone Number</label>
                <input type="text" class="form-control required" id="phone" name="phone" placeholder="Phone Number">
            </div>
            <br>
            <div class="form-group col-md-6">
                <label for="course"> Course</label>
                <select onchange="getId(this.value);" class="form-control required" id="course" name="course" >
                    <option selected="selected" disabled>Select</option>
                    <?php displayAllCoursesDropdown();?>
                </select>
            </div>
            <div class="form-group startDateRegister col-md-6">
                <label for="startDate"> Start Date | Time </label>
                <select class="form-control required" id="startDateAndTime" name="startDateAndTime" >
                    <option value="">  </option>
                </select>
            </div>
            <?php $currentDate = date('F d, Y'); ?>
            <div class="form-group col-md-6">
                <label for="phone" class="col-form-label">Registration Date</label>
                <input class="form-control" type="text" placeholder="<?php echo $currentDate; ?>" readonly value="">
            </div>
            <div class="form-group col-md-2">
                <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-success" value="Register">
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function () {
        $("#register-form").validate({
            rules:{
                firstname:{
                    required:true,
                    nowhitespace:true,
                    lettersonly:true
                },
                lastname:{
                    required:true,
                    nowhitespace:true,
                    lettersonly:true
                },
                phone:{
                    required:true,
                    number:true,
                    rangelength:[7,10]
                },
                email:{
                    required:true,
                    email:true
                },
                course:{
                    required:true
                },
                startDateAndTime:{
                    required:true
                }
            },
            messages:{
                firstname:{
                    required:"Please Enter First Name",
                    nowhitespace:"No whitespace is allowed",
                    lettersonly:"Please type letters only"
                },
                lastname:{
                    required:"Please Enter Last Name",
                    nowhitespace:"No whitespace is allowed",
                    lettersonly:"Please Type Letters Only"
                },
                phone:{
                    required:"Please Enter Phone Number",
                    number:"Please Enter Number Only",
                    rangelength:"Phone Number must contain at least 7 Numbers"
                },
                email:{
                    required: "Please Enter an Email Address ",
                    email: "Please Enter a valid Email Address"
                },
                course:{
                    required:"Please select a course "
                },
                startDateAndTime:{
                    required:"Please select a time "
                }
            }
        });
    });
</script>

<!--<script>
    $('form').on('submit',function(){
        Lobibox.alert('success',{
            msg:"Lorem ipsum dolor sit amet byron frown tumult minstrel wicked clouded bows columbine full"
        });
    });
</script>-->

<script>
    $("#course").change(function () {
        $items = $('select[name=startDateAndTime]');
        var $courseSelect = $("#course option:selected").text();
        if ($courseSelect == "Select") {
            $(".startDateRegister").css("display", "none");
        }
        var $this = $(this).find(':selected'),
            rel = $this.attr('rel'),
            $set = $items.find('option.' + rel);
        if ($set.size() < 0) {
            $items.hide();
            return;
        }
        $(".startDateRegister").css("display", "block");
        $items.show().find('option').hide();
        $set.show().first().prop('selected', true);
    });
</script>
<br>
<br>
<br>
<br>
<?php include "include/footer.php"?>


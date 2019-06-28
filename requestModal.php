<?php
/**
 * Created by PhpStorm.
 * User: Sushil Awale
 * Date: 11/3/2017
 * Time: 2:12 PM
 */
include 'DBConn/DBConnection.php';
?>
<link rel="stylesheet" href="css/jqueryui.css"/>

<?php

if(isset($_GET['status'])) {
    if ($_GET['status'] == 'success') {
        echo '<script> Lobibox.alert("success",{
                    msg:"Your request has been sent. Please check your email for confirmation."
                }); </script>';
    }
    if ($_GET['status'] == 'failed') {
        echo '<script> Lobibox.alert("error",{
                    msg:"Sorry, Please try again."
                }); </script>';
    }
}

?>
<link rel="stylesheet" href="css/jqueryui.css"/>
<script>
    $(document).ready(function() {
        $.datepicker.setDefaults({
            dateFormat: 'yy-mm-dd'
        });
        $("#start_date").datepicker({
            numberOfMonths: 2,
            minDate: new Date(),
            onSelect: function (selected) {
                var dt = new Date(selected);
                dt.setDate(dt.getDate() + 1);

                $("#start_date").datepicker("option", "minDate", dt);
            }
        });
    });
</script>
<div class="modal fade product_view" id="requestTraining">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title text-darken-4 ">Request a Training</h3>
            </div>
            <div class="modal-body">
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <form id="request-form" action="" method="POST" role="form" enctype="multipart/form-data">
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
                                    <label for="course" class="col-form-label">Course</label>
                                    <input type="text" class="form-control required" id="course" name="course" placeholder="Course Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="level" class="col-form-label">Course</label>
                                    <select class="form-control required" id="level" name="level">
                                        <option>Beginner</option>
                                        <option>Advanced</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="class_size" class="col-form-label">No of participants</label><br>
                                    <input type="number" class="form-control optional" id="class_size" name="class_size">
                                    <label for="class_size" class="col-form-label">
                                        <i>
                                            Only applicable if you are seeking the training in group
                                        </i></label><br>
                                </div>
                                <br>
                                <div class="form-group col-md-6">
                                    <label for="start_date" class="col-form-label">Tentative Start Date</label>
                                    <input type="text" class="form-control required" id="start_date" name="start_date" placeholder="Click here to enter a date">
                                </div>
                                <div class="btn-ground col-md-2 col-md-offset-5">
                                    <button type="submit" name="request_submit" id="request_submit" tabindex="4" class="form-control btn btn-primary">
                                        <span class="glyphicon glyphicon-edit"></span> Request
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/jqueryui.js"></script>

<script>
    $(document).ready(function () {
        $("#request-form").validate({
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
                class_size:{
                    required:false
                },
                start_date:{
                    required:true,
                    date:true
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
                    required:"Please enter a course "
                },
                start_date:{
                    required:"Please enter a date "
                }
            }
        });
    });
</script>


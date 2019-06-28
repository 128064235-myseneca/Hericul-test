<?php
/**
 * Created by PhpStorm.
 * User: saura
 * Date: 10/3/2018
 * Time: 2:32 PM
 */

//$currentPage = 'certificate';
include "cheader.php";

$currentPage = "certificate";
require_once "../DBConn/DBConnection.php";
?>
<style>
    .btn:hover {
        background-color: #327f2a;
        font-weight: bold;
    }
</style>
<link rel="stylesheet" href="../css/jqueryui.css"/>
<?php
if (isset($_POST['verificationID'])) {
    $verification_id = trim($_POST['verificationID']);

    $cert_type = explode("-", $verification_id)[0];

    if ($cert_type != "DTT") {

        $sqlV = "SELECT * from certificate where verification_id = '$verification_id'";
        $cert = mysqli_query($conn, $sqlV);
        $countV = mysqli_num_rows($cert);
        $row = mysqli_fetch_array($cert);

        if ($countV == 1) {
            $name = $row['name'];
            $fromDate = date("F j, Y", strtotime($row['fromDate']));
            $toDate = date("F j, Y", strtotime($row['toDate']));
            $course = strtoupper($row['course']);
            $photo = $row['photo'];
            $verification_id = $row['verification_id'];
            $course_duration = $row['course_duration'];
            $title = strtoupper($row['title']);
            $trainer = strtoupper($row['trainer']);
            $trainer_title = strtoupper($row['trainer_title']);

            echo "
                
        <div class='container' style='margin-top: 40px;'>
        <div class='jumbotron' style='border:4px solid rgba(15,36,16,0.81); max-width: 89%;  margin-left: 80px;'>
            <div class='row'>
                <div class='col-md-9'>
            <pre style='font-family:Verdana,monospace; font-size:18px; border:2px dashed #3573a3;'>
<span style='font-size:44px;'>$name</span>
<b>Course</b> : <span style='font-size: 16px;'>$course</span>
<b>Course Duration</b> : <span style='font-size: 16px;'>$course_duration HRS</span>
<b>Started On</b> : $fromDate
<b>Completed On</b> : $toDate
<b>Verification ID</b> : $verification_id
<b>Trainer</b> : $trainer , $trainer_title
</pre>
                </div>
                <div class='col-md-3'>
                    <img src='../$photo' style='float:right; border:4px solid gray; object-fit: cover;' class='img-circle img-thumbnail'/>
                </div>
            </div>

            <div class='row' style='padding-top: 10px;'>
                <a href='certificateDownload.php?ver_id=$verification_id'><button class='btn btn-success btn-lg'><i class='fa fa-download'></i> Download Certificate</button></a>
                <a href='certificateShow.php?ver_id=$verification_id' target='_blank'><button class='btn btn-success btn-lg' style='margin-left: 20px;'><i class='fa fa-eye'></i> View
                    Certificate
                </button>
            </div>
        </div>
    </div>
      
        ";
        } else {
            echo "<script> Lobibox.alert('error',{
                    msg:'Sorry. We cannot find any Student Record for the ID you entered. - DTC'
                }); </script>";
            $url = '../index.php';
            echo '<META HTTP-EQUIV=REFRESH CONTENT="1.5; ' . $url . '">';
        }
    }else{
        $sqlV = "SELECT * from certificate_teachers where verification_id = '$verification_id'";
        $cert = mysqli_query($conn, $sqlV);
        $countV = mysqli_num_rows($cert);
        $row = mysqli_fetch_array($cert);

        if ($countV == 1) {
            $name = $row['name'];
            $verification_id = $row['verification_id'];
            echo "
                
        <div class='container' style='margin-top: 40px;'>
        <div class='jumbotron' style='border:4px solid rgba(15,36,16,0.81); max-width: 89%;  margin-left: 80px;'>
            <div class='row'>
                <div class='col-md-9'>
            <pre style='font-family:Verdana,monospace; font-size:18px; border:2px dashed #3573a3;'>
<span style='font-size:44px;'>$name</span>
<b>Verification ID</b> : $verification_id
</pre>
                </div>
            </div>

            <div class='row' style='padding-top: 10px;'>
                <a href='teacherCertificateDownload.php?ver_id=$verification_id'><button class='btn btn-success btn-lg'><i class='fa fa-download'></i> Download Certificate</button></a>
                <a href='teacherCertificateShow.php?ver_id=$verification_id' target='_blank'><button class='btn btn-success btn-lg' style='margin-left: 20px;'><i class='fa fa-eye'></i> View
                    Certificate
                </button>
            </div>
        </div>
    </div>
      
        ";
        } else {
            echo "<script> Lobibox.alert('error',{
                    msg:'Sorry. We cannot find any Teacher Record for the ID you entered. - DTC'
                }); </script>";
            $url = '../index.php';
            echo '<META HTTP-EQUIV=REFRESH CONTENT="1.5; ' . $url . '">';
        }
    }


} else {
    echo "<script> Lobibox.alert('error',{
                    msg:'Enter Validation ID in Proper Format!!'
                }); </script>";
    $url = '../index.php';
    echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
}
include "cfooter.php";
?>


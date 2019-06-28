<?php
/**
 * Created by PhpStorm.
 * User: Sumit Shrestha
 * Date: 16/08/2017
 * Time: 13:25
 */
$username = "root";
$password = "";
$hostname = "localhost";
$dbName = "hericul";

//create connection
$conn = new mysqli($hostname, $username, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['register-submit'])) {
    $firstname = ucwords($_POST['firstname']);
    $lastname = ucwords($_POST['lastname']);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    $startDateAndTime = $_POST['startDateAndTime'];
    $currentDate = date('Y/m/d H:i:s');
    require 'PHPMailer/PHPMailerAutoload.php';

    //Emails course name to registered user instead of course id
    /*$courseNameEmailSql = "SELECT coursedate.startdate from coursedate INNER JOIN coursetime on coursedate.course_date_id = coursetime.coursedate_id where coursetime_id=$startDateAndTime";
    $courseNameEmail = mysqli_query($conn,$courseNameEmailSql);
    $result = mysqli_fetch_array($courseNameEmail);
    $resultDateEmail = $result['startdate'];*/

    $courseNameSql = "SELECT cname from course WHERE course_id= $course";
    $courseName = mysqli_query($conn, $courseNameSql);
    $resultCourse = mysqli_fetch_array($courseName);
    $courseNameInEmail = $resultCourse['cname'];

    //get selected course date
    $courseDateSql = "SELECT coursedate.startdate from coursedate inner join coursetime on coursetime.coursedate_id = coursedate.course_date_id  WHERE coursetime.coursetime_id= $startDateAndTime";
    $courseDate = mysqli_query($conn, $courseDateSql);
    $resultDate = mysqli_fetch_array($courseDate);
    $courseDateValue = date('F d, Y', strtotime($resultDate['startdate']));
    if (mysqli_num_rows($courseDate) < 1) {
        $courseDateValue = "Not Available | For enquiry only";
    }

    $mail = new PHPMailer;
    $mail->isSMTP();                                   // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                            // Enable SMTP authentication
    $mail->Username = 'training@deerwalk.edu.np';          // SMTP username
    $mail->Password = 'training@2016'; // SMTP password
    $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                 // TCP port to connect to
    $mail->setFrom('training@deerwalk.edu.np', 'DWIT Training');
    $mail->addReplyTo('training@deerwalk.edu.np', 'DWIT Training');
    $mail->addAddress($email);   // Add a recipient
    // $mail->addCC('pravin.thapalia@deerwalk.edu.np');
    // $mail->addBCC('hitesh.karki@deerwalk.edu.np');
    // $mail->addBCC('sumit.shrestha@deerwalk.edu.np');
    // $mail->addBCC('_digitalmedia@deerwalk.edu.np');

    //dynamic mailing mail_type 0 equals CC
    $CcMailSql = "SELECT * from mailinglist WHERE mail_type=0";
    $CcMail = mysqli_query($conn, $CcMailSql);
    while ($rowCc = mysqli_fetch_array($CcMail)) {
        $mail->addCC($rowCc['mail_name']);
    }

    //dynamic mailing mail_type 1 equals BCC
    $BccMailSql = "SELECT * from mailinglist WHERE mail_type=1";
    $BccMail = mysqli_query($conn, $BccMailSql);
    while ($rowBcc = mysqli_fetch_array($BccMail)) {
        $mail->addBCC($rowBcc['mail_name']);
    }


    $mail->isHTML(true);  // Set email format to HTML

    $bodyContent = "Mr./Ms." . " " . $firstname . " " . $lastname . ",<br><br>";
    $bodyContent .= 'You have been successfully registered in this course.<br><br>';
    $bodyContent .= 'You will be contacted within 5 business days to update you about the further enrollment process and other related details.<br><br>';
    $bodyContent .= 'Your registration details are as follows. <br><br>';
    $bodyContent .= "First Name: " . $firstname . " <br>" . "Last Name: " . $lastname . "<br>" . "Phone: " . $phone . " <br>" . "Course: " . $courseNameInEmail . "<br>" . "Course Start Date: " . $courseDateValue . "<br>" . "Registered On: " . date('F d, Y  h:i A', strtotime($currentDate)) . "<br><br>";
    $bodyContent .= '<br>  Thanks,';
    $bodyContent .= '<br>  Pravin Thapaliya';
    $bodyContent .= '<br> Training Manager';
    $mail->Subject = 'Registration Confirmed';
    $mail->Body = $bodyContent;
    $mail->send();

    $sqls = "SELECT * from register inner join course on course.course_id = register.course_id WHERE email = '$email' and cname = '$courseNameInEmail'";

    $results = mysqli_query($conn, $sqls);
    $count = mysqli_num_rows($results);
//    echo $count;
    if ($count > 0) {
        $data = mysqli_fetch_array($results);
        $id = $data['register_id'];
        $sql = "UPDATE `register` SET `register_id` = $id,`firstname` = '$firstname ', `lastname` = '$lastname ', `phone` = '$phone ', `email` = '$email',`registrationdate` = '$currentDate', `course_id` = '$course', `preferabletime` = '$startDateAndTime' WHERE `register`.`register_id` = $id";
    } else {
        $sql = "INSERT INTO register(firstname,lastname,email,phone,registrationdate,course_id,preferabletime) VALUES ('$firstname','$lastname','$email','$phone','$currentDate',$course,'$startDateAndTime')";
    }

//    echo $sql;
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script> Lobibox.alert("success",{
                    msg:"Your request has been submitted"
                }); </script>';
        $url = 'http://training.dwit.edu.np';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="2; ' . $url . '">';
    } else {
        echo '<script> Lobibox.alert("error",{
                    msg:"Sorry, Some error occurred. Please try again!!!"
                }); </script>';
        $url = 'http://training.dwit.edu.np';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="2; ' . $url . '">';
    }
}

if (isset($_POST['request_submit'])) {
    $firstname = ucwords($_POST['firstname']);
    $lastname = ucwords($_POST['lastname']);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    $class_size = $_POST['class_size'];
    $level = $_POST['level'];
    $start_date = $_POST['start_date'];
    $currentDate = date('Y/m/d H:i:s');
    require 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;
    $mail->isSMTP();                                   // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                            // Enable SMTP authentication
    $mail->Username = 'training@deerwalk.edu.np';          // SMTP username
    $mail->Password = 'training@2016'; // SMTP password
    $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                 // TCP port to connect to
    $mail->setFrom('training@deerwalk.edu.np', 'DWIT Training');
    $mail->addReplyTo('training@deerwalk.edu.np', 'DWIT Training');
    $mail->addAddress($email);   // Add a recipient
    // $mail->addCC('pravin.thapalia@deerwalk.edu.np');
    // $mail->addBCC('hitesh.karki@deerwalk.edu.np');
    // $mail->addBCC('sumit.shrestha@deerwalk.edu.np');
    // $mail->addBCC('_digitalmedia@deerwalk.edu.np');

    //dynamic mailing mail_type 0 equals CC
    $CcMailSql = "SELECT * from mailinglist WHERE mail_type=0";
    $CcMail = mysqli_query($conn, $CcMailSql);
    while ($rowCc = mysqli_fetch_array($CcMail)) {
        $mail->addCC($rowCc['mail_name']);
    }

    //dynamic mailing mail_type 1 equals BCC
    $BccMailSql = "SELECT * from mailinglist WHERE mail_type=1";
    $BccMail = mysqli_query($conn, $BccMailSql);
    while ($rowBcc = mysqli_fetch_array($BccMail)) {
        $mail->addBCC($rowBcc['mail_name']);
    }


    $mail->isHTML(true);  // Set email format to HTML

    $bodyContent = "Mr./Ms." . " " . $firstname . " " . $lastname . ",<br><br>";
    $bodyContent .= 'You have successfully requested for the course.<br><br>';
    $bodyContent .= 'You will be contacted within 5 business days for further updates.<br><br>';
    $bodyContent .= 'Your request details are as follows. <br><br>';
    $bodyContent .= "First Name: " . $firstname . " <br>" . "Last Name: " . $lastname . "<br>" . "Phone: " . $phone . " <br>" . "Course: " . $course . "<br>" . "Class-size: " . $class_size . "<br>" . "Level: " . $level . "<br>" . "Start Date: " . $start_date . "<br>" . "Registered On: " . date('F d, Y  h:i A', strtotime($currentDate)) . "<br><br>";
    $bodyContent .= '<br>  Thanks,';
    $bodyContent .= '<br>  Pravin Thapaliya';
    $bodyContent .= '<br> Training Manager';
    $mail->Subject = 'Request Training Submitted';
    $mail->Body = $bodyContent;
    $mail->send();

    $sql = "INSERT INTO request(requestdate,firstname,lastname,email,phone,requestcourse,class_size, level, start_date) VALUES ('$currentDate','$firstname','$lastname','$email','$phone','$course','$class_size','$level','$start_date')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:index.php?status=success");
    } else {
        header("location:index.php?status=failed");
    }

}
?>


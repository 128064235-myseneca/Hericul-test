<?php
include '../DBConn/DBConnection.php';
require '../DBConn/PHPMailer/PHPMailerAutoload.php';
if(isset($_POST) & !empty($_POST)){

    global $conn;

    $email = $_POST['email'];

    echo $email;
    $sql = "SELECT * FROM admin WHERE email= '$email'";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if($count == 1){
        $r = mysqli_fetch_assoc($res);
        $password = $r['password'];
        $to = $r['email'];
        $subject = "Your Recovered Password";

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
        $mail->addAddress($to);   // Add a recipient

        $mail->isHTML(true);  // Set email format to HTML

        $bodyContent = "Hello Admin,<br><br>";
        $bodyContent .= 'Your login credentials are given below.<br><br>';

        $bodyContent .= "Email: " . $to . " <br>" . "Password: " . $password ;

        $mail->Subject = 'Your Recovered Password';
        $mail->Body    = $bodyContent;
        $mail->send();

        echo 'mail sent';

       header("location:forgotPassword.php?status=success");

    }else{

        header("location:forgotPassword.php?status=failed");

    }
}


?>
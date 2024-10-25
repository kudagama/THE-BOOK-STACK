<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_GET["e"])) {

    $email = $_GET["e"];

    $rs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $email . "' ");
    $n = $rs->num_rows;

    if ($n == 1) {

        $code = uniqid();

        Database::iud("UPDATE `admin` SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "' ");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ravindumaleesha06270107@gmail.com';
        $mail->Password = 'pfarqgtzucyhmytn';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('ravindumaleesha06270107@gmail.com', 'Reset Password');
        $mail->addReplyTo('ravindumaleesha06270107@gmail.com', 'Reset Password');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Forgot Password Verification Code ';
        $bodyContent = '<h3 style="color:black">Hello Admin,</span></h3>
            <h4 style="color:black">Your Verification Code is : <span style="color:red">' . $code . '</span></h4>
            ';
        $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo ("Verification code sending failed");
        } else {
            echo ("Success");
        }
    } else {
        echo ("Invalid Email Address");
    }
}

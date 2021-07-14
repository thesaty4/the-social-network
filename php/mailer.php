<?php
session_start();
      if(isset($_GET['email'])){
        include("../include/database_connection.php");
        $conn = db_conn();
        $email = filter_var($_GET['email'],FILTER_SANITIZE_STRING);
        $obj = mysqli_query($conn,"SELECT email FROM users WHERE email = '$email'");
        if(mysqli_num_rows($obj) != 0){
            echo "<script>window.location.href='../index.php?error=This email id already exist.. Enter another email!';</script>";
        }
        $otp  = mt_rand(1111,9999);
        $_SESSION['otp'] = $otp;
        $email = $_GET['email'];
        $name = "The Social Network";
        $subject = 'Splus Learning : Signup verification OTP !';
        $to      = $email;
        $messages = "Hey Mr ".$arg['fname']." Welcome to Splus learning otp verification ! Please don't share your OPT any where, Be carefull. Your Verification OTP Code is ".$otp." - Thanks for visiting - <br> -Splus Learning";
        $headers  = 'From: TheSocialNetwork.com';
        if(mail($to,$subject,$messages,$headers)){
            echo "<script>window.location.href='../index.php?success=OTP send successfulll. kindly check your email';</script>";
        }else{
            echo "<script>window.location.href='../index.php?error=Opps OTP sending fail try again.!';</script>";
        }
    }
?>
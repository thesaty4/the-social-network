<?php
session_start();
if ( isset( $_POST['signup'] ) ) {
    include( 'function.php' );
    if(isset($_SESSION['otp'])){
        if($_SESSION['otp'] != $_POST['otp']){
            echo "<script>window.location.href='../index.php?error=Opps invalid OTP, please enter valid otp.';</script>";
            // header("location:../index.php?error=Opps invalid OTP, please enter valid otp.");
        }else{
            $_SESSION['otp'] = [];
        }
    }
    // echo "<pre>";
    // print_r($_FILES);
    // print_r($_POST);
    // echo "</pre>";
    $status = data_validate( $_POST );
    if ( $status === true ) {
        $status = data_sanitize( $_POST, $_FILES);
        if ( is_array( $status ) ) {
            include( 'database.php' );
            $status = signup( $status );
            if ( $status === true ) {
                show_success( 'signup_successfull' );
            } else {
                show_error( $status );
            }
        } else {
            show_error( $status );
        }
    } else {
        show_error( $status );
    }
}else{
    echo "<script>window.location.href='../index.php?error=Error : Opps This page not able to open!';</script>";

    // header("location:../index.php?error=Error : Opps This page not able to open!");
}
?>
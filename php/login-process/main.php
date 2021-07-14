<?php
session_start();
    if(isset($_POST['login'])){
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        if($_POST['captcha-code'] != $_POST['input-captcha']){
            header("location:../index.php?error=Error : Please input valid captcha");
        }
        include("function.php");
        $status = validate_data($_POST);
        if($status === true){
            $status = sanitize_data($_POST);
            if(is_array($status)){
                include("database.php");
                $status = login($status);
                if(is_array($status)){
                    $_SESSION['tsn-login'] = $status;
                    log_page($_SESSION['tsn-login']);
                    // echo "<pre>";
                    // print_r($_SESSION['tsn-login']);
                    // echo "</pre>";
                }else{
                    show_error($status);
                }
            }else{
                show_error($status);
            }
        }else{
            show_error($status);
        }
    }
?>
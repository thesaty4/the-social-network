<?php
foreach ($_POST as $key => $value) {
    if($value == ''){
        header("location:profile_update.php?warning=All field required");
    }
}
if($_POST['newPass'] != $_POST['confirmPass']){
    header("location:profile_update.php?warning=New and confirm password should be same..");
}

function filter_data($data){
    return filter_var($data,FILTER_SANITIZE_STRING);
}

include("../../../include/database_connection.php");
$conn = db_conn();
session_start();
$uId = filter_data($_SESSION['tsn-login']['id']);
$newPass = filter_data($_POST['newPass']);
$password = filter_data($_POST['oldPass']);
$obj = mysqli_query($conn,"SELECT `user_id`,`password` FROM `users` WHERE `user_id` = $uId;");
$rows = mysqli_fetch_assoc($obj);
if(password_verify($password,$rows['password'])){
    $pwd = password_hash($newPass,PASSWORD_DEFAULT);
    mysqli_query($conn,"UPDATE `users` SET `password` = '$pwd' WHERE `user_id` = $uId;");
    header("location:profile_update.php?success=Password Changing successfull...");
}else{ 
    // echo "did't match";
    header("location:profile_update.php?error=Old password does't match please try again...");
}
?>
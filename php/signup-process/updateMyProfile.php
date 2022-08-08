<?php
session_start();
include("../../include/database_connection.php");
$conn = db_conn();
$profileLocation = $_SESSION['tsn-login']['profile_location'];
$user_id = $_SESSION['tsn-login']['id'];
foreach ($_POST as $key => $value) {
    if($value == ''){
        echo "<script>window.location.href='profile_update.php';</script>";
        
        // header("location:profile_update.php");
    }
}
function filter_data($data){
    return filter_var($data,FILTER_SANITIZE_STRING);
}

$fname = filter_data($_POST['fname']);
$lname = filter_data($_POST['lname']);
$gender = filter_data($_POST['gender']);
$mobile = filter_data($_POST['mobile']);
$email = filter_data($_POST['email']);
if($_FILES['myfile']['error'] == 0){
    $upload_directory = "profiles/";
    $filename         = $_FILES["myfile"]['name'];
    $upload_directory .= $filename;
    $tmp_dir           = $_FILES['myfile']['tmp_name'];
    $size              = $_FILES['myfile']['size'];
    $ext               = pathinfo($filename, PATHINFO_EXTENSION);
    $upload = move_uploaded_file($tmp_dir,$upload_directory);
    if($ext == 'jpg' OR $ext == 'jpeg' OR $ext == 'png' OR $ext == 'gif'){
        echo $filename;
        if(!$upload){
            if(file_exists($upload_directory)){
                unlink($upload_directory);
            }
            
            echo "<script>window.location.href='profile_update.php?error=Profile uploading problem..';</script>";
            // header("location:profile_update.php?error=Profile uploading problem..");
        }
        
        mysqli_query($conn,"UPDATE `users` SET `filename` = '$filename', `profile_location` = '$upload_directory',`fname` = '$fname', `lname` = '$lname',`gender` = '$gender',`mobile` = '$mobile',`email` = '$email' WHERE `user_id` = $user_id;");
        if(file_exists($profileLocation)){
                unlink($profileLocation);
            }
        $_SESSION['tsn-login']['profile_location'] = $upload_directory;
        echo "<script>window.location.href='../user/pages/profile_update.php?success=Profile Updated successfull...';</script>";
        // header("location:../user/pages/profile_update.php?success=Profile Updated successfull...");
    }else{
            if(file_exists($upload_directory)){
                unlink($upload_directory);
            }
            
            echo "<script>window.location.href='../user/pages/profile_update.php?error=You can Upload only jpeg/jpg/png or gif formate..';</script>";
            // header("location:../user/pages/profile_update.php?error=You can Upload only jpeg/jpg/png or gif formate..");
    }
}else{

    mysqli_query($conn,"UPDATE `users` SET `fname` = '$fname', `lname` = '$lname',`gender` = '$gender',`mobile` = '$mobile',`email` = '$email' WHERE `user_id` = $user_id;");
    echo "<script>window.location.href='../user/pages/profile_update.php?success=Profile Updated successfull...';</script>";
    
    // header("location:../user/pages/profile_update.php?success=Profile Updated successfull...");
}
?>
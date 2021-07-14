<?php
session_start();
if(isset($_SESSION['tsn-login'])){ 
    include("../../../include/database_connection.php");
    $conn = db_conn();
    $title = filter_var($_POST['post-title'],FILTER_SANITIZE_STRING);
    $upload_directory = "ads-img/";
    $filename         = $_FILES["myfile-post"]['name'];
    $upload_directory .= $filename;
    $tmp_dir           = $_FILES['myfile-post']['tmp_name'];
    $size              = $_FILES['myfile-post']['size'];
    $ext               = pathinfo($filename, PATHINFO_EXTENSION);
    $upload = move_uploaded_file($tmp_dir,$upload_directory);
    if($ext == 'jpg' OR $ext == 'jpeg' OR $ext == 'png' OR $ext == 'gif'){
        if(!$upload){
            if(file_exists($upload_directory)){
                unlink($upload_directory);
            }
            header("location:../main.php?error=Profile uploading problem..");
        }
        
        mysqli_query($conn,"INSERT INTO sponsor (sponsor_title,sponsor_img_location) VALUES ('$title','$upload_directory');");
        header("location:../main.php?success=New ads created successfull...");
    }else{
        header("location:../main.php?success=You can only upload jpg/jpeg/png or gif files...");
    }
}else{
    header("location:../../../main.php?error=Unauthorized user..");
}
?>
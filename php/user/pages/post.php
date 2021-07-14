<?php
session_start();
if(isset($_POST['post'])){
    session_start();
    // echo "<pre>";
    // print_r($_FILES);
    // print_r($_POST);
    // echo "</pre>";
    $post_title = filter_var($_POST['post-title'], FILTER_SANITIZE_STRING);
    $category = filter_var($_POST['category'], FILTER_SANITIZE_STRING);
    $mood = filter_var($_POST['mood'], FILTER_SANITIZE_STRING);
    $privacy = filter_var($_POST['privacy'], FILTER_SANITIZE_STRING);
    $upload_directory = "upload-post/";
    $filename         = $_FILES["myfile-post"]['name'];
    $upload_directory .= $filename;
    $tmp_dir           = $_FILES['myfile-post']['tmp_name'];
    $size              = $_FILES['myfile-post']['size'];
    $ext               = pathinfo($filename, PATHINFO_EXTENSION);
    if($ext == 'jpg' OR $ext == 'jpeg' OR $ext == 'png' OR $ext == 'gif'){
        $upload = move_uploaded_file($tmp_dir,$upload_directory);
        if($upload){
            include("../../../include/database_connection.php");
            $conn = db_conn();
            $user_id = $_SESSION['tsn-login']['id'];
            $sql = "INSERT INTO `posts` (`post_title`, `post_filename`, `post_location`,`user_id`,`privacy`,`category`,`mood`) VALUES (?,?,?,?,?,?,?);";
            $stmt = mysqli_prepare($conn,$sql);
            if($stmt){
                mysqli_stmt_bind_param($stmt,'sssisss',$post_title,$filename,$upload_directory,$user_id,$privacy,$category,$mood);
                $saved = mysqli_stmt_execute($stmt);
                if($saved){
                    // ---------------------------------Inserting notification--------------------------------------- 
                    $current_user = $_SESSION['tsn-login']['id'];
                    $postObj = mysqli_query($conn,"SELECT * FROM posts WHERE user_id = $current_user ORDER BY post_id;");
                    $postRows = mysqli_fetch_assoc($postObj);
                    $post_id = $postRows['post_id'];
                    mysqli_query($conn,"INSERT INTO post_notification (user_id,post_id) VALUES ($current_user,$post_id);");

                    // $obj = mysqli_query($conn,"SELECT * FROM notification WHERE user_id = $current_user;");
                    // if(mysqli_num_rows($obj) == 0){
                    //     mysqli_query($conn,"INSERT INTO notification (num_of_notification,user_id) VALUES (1,$current_user);");
                    // }else{
                    //     $rows = mysqli_fetch_assoc($obj);
                    //     $num_of_notification = $rows['num_of_notification'];
                    //     $num_of_notification = $num_of_notification + 1;
                    //     $usrId  = $rows['user_id'];
                    //     mysqli_query($conn,"UPDATE notification SET num_of_notification = $num_of_notification WHERE user_id = $usrId;");
                    // }
                    // ----------------------------------------------------------------------------------------------
                    
                    header("location:../main.php?success=Your post has been uploaded.");
                }else{
                    if(file_exists($upload_directory)){
                        unlink($upload_directory);
                    }
                }
            }else{
                echo "inserting problem";
                if(file_exists($upload_directory)){
                    unlink($upload_directory);
                }
            }
        }
    }else{
        header("location:../main.php?error=Warning : You can upload only jpg/jpeg/png/gif file only !");
    }
}else{
    header("location:../user/main.php?error=Error404 : Unautorized access!");
}
?>
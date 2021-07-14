<?php
    include("../../include/database_connection.php");
    function signup($arg){
        include("../mailer.php");
        $conn         = db_conn();
        $filename = $arg['filename'];
        $tmp_dir = $arg['tmp_dir'];
        $upload_directory = $arg['upload_directory'];
        $upload = move_uploaded_file($tmp_dir,$upload_directory);
        if($upload){

            // $sql = "INSERT INTO `posts` (`post_title`, `post_filename`, `post_location`,`user_id`) VALUES (?,?,?,?);";
            // $stmt = mysqli_prepare($conn,$sql);
            // if($stmt){
            //     mysqli_stmt_bind_param($stmt,'sssi',$post_title,$filename,$upload_directory,$user_id);
            //     $saved = mysqli_stmt_execute($stmt);
            //     if($saved){
            //         header("location:../main.php?success=Your post has been uploaded.");
            //     }else{
            //         if(file_exists($upload_directory)){
            //             unlink($upload_directory);
            //         }
            //     }
            // }else{
            //     echo "inserting problem";
            //     if(file_exists($upload_directory)){
            //         unlink($upload_directory);
            //     }
            // }
            
            
            
            $sql          = "INSERT INTO `users` (`filename`,`profile_location`,`fname`,`lname`,`gender`,`country_code`,`mobile`,`email`,`password`) VALUES (?,?,?,?,?,?,?,?,?);";
            $stmt         = mysqli_prepare($conn,$sql);
            if(!$stmt){
            mysqli_stmt_close($stmt);
            if(file_exists($upload_directory)){
                unlink($upload_directory);
            }
            return 'stmt_error';
        }
        mysqli_stmt_bind_param($stmt,'sssssssss',$filename,$upload_directory,$arg['fname'],$arg['lname'],$arg['gender'],$arg['country_code'],$arg['mobile'],$arg['email'],$arg['password']);
        $stmt_status =  mysqli_stmt_execute($stmt);
        if(!$stmt_status){
            mysqli_stmt_close($stmt);
            if(file_exists($upload_directory)){
                unlink($upload_directory);
            }
            return 'stmt_not_execute';
        }
        mysqli_stmt_close($stmt);
        return true;
        }else{
            if(file_exists($upload_directory)){
                unlink($upload_directory);
            }
        }
        
    }
?>
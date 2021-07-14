<?php
     if(isset($_POST['like']) OR isset($_POST['like_in_profile']) OR isset($_POST['like_in_education']) OR isset($_POST['like_in_nature']) OR isset($_POST['like_in_style']) OR isset($_POST['like_in_sad']) OR isset($_POST['like_in_emotional']) OR isset($_POST['like_in_happy']) OR isset($_POST['like_in_romantic']) OR isset($_POST['like_in_cricket']) OR isset($_POST['like_in_animals'])){
        $current_user = $_SESSION['tsn-login']['id'];
        // echo $current_user;
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        foreach ($_POST as $key => $value) {
            if($value == ''){
                echo "<script>window.location.href='main.php?error=Error : Unexpected data..!';</script>";
            }
        }
        $id_counter = filter_data($_POST['post_id']);
        $post_id = filter_data($_POST['post_id']);


        // Push notification for user
        $usrIdObj = mysqli_query($conn,"SELECT * FROM posts WHERE post_id = $post_id GROUP BY user_id;");
        $usrIdRow     = mysqli_fetch_assoc($usrIdObj);
        $usrId = $usrIdRow['user_id'];
        $notificationobj = mysqli_query($conn,"SELECT * FROM notification WHERE user_id = $usrId;");
        if(mysqli_num_rows($notificationobj) == 0){
            mysqli_query($conn,"INSERT INTO notification (num_of_notification,user_id) VALUES ('1',$usrId);");
        }else{
            $noti_rows = mysqli_fetch_assoc($notificationobj);
            $num_of_notification = $noti_rows['num_of_notification'] + 1;
            mysqli_query($conn,"UPDATE notification SET num_of_notification = $num_of_notification WHERE user_id = $usrId;");
        }
        //---------------------------------------------


        $obj = mysqli_query($conn,"SELECT * FROM `likes` WHERE `user_id` = $current_user AND `post_id` = $post_id;");
        if(mysqli_num_rows($obj) == 0){
            $query = "INSERT INTO `likes` (`user_id`,`post_id`) VALUES ('$current_user','$post_id');";
            mysqli_query($conn,$query);

            // header("location:main.php#".$id_counter);
            if(isset($_POST['like_in_profile'])){
                $user_id = filter_data($_POST['profile_id']);
                echo "<script>window.location.href='main.php?profile=".$user_id."#".$id_counter."';</script>";
            }else if(isset($_POST['like_in_education'])){
                echo "<script>window.location.href='main.php?education#".$id_counter."';</script>";
            }else if(isset($_POST['like_in_nature'])){
                echo "<script>window.location.href='main.php?nature#".$id_counter."';</script>";
            }else if(isset($_POST['like_in_style'])){
                echo "<script>window.location.href='main.php?style#".$id_counter."';</script>";
            }else if(isset($_POST['like_in_sad'])){
                echo "<script>window.location.href='main.php?sad#".$id_counter."';</script>";
            }else if(isset($_POST['like_in_emotional'])){
                echo "<script>window.location.href='main.php?emotional#".$id_counter."';</script>";
            }else if(isset($_POST['like_in_happy'])){
                echo "<script>window.location.href='main.php?happy#".$id_counter."';</script>";
            }else if(isset($_POST['like_in_romantic'])){
                echo "<script>window.location.href='main.php?romantic#".$id_counter."';</script>";
            }else if(isset($_POST['like_in_cricket'])){
                echo "<script>window.location.href='main.php?cricket#".$id_counter."';</script>";
            }else if(isset($_POST['like_in_animals'])){
                echo "<script>window.location.href='main.php?animals#".$id_counter."';</script>";
            }else{
                echo "<script>window.location.href='main.php?home#".$id_counter."';</script>";
            }
        }
    }
    if(isset($_POST['unlike']) OR isset($_POST['unlike_in_profile']) OR isset($_POST['unlike_in_education']) OR isset($_POST['unlike_in_nature']) OR isset($_POST['unlike_in_style']) OR isset($_POST['unlike_in_sad']) OR isset($_POST['unlike_in_emotional']) OR isset($_POST['unlike_in_happy']) OR isset($_POST['unlike_in_romantic']) OR isset($_POST['unlike_in_cricket']) OR isset($_POST['unlike_in_animals'])){
        $current_user = $_SESSION['tsn-login']['id'];
        // echo $current_user;
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        foreach ($_POST as $key => $value) {
            if($value == ''){
                echo "<script>window.location.href='main.php?error=Error : Unexpected data..!';</script>";
            }
        }
        $id_counter = filter_data($_POST['post_id']);
        $post_id = filter_data($_POST['post_id']);
        
        // Pop notification for user
        $usrIdObj = mysqli_query($conn,"SELECT * FROM posts WHERE post_id = $post_id GROUP BY user_id;");
        $usrIdRow     = mysqli_fetch_assoc($usrIdObj);
        $usrId = $usrIdRow['user_id'];
        $notificationobj = mysqli_query($conn,"SELECT * FROM notification WHERE user_id = $usrId;");
        $noti_rows = mysqli_fetch_assoc($notificationobj);

        // $likeCheckSee = mysqli_query($conn,"SELECT * FROM likes WHERE user_id = $current_user AND post_id = $post_id;");
        if($noti_rows['num_of_notification'] > 0){
            $num_of_notification = $noti_rows['num_of_notification'] - 1;
            mysqli_query($conn,"UPDATE notification SET num_of_notification = $num_of_notification WHERE user_id = $usrId;");
        }
        //---------------------------------------------


        // $obj = mysqli_query($conn,"SELECT * FROM `likes` WHERE `user_id` = $current_user AND `post_id` = $post_id;");
        // if(mysqli_num_rows() != 0){
            $query = "DELETE FROM likes WHERE `user_id` = $current_user AND `post_id` = $post_id;";
            mysqli_query($conn,$query);
            if(isset($_POST['unlike_in_profile'])){
                $user_id = filter_data($_POST['profile_id']);
                echo "<script>window.location.href='main.php?profile=".$user_id."#".$id_counter."';</script>";
            }else if(isset($_POST['unlike_in_education'])){
                echo "<script>window.location.href='main.php?education#".$id_counter."';</script>";
            }else if(isset($_POST['unlike_in_nature'])){
                echo "<script>window.location.href='main.php?nature#".$id_counter."';</script>";
            }else if(isset($_POST['unlike_in_style'])){
                echo "<script>window.location.href='main.php?style#".$id_counter."';</script>";
            }else if(isset($_POST['unlike_in_sad'])){
                echo "<script>window.location.href='main.php?sad#".$id_counter."';</script>";
            }else if(isset($_POST['unlike_in_emotional'])){
                echo "<script>window.location.href='main.php?emotional#".$id_counter."';</script>";
            }else if(isset($_POST['unlike_in_happy'])){
                echo "<script>window.location.href='main.php?happy#".$id_counter."';</script>";
            }else if(isset($_POST['unlike_in_romantic'])){
                echo "<script>window.location.href='main.php?romantic#".$id_counter."';</script>";
            }else if(isset($_POST['unlike_in_cricket'])){
                echo "<script>window.location.href='main.php?cricket#".$id_counter."';</script>";
            }else if(isset($_POST['unlike_in_animals'])){
                echo "<script>window.location.href='main.php?animals#".$id_counter."';</script>";
            }else{
                echo "<script>window.location.href='main.php?home#".$id_counter."';</script>";
            }
    }
?>
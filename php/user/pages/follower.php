<?php
 if(isset($_POST['follow'])){
    $return_id = filter_data($_POST['id']);
    $query = filter_data($_POST['query']);
    $followed_by = filter_data($_POST['followed_by']);
    $follow_user = filter_data($_POST['follow_user']);

    // One Notification pushed
    $obj = mysqli_query($conn,"SELECT * FROM notification WHERE user_id = $follow_user;");
    $rows = mysqli_fetch_assoc($obj);
    if(mysqli_num_rows($obj) == 0){
        mysqli_query($conn,"INSERT INTO notification (num_of_notification,user_id) VALUES ('1',$follow_user);");
    }else{
        $num_of_notification = $rows['num_of_notification'] + 1;
        mysqli_query($conn,"UPDATE notification SET num_of_notification = $num_of_notification WHERE user_id = $follow_user;");
    }

    $obj = mysqli_query($conn,"SELECT * FROM follower_manage WHERE followed_by = $followed_by AND follow_user = $follow_user;");
    if(mysqli_num_rows($obj) != 0){
        if(isset($_POST['unfollowProfile'])){
            echo "<script>window.location.href='main.php?profile=".$query.";</script>";
        }
        echo "<script>window.location.href='main.php?search=".$query."';</script>";
    }else{
        $sql = "INSERT INTO follower_manage (followed_by,follow_user) VALUES ($followed_by,$follow_user);";
        mysqli_query($conn,$sql);
        if(isset($_POST['followFromList'])){
            echo "<script>window.location.href='main.php?followerList=".$return_id."#".$query."';</script>";
        }
        if(isset($_POST['followedFromList'])){
            echo "<script>window.location.href='main.php?followedList=".$return_id."#".$query."';</script>";
        }
        if(isset($_POST['followFromNotification'])){
            echo "<script>window.location.href='main.php?notification"."#".$return_id."';</script>";
        }
        if(isset($_POST['request'])){
            echo "<script>window.location.href='main.php?request"."#".$return_id."';</script>";
        }
        if(isset($_POST['followProfile'])){
            echo "<script>window.location.href='main.php?profile=".$query."';</script>";
        }
        echo "<script>window.location.href='main.php?search=".$query."#".$return_id."';</script>";
    }
}

if(isset($_POST['unfollow'])){
    $return_id = filter_data($_POST['id']);
    $query = filter_data($_POST['query']);
    $unfollowed_by = filter_data($_POST['unfollowed_by']);
    $unfollow_user = filter_data($_POST['unfollow_user']);
     // One Notification Pop
     $obj = mysqli_query($conn,"SELECT * FROM notification WHERE user_id = $unfollow_user;");
     $rows = mysqli_fetch_assoc($obj);
     $num_of_notification = $rows['num_of_notification'] - 1;
     mysqli_query($conn,"UPDATE notification SET num_of_notification = $num_of_notification WHERE user_id = $unfollow_user;");
 
 
    $obj = mysqli_query($conn,"SELECT * FROM follower_manage WHERE followed_by = $unfollowed_by AND follow_user = $unfollow_user;");
    if(mysqli_num_rows($obj) == 0){
        if(isset($_POST['deleteRequest']) OR isset($_POST['deleteFromNotification'])){
            $sql = "DELETE FROM follower_manage WHERE followed_by = $unfollow_user AND follow_user = $unfollowed_by;";
            mysqli_query($conn,$sql);
        }

        if(isset($_POST['deleteProfile'])){
            echo "<script>window.location.href='main.php?profile=".$query."';</script>";
        }

        if(isset($_POST['unfollowFromList'])){
            echo "<script>window.location.href='main.php?followerList=".$return_id."#".$query."';</script>";
        }
        if(isset($_POST['unfollowedFromList'])){
            echo "<script>window.location.href='main.php?followedList=".$return_id."#".$query."';</script>";
        }
        if(isset($_POST['deleteFromNotification'])){
            echo "<script>window.location.href='main.php?notification"."#".$return_id."';</script>";
        }
        // echo "<script>window.location.href='main.php?search=".$query."';</script>";
    }else{
        $sql = "DELETE FROM follower_manage WHERE followed_by = $unfollowed_by AND follow_user = $unfollow_user;";
        mysqli_query($conn,$sql);
        
        if(isset($_POST['unfollowProfile'])){
            echo "<script>window.location.href='main.php?profile=".$query.";</script>";
        }
        if(isset($_POST['unfollowFromList'])){
            echo "<script>window.location.href='main.php?followerList=".$return_id."#".$query."';</script>";
        }
        if(isset($_POST['unfollowedFromList'])){
            echo "<script>window.location.href='main.php?followedList=".$return_id."#".$query."';</script>";
        }
        if(isset($_POST['deleteRequestFromRequest'])){
            echo "<script>window.location.href='main.php?request"."#".$return_id."';</script>";
        }if(isset($_POST['request'])){
            echo "<script>window.location.href='main.php?request"."#".$return_id."';</script>";
        }if(isset($_POST['unfollowProfile'])){
            echo "<script>window.location.href='main.php?profile=".$query."';</script>";
        }
        echo "<script>window.location.href='main.php?search=".$query."#".$return_id."';</script>";
    }
}
?>
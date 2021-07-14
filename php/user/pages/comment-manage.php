<?php
// comment on post
if(isset($_POST['comment'])){
    foreach ($_POST as $key => $value) {
        if($value == ''){
            echo "<script>window.location.href='main.php?warning=Warning : Comments field required';</script>";
        }
    }

    $user_id = filter_data($_POST['user_id']);
    $post_id = filter_data($_POST['post_id']);
    $comment = filter_data($_POST['comment']);

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

    $query = "INSERT INTO `comments` (`comment`,`user_id`,`post_id`) VALUES ('$comment','$user_id','$post_id');";
    mysqli_query($conn,$query);
    echo "<script>window.location.href='main.php?comment=".$post_id."';</script>";
}


// delete comment

if(isset($_GET['deleteComment'])){
    if($_GET['deleteComment'] == ''){
        echo "<script>window.location.href='main.php';</script>";
    }
    $commentId = filter_data($_GET['deleteComment']);

      // Pop notification for user
      $commentObj = mysqli_query($conn,"SELECT * FROM comments WHERE comment_id = $commentId;");
      $dataRow = mysqli_fetch_assoc($commentObj);
      $post_id = $dataRow['post_id'];
      $usrIdObj = mysqli_query($conn,"SELECT * FROM posts WHERE post_id = $post_id GROUP BY user_id;");
      $usrIdRow     = mysqli_fetch_assoc($usrIdObj);
      $usrId = $usrIdRow['user_id'];
      $notificationobj = mysqli_query($conn,"SELECT * FROM notification WHERE user_id = $usrId;");
      $noti_rows = mysqli_fetch_assoc($notificationobj);
      if($noti_rows['num_of_notification'] > 0){
        $num_of_notification = $noti_rows['num_of_notification'] - 1;
        mysqli_query($conn,"UPDATE notification SET num_of_notification = $num_of_notification WHERE user_id = $usrId;");
      }
      //---------------------------------------------

      
    $comment_obj = mysqli_query($conn,"SELECT * FROM comments WHERE comment_id = $commentId;");
    if(mysqli_num_rows($comment_obj) == 0){
        echo "<script>window.location.href='main.php?error=Unexpected data...';</script>";
    }else{
        $post_id = $_GET['delete_post_id'];
        mysqli_query($conn,"DELETE FROM comments WHERE comment_id = $commentId");
        echo "<script>window.location.href=('main.php?comment=".$post_id."#".$commentId."');</script>";
        // header("main.php?comment=".$post_id);
    }
}
?>
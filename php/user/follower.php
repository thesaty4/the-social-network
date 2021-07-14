<?php

if(isset($_POST['follow'])){
    $followed_by = filter_var($_POST['followed_by'],FILTER_SANITIZE_STRING);
    $follow = filter_var($_POST['follow_user'],FILTER_SANITIZE_STRING);
    $obj = mysqli_query($conn,"SELECT * FROM `follower_manage` WHERE `followed_by` = '$followed_by' AND  `follow_user` = '$follow';");
    if(mysqli_num_rows($obj) == 0){
        $query = filter_var($_POST['query'],FILTER_SANITIZE_STRING);
        $sql   = "INSERT INTO `follower_manage` (`followed_by`,`follow_user`) VALUES (?,?);";
        $stmt = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,'ii',$followed_by,$follow);
        $result = mysqli_stmt_execute($stmt);
        if($result){
            echo "<script>window.location.href='main.php?search=".$query."';</script>";
            // header('location:main.php?search='.$query);
        }else{
            echo "<script>window.location.href='main.php?error= Error 404 :( ';</script>";
        }
        // echo mysqli_num_rows($obj);
    }
}
if(isset($_POST['unfollow'])){
    $followed_by = filter_var($_POST['followed_by'],FILTER_SANITIZE_STRING);
    $follow = filter_var($_POST['follow_user'],FILTER_SANITIZE_STRING);
    $query = filter_var($_POST['query'],FILTER_SANITIZE_STRING);
    $sql   = "DELETE FROM `follower_manage` WHERE `followed_by` = '$followed_by' AND  `follow_user` = '$follow';";
    $result = mysqli_query($conn,$sql);
    if(!$result){
        echo "<script>window.location.href='main.php?error= Error 404 :( ';</script>";
    }
    echo "<script>window.location.href='main.php?search=".$query."';</script>";
}

?>
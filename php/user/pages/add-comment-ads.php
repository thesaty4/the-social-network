<?php
session_start();
if(isset($_SESSION['tsn-login'])){
    include("../../../include/database_connection.php");
    $conn = db_conn();
    $userId = filter_var($_POST['user_id'],FILTER_SANITIZE_STRING);
    $sponsorId = filter_var($_POST['sponsor_id'],FILTER_SANITIZE_STRING);
    $comment = filter_var($_POST['comment'],FILTER_SANITIZE_STRING);
    mysqli_query($conn,"INSERT INTO sponsor_comments (user_id,sponsor_id,comment) VALUES ($userId,$sponsorId,'$comment')");
    echo "<script>window.location.href='../main.php?Adscomment=".$sponsorId."';</script>";
   
    // header("location:../main.php?Adscomment=".$sponsorId);
}
?>
<?php
session_start();
if(isset($_SESSION['tsn-login'])){
    include("../../../include/database_connection.php");
    $conn = db_conn();
    $cUser = $_SESSION['tsn-login']['id'];
    $sponsorId = filter_var($_GET['like'],FILTER_SANITIZE_STRING);
    $obj = mysqli_query($conn,"SELECT * FROM sponsor_likes WHERE user_id = $cUser AND sponsor_id = $sponsorId");
    if(mysqli_num_rows($obj) == 0){
        mysqli_query($conn,"INSERT INTO sponsor_likes(user_id,sponsor_id) VALUES ($cUser,$sponsorId);");
    }else{
        mysqli_query($conn,"DELETE FROM sponsor_likes WHERE user_id = $cUser AND sponsor_id = $sponsorId");
    }
    header("location:../main.php?home");
}
?>
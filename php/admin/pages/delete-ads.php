<?php
session_start();
if(isset($_SESSION['tsn-login'])){
    include("../../../include/database_connection.php");
    $conn = db_conn();
    $id = filter_var($_GET['id'],FILTER_SANITIZE_STRING);
    $obj = mysqli_query($conn,"SELECT * FROM sponsor WHERE sponsor_id = $id");
    $rows = mysqli_fetch_assoc($obj);
    if(file_exists($rows['sponsor_img_location'])){
        unlink($rows['sponsor_img_location']);
    }
    mysqli_query($conn,"DELETE FROM sponsor WHERE sponsor_id = $id");
    mysqli_query($conn,"DELETE FROM sponsor_likes WHERE sponsor_id = $id");
    mysqli_query($conn,"DELETE FROM sponsor_comments WHERE sponsor_id = $id");
    header("location:../main.php?home");
}
?>
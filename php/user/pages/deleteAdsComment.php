<?php
session_start();
if(isset($_SESSION['tsn-login'])){
    include("../../../include/database_connection.php");
    $commentId = $_POST['deleteComment'];
    $id        = $_POST['delete_sponsor_id'];
    $conn = db_conn();
    mysqli_query($conn,"DELETE FROM sponsor_comments WHERE comment_id = $commentId");
    header("location:../main.php?Adscomment=".$id);
}
?>
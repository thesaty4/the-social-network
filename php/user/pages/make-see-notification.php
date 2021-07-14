<?php
session_start();
include("../../../include/database_connection.php");
$conn = db_conn();
$uId = $_SESSION['tsn-login']['id'];
$obj = mysqli_query($conn,"SELECT * FROM posts WHERE user_id = $uId;");
while($rows = mysqli_fetch_assoc($obj)){
    $post_id = $rows['post_id'];
    mysqli_query($conn,"UPDATE notification SET num_of_notification = TRUE WHERE post_id = $post_id;");
    mysqli_query($conn,"UPDATE likes SET is_seen = TRUE WHERE post_id = $post_id;");
}
mysqli_query($conn,"UPDATE comments SET is_seen = TRUE WHERE user_id = $uId;");
// echo $uId;
header("location:../main.php?notification");
?>
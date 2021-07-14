<?php
session_start();
include("../../../include/database_connection.php");
$conn = db_conn();
$current_user = $_SESSION['tsn-login']['id'];
$obj = mysqli_query($conn,"SELECT * FROM notification WHERE user_id = $current_user;");
$rows = mysqli_fetch_assoc($obj);
if($rows['num_of_notification'] != 0){
    echo "<tag class='text-light position-absolute bg-danger' style='height:17px; width:17px; border-radius:50%; border:1px solid #1686e0; margin-left:-10px; margin-top:-1px; font-size: 10px;'>".$rows['num_of_notification']."</tag>";
}
?>
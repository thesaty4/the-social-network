<?php
session_start();
function filter_data($arg){
    $data = filter_var($arg,FILTER_SANITIZE_STRING);
    return $data;
}
include("../../../include/database_connection.php");
$conn = db_conn();

$userId = $_SESSION['tsn-login']['id'];
if(isset($_POST['submitReport'])){
    foreach ($_POST as $key => $value) {
        if($value == ''){
            header("location:../main.php?report=".$userId);
        }
    }
}

$report = filter_data($_POST['report']);
$category = filter_data($_POST['reportCategory']);

mysqli_query($conn,"INSERT INTO report (user_id,report,category) VALUES ($userId,'$report','$category');");
header("location:../main.php?success=You have successfully reported");
?>
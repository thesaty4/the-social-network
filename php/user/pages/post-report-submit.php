<?php
session_start();
function filter_data($arg){
    $data = filter_var($arg,FILTER_SANITIZE_STRING);
    return $data;
}
include("../../../include/database_connection.php");
$conn = db_conn();

$userId = $_SESSION['tsn-login']['id'];
if(isset($_POST['postReport'])){
    foreach ($_POST as $key => $value) {
        if($value == ''){
            echo "<script>window.location.href='../main.php?report=".$userId."';</script>";
            
            // header("location:../main.php?report=".$userId);
        }
    }
}

echo $report = filter_data($_POST['report']);
echo $category = filter_data($_POST['reportCategory']);
echo $postId =   filter_data($_POST['postReport']);

mysqli_query($conn,"INSERT INTO `post_report` (`user_id`,`post_id`,`report`,`category`) VALUES ('$userId','$postId','$report','$category');");

echo "<script>window.location.href='../main.php?success=You have successfully reported';</script>";
// header("location:../main.php?success=You have successfully reported");
?>
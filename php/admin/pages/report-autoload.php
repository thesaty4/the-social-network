<?php
include("../../../include/database_connection.php");
$conn = db_conn();
$obj = mysqli_query($conn,"SELECT * FROM report WHERE is_seen = 0");
$numOfReport = mysqli_num_rows($obj);
$obj = mysqli_query($conn,"SELECT * FROM post_report WHERE is_seen = 0");
$numOfPostReport = mysqli_num_rows($obj);

$totalReport = $numOfPostReport + $numOfReport;
if($totalReport != 0){
    echo "<tag class='position-absolute bg-danger' style='height:17px; width:17px; border-radius:50%; border:1px solid #1686e0; margin-left:-8px; font-size: 10px;'>".$totalReport."</tag>";
}
?>
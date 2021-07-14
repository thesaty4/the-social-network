<?php
print_r($_POST);
include("../../../include/database_connection.php");
$conn = db_conn();
include("../../../include/filter-data.php");
$id = filter_data($_POST['user_id']);
$status = filter_data($_POST['status']);
if($status == 'active'){
    $status = 'deactive';
}else{
    $status = 'active';
}
$obj = mysqli_query($conn,"UPDATE users SET status = '$status' WHERE user_id = $id");
header("location:../main.php?users");
?>
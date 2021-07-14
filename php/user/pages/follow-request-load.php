<?php     
session_start();
include("../../../include/database_connection.php");
$conn = db_conn();
$current_user = $_SESSION['tsn-login']['id'];
$obj = mysqli_query($conn,"SELECT * FROM users ORDER BY c_date DESC");
$num_request = 0;
echo "<div class='table-responsive text-center mt-2'>
        <table class='table table-hover w-100'>";
while($rows = mysqli_fetch_assoc($obj)){

      $user_id = $rows['user_id'];
      $follow_1 = mysqli_query($conn,"SELECT * FROM follower_manage WHERE followed_by = $current_user AND follow_user = $user_id");
      $follow_2 = mysqli_query($conn,"SELECT * FROM follower_manage WHERE followed_by = $user_id AND follow_user = $current_user");
      
      $follow_value1 = mysqli_num_rows($follow_1);
      $follow_value2 = mysqli_num_rows($follow_2);
    
      if($follow_value1 == 0 AND $follow_value2 == 1){
          // Follow request...............
          $num_request += 1;
      }
  }
  if($num_request != 0){
    echo "<tag class='position-absolute bg-danger' style='height:17px; width:17px; border-radius:50%; border:1px solid #1686e0; margin-left:-9px; margin-top:-7px; font-size: 10px;'>".$num_request."</tag>";
  }
    // .................................................................................

?>

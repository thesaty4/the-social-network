<?php
     session_start();
     function filter_data($arg){
         $data = filter_var($arg,FILTER_SANITIZE_STRING);
         return $data;
     }
     $current_user = $_SESSION['tsn-login']['id'];
     
     include("../../../include/database_connection.php");
     $conn = db_conn();
    $query_obj = mysqli_query($conn,"SELECT * FROM `chat_manage` WHERE `user_id` = '$current_user' OR `chat_with` = '$current_user' ORDER BY `chat_id` DESC;");
    
    $seen = 0;
    $unseen = 0;
    while($chat_data = mysqli_fetch_assoc($query_obj)){
   
    // echo mysqli_num_rows($query_ob
        if($chat_data['user_id'] != $current_user){
            if($chat_data['is_seen'] == 0){
                $unseen += 1;
                // $seen = "<i class='fas fa-check'></i>";
            }else{
                $seen += 1;
                // $seen = "<i class='fas fa-eye text-primary'></i>";
            }
        }
    }
    if($unseen != 0){
        echo "<span class='bg-danger text-light position-absolute font-weight-bold;' style='height:17px; width:17px; border-radius:50%; border:1px solid #1686e0; margin-left:-9px; font-size: 10px;'>".$unseen."</span>";
    }
?>
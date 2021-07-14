<?php
 session_start();
 function filter_data($arg){
     $data = filter_var($arg,FILTER_SANITIZE_STRING);
     return $data;
 }
 $current_user = $_SESSION['tsn-login']['id'];
 
 include("../../../include/database_connection.php");
 $conn = db_conn();
$obj = mysqli_query($conn,"SELECT `c`.*, `u`.`user_id`,`u`.`filename`,`u`.`profile_location`,`u`.`fname`,`u`.`lname` FROM `users` AS `u` INNER JOIN `chat_manage` AS `c` ON `u`.`user_id` = `c`.`user_id` WHERE `c`.`user_id` = '$current_user' OR `c`.`chat_with` = '$current_user' GROUP BY `c`.`user_id`");
if(mysqli_num_rows($obj) == 0){
    echo "<div class='d-flex justify-content-center align-items-center' style='height:85vh;'>
    <span class='fa-1x'><i class='fas fa-search'></i> No Conversation Availabel</span>
</div>";
}
echo "<div class='row'>
        <table class='table table-hover text-center text-capitalize'>";
        if(isset($_GET['chatwith'])){
        echo "<div class='col-12 text-center font-cambria bg-dark text-light p-2'>User's </div>";
        }
    
            while($rows = mysqli_fetch_assoc($obj)){
                if($rows['user_id'] != $current_user){
                    $user_id = $rows['user_id'];
                    $query_obj = mysqli_query($conn,"SELECT * FROM `chat_manage` WHERE `user_id` = '$user_id' AND `chat_with` = '$current_user' OR `user_id` = '$current_user' AND `chat_with` = '$user_id' ORDER BY `chat_id` DESC;");
                    $chat_data = mysqli_fetch_assoc($query_obj);
                   
                    if($chat_data['user_id'] == $current_user){
                        if($chat_data['is_seen'] == 0){
                            $seen = "<i class='fas fa-check'></i>";
                            $messageIcon = "<i class='far fa-comment-dots text-primary h4'></i>";
                            $text_color = '';
                            $trColor = '';
                        }else{
                            $seen = "<i class='fas fa-eye text-primary'></i>";
                            $messageIcon = "<i class='far fa-comment-dots text-primary h4'></i>";
                            $text_color = '';
                            $trColor = '';
                        }
                    }else{
                        if($chat_data['is_seen'] == 0){
                            // $unseenObj = mysqli_query($conn,"SELECT * FROM `chat_manage` WHERE `user_id` = $user_id GROUP BY `chat_with`");
                            // echo mysqli_num_rows($unseenObj);
                            $seen = "<i class='fas fa-circle text-danger'></i>";
                            $messageIcon = "<i class='far fa-comment-dots text-danger h4'></i>";
                            $text_color = 'text-primary font-weight-bold';
                            $trColor = 'background-color:#cccc;';
                        }else{
                            $seen = '';
                            $messageIcon = "<i class='far fa-comment-dots text-primary h4'></i>";
                            $text_color = '';
                            $trColor = '';
                            }
                    }
                            echo "<tr style='".$trColor."'>
                            <td><div><a href='main.php?profile=".$user_id."'> <img src='../signup-process/profiles/".$rows['filename']."' alt='Profile' style='border-radius:50%; width:40px; height:40px; box-shadow:0px 0px 2px black; border:2px solid gray;'></a></div></td>
                            <td style='letter-spacing:1px; font-family:Rockwell;'><a href='main.php?chatwith=".$user_id."' class='text-dark' style='text-decoration:none;'><p class='text-left font-weight-bold'>".$rows['fname']." ".$rows['lname']."</p>
                                <p style='font-size:13px;' class='text-left ".$text_color."'>".$seen." ".$chat_data['chat']." <i class='far fa-clock text-dark' style='font-size:11px;'>".$rows['c_time']."</i> </p></a>
                            </td>
                            <td><div class='btn-group'>"; 
                            echo "<a href='main.php?chatwith=".$user_id."'>".$messageIcon."</a>";
                    echo "</div></td>    
                    </tr>";
                }
            }

            echo "</table>
            </div>";

?>
<?php
 session_start();
 function filter_data($arg){
     $data = filter_var($arg,FILTER_SANITIZE_STRING);
     return $data;
 }
 $current_user = $_SESSION['tsn-login']['id'];
 
 include("../../../include/database_connection.php");
 $conn = db_conn();
$chatWithUser = filter_data($_GET['chatwith']);
// if($current_user == $chatWithUser){
    $update_seen = mysqli_query($conn,"UPDATE `chat_manage` SET `is_seen` = 1 WHERE `user_id` = $chatWithUser AND `chat_with` = $current_user;");
// }

$obj = mysqli_query($conn,"SELECT `user_id`,`filename`,`profile_location`,`fname`,`lname` FROM `users` WHERE `user_id` = $chatWithUser;");
$rows = mysqli_fetch_assoc($obj);

$chat_obj = mysqli_query($conn,"SELECT * FROM `chat_manage` WHERE `user_id` = $current_user AND `chat_with` = $chatWithUser OR `user_id` = $chatWithUser AND `chat_with` = $current_user;");
if(mysqli_num_rows($chat_obj) == 0){
    echo "<div class='col-12 d-flex justify-content-center align-items-center' style='height:80vh;'><i class='fas fa-envelope'></i> &nbsp;No Conversation Available...</div>";
}else{
    echo "<br><br>";
    
    echo "<div class='position-relative'><a href='main.php?deleteAllmessage=".$chatWithUser."' class='btn btn-danger btn-block'><i class='far fa-trash-alt'></i> Delete My Conversation</a>";
    while($message = mysqli_fetch_assoc($chat_obj)){
        echo "<div style='font-size:14px;' class='clearfix'>";
            if($message['user_id'] == $current_user){
                if($message['chat'] == 'This message was Deleted'){
                    $messages = "<i class='far fa-clock'></i> ".$message['chat'];
                }else{
                    $messages = $message['chat'];
                }
                if($message['is_seen'] == 0){
                    $seen = "<i class='fas fa-check'></i>";
                }else{
                    $seen = "<i class='fas fa-eye text-primary'></i>";
                }
                echo "
                    <div class='w-100'>
                        <div class='col-md-7 col-9 ml-auto text-right mt-3'><span class='bg-info text-center px-3 py-2 float-right button-none font-cambria-math' style='border-radius:10px 0px 0px 10px;background-color:gray; height:auto; box-shadow:0px 0px 2px black;'>".$messages."</span>
                            <div class='col-12 mt-1 float-right' style='font-size:12px;'>
                            <form action='main.php' method='post'>
                            ".$seen."
                            <i class='far fa-clock'></i> ".$message['c_time']."
                                    <input type='text' name='chatWith' value='".$chatWithUser."' hidden>
                                    <input type='text' name='id_counter' value='".$message['chat_id']."' hidden>
                                    <button type='submit' class='button-none' name='chat_delete' value='".$message['chat_id']."' disable> <i class='fas fa-trash'></i></button>
                                </form>
                            </div>
                        </div>
                    </div>";
            }else{
                if($message['chat'] == 'This message was Deleted'){
                    $messages = "<i class='far fa-clock'></i> ".$message['chat'];
                }else{
                    $messages = $message['chat'];
                }
                echo "
                <div class='w-100'>
                    <div class='col-md-7 col-9 mr-auto text-left mt-3' ><button class='px-3 py-2 text-center bg-aqua font-cambria-math button-none' style='border-radius:0px 10px 10px 0px;background-color:#ccc; box-shadow:0px 0px 2px black;' id='".$message['chat_id']."'>".$messages."</button>
                    <div class='col-12 mt-1' style='font-size:12px;'>
                        <i class='far fa-clock'></i> ".$message['c_time']."
                    </div>
                </div>";
            }
        echo "</div>";
    }
    echo "</div>";
}
?>
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
      // function followTime($data){
      //     return 
      // }

      if($follow_value1 == 0 AND $follow_value2 == 1){
          // Follow request...............
          echo "<tr>
          <td><div><a href='main.php?profile=".$user_id."'> <img src='../signup-process/profiles/".$rows['filename']."' alt='Profile' style='border-radius:50%; width:40px; height:40px; box-shadow:0px 0px 2px black; border:2px solid gray;'></a></div></td>
          <td style='font-family:cambria;' class='text-center text-capitalize'>
              <div class='col-12 d-lg-flex'>
                  <div class='col-12 d-lg-flex text-left'><div></div><a href='main.php?profile=".$user_id."' class='text-dark' style='text-decoration:none;'><tag class='font-weight-bold'>".$rows['fname']." ".$rows['lname']."</tag><tag> was following you on </tag> ".$rows['c_time']." | </span> ".$rows['c_date']."</a></div>
              </div>


              <div class='col-12 p-2 text-left ml-2'><form action='main.php' method='post' id='".$user_id."'>
                  <input type='text' name='id' value='".$user_id."' hidden>
                  <input type='text' name='query' value='".$user_id."' hidden>
                  <input type='text' name='request' value='".$user_id."' hidden>
                  <input type='text' name='followed_by' value='".$current_user."' hidden>
                  <input type='text' name='follow_user' value='".$user_id."' hidden>
                  <div class='btn-group'><button type='submit' name='follow' class='btn btn-sm btn-primary'> Follow Back</button>
                  
                  <input type='text' name='query' value='".$user_id."' hidden>
                  <input type='text' name='id' value='".$user_id."' hidden>
                  <input type='text' name='query' value='".$user_id."' hidden>
                  <input type='text' name='unfollowed_by' value='".$user_id."' hidden>
                  <input type='text' name='unfollow_user' value='".$current_user."' hidden>
                  <input type='text' name='deleteRequestFromRequest' value='deleteRequest' hidden>
                  <button type='submit' name='unfollow' class='btn btn-sm btn-danger'> Delete</button></div>
              </form></div>
          </td></tr>";
          $num_request += 1;
          $zeroFollower = 0;
      }else if($follow_value1 == 1 AND $follow_value2 == 1){
          // Don't print anything if user are friend-----------------------------

      }else if($follow_value1 == 1 AND $follow_value2 == 0){
    }else if($follow_value1 == 0 AND $follow_value2 == 0){
        
    }
}
if($num_request == 0){
    echo "<div class='d-flex justify-content-center align-items-center p-5 mt-5 text-danger'><p><i class='fas fa-envelope'></i> 0 Follower Request.. <br><br><span class='h4 text-dark' style='letter-spacing:1px; font-family:cambria;'>Search your friend's and make a friend..</span></p></div>";
  }
  
echo "</table>";
echo "</div>";




echo "<div class='row text-center bg-dark text-light p-3 font-weight-bold'><i class='fas fa-users d-flex mt-1 mx-3'></i>People's also may you know..</div>";

// May you know people area---------------------------------------
echo "<div class='table-responsive mt-2'>
         <table class='table table-hover w-100'>";

    $obj = mysqli_query($conn,"SELECT * FROM users ORDER BY c_date DESC");
    // ------------------------------------------------    
    while($rows = mysqli_fetch_assoc($obj)){
        $user_id = $rows['user_id'];
                    $follower_obj = mysqli_query($conn,"SELECT * FROM `follower_manage` WHERE `followed_by` = '$current_user' AND  `follow_user` = '$user_id';");
                    $num_of_rows = mysqli_num_rows($follower_obj);
                    if($rows['user_id'] != $_SESSION['tsn-login']['id']){
                        if($user_id != $current_user){
                            $follow_1 = mysqli_query($conn,"SELECT * FROM follower_manage WHERE followed_by = $current_user AND follow_user = $user_id");
                            $follow_2 = mysqli_query($conn,"SELECT * FROM follower_manage WHERE followed_by = $user_id AND follow_user = $current_user");
                            
                            $follow_value1 = mysqli_num_rows($follow_1);
                            $follow_value2 = mysqli_num_rows($follow_2);
                            // if($follow_value1 == 0 AND $follow_value2 == 1){
                                // }
                                
                            if($follow_value1 == 1 AND $follow_value2 == 1){
                                    // If user are fiend....................
                                //    Do not print user because both are friend
                            }else if($follow_value1 == 0 AND $follow_value2 == 1){
                                // Don't print anything already in request area
                                // If user send request.............................
                            
                            }else{
                                // If new user....................
                                echo "<tr>
                                <td class='px-5'><a href='main.php?profile=".$user_id."' class=''> <img src='../signup-process/profiles/".$rows['filename']."' alt='Profile' style='border-radius:50%; width:40px; height:40px; box-shadow:0px 0px 2px black; border:2px solid gray;'></a></td>
                                <td style='letter-spacing:1px; font-family:Rockwell;' class='px-4 w-100'><a href='main.php?profile=".$user_id."' class='text-dark d-flex' style='text-decoration:none;'><p>".$rows['fname']." ".$rows['lname']."</p></a>
                                <div class='btn-group w-100 justify-content-between'>"; 
                                // friend management
                                if($num_of_rows == 0){
                                    echo "<form action='main.php' method='post' id='".$user_id."'>
                                    <input type='text' name='id' value='".$user_id."' hidden>
                                    <input type='text' name='query' value='".$user_id."' hidden>
                                    <input type='text' name='request' value='".$user_id."' hidden>
                                    <input type='text' name='followed_by' value='".$current_user."' hidden>
                                    <input type='text' name='follow_user' value='".$user_id."' hidden>
                                    <button type='submit' name='follow' class='btn btn-sm btn-primary'><i class='fas fa-plus'></i> Follow</button>
                                    </form>";
                                    
                                }else{
                                    echo "<form action='main.php' method='post' id='".$user_id."'>
                                    <input type='text' name='query' value='".$user_id."' hidden>
                                    <input type='text' name='request' value='".$user_id."' hidden>
                                    <input type='text' name='id' value='".$user_id."' hidden>
                                    <input type='text' name='unfollowed_by' value='".$current_user."' hidden>
                                    <input type='text' name='unfollow_user' value='".$user_id."' hidden>
                                    <div class='btn-group'> <button type='submit' name='unfollow' class='btn btn-sm btn-danger active'> Unfollow</button>
                                   
                                    <input type='text' name='query' value='".$user_id."' hidden>
                                    <input type='text' name='request' value='".$user_id."' hidden>
                                    <input type='text' name='id' value='".$user_id."' hidden>
                                    <input type='text' name='query' value='".$user_id."' hidden>
                                    <input type='text' name='unfollowed_by' value='".$current_user."' hidden>
                                    <input type='text' name='unfollow_user' value='".$user_id."' hidden>
                                    <button type='submit' name='unfollow' class='btn btn-sm btn-danger'> Delete</button></div>
                                    </form>";
                                }
                            }
                        }
                        
                        if($follow_value1 == 0 AND $follow_value2 == 1){
                            // Not print anything............... already in follower request area
                        }else if($follow_value1 == 1 AND $follow_value2 == 1){
                            // Don't print anything because both are friend....
                        }else{
                            echo "</div></td>  
                                <td>";
                                echo "
                                <a href='main.php?chatwith=".$user_id."'><i class='fas fa-comment-dots text-primary'></i></a>
                                ";  
                            echo "</td> 
                                </tr>";
                        }
                    }
                }
             echo "</table>";
    echo "</div>";
// ........................................................................................

?>
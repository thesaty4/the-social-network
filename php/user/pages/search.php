<?php
 if($_GET['search'] == ''){
    echo "<div class='d-flex justify-content-center align-items-center' style='height:85vh;'>
        <span class='fa-1x'><i class='fas fa-search'></i> 0 user found..!</span>
    </div>";
}else{
    $query = filter_var($_GET['search'],FILTER_SANITIZE_STRING);
    $obj = mysqli_query($conn,"SELECT `user_id`,`filename`,`profile_location`,`fname`,`lname` FROM `users` WHERE `fname` LIKE '$query%' OR `lname` LIKE '$query%' OR `fname` LIKE '%$query' OR `lname` LIKE '%$query' OR `mobile` LIKE '$query%' OR `mobile` LIKE '%$query' OR `email` LIKE '%$query' OR `email` LIKE '$query%'   ORDER BY `fname`;");
    if(mysqli_num_rows($obj) == 0){
        echo "<div class='d-flex justify-content-center align-items-center' style='height:85vh;'>
        <span class='fa-1x'><i class='fas fa-search'></i> No user found in this name..!</span>
    </div>";
    }
    // echo "<div class='row bg-dark text-light text-center'>
    //     <div class='col-3' active> All Filter</div>
    //     <div class='col-3 '> Name</div>
    //     <div class='col-3 '> Mobile </div>
    //     <div class='col-3 '> Email </div>
    // </div>";
    
    echo "<div class='row'>
            <table class='table table-striped text-center text-capitalize box-shadow-black'>";
            $current_user = $_SESSION['tsn-login']['id'];
                while($rows = mysqli_fetch_assoc($obj)){
                    $user_id = $rows['user_id'];
                    $follower_obj = mysqli_query($conn,"SELECT * FROM `follower_manage` WHERE `followed_by` = '$current_user' AND  `follow_user` = '$user_id';");
                    $num_of_rows = mysqli_num_rows($follower_obj);
                    if($rows['user_id'] != $_SESSION['tsn-login']['id']){
                        echo "<tr>
                        <td><div><a href='main.php?profile=".$user_id."'> <img src='../signup-process/profiles/".$rows['filename']."' alt='Profile' style='border-radius:50%; width:40px; height:40px; box-shadow:0px 0px 2px black; border:2px solid gray;'></a></div></td>
                        <td style='letter-spacing:1px; font-family:Rockwell;'><a href='main.php?profile=".$user_id."' class='text-dark d-flex' style='text-decoration:none;'><p>".$rows['fname']." ".$rows['lname']."</p></a>
                        <div class='btn-group w-100 justify-content-between'>"; 
                        if($user_id != $current_user){
                            $follow_1 = mysqli_query($conn,"SELECT * FROM follower_manage WHERE followed_by = $current_user AND follow_user = $user_id");
                            $follow_2 = mysqli_query($conn,"SELECT * FROM follower_manage WHERE followed_by = $user_id AND follow_user = $current_user");
                            
                            $follow_value1 = mysqli_num_rows($follow_1);
                            $follow_value2 = mysqli_num_rows($follow_2);
                            if($follow_value1 == 1 AND $follow_value2 == 1){
                                echo "<form action='".$_SERVER['PHP_SELF']."' method='post' id='".$user_id."'>
                                    <input type='text' name='id' value='".$user_id."' hidden>
                                    <input type='text' name='query' value='".$query."' hidden>
                                    <input type='text' name='unfollowed_by' value='".$current_user."' hidden>
                                    <input type='text' name='unfollow_user' value='".$user_id."' hidden>
                                    <div class='btn-group'><button type='submit' name='unfollow' class='btn btn-sm btn-success'><i class='fas fa-check'></i> Friend</button>
                
                                <input type='text' name='id' value='".$user_id."' hidden>
                                <input type='text' name='query' value='".$query."' hidden>
                                <input type='text' name='unfollowed_by' value='".$current_user."' hidden>
                                <input type='text' name='unfollow_user' value='".$user_id."' hidden>
                                <input type='text' name='deleteRequest' value='".$user_id."' hidden>
                                <button type='submit' name='unfollow' class='btn btn-sm btn-danger'> Delete</button></div>
                            </form>";
                            }else if($follow_value1 == 0 AND $follow_value2 == 1){
                                echo "<form action='".$_SERVER['PHP_SELF']."' method='post' id='".$user_id."'>
                                        <input type='text' name='id' value='".$user_id."' hidden>
                                        <input type='text' name='query' value='".$query."' hidden>
                                        <input type='text' name='followed_by' value='".$current_user."' hidden>
                                        <input type='text' name='follow_user' value='".$user_id."' hidden>
                                        <div class='btn-group'><button type='submit' name='follow' class='btn btn-sm btn-primary'> Follow Back</button>
                                      
                                        <input type='text' name='id' value='".$user_id."' hidden>
                                        <input type='text' name='query' value='".$query."' hidden>
                                        <input type='text' name='unfollowed_by' value='".$current_user."' hidden>
                                        <input type='text' name='unfollow_user' value='".$user_id."' hidden>
                                        <input type='text' name='deleteRequest' value='deleteRequest' hidden>
                                        <button type='submit' name='unfollow' class='btn btn-sm btn-danger'> Delete</button></div>
                                    </form>";
                            }else{
                            // friend management
                                if($num_of_rows == 0){
                                    echo "<form action='".$_SERVER['PHP_SELF']."' method='post' id='".$user_id."'>
                                        <input type='text' name='id' value='".$user_id."' hidden>
                                        <input type='text' name='query' value='".$query."' hidden>
                                        <input type='text' name='followed_by' value='".$current_user."' hidden>
                                        <input type='text' name='follow_user' value='".$user_id."' hidden>
                                        <button type='submit' name='follow' class='btn btn-sm btn-primary'><i class='fas fa-plus'></i> Follow</button>
                                        </form>";

                                    }else{
                                        echo "<form action='".$_SERVER['PHP_SELF']."' method='post' id='".$user_id."'>
                                        <input type='text' name='id' value='".$user_id."' hidden>
                                        <input type='text' name='query' value='".$query."' hidden>
                                        <input type='text' name='unfollowed_by' value='".$current_user."' hidden>
                                        <input type='text' name='unfollow_user' value='".$user_id."' hidden>
                                        <div class='btn-group'><button type='submit' name='unfollow' class='btn btn-sm btn-danger active'> Unfollow</button>
                                 
                                <input type='text' name='id' value='".$user_id."' hidden>
                                <input type='text' name='query' value='".$query."' hidden>
                                <input type='text' name='unfollowed_by' value='".$current_user."' hidden>
                                <input type='text' name='unfollow_user' value='".$user_id."' hidden>
                                <button type='submit' name='unfollow' class='btn btn-sm btn-danger'> Delete</button></div>
                            </form>";
                                }
                            }
                        }
                        
                        echo "</div></td>  
                            <td>";
                            echo "
                            <a href='main.php?chatwith=".$user_id."'><i class='fas fa-comment-dots text-primary'></i></a>
                            ";  
                        echo "</td> 
                            </tr>";
                    }
                }
             echo "</table>";
    echo "</div>";
}
?>
<?php
   
    $obj = mysqli_query($conn,"SELECT * FROM posts WHERE user_id = $current_user ORDER BY post_id DESC;");
    if(mysqli_num_rows($obj) == 0){
        echo "<div class='d-flex justify-content-center align-items-center h5' style='height:80vh;'></i>Oohh ! No notification</div>";
    }else{

        $notificationobj = mysqli_query($conn,"SELECT * FROM notification WHERE user_id = $current_user;");
        $notificationrows = mysqli_fetch_assoc($notificationobj);
        if($notificationrows['num_of_notification'] == 0){
            echo "<div class='p-5 text-danger'><i class='fas fa-bell'></i> Ohh ! No New notification Available..</div>";
        }else{
            echo "<a href='pages/make-see-notification.php' class='btn btn-dark btn-sm btn-block my-2'>Make see all</a>";
        }
    // Check any user follow me-----?
    $num_of_follower = 0;
    $followerobj = mysqli_query($conn,"SELECT `user_id`,`filename`,`profile_location`,`fname`,`lname` FROM `users` ORDER BY `user_id` DESC;");
    echo "<div class='table-responsive'>
    <table class='table table-hover'>";
    while($rows = mysqli_fetch_assoc($followerobj)){
        $userId = $rows['user_id'];
        $profileLocation = $rows['profile_location'];
                $follower_obj = mysqli_query($conn,"SELECT * FROM `follower_manage` WHERE `followed_by` = '$current_user' AND  `follow_user` = '$userId';");
                $num_of_rows = mysqli_num_rows($follower_obj);

                $follow_1 = mysqli_query($conn,"SELECT * FROM follower_manage WHERE followed_by = $current_user AND follow_user = $userId");
                $follow_2 = mysqli_query($conn,"SELECT * FROM follower_manage WHERE followed_by = $userId AND follow_user = $current_user");
                
                $follow_value1 = mysqli_num_rows($follow_1);
                $follow_value2 = mysqli_num_rows($follow_2);
                $follow_value2_row = mysqli_fetch_assoc($follow_2);
                // if($rows['followed_by'] != $current_user){
                if($follow_value1 == 0 AND $follow_value2 == 1){
                echo "<tr style='background-color:lightgray;'><td><a class='text-dark' href='main.php?profile=".$userId."'><img src='../signup-process/".$profileLocation."' style='height:30px; width:30px;border-radius:50%; border:2px solid gray; box-shadow:0px 0px 2px black;'/></a></td>";
                echo "<td><a class='text-dark' href='main.php?profile=".$userId."'><b class='text-capitalize'>".$rows['fname']." ".$rows['lname']."</b> was following you on <i style='font-size:12px;' class='text-dark'>".$follow_value2_row['c_time']." ".$follow_value2_row['c_date']."</i></a>";
                echo "<span class='text-lg-right'>
                        <form action='".$_SERVER['PHP_SELF']."' method='post' id='".$userId."'>
                            <input type='text' name='id' value='".$userId."' hidden>
                            <input type='text' name='query' value='".$userId."' hidden>
                            <input type='text' name='followed_by' value='".$current_user."' hidden>
                            <input type='text' name='follow_user' value='".$userId."' hidden>
                            <input type='text' name='followFromNotification' value='followFromNotification' hidden>
                            <div class='btn-group'><button type='submit' name='follow' class='btn btn-sm btn-primary'> Follow Back</button>
                        
                            <input type='text' name='id' value='".$userId."' hidden>
                            <input type='text' name='query' value='".$userId."' hidden>
                            <input type='text' name='unfollowed_by' value='".$current_user."' hidden>
                            <input type='text' name='unfollow_user' value='".$userId."' hidden>
                            <input type='text' name='deleteFromNotification' value='deleteFromNotification' hidden>
                            <button type='submit' name='unfollow' class='btn btn-sm btn-danger'> Delete</button></div>
                        </form>
                    </span>
                    <td></td>
                    </td></tr>";
                    $num_of_follower += 1;
                }
            }

        //====== THese function for like and commented the post =========== 
    
        function likeButton($userId,$profileLocation,$postLocation,$postId,$current_user,$fname,$lname,$c_time,$c_date){
            return "<td><a class='text-dark' href='main.php?profile=".$userId."'><img src='../signup-process/".$profileLocation."' style='height:30px; width:30px;border-radius:50%; border:2px solid gray; box-shadow:0px 0px 2px black;'/></a></td>
                    <td>
                        <form action='".$_SERVER['PHP_SELF']."' method='post'>
                            <input type='text' name='likesee' value='".$userId."' hidden required/>
                            <input type='text' name='uId' value='".$userId."' hidden required/>
                            <input type='text' name='pId' value='".$postId."' hidden required/>
                            <input type='text' name='cId' value='".$current_user."' hidden required/>
                            <button type='submit' name='seePost' value='seePost' class='btn-block text-left button-none'><span class='font-weight-bold text-capitalize'>".$fname." ".$lname."</span> was liked <i class='fas fa-heart text-danger'></i> your post on <i style='font-size:12px;'>".$c_time." <span class='col-12'> ".$c_date."</span></i></button>
                        </form>
                    </td>
                    <td>
                        <img src='pages/".$postLocation."'style='box-shadow:1px 1px 3px black; height:30px;weight:30px;'/>
                    </td>";
        }

        function commentButton($userId,$profileLocation,$postLocation,$postId,$current_user,$fname,$lname,$c_time,$c_date){
            return "<td><a class='text-dark' href='main.php?profile=".$userId."'><img src='../signup-process/".$profileLocation."' style='height:30px; width:30px;border-radius:50%; border:2px solid gray; box-shadow:0px 0px 2px black;'/></a></td>
                    <td>
                        <form action='".$_SERVER['PHP_SELF']."' method='post'>
                            <input type='text' name='commentsee' value='".$userId."' hidden required/>
                            <input type='text' name='uId' value='".$userId."' hidden required/>
                            <input type='text' name='pId' value='".$postId."' hidden required/>
                            <input type='text' name='cId' value='".$current_user."' hidden required/>
                            <button type='submit' name='seePost' value='seePost' class='btn-block text-left button-none'><span class='font-weight-bold text-capitalize'>".$fname." ".$lname."</span> commented <i class='fas fa-comment-alt text-success'></i> in your post on your post on <i style='font-size:12px;'>".$c_time." <span class='col-12'> ".$c_date."</span></i></button>
                        </form>
                    </td>
                    <td>
                        <img src='pages/".$postLocation."'style='box-shadow:1px 1px 3px black; height:30px;weight:30px;'/>
                    </td>";
        }
              $num_of_like = 0;
              $num_of_comment = 0;
            while($rows = mysqli_fetch_assoc($obj)){         
                $postId = $rows['post_id'];
                $postLocation = $rows['post_location'];
                $likeobj = mysqli_query($conn,"SELECT l.*,u.fname,u.lname,u.profile_location FROM likes AS l INNER JOIN users As u ON l.user_id = u.user_id WHERE l.post_id = $postId ORDER BY l.like_id;");                    
                // Like notification
                while($likes_data = mysqli_fetch_assoc($likeobj)){
                    $userId = $likes_data['user_id'];
                    $profileLocation = $likes_data['profile_location'];
                    $fname           = $likes_data['fname'];
                    $lname           = $likes_data['lname'];
                    if($userId != $current_user){
                        if($likes_data['is_seen'] == 0){
                            echo "<tr style='background-color:lightgray;'>";
                            echo likeButton($userId,$profileLocation,$postLocation,$postId,$current_user,$fname,$lname,$likes_data['c_time'],$likes_data['c_date']);   
                            echo "</tr>";
                            $num_of_like += 1;
                        }
                    }
                }
                // Comment notification
                $comment_obj = mysqli_query($conn,"SELECT c.*,u.fname,u.lname,u.profile_location FROM comments AS c INNER JOIN users As u ON c.user_id = u.user_id WHERE c.post_id = $postId ORDER BY c.comment_id DESC;");
                while($comment_data = mysqli_fetch_assoc($comment_obj)){
                    $userId = $comment_data['user_id'];
                    $profileLocation = $comment_data['profile_location'];
                    $fname           = $comment_data['fname'];
                    $lname           = $comment_data['lname'];
                    if($userId != $current_user){
                        if($comment_data['is_seen'] == 0){
                            echo "<tr style='background-color:lightgray;'>";
                            echo commentButton($userId,$profileLocation,$postLocation,$postId,$current_user,$fname,$lname,$comment_data['c_time'],$comment_data['c_date']);   
                            echo "</tr>";
                            $num_of_comment += 1;
                        }
                    }
                }

            }
           
            
            $obj = mysqli_query($conn,"SELECT * FROM posts WHERE user_id = $current_user ORDER BY post_id DESC;");
            while($rows = mysqli_fetch_assoc($obj)){
    
    
                        // ---------------------------------------- If notification readed ----------------------------
                        $postId = $rows['post_id'];
                        $postLocation = $rows['post_location'];
                        $likeobj = mysqli_query($conn,"SELECT l.*,u.fname,u.lname,u.profile_location FROM likes AS l INNER JOIN users As u ON l.user_id = u.user_id WHERE l.post_id = $postId  ORDER BY l.like_id DESC;");                    
                        
                        
                        
                        // Like notification if see
                        while($likes_data = mysqli_fetch_assoc($likeobj)){
                            $userId = $likes_data['user_id'];
                            $profileLocation = $likes_data['profile_location'];
                            $fname           = $likes_data['fname'];
                            $lname           = $likes_data['lname'];
                            if($userId != $current_user){
                                if($likes_data['is_seen'] == 1){
                                    echo "<tr>";
                                    echo likeButton($userId,$profileLocation,$postLocation,$postId,$current_user,$fname,$lname,$likes_data['c_time'],$likes_data['c_date']);   
                                    echo "</tr>";
                                }
                            }
                        }
    
    
                        // Comment notification if see........
                        $comment_obj = mysqli_query($conn,"SELECT c.*,u.fname,u.lname,u.profile_location FROM comments AS c INNER JOIN users As u ON c.user_id = u.user_id WHERE c.post_id = $postId  ORDER BY c.comment_id DESC;");
                        while($comment_data = mysqli_fetch_assoc($comment_obj)){
                            $userId = $comment_data['user_id'];
                            $profileLocation = $comment_data['profile_location'];
                            $fname           = $comment_data['fname'];
                            $lname           = $comment_data['lname'];
                            if($userId != $current_user){
                                if($comment_data['is_seen'] == 1){
                                    echo "<tr>";
                                    echo commentButton($userId,$profileLocation,$postLocation,$postId,$current_user,$fname,$lname,$comment_data['c_time'],$comment_data['c_date']);   
                                    echo "</tr>";
                                }
                            }
                        }
                    }
                    
                echo "</table>";
            echo "</div>";

        $obj = mysqli_query($conn,"SELECT * FROM notification WHERE user_id = $current_user;");
        $num_of_notification = $num_of_like + $num_of_comment + $num_of_follower;
        if(mysqli_num_rows($obj) == 0){
            mysqli_query($conn,"INSERT INTO notification (num_of_notification,user_id) VALUES ($num_of_notification,$current_user);");
        }else{
            mysqli_query($conn,"UPDATE notification SET num_of_notification = $num_of_notification WHERE user_id = $current_user;");
        }
    }
?>
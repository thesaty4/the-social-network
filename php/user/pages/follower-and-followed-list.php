<!-- Functions  -->
<?php
function noUser($obj){
    if(mysqli_num_rows($obj) == 0){
        return "<div class='text-center p-5 font-weight-bold font-cambria text-danger'><i class='fas fa-user-plus'></i> No Follower</div>";
    }
}
function userData($conn,$fType){
    return mysqli_query($conn,"SELECT * FROM users WHERE user_id = $fType;");
}
function userRows($sql){
    return mysqli_fetch_assoc($sql);
}   
// Creating follow or unfollow button
function createFollowButton($user_id,$followerList,$from){
    $conn = db_conn();
    $current_user = $_SESSION['tsn-login']['id'];
    if($from == 'fromFollowList'){
        $unfollow = "unfollowFromList";
        $follow = "followFromList";
    }else if($from == 'fromFollowedList'){
        $unfollow = "unfollowedFromList";
        $follow = "followedFromList";
    }
    if($current_user != $user_id){
        $follower_obj = mysqli_query($conn,"SELECT * FROM `follower_manage` WHERE `followed_by` = '$current_user' AND  `follow_user` = '$user_id';");
        $num_of_rows = mysqli_num_rows($follower_obj);
        $follow_1 = mysqli_query($conn,"SELECT * FROM follower_manage WHERE followed_by = $current_user AND follow_user = $user_id");
        $follow_2 = mysqli_query($conn,"SELECT * FROM follower_manage WHERE followed_by = $user_id AND follow_user = $current_user");
        
        $follow_value1 = mysqli_num_rows($follow_1);
        $follow_value2 = mysqli_num_rows($follow_2);
        if($follow_value1 == 1 AND $follow_value2 == 1){
            return "<form action='".$_SERVER['PHP_SELF']."' method='post' id='".$user_id."'>
                <input type='text' name='id' value='".$followerList."' hidden>
                <input type='text' name='query' value='".$user_id."' hidden>
                <input type='text' name='unfollowed_by' value='".$current_user."' hidden>
                <input type='text' name='unfollow_user' value='".$user_id."' hidden>
                <input type='text' name='".$unfollow."' value='".$user_id."' hidden>
                <button type='submit' name='unfollow' class='btn btn-sm btn-success'><i class='fas fa-check'></i> Friend</button>
            </form>";
        }else if($follow_value1 == 0 AND $follow_value2 == 1){
            return "<form action='".$_SERVER['PHP_SELF']."' method='post' id='".$user_id."'>
                    <input type='text' name='id' value='".$followerList."' hidden>
                    <input type='text' name='query' value='".$user_id."' hidden>
                    <input type='text' name='followed_by' value='".$current_user."' hidden>
                    <input type='text' name='follow_user' value='".$user_id."' hidden>
                    <input type='text' name='".$follow."' value='".$user_id."' hidden>
                    <button type='submit' name='follow' class='btn btn-sm btn-primary'> Follow Back</button>
                </form>";
        }else{
        // friend management
            if($num_of_rows == 0){
                return "<form action='".$_SERVER['PHP_SELF']."' method='post' id='".$user_id."'>
                    <input type='text' name='id' value='".$followerList."' hidden>
                    <input type='text' name='query' value='".$user_id."' hidden>
                    <input type='text' name='followed_by' value='".$current_user."' hidden>
                    <input type='text' name='follow_user' value='".$user_id."' hidden>
                    <input type='text' name='".$follow."' value='".$user_id."' hidden>
                    <button type='submit' name='follow' class='btn btn-sm btn-primary'><i class='fas fa-plus'></i> Follow</button>
                    </form>";
                }else{
                    return "<form action='".$_SERVER['PHP_SELF']."' method='post' id='".$user_id."'>
                    <input type='text' name='id' value='".$followerList."' hidden>
                    <input type='text' name='query' value='".$user_id."' hidden>
                    <input type='text' name='unfollowed_by' value='".$current_user."' hidden>
                    <input type='text' name='unfollow_user' value='".$user_id."' hidden>
                    <input type='text' name='".$unfollow."' value='".$user_id."' hidden>
                    <button type='submit' name='unfollow' class='btn btn-sm btn-danger active'> Unfollow</button>
                </form>";
            }
        }
    }else{
        return "<button class='btn btn-primary btn-sm'>Your A/c</button>";
    }
}
function data($profileLocation,$fname,$lname,$usrId,$followerList,$from){
    return "<tr class='text-center'>
    <td><img src='../signup-process/".$profileLocation."' style='height:25px;width:25px;'></td>
    <td><span class='font-weight-bold font-cambria text-capitalize'>".$fname." ".$lname."</span></td>
    <td>".createFollowButton($usrId,$followerList,$from)."</td>
</tr>";
}?>
<!-- Functions  -->


<div class="row bg-primary px-3">
        <?php
        if(isset($_GET['followerList'])){
            $followerList = filter_data($_GET['followerList']);
            echo "<a href='main.php?profile=".$followerList."' style='text-decoration:none;' class='text-dark'><i class='fas fa-backward text-light'></i></a> <span class='text-light font-weight-bold ml-auto mr-auto'><i class='fas fa-user-plus'></i> Follower List</span>";
        }else if(isset($_GET['followedList'])){
            $followerList = filter_data($_GET['followedList']);
           echo "<a href='main.php?profile=".$followerList."' style='text-decoration:none;' class='text-dark'><i class='fas fa-backward text-light'></i></a> <span class='text-light font-weight-bold ml-auto mr-auto'><i class='fas fa-users'></i> Followed List</span>";
        }
    ?>
</div>
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <?php
            if(isset($_GET['followerList'])){
                $user_id = $followerList;
                $follower = mysqli_query($conn,"SELECT * FROM follower_manage  WHERE `follow_user` = $user_id;");
                echo noUser($follower);
                while($rows = mysqli_fetch_assoc($follower)){
                    $sql = userData($conn,$rows['followed_by']);
                    $Userrows = userRows($sql);
                    echo data($Userrows['profile_location'],$Userrows['fname'],$Userrows['lname'],$Userrows['user_id'],$followerList,'fromFollowList');
                }
            }else if(isset($_GET['followedList'])){
                $user_id = $followerList;
                $followed = mysqli_query($conn,"SELECT * FROM follower_manage  WHERE `followed_by` = $user_id;");
                echo noUser($followed);
                while($rows = mysqli_fetch_assoc($followed)){
                    $sql = userData($conn,$rows['follow_user']);
                    $Userrows = userRows($sql);
                    echo data($Userrows['profile_location'],$Userrows['fname'],$Userrows['lname'],$Userrows['user_id'],$followerList,'fromFollowedList');
                }
            }
            
            
        ?>
    </table>
</div>
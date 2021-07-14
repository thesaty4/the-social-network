<?php
 // $user_id = $_SESSION['tsn-login']['id'];
 $user_id = filter_data($_GET['profile']);
 $obj = mysqli_query($conn,"SELECT * FROM users WHERE `user_id` = $user_id");
 if(mysqli_num_rows($obj) == 0){
     echo "<script>window.location.href='main.php';</script>";
 }
 $rows = mysqli_fetch_assoc($obj);
 $profile = $rows['profile_location'];
 $fname = $rows['fname'];
 $lname = $rows['lname'];
 $posts = mysqli_query($conn,"SELECT * FROM posts  WHERE `user_id` = $user_id;");
 $follower = mysqli_query($conn,"SELECT * FROM follower_manage  WHERE `follow_user` = $user_id;");
 $followed = mysqli_query($conn,"SELECT * FROM follower_manage  WHERE `followed_by` = $user_id;");

 $num_of_post = mysqli_num_rows($posts);
 $num_of_follower = mysqli_num_rows($follower);
 $num_of_followed = mysqli_num_rows($followed);

 $follower_obj = mysqli_query($conn,"SELECT * FROM `follower_manage` WHERE `followed_by` = '$current_user' AND  `follow_user` = '$user_id';");
 $num_of_rows = mysqli_num_rows($follower_obj);
 
if($user_id == $current_user){
    $button = '<a href="pages/profile_update.php?profile_update='.$current_user.'" class="text-dark"><i class="fas fa-edit" title="Edit Profile"></i></a>';
}else if($num_of_rows == 0){
    $button = "<form action='".$_SERVER['PHP_SELF']."' method='post' id='".$user_id."'>
    <input type='text' name='id' value='".$user_id."' hidden>
    <input type='text' name='query' value='".$user_id."' hidden>
    <input type='text' name='followProfile' value='".$user_id."' hidden>
    <input type='text' name='followed_by' value='".$current_user."' hidden>
    <input type='text' name='follow_user' value='".$user_id."' hidden>
    <button type='submit' name='follow' class='btn btn-sm btn-primary'>+Follow</button>
    </form>";
}else if($num_of_rows != 0){
    $button =  "<form action='".$_SERVER['PHP_SELF']."' method='post' id='".$user_id."'>
    <input type='text' name='id' value='".$user_id."' hidden>
    <input type='text' name='query' value='".$user_id."' hidden>
    <input type='text' name='unfollowProfile' value='".$user_id."' hidden>
    <input type='text' name='unfollowed_by' value='".$current_user."' hidden>
    <input type='text' name='unfollow_user' value='".$user_id."' hidden>
    <button type='submit' name='unfollow' class='btn btn-sm btn-danger active'> Unfollow</button>
    </form>";
}

$follow_1 = mysqli_query($conn,"SELECT * FROM follower_manage WHERE followed_by = $current_user AND follow_user = $user_id");
$follow_2 = mysqli_query($conn,"SELECT * FROM follower_manage WHERE followed_by = $user_id AND follow_user = $current_user");

$follow_value1 = mysqli_num_rows($follow_1);
$follow_value2 = mysqli_num_rows($follow_2);
if($follow_value1 == 0 AND $follow_value2 == 1){
    $button =  "<form action='".$_SERVER['PHP_SELF']."' method='post' id='".$user_id."'>
            <input type='text' name='id' value='".$user_id."' hidden>
            <input type='text' name='query' value='".$user_id."' hidden>
            <input type='text' name='unfollowProfile' value='".$user_id."' hidden>
            <input type='text' name='followProfile' value='".$user_id."' hidden>
            <input type='text' name='followed_by' value='".$current_user."' hidden>
            <input type='text' name='follow_user' value='".$user_id."' hidden>
            <div class='btn-group'><button type='submit' name='follow' class='btn btn-sm btn-primary'> Follow Back</button>
          
            <input type='text' name='id' value='".$user_id."' hidden>
            <input type='text' name='query' value='".$user_id."' hidden>
            <input type='text' name='deleteProfile' value='".$user_id."' hidden>
            <input type='text' name='unfollowed_by' value='".$current_user."' hidden>
            <input type='text' name='unfollow_user' value='".$user_id."' hidden>
            <input type='text' name='deleteRequest' value='deleteRequest' hidden>
            <button type='submit' name='unfollow' class='btn btn-sm btn-danger'> Delete</button></div>
        </form>";
}

if($user_id != $_SESSION['tsn-login']['id']){
    $chat = '<a href="main.php?chatwith='.$rows['user_id'].'" style="text-decoration:none;" class="text-primary ml-4"><i class="far fa-comment-alt h5"></i></a>';
}else{
    $chat = '';
}
echo   '<div class="row overflow-hidden" style="font-family:rockwell;">
         <div class="col-12 d-flex pt-3">
             <div class="col-4 col-md-2">
                 <div class=" text-center mr-md-auto" style="border-radius:50%; overflow:hidden; width:100px; height:100px;  border:2px solid gray; box-shadow:0px 0px 5px black;">
                    <a href="../signup-process/'.$rows['profile_location'].'">
                        <img src="../signup-process/'.$rows['profile_location'].'" alt="Profile Picture" style="width:100px; height:150px;">
                    </a>
                 </div>
             </div>
             <div class="col-12 font-weight-bold d-flex"> 
                <div class="text-capitalize col-12 col-md-11 d-flex mt-5" style="letter-spacing:1px;">
                    <p>'.$rows['fname']." ".$rows['lname'].'</p>
                    <p>'.$chat.'</p>
                </div>
             </div>
             </div>
             <span class="text-right col-12">'.$button.'</span>

         <div class="col-12 text-capitalize font-wight-bold d-flex p-2" style="font-family:rockwell;">
             <div class="col-12 text-center font-weight-bold d-flex">
                 <div class="col-4 "> Posts <br> '.$num_of_post.'</div>
                 <div class="col-4"><a href="main.php?followerList='.$_GET['profile'].'" class="text-dark" style="text-decoration:none;"> Follower <br> '.$num_of_follower.'</a></div>
                 <div class="col-4"><a href="main.php?followedList='.$_GET['profile'].'" class="text-dark" style="text-decoration:none;"> Followed <br> '.$num_of_followed.'</a></div>
             </div>
         </div>
         
         <div class="col-12 p-2 fixed-sticky w-100" style="border:0px 0px 0px 1px solid black; border-radius:0px 0px 30px 30px; box-shadow:0px 2px 5px black;">';
?>
     <!-- Post Management -->
     <?php if($_SESSION['tsn-login']['id'] == $_GET['profile']){?>
        <div class="col-12 d-flex">
            <div class="col-lg-11 col-10 d-flex text-dark">
                <a href="main.php?post" class=' text-dark w-100 nav-link' style='cursor:text;'><div>Write Your Post...</div></a> 
                <div class='ml-auto mt-1'>|</div>
            </div>
            <div class="col-lg-1 col-2" style='cursor:pointer;'>
                <a href="main.php?post" class='nav-link text-dark'><i class='fas fa-images'></i></a>
            </div>
        </div>
    </div>
     <?php } ?>

     
<?php

// Feed manage
include("pages/home.php");


echo '</div>';//Profile body end
?>
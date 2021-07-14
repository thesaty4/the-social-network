<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php session_start(); echo "user-".$_SESSION['tsn-login']['fname'];?></title>
</head>
    <link rel="stylesheet" type="text/css" href="../../icon/font-awesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <script src="../../js/alert-message.js"></script>
    <script src="../../js/validation.js"></script>
    <script src="../../js/jquery-3.5.1.min.js"></script>
    <!-- <script src="../../js/jquery-3.4.1.min.js"></script> -->
    <style>
        body{
            background:#fff;
        }
    </style>
<body>
<?php
if($_SESSION['tsn-login']['account_type'] == 'user'){
    // Filtering data
    function filter_data($arg){
        $data = filter_var($arg,FILTER_SANITIZE_STRING);
        return $data;
    }
    $current_user = $_SESSION['tsn-login']['id'];

    include("../../include/database_connection.php");
    $conn = db_conn();
    // Navigation
    if(!(isset($_POST['follow']) OR isset($_POST['unfollow']) OR isset($_POST['followProfile']) OR isset($_POST['unfollowProfile']) OR isset($_POST['followFromList']) OR isset($_POST['unfollowFromList']) OR isset($_POST['followedFromList']) OR isset($_POST['unfollowedFromList']) OR   isset($_GET['followerList']) OR isset($_GET['followedList']) OR isset($_POST['seePost']) OR isset($_GET['chatwith']) OR isset($_POST['send_message']) OR isset($_GET['deleteAllmessage']) OR isset($_POST['chat_delete']) OR isset($_POST['like']) OR isset($_POST['like_in_profile']) OR isset($_POST['unlike']) OR isset($_POST['unlike_in_profile']) OR isset($_POST['like_in_profile']) OR isset($_POST['like_in_education']) OR isset($_POST['like_in_nature']) OR isset($_POST['like_in_style']) OR isset($_POST['like_in_sad']) OR isset($_POST['like_in_emotional']) OR isset($_POST['like_in_happy']) OR isset($_POST['like_in_romantic']) OR isset($_POST['like_in_cricket']) OR isset($_POST['like_in_animals']) OR isset($_POST['unlike_in_education']) OR isset($_POST['unlike_in_nature']) OR isset($_POST['unlike_in_style']) OR isset($_POST['unlike_in_sad']) OR isset($_POST['unlike_in_emotional']) OR isset($_POST['unlike_in_happy']) OR isset($_POST['unlike_in_romantic']) OR isset($_POST['unlike_in_cricket']) OR isset($_POST['unlike_in_animals']))){
        include("pages/user-navbar.php");
    }
    
?>
    <div class="container">
        <div class="row bg-light sticky-top">
            <?php if(!(isset($_GET['followerList']) OR isset($_GET['followedList']) OR  isset($_GET['chat']) OR isset($_GET['notification']) OR isset($_GET['profile']) OR isset($_GET['search']) OR isset($_POST['follow']) OR isset($_POST['unfollow']) OR isset($_GET['request']) OR isset($_GET['post']) OR isset($_GET['comment']) OR  isset($_GET['Adscomment']) OR isset($_GET['deleteComment']) OR isset($_GET['chatwith'])OR isset($_POST['send_message']) OR isset($_GET['deleteAllmessage']) OR isset($_POST['chat_delete'])  OR isset($_POST['like']) OR isset($_POST['like_in_profile']) OR isset($_POST['unlike']) OR isset($_POST['unlike_in_profile']) OR isset($_POST['like_in_education']) OR isset($_POST['like_in_nature']) OR isset($_POST['like_in_style']) OR isset($_POST['like_in_sad']) OR isset($_POST['like_in_emotional']) OR isset($_POST['like_in_happy']) OR isset($_POST['like_in_romantic']) OR isset($_POST['like_in_cricket']) OR isset($_POST['like_in_animals']) OR isset($_POST['unlike_in_education']) OR isset($_POST['unlike_in_nature']) OR isset($_POST['unlike_in_style']) OR isset($_POST['unlike_in_sad']) OR isset($_POST['unlike_in_emotional']) OR isset($_POST['unlike_in_happy']) OR isset($_POST['unlike_in_romantic']) OR isset($_POST['unlike_in_cricket']) OR isset($_POST['unlike_in_animals'])) OR isset($_GET['home'])){?>
                <?php //include("pages/follow-request.php");?>
                <div class="d-flex col-12 bg-primary p-1">
                    
                    <!-- Feed auto load from your friend -->
                    <div class="col-3 text-center"> <a href="main.php?home" class="text-light p-1" title='Home'><i class="fas fa-home"></i>
                    <!-- Notification auto load for feed-->
                    <span class='position-absolute' id='feed_load'></span>
                        <script>
                            $(document).ready(function(){
                                $("#feed_load").load("pages/feed_autoload.php");
                                setInterval(function(){
                                    $("#feed_load").load("pages/feed_autoload.php");
                                }, 1000);
                            });
                        </script> 
                    </a>
                    </div>
                    
                    <!-- Follower request Notification -->
                    <div class="col-2 text-center"> <a href="main.php?request" class="text-light p-1" title='Follow Request'><i class="fas fa-users"></i>
                        <!-- Notification auto load for follower request-->
                        <span class='position-absolute' id='num_request_load'></span>
                        <script>
                            $(document).ready(function(){
                                $("#num_request_load").load("pages/follow-request-load.php");
                                setInterval(function(){
                                    $("#num_request_load").load("pages/follow-request-load.php");
                                }, 1000);
                            });
                        </script> 
                    </a> </div>
                    
                    <!-- Message Request Notification -->
                    <div class="col-2 text-center"> <a href="main.php?chat" class="text-light p-1" title='Let"s Chat'><i class="fas fa-comment-dots"></i></a> 
                        <span id='load_unseen'></span>
                        <script>
                            $(document).ready(function(){
                                $("#load_unseen").load("pages/chat-request-load.php");
                                setInterval(function(){
                                    $("#load_unseen").load("pages/chat-request-load.php");
                                }, 1000);
                            });
                        </script> 
                    </div>
                    <div class="col-2 text-center"> <a href="main.php?notification" class="text-light p-1" title='Notification'><i class="fas fa-bell"></i></a> 
                    <span id='notification_load'></span>
                        <script>
                            $(document).ready(function(){
                                $("#notification_load").load("pages/load-my-notification.php");
                                setInterval(function(){
                                    $("#notification_load").load("pages/load-my-notification.php");
                                }, 1000);
                            });
                        </script> 
                    </div>

                    <div class="col-2 text-light text-center">
                        <a href='main.php?setting'><i class='fas fa-tools'></i></a>
                    </div>
                </div>


                <!-- Post Management -->
                <div class="col-12 d-flex" style='border:1px solid black; border-radius:0px 0px 10px 10px; box-shadow:0px 0px 3px black;'>
                    <div class="col-lg-11 col-10 d-flex text-dark">
                        <a href="main.php?post" class=' text-dark w-100 nav-link' style='cursor:text;'><div>Write Your Post...</div></a> 
                        <div class='ml-auto mt-1'>|</div>
                    </div>

                    <div class="col-lg-1 col-2" style='cursor:pointer;'>
                        <a href="main.php?post" class='nav-link text-dark'><i class='fas fa-images'></i></a>
                    </div>
                </div>

            <?php }else{
                function createNav($msg){
                    if(isset($_GET['chatwith'])){
                        $conn = db_conn();
                        $chatWithUser = filter_data($_GET['chatwith']);
                        $obj = mysqli_query($conn,"SELECT `user_id`,`filename`,`profile_location`,`fname`,`lname` FROM `users` WHERE `user_id` = $chatWithUser;");
                        $rows = mysqli_fetch_assoc($obj);
                        echo "<div class='col-12 p-1 d-flex bg-primary box-shadow-black font-cambria'>
                            <div class='col-1 text-center'><a href='main.php?chat' class='text-light'><i class='fas fa-backward'></i></a></div>
                            <div class='col-9 text-capitalize font-weight-bold text-center text-light' style='letter-spacing:1px;'>".$msg."</div>
                            <div class='col-1'><a href='main.php?profile=".$_GET['chatwith']."' title='Go to Profile'> <img class='box-shadow-black' src='../signup-process/".$rows['profile_location']."' style='width:20px;height:20px; border-radius:50%; border:1px solid gray;'></a></div>
                        </div>";
                    }else{
                        echo "<div class='col-12 p-1 d-flex bg-primary box-shadow-black font-cambria'>
                            <div class='col-1 text-center'><a href='main.php' class='text-light'><i class='fas fa-backward'></i></a></div>
                            <div class='col-11 font-weight-bold text-center text-light' style='letter-spacing:1px;'>".$msg."</div>
                        </div>";
                    }
                }
                if(isset($_GET['request'])){
                    createNav("Follower's Requests");
                }
                if(isset($_GET['search'])){
                    createNav("Search Any users!");
                }
                if(isset($_GET['profile'])){
                    createNav("Users's Profile");
                }
                if(isset($_GET['notification'])){
                    createNav("Notification");
                }
                if(isset($_GET['chat'])){
                    createNav("Let's Chat");
                }
                if(isset($_GET['post'])){
                    createNav("Post Anything.");
                }
                if(isset($_GET['comment']) ||  isset($_GET['Adscomment'])){
                    createNav("Post's Comment");
                }
                if(isset($_GET['chatwith'])){
                    $chatWithUser = filter_data($_GET['chatwith']);
                    $conn = db_conn();
                    $obj = mysqli_query($conn,"SELECT `user_id`,`filename`,`profile_location`,`fname`,`lname` FROM `users` WHERE `user_id` = $chatWithUser;");
                    $rows = mysqli_fetch_assoc($obj);
                    createNav("Chat with ".$rows['fname']);
                }
            }?>
        </div>
        <?php
    if(isset($_GET)){
        echo '<div id="alert">';
            if(isset($_GET['success'])){
                echo "<script> successAlert('".$_GET['success']."');</script>";
            }
            if(isset($_GET['error'])){
                echo "<script> dangerAlert('".$_GET['error']."');</script>";
            }
            if(isset($_GET['warning'])){
                echo "<script> warningAlert('".$_GET['warning']."');</script>";
            }
        echo '</div>';
        }
?>
        
        

        <div>
            <?php
                // Home page mangement
                if(!(isset($_POST['follow']) OR isset($_POST['unfollow']) OR isset($_POST['followProfile']) OR isset($_POST['unfollowProfile']) OR isset($_POST['followFromList']) OR isset($_POST['unfollowFromList']) OR isset($_POST['followedFromList']) OR isset($_POST['unfollowedFromList']) OR isset($_GET['followerList']) OR isset($_GET['followedList']) OR isset($_GET['setting']) OR isset($_POST['seePost']) OR isset($_GET['home']) || isset($_GET['chat']) || isset($_GET['notification']) OR isset($_GET['profile']) OR isset($_GET['search']) OR isset($_POST['follow']) OR isset($_POST['unfollow']) || isset($_GET['request']) || isset($_GET['post']) || isset($_GET['comment']) ||  isset($_GET['Adscomment']) || isset($_GET['deleteComment']) OR isset($_GET['chatwith']) OR isset($_POST['send_message']) OR isset($_GET['deleteAllmessage']) OR isset($_POST['chat_delete'])  OR isset($_POST['like']) OR isset($_POST['like_in_profile']) OR isset($_POST['unlike']) OR isset($_POST['unlike_in_profile']) OR isset($_POST['like_in_education']) OR isset($_POST['like_in_nature']) OR isset($_POST['like_in_style']) OR isset($_POST['like_in_sad']) OR isset($_POST['like_in_emotional']) OR isset($_POST['like_in_happy']) OR isset($_POST['like_in_romantic']) OR isset($_POST['like_in_cricket']) OR isset($_POST['like_in_animals']) OR isset($_POST['unlike_in_education']) OR isset($_POST['unlike_in_nature']) OR isset($_POST['unlike_in_style']) OR isset($_POST['unlike_in_sad']) OR isset($_POST['unlike_in_emotional']) OR isset($_POST['unlike_in_happy']) OR isset($_POST['unlike_in_romantic']) OR isset($_POST['unlike_in_cricket']) OR isset($_POST['unlike_in_animals'])) || isset($_GET['home'])){
                        if(isset($_GET['home'])){
                            $obj = mysqli_query($conn,"SELECT * FROM users");
                            while($rows = mysqli_fetch_assoc($obj)){

                                $user_id = $rows['user_id'];
                                $follow_1 = mysqli_query($conn,"SELECT * FROM follower_manage WHERE followed_by = $current_user AND follow_user = $user_id");
                                $follow_2 = mysqli_query($conn,"SELECT * FROM follower_manage WHERE followed_by = $user_id AND follow_user = $current_user");
                                
                                $follow_value1 = mysqli_num_rows($follow_1);
                                $follow_value2 = mysqli_num_rows($follow_2);
                                
                                if($follow_value1 == 1 AND $follow_value2 == 1){
                                    // Follow request...............
                                    $userObj = mysqli_query($conn,"SELECT * FROM post_notification WHERE user_id = $user_id ORDER BY notification_id DESC;");
                                    if(mysqli_num_rows($userObj) != 0){
                                        $is_seen_rows = mysqli_fetch_assoc($userObj);
                                        if($is_seen_rows['is_seen'] == 0){
                                            mysqli_query($conn,"UPDATE post_notification SET is_seen = TRUE WHERE user_id = $user_id;");
                                        }
                                    }
                                }
                            }
                        }                   
                        // .................................................................................
                    include("pages/home.php");
                }
                
                // follow request manage
                if(isset($_GET['request'])){
                    include("pages/follow-request.php");
                }

                // users chating manage
                if(isset($_GET['chat']) OR isset($_GET['chatwith'])){
                    include("pages/chat.php");
                }

                // notification manage
                if(isset($_GET['notification'])){
                    include("pages/notification.php");
                }

                if(isset($_GET['setting'])){
                    include("pages/setting.php");
                }

                if(isset($_GET['followerList']) OR isset($_GET['followedList'])){
                    include("pages/follower-and-followed-list.php");
                }




                // Post management
                if(isset($_GET['post'])){
                    include("pages/create-post.php");
                }

                // profile management
                if(isset($_GET['profile']) || isset($_GET['postId'])){
                    include("pages/profile.php");
                }


                // Search
                if(isset($_GET['search'])){
                   include("pages/search.php");
                }


                // comment
                if(isset($_GET['comment']) OR isset($_GET['Adscomment'])){
                    if(isset($_GET['comment'])){
                        include("pages/home.php");
                    }else if(isset($_GET['Adscomment'])){
                        include("pages/commentForAds.php");
                    }
                }
                
                // See my post-------------------
                if(isset($_POST['seePost'])){
                    foreach ($_POST as $key => $value) {
                        if($value == ''){
                            echo "<script>window.location.href='main.php?notification';</script>";
                        }
                    }
                    $pId = filter_data($_POST['pId']);
                    $uId = filter_data($_POST['uId']);
                    $cId = filter_data($_POST['cId']);
                    if(isset($_POST['likesee'])){
                        mysqli_query($conn,"UPDATE likes SET is_seen = TRUE WHERE post_id = $pId AND user_id = $uId;");
                    }else{
                        mysqli_query($conn,"UPDATE comments SET is_seen = TRUE WHERE post_id = $pId AND user_id = $uId;");
                    }
                    $obj = mysqli_query($conn,"SELECT * FROM notification WHERE user_id = $current_user;");
                    $rows = mysqli_fetch_assoc($obj);
                    if($rows['num_of_notification'] > 0){
                        $num_of_notification = $rows['num_of_notification'] - 1;
                        mysqli_query($conn,"UPDATE notification SET num_of_notification = $num_of_notification WHERE user_id = $current_user;");
                    }
                    echo "<script>window.location.href='main.php?comment=".$pId."';</script>";
                }
                if(isset($_POST['send_message'])){
                    $current_user = filter_data($_POST['current_user']);
                    $chatWithUser = filter_data($_POST['chatwith_user']);
                    $message = filter_data($_POST['message']);
                    $profile = filter_data($_POST['profile']);

                    mysqli_query($conn,"INSERT INTO `chat_manage` (`user_id`,`chat_with`,`chat`) VALUES ('$current_user','$chatWithUser','$message');");
                    $chat_obj = mysqli_query($conn,"SELECT * FROM `chat_manage` WHERE `user_id` = $current_user AND `chat_with` = $chatWithUser OR `user_id` = $chatWithUser AND `chat_with` = $current_user ORDER BY `chat_id` DESC;");
                    $rows = mysqli_fetch_assoc($chat_obj);
                    header("location:main.php?chatwith=".$chatWithUser."#eof");
                }
            ?>
        </div>
    </div>

    <!-- Deleting post -->
    <?php
    if(isset($_GET['deletePost'])){
        include("pages/delete-post.php");
    }
    ?>

    <!-- Follower Manager -->
    <?php
      include("pages/follower.php");
    ?>


    <!-- Likes management -->
    <?php
       include("pages/likes.php");
    ?>
    

    <!-- Comment manage -->
    <?php
       include("pages/comment-manage.php");   
        
        
        // All chating delete
        if(isset($_GET['deleteAllmessage'])){
            $deleteChatWith = filter_data($_GET['deleteAllmessage']);
            $deleteMessage = "This message was Deleted";
            mysqli_query($conn,"UPDATE `chat_manage` SET `chat` = '$deleteMessage'  WHERE `user_id` = $current_user AND `chat_with` = $deleteChatWith");
            echo "<script>window.location.href='main.php?chatwith=".$deleteChatWith."';</script>";
        }
        
        // single chat delete
        if(isset($_POST['chat_delete'])){
            $chatWith = filter_data($_POST['chatWith']);
            $id = filter_data($_POST['id_counter']);
            $id = $id - 1;
            $chatId = filter_data($_POST['chat_delete']);
            mysqli_query($conn,"DELETE FROM chat_manage WHERE chat_id = $chatId;");
            echo "<script>window.location.href='main.php?chatwith=".$chatWith."#".$id."';</script>";
        }
    ?>



    <div class="bg-black">
        <?php 
        if(!(isset($_GET['followerList']) OR isset($_GET['followedList']) OR isset($_POST['seePost']) OR isset($_POST['like']) OR isset($_POST['like_in_profile']) OR isset($_POST['unlike']) OR isset($_POST['unlike_in_profile']) OR isset($_GET['search']) OR isset($_GET['chat']) OR isset($_GET['notification']) OR isset($_GET['request']) OR isset($_GET['post']) OR isset($_GET['comment']) OR  isset($_GET['Adscomment']) OR isset($_GET['deleteComment']) OR isset($_GET['chatwith']) OR isset($_POST['send_message']) OR isset($_GET['deleteAllmessage']) OR isset($_POST['chat_delete']) OR isset($_POST['like_in_education']) OR isset($_POST['like_in_nature']) OR isset($_POST['like_in_style']) OR isset($_POST['like_in_sad']) OR isset($_POST['like_in_emotional']) OR isset($_POST['like_in_happy']) OR isset($_POST['like_in_romantic']) OR isset($_POST['like_in_cricket']) OR isset($_POST['like_in_animals']) OR isset($_POST['unlike_in_education']) OR isset($_POST['unlike_in_nature']) OR isset($_POST['unlike_in_style']) OR isset($_POST['unlike_in_sad']) OR isset($_POST['unlike_in_emotional']) OR isset($_POST['unlike_in_happy']) OR isset($_POST['unlike_in_romantic']) OR isset($_POST['unlike_in_cricket']) OR isset($_POST['unlike_in_animals']))){
        // include("../../include/copyright.php");
        }
        ?>
    </div>
<?php

}else{
    header("location:../../index.php?error=Error404 : Unautorized access..!");
}
?>
</body>
</html>
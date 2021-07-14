<?php
function NoFeed(){
   return "<div class='text-center d-flex justify-content-center align-items-center w-100 p-5 font-weight-bold text-danger' style='height:80vh;'><i class='far fa-envelope'></i> &nbspNo Feed availble..</div>";
}
$alreadyRun = false;
if(!(isset($_GET['profile']) OR isset($_POST['like_in_profile']) OR isset($_POST['unlike_in_profile']) OR isset($_GET['comment']))){  
?>
    <div class="d-flex text-center mt-2 p-1" style='overflow-x:scroll;height:55px;'>
    <?php if(isset($_GET['all'])){
        $allBg = "bg-primary";
        $educationBg = "bg-dark";
        $natureBg = "bg-dark";
        $animalsBg = "bg-dark";
        $cricketBg = "bg-dark";
        $romanticBg = "bg-dark";
        $happyBg = "bg-dark";
        $emotionalBg = "bg-dark";
        $sadBg = "bg-dark";
        $styleBg = "bg-dark";
    }else if(isset($_GET['education'])){
        $allBg = "bg-dark";
        $educationBg = "bg-primary";
        $natureBg = "bg-dark";
        $animalsBg = "bg-dark";
        $cricketBg = "bg-dark";
        $romanticBg = "bg-dark";
        $happyBg = "bg-dark";
        $emotionalBg = "bg-dark";
        $sadBg = "bg-dark";
        $styleBg = "bg-dark";        
    }else if(isset($_GET['nature'])){
        $allBg = "bg-dark";
        $educationBg = "bg-dark";
        $natureBg = "bg-primary";
        $animalsBg = "bg-dark";
        $cricketBg = "bg-dark";
        $romanticBg = "bg-dark";
        $happyBg = "bg-dark";
        $emotionalBg = "bg-dark";
        $sadBg = "bg-dark";
        $styleBg = "bg-dark";
    }else if(isset($_GET['style'])){
        $allBg = "bg-dark";
        $educationBg = "bg-dark";
        $natureBg = "bg-dark";
        $animalsBg = "bg-dark";
        $cricketBg = "bg-dark";
        $romanticBg = "bg-dark";
        $happyBg = "bg-dark";
        $emotionalBg = "bg-dark";
        $sadBg = "bg-dark";
        $styleBg = "bg-primary";
    }else if(isset($_GET['sad'])){
        $allBg = "bg-dark";
        $educationBg = "bg-dark";
        $natureBg = "bg-dark";
        $animalsBg = "bg-dark";
        $cricketBg = "bg-dark";
        $romanticBg = "bg-dark";
        $happyBg = "bg-dark";
        $emotionalBg = "bg-dark";
        $sadBg = "bg-primary";
        $styleBg = "bg-dark";
    }else if(isset($_GET['emotional'])){
        $allBg = "bg-dark";
        $educationBg = "bg-dark";
        $natureBg = "bg-dark";
        $animalsBg = "bg-dark";
        $cricketBg = "bg-dark";
        $romanticBg = "bg-dark";
        $happyBg = "bg-dark";
        $emotionalBg = "bg-primary";
        $sadBg = "bg-dark";
        $styleBg = "bg-dark";
    }else if(isset($_GET['happy'])){
        $allBg = "bg-dark";
        $educationBg = "bg-dark";
        $natureBg = "bg-dark";
        $animalsBg = "bg-dark";
        $cricketBg = "bg-dark";
        $romanticBg = "bg-dark";
        $happyBg = "bg-primary";
        $emotionalBg = "bg-dark";
        $sadBg = "bg-dark";
        $styleBg = "bg-dark";
    }else if(isset($_GET['romantic'])){
        $allBg = "bg-dark";
        $educationBg = "bg-dark";
        $natureBg = "bg-dark";
        $animalsBg = "bg-dark";
        $cricketBg = "bg-dark";
        $romanticBg = "bg-primary";
        $happyBg = "bg-dark";
        $emotionalBg = "bg-dark";
        $sadBg = "bg-dark";
        $styleBg = "bg-dark";
    }else if(isset($_GET['cricket'])){
        $allBg = "bg-dark";
        $educationBg = "bg-dark";
        $natureBg = "bg-dark";
        $animalsBg = "bg-dark";
        $cricketBg = "bg-primary";
        $romanticBg = "bg-dark";
        $happyBg = "bg-dark";
        $emotionalBg = "bg-dark";
        $sadBg = "bg-dark";
        $styleBg = "bg-dark";
    }else if(isset($_GET['animals'])){
        $allBg = "bg-dark";
        $educationBg = "bg-dark";
        $natureBg = "bg-dark";
        $animalsBg = "bg-primary";
        $cricketBg = "bg-dark";
        $romanticBg = "bg-dark";
        $happyBg = "bg-dark";
        $emotionalBg = "bg-dark";
        $sadBg = "bg-dark";
        $styleBg = "bg-dark";
    }else{
        $allBg = "bg-primary";
        $educationBg = "bg-dark";
        $natureBg = "bg-dark";
        $animalsBg = "bg-dark";
        $cricketBg = "bg-dark";
        $romanticBg = "bg-dark";
        $happyBg = "bg-dark";
        $emotionalBg = "bg-dark";
        $sadBg = "bg-dark";
        $styleBg = "bg-dark";
    }
    
    ?>
        <div class="ml-md-5" ><a href="main.php?all" class=' px-3 py-1 <?php echo $allBg;?>' style='border-radius:30px; box-shadow:0px 0px 3px black; text-decoration:none;'>All</a></div>
        <div class="ml-md-5" ><a href="main.php?education" class=' px-3 py-1 <?php echo $educationBg;?>' style='border-radius:30px; box-shadow:0px 0px 3px black; text-decoration:none;'>Educational</a></div>
        <div class="ml-md-5" ><a href="main.php?nature" class=' px-3 py-1 <?php echo $natureBg;?>' style='border-radius:30px; box-shadow:0px 0px 3px black; text-decoration:none;'>Nature</a></div>
        <div class="ml-md-5" ><a href="main.php?style" class=' px-3 py-1 <?php echo $styleBg;?>' style='border-radius:30px; box-shadow:0px 0px 3px black; text-decoration:none;'>Model</a></div>
        <div class="ml-md-5" ><a href="main.php?sad" class=' px-3 py-1 <?php echo $sadBg;?>' style='border-radius:30px; box-shadow:0px 0px 3px black; text-decoration:none;'>Sad</a></div>
        <div class="ml-md-5" ><a href="main.php?emotional" class=' px-3 py-1 <?php echo $emotionalBg;?>' style='border-radius:30px; box-shadow:0px 0px 3px black; text-decoration:none;'>Emotional</a></div>
        <div class="ml-md-5" ><a href="main.php?happy" class=' px-3 py-1 <?php echo $happyBg;?>' style='border-radius:30px; box-shadow:0px 0px 3px black; text-decoration:none;'>Happy</a></div>
        <div class="ml-md-5" ><a href="main.php?romantic" class=' px-3 py-1 <?php echo $romanticBg;?>' style='border-radius:30px; box-shadow:0px 0px 3px black; text-decoration:none;'>Romantic</a></div>
        <div class="ml-md-5" ><a href="main.php?cricket" class=' px-3 py-1 <?php echo $cricketBg;?>' style='border-radius:30px; box-shadow:0px 0px 3px black; text-decoration:none;'>Cricket</a></div>
        <div class="ml-md-5" ><a href="main.php?animals" class=' px-3 py-1 <?php echo $animalsBg;?>' style='border-radius:30px; box-shadow:0px 0px 3px black; text-decoration:none;'>Animals</a></div>
    </div>
<?php


                    // ----------------- Ads show ------------------------
    if(isset($_GET['home']) OR isset($_GET['all'])){
        $adsObj = mysqli_query($conn,"SELECT * FROM sponsor ORDER BY sponsor_id DESC");
        if(mysqli_num_rows($adsObj) != 0){
            $adsRow = mysqli_fetch_assoc($adsObj);
            ?>
                <div class="row box-shadow-black mt-2 p-2" id='Ads'>
                    <div class="col-12 bg-dark text-light d-flex text-center">
                        <div class="col-11 text-left">Sponsored Ads <i class='fas fa-bullhorn '></i></div>
                        <div class="col-1"><button onclick='hideAds();' class='button-none text-light'>&times;</button></div>
                    </div><hr class='w-100'>
                    <div class="col-12  text-capitalize"><?php echo $adsRow['sponsor_title'];?></div>
                    <div class="col-12 text-center"><img class='img-responsive' src="../admin/pages/<?php echo $adsRow['sponsor_img_location'];?>" alt="" style='width:100%;max-width:400px;max-height:400px;'></div>
                    <div class="col-12 font-weight-bold">
                        <?php 
                            $adsId = $adsRow['sponsor_id'];
                            $likeObj = mysqli_query($conn,"SELECT s.*,u.fname FROM sponsor_likes AS s INNER JOIN users AS u ON s.user_id = u.user_id WHERE s.sponsor_id = $adsId ORDER BY s.like_id DESC"); 
                            $numOfLikes = mysqli_num_rows($likeObj);

                            $commentObj = mysqli_query($conn,"SELECT s.*,u.fname FROM sponsor_comments AS s INNER JOIN users AS u ON s.user_id = u.user_id WHERE s.sponsor_id = $adsId"); 
                            $numOfComment = mysqli_num_rows($commentObj);
                            if(mysqli_num_rows($likeObj) != 0){
                                $likeData = mysqli_fetch_assoc($likeObj);
                                if($numOfLikes == 1){
                                    echo "<i class='fas fa-user-circle'></i> ".$likeData['fname']." was liked this ads...";
                                }else{
                                    $numOfLike = $numOfLikes - 1;
                                    echo "<i class='fas fa-user-circle'></i> ".$likeData['fname']." and ".$numOfLike." other liked this ads...";
                                }
                            }
                        ?>
                    </div>
                    <div class="col-12 d-flex text-center text-danger p-2">
                        <div class="col-6"><a href="pages/ads.php?like=<?php echo $adsRow['sponsor_id'];?>" class='text-dagner text-danger' style='text-decoration:none;'>
                            <?php 
                                $likeObj = mysqli_query($conn,"SELECT * FROM sponsor_likes WHERE user_id = $current_user AND sponsor_id = $adsId");
                                if(mysqli_num_rows($likeObj) == 0){
                                    $like =  "<i class='far fa-heart'></i>";
                                }else{
                                    $like = "<i class='fas fa-heart'></i>";
                                }
                                echo $like." <span class='text-dark'>".$numOfLikes."</span>";
                            ?>
                        </a></div>
                        <!--  ads comment -->
                        <div class="col-6">
                            <a style='text-decoration:none;' href="main.php?Adscomment=<?php echo $adsRow['sponsor_id'];?>" class='text-dagner text-danger'><i class='far fa-comment-alt'></i> <?php echo "<span class='text-dark'>".$numOfComment."<span>";?></a>
                        </div>
                    </div>
                </div>
                <script>
                    function hideAds(){
                        document.getElementById("Ads").style.display='none';
                    }
                </script>
            <?php
        }
    }


    // ------------- How many post show from spesific user ----------------------------
    $min = 0;
    $max = 1;
    // -----------------------------------------------------------------------------------

    // Dynamic function for data fetch toggler formate
    function dynamicQuery($conn,$privacy,$category){
        $randNum = mt_rand(0,11);
        if($randNum == 0){
            return mysqli_query($conn,"SELECT p.*, u.profile_location, u.user_id, u.fname, u.lname, u.filename, u.profile_location FROM users AS u INNER JOIN posts AS p ON u.user_id = p.user_id WHERE p.privacy = '$privacy' AND p.category = '$category' OR p.mood = '$category' GROUP BY p.user_id ORDER BY p.post_id DESC;");
        }else if($randNum == 1){
            return mysqli_query($conn,"SELECT p.*, u.profile_location, u.user_id, u.fname, u.lname, u.filename, u.profile_location FROM users AS u INNER JOIN posts AS p ON u.user_id = p.user_id WHERE p.privacy = '$privacy' AND p.category = '$category' OR p.mood = '$category' GROUP BY p.user_id ORDER BY p.post_title DESC;");  
        }else if($randNum == 2){
            return mysqli_query($conn,"SELECT p.*, u.profile_location, u.user_id, u.fname, u.lname, u.filename, u.profile_location FROM users AS u INNER JOIN posts AS p ON u.user_id = p.user_id WHERE p.privacy = '$privacy' AND p.category = '$category' OR p.mood = '$category' GROUP BY p.user_id ORDER BY p.mood DESC;"); 
        }else if($randNum == 3){
            return mysqli_query($conn,"SELECT p.*, u.profile_location, u.user_id, u.fname, u.lname, u.filename, u.profile_location FROM users AS u INNER JOIN posts AS p ON u.user_id = p.user_id WHERE p.privacy = '$privacy' AND p.category = '$category' OR p.mood = '$category' GROUP BY p.user_id ORDER BY p.c_date DESC;");        
        }else if($randNum == 4){
            return mysqli_query($conn,"SELECT p.*, u.profile_location, u.user_id, u.fname, u.lname, u.filename, u.profile_location FROM users AS u INNER JOIN posts AS p ON u.user_id = p.user_id WHERE p.privacy = '$privacy' AND p.category = '$category' OR p.mood = '$category' GROUP BY p.user_id ORDER BY p.c_time DESC;"); 
        }else if($randNum == 5){
            return mysqli_query($conn,"SELECT p.*, u.profile_location, u.user_id, u.fname, u.lname, u.filename, u.profile_location FROM users AS u INNER JOIN posts AS p ON u.user_id = p.user_id WHERE p.privacy = '$privacy' AND p.category = '$category' OR p.mood = '$category' GROUP BY p.user_id ORDER BY p.user_id DESC;");
        }else if($randNum == 6){
            return mysqli_query($conn,"SELECT p.*, u.profile_location, u.user_id, u.fname, u.lname, u.filename, u.profile_location FROM users AS u INNER JOIN posts AS p ON u.user_id = p.user_id WHERE p.privacy = '$privacy' AND p.category = '$category' OR p.mood = '$category' GROUP BY p.user_id ORDER BY p.post_id;");
        }else if($randNum == 7){
            return mysqli_query($conn,"SELECT p.*, u.profile_location, u.user_id, u.fname, u.lname, u.filename, u.profile_location FROM users AS u INNER JOIN posts AS p ON u.user_id = p.user_id WHERE p.privacy = '$privacy' AND p.category = '$category' OR p.mood = '$category' GROUP BY p.user_id ORDER BY p.post_title;");  
        }else if($randNum == 8){
            return mysqli_query($conn,"SELECT p.*, u.profile_location, u.user_id, u.fname, u.lname, u.filename, u.profile_location FROM users AS u INNER JOIN posts AS p ON u.user_id = p.user_id WHERE p.privacy = '$privacy' AND p.category = '$category' OR p.mood = '$category' GROUP BY p.user_id ORDER BY p.mood;"); 
        }else if($randNum == 9){
            return mysqli_query($conn,"SELECT p.*, u.profile_location, u.user_id, u.fname, u.lname, u.filename, u.profile_location FROM users AS u INNER JOIN posts AS p ON u.user_id = p.user_id WHERE p.privacy = '$privacy' AND p.category = '$category' OR p.mood = '$category' GROUP BY p.user_id ORDER BY p.c_date;");        
        }else if($randNum == 10){
            return mysqli_query($conn,"SELECT p.*, u.profile_location, u.user_id, u.fname, u.lname, u.filename, u.profile_location FROM users AS u INNER JOIN posts AS p ON u.user_id = p.user_id WHERE p.privacy = '$privacy' AND p.category = '$category' OR p.mood = '$category' GROUP BY p.user_id ORDER BY p.c_time;"); 
        }else if($randNum == 11){
            return mysqli_query($conn,"SELECT p.*, u.profile_location, u.user_id, u.fname, u.lname, u.filename, u.profile_location FROM users AS u INNER JOIN posts AS p ON u.user_id = p.user_id WHERE p.privacy = '$privacy' AND p.category = '$category' OR p.mood = '$category' GROUP BY p.user_id ORDER BY p.user_id;");
        }
    }
    
    if(isset($_GET['education'])){
        $obj = dynamicQuery($conn,'public','education');
        if(mysqli_num_rows($obj) == 0){
            echo "<div class='text-center d-flex justify-content-center align-items-center w-100 p-5 font-weight-bold text-danger' style='height:80vh;'><i class='far fa-envelope'></i> &nbspNo Feed availble..</div>";
        }else{
            include("pages/feeds.php");    
        }
        // ---------------------------------

    }else if(isset($_GET['nature'])){
        $obj = dynamicQuery($conn,'public','nature');
        if(mysqli_num_rows($obj) == 0){
            echo "<div class='text-center d-flex justify-content-center align-items-center w-100 p-5 font-weight-bold text-danger' style='height:80vh;'><i class='far fa-envelope'></i> &nbspNo Feed availble..</div>";
        }else{
            include("pages/feeds.php");    
        }
    }else if(isset($_GET['style'])){
        $obj = dynamicQuery($conn,'public','style');
        if(mysqli_num_rows($obj) == 0){
            echo "<div class='text-center d-flex justify-content-center align-items-center w-100 p-5 font-weight-bold text-danger' style='height:80vh;'><i class='far fa-envelope'></i> &nbspNo Feed availble..</div>";
        }else{
            include("pages/feeds.php");    
        }


    }else if(isset($_GET['sad'])){
        $obj = dynamicQuery($conn,'public','sad');
        if(mysqli_num_rows($obj) == 0){
            echo "<div class='text-center d-flex justify-content-center align-items-center w-100 p-5 font-weight-bold text-danger' style='height:80vh;'><i class='far fa-envelope'></i> &nbspNo Feed availble..</div>";
        }else{
            include("pages/feeds.php");    
        }
    }else if(isset($_GET['emotional'])){
        $obj = dynamicQuery($conn,'public','emotional');
        if(mysqli_num_rows($obj) == 0){
            echo "<div class='text-center d-flex justify-content-center align-items-center w-100 p-5 font-weight-bold text-danger' style='height:80vh;'><i class='far fa-envelope'></i> &nbspNo Feed availble..</div>";
        }else{
            include("pages/feeds.php");    
        }


    }else if(isset($_GET['happy'])){
        $obj = dynamicQuery($conn,'public','happy');
        if(mysqli_num_rows($obj) == 0){
            echo "<div class='text-center d-flex justify-content-center align-items-center w-100 p-5 font-weight-bold text-danger' style='height:80vh;'><i class='far fa-envelope'></i> &nbspNo Feed availble..</div>";
        }else{
            include("pages/feeds.php");    
        }
    }else if(isset($_GET['romantic'])){
        $obj = dynamicQuery($conn,'public','romantic');
        if(mysqli_num_rows($obj) == 0){
            echo "<div class='text-center d-flex justify-content-center align-items-center w-100 p-5 font-weight-bold text-danger' style='height:80vh;'><i class='far fa-envelope'></i> &nbspNo Feed availble..</div>";
        }else{
            include("pages/feeds.php");    
        }
    }else if(isset($_GET['cricket'])){
        $obj = dynamicQuery($conn,'public','cricket');
        if(mysqli_num_rows($obj) == 0){
            echo "<div class='text-center d-flex justify-content-center align-items-center w-100 p-5 font-weight-bold text-danger' style='height:80vh;'><i class='far fa-envelope'></i> &nbspNo Feed availble..</div>";
        }else{
            include("pages/feeds.php");    
        }
    }else if(isset($_GET['animals'])){
        $obj = dynamicQuery($conn,'public','animals');
        if(mysqli_num_rows($obj) == 0){
            echo "<div class='text-center d-flex justify-content-center align-items-center w-100 p-5 font-weight-bold text-danger' style='height:80vh;'><i class='far fa-envelope'></i> &nbspNo Feed availble..</div>";
        }else{
            include("pages/feeds.php");    
        }
    }else{
        // If user fetch all data ....................
        // If user are fiend....................
    //    Do not print user because both are friend

            $randNum = mt_rand(0,13);
                if($randNum == 0){
                    $userOBJ = mysqli_query($conn,"SELECT user_id FROM users ORDER BY user_id DESC");
                }else if($randNum == 1){
                    $userOBJ = mysqli_query($conn,"SELECT user_id FROM users ORDER BY user_id");
                }else if($randNum == 2){
                    $userOBJ = mysqli_query($conn,"SELECT user_id FROM users ORDER BY fname DESC");                    
                }else if($randNum == 3){
                    $userOBJ = mysqli_query($conn,"SELECT user_id FROM users ORDER BY fname");               
                }else if($randNum == 4){
                    $userOBJ = mysqli_query($conn,"SELECT user_id FROM users ORDER BY lname DESC");      
                }else if($randNum == 5){
                    $userOBJ = mysqli_query($conn,"SELECT user_id FROM users ORDER BY lname");      
                }else if($randNum == 6){
                    $userOBJ = mysqli_query($conn,"SELECT user_id FROM users ORDER BY email DESC");  
                }else if($randNum == 7){
                    $userOBJ = mysqli_query($conn,"SELECT user_id FROM users ORDER BY email");    
                }else if($randNum == 8){
                    $userOBJ = mysqli_query($conn,"SELECT user_id FROM users ORDER BY gender DESC");     
                }else if($randNum == 9){
                    $userOBJ = mysqli_query($conn,"SELECT user_id FROM users ORDER BY gender");     
                }else if($randNum == 10){
                    $userOBJ = mysqli_query($conn,"SELECT user_id FROM users ORDER BY c_time DESC");     
                }else if($randNum == 11){
                    $userOBJ = mysqli_query($conn,"SELECT user_id FROM users ORDER BY c_time");     
                }else if($randNum == 12){
                    $userOBJ = mysqli_query($conn,"SELECT user_id FROM users ORDER BY c_date DESC");     
                }else if($randNum == 13){
                    $userOBJ = mysqli_query($conn,"SELECT user_id FROM users ORDER BY c_date");     
                }
        // ------------------------------------------------    
        $alreadyRun = false;
        while($rows = mysqli_fetch_assoc($userOBJ)){
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
                    $follower_obj = mysqli_query($conn,"SELECT * FROM `follower_manage` WHERE `followed_by` = '$current_user' AND  `follow_user` = '$user_id';");
                    $num_of_rows = mysqli_num_rows($follower_obj);
                    if($follow_value1 == 1 AND $follow_value2 == 1 OR $num_of_rows == 1){
                        // $random = mt_rand(0,8);
                        $obj = mysqli_query($conn,"SELECT p.*, u.profile_location, u.user_id, u.fname, u.lname, u.filename, u.profile_location FROM users AS u INNER JOIN posts AS p ON u.user_id = p.user_id WHERE p.privacy = 'public' AND p.user_id = $user_id ORDER BY p.post_id DESC LIMIT $min,$max;");
                        include("pages/feeds.php");
                        $alreadyRun = true;
                    }
                }
            }
        }

    }
    // $obj = mysqli_query($conn,"SELECT p.*, u.profile_location, u.user_id, u.fname, u.lname, u.filename, u.profile_location FROM users AS u INNER JOIN posts AS p ON u.user_id = p.user_id ORDER BY p.post_id DESC;");
}else if(isset($_GET['comment'])){
    $post_id = filter_data($_GET['comment']);
    $obj = mysqli_query($conn,"SELECT p.*, u.profile_location, u.user_id, u.fname, u.lname, u.filename, u.profile_location FROM users AS u INNER JOIN posts AS p ON u.user_id = p.user_id WHERE p.post_id = $post_id;");
    if(mysqli_num_rows($obj) == 0){
        echo NoFeed();
    }else{
        include("pages/feeds.php");  
    }

    // --------------------- User's Profile -----------------------------------
}else if($_GET['profile']){
    $profile_id = filter_data($_GET['profile']);
    $obj = mysqli_query($conn,"SELECT p.*, u.profile_location, u.user_id, u.fname, u.lname, u.filename, u.profile_location FROM users AS u INNER JOIN posts AS p ON u.user_id = p.user_id WHERE p.user_id = $profile_id OR u.user_id = $profile_id ORDER BY p.post_id DESC;");
    if(mysqli_num_rows($obj) == 0){
        echo NoFeed();
    }else{
        include("pages/feeds.php");    
    }
}

// echo '<center><div class="col-lg-10"><a href="main.php" class="btn btn-primary btn-block"><i class="fas fa-recycle"></i>  Refress</a></div></center>';

if($alreadyRun == false AND !(isset($_GET['profile']) OR isset($_GET['education']) OR isset($_GET['nature']) OR isset($_GET['style']) OR isset($_GET['sad']) OR isset($_GET['emotional']) OR isset($_GET['happy']) OR isset($_GET['romantic']) OR isset($_GET['cricket']) OR isset($_GET['animals']))){
    echo "<div class='text-center d-flex justify-content-center align-items-center w-100 p-5 font-weight-bold text-danger' style='height:70vh;'>+------------------ No Feed availble ------------------+<br> Make a friend and see Awesome pictures.. <br>OR Filter your feed According your mood with Discover feature<br>+-----------------------------------+</div>";
}
?>
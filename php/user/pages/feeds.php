<?php
     // Post area
    //  echo "hii";
     if(!(isset($_GET['profile']) OR isset($_POST['like_in_profile']) OR isset($_POST['unlike_in_profile']) OR isset($_GET['comment']))){
        
        // Refresh button...........................
    //    echo '<center><div class="col-lg-10"><a href="main.php" class="btn btn-primary btn-block"><i class="fas fa-recycle"></i>  Refress</a></div></center>';
     }
     while($rows = mysqli_fetch_assoc($obj)){
            $alreadyRun = true;
            $user_id = $rows['user_id'];
            $follower_obj = mysqli_query($conn,"SELECT * FROM `follower_manage` WHERE `followed_by` = '$current_user' AND  `follow_user` = '$user_id';");
            $num_of_rows = mysqli_num_rows($follower_obj);
            $follow_1 = mysqli_query($conn,"SELECT * FROM follower_manage WHERE followed_by = $current_user AND follow_user = $user_id");
            $follow_2 = mysqli_query($conn,"SELECT * FROM follower_manage WHERE followed_by = $user_id AND follow_user = $current_user");
            
            $follow_value1 = mysqli_num_rows($follow_1);
            $follow_value2 = mysqli_num_rows($follow_2);
            $post_id = $rows['post_id'];
         if($rows['user_id'] == $_SESSION['tsn-login']['id']){
             $edit_btn = "<div class='col-6 mt-2' title='Delete Post'><a href='main.php?deletePost=".$rows['post_id']."'><i class='fas fa-trash'></i></a></div> <div class='col-6 mt-2' title='Edit Post'><i class='fas fa-edit'></i></div>";
             $title    = "<textarea name='title' rows='2' class='form-control'>".$rows['post_title']."</textarea>";
         }else{
            if($follow_value1 == 1 AND $follow_value2 == 1){
                $edit_btn = '<div class="w-100 text-right">
                                <a class="h5" title="Report This Post" href="pages/postReport.php?postId='.$post_id.'"><i class="fas fa-info-circle text-danger mt-2 "></i></a>
                            </div>';
            }else if($follow_value1 == 0 AND $follow_value2 == 1){
                $edit_btn = '<div class="w-100 text-right">
                                <a class="h5" title="Report This Post" href="pages/postReport.php?postId='.$post_id.'"><i class="fas fa-info-circle text-danger mt-2 "></i></a>
                            </div>';
            }
            else{
                $edit_btn = '<div class="mt-2 w-100 d-flex justify-content-between">
                                <a href="main.php?profile='.$user_id.'"><i class="fas fa-user-plus text-light"></i></a>
                                <a href="pages/postReport.php?postId='.$post_id.'"><i class="fas fa-info-circle text-danger"></i></a>
                            </div>';
            }
             $title = $rows['post_title'];
         }

     


         $post_id = $rows['post_id'];
         $current_user = $_SESSION['tsn-login']['id'];
         $like = mysqli_query($conn,"SELECT * FROM likes  WHERE `post_id` = $post_id ORDER BY `user_id` DESC;");
         $comment = mysqli_query($conn,"SELECT * FROM comments WHERE `post_id`= $post_id;");
        //  $download = mysqli_query($conn,"SELECT * FROM download WHERE `post_id`= $post_id;");

         $like_last_user = mysqli_fetch_assoc($like);
         $num_of_like = mysqli_num_rows($like);
         $num_of_comment = mysqli_num_rows($comment);
        //  $num_of_download = mysqli_num_rows($download);
         $like_check = mysqli_query($conn,"SELECT * FROM `likes` WHERE `post_id` = $post_id AND `user_id` = $current_user;");
         $like_check_value = mysqli_num_rows($like_check);
         
         if(!(isset($_GET['profile']) OR isset($_POST['like_in_profile']) OR isset($_POST['unlike_in_profile']) OR isset($_GET['education']) OR isset($_GET['nature']) OR isset($_GET['style']) OR isset($_GET['sad']) OR isset($_GET['emotional']) OR isset($_GET['happy']) OR isset($_GET['romantic']) OR isset($_GET['cricket']) OR isset($_GET['animals']))){
            if($like_check_value == 0){
                $like_btn = "<form action='".$_SERVER['PHP_SELF']."' method='post'>
                                <input type='text' name='id_counter' value='".$post_id."' required hidden>
                                <input type='text' name='post_id' value='".$post_id."' required hidden>
                                <button type='submit' name='like' value='like-the-post' class='button-none'> <i class='far fa-heart text-danger'></i> ".$num_of_like."</button>
                            </form>";    
                }else{
                        $like_btn = "<form action='".$_SERVER['PHP_SELF']."' method='post'>
                                        <input type='text' name='id_counter' value='".$post_id."' required hidden>
                                        <input type='text' name='post_id' value='".$post_id."' required hidden>
                                        <button type='submit' name='unlike' value='like-the-post' class='button-none'> <i class='fas fa-heart text-danger'></i> ".$num_of_like."</button>
                                    </form>";
                }
        }else if(isset($_GET['education']) OR isset($_GET['nature']) OR isset($_GET['style']) OR isset($_GET['sad']) OR isset($_GET['emotional']) OR isset($_GET['happy']) OR isset($_GET['romantic']) OR isset($_GET['cricket']) OR isset($_GET['animals'])){
            
            
            if(isset($_GET['education'])){
                $filter = 'education';
                include("pages/like-button-for-filter.php");
            }else if(isset($_GET['nature'])){
                $filter = 'nature';
                include("pages/like-button-for-filter.php");
            }else if(isset($_GET['style'])){
                $filter = 'style';
                include("pages/like-button-for-filter.php");
            }else if(isset($_GET['sad'])){
                $filter = 'sad';
                include("pages/like-button-for-filter.php");
            }else if(isset($_GET['emotional'])){
                $filter = 'emotional';
                include("pages/like-button-for-filter.php");
            }else if(isset($_GET['happy'])){
                $filter = 'happy';
                include("pages/like-button-for-filter.php");
            }else if(isset($_GET['romantic'])){
                $filter = "romantic";
                include("pages/like-button-for-filter.php");
            }else if(isset($_GET['cricket'])){
                $filter = "cricket";
                include("pages/like-button-for-filter.php");
            }else if(isset($_GET['animals'])){
                $filter = "animals";
                include("pages/like-button-for-filter.php");
            }
        }else{
            if($like_check_value == 0){
                $like_btn = "<form action='".$_SERVER['PHP_SELF']."' method='post'>
                                <input type='text' name='profile_id' value='".$profile_id."' required hidden>
                                <input type='text' name='id_counter' value='".$post_id."' required hidden>
                                <input type='text' name='post_id' value='".$post_id."' required hidden>
                                <button type='submit' name='like_in_profile' value='like-the-post' class='button-none'> <i class='far fa-heart text-danger'></i> ".$num_of_like."</button>
                            </form>";    
                }else{
                        $like_btn = "<form action='".$_SERVER['PHP_SELF']."' method='post'>
                                        <input type='text' name='profile_id' value='".$profile_id."' required hidden>
                                        <input type='text' name='id_counter' value='".$post_id."' required hidden>
                                        <input type='text' name='post_id' value='".$post_id."' required hidden>
                                        <button type='submit' name='unlike_in_profile' value='like-the-post' class='button-none'> <i class='fas fa-heart text-danger'></i> ".$num_of_like."</button>
                                    </form>";
                }
        }

        // Like Showing areas................................................
        $liked = $num_of_like - 1;
         $uid = $like_last_user['user_id'];
         if($liked == 0){
             $usr_obj = mysqli_query($conn,"SELECT `fname`,`lname` FROM `users` WHERE `user_id` = $uid");
             $uname_row = mysqli_fetch_assoc($usr_obj);
            $uname = "<i class='fas fa-user-circle'></i> <b class='text-capitalize'>".$uname_row['fname']." ".$uname_row['lname']."</b> give Love in this post..";
         }else if($liked >= 1){
            $usr_obj = mysqli_query($conn,"SELECT `fname`,`lname` FROM `users` WHERE `user_id` = $uid");
            $uname_row = mysqli_fetch_assoc($usr_obj);
            $uname = "<i class='fas fa-user-circle'></i> <b class='text-capitalize'>".$uname_row['fname']." ".$uname_row['lname']."</b>  and ".$liked." other give Love in this post..";
         }else{
            $uname = '';
         }

        //  -------------------------------------------- POST MANGEMETN AREA ----------------------------------
         
        echo "<div class='row w-100 ml-auto mr-auto d-flex justify-content-center py-2 p-0 p-md-3 mb-1 font-cambria'>
                <div class='row p-1 box-shadow-black'  id='".$post_id."'> 
                    <div class='d-flex text-center w-100 bg-dark text-light p-2' style='font-family:Rockwell;'>
                        <div class='col-2'><a href='main.php?profile=".$rows['user_id']."'><img src='../signup-process/".$rows['profile_location']."' alt='profile' style='border-radius:50%; width:40px; height:40px; border:2px solid gray;box-shadow:0px 0px 3px black;'></div>
                        <div class='col-7'><span class='d-flex mt-2 text-center text-capitalize' style='letter-spacing: 2px;'>".$rows['fname']." ".$rows['lname']."</a></span></div>
                        <div class='col-3 d-flex'>".$edit_btn."</div>
                    </div><hr class='w-100'>

                    <div class='col-12 text-left'> ".$title." </div>
                    <div class='col-12 font-weight-bold text-left'>Time : ".$rows['c_time'].", Date : ".$rows['c_date']."</div>
                    <div class='col-lg-6 m-lg-auto'>
                        <a href='pages/".$rows['post_location']."'><img class='img-fluid img-thumbnail' src='pages/".$rows['post_location']."' alt='Feed'></a>
                    </div>
                    <div class='col-12 text-left'>".$uname."</div>
                    
                    <div class='col-12 d-flex w-100 text-center'>
                        <div class='col-4 p-2'>
                            ".$like_btn."
                        </div>
                        <div class='col-4 p-2'>
                            <a href='main.php?comment=".$post_id."'><i class='far fa-comment-alt text-danger'></i></a> ".$num_of_comment."
                        </div>
                        <div class='col-4 p-2'>
                            <a style='text-decoration:none; color:black;' href='./pages/".$rows['post_location']."' download><i class='fas fa-download text-danger'></i></a>               
                        </div>
                    </div>";
                if(isset($_GET['comment'])){
                    echo "<hr>";
                }
             
                if(isset($_GET['comment'])){
                 function createCommentBox(){
                     $post_id = filter_data($_GET['comment']);
                     return "<form action='".$_SERVER['PHP_SELF']."' method='post' class='was-validated' onsubmit='return(commentValid());'>
                        <div class='row mb-4 w-100'>
                            <div class='col-12'>
                                <input type='text' name='user_id' id='user_id' value='".$_SESSION['tsn-login']['id']."' hidden>
                                <input type='text' name='post_id' id='post_id' value='".$post_id."' hidden>
                                <div class='btn-group w-100'><input type='text' placeholder='Write your comments...' name='comment' id='comment' class='form-control' required>
                                <button type='submit' class='btn btn-primary'>Post</button></div>
                            </div>
                        </div>
                     </form>";
                 }
                 $comment_obj = mysqli_query($conn,"SELECT * FROM `comments` WHERE `post_id` = '$post_id'");
                 if(mysqli_num_rows($comment_obj) == 0){
                     echo "<div class='col-12 text-center text-danger p-4'><i class='fas fa-envelope'></i> No Comments Available";
                     echo createCommentBox();
                    }else{
                        echo "<div class='col-12 '>";
                        while($commentsData = mysqli_fetch_assoc($comment_obj)){
                            $c_user_id = $commentsData['user_id'];
                            $profile_fetch_obj = mysqli_query($conn,"SELECT fname, lname, profile_location FROM users WHERE `user_id` = $c_user_id");
                            $user_data = mysqli_fetch_assoc($profile_fetch_obj);

                            if($_SESSION['tsn-login']['id'] == $commentsData['user_id']){
                                $commentDelete = "<form action='main.php' method='get' id='".$commentsData['comment_id']."'><input type='text' name='delete_post_id' value='".$post_id."' hidden><button type='submit' name='deleteComment' value='".$commentsData['comment_id']."' class='button-none'><i class='fas fa-trash-alt' title='Delete comment'></i></button></form>";
                            }else{
                                $commentDelete = "<i class='fas fa-info-circle text-danger' title='Report'></i>";
                            }
                            echo "<div class='row w-100 m-lg-3 mt-4 mb-2'>
                                    <div class='col-12 d-lg-flex text-left'><img src='../signup-process/".$user_data['profile_location']."' style='width:30px; height:30px; border-radius:50%; border:2px solid gray; box-shadow:0px 0px 1px black;'>
                                        <span class='font-weight-bold text-capitalize ml-2'>".$user_data['fname']." ".$user_data['lname']."</span>
                                        <span class='d-none d-lg-block ml-auto'>Time : ".$commentsData['c_time']."  Date : </span><span>".$commentsData['c_date']."</span>
                                    </div>
                                        <div class='col-12 pl-5 pt-2 text-left'>".$commentsData['comment']."</div>
                                    </div>
                                    <div class='col-12 text-right'>
                                        ".$commentDelete."
                                    </div><hr class='w-100'>";
                        }
                        echo createCommentBox();
                
                 }
             }
     echo "</div>
         </div>";
     }
?>
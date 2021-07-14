<?php
    $sponsorId = filter_data($_GET['showAds']);
    $obj = mysqli_query($conn,"SELECT * FROM sponsor WHERE sponsor_id = $sponsorId");
    if(mysqli_num_rows($obj) == 0){
        echo "<script>window.location.href='main.php';</script>";
    }
    $likesObj = mysqli_query($conn,"SELECT * FROM sponsor_likes WHERE sponsor_id = $sponsorId");
    $commentsObj = mysqli_query($conn,"SELECT * FROM sponsor_comments WHERE sponsor_id = $sponsorId");
    $likes = mysqli_num_rows($likesObj);
    $comments = mysqli_num_rows($commentsObj);
    $rows = mysqli_fetch_assoc($obj);
    echo "<div class='row w-100 ml-auto mr-auto d-flex justify-content-center py-2 p-0 p-md-3 mb-1 font-cambria'>
    <div class='row p-1 box-shadow-black bg-light'> 
     <div class='d-flex text-center w-100 bg-dark text-light p-2' style='font-family:Rockwell;'>
     <span>Sponsord Ads <i class='fas fa-bullhorn'></i></span>
         <span class='ml-auto'><a href='main.php?home' >&times;</a></span>
         </div><hr class='w-100'>

         <div class='col-12 text-left'> ".$rows['sponsor_title']." </div>
         <div class='col-12 font-weight-bold text-left'>Time : ".$rows['c_time'].", Date : ".$rows['c_date']."</div>
         <div class='col-12 text-center'>
        <a href='../admin/pages/".$rows['sponsor_img_location']."'>
        <img class='img-responsive' src='../admin/pages/".$rows['sponsor_img_location']."' alt='Feed' style='width:100%; max-width:400px; max-height:500px;'>
        </a>
        
        <div class='col-12 d-flex'>
        <div class='col-6'><i class='fas fa-heart text-danger'></i> ".$likes."</div>
        <div class='col-6'><i class='far fa-comment-alt text-danger'></i> ".$comments."</div>
        </div>
        </div><hr class='w-100'>";
        $comment_obj = mysqli_query($conn,"SELECT * FROM sponsor_comments WHERE sponsor_id = $sponsorId");
        $numOfRows = mysqli_num_rows($comment_obj);
        if($numOfRows == 0){
            echo "<div class='text-danger text-center w-100 p-3'><i class='fas fa-envelope'></i> No Comment Available...</div>";
        }else{
         while($commentsData = mysqli_fetch_assoc($comment_obj)){
             $c_user_id = $commentsData['user_id'];
             $profile_fetch_obj = mysqli_query($conn,"SELECT fname, lname, profile_location FROM users WHERE `user_id` = $c_user_id");
             $user_data = mysqli_fetch_assoc($profile_fetch_obj);
            echo "<div class='row m-lg-3 mt-4 mb-2'>
                 <div class='col-12 d-lg-flex text-left'><img src='../signup-process/".$user_data['profile_location']."' style='width:30px; height:30px; border-radius:50%; border:2px solid gray; box-shadow:0px 0px 1px black;'>
                     <span class='font-weight-bold text-capitalize ml-2'>".$user_data['fname']." ".$user_data['lname']."</span>
                     <span class='d-none d-lg-block ml-auto'>Time : ".$commentsData['c_time']."  Date : </span><span>".$commentsData['c_date']."</span>
                 </div>
                     <div class='col-12 pl-5 pt-2 text-left'>".$commentsData['comment']."</div>
                 </div><hr class='w-100'>";
         }
  }
?>



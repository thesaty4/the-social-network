<?php

 //  -------------------------------------------- POST MANGEMETN AREA ----------------------------------
$id = filter_data($_GET['Adscomment']);
$obj = mysqli_query($conn,"SELECT * FROM sponsor WHERE sponsor_id = $id");    
if(mysqli_num_rows($obj) == 0){
    echo "<script>window.location.href='main.php?home';</script>";
}
$rows = mysqli_fetch_assoc($obj);
// if($rows[''])
$likeObj = mysqli_query($conn,"SELECT s.*,u.fname FROM sponsor_likes AS s INNER JOIN users AS u ON s.user_id = u.user_id WHERE s.sponsor_id = $id ORDER BY s.like_id DESC"); 
$commentObj = mysqli_query($conn,"SELECT s.*,u.fname FROM sponsor_comments AS s INNER JOIN users AS u ON s.user_id = u.user_id WHERE s.sponsor_id = $id"); 
$num_of_comment = mysqli_num_rows($commentObj);
$numOfLikes = mysqli_num_rows($likeObj);
if(mysqli_num_rows($likeObj) != 0){
    $likeData = mysqli_fetch_assoc($likeObj);
    if($numOfLikes == 1){
        $likedusers = "<i class='fas fa-user-circle'></i> ".$likeData['fname']." was liked this ads...";
    }else{
        // echo "hii";
        $likedusers = "<i class='fas fa-user-circle'></i> ".$likeData['fname']." and ".$numOfLikes." other liked this ads...";
    }
}

// echo $numOfLikes;

$likeObj = mysqli_query($conn,"SELECT * FROM sponsor_likes WHERE user_id = $current_user AND sponsor_id = $id");
if(mysqli_num_rows($likeObj) == 0){
    $like =  "<i class='far fa-heart text-danger'></i>";
}else{
    $like = "<i class='fas fa-heart text-danger'></i>";
}
$like_btn = $like." <span class='text-dark'>".$numOfLikes."</span>";

 echo "<div class='row w-100 ml-auto mr-auto d-flex justify-content-center py-2 p-0 p-md-3 mb-1 font-cambria'>
 <div class='row p-1 box-shadow-black'> 
     <div class='d-flex text-center w-100 bg-dark text-light p-2' style='font-family:Rockwell;'>
         <span>Sponsord Ads <i class='fas fa-bullhorn'></i></span>
     </div><hr class='w-100'>

     <div class='col-12 text-left'> ".$rows['sponsor_title']." </div>
     <div class='col-12 font-weight-bold text-left'>Time : ".$rows['c_time'].", Date : ".$rows['c_date']."</div>
     <div class='col-12 text-center'>
        <a href='../admin/pages/".$rows['sponsor_img_location']."'>
            <img class='img-responsive' src='../admin/pages/".$rows['sponsor_img_location']."' alt='Feed' style='width:100%; max-width:400px; max-height:500px;'>
        </a>
     <div class='col-12 text-left'>".$likedusers."</div>
     
     <div class='col-12 d-flex w-100 text-center'>
     <div class='col-6 p-2'>
        ".$like_btn."
     </div>
     <div class='col-6 p-2'>
        <i class='far fa-comment-alt text-danger'></i> ".$num_of_comment."
     </div> 
 </div>";
 if(isset($_GET['Adscomment'])){
     echo "<hr>";
 }

  function createCommentBox(){
      $sponsor_id = filter_data($_GET['Adscomment']);
      return "<form action='pages/add-comment-ads.php' method='post' class='was-validated' onsubmit='return(commentValid());'>
         <div class='row mb-4'>
             <div class='col-12'>
                 <input type='text' name='user_id' id='user_id' value='".$_SESSION['tsn-login']['id']."' hidden>
                 <input type='text' name='sponsor_id' id='sponsor_id' value='".$sponsor_id."' hidden>
                 <div class='btn-group  w-100'><input type='text' placeholder='Write your comments...' name='comment' id='comment' class='form-control' required>
                 <button type='submit' class='btn btn-primary'>Post</button></div>
             </div>
         </div>
      </form>";
  }
  $comment_obj = mysqli_query($conn,"SELECT * FROM sponsor_comments WHERE sponsor_id = $id");
  if(mysqli_num_rows($comment_obj) == 0){
      echo "<div class='col-12 text-center text-danger p-4'><i class='fas fa-envelope'></i> No Comments Available</div>";
      echo createCommentBox();
     }else{
         while($commentsData = mysqli_fetch_assoc($comment_obj)){
             $c_user_id = $commentsData['user_id'];
             $profile_fetch_obj = mysqli_query($conn,"SELECT fname, lname, profile_location FROM users WHERE `user_id` = $c_user_id");
             $user_data = mysqli_fetch_assoc($profile_fetch_obj);

             if($_SESSION['tsn-login']['id'] == $commentsData['user_id']){
                 $commentDelete = "<form action='pages/deleteAdsComment.php' method='post' id='".$commentsData['comment_id']."'>
                        <input type='text' name='delete_sponsor_id' value='".$id."' hidden>
                        <button type='submit' name='deleteComment' value='".$commentsData['comment_id']."' class='button-none'><i class='fas fa-trash-alt' title='Delete comment'></i></button>
                        </form>";
             }else{
                 $commentDelete = "<i class='fas fa-info-circle text-danger' title='Report'></i>";
             }
             echo "<div class='row m-lg-3 mt-4 mb-2'>
                 <div class='col-12 d-lg-flex text-left'><img src='../signup-process/".$user_data['profile_location']."' style='width:30px; height:30px; border-radius:50%; border:2px solid gray; box-shadow:0px 0px 1px black;'>
                     <span class='font-weight-bold text-capitalize ml-2'>".$user_data['fname']." ".$user_data['lname']."</span>
                     <span class='d-none d-lg-block ml-auto'>Time : ".$commentsData['c_time']."  Date : </span><span>".$commentsData['c_date']."</span>
                 </div>
                     <div class='col-12 pl-5 pt-2 text-left'>".$commentsData['comment']."</div>
                 </div>
                 <div class='col-12 text-right'>
                     ".$commentDelete."
                 </div><hr>";
         }
         echo createCommentBox();
  }
?>
<script>
function commentValid(){
    var userId = document.getElementById("user_id").value;
    var sponsorId = document.getElementById("sponsor_id").value;
    var comment = document.getElementById("comment").value;
    if(userId == '' || sponsorId == '' || comment == ''){
        alert("All field required..");
        return false;
    }
    if(comment.length > 501){
        alert("All field required..");
        return false;
    }
    return true;
}
</script>
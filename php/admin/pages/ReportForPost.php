<?php
    $reportId = filter_data($_GET['PostReport']);
    $obj = mysqli_query($conn,"SELECT r.*,u.fname,u.lname,p.user_id,p.post_id,p.post_title,p.post_location FROM post_report AS r INNER JOIN users AS u ON r.user_id = u.user_id INNER JOIN posts AS p ON p.post_id = r.post_id WHERE r.report_id = $reportId");
    if(mysqli_num_rows($obj) == 0){
        echo "<script>window.location.href='main.php';</script>";
    }
?>
<br><br><br><div class="col-12 mt-1 mb-5 bg-light box-shadow-black p-3 p-md-4 font-cambria text-capitalize">
    <?php
        $rows = mysqli_fetch_assoc($obj);
        if($rows['is_seen'] == 0){
            mysqli_query($conn,"UPDATE post_report SET is_seen = 1 WHERE report_id = $reportId");
        }
        echo "<div class='row'>
            <div class='col-11 h5 text-capitalize font-weight-bold'><span class='mt-1'>".$rows['fname']."'s Report</span></div>
            <div class-'col-1'><a href='main.php?report' class='text-danger h4'> &times;</a></div>
        <hr class='w-100'>";
    ?>
    <div class="col-6 mt-2 font-weight-bold">Reported By </div>
    <div class="col-6 mt-2"><?php echo $rows['fname']." ".$rows['lname'];?></div>

    <div class="col-6 mt-2 font-weight-bold">Reporting Time </div>
    <div class="col-6 mt-2"><?php echo $rows['c_time'];?></div>

    <div class="col-6 mt-2 font-weight-bold">Reporting Date </div>
    <div class="col-6 mt-2"><?php echo $rows['c_date'];?></div>

    <div class="col-6 mt-2 font-weight-bold">Reporting Category </div>
    <div class="col-6 mt-2"><?php echo $rows['category'];?></div>

    <div class="col-6 mt-2 font-weight-bold">Report</div>
    <div class="col-6 mt-2"><?php echo $rows['report'];?></div>

    <div class="col-6 mt-2 font-weight-bold">Reported Post </div>
    <?php
    $pId = $rows['post_id'];
    $postObj = mysqli_query($conn,"SELECT * FROM posts WHERE post_id = $pId");
    $likeObj = mysqli_query($conn,"SELECT * FROM likes WHERE post_id = $pId");
    $commentObj = mysqli_query($conn,"SELECT * FROM comments WHERE post_id = $pId");
    $shareObj = mysqli_query($conn,"SELECT * FROM share WHERE post_id = $pId");
    
    $numLike = mysqli_num_rows($likeObj);
    $numComment = mysqli_num_rows($commentObj);
    $postUser = mysqli_fetch_assoc($postObj);
    $postUserId = $postUser['user_id'];
    $pUser = mysqli_query($conn,"SELECT fname,lname,profile_location FROM users WHERE user_id = $postUserId");
    $pUserRow = mysqli_fetch_assoc($pUser);
    ?>
    <div class="w-100 mt-2 box-shadow-black p-2">
        <div class="col-12 d-flex">
            <div class="div-2"><img src="../signup-process/<?php echo $pUserRow['profile_location'];?>" style='height:30px;width:30px;border:2px solid gray;box-shadow:0px 0px 4px black; border-radius:50%;'></div>
            <span class='font-weight-bold ml-2'><?php echo $pUserRow['fname']." ".$pUserRow['lname'];?></span>
        </div><hr>
        <div class="col-12">
            <div class="col-12">
                <?php echo $postUser['post_title'];?>
            </div>
            <div class='text-center' style='overflow:hidden;'>
                <img class='img-responsive' src="../user/pages/<?php echo $postUser['post_location'];?>"  style='max-height:400px; max-width:400px;'>
            </div>
        </div>
        <div class="col-12 text-center d-flex text-danger">
            <div class="col-6">
                <i class='fas fa-heart'></i> <?php echo $numLike;?>
            </div>
            <div class="col-6">
                <i class='fas fa-comment-alt'></i> <?php echo $numComment;?>
            </div>
        </div>
    </div>

    <div class="col-12">
        <form action="main.php" method='post'>
        <input type="text" name='reportId' value='<?php echo $rows['report_id'];?>' hidden>
        <div class='btn-group w-100'><button type='submit' name='DeleteFromPotReport' class='mt-4 btn btn-dark btn-block'>Delete</button>
        <!-- </form>
        <form action="main.php" method='post'> -->
        <input type="text" name='postId' value='<?php echo $rows['post_id'];?>' hidden>
        <button type='submit' name='DeleteThePost' class='mt-4 btn btn-danger btn-block'>Remove Post</button></div>
        </form>
    </div>
</div>
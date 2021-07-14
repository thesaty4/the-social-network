<?php
$id = filter_data($_GET['user_details']);
$obj = mysqli_query($conn,"SELECT * FROM users WHERE user_id = $id");
if(mysqli_num_rows($obj) == 0){
    echo "<script>window.location.href='main.php?error=Unexpected user id..';</script>";
}
$rows = mysqli_fetch_assoc($obj);
?>
<div class="col-12 bg-light p-2 p-md-3 box-shadow-black mt-5" style='border-radius:5px;'>
    <span class='col-12 d-flex p-2'>
        <h5 style='font-family:algerian; letter-spacing:1px;' class='mt-2'><i class='fas fa-user-circle'></i> <?PHP echo "<span>".$rows['fname']."</span>";?> Details</h5>
        <a href="main.php?users" class='ml-auto h4 text-danger'>&times;</a>
    </span>
    <hr class='w-100'>
    <!-- <div class="col-12 text-center text-md-left">
        <img src="../signup-process/<?php //echo $rows['profile_location'];?>" alt="Developer" style='weight:30px; height:20px; border-radius:50%; box-shadow:0px 0px 10px black;'>
    </div> -->
    <div class="row px-lg-4 font-cambria text-capitalize">
        <div class="col-6 mt-3 font-weight-bold">First Name  </div>
        <div class="col-6 mt-3"><?php echo $rows['fname'];?></div>
        <div class="col-6 mt-3 font-weight-bold">Last Name  </div>
        <div class="col-6 mt-3"><?php echo $rows['lname'];?></div>
        <div class="col-6 mt-3 font-weight-bold">Gender  </div>
        <div class="col-6 mt-3"><?php echo $rows['gender'];?></div>
        <div class="col-6 mt-3 font-weight-bold">Mobile  </div>
        <div class="col-6 mt-3 font-weight-bold"><?php echo $rows['country_code']."".$rows['mobile'];?></div>
        <div class="col-6 mt-3 font-weight-bold">Email  </div>
        <div class="col-6 mt-3"><?php echo $rows['email'];?></div>
        <div class="col-6 mt-3 font-weight-bold">Status  </div>
        <div class="col-6 mt-3"><?php echo $rows['status'];?></div>
        <div class="col-6 mt-3 font-weight-bold">Creating Time </div>
        <div class="col-6 mt-3"><?php echo $rows['c_time'];?></div>
        <div class="col-6 mt-3 font-weight-bold">Creating Date </div>
        <div class="col-6 mt-3"> <?php echo $rows['c_date'];?></div>
    </div>
</div>

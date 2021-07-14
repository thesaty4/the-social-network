<?php
$contectId = filter_data($_GET['contectDetails']);
$obj = mysqli_query($conn,"SELECT c.*,u.user_id,u.fname,u.lname,u.profile_location,u.country_code,u.mobile,u.email FROM contect_us AS c INNER JOIN users AS u ON c.user_id = u.user_id WHERE c.contect_id = $contectId");
if(mysqli_num_rows($obj) == 0){
    echo "<script>window.location.href='main.php?error=Opps ! Unexpected Id..';</script>";
}
$rows = mysqli_fetch_assoc($obj);
if($rows['is_seen'] == 0){
    mysqli_query($conn,"UPDATE contect_us SET is_seen = 1 WHERE contect_id = $contectId");
}
?>
<div class="col-12 bg-light p-2 p-md-3 box-shadow-black mt-5" style='border-radius:5px;'>
    <span class='col-12 d-flex p-2'>
        <h5 style='font-family:algerian; letter-spacing:1px;' class='mt-2'><i class='fas fa-user-circle'></i> <?PHP echo "<span>".$rows['fname']."'s</span>";?> Message Details</h5>
        <a href="main.php?contect_us" class='ml-auto h4 text-danger'>&times;</a>
    </span>
    <hr class='w-100'>
    <div class="row px-lg-4 font-cambria text-capitalize">
        <div class="col-6 mt-3 font-weight-bold">Name  </div>
        <div class="col-6 mt-3"><?php echo $rows['fname']." ".$rows['lname'];?></div>
        <div class="col-6 mt-3 font-weight-bold">Mobile  </div>
        <div class="col-6 mt-3 font-weight-bold"><?php echo $rows['country_code']."".$rows['mobile'];?></div>
        <div class="col-6 mt-3 font-weight-bold">Email  </div>
        <div class="col-6 mt-3"><?php echo $rows['email'];?></div>
        <div class="col-6 mt-3 font-weight-bold">Message Time </div>
        <div class="col-6 mt-3"><?php echo $rows['c_time'];?></div>
        <div class="col-6 mt-3 font-weight-bold">Message Date </div>
        <div class="col-6 mt-3"> <?php echo $rows['c_date'];?></div>
        <div class="col-6 mt-3 font-weight-bold">Subject </div>
        <div class="col-6 mt-3"> <?php echo $rows['subject'];?></div>
        <div class="col-6 mt-3 font-weight-bold">Message </div>
        <div class="col-6 mt-3"> <?php echo $rows['message'];?></div>
    </div>
</div>

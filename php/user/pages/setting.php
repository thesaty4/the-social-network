<div class="container-fluid my-2 h-100vh">
    <div class="row font-cambria-math">
        <div class="col-12">
            <div class="text-capitalize d-block " style='font-family:algerian; letter-spacing:2px;'><a class='text-dark w-100' style='text-decoration: none;' href='main.php?profile=<?php echo $_SESSION['tsn-login']['id'];?>'><img src="../signup-process/<?php echo $_SESSION['tsn-login']['profile_location'];?>" alt="profile" style="height:40px;width:40px;border-radius:50%;box-shadow:0px 0px 3px black;">
            <?php echo $_SESSION['tsn-login']['fname']." ".$_SESSION['tsn-login']['lname']." <a href='pages/profile_update.php?profile_update=".$current_user."'><i class='fas fa-edit text-primary'></i></a>";?></div>
        </div><hr class='w-100'>

        <div class="col-md-6 p-3 text-md-left"><a href="main.php?home" class='text-dark'><i class='fas fa-home'></i>   Home</a></div>
        <div class="col-md-6 p-3 text-md-left"><a href="main.php?request" class='text-dark'><i class='fas fa-users'></i>   Follow Request +</a></div>
        <div class="col-md-6 p-3 text-md-left"><a href="main.php?chat" class='text-dark'><i class='fas fa-comment'></i>   Chat with friends</a></div>
        <div class="col-md-6 p-3 text-md-left"><a href="main.php?notification" class='text-dark'><i class='fas fa-bell'></i>   Notification</a></div>
        <div class="col-md-6 p-3 text-md-left"><a href="main.php?request" class='text-dark'><i class='fas fa-search'></i>   Find User's</a></div>
        <div class="col-md-6 p-3 text-md-left"><a href="pages/profile_update.php?profile_update=<?php echo $current_user;?>" class='text-dark'><i class='fas fa-user-circle'></i>   Update Profile</a></div>
        <div class="col-md-6 p-3 text-md-left"><a href="pages/profile_update.php?profile_update=<?php echo $current_user;?>" class='text-dark'><i class='fas fa-lock'></i> Change Password</a></div>
        <div class="col-md-6 p-3 text-md-left"><a href="pages/report.php?report=<?php echo $current_user;?>" class='text-danger'><i class='fas fa-info-circle'></i>   Report</a></div>
        <div class="col-md-6 p-3 text-md-left"><a href="pages/aboutme.php?aboutme" class='text-dark'><i class='fas fa-laptop'></i>  About Developer</a></div>
        <div class="col-md-6 p-3 text-md-left"><a href="pages/contect_us.php" class='text-dark'><i class='fas fa-envelope'></i>  Contect Us</a></div>
        <div class="col-md-6 p-3 text-md-left font-weight-bold">Version 1.0</div>

        <div class="col-12 mt-md-3 text-md-center"><a href="../../include/logout.php" class="btn btn-dark d-flex"><i class="fas fa-sign-out-alt mr-1 text-light mt-1 ml-auto"></i> <span class='mr-auto text-light'>Log-Out</span></a></div>
    </div>
</div>
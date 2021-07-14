<div class="container-fluid clearfix bg-dark box-shadow-black">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="col-2 col-md-3 float-left">
            <div class="navbar-brand font-cambria-math">
                <span class="text-aqua d-flex">
                    <a href="main.php?profile=<?php echo $_SESSION['tsn-login']['id'];?>" class="text-light font-cambria" title='Profile'><?php echo "<img src='../signup-process/".$_SESSION['tsn-login']['profile_location']."' alt='profile' style='width:25px; height:25px; border-radius:50%; border:2px solid gray; box-shadow:0px 0px 5px black;'>";?><?php echo "<span class='text-capitalize d-none d-lg-inline-block px-2'>".$_SESSION['tsn-login']['fname']." ".$_SESSION['tsn-login']['lname']."</span>";?></a>           </form>
                </span>
            </div>
        </div>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collabsibleNavbar">
            <span class="navbar-toggler-icon">
            </span>
        </button> -->
        <div class="col-8 col-md-6">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
                <input type="text" name="search" placeholder="Search your friend..." <?php if(isset($_GET['search'])){ $search = $_GET['search']; echo "value='".$search."'";}?>class="form-control">
        </div>
        <!-- <div class="col-12 col-lg-8 collapse navbar-collapse navbar-dark text-center" id="collabsibleNavbar"> -->
        <div class="col-2 col-md-3 d-flex">
            <ul class="navbar-nav ml-md-auto mr-lg-2  mt-0 mt-md-2 ml-auto">
                <li class="nav-item">
                    <button type="submit" name="search_submit" class="button-none d-flex"><i class="fas fa-search mr-1 text-light mt-0 mt-md-1"></i> <span class="d-none d-lg-block text-light"> Search</span></button>
                </form>
                </li>
            </ul>
            <ul class="navbar-nav d-none d-md-block ml-md-auto mr-lg-2">
                <li class="nav-item">
                    <a href="../../include/logout.php" class="nav-link d-flex"><i class="fas fa-sign-out-alt mr-1 text-light mt-1"></i> <span class="d-none d-lg-block">Log-Out</span></a>
                </li>
            </ul>
            <!-- <ul class="navbar-nav mr-lg-2">
                <li class="nav-item">
                    <a href="index.php?signup" class="nav-link"><i class="fas fa-plus mr-1 text-light"></i> New User</a>
                </li>
            </ul> -->
        </div>
    </nav>
</div>
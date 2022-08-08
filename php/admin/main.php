<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['tsn-login']['fname'];?></title>
</head>
    <link rel="stylesheet" type="text/css" href="../../icon/font-awesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <script src="../../js/alert-message.js"></script>
    <script src="../../js/jquery-3.5.1.min.js"></script>
    <style>
        body{
            background: url("../../img/laptop-mobile.jpg");
            /* background: url("../img/hacker.jpg"); */
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            /* filter-img: blur(8px); */
            /* -webkit-filter: blur(8px); */
        }
    </style>
<body>
<?php
if($_SESSION['tsn-login']['account_type'] == 'admin'){
    
    
     if(isset($_GET)){
        echo '<div id="alert" class="fixed-top position-absolute">';
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


    include("../user/pages/user-navbar.php");
    include("../../include/database_connection.php");
    include("../../include/filter-data.php");
    $conn  = db_conn();
    if(!(isset($_GET['users']) OR isset($_GET['report']) OR isset($_GET['contect_us'])) OR isset($_GET['home'])){

    }
    if(isset($_GET['home']) OR isset($_GET['ads']) OR isset($_GET['showAds'])){
        $home = 'text-warning';
        $users = 'text-light';
        $report = 'text-light';
        $contect_us = 'text-light';
    }else if(isset($_GET['users']) OR isset($_GET['user_details']) OR isset($_GET['search'])){
        $home = 'text-light';
        $users = 'text-warning';
        $report = 'text-light';
        $contect_us = 'text-light';
    }else if(isset($_GET['report'])  OR isset($_GET['Report']) OR isset($_GET['PostReport'])){
        $home = 'text-light';
        $users = 'text-light';
        $report = 'text-warning';
        $contect_us = 'text-light';
    }else if(isset($_GET['contect_us']) OR isset($_GET['contectDetails'])){
        $home = 'text-light';
        $users = 'text-light';
        $report = 'text-light';
        $contect_us = 'text-warning';
    }
    ?>
    <div class="container bg-primary sticky-top box-shadow-black">
        <div class="row text-center text-light">
            <div class="col-3" title='Home'><a href='main.php?home'><i class='fas fa-home mt-1 <?php echo $home;?>'></i></a></div>
            <div class="col-3" title='Users Manage'><a href='main.php?users'><i class='fas fa-users mt-1 <?php echo $users;?>'></i></a></div>
            <div class="col-3" title='Reports'><a href='main.php?report'><i class='fas fa-info-circle mt-1 <?php echo $report;?>'></i></a>
                <span id='autoLoad' class='position-absoulte'></span>
                <script>
                    $(document).ready(function(){
                        $("#autoLoad").load("pages/report-autoload.php");
                        setInterval(function(){
                            $("#autoLoad").load("pages/report-autoload.php");
                        }, 1000);
                    });
                </script> 
            </div>
            <div class="col-3" title='Feedback'><a href='main.php?contect_us'><i class='fas fa-envelope mt-1 <?php echo $contect_us;?>'></i></a>
                <span id='loadContect' class='position-absoulte'></span>
                <script>
                    $(document).ready(function(){
                        $("#loadContect").load("pages/contectusLoad.php");
                        setInterval(function(){
                            $("#loadContect").load("pages/contectusLoad.php");
                        }, 1000);
                    });
                </script> 
            </div>
        </div>
    </div> 
    <div class="container">
        <?php
        if(!(isset($_GET['users']) OR isset($_GET['search']) OR isset($_GET['user_details']) OR isset($_GET['report']) OR isset($_GET['Report']) OR isset($_GET['PostReport']) OR isset($_GET['contect_us']) OR isset($_GET['contectDetails'])) OR isset($_GET['home']) OR isset($_GET['ads']) OR isset($_GET['showAds'])){
           if(isset($_GET['ads'])){
                include("pages/create-ads.php");
            }else if(isset($_GET['showAds'])){
                include("pages/showAdsDetails.php");
            }else{
                include("pages/home.php");
            }
        }else if(isset($_GET['users']) OR isset($_GET['search'])){
            // User manage
           include("pages/users.php");
        }else if(isset($_GET['user_details'])){
            include("pages/user-details.php");
        }else if(isset($_GET['report']) OR isset($_GET['Report']) OR isset($_GET['PostReport'])){
            if(isset($_GET['report'])){
                include("pages/reports.php");
            }else if(isset($_GET['Report'])){
                include("pages/ReportForProfile.php");
            }else if(isset($_GET['PostReport'])){
                include("pages/ReportForPost.php");
            }
        }else if(isset($_GET['contect_us']) OR isset($_GET['contectDetails'])){
            if(isset($_GET['contect_us'])){
                include("pages/contect_us.php");
            }else if(isset($_GET['contectDetails'])){
                include("pages/contectDetails.php");
            }
        }

echo "</div>";

    if(isset($_POST['DeleteFromReport'])){
        $rId = filter_data($_POST['reportId']);
        mysqli_query($conn,"DELETE FROM report WHERE report_id = $rId");
        echo "<script>window.location.href='main.php?report';</script>";
    }

    if(isset($_POST['DeleteFromPotReport'])){
        $rId = filter_data($_POST['reportId']);
        mysqli_query($conn,"DELETE FROM post_report WHERE report_id = $rId");
        echo "<script>window.location.href='main.php?report';</script>";
    }
    if(isset($_POST['DeleteThePost'])){
        $rId = filter_data($_POST['postId']);
        $reportId = filter_data($_POST['reportId']);
        mysqli_query($conn,"DELETE FROM post_report WHERE report_id = $reportId");
        mysqli_query($conn,"DELETE FROM likes WHERE post_id = $rId");
        mysqli_query($conn,"DELETE FROM comments WHERE post_id = $rId");
        mysqli_query($conn,"DELETE FROM share WHERE post_id = $rId");
        mysqli_query($conn,"DELETE FROM posts WHERE post_id = $rId");

        
        // $rId = filter_data($_POST['reportId']);
    
        echo "<script>window.location.href='main.php?report';</script>";
        // print_r($_POST);
    }
}else{
    echo "<script>window.location.href='../../index.php?error=Error404 : Unautorized access..!';</script>";
    // header("location:../../index.php?error=Error404 : Unautorized access..!");
}
?>
</body>
</html>
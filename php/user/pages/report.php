<?php
session_start();
function filter_data($arg){
    $data = filter_var($arg,FILTER_SANITIZE_STRING);
    return $data;
}
$current_user = $_SESSION['tsn-login']['id'];

include("../../../include/database_connection.php");
$conn = db_conn();

if(isset($_GET['report'])){
$report = filter_data($_GET['report']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" type="text/css" href="../../../icon/font-awesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <script src="../../../js/alert-message.js"></script>
    <script src="../../../js/validation.js"></script>
    <script src="../../../js/jquery-3.5.1.min.js"></script>
    <!-- <script src="../../js/jquery-3.4.1.min.js"></script> -->
    <style>
        body{
            background:#fff;
        }
    </style>
</head>
<body>
<div class="container-fluid d-flex bg-dark p-2">
    <nav class='nav-brand text-light' style='font-family:cambria;'>
        <span>The Social</span><span style='color:aqua;'>Network</span>
    </nav>
    <nav class='ml-auto mr-2'>
        <a href="../main.php" style='border:1px solid aqua; box-shadow:0px 0px 2px aqua; text-decoration:none;' class='px-3 text-light'>Exit</a>
    </nav>
</div>
<div class="container font-cambria mt-4">
    <div class="row">
        <div class="col-12  text-center mt-2"><i class='fas fa-info-circle fa-3x text-danger'></i></div>
        <div class="col-12">
            <form action="add-report.php" method='post' onsubmit='return(validate())' class='was-validated'>
                <label class='mt-3 font-weight-bold'>Write your report : </label>
                <textarea name="report" id="report" cols="30" rows="10" class='form-control' placeholder='Write your report to improve more clearly your report...' required></textarea>
                <label class='mt-3 font-weight-bold'>Choose Report Category : </label>
                <select name="reportCategory" id="reportCategory" class='form-control' required>
                    <option value="">Select Category</option>
                    <option value="home">Home</option>
                    <option value="search">Search</option>
                    <option value="following">Following</option>
                    <option value="post">Post</option>
                    <option value="notification">Notification</option>
                    <option value="profile">Profile</option>
                    <option value="setting">Setting</option>
                    <option value="hursment">Hursment</option>
                    <option value="abous">Abouse</option>
                </select>
                <button type='submit' name='submitReport' value='report' class='btn btn-block btn-dark mt-4'><i class='fas fa-info-circle'></i> Report</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php
}else{
    echo "<script>window.location.href='../../../index.php?error=Unexpected user..';</script>";

    // header("location:../../../index.php?error=Unexpected user..");
}
?>
<script>
function validate(){
    var report = document.getElementById("report").value;
    var category = document.getElementById("reportCategory").value;
    if(report.length > 1001){
        alert("You can only write max 1000 word..");
        return false;
    }
    if(report == '' || category == ''){
        alert("All field required");
        return false;
    }
    return true;
}
</script>
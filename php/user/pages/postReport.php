<?php
session_start();
if(isset($_GET['postId'])){
    include("../../../include/database_connection.php");
    $conn = db_conn();
    $postid = filter_var($_GET['postId'],FILTER_SANITIZE_STRING);
    $userId = $_SESSION['tsn-login']['id'];
    // $obj = mysqli_query($conn,"SELECT * FROM posts WHERE post_id = $postid;");
    // if(mysqli_num_row($obj) == 0){
    //     header("location:../main.php?error=Unexpected user...");
    // }
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
<?php include("logoNavbar.php");?>
<div class="container font-cambria mt-4">
    <div class="row">
        <div class="col-12  text-center mt-2"><i class='fas fa-info-circle fa-3x text-danger'></i></div>
        <div class="col-12">
            <form action="post-report-submit.php" method='post' onsubmit='return(validate())' class='was-validated'>
                <label class='mt-3 font-weight-bold'>Write your Post report : </label>
                <textarea name="report" id="report" cols="30" rows="10" class='form-control' placeholder='Write your report to improve more clearly for Review...' required></textarea>
                <label class='mt-3 font-weight-bold'>Choose Report Category : </label>
                <select name="reportCategory" id="reportCategory" class='form-control' required>
                    <option value="">Select Category</option>
                    <option value="child abuse">Child Abuse</option>
                    <option value="harmfull content">Harmfull Content</option>
                    <option value="danger">Danger</option>
                    <option value="public gathering">Public Gathering</option>
                    <option value="hursment">Hursment</option>
                    <option value="pornography">Pornography</option>
                    <option value="unwanted post">Unwanted Post</option>
                </select>
                <button type='submit' name='postReport' value='<?php echo $postid;?>' class='btn btn-block btn-dark mt-4'><i class='fas fa-info-circle'></i> Report</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php
}else{
    echo "<script>window.location.href='../main.php?error=Unexpected user...';</script>";

    // header("location:../main.php?error=Unexpected user...");
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
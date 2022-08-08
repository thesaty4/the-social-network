<?php 
session_start();
if(isset($_SESSION['tsn-login'])){
    include("../../../include/database_connection.php");
    $conn = db_conn();
    include("../../../include/filter-data.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contect With Developer</title>
    <link rel="stylesheet" type="text/css" href="../../../icon/font-awesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <script src="../../../js/alert-message.js"></script>
    <script src="../../../js/validation.js"></script>
    <script src="../../../js/jquery-3.5.1.min.js"></script>
</head>
<body>
    <?php include("logoNavbar.php");?>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center" id="contect-us">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" onsubmit="return(validate_data())" class="was-validated bg-dark p-5 radius box-shadow-black">
            <div class="col form-group">
                <div class="form-title text-center font-cambria-math text-orange"><h1>Contect Us</h1></div>
                    <i class="fas fa-user mr-1 text-light"></i><lable class="mb-2 mr-2 text-light">Your Name :</lable>
                    <input type="text" name="name" class="form-control mb-2 mr-2" id="name" Value='<?php echo $_SESSION['tsn-login']['fname']." ".$_SESSION['tsn-login']['lname'];?>' placeholder="Enter Your Name .." required disabled>
                    <!-- <div class="valid-feedback">Valid.</div> -->
                    <!-- <div class="invalid-feedback">Please fill out this field</div> -->
                    <i class="fas fa-clipboard mr-1 text-light"></i><lable class="mb-2 mr-2 text-light">Subject :</lable>
                    <input type="text" name="subject" class="form-control mb-2 mr-2" id="subject" placeholder="Type Subject .." required>
                    <!-- <div class="valid-feedback">Valid.</div> -->
                    <!-- <div class="invalid-feedback">Please fill out this field</div> -->
                    <i class="fas fa-envelope mr-1 text-light"></i><lable class="mb-2 mr-2 text-light">Message :</lable>
                    <textarea name="message" id="message" rows="5" placeholder="Enter Message .." class='form-control' required></textarea>
                    <!-- <div class="valid-feedback">Valid.</div> -->
                    <!-- <div class="invalid-feedback">Please fill out this field</div> -->
                    <center><button class="btn btn-primary" type="submit" name="sendMessage" value="sendMessage">Send</button></center>
            </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php
        if(isset($_POST['sendMessage'])){
            foreach ($_POST as $key => $value) {
                if($value == ''){
                    // header("contect_us.php");
                    echo "<script>window.location.href='contect_us.php';</script>";
                }
            }
            $current_user = $_SESSION['tsn-login']['id'];
            $subject = filter_data($_POST['subject']);
            $message = filter_data($_POST['message']);
            mysqli_query($conn,"INSERT INTO `contect_us` (`user_id`,`subject`,`message`) VALUES ($current_user,'$subject','$message')");
            echo "<script>window.location.href='../main.php?success=Thanks for connecting me, we receive the message soon..';</script>";
            // header("location:../main.php?success=Thanks for connecting me, we receive the message soon..");
        }
        
    }else{
    echo "<script>window.location.href='../../../index.php?error=Unautorized user...';</script>";
    // header("location:../../../index.php?error=Unautorized user...");
}
?>

<script>

function validate_data(){
    var subject = document.getElementById('subject').value;
    var message = document.getElementById('message').value;
    if(subject == '' || message == ''){
        alert("All field required");
        return false;
    }
    if(message.length > 1001){
        alert("You can only type 1000 words...");
        return false;
    }
    if(subject.length > 501){
        alert("You can only type 500 words...");
        return false;
    }
    return true;
}

</script>
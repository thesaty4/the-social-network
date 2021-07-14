<?php
function filter_data($data){
    return filter_var($data,FILTER_SANITIZE_STRING);
}
include("../../../include/database_connection.php");
$conn = db_conn();
session_start();
$uId = filter_data($_SESSION['tsn-login']['id']);
$obj = mysqli_query($conn,"SELECT * FROM users WHERE user_id = $uId;");
// if(mysqli_num_rows($obj) != 0){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile-Update</title>
    <!-- <link rel="stylesheet" href="../../../css/style.css"> -->
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../icon/font-awesome/css/all.css">
    <script src="../../../js/alert-message.js"></script>
</head>
<body>
<?php
    include("logoNavbar.php");
    if(isset($_GET)){
        echo '<div id="alert">';
            if(isset($_GET['success'])){
                echo "<script> successAlert('".$_GET['success']."');</script>";
            }else if(isset($_GET['error'])){
                echo "<script> dangerAlert('".$_GET['error']."');</script>";
            }else if(isset($_GET['warning'])){
                echo "<script> warningAlert('".$_GET['warning']."');</script>";
            }
        echo '</div>';
        }
?>
    
    <div class="container">
        <div class="row" style='font-family:cambria;'>
            <div class="col-md-6">
                <form action="../../signup-process/updateMyProfile.php" method='post' class='p-md-4 was-validated' onsubmit='return(validateForm());'  enctype="multipart/form-data">
                    <?php
                        while($rows = mysqli_fetch_assoc($obj)){
                        ?>  <div class="col-12 text-center"> <img src="../../signup-process/<?php echo $rows['profile_location'];?>" style='height:70px; width:70px; border-radius:50%;box-shadow:0px 0px 4px black; border:2px solid gray;'></div>
                            
                            <label  class='font-weight-bold'>Profile</label>
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01"><i class="fas fa-images"></i></span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="myfile" class="custom-file-input" id="inputGroupFile01"
                                aria-describedby="inputGroupFileAddon01">
        
                                <label class="custom-file-label" for="inputGroupFile01">Choose image..</label>
                            </div>

                            </div>
                            <label class='mt-2 font-weight-bold'>First Name : </label>
                            <input type="text" name='fname' id='fname' value='<?php echo $rows['fname'];?>' class='form-control' required>
                            <label class='mt-2 font-weight-bold'>Last Name : </label>
                            <input type="text" name='lname' id='lname' value='<?php echo $rows['lname'];?>' class='form-control' required>
                            <label class='mt-2 font-weight-bold'>Gender : </label>
                            <select name="gender" id="gender" class='form-control' required>
                                <option value="male" <?php if($rows['gender'] == 'male'){ echo 'selected';}?>>Male</option>
                                <option value="female" <?php if($rows['gender'] == 'female'){ echo 'selected';}?>>female</option>
                                <option value="other" <?php if($rows['gender'] == 'other'){ echo 'selected';}?>>other</option>
                            </select>
                            <label class='mt-2 font-weight-bold'>Mobile Number : </label>
                            <input type="number" name='mobile' id='mobile' value='<?php echo $rows['mobile'];?>' class='form-control' required>
                            <label class='mt-2 font-weight-bold'>Email : </label>
                            <input type="email" name='email' id='email' value='<?php echo $rows['email'];?>' class='form-control' required><br>
                            <button type='submit' name='changeProfile' value='change' class='btn btn-dark btn-block'><i class='fas fa-edit'></i> Update</button>
                        <?php
                        }
                    ?>
                </form>
            </div>

            <div class="col-md-6">
                <form action="changePass.php" method='post' class='p-md-4 was-validated' onsubmit='return(validatePass());'>
                <div class="col-12 text-center mt-4"><i class='fas fa-lock fa-3x'></i></div>
                    <label class='font-weight-bold'>Old Password :</label>
                    <input type="text" name='oldPass' id='oldPass' placeholder='Type Old Password..' class='form-control' required>
                    <label class='mt-2 font-weight-bold'>New Password :</label>
                    <input type="password" name='newPass' id='newPass' placeholder='Type Old Password..' class='form-control' required>
                    <label class='mt-2 font-weight-bold'>Confirm Password :</label>
                    <input type="password" name='confirmPass' id='confirmPass' placeholder='Type Old Password..' class='form-control' required><br>
                    <button type='submit' name='changeProfile' value='change' class='btn btn-dark btn-block'><i class='fas fa-edit'></i> Change</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
?>

<script>
function validateForm(){
    var fname = document.getElementById('fname').value;
    var lname = document.getElementById('lname').value;
    var gender = document.getElementById('gender').value;
    var mobile = document.getElementById('mobile').value;
    var email = document.getElementById('email').value;
    if(fname == ''  || lname == '' || gender == '' || mobile == '' || email == ''){
        alert("Warning : All field required..");
        return false;
    }
    if(mobile.length > 10 || mobile.length < 10){
        alert("Warning : Mobile number should be 10 digits..");
        return false;
    }
    return true;
}
function validatePass(){
    var oldPass = document.getElementById("oldPass").value;
    var newPass = document.getElementById("newPass").value;
    var confirmPass = document.getElementById("confirmPass").value;
    if(oldPass == '' || newPass == '' || confirmPass == ''){
        window.location.href='profile_update.php?warning=Warning : All field required..';
        return false;
    }
    if(newPass != confirmPass){
        window.location.href='profile_update.php?warning=Warning : Confirm and new password should be same..';
        return false;
    }

    return true;
}
</script>
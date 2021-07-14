<?php session_start(); if(!isset($_SESSION['tsn-login'])){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Social Network</title>
    <link rel="stylesheet" type="text/css" href="./icon/font-awesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script src="./js/alert-message.js"></script>
    <script src="./js/preloader.js"></script>
    <script src="./js/jquery-3.5.1.min.js"></script>
    <style>
        /* body::after{
            content: '';
            position:absolute;
            top:0;
            left:0;
            width: 100%;
            height: 100%;
            background: #000;
            opacity: .7;
            z-index: -1;
        } */

    </style>
</head>
<body onload='load();'>

<!--CSS Spinner-->
<div class="spinner-wrapper bg-white" id='load'>
   <div class="spinner"></div>
</div>
<script>
function load(){
    document.getElementById("load").style.display='none';
}

// $(document).ready(function() {
//     //Preloader
//     preloaderFadeOutTime = 10000;
//     function hidePreloader() {
//     var preloader = $('.spinner-wrapper');
//     preloader.fadeOut(preloaderFadeOutTime);
//     }
//     hidePreloader();
//     });
// </script>

<!-- Login Navbar including -->
<?php include("include/navbar.php"); ?>
<div class="container-fluid mt-5">
<!-- Error and success control -->
<?php
    if(isset($_GET)){
        echo '<div id="alert">';
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
?>
    <div class="row p-3 p-md-5">
        <!-- login section -->
        <div class="col-7 d-none d-lg-block">
            <div class="text-center mt-5 font-cambria-math font-weight-bold"><br><br><br>
                <i class='fas fa-users fa-5x text-light'></i>
                <div class="h2 font-weight-bold text-aqua">Let's make a <lable class="text-orange">new friend !</lable></div>
                <div class="h5 text-light">Hey Guys Let's Login if have account. But if you have didn't account then try to register yourself!</div>
            </div>
        </div>
        <?php if(!(isset($_GET['login']) || isset($_GET['signup'])) || isset($_GET['login'])){
            ?>
        
        <div class="col-lg-5">
            <form action = 'php/login-process/main.php' method = 'post' onsubmit = 'return(log_validate())' id = 'login' class = 'mt-0 p-5 radius box-shadow-black mb-0 mb-sm-4 was-validated bg-light'>
                <h2 class = 'center text-dark text-center'><i class = 'fas fa-user mr-2'></i>Login</h2>

                <lable class = 'ml-2 mb-2'><i class = 'fas fa-envelope mr-2'></i>Email :</lable>
                <input autocomplete='off' type = 'email' name = 'email' id = 'email' class = 'form-control mt-1' placeholder = 'Email' required><br>

                <lable class = 'ml-2 mb-2 mt-3'><i class = 'fas fa-unlock-alt mr-2'></i>Password :</lable>
                <input autocomplete='off' type = 'password' name = 'password' id = 'password' class = 'form-control mt-1' placeholder = 'Password' required><br>

                <lable class = 'ml-2 mb-2 mt-3'><i class = 'fas fa-fingerprint mr-2'></i>Captcha</lable>
                <?php $code = mt_rand( 111111, 999999 );
                echo "<input autocomplete='off' type='text' name='captcha-code' id='captcha-code' value='".$code."' hidden>";
                ?>
                <lable class = 'ml-2 mb-2 mt-3 bg-white px-4 px-md-5 '><i><?php echo '<b>'.$code.'</b>';
                ?></i></lable></i>
                <input autocomplete='off' type = 'text' name = 'input-captcha' id = 'input-captcha' class = 'form-control mt-1' placeholder = 'Enter Captcha code' required><br>

                <label class='font-weight-bold mb-3'>I didn't have any account - <a href="index.php?signup" class='text-danger'>Create Account ?</a></label>
                <center><input type="submit" name='login' value="Login" class="btn btn-block btn-dark"></center>
            </form>
        </div>
        
        <?php
        }?>

        <!-- signup section -->
        <?php if(isset($_GET['signup'])){
        ?>

        <div class="col-lg-5 ml-auto">
        <form action="php/signup-process/main.php" method="post" enctype="multipart/form-data" onsubmit="return(signup_validate())" class="mt-0 p-5 radius bg-light box-shadow-black mb-0 mb-sm-4 was-validated">
                        <h2 class="center text-dark text-center"><i class="fas fa-users mr-2"></i>Sign Up</h2>

                        <lable class="ml-2 mb-2"><i class="fas fa-user-circle"></i> Profile :</lable><br>

                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01"><i class="fas fa-images"></i></span>
                        </div>
                        <div class="custom-file">
                            <input autocomplete='off' type="file" name="myfile" class="custom-file-input" id="inputGroupFile01"
                            aria-describedby="inputGroupFileAddon01" required>
    
                            <label class="custom-file-label" for="inputGroupFile01">Choose image..</label>
                        </div>
                        </div>

                        <lable class="ml-2 mb-2"><i class="fas fa-user"></i> First Name :</lable>
                        <input autocomplete='off' type="text" name="fname" id="fname" placeholder='First Name' class="form-control mt-1" required>

                        <lable class="ml-2 mb-2 mt-3"><i class="fas fa-user"></i> Last Name :</lable>
                        <input autocomplete='off' type="text" name="lname" id="lname" placeholder='Last Name' class="form-control mt-1" required>
                        
                        <lable class="ml-2 mb-2 mt-3"><i class="fas fa-user"></i> Gender :</lable>
                        <select name="gender" id="gender" class='form-control' required>
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">female</option>
                            <option value="other">other</option>
                        </select>

                        <lable class="ml-2 mb-2 mt-3"><i class="fas fa-envelope"></i> Email :</lable>
                        <input autocomplete='off' type="email" name="email" id="signup_email" placeholder='Email : example@gmail.com' class="form-control mt-1" required>
                        
                        <lable class="ml-2 mb-2 mt-3"><i class="fas fa-phone"></i> Mobile :</lable>
                        <div class="col d-flex px-0">
                            <select name="country_code" id="country_code" class="w-25 form-control px-0" required>
                                <option value="">Select</option>
                                <option value="+91">+91</option>
                                <option value="+92">+92</option>
                                <option value="+977">+977</option>
                                <option value="+1">+1</option>
                                <option value="+31">+11</option>
                            </select>
                            <input autocomplete='off' type="number" name="mobile" id="mobile" placeholder='Mobile Number' class="form-control" required>
                        </div>

                        <lable class="ml-2 mb-s2 mt-3"><i class="fas fa-lock"></i> Password :</lable>
                        <input autocomplete='off' type="password" name="password" id="signup_password" placeholder='Type Password' class="form-control mt-1" required>

                        <lable class="ml-2 mb-2 mt-3"><i class="fas fa-lock"></i> Confirm Password :</lable>
                        <input autocomplete='off' type="password" name="confirm_password" id="confirm_password" placeholder='Re-type Password' class = 'form-control mt-1 mb-1' required>
                    
                    <!-- Email verification -->
                        <!-- <lable class="ml-2 mb-2 mt-3"><i class="fas fa-envelope"></i> Email verification OTP :</lable>
                        <input autocomplete='off' type="text" name="otp" id="otp" placeholder='Enter Email OTP' class = 'form-control mt-1 mb-1' disabled> -->
                    
                        <center class="mt-3"><div class='btn-group'><input type = 'submit' value = 'Register' name = 'signup' class = 'btn btn-dark active'>
                        <!-- <button type = 'button' onclick="opt_verification()" name = "otp" class = 'btn btn-dark'>Get OTP</button> -->
                        </div></center>

        </form>
        </div>
        <?php
        }?>
    </div>
</div>
<div class='bg-black'>
<?php include("include/copyright.php");?>
</div>
<script src="js/signup-validate.js"></script>
<script src="js/login-validate.js"></script>
</body>
</html>
<?php }else{
    if($_SESSION['tsn-login']['account_type'] == 'admin'){
        header("location:php/admin/main.php");
    }
    if($_SESSION['tsn-login']['account_type'] == 'user'){
        header("location:php/user/main.php");        
    }
}?>

<script>

function opt_verification(){
    var email = prompt("Please enter email id", "name@example.com");
    
    if (email == null || email == "") {
      window.location.href='index.php?signup';
    } else {
      window.location.href=("php/mailer.php?email="+email);
    }
}


</script>
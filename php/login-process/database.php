<?php
// session_start();
include("../../include/database_connection.php");
function login($arg){
    $email = $arg['email'];
    $password = $arg['password'];
    $conn = db_conn();
    $sql = 'SELECT * FROM `users` WHERE `email` = ?';
    $stmt = mysqli_prepare($conn,$sql);
    if(!$stmt){
        return 'stmt_error';
    }
    mysqli_stmt_bind_param($stmt,'s',$email);
    mysqli_stmt_bind_result($stmt,$db_id, $filename, $location, $db_fname, $db_lname, $db_gender, $db_country_code, $db_mobile, $db_email, $db_password, $account_type, $status, $c_time, $c_date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_fetch($stmt);
    if($status == 'deactive'){
        return 'account_deactive';
    }else if(password_verify($password,$db_password)){
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return [
            'id'                => $db_id,
            'profile_filename'  => $filename,
            'profile_location'  => $location,
            'fname'             => $db_fname,
            'lname'             => $db_lname,
            'gender'            => $db_gender,
            'country_code'      => $db_country_code,
            'mobile'            => $db_mobile,
            'email'             => $db_email,
            'account_type'      => $account_type,
            'status'            => $status,
            'c_time'            => $c_time,
            'c_date'            => $c_date
        ];
    }else{
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return 'invalid_user';
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return [];
}
?>
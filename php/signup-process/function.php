<?php

function data_validate( $arg ) {
    foreach ( $arg as $key => $value ) {
        if ( $value == '' or $value == null ) {
            return 'empty';
        }
    }
    return true;
}

function data_sanitize( $arg, $file ) {
    // echo "<pre>";
    // print_r($arg);
    // echo "</pre>";
    $upload_directory = "profiles/";
    $filename         = $file["myfile"]['name'];
    $upload_directory .= $filename;
    $tmp_dir           = $file['myfile']['tmp_name'];
    $size              = $file['myfile']['size'];
    $ext               = pathinfo($filename, PATHINFO_EXTENSION);
    if($ext == 'jpg' OR $ext == 'jpeg' OR $ext == 'png' OR $ext == 'gif'){
        $fname = filter_var( $arg['fname'], FILTER_SANITIZE_STRING );
        $lname = filter_var( $arg['lname'], FILTER_SANITIZE_STRING );
        $gender = filter_var( $arg['gender'], FILTER_SANITIZE_STRING );
        $email = filter_var( $arg['email'], FILTER_SANITIZE_EMAIL );
        $country_code = filter_var( $arg['country_code'], FILTER_SANITIZE_STRING );
        $mobile = filter_var( $arg['mobile'], FILTER_VALIDATE_INT );
        $password = filter_var( $arg['password'], FILTER_SANITIZE_STRING );
        $password = password_hash( $arg['password'], PASSWORD_DEFAULT );
        $valid_email = filter_var( $arg['email'], FILTER_VALIDATE_EMAIL );
        if ( !$valid_email ) {
            return 'invalid_email';
        } else {
            return ['filename' => $filename, 'tmp_dir' => $tmp_dir, 'upload_directory'=> $upload_directory, 'fname' => $fname, 'lname' => $lname, 'gender' => $gender, 'email' => $email, 'country_code' => $country_code, 'mobile' => $mobile, 'password' => $password];
            }
    }else{
        // echo "<script>alert('".$ext."');</script>";
        return 'invalid_image';
    }

}

function show_error( $arg ) {
    $error = [
        'invalid_image' => 'You can upload jpg/jpeg/png/gif file only !',
        'empty' => 'Warning : all field required !',
        'invalid_email' => 'Error : invalid Email farmet !',
        'stmt_error'    => 'Opps something wen\'t wrong',
        'stmt_not_execute' => 'Error: Email or mobile already exists..'
    ];
    header( 'location:../../index.php?error='.$error[$arg] );
}

function show_success( $arg ) {
    $success = [
        'signup_successfull' => 'You have Successfully Registerd'
    ];
    header( 'location:../../index.php?success='.$success[$arg] );
}
?>
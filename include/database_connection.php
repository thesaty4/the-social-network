<?php
    function db_conn(){
        $conn_status = mysqli_connect('localhost','root','','the_social_network1');
        if(mysqli_connect_errno()){
            die(mysqli_connect_error());
        }
        return $conn_status;
        mysqli_colse($conn_status);
    }
?>
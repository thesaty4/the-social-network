<?php

function filter_data($data){
    return filter_var($data,FILTER_SANITIZE_STRING);
}

?>
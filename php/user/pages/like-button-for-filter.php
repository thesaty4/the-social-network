<?php

if($like_check_value == 0){
    $like_btn = "<form action='".$_SERVER['PHP_SELF']."' method='post'>
                <input type='text' name='id_counter' value='".$post_id."' required hidden>
                <input type='text' name='post_id' value='".$post_id."' required hidden>
                <button type='submit' name='like_in_".$filter."' value='like-the-post' class='button-none'> <i class='far fa-heart text-danger'></i> ".$num_of_like."</button>
            </form>";    
    }else{
            $like_btn = "<form action='".$_SERVER['PHP_SELF']."' method='post'>
                        <input type='text' name='id_counter' value='".$post_id."' required hidden>
                        <input type='text' name='post_id' value='".$post_id."' required hidden>
                        <button type='submit' name='unlike_in_".$filter."' value='like-the-post' class='button-none'> <i class='fas fa-heart text-danger'></i> ".$num_of_like;
    }

?>
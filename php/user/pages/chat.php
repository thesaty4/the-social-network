
<!-- Auto load users chat list------------------ -->
<?php 
if(isset($_GET['chatwith'])){
    $col_size = "col-6";
    $chat_display = 'd-none d-lg-block';
    $display ='d-flex';
}else{
    $col_size = "col-12";
    $chat_display = '';
    $display ='';
}?>
<div class='row <?php echo $display;?>'>
    <div id='load_user' class='w-100 <?php echo $col_size." ".$chat_display;?>'></div>
    <!-- <script src="http://code.jquery.com/jquery-latest.js"></script> -->

    <script>
            $(document).ready(function(){
            $("#load_user").load("pages/chat-user-list.php");
            setInterval(function(){
                $("#load_user").load("pages/chat-user-list.php");
            }, 1000);
        });
    </script> 
    <?php
    // Auto load users chat ------------------
    if(isset($_GET['chatwith'])){
        // echo "<div class='col-lg-6 bg-maroon w-100'>";
            echo " <div class='col-lg-6'>
                <div class='col-12 w-100 bg-dark p-2  d-none d-lg-block text-center font-cambria text-light'>Chat with ".$rows['fname']."</div>
                <div class='mb-4' style='overflow-y:scroll; height:81vh;'>";
            $chatWithUser = filter_data($_GET['chatwith']);
            ?>
            <div id='div_refresh'></div>
                <!-- <script src="http://code.jquery.com/jquery-latest.js"></script> -->
                <script>
                        $(document).ready(function(){
                        $("#div_refresh").load("pages/chat-load.php?chatwith="+"<?php echo $chatWithUser;?>"+"#eof");
                        setInterval(function(){
                            $("#div_refresh").load("pages/chat-load.php?chatwith="+"<?php echo $chatWithUser;?>"+"#eof");
                        }, 1000);
                    });
                </script> 
                <?php
            echo "<div id='eof'></div>
            </div>
            <div class='fixed-bottom p-1' style='background-color:#ccc;'>
            <form action='".$_SERVER['PHP_SELF']."' method='post' id='msg' onsubmit='return(chatValidate())'>
                <input type='text' name='current_user' id='currentUser' value='".$current_user."' hidden required>
                <input type='text' name='chatwith_user' id='chatWith' value='".$chatWithUser."' hidden required>
                <div class='btn-group w-100'><input type='text' name='message' id='message' placeholder='Write your message...' class='form-control' autocomplete='off' required>
                <button name='send_message' value='msg' class='btn btn-info'>Send</button></div>
            </form>
            </div>
        </div>";
    }
    echo "</div>";
    ?>
</div>

<script>
    //  $(document).ready(function(){
    //     $("#msg-sent").click(function(){

    //         $.ajax({
    //             url : '$_SERVER['PHP_SELF']',
    //             type : "post",
    //             data : $("#msg").serialize();
    //             success : function(data){
    //                 alert("message sent");
    //             }
    //         });
    //     });
    // });

    function chatValidate(){
    var currentUser = document.getElementById("currentUser").value;
    var chatWith = document.getElementById("chatWith").value;
    var message = document.getElementById("message").value;
    if(currentUser == '' || chatWith == '' || message == ''){
        alert("Warning : All field required..");
        return false;
    }
    return true;
}
</script>


                    <!-- <div id='div_refresh'></div>
                    <script src="http://code.jquery.com/jquery-latest.js"></script>
                    <script>
                            $(document).ready(function(){
                            $("#div_refresh").load("pages/chat.php");
                            setInterval(function(){
                                $("#div_refresh").load("pages/chat.php");
                            }, 1000);
                        });
                    </script>
                 -->
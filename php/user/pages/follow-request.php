<?php
$current_user = $_SESSION['tsn-login']['id'];
$obj = mysqli_query($conn,"SELECT * FROM users ORDER BY c_date DESC");
if(mysqli_num_rows($obj) == 0){
    echo "<div class='text-center p-4 text-danger'><i class='fas fa-evelopse'></i> May be users not Avilabel!</div>";
}else{
  
?>
<span id='load_request'></span>
<script>
// page refresh after 5 second
    $(document).ready(function(){
        $("#load_request").load("pages/request-load.php");
        setInterval(function(){
            $("#load_request").load("pages/request-load.php");
        }, 5000);
    });
</script> 
<?php


}
// echo  $follow_value2;
?>
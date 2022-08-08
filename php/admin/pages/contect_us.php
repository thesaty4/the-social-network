<?php
if(isset($_SESSION['tsn-login']) AND $_SESSION['tsn-login']['account_type'] == 'admin'){
?>
    <div class="table-responsive text-capitalize mt-3 font-cambria">
        <div class="col-12 bg-dark text-center text-light font-weight-bold">Someone Contect With You</div>
        <table class="table table-hoverd bg-light box-shadow-black">
            <?php
                $obj = mysqli_query($conn,"SELECT c.*,u.user_id,u.fname,u.lname,u.profile_location FROM contect_us AS c INNER JOIN users AS u ON c.user_id = u.user_id WHERE c.is_seen = 0");
                while($rows = mysqli_fetch_assoc($obj)){
                    echo "<tr style='background:#ccc;'>
                            <td><a href='main.php?contectDetails=".$rows['contect_id']."' class='text-dark'><img src='../signup-process/".$rows['profile_location']."' style='height:30px; width:30px; box-shadow:0px 0px 4px black; border:2px solid black;border-radius:50%;'/></a></td>
                            <td><a href='main.php?contectDetails=".$rows['contect_id']."' class='text-dark font-weight-bold'>".$rows['fname']." ".$rows['lname']."</a></td>
                            <td><a href='main.php?contectDetails=".$rows['contect_id']."' class='text-danger'><i class='fas fa-circle'></i></a></td>
                    </tr>";
                }

                $obj = mysqli_query($conn,"SELECT c.*,u.user_id,u.fname,u.lname,u.profile_location FROM contect_us AS c INNER JOIN users AS u ON c.user_id = u.user_id WHERE c.is_seen = 1");
                while($rows = mysqli_fetch_assoc($obj)){
                    echo "<tr>
                            <td><a href='main.php?contectDetails=".$rows['contect_id']."' class='text-dark'><img src='../signup-process/".$rows['profile_location']."' style='height:30px; width:30px; box-shadow:0px 0px 4px black; border:2px solid black;border-radius:50%;'/></a></td>
                            <td><a href='main.php?contectDetails=".$rows['contect_id']."' class='text-dark'>".$rows['fname']." ".$rows['lname']."</a></td>
                            <td><a href='main.php?contectDetails=".$rows['contect_id']."' class='text-success'><i class='fas fa-check'></i></a></td>
                    </tr>";
                }
            ?>
        </table>
    </div>
<?php
}else{
    echo "<script>window.location.href='../main.php?success=../../../index.php?error=Unautorized user...';</script>";

    // header("location:../../../index.php?error=Unautorized user...");
}
?>
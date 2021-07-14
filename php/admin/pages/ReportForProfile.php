<?php
    $reportId = filter_data($_GET['Report']);
    $obj = mysqli_query($conn,"SELECT r.*,u.fname,u.lname FROM report AS r INNER JOIN users AS u ON r.user_id = u.user_id WHERE r.report_id = $reportId");
    if(mysqli_num_rows($obj) == 0){
        echo "<script>window.location.href='main.php';</script>";
    }
?>
<br><br><br><div class="row mt-5 bg-light box-shadow-black p-3 p-md-4 font-cambria">
    <?php
        $rows = mysqli_fetch_assoc($obj);
        if($rows['is_seen'] == 0){
            mysqli_query($conn,"UPDATE report SET is_seen = 1 WHERE report_id = $reportId");
        }
        echo "<div class='row'>
            <div class='col-11 h5 text-capitalize font-weight-bold'><span class='mt-1'>".$rows['fname']."'s Report</span></div>
            <div class-'col-1'><a href='main.php?report' class='text-danger h4'> &times;</a></div>
        <hr class='w-100'>";
    ?>
    <div class="col-6 mt-2 font-weight-bold">Reported By </div>
    <div class="col-6 mt-2"><?php echo $rows['fname']." ".$rows['lname'];?></div>

    <div class="col-6 mt-2 font-weight-bold">Reporting Time </div>
    <div class="col-6 mt-2"><?php echo $rows['c_time'];?></div>

    <div class="col-6 mt-2 font-weight-bold">Reporting Date </div>
    <div class="col-6 mt-2"><?php echo $rows['c_date'];?></div>

    <div class="col-6 mt-2 font-weight-bold">Reporting Category </div>
    <div class="col-6 mt-2"><?php echo $rows['category'];?></div>

    <div class="col-6 mt-2 font-weight-bold">Report</div>
    <div class="col-6 mt-2"><?php echo $rows['report'];?></div>

    <div class="col-12">
        <form action="main.php" method='post'>
        <input type="text" name='reportId' value='<?php echo $rows['report_id'];?>' hidden>
        <button type='submit' name='DeleteFromReport' class='mt-4 btn btn-dark btn-block'>Delete</button>
        </form>
    </div>
</div>
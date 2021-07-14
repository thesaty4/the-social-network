<?php
function createTableNoneSee($data,$page){
    return "<tr class='' style='background:#ccc;'>
        <td><a href='main.php?".$page."=".$data['report_id']."'><img src='../signup-process/".$data['profile_location']."' style='height:25px;width:25px; border:2px solid gray; box-shadow:0px 0px 3px black; border-radius:50%;'/></td>
        <td class='text-capitalize'><a href='main.php?".$page."=".$data['report_id']."' class=' font-weight-bold text-dark' style='text-decoration:none;'>".$data['fname']." ".$data['lname']."</td>
        <td><a href='main.php?".$page."=".$data['report_id']."' class='text-danger'><i class='fas fa-circle'></i></td>
    </tr></a>";
}
function createTableSee($data,$page){
    return "<tr>
        <td><a href='main.php?".$page."=".$data['report_id']."'><img src='../signup-process/".$data['profile_location']."' style='height:25px;width:25px; border:2px solid gray; box-shadow:0px 0px 3px black; border-radius:50%;'/></td>
        <td class='text-capitalize'><a href='main.php?".$page."=".$data['report_id']."' class='text-dark' style='text-decoration:none;'>".$data['fname']." ".$data['lname']."</td>
        <td><a href='main.php?".$page."=".$data['report_id']."' class='text-success'><i class='fas fa-check'></i></td>
    </tr></a>";
}

?>
<div class="row mt-2 font-cambria">
    <div class="col-md-6">
        <div class="col-12 bg-dark p-2 text-center text-light"><i class='fas fa-info-circle text-danger'></i> Direct Report</div>
        <div class="table-responsive ">
            <table class="table bg-light">
                <?php
                // For none see report
                $directReportObj = mysqli_query($conn,"SELECT r.*,u.* FROM report AS r INNER JOIN users AS u ON r.user_id = u.user_id ORDER BY r.report_id DESC");
                while($reportRows = mysqli_fetch_assoc($directReportObj)){
                    if($reportRows['is_seen'] == 0){
                        echo createTableNoneSee($reportRows,'Report');
                    }
                }

                
                // for see report
                $directReportObj = mysqli_query($conn,"SELECT r.*,u.* FROM report AS r INNER JOIN users AS u ON r.user_id = u.user_id ORDER BY r.report_id DESC");
                while($reportRows = mysqli_fetch_assoc($directReportObj)){
                    if($reportRows['is_seen'] == 1){
                        echo createTableSee($reportRows,'Report');
                    }
                }
                ?>
            </table>    
        </div>
    </div>
    <div class="col-md-6  mt-3 mt-md-0">
        <div class="col-12 bg-dark p-2 text-center text-light"><i class='fas fa-info-circle text-danger'></i> Post Report</div>
        <div class="table-responsive">
            <table class="table bg-light">
                <?php
                // For none see report
                $postReportObj   = mysqli_query($conn,"SELECT r.*,u.*,p.* FROM post_report As r INNER JOIN users AS u ON r.user_id = u.user_id INNER JOIN posts AS p ON p.post_id = r.post_id");
                while($postReportRows = mysqli_fetch_assoc($postReportObj)){
                    if($postReportRows['is_seen'] == 0){
                        echo createTableNoneSee($postReportRows,'PostReport');
                    }
                }

                // for see report
                $postReportObj   = mysqli_query($conn,"SELECT r.*,u.*,p.* FROM post_report As r INNER JOIN users AS u ON r.user_id = u.user_id INNER JOIN posts AS p ON p.post_id = r.post_id");
                while($postReportRows = mysqli_fetch_assoc($postReportObj)){
                    if($postReportRows['is_seen'] == 1){
                        echo createTableSee($postReportRows,'PostReport');
                    }
                }
                ?>
            </table>    
        </div>
    </div>
</div>
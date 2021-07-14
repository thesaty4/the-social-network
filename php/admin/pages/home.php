 <!-- Post Management -->
<div class="col-12 d-flex bg-light" style='border:1px solid black; border-radius:0px 0px 10px 10px; box-shadow:0px 0px 3px black;'>
    <div class="col-lg-11 col-10 d-flex text-dark">
        <a href="main.php?ads" class=' text-dark w-100 nav-link' style='cursor:text;'><div>Write Ads Title...</div></a> 
        <div class='ml-auto mt-1'>|</div>
    </div>
    <div class="col-lg-1 col-2" style='cursor:pointer;'>
        <a href="main.php?post" class='nav-link text-dark'><i class='fas fa-images'></i></a>
    </div>
</div>
<!--                            ----------------------------------------------------                         -->


<div class="table-responsive">
    <table class="table table-hover table-striped bg-light box-shadow-black mt-4 text-cambria text-capitalize text-center">
        <?php
            $counter = 1;
            $obj = mysqli_query($conn,"SELECT * FROM sponsor ORDER BY sponsor_id DESC");
            if(mysqli_num_rows($obj) == 0){
                echo "<tr><td  class='text-center font-weight-bold'>No Sponsor Available</td></tr>";
            }else{
                echo "<tr class='bg-dark text-light font-weight-bold'><td>#</td><td>Ads Title</td><td>Date</td><td></tr>";
                while($rows = mysqli_fetch_assoc($obj)){
                    echo "<tr>
                        <td>".$counter."</td>
                        <td><a href='main.php?showAds=".$rows['sponsor_id']."' class='text-dark d-block' style='text-decoration:none;'>".$rows['sponsor_title']."</a></td>
                        <td>".$rows['c_date']."</td>
                        <td><a href='pages/delete-ads.php?id=".$rows['sponsor_id']."' class='text-dark'><i class='fas fa-trash'></i></a></td>
                    </tr>";
                    $counter += 1;
                }
            }
        ?>
    </table>
</div>
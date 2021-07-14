<?php
if(!isset($_GET['search'])){
                $obj = mysqli_query($conn,"SELECT user_id,fname,lname,profile_location,account_type,status FROM users WHERE account_type = 'user' ORDER BY fname;");
            }else{
                $query = filter_data($_GET['search']);
                $obj = mysqli_query($conn,"SELECT `user_id`,`filename`,`profile_location`,`account_type`,`fname`,`lname`,`profile_location`,`status` FROM `users` WHERE `fname` LIKE '$query%' OR `lname` LIKE '$query%' OR `fname` LIKE '%$query' OR `lname` LIKE '%$query' OR `mobile` LIKE '$query%' OR `mobile` LIKE '%$query' OR `email` LIKE '%$query' OR `email` LIKE '$query%'  ORDER BY `fname`;");
                // $obj = mysqli_query($conn,"SELECT user_id,fname,lname,profile_location,account_type,status FROM users WHERE  ORDER BY fname;");
            }
            ?>
            <div class="table-responsive mt-4">
                <div class="col-12 bg-dark text-center text-light font-weight-bold font-cambria  box-shadow-black" style='letter-spacing:1px;'>User's Management</div>
                <table class="table table-striped  bg-light font-cambria text-capitalize  box-shadow-black">
                    <?php
                    if(mysqli_num_rows($obj) == 0){
                        echo "<tr><td class='text-danger text-center'><i class='fas fa-search'></i> Unable to location this user...</div>";
                    }
                    while($rows = mysqli_fetch_assoc($obj)){
                        if($rows['account_type'] == 'user'){
                            if($rows['status'] == 'active'){
                                $status = 'checked';
                                $title = 'Activated';
                            }else{
                                $status = '';
                                $title = 'Dectivated';
                            }    
                    echo "<tr>
                                <td><img src='../signup-process/".$rows['profile_location']."' style='width:35px;height:35px; border-radius:50%; box-shadow:0px 0px 5px black; border:2px solid gray;'></td>
                                <td>".$rows['fname']." ".$rows['lname']."</td>
                                <td title='User Details'><a href='main.php?user_details=".$rows['user_id']."'><i class='fas fa-folder-open text-dark'></i></a></td>
                                <td>
                                    <form action='pages/user-manage.php' method='post'>
                                        <input type='text' name='user_id' value='".$rows['user_id']."' hidden>
                                        <input type='text' name='status' value='".$rows['status']."' hidden>
                                        <button type='submit' class='border-none'  title='".$title."'>
                                            <div class='checkbox'>
                                                <label class='switch mt-1 position-absolute-lg'>
                                                <input type='checkbox' ".$status.">
                                                <span class='slider round'></span>
                                                </label>
                                            </div>
                                        </button>
                                    </form>
                                </td>
                            </tr>";
                        }else{
                            echo "<tr>
                            <td><img src='../signup-process/".$rows['profile_location']."' style='width:35px;height:35px; border-radius:50%; box-shadow:0px 0px 5px black; border:2px solid gray;'></td>
                            <td>".$rows['fname']." ".$rows['lname']."</td>
                            <td title='User Details'><a href='main.php?user_details=".$rows['user_id']."'><i class='fas fa-folder-open text-dark'></i></a></td>
                            <td>
                               Admin
                            </td>
                        </tr>";
                        }
                    }?>
                </table>
            </div>
?>
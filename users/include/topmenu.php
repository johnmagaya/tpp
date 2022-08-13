<?php
 $sid=$_SESSION['SID'];
?>
<li class=""><a href="invite.php"><span><?php $cnt=mysqli_query($con,"select * from invite where Receiver='$sid' and Istatus = 'Pending'");
            $nms=mysqli_num_rows($cnt); echo $nms; ?></span><i class="icon-envelope"></i></a></li>
                                <li class="nav-user dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="../image/profile/avatar1.png" class="nav-avatar" />
                                        <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="profile.php">Your Profile</a></li>
                                        <li class="divider"></li>
                                        <li><a href="logout.php">Logout</a></li>
                                    </ul>
                                </li>

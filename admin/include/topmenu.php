<?php
 $aid=$_SESSION['AID'];
?>
<li class=""><a href="invite.php"><span><?php $cnt=mysqli_query($con,"select * from project where Pstatus='Wait For Aprroval'");
            $nms=mysqli_num_rows($cnt); echo $nms; ?></span><i class="icon-envelope"></i></a></li>
                                <li class="nav-user dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="../image/profile/avatar.png" class="nav-avatar" />
                                        <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="profile.php">Your Profile</a></li>
                                        <li class="divider"></li>
                                        <li><a href="logout.php">Logout</a></li>
                                    </ul>
                                </li>

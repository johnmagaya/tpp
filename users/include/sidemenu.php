<?php
include('../include/config.php');
if(strlen($_SESSION['login'])==0)
    {   
        $_SESSION['Message']="You have to login in first";
header('location:../signin.php');
}
else{
  $sid = $_SESSION['SID'];

}
?>
 <div class="span3">
                            <div class="sidebar">
                                <ul class="widget widget-menu unstyled">
                                    <li class="active"><a href="index.php"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                    <li><a href="profile.php"><i class="menu-icon icon-user"></i>Profile</a></li>
                                    <li><a href="project.php"><i class="menu-icon icon-briefcase"></i>Projects <b class="label blue pull-right">
                                    <?php $onpro=mysqli_query($con,"select * from team,project,students where Member='$sid' and team.Pname=project.Pname and Member=StudentID and team.Tstatus='Active'");
            $onpro1=mysqli_num_rows($onpro); echo $onpro1; ?></b> </a>
                                    </li>
                                    <li><a href="invite.php"><i class="menu-icon icon-inbox"></i>Invites <b class="label green pull-right">
                                    <?php $cnt=mysqli_query($con,"select * from invite where Receiver='$sid' and Istatus = 'Pending'");
            $nms=mysqli_num_rows($cnt); echo $nms; ?></b> </a></li>
            <li><a href="sentinvite.php"><i class="menu-icon icon-inbox"></i>Sent Invites
                                    </a></li>
                                     <li><a href="notification.php"><i class="menu-icon icon-comment"></i>Notification & Comments <b class="label green pull-right">
                                     <?php $cnt2=mysqli_query($con,"select * from pnotification where Receiver='$sid' and nstatus = 'unread'");
            $nms=mysqli_num_rows($cnt2); echo $nms; ?></b></a></li>
                                    <li><a href="task.php"><i class="menu-icon icon-tasks"></i>Tasks </a></li>
                                    <li><a href="friends.php"><i class="menu-icon icon-group"></i>Users</a></li>
                                </ul>
                                <!--/.widget-nav-->
                                <ul class="widget widget-menu unstyled">
                                    <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                                </ul>
                            </div>
                            <!--/.sidebar-->
                        </div>
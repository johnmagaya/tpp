<?php
include('../include/config.php');
if(strlen($_SESSION['login'])==0)
    {   
        $_SESSION['Message']="You have to login in first";
header('location:../signin.php');
}
else{
  $aid = $_SESSION['AID'];

}
?>
 <div class="span3">
                            <div class="sidebar">
                                <ul class="widget widget-menu unstyled">
                                    <li class="active"><a href="index.php"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                    <li><a href="profile.php"><i class="menu-icon icon-user"></i>Profile</a></li>
                                    <li><a href="project.php"><i class="menu-icon icon-briefcase"></i>New Project <b class="label green pull-right">
                                    <?php $onpro=mysqli_query($con,"select * from project where Pstatus='Wait For Approval'");
            $onpro1=mysqli_num_rows($onpro); echo $onpro1; ?></b> </a>
                                    </li>
                                    <li><a href="project2.php"><i class="menu-icon fa fa-laptop"></i>Manage Projects <b class="label yellow pull-right">
                                    <?php $cnt=mysqli_query($con,"select * from project where Pstatus<>'Denied' and Pstatus<>'Wait For Approval'");
            $nms=mysqli_num_rows($cnt); echo $nms; ?></b> </a></li>
                                     <li><a href="users.php"><i class="menu-icon icon-group"></i>Manage Students </a></li>
                                    <li><a href="reports.php"><i class="menu-icon icon-tasks"></i>Reports </a></li>
                                    <li><a href="approvedreport.php"><i class="fa fa-legal" aria-hidden="true"></i> Approved Reports</a></li>
                                </ul>
                                <!--/.widget-nav-->
                                <!--/.widget-nav-->
                                <ul class="widget widget-menu unstyled">
                                    <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                                </ul>
                            </div>
                            <!--/.sidebar-->
                        </div>
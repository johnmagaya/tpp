<?php
session_start();
include('../include/config.php');
$_SESSION['Message']="";
if(strlen($_SESSION['login'])==0)
    {   
        $_SESSION['Message']="You have to login in first";
header('location:../signin.php');
$sid = $_SESSION['SID'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tpp- Team Project Portal</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    </head>

    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container"><a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse"><i class="icon-reorder shaded"></i></a><a class="brand" href="index.php">T.P.P - Team Project Portal </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav nav-icons">
                            <!-- <li class="active"><a href="#"><i class="icon-envelope"></i></a></li><li><a href="#"><i class="icon-eye-open"></i></a></li><li><a href="#"><i class="icon-bar-chart"></i></a></li>-->
                        </ul>
                        <!-- <form class="navbar-search pull-left input-append" action="#"><input type="text" class="span3"><button class="btn" type="button"><i class="icon-search"></i></button></form>-->
                        <ul class="nav pull-right">
                        <?php include_once('include/topmenu.php') ?>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                <?php include_once('include/sidemenu.php')?>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="content">
                                <div class="module">
                                    <div class="module-head">
                                        <div class=" input-append pull-right">
                                            <form action="friends.php" method="post"><input type="text" name="suser" class="span3" placeholder="Search by name..."><button type="submit" name="search" class="btn"><i class="icon-search"></i></button></form>
                                        </div>
                                        <h3>Friends</h3>
                                    </div>
                                    <div class="module-body">
                                        <div class="row-fluid">
                                             <?php
                                             if(isset($_POST['search'])) {
                                                $suser=$_POST['suser'];
                                                $sid = $_SESSION['SID'];
                                                $cnt2=mysqli_query($con,"SELECT * FROM students WHERE Firstname LIKE '%{$suser}%' OR Lastname LIKE '%{$suser}%' and StudentID<>'$sid'");
                                                         while ($row2=mysqli_fetch_array($cnt2)) {
                                                        
                                                    ?>
                                            <div class="span6">
                                                <div class="media user">
                                                    <a class="media-avatar pull-left" href="#">
                                                        <img src="../image/profile/avatar1.png">
                                                    </a>
                                                    <div class="media-body">
                                                        <h3 class="media-title">
                                                           <?php echo $row2['Lastname']." ".$row2['Firstname']; ?>
                                                        </h3>
                                                        <p>
                                                            <small class="muted"><?php echo $row2['Course']; ?></small></p>
                                                        <div class="media-option btn-group shaded-icon">
                                                            <!-- <button class="btn btn-small">
                                                                <i class="icon-envelope"></i>
                                                            </button> -->
                                                            <button class="btn btn-small">
                                                                <a href="other_user_profile.php?uid=<?php echo htmlentities($row2['StudentID']);?>"><i class="icon-eye-open"></i></a>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php  } }
                                                       else{
                                                        $cnt1=mysqli_query($con,"SELECT * FROM students WHERE StudentID<>'$sid'");
                                                         while ($row2=mysqli_fetch_array($cnt1)) {
                     
                                         ?>
                                            <div class="span6">
                                                <div class="media user">
                                                    <a class="media-avatar pull-left" href="#">
                                                        <img src="../image/profile/avatar1.png">
                                                    </a>
                                                    <div class="media-body">
                                                        <h3 class="media-title">
                                                           <?php echo $row2['Lastname']." ".$row2['Firstname']; ?>
                                                        </h3>
                                                        <p>
                                                            <small class="muted"><?php echo $row2['Course']; ?></small></p>
                                                        <div class="media-option btn-group shaded-icon">
                                                            <!-- <button class="btn btn-small">
                                                                <i class="icon-envelope"></i>
                                                            </button> -->
                                                            <button class="btn btn-small">
                                                                <a href="other_user_profile.php?uid=<?php echo htmlentities($row2['StudentID']);?>"><i class="icon-eye-open"></i></a>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } } ?>
                                            
                                        </div>
                                        <!--/.row-fluid-->
                                        <br />
                                        <div class="pagination pagination-centered">
                                            <ul>
                                                <li><a href="#"><i class="icon-double-angle-left"></i></a></li>
                                                <li><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#"><i class="icon-double-angle-right"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- create project -->
                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
        </div>
        <!--/.wrapper-->
        <div class="footer">
            <div class="container"></div>
        </div>
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
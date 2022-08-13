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
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php">T.P.P - Team Project Portal </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav nav-icons">
                            <!-- <li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                            <li><a href="#"><i class="icon-eye-open"></i></a></li>
                            <li><a href="#"><i class="icon-bar-chart"></i></a></li> -->
                        </ul>
                        <!-- <form class="navbar-search pull-left input-append" action="#">
                            <input type="text" class="span3">
                            <button class="btn" type="button">
                            <i class="icon-search"></i>
                        </button>
                        </form> -->
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
                            <div class="module message">
                                <div class="module-head">
                                    <h3>Notifications</h3>
                                </div>
                                <div class="module-option clearfix">
                                    <!-- <div class="pull-left">
                                        <div class="btn-group"><button class="btn">Invites filter</button><button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Pending(1)</a></li>
                                                <li><a href="#">Accepted(1)</a></li>
                                                <li><a href="#">Denied(1)</a></li>
                                            </ul>
                                        </div>
                                    </div> -->
                                    <!-- <a href=""><button class="btn btn-primary pull-right " data-toggle="modal" data-target="#invitecomp"><i class="icon-plus-sign-alt"></i> Compose</button></a> -->
                                </div>
                                <div class="module-body table">
                                    <table class="table table-message">
                                        <tbody>
                                            <tr class="heading">
                                                <td class="cell-check"><input type="checkbox" class="inbox-checkbox"></td>
                                                <td class="cell-icon"></td>
                                                <td class="cell-author hidden-phone hidden-tablet">From </td>
                                                <td class="cell-title">Message </td>
                                                
                                                <td class="cell-time align-right"> Sent Date </td>
                                                <td class="cell-author hidden-phone hidden-tablet">Delete</td>
                                            
                                            </tr>
                                            <?php
                                                $sid = $_SESSION['SID'];
                                                $status="read";
                                                $sql=mysqli_query($con,"UPDATE pnotification SET nstatus='$status' Where Receiver='$sid'");
                                                $cnt=mysqli_query($con,"SELECT * FROM pnotification,students WHERE  Receiver='$sid'  and Receiver=StudentID");

                                                         while ($cnt1=mysqli_fetch_array($cnt)) { 
                                                    ?>
                                            <tr class="unread">
                                                <td class="cell-check"><input type="checkbox" class="inbox-checkbox"></td>
                                                <td class="cell-icon"><i class="icon-star"></i></td>
                                                <td class="cell-author hidden-phone hidden-tablet"><?php 
                                                 $sender= $cnt1['Sender'];
                                                 $cnw= mysqli_query($con,"SELECT Firstname,Lastname FROM students WHERE  StudentID='$sender'");
                                                 while ($cnw1=mysqli_fetch_array($cnw)) {
                                                    echo $cnw1['Lastname']." ".$cnw1['Firstname'];
                                                 }
                                                 ?> </td>
                                                <td class="cell-title"><?php echo $cnt1['Nevent']; ?> </td>
                                                <td class="cell-author align-right"><?php echo $cnt1['ndate']; ?> </td>
                                                <td class="cell-author hidden-phone hidden-tablet"><i class="icon-trash"></i></td>
                        
                                            </tr>
                                            <?php } ?>
                                                                        
                                        </tbody>
                                    </table>
                                </div>

                                
                                <div class="module-foot"></div>
                            </div>
                            <div class="module message">
                                <div class="module-head">
                                    <h3>Comments</h3>
                                </div>
                                <div class="module-option clearfix">
                                    <!-- <div class="pull-left">
                                        <div class="btn-group"><button class="btn">Invites filter</button><button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Pending(1)</a></li>
                                                <li><a href="#">Accepted(1)</a></li>
                                                <li><a href="#">Denied(1)</a></li>
                                            </ul>
                                        </div>
                                    </div> -->
                                    <!-- <a href=""><button class="btn btn-primary pull-right " data-toggle="modal" data-target="#invitecomp"><i class="icon-plus-sign-alt"></i> Compose</button></a> -->
                                </div>
                                <div class="module-body table">
                                    <table class="table table-message">
                                        <tbody>
                                            <tr class="heading">
                                                <td class="cell-check"><input type="checkbox" class="inbox-checkbox"></td>
                                                <td class="cell-icon"></td>
                                                <td class="cell-author hidden-phone hidden-tablet">From </td>
                                                <td class="cell-title">Comment </td>
                                                
                                                <td class="cell-time align-right"> Project </td>
                                                <td class="cell-time">Task</td>
                                                <td class="cell-time">Date</td>
                                              
                                            </tr>
                                            <?php
                                                $sid = $_SESSION['SID'];
                                               
                                                $cnt=mysqli_query($con,"SELECT * FROM comments,tasks,team,project WHERE  comments.Tid=tasks.tid  and comments.Pid=project.Pid and team.Pname=project.Pname and team.Member='$sid'");

                                                         while ($cnt1=mysqli_fetch_array($cnt)) {
                                                            
                                                        
                                                    ?>
                                            <tr class="unread">
                                                <td class="cell-check"><input type="checkbox" class="inbox-checkbox"></td>
                                                <td class="cell-icon"><i class="icon-star"></i></td>
                                                <td class="cell-author hidden-phone hidden-tablet"><?php echo $cnt1['Comby']; ?> </td>
                                                <td class="cell-title"><?php echo $cnt1['Tcomment']; ?> </td>
                                                <td class="cell-author align-right"><?php echo $cnt1['Pname']; ?> </td>
                                                <td class="cell-title"><?php echo $cnt1['Tname']; ?></td>
                                                <td class="cell-time"><?php echo $cnt1['Cdate']; ?></td>
                                           
                        
                                            </tr>
                                            <?php  } ?>
                                                                        
                                        </tbody>
                                    </table>
                                </div>
                                
                                
                                <div class="module-foot"></div>
                            </div>
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

            <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
            <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
            <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
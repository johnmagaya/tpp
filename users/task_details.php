<?php 
session_start();
include('../include/config.php');
if(strlen($_SESSION['login'])==0)
{   
header('location:../login.php');
}
else{
$sid = $_SESSION['SID'];
$query=mysqli_query($con,"SELECT * FROM students WHERE StudentID='$sid'");
$num=mysqli_fetch_array($query);

// $rt=mysqli_query($con,"select * from notification where Receiver='$user' and Status = '0'");
// $nam=mysqli_num_rows($rt);

$tid=intval($_GET['Tid']);
$_SESSION['tid'] = $tid;
$project=mysqli_query($con,"select * from tasks,project where tid='$tid' and tasks.Pid=project.Pid");
$project1=mysqli_num_rows($project);


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
                                        <div class="module-option clearfix">
                                            <div class="input-append pull-left">
                                            <?php
            while ($project2=mysqli_fetch_array($project)) {
                $_SESSION['Tid']= $project2['tid'];
                $_SESSION['pid']= $project2['Pid'];
              ?>
                                                <h3><?php echo $project2['Pname']; ?> </h3><button class="btn btn-primary"><?php echo $project2['Pstatus']; ?></button>
                                                <blockquote><i class="icon-briefcase"></i><?php echo $project2['Client']; ?> </blockquote>
                                            </div>
                                            <div class="control-group pull-right">
                                                <blockquote><i class="icon-calendar"></i>Due date</blockquote>
                                                <div class="contorls"><strong><?php echo $project2['EDate']; ?> </strong></div>
                                            </div>
                                            <div class="control-group pull-right">
                                                <blockquote><i class="icon-calendar"></i>Start date</blockquote>
                                                <div class="contorls"><strong><?php echo $project2['SDate']; ?> ~</strong></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="module-body">
                                        <div class="row-fluid">
                                        <div class="control-group pull-right">
                                                <a href="">
                                                    <blockquote><i class="icon-user"></i>Assigned To:</blockquote>
                                                </a>
                                                <div class="contorls"><strong><?php $asn=$project2['Assignees'];
                                                $cnt=mysqli_query($con,"SELECT * FROM students WHERE StudentID='$asn'");
                                                         while ($row=mysqli_fetch_array($cnt)) {
                                                 echo $row['Lastname']." ".$row['Firstname'];
                                                         }
                                                ?></strong></div>
                                            </div>
                                            <label class="control-label" for="task">Task-Details:</label>
                                            <strong><?php echo $project2['Tname']; ?></strong>
                                            <label class="control-label" for="startd">Start date:</label>
                                            <strong><?php echo $project2['Sdate']; ?></strong>
                                            <label class="control-label" for="endd">Due date:</label>
                                            <strong><?php echo $project2['Edate']; ?></strong>
                                            <div class="control-group pull-right">
                                                <a href="">
                                                    <blockquote><i class="icon-paper-clip"></i>Attachments</blockquote>
                                                </a>
                                                <div class="contorls"><strong><?php echo $project2['Attach'];?></strong>
                                                    <?php
                                                 $sql=mysqli_query($con,"Select Attach from tasks where tid ='$tid'"); 
                                                  $result=mysqli_fetch_assoc($sql);
                                                   $file=$result['Attach'];
                                                   if (file_exists($file) && is_readable($file) && preg_match('/\.pdf$/',$file)) {
                                                  header('Content-Type: application/pdf');
                                                  header("Content-Disposition: attachment; filename=\"$file\"");
                                                    readfile($file);
                                                           }
                                                           ?>

                              <a href="Attachments/<?php echo $file;?>" target="_new">Download File</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="module">
                                    <div class="module-head">
                                        <h3>Description</h3>
                                        <div class="module-body">
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <textarea readonly class="span12" style="height: 70px; resize: none; text-align: center;font-weight: bolder;">
                                                               <?php echo $project2['TDesc']; ?>
                                                            </textarea>
                                                    <br>
                                                    <br>
                                                    <?php } ?>
                                                    <a href="task_report.php"><button class="btn btn-info"><i class="icon-folder-close-alt"></i>View Reports</button></a>                                                    <a href=""><button class="btn btn-danger pull-right " data-toggle="modal" data-target="#taskupload"><i class="icon-tasks"></i>Upload Task Report</button></a></div>
                                            </div>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="taskupload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Task Report</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;
</span></button></div>
                                                
                                                    <div class="modal-body">
                                                        <form action="addreport.php" method="post" enctype="multipart/form-data">
                                                            <div class="control-group">
                                                                    <label class="control-label" for="ddate">Upload file:&nbsp;&nbsp; </label>
                                                                    <div class="contorls">
                                                                        <input type="file" name="image">
                                                                    </div>
                                                           
                                                            <input type="submit" class="btn btn-primary">
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer"><button type="button" name="upload" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal -->
                                    </div>
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
                <div class="container">
                    <!-- <b class="copyright">&copy;
2014 Edmin - EGrappler.com </b>All rights reserved. --></div>
            </div>
            <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
            <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
            <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="scripts/popover.js" type="text/javascript"></script>
    </body>

</html>
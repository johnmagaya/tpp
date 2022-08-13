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

$pid=intval($_GET['Pid']);
$_SESSION['pid'] = $pid;
$cdate=date("Y-m-d");
$project=mysqli_query($con,"select * from project where Pid='$pid'");
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
                            <div class="content">
                                <div class="module">
                                    <div class="module-head">
                                        <div class="module-option clearfix">
                                            <div class="input-append pull-left">
                                            <?php
            while ($project2=mysqli_fetch_array($project)) {
                
              ?>
                                                <h3><?php echo $project2['Pname']; ?></h3>
                                                <button class="btn btn-primary"><?php echo $project2['Pstatus']; ?></button>
                                                <blockquote><i class="icon-briefcase"></i> <?php echo $project2['Client']; ?></blockquote>

                                            </div>

                                            <div class="control-group pull-right">
                                                <blockquote><i class="icon-calendar"></i>Due date</blockquote>
                                                <div class="contorls">
                                                    <strong><?php echo $project2['EDate']; ?></strong>
                                                </div>
                                            </div>
                                            <div class="control-group pull-right">
                                                <blockquote><i class="icon-calendar"></i>Start date</blockquote>
                                                <div class="contorls">
                                                    <strong><?php echo $project2['SDate']; ?> ~</strong>

                                                </div>

                                            </div>

                                        </div>
                                        <h3>Members:</h3>
                                    </div>
                                    <div class="module-body">
                                        <div class="row-fluid">
                                        <?php 
                                        $pname = $project2['Pname'];
                                        $members=mysqli_query($con,"select * from team,students where Pname='$pname' and Member=StudentID and Tstatus='Active'");
                                        $member=mysqli_num_rows($members);
                                        while ($member1=mysqli_fetch_array($members)) {
                                        
                                        ?>
                                            <div class="span6">
                                                <div class="media user">
                                                    <a class="media-avatar pull-left" href="#">
                                                        <img src="../image/profile/avatar1.png" width="70" height="70">
                                                    </a>
                                                    <div class="media-body">
                                                        <blockquote class="media-title">
                                                            <?php echo $member1['Lastname']. " ".$member1['Firstname']; ?></blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <div class="progress progress-striped active">
                                                    <div class="bar" style="width: <?php echo $project2['Pprogress'];  ?>%;"><?php echo $project2['Pprogress'];  ?>% of Project</div>
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
                                                    <textarea readonly class="span12" style="height: 70px; resize: none;"><?php echo $project2['PDesc']; ?></textarea>
                                                    <br><br>
                                                    <a href=""><button class="btn btn-danger pull-right " data-toggle="modal" data-target="#createtask"><i class="icon-tasks"></i>Create Task
                                                    </button></a>

                                                </div>

                                            </div>

                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="createtask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Create Task</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal row-fluid" action="addtask.php" method="post" enctype="multipart/form-data">

                                                            <div class="control-group">
                                                                <label class="control-label" for="tname">Task name:&nbsp;&nbsp; </label>
                                                                <div class="contorls">
                                                                    <input type="text" id="tname" name="tname" class="span4" required>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label" for="stdate">Start Date:&nbsp;&nbsp; </label>
                                                                <div class="contorls">
                                                                    <input type="date" id="stdate" min="<?php $sdate1= date('Y-m-d'); echo $sdate1;?>" name="stdate" class="span4" required>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label" for="noa">No days &nbsp;&nbsp; </label>
                                                                <div class="contorls">
                                                                    <input type="number" id="noa" name="noa" class="span2" required min="5">
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label" for="ddate">Due Date:&nbsp;&nbsp; </label>
                                                                <div class="contorls">
                                                                    <input type="date" id="ddate" min="<?php $Date1= date('Y-m-d'); echo date('Y-m-d', strtotime($Date1 .  "+ 5 day"));?>" name="ddate" class="span4" required>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label" for="marks">Percent it Carries &nbsp;&nbsp; </label>
                                                                <div class="contorls">
                                                                    <input type="number" id="marks" name="marks" class="span2" required min="5" max="100" required>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label" for="assignee">Assignee:&nbsp;&nbsp;</label>
                                                                <div class="contorls">
                                                                    <select class="span4" name="assignee" id="assignee"  size="1" required>
                                             <option value="">assignee</option>
                                             <?php 
                                       $pname = $project2['Pname'];
                                       $asign=mysqli_query($con,"select * from team,students where Pname='$pname' and Member=StudentID and Tstatus='Active'");
                                        $asign2=mysqli_num_rows($asign);
                                        while ($asign1=mysqli_fetch_array($asign)) {
                                        
                                        ?>
                                             <option value="<?php echo $asign1['StudentID'] ?>"><?php echo $asign1['Lastname']." ".$asign1['Firstname']; ?></option>
                             
                                             <?php } ?>
                                             </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label" for="tdesc">Description:&nbsp;&nbsp; </label>
                                                                <div class="contorls">
                                                                    <textarea class="span5" name="tdesc" placeholder="Place Description" rows="3" col="4"></textarea>
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <div class="control-group">
                                                                    <label class="control-label" for="ddate">Attachment:&nbsp;&nbsp; </label>
                                                                    <div class="contorls">
                                                                        <input type="file" name="image">
                                                                    </div>
                                                                    <br>
                                                                    <br>



                                                                    <!-- <form action="">

                                                            <label class="upload">
                <input name='Image' type="file"/>
              Upload File
              </label>
                                                            <h4>OR</h4>
                                                            <label class="upload">
            <input name='attach' type="file" required />
         Attach link (Github)
          </label>


                                                        </form> -->

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <input type="submit" value="Create" name="addtask" class="btn btn-primary">

                                                        </form>
                                                        </div>
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


                            <!-- <b class="copyright">&copy; 2014 Edmin - EGrappler.com </b> All rights reserved. -->
                        </div>
                    </div>

                    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
                    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
                    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
                    <script src="scripts/popover.js" type="text/javascript"></script>
    </body>

</html>
<?php } ?>
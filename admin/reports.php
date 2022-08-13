<?php
session_start();
include('../include/config.php');
if(strlen($_SESSION['login'])!=1)
    {   
        $_SESSION['Message']="You have to login in first";
header('location:login.php');
}
else{
  $aid = $_SESSION['AID'];
  
 if(isset($_POST['comment']))
  {
    $crid=$_SESSION['crid'];
    $message=$_POST['msg'];
 $query=mysqli_query($con,"SELECT tasks.tid as ntid, project.Pid as npid FROM taskreport,tasks,project WHERE taskreport.tid=tasks.tid and tasks.Pid=project.Pid and Rid='$crid'");
$num=mysqli_fetch_array($query);
   $tid=$num['ntid'];
   $pid=$num['npid'];
   $cdate=date('Y-m-d');
 $sql3="INSERT INTO comments (Tid, Pid, Tcomment, Comby, Cdate) VALUES ('$tid', '$pid', '$message', 'Supervisor', '$cdate')";
        if ($con->query($sql3)===TRUE) {
            echo '<script type="text/javascript">';
    echo ' alert("Comment Sent Successfully")'; 
    echo '</script>';
        }

    }
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
        <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
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
                                        <h3>TPP/Task Report</h3>
                                    </div>
                                    <div class="module-body">
                                        <table class="table">
                                            <thead style="background-color:#0f7ab8;color:black;">
                                                <tr>
                                                    <th><input type="checkbox" name=""></th>
                                                    <th>Task name</th>
                                                    <th>Project Name</th>
                                                    <th>Submitted By</th>
                                                    <th>Date</th>
                                                    <th>Attachment</th>
                                                    <th>Status</th>
                                                    <th>Respond</th>
                                                    <th>Comment</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <?php
                                                $cnt2=mysqli_query($con,"SELECT * FROM taskreport,tasks,project WHERE  taskreport.tid=tasks.tid and tasks.Pid=project.Pid and taskreport.Rstatus='Wait For Approval'");
                                                        
                                                         while ($row2=mysqli_fetch_array($cnt2)) {
                                                            
                                                          
                                                    ?>
                                                <tr>
                                                    <td><input type="checkbox" name=""></td>
                                                    <td><?php echo $row2['Tname']; ?></td>
                                                    <td><?php echo $row2['Pname']; ?></td>
                                                    <td><?php $uploader = $row2['Uploader']; 
                                                     $cnt=mysqli_query($con,"SELECT * FROM students WHERE StudentID='$uploader'");
                                                         while ($row=mysqli_fetch_array($cnt)) {
                                                 echo $row['Lastname']." ".$row['Firstname'];
                                                         }
                                                     ?></td>
                                                    <td><?php echo $row2['Udate']; ?></td>
                                                    <td><a href="Attachments/<?php echo $file=$row2['Report'];?>"><i class="icon-download" style="margin-left: 35%;"></i> <?php echo $row2['Report']; ?></a></td>
                                                    <td><button class="btn btn-warning"><?php echo $row2['Rstatus']; ?></button></td>
                                                    <td><a href="approvereport.php?rid=<?php echo $row2['Rid'];?>" class="btn btn-primary">Approve</a>-<a href="rejectreport.php?rid=<?php echo $row2['Rid'];?>" class="btn btn-danger">Reject</a></td>
                                                    <td><a href="#?crid=<?php echo$_SESSION['crid']=$row2['Rid'];?>" data-toggle="modal" data-target="#comment"><i class="icon-comment-alt" style="margin-left: 35%;"></i></a></td>
                                                </tr>
                                            <?php } ?>
                                                  
                                            </tbody>
                                        </table>
                                        <!-- comment Modal -->
                                        <div class="modal fade" id="comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Comment</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;
</span></button></div>
                                                    <div class="modal-body">
                                                        <form action="reports.php" method="post"><textarea name="msg" id="msg" cols="12" rows="6" style="width: 100%;" required></textarea></div>
                                                    <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><button type="submit" name="comment" class="btn btn-primary">Send</button></div>
                                                    </form>
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
    </body>
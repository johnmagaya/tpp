<?php
 //error_reporting(0);
session_start();
include('../include/config.php');
if(strlen($_SESSION['login'])!=1)
    {   
        $_SESSION['Message']="You have to login in first";
header('location:login.php');
}
else{
  $aid = $_SESSION['AID'];
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
                                            <div class=" input-append pull-right">
                                               
                                            </div>
                                            <h3>New Projects</h3>


                                        </div>
                                        <div class="module-body">
                                            <table class="table">
                                                <thead style="background-color: silver;color:black;">
                                                    <tr>
                                                        <th><input type="checkbox" name=""></th>
                                                        <th>Proposed Title</th>
                                                        <th>Description</th>
                                                        <th>Type</th>
                                                        <th>Created By</th>
                                                        <th>Respond</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                               
                                                $cnt2=mysqli_query($con,"SELECT * FROM project WHERE  Pstatus='Wait For Approval' ");
                                                        
                                                         while ($row2=mysqli_fetch_array($cnt2)) {
                                                            
                                                          
                                                    ?>
                                                    <tr>
                                                        <td><input type="checkbox" name=""></td>
                                                        <td><?php echo $row2['Pname']; ?></td>
                                                        <td><?php echo $row2['PDesc']; ?> </td>
                                                        <td><?php echo $row2['PCategory']; ?> </td>
                                                        <td><?php 
                                                        $createdby=$row2['CreatedBy'];
                                                        $query=mysqli_query($con,"SELECT * FROM students WHERE StudentId='$createdby'");
                                                        $num=mysqli_fetch_array($query);
                                                          echo $num['Lastname']."  ".$num['Firstname'];
                                                        
                                                        ?></td>
                                                        <td class="cell-author hidden-phone hidden-tablet"><a href="approve.php?pid=<?php echo $row2['Pid'];?>" class="btn btn-primary">Approve</a>-<a href="decline.php?pid=<?php echo $row2['Pid'];?>" class="btn btn-danger">Reject</a></td>
                                                    </tr>
                                                    <?php } ?>
                                                    
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>



                                    <!-- create project -->
                                    <div class="modal fade" id="projectcreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Create Project</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal row-fluid" action="addproject.php" method="post">

                                                        <div class="control-group">
                                                            <label class="control-label" for="pname">Project name:&nbsp;&nbsp; </label>
                                                            <div class="contorls">
                                                                <input type="text" id="pname" name="pname" class="span4" required>
                                                            </div>
                                                        </div>

                                                        <div class="control-group">
                                                            <label class="control-label" for="email">Category:&nbsp;&nbsp; </label>
                                                            <div class="contorls">
                                                                <input type="radio" name="catg" class="span1" value="Web">Web
                                                                <input type="radio" name="catg" class="span1" value="Android">Android
                                                            </div>
                                                        </div>

                                                        <div class="control-group">
                                                            <label class="control-label" for="sdate">Start Date:&nbsp;&nbsp; </label>
                                                            <div class="contorls">
                                                                <input type="date" id="sdate" name="sdate" min="<?php echo date('Y-m-d');?>" class="span4" required> &nbsp;&nbsp; - &nbsp;
                                                                <input type="number" id="ndays" min="21"  name="ndays" placeholder="Days" class="span2" required>
                                                            </div>
                                                        </div>

                                                        <div class="control-group">
                                                            <label class="control-label" for="ddate">Due Date:&nbsp;&nbsp; </label>
                                                            <div class="contorls">
                                                                <input type="date" id="ddate" min="<?php $Date1= date('Y-m-d'); echo date('Y-m-d', strtotime($Date1 .  "+ 21 day"));?>" name="ddate" class="span4" required>
                                                            </div>
                                                        </div>

            

                                                        <div class="control-group">
                                                            <label class="control-label" for="manager">Project Manager:&nbsp;&nbsp;</label>
                                                            <div class="contorls">
                                                                <select class="span4" name="manager" id="manager">
                             <option value="">Manager</option>
                             <option value="<?php echo $sid; ?>">Me</option>
                             <?php $cnt=mysqli_query($con,"SELECT StudentID,Firstname,Lastname FROM students WHERE NOT StudentID='$sid'");
                                                         while ($row=mysqli_fetch_array($cnt)) {
                                                          
                                                    ?>
                             <option value="<?php echo $row['StudentID'];?>"><?php echo $row['Firstname']." ". $row['Lastname']; ?> </option>
                             <?php } ?>
                             </select>
                                                            </div>
                                                        </div>

                                                        <div class="control-group">
                                                            <label class="control-label" for="budget">Budget:&nbsp;&nbsp; </label>
                                                            <div class="contorls">
                                                                <input type="number" id="budget" min="100000" name="budget" class="span4" required>
                                                            </div>
                                                        </div>

                                                        <div class="control-group">
                                                            <label class="control-label" for="desc">Description:&nbsp;&nbsp; </label>
                                                            <div class="contorls">
                                                                <textarea class="span5" name="desc" placeholder="Place Description" rows="3" col="4" required></textarea>
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <input type="submit" value="Create" class="btn btn-success">

                                                    </form>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- end create project -->

                                        <!-- popup -->
                                        <div class="modal fade" id="created" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                                    </div>
                                                    <div class="modal-body">


                                                        <h2 align="center" class="text-success">Project created successfully</h2>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- end popup -->

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

                        </div>
                    </div>

                    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
                    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
                    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        </body>
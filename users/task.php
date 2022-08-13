<?php session_start();
include('../include/config.php');
$_SESSION['Message']="";
if(strlen($_SESSION['login'])==0) {
    $_SESSION['Message']="You have to login in first";
    header('location:../signin.php');
    $sid=$_SESSION['SID'];
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
                                        <h3>Assigned Tasks</h3>
                                    </div>
                                    <div class="module-body">
                                        <table class="table">
                                            <thead style="background-color:#dd9025;color:black;">
                                                <tr>
                                                    <th><input type="checkbox" name=""></th>
                                                    <th>Task name</th>
                                                    <th>Project Name</th>
                                                    <th>Starting Date</th>
                                                    <th>Due date</th>
                                                    <th>Status</th>
                                                    <th>view</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sid=$_SESSION['SID'];
$cnt2=mysqli_query($con, "SELECT * FROM tasks,project,team WHERE  Member='$sid' and team.Pname=project.Pname and project.Pid=tasks.Pid");
while ($row2=mysqli_fetch_array($cnt2)) {
    ?>
                                                <tr>
                                                    <td><input type="checkbox" name=""></td>
                                                    <td>
                                                        <?php echo $row2['Tname'];
    ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row2['Pname'];
    ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row2['Sdate'];
    ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row2['Edate'];
    ?>
                                                    </td>
                                                    <td><button class="btn btn-warning"><?php echo $row2['TStatus'];
    ?></button></td>
                                                    <td><a href="task_details.php?Tid=<?php echo htmlentities($row2['tid']);?>"><i class="icon-eye-open"></i></a></td>
                                                </tr>
                                                <?php
}

?>
                                            </tbody>
                                        </table>
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
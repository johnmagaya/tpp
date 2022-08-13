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
                                            
                                            <h3>Aprroved Projects</h3>


                                        </div>
                                        <div class="module-body">
                                           <div class=" input-append pull-right">
                                                 <form action="project2.php" method="post">
                                                    <input type="text" name="pname" class="span3" placeholder="Search by project name...">
                                                    <button type="submit" name="search" class="btn">
                                                    <i class="icon-search"></i>
                                                </button>
                                                </form>
                                            </div>
                                            <table class="table">
                                                <thead style="background-color: silver;color:black;">
                                                    <tr>
                                                        <th><input type="checkbox" name=""></th>
                                                        <th>Project Name</th>
                                                        <th>Created Date</th>
                                                        <th>Type</th>
                                                        <th>Team Leader</th>
                                                        <th>Status</th>
                                                        <th>view</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                              if(isset($_POST['search'])) {
                                                $pname=$_POST['pname'];
                                                $cnt2=mysqli_query($con,"SELECT * FROM project WHERE Pname LIKE '%{$pname}%'  and Pstatus<>'Wait For Approval'");
                                                         while ($row2=mysqli_fetch_array($cnt2)) {
                                                          
                                                    ?>
                                                    <tr>
                                                        <td><input type="checkbox" name=""></td>
                                                        <td><?php echo $row2['Pname']; ?></td>
                                                        <td><?php echo $row2['CreateD']; ?> </td>
                                                        <td><?php echo $row2['PCategory']; ?> </td>
                                                        <td><?php 
                                                        $leader=$row2['PLeader'];
                                                        $query=mysqli_query($con,"SELECT * FROM students WHERE StudentId='$leader'");
                                                        $num=mysqli_fetch_array($query);
                                                          echo $num['Lastname']."  ".$num['Firstname'];
                                                        
                                                        ?></td>
                                                        <td><button class="btn btn-warning"><?php echo $row2['Pstatus']; ?> </button></td>
                                                        <td><a href="project_details.php?Pid=<?php echo htmlentities($row2['Pid']);?>"><i class="icon-eye-open"></i></a></td>
                                                    </tr>
                                                    <?php  } }
                                                 else{
                                                $cnt2=mysqli_query($con,"SELECT * FROM project WHERE Pstatus<>'Wait For Approval'");
                                                
                                                         while ($row2=mysqli_fetch_array($cnt2)) {

                                                     ?>
                                                    <tr>
                                                        <td><input type="checkbox" name=""></td>
                                                        <td><?php echo $row2['Pname']; ?></td>
                                                        <td><?php echo $row2['CreateD']; ?> </td>
                                                        <td><?php echo $row2['PCategory']; ?> </td>
                                                        <td><?php 
                                                        $leader=$row2['PLeader'];
                                                        $query=mysqli_query($con,"SELECT * FROM students WHERE StudentId='$leader'");
                                                        $num=mysqli_fetch_array($query);
                                                          echo $num['Lastname']."  ".$num['Firstname'];
                                                        
                                                        ?></td>
                                                        <td><button class="btn btn-warning"><?php echo $row2['Pstatus']; ?> </button></td>
                                                        <td><a href="project_details.php?Pid=<?php echo htmlentities($row2['Pid']);?>"><i class="icon-eye-open"></i></a></td>
                                                    </tr>
                                                <?php } } ?>
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

                        </div>
                    </div>

                    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
                    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
                    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        </body>
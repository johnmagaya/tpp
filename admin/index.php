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
  
  $query=mysqli_query($con,"SELECT * FROM admint WHERE Aid='$aid'");
$num=mysqli_fetch_array($query);

// ?>
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
                            <ul class="nav pull-right">
                            <?php include_once('include/topmenu.php')?>
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
                                <div class="btn-controls">
                                    <div class="btn-box-row row-fluid">
                                        <a href="users.php" class="btn-box big span4"><i class=" icon-group"></i><b>
                                            <?php $onpro=mysqli_query($con,"select * from students");
            $onpro1=mysqli_num_rows($onpro); echo $onpro1; ?></b>
                                        <p class="text-muted">
                                           System Users</p>
                                    </a><a href="invite.php" class="btn-box big span4"><i class="icon-certificate"></i><b><?php $pstatus='Complete'; $invites=mysqli_query($con,"select * from project where Pstatus='$pstatus'");
            $inv=mysqli_num_rows($invites); echo $inv; ?> out of <?php $allp=mysqli_query($con,"select * from project where Pstatus<>'Denied'");  $big=mysqli_num_rows($allp); echo $big;?></b>
                                        <p class="text-muted">
                                            Completed Projects </p>
                                    </a><a href="profile.php" class="btn-box big span4"><i class="icon-inbox"></i><b><?php $pstatus='Wait For Aprroval'; $bag=mysqli_query($con,"select * from project where Pstatus='$pstatus'");
            $bg=mysqli_num_rows($bag); echo $bg; ?></b>
                                        <p class="text-muted">
                                           Waiting for Aprroval</p>
                                    </a>
                                    </div>
                                    <div class="btn-box-row row-fluid">
                                        <div class="span8">
                                            
                                        </div>
                                        <ul class="widget widget-usage unstyled span4">
                                            <li>
                                            <?php $cnt=mysqli_query($con,"SELECT * FROM project Where PCategory='Web'");
                                                    $cnt1=mysqli_num_rows($cnt);  
                                                    
                                                    $cnw=mysqli_query($con, "SELECT * FROM project Where PCategory='Android'");
                                                    $cnw1=mysqli_num_rows($cnw);
                                                     $tot=$cnt1 + $cnw1;
                                                     $av=$cnt1 / $tot;
                                                    $perc=$av * 100;
                                                    
                                                    
                                                    ?>
                                            <p>
                                                                <strong>Web systems</strong> <span class="pull-right small muted"><?php echo number_format($perc, 1)."%";?></span>
                                                            </p>
                                                            <div class="progress tight">
                                                                <div class="bar bar-success" style="width: <?php echo $perc;?>%;">
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                            <?php $cnt=mysqli_query($con,"SELECT * FROM project Where PCategory='Web'");
                                                    $cnt1=mysqli_num_rows($cnt);  
                                                    
                                                    $cnw=mysqli_query($con, "SELECT * FROM project Where PCategory='Android'");
                                                    $cnw1=mysqli_num_rows($cnw);
                                                     $tot=$cnt1 + $cnw1;
                                                     $av=$cnw1 / $tot;
                                                    $perc=$av * 100;
                                                  
                                                    
                                                    ?>
                                            <p>
                                                                <strong>Android systems</strong> <span class="pull-right small muted"><?php echo number_format($perc, 1)."%";?></span>
                                                            </p>
                                                            <div class="progress tight">
                                                                <div class="bar bar-success" style="width: <?php echo $perc;?>%;">
                                                                
                                                                </div>
                                                                
                                                            </div>
                                                        </li>
                                                       
                                                        
                                        </ul>
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
                    <b class="copyright">&copy; 2021 TPP - Team Project Portal </b>All rights reserved.
                </div>
            </div>
            <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
            <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
            <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
            <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
            <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
            <script src="scripts/common.js" type="text/javascript"></script>

        </body>
        </html>
        <?php } ?>
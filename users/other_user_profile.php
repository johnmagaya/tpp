<?php
session_start();
include('../include/config.php');
if(strlen($_SESSION['login'])==0)
{   
header('location:../login.php');
}
else{
$sid = $_SESSION['SID'];


// $rt=mysqli_query($con,"select * from notification where Receiver='$user' and Status = '0'");
// $nam=mysqli_num_rows($rt);

$uid=$_GET['uid'];
$_SESSION['uid'] = $uid;
$query=mysqli_query($con,"SELECT * FROM students WHERE StudentID='$uid'");
$num=mysqli_fetch_array($query);
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
                            </li>
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
                            <div class="module">
                                <div class="module-body">
                                    <div class="profile-head media">
                                        <a href="#" class="media-avatar pull-left"><img src="../image/profile/avatar1.png"></a>
                                        <div class="media-body">
                                            <h4><?php  echo $num['Lastname']." ". $num['Firstname']; ?> </h4>
                                            <p class="profile-brief"><?php echo $num['Bio']; ?>
                                                <div class="profile-details muted"><a href="#" class="btn"><i class="icon-phone"></i><?php echo $num['Mobile']; ?> </a><a href="#" class="btn"><i class="icon-envelope-alt shaded"></i><?php echo $num['Email']; ?> </a></div>
                                        </div>
                                    </div>
                                    <ul class="profile-tab nav nav-tabs">
                                        <li class="active"><a href="#details" data-toggle="tab">Details</a></li>

                                    </ul>
                                    <div class="profile-tab-content tab-content">
                                        <div class="tab-pane fade active in" id="details">
                                            <div class="btn-box-row row-fluid">
                                                <div class="span8">
                                                    <div class="row-fluid">
                                                        <div class="span12"><a href="#" class="btn-box small span4"><i class="icon-book"></i><b><?php echo $num['Course']; ?></b></a><a href="#" class="btn-box small span4"><i class="icon-envelope"></i><b><?php echo $num['Email']; ?></b></a>
                                                            <a href="#" class="btn-box small span4"><i class="icon-phone"></i><b><?php echo $num['Mobile']; ?></b></a>
                                                        </div>
                                                    </div>
                                                    <div class="row-fluid">
                                                        <div class="span12"><a href="#" class="btn-box small span4"><i class="icon-flag"></i><b><?php echo $num['Country']; ?></b></a><a href="#" class="btn-box small span4"><i class="icon-globe"></i><b><?php echo $num['SLanguage']; ?></b></a>
                                                            <a href="#" class="btn-box small span4"><i class="icon-heart"></i><b><?php echo $num['Hobby']; ?></b></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="widget widget-usage unstyled span4">
                                                       <?php $cnt=mysqli_query($con,"SELECT * FROM skills,students WHERE students.StudentID=Skills.StudentId and students.StudentID='$uid'");
                                                         while ($row=mysqli_fetch_array($cnt)) {
                                                          if ($row['SLevel']<=25 ){
                                                              $color="danger";
                                                            }
                                                            else if($row['SLevel']<= 50 ){
                                                              $color="warning";
                                                            }
                                                            else if ($row['SLevel']<=75) {
                                                               $color="success";
                                                            }
                                                            else if($row['SLevel'] <=100){
                                                                $color = "primary";
                                                            }
                                                    ?>
                                                   <li>
                                                            <p>
                                                                <strong><?php echo $row['Skill'];?></strong> <span class="pull-right small muted"><?php echo $row['SLevel']."%";?></span>
                                                            </p>
                                                            <div class="progress tight">
                                                                <div class="bar bar-<?php echo $color;?>" style="width: <?php echo $row['SLevel'];?>%;">
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/.module-body-->
                            </div>
                            <!--/.module-->
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
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
    </body>
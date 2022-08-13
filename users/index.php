<?php
  error_reporting(0);
session_start();
include('../include/config.php');
if(strlen($_SESSION['login'])==0)
    {   
        $_SESSION['Message']="You have to login in first";
header('location:../signin.php');
}
else{
  $sid = $_SESSION['SID'];
  
  $query=mysqli_query($con,"SELECT * FROM students WHERE StudentId='$sid'");
$num=mysqli_fetch_array($query);



if(isset($_POST['update']))
  {
    $hobby = $_POST['hobby'];
    $email  = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $bio = $_POST['bio'];
   
 $sql = "UPDATE students SET Bio='$bio', Hobby='$hobby', Email='$email', Mobile='$phone', Country='$country'  Where StudentID='$sid';";

    if ($con->query($sql) === TRUE) {
    $_SESSION['Message'] = "record updated successfully";
        header('location:profile.php');
    }
    else {
        echo "Error: ". $sql . "<br>" . $con->error;
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
                                        <a href="project.php" class="btn-box big span4"><i class=" icon-upload"></i><b><?php $onpro=mysqli_query($con,"select * from team,project,students where Member='$sid' and team.Pname=project.Pname and Member=StudentID and team.Tstatus='Active' and Pstatus<>'Denied' and Pstatus<>'Wait For Aprroval'");
            $onpro1=mysqli_num_rows($onpro); echo $onpro1; ?></b>
                                        <p class="text-muted">
                                           Current on going Projects</p>
                                    </a><a href="invite.php" class="btn-box big span4"><i class="icon-inbox"></i><b><?php $invites=mysqli_query($con,"select * from invite where Receiver='$sid'");
            $inv=mysqli_num_rows($invites); echo $inv; ?></b>
                                        <p class="text-muted">
                                            Invites</p>
                                    </a><a href="#" class="btn-box big span4"><i class="icon-certificate"></i><b><?php $bag=mysqli_query($con,"select * from team,project,students where Member='$sid' and team.Pname=project.Pname and Member=StudentID and Pstatus='Complete'");
            $bg=mysqli_num_rows($bag); echo $bg; ?></b>
                                        <p class="text-muted">
                                            Badges</p>
                                    </a>
                                    </div>
                                    <div class="btn-box-row row-fluid">
                                        <div class="span8">
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <a href="#" class="btn-box small span4"><i class="icon-book"></i><b><?php echo $num['Course']; ?></b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-envelope"></i><b><?php echo $num['Email']; ?></b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-phone"></i><b><?php echo $num['Mobile']; ?></b>
                                                </a>
                                                </div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <a href="#" class="btn-box small span4"><i class="icon-flag"></i><b><?php echo $num['Country']; ?></b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-globe"></i><b><?php echo $num['SLanguage']; ?></b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-heart"></i><b><?php echo $num['Hobby']; ?></b> </a>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="widget widget-usage unstyled span4">
                                        <?php $cnt=mysqli_query($con,"SELECT * FROM skills,students WHERE students.StudentID=Skills.StudentId and Skills.StudentId='$sid'");
                                       
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
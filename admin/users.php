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

//   $uid=intval($_GET['uid']);
// $_SESSION['uid'] = $uid;



$cdate=date("Y-m-d");

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
        <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

        <script type="text/javascript">
function deleteuser(x){
var conf = confirm("Are you sure you want to delete this Student?");
if(conf == true){
window.location = "deleteuser.php?sid="+x;
}
}
</script>
   
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

                                    <h3>Users Management</h3>
                                </div>
                                <div class="module-option clearfix">
                                    <div class=" input-append pull-right">
                                                <form action="users.php" method="post"><input type="text" name="suser" class="span3" placeholder="Search by name..."><button type="submit" name="search" class="btn"><i class="icon-search"></i></button></form>
                                            </div>
                                   
                                </div>
                                <div class="module-body table">
                                    <table class="table table-message">
                                        <tbody>
                                            <tr class="heading">
                                                <td><input type="checkbox" class="inbox-checkbox"></td>
                                                <td></td>
                                                <td>Fullname </td>
                                                <td>Registration</td>
                                                <td>Course</td>
                                                <td>Project name</td>
                                                <td> Email </td>
                                                <td>Mobile</td>
                                                <td>Delete</td>

                                            
                                            </tr>
                                             <?php
                                             if(isset($_POST['search'])) {
                                                $suser=$_POST['suser'];
                                                
                                                $cnt2=mysqli_query($con,"SELECT * FROM students WHERE Firstname LIKE '%{$suser}%' OR Lastname LIKE '%{$suser}%'");
                                                         while ($cnt1=mysqli_fetch_array($cnt2)) {
                                                        
                                                    ?>
                                            <tr class="unread">
                                                <td><input type="checkbox" class="inbox-checkbox"></td>
                                                <td><i class="icon-star"></i></td>
                                                <td><?php 
                                                    echo $cnt1['Lastname']." ".$cnt1['Firstname'];
                                                 ?> </td>
                                                <td><?php echo $cnt1['StudentID']; ?> </td>
                                                <td><?php echo $cnt1['Course']; ?> </td>
                                                <td><?php
                                                $sid= $cnt1['StudentID'];
                                                 $cnw= mysqli_query($con,"SELECT DISTINCT team.Pname as Pname FROM students,team,project WHERE  Member=StudentID and StudentID='$sid' and project.Pname=team.Pname and Pstatus<>'Denied' and Pstatus<>'Wait For Aprroval'");
                                                 while ($cnw1=mysqli_fetch_array($cnw)) {
                                                    echo $cnw1['Pname'];
                                                 }
                                                ?> </td>
                                                <td><?php echo $cnt1['Email']; ?> </td>
                                                <td><?php echo $cnt1['Mobile']; ?> </td>
                                                <td><a href="deleteuser.php?sid=<?php echo htmlentities($cnt1['StudentID']);?>" onClick="deleteuser(<?php echo htmlentities($cnt1['StudentID']);?>)"style="cursor:pointer;"><i class="icon-trash"></i></a></td>
                                            </tr>
                                           <?php  } }
                                                       else{
                                                        $cnt2=mysqli_query($con,"SELECT * FROM students");
                                                         while ($cnt1=mysqli_fetch_array($cnt2)) {
                     
                                         ?>
                                               <tr class="unread">
                                                <td><input type="checkbox" class="inbox-checkbox"></td>
                                                <td><i class="icon-star"></i></td>
                                                <td><?php 
                                                    echo $cnt1['Lastname']." ".$cnt1['Firstname'];
                                                 ?> </td>
                                                <td><?php echo $cnt1['StudentID']; ?> </td>
                                                <td><?php echo $cnt1['Course']; ?> </td>
                                                <td><?php
                                                $sid= $cnt1['StudentID'];
                                                 $cnw= mysqli_query($con,"SELECT DISTINCT team.Pname as Pname FROM students,team,project WHERE  Member=StudentID and StudentID='$sid' and project.Pname=team.Pname and Pstatus<>'Denied' and Pstatus<>'Wait For Aprroval'");
                                                 while ($cnw1=mysqli_fetch_array($cnw)) {
                                                    echo $cnw1['Pname'];
                                                 }
                                                ?> </td>
                                                <td><?php echo $cnt1['Email']; ?> </td>
                                                <td><?php echo $cnt1['Mobile']; ?> </td>
                                                <td><a href="deleteuser.php?sid=<?php echo htmlentities($cnt1['StudentID']);?>" onClick="deleteuser(<?php echo htmlentities($cnt1['StudentID']);?>)"style="cursor:pointer;"><i class="icon-trash"></i></a></td>
                                            </tr>
                                            <?php } } ?>                              

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
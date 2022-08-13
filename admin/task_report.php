<?php
session_start();
include('../include/config.php');
if(strlen($_SESSION['login'])==0)
{   
header('location:../login.php');
}
else{
$sid = $_SESSION['SID'];
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
                                                    <th>Comment</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="checkbox" name=""></td>
                                                    <td>UI Design</td>
                                                    <td>Team Project Portal</td>
                                                    <td>Magaya John</td>
                                                    <td>3-January-2021</td>
                                                    <td><a href=""><i class="icon-paper-clip" style="margin-left: 35%;"></i></a></td>
                                                    <td><button class="btn btn-warning">Aproved</button></td>
                                                    <td><a href="#" data-toggle="modal" data-target="#comment"><i class="icon-comment-alt" style="margin-left: 35%;"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name=""></td>
                                                    <td>Database Design</td>
                                                    <td>Team Project Portal</td>
                                                    <td>TAMBA PAUL</td>
                                                    <td>24-April-2021</td>
                                                    <td><a href=""><i class="icon-paper-clip" style="margin-left: 35%;"></i></a></td>
                                                    <td><button class="btn btn-danger">Pending</button></td>
                                                    <td><a href="#" data-toggle="modal" data-target="#comment"><i class="icon-comment-alt" style="margin-left: 35%;"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name=""></td>
                                                    <td>Backend Development</td>
                                                    <td>Team Project Portal</td>
                                                    <td>JUMA EPAFLAS</td>
                                                    <td>6-May-2021</td>
                                                    <td><a href=""><i class="icon-paper-clip" style="margin-left: 35%;"></i></a></td>
                                                    <td><button class="btn btn-success">Pending</button></td>
                                                    <td><a href="#" data-toggle="modal" data-target="#comment"><i class="icon-comment-alt" style="margin-left: 35%;"></i></a></td>
                                                </tr>
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
                                                        <form action=""><textarea name="comment" id="comment" cols="12" rows="6" style="width: 100%;">Enter your Comment here</textarea></div>
                                                    <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><button type="submit" class="btn btn-primary">Send</button></div>
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
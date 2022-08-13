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



if(isset($_POST['update']))
  {
    $office = $_POST['office'];
    $email  = $_POST['email'];
    $contact = $_POST['contact'];
   
 $sql = "UPDATE admint SET Office='$office', Email='$email', Contact='$contact'  Where Aid='$aid';";

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
            <link rel="stylesheet" href="css/skill.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
            <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
        </head>
        <body style="overflow-x:hidden;">
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
                                <div class="module">
                                    <div class="module-body">
                                        <div class="profile-head media">
                                            <a href="#" class="media-avatar pull-left">
                                                <img src="../image/profile/avatar.png">
                                            </a>
                                            <div class="media-body">
                                                <h4>
                                                <?php echo $num['Atitle']." . "; ?> <?php echo $num['Fullname'] ; ?>
                                                </h4>
                                                <p class="profile-brief">
                                                  <i class="icon-building"></i><b> Office <?php echo " - ". $num['Office']; ?></b><br>
                                                  <i class="icon-envelope"></i><b><?php echo " - ". $num['Email']; ?> </b><br>
                                                  <i class="icon-phone"></i><b><?php echo " - ". $num['Contact']; ?> </b>
                                                    <div class="profile-details muted">
                                                    </p>
                                                    </div>
                                            </div>
                                        </div>
                                        <ul class="profile-tab nav nav-tabs">
                                            <li class="active"><a href="#edit" data-toggle="tab">Edit</a></li>
                                        </ul>
                                        <div class="profile-tab-content tab-content">
                                            <div class="tab-pane fade active in" id="edit">
                                                <form class="form-horizontal row-fluid" action="profile.php" method="post">
                                                <div class="control-group">
                                                        <label class="control-label" for="email">Email: </label>
                                                        <div class="contorls">
                                                            <input type="email" id="email" name="email" value="<?php echo $num['Email']; ?>" placeholder="E-mail" class="span5" >
                                                        </div>
                                                    </div>

                                                    <div class="control-group">
                                                        <label class="control-label" for="office">Office: </label>
                                                        <div class="contorls">
                                                            <input type="text" id="office" name="office" placeholder="Office" value="<?php echo $num['Office']; ?>" class="span5" >
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="control-group">
                                                    <label class="control-label" for="contact">Phone Number: </label>
                                                    <div class="controls">
                                                    <input type="tel" id="contact" name="contact" value="<?php echo $num['Contact']; ?>" class="span5"> 
                                                    </div>
                                                    </div>
                                                   
                                                    <input type="submit" class="btn btn-success" value="Update" name="update">
                                                </form> 
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
                <div class="container">
                </div>
            </div>
            <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
            <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
            <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
            <script src="scripts/skill.js" type="text/javascript"></script>
        </body>
      <?php } ?>
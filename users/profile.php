<?php
 // error_reporting(0);
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
    $lang = $_POST['lang'];
   
 $sql = "UPDATE students SET Bio='$bio', Hobby='$hobby', Email='$email', Mobile='$phone', Country='$country', SLanguage='$lang'  Where StudentID='$sid';";

    if ($con->query($sql) === TRUE) {
    $_SESSION['Message'] = "record updated successfully";
        header('location:profile.php');
    }
    else {
        echo "Error: ". $sql . "<br>" . $con->error;
    }
}

if(isset($_POST['skills']))
  {
    $sid = $_SESSION['SID'];
    $skill  = $_POST['skill'];
    $level = $_POST['level'];

    $result = "SELECT * FROM Skills WHERE Skill='$skill' and StudentId='$sid'";
$result2 = $con->query($result);

if ($result2->num_rows > 0) {
   echo '<script type="text/javascript">';
    echo ' alert("You have already added this Skill")'; 
    echo '</script>';
}
else{
   
 $sql = "INSERT INTO skills (StudentId, Skill, SLevel) VALUES (
    '$sid', '$skill', '$level')";

    if ($con->query($sql) === TRUE) {
        $_SESSION['Message'] = "New record skill added successfully";
         echo '<script type="text/javascript">';
    echo ' alert("Skill added successfully")'; 
    echo '</script>';
       
    }
    else {
        echo "Error: ". $sql . "<br>" . $con->error;
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
            <link rel="stylesheet" href="css/skill.css" rel="stylesheet">
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
                                                <img src="../image/profile/avatar1.png">
                                            </a>
                                            <div class="media-body">
                                                <h4>
                                                    <?php echo $num['Firstname']. " ". $num['Lastname'] ; ?>
                                                </h4>
                                                <p class="profile-brief">
                                                    <?php echo $num['Bio']; ?>
                                                    <div class="profile-details muted">
                                                        <a href="#" class="btn"><i class="icon-phone"></i><?php echo $num['Mobile']; ?> </a>
                                                        <a href="#" class="btn"><i class="icon-envelope-alt shaded"></i><?php echo $num['Email']; ?> </a>
                                                    </div>
                                            </div>
                                        </div>
                                        <ul class="profile-tab nav nav-tabs">
                                            <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
                                            <li><a href="#edit" data-toggle="tab">Edit</a></li>
                                        </ul>

                                        <div class="profile-tab-content tab-content">
                                            <div class="tab-pane fade active in" id="details">
                                                <div class="btn-box-row row-fluid">
                                                    <div class="span8">
                                                        <div class="row-fluid">
                                                            <div class="span12">
                                                                <a href="#" class="btn-box small span4"><i class="icon-book"></i><b><?php echo $num['Course']; ?></b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-envelope"></i><b><?php echo $num['Email']; ?> </b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-phone"></i><b><?php echo $num['Mobile']; ?> </b>
                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="row-fluid">
                                                            <div class="span12">
                                                                <a href="#" class="btn-box small span4"><i class="icon-flag"></i><b><?php echo $num['Country']; ?> </b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-globe"></i><b><?php echo $num['SLanguage']; ?> </b>
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
                                                        <input type="button" value="Add Skill" class="btn btn-primary pull-right " data-toggle="modal" data-target="#projectcreate">
                    
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="projectcreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Skills</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                                </div>
                                                     <div class="modal-body">
                                                        <form action="profile.php" method="post">
                                                        <div class="control-group" id="target">
                                <div class="controls">
                                    <input id="skill" name="skill" placeholder="Enter the name of your skill" class=" form-control input-xlarge" type="text" required>
                                     <input type="number" name="level" placeholder="How much compitent you are" class=" form-control input-xlarge" min="1" max="100" required>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label" for="submit"></label>
                                <div class="controls">
                                    <input type="submit" name="skills"  class="btn btn-primary pull-right" value="Submit">
                                    <!-- <button id="submit" name="submit" class="btn btn-primary">Submit</button> -->
                                </div>
                            </div>

                                                        </form>
                                                       </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="tab-pane fade" id="edit">
                                                <form class="form-horizontal row-fluid" action="profile.php" method="post">
                                                    <div class="control-group">
                                                        <label class="control-label" for="hobby">Hobby</label>
                                                        <div class="contorls">
                                                            <select name="hobby" class="span4" id="hobby" required>
                                      <option class="span4" value="">Choose your Hobby</option>
                                      <option class="span4" value="Football">Football</option>
                                      <option class="span4" value="Swimming">Swimming</option>
                                      <option class="span4" value="Reading">Reading</option>
                                      <option class="span4" value="Chatting">Chatting</option>
                                      </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="country">Country</label>
                                                        <div class="contorls">
                                                            <select name="country" class="span4" id="country" required>
                                      <option class="span4" value="">Choose your Country</option>
                                      <option class="span4" value="Tanzanian">Tanzania</option>
                                      <option class="span4" value="Kenyan">Kenya</option>
                                      <option class="span4" value="Ugandian">Uganda</option>
                                      </select>
                                      <select name="lang" class="span4" id="lang" required>
                                      <option class="span4" value="">Choose your Language</option>
                                      <option class="span4" value="Swahili">Swahili</option>
                                      <option class="span4" value="English">English</option>
                                      </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="control-group">
                                                        <label class="control-label" for="email">Email</label>
                                                        <div class="contorls">
                                                            <input type="email" id="email" name="email" value="<?php echo $num['Email']; ?>" placeholder="E-mail" class="span5" required>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="phone">Phone</label>
                                                        <div class="contorls">
                                                            <input type="tel" id="phone" name="phone" value="<?php echo $num['Mobile']; ?>" placeholder="Telephone" class="span5" required>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="bio">Bio</label>
                                                        <div class="contorls">
                                                            <textarea name="bio" id="bio" cols="30" rows="4" class="span6">Write something about you</textarea>
                                                        </div>
                                                    </div>
                                                    <input type="submit" class="btn btn-success" value="Update" name="update">
                                                </form>
                                               
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
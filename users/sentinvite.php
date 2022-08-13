<?php 
session_start();
include('../include/config.php');
$_SESSION['Message']="";
if(strlen($_SESSION['login'])==0)
    {   
        $_SESSION['Message']="You have to login in first";
header('location:../signin.php');
$sid = $_SESSION['SID'];
}
if(isset($_POST['invite']))
  {
 $sid = $_SESSION['SID'];
        $receiver=$_POST['receiver'];
        $pname=$_POST['pname'];
        $role=$_POST['role'];
        $message=$_POST['message'];
        $cdate=date("Y-m-d h:i:sa");


         $query=mysqli_query($con,"SELECT * FROM project WHERE Pname='$pname'");
$num=mysqli_fetch_array($query);
$pid=$num['Pid'];
       
       
            $sql="INSERT INTO invite (Sender, Receiver, Pname, Pid, Idesc, Irole, SDate, Istatus) VALUES ('$sid', '$receiver', '$pname', '$pid', '$message', '$role', '$cdate', 'Pending')";
  if ($con->query($sql)===TRUE) {
        $sql1="INSERT INTO team (Pname, Member, MemberType, Tstatus) VALUES ('$pname', '$receiver', 'Member', 'InActive')";
if ($con->query($sql1)===TRUE) {
    header('location:sentinvite.php');
}
   }  
    else {
        echo "Error: ". $sql . "<br>" . $con->error;
        header('location:invite.php');
    }

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
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

        <script type="text/javascript">
function deleteinvite(x){
var conf = confirm("Are you sure you want to delete this Invite?");
if(conf == true){
window.location = "deleteivite.php?iid="+x;
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
                                    <h3>Invites</h3>
                                </div>
                                <div class="module-option clearfix">
                                    <!-- <div class="pull-left">
                                        <div class="btn-group"><button class="btn">Invites filter</button><button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Pending(1)</a></li>
                                                <li><a href="#">Accepted(1)</a></li>
                                                <li><a href="#">Denied(1)</a></li>
                                            </ul>
                                        </div>
                                    </div> -->
                                    <a href=""><button class="btn btn-primary pull-right " data-toggle="modal" data-target="#invitecomp"><i class="icon-plus-sign-alt"></i> Compose</button></a>
                                </div>
                                <div class="module-body table">
                                    <table class="table table-message">
                                        <tbody>
                                            <tr class="heading">
                                                <td class="cell-check"><input type="checkbox" class="inbox-checkbox"></td>
                                                <td class="cell-icon"></td>
                                                <td class="cell-author hidden-phone hidden-tablet">To </td>
                                                <td class="cell-title">Project </td>
                                                <td class="cell-author hidden-phone hidden-tablet">Role</td>
                                                <td class="cell-time hidden-phone hidden-tablet">status</td>
                                                <td class="cell-time align-right"> Sent Date </td>
                                                <td class="cell-author hidden-phone hidden-tablet">Delete</td>
                                            
                                            </tr>
                                            <?php
                                                $sid = $_SESSION['SID'];
                                                $cnt=mysqli_query($con,"SELECT * FROM invite,students WHERE  Sender='$sid' and Sender=StudentID");

                                                         while ($cnt1=mysqli_fetch_array($cnt)) { 
                                                    ?>
                                            <tr class="unread">
                                                <td class="cell-check"><input type="checkbox" class="inbox-checkbox"></td>
                                                <td class="cell-icon"><i class="icon-star"></i></td>
                                                <td class="cell-author hidden-phone hidden-tablet"><?php 
                                                 $receiver= $cnt1['Receiver'];
                                                 $cnw= mysqli_query($con,"SELECT Firstname,Lastname FROM students WHERE  StudentID='$receiver'");
                                                 while ($cnw1=mysqli_fetch_array($cnw)) {
                                                    echo $cnw1['Lastname']." ".$cnw1['Firstname'];
                                                 }
                                                 ?> </td>
                                                <td class="cell-title"><?php echo $cnt1['Pname']; ?> </td>
                                                <td class="cell-author hidden-phone hidden-tablet"><?php echo $cnt1['Irole']; ?></td>
                                                <td class="cell-time hidden-phone hidden-tablet text-warning"><?php echo $cnt1['Istatus']; ?></td>
                                                <td class="cell-author align-right"><?php echo $cnt1['SDate']; ?> </td>
                                                 <td><a href="deleteinvite.php?iid=<?php echo htmlentities($cnt1['ID']);?>" onClick="deleteinvite(<?php echo htmlentities($cnt1['ID']);?>)"style="cursor:pointer;"><i class="icon-trash"></i></a></td>
                        
                                            </tr>
                                            <?php } ?>
                                                                            <!-- <tr class="unread starred">
                                                <td class="cell-check"><input type="checkbox" class="inbox-checkbox"></td>
                                                <td class="cell-icon"><i class="icon-star"></i></td>
                                                <td class="cell-author hidden-phone hidden-tablet">Epaflas Juma </td>
                                                <td class="cell-title">Team Project Portal </td>
                                                <td class="cell-author hidden-phone hidden-tablet">Designer</td>
                                                <td class="cell-icon hidden-phone hidden-tablet text-success">Accepted</td>
                                                <td class="cell-time align-right">1-02-2021 </td>
                                            </tr>
                                            <tr class="unread">
                                                <td class="cell-check"><input type="checkbox" class="inbox-checkbox"></td>
                                                <td class="cell-icon"><i class="icon-star"></i></td>
                                                <td class="cell-author hidden-phone hidden-tablet">Gerald Michael </td>
                                                <td class="cell-title">Team Project Portal </td>
                                                <td class="cell-author hidden-phone hidden-tablet">Developer</td>
                                                <td class="cell-icon hidden-phone hidden-tablet text-error">Denied</td>
                                                <td class="cell-time align-right">04-05-2021 </td>
                                            </tr> -->

                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal fade" id="invitecomp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Create Invite</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="invite.php" method="post">
                                                    <div class="control-group">
                                                        <label class="control-label" for="receiver">Username:&nbsp;&nbsp;</label>
                                                        <div class="contorls">
                                                            <select class="span4" name="receiver" id="receiver" required>
                                                            <option value="">Choose User</option>
                                                            <?php
                                                            $sid = $_SESSION['SID'];
                                       $members=mysqli_query($con,"select * from students where StudentID !='$sid'");
                                        $members1=mysqli_num_rows($members);
                                        while ($member2=mysqli_fetch_array($members)) {
                                        
                                        ?>
                                                            <option value="<?php echo $member2['StudentID'];?>"><?php echo $member2['Lastname']." ".$member2['Firstname']; ?></option>
                                                           <?php } ?>
                                                            </select>

                                                        </div>
                                                    </div>

                                                    <div class="control-group">
                                                        <label class="control-label" for="project">Project:&nbsp;&nbsp;</label>
                                                        <div class="contorls">
                                                            <select class="span4" name="pname" id="pname" required>
                                                                <option value="">Choose Project</option>
                                                                <?php
                                                $sid = $_SESSION['SID'];
                                                $cnt2=mysqli_query($con,"SELECT * FROM project,team,students WHERE  Member='$sid' and team.Pname=project.Pname and Member=StudentID and MemberType='Leader'");

                                                         while ($row2=mysqli_fetch_array($cnt2)) {
                                                          
                                                    ?>
                                                                <option value="<?php echo $row2['Pname'];?> "><?php echo $row2['Pname'];?></option>
                                                              
                                                                <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="control-group">
                                                            <label class="control-label" for="role">Role:&nbsp;&nbsp; </label>
                                                            <div class="contorls">
                                                                <input type="text" id="role" name="role" placeholder="Role" class="span4" required>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="control-group">
                                                            <label class="control-label" for="message">&nbsp;&nbsp; </label>
                                                            <div class="contorls">
                                                                <textarea name="message" id="message" class="span4" cols="15" rows="5">Enter Message here</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="control-group">
                                                            <div class="contorls">
                                                                <input type="submit" name="invite" class="btn btn-primary" value="Send Invite">
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
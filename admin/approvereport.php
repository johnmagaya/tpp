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
  

$rid=intval($_GET['rid']);
$_SESSION['rid'] = $rid;
$status= 'Approved';
 $query=mysqli_query($con,"SELECT * FROM taskreport WHERE Rid='$rid'");
$num=mysqli_fetch_array($query);
$tid=$num['tid'];

$sql = "UPDATE taskreport SET Rstatus='$status' Where Rid='$rid'";

    if ($con->query($sql) === TRUE) {
    	$sql1 = "UPDATE tasks SET Tstatus='$status' Where tid='$tid'";

    	  if ($con->query($sql1) === TRUE) {
    	  	$query2=mysqli_query($con,"SELECT * FROM tasks WHERE tid='$tid'");
$num1=mysqli_fetch_array($query2);
$pid=$num1['Pid'];
echo $marks=$num1['Marks'];
$query3=mysqli_query($con,"SELECT * FROM project WHERE Pid='$pid'");
$num2=mysqli_fetch_array($query3);
echo '<br>';
echo $prog=$num2['Pprogress'];
echo '<br>';
 echo $tot=$marks+$prog;

    	  	$sql2 = "UPDATE project SET Pprogress='$tot' Where Pid='$pid'";
    	  	if ($con->query($sql2) === TRUE) {
   header('location:reports.php');
       }
    }    
}
}
 ?>
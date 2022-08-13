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
$status= 'Denied';
 $query=mysqli_query($con,"SELECT * FROM taskreport WHERE Rid='$rid'");
$num=mysqli_fetch_array($query);
$tid=$num['tid'];
$sql = "UPDATE taskreport SET Rstatus='$status' Where Rid='$rid'";

if ($con->query($sql) === TRUE) {
	$status = 'Rejected';
	$sql = "UPDATE tasks SET Tstatus='$status' Where tid='$tid'";
    header('location:reports.php');
}
}
 ?>
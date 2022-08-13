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
$pid=intval($_GET['pid']);
$_SESSION['pid'] = $pid;
$status= 'Denied';
$sql = "UPDATE project SET Pstatus='$status' Where Pid='$pid'";

if ($con->query($sql) === TRUE) {
    header('location:project.php');
}
}
 ?>
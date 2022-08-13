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

  $sid=$_GET['sid'];
 // $nid=intval($_GET['nid']);
$query=mysqli_query($con,"delete from students where StudentID='$sid'");
if($query = true){
header('location:users.php');
}
}
 ?>
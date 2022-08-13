<?php 
session_start();
include('../include/config.php');
if(strlen($_SESSION['login'])==0)
    {   
        $_SESSION['Message']="You have to login in first";
header('location:../signin.php');
}
else{
  $sid = $_SESSION['SID'];
  $iid=$_GET['iid'];
 // $nid=intval($_GET['nid']);
$query=mysqli_query($con,"delete from invite where ID='$iid'");
if($query = true){
header('location:sentinvite.php');
}
}
 ?>
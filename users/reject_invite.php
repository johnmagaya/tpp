<?php 
session_start();
include('../include/config.php');
if(strlen($_SESSION['login'])==0)
{   
header('location:../login.php');
}
else{
$iid=intval($_GET['iid']);
$_SESSION['iid'] = $iid;
$query=mysqli_query($con,"SELECT Receiver FROM invite WHERE ID='$iid'");
$num=mysqli_fetch_array($query);
$receiver=$num['Receiver'];

$status= 'Rejected';
$sql = "UPDATE invite SET Istatus='$status' Where ID='$iid'";


if ($con->query($sql) === TRUE) {

	$sql2=mysqli_query($con,"delete from team where Member='$receiver'");
if($sql2 = true){
header('location:index.php');
}
   
}
}
 ?>
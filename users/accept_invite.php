<?php 
session_start();
include('../include/config.php');
if(strlen($_SESSION['login'])==0)
{   
header('location:../login.php');
}
else{

    $sid = $_SESSION['SID'];
    

$iid=intval($_GET['iid']);
$_SESSION['iid'] = $iid;
$query=mysqli_query($con,"SELECT * FROM invite,team WHERE ID='$iid' and invite.Pname=team.Pname and Member='$sid'");
    $num=mysqli_fetch_array($query);
    $member = $num['Member'];
$status= 'Accepted';
$sql = "UPDATE invite SET Istatus='$status' Where ID='$iid'";

if ($con->query($sql) === TRUE) {
    $tstatus= 'Active';
    $sql2 = "UPDATE team SET Tstatus='$tstatus' Where Member='$member'";


    if ($con->query($sql2) === TRUE) {
        header('location:project.php');
    }
    
}
}
 ?>
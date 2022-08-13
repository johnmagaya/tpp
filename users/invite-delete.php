<?php
session_start();
// error_reporting(0);

include('../include/config.php');
$nid=intval($_GET['nid']);

$sid = $_SESSION['SID'];
$query=mysqli_query($con,"delete from invite where ID='$nid' and Sender = '$sid'");
if($query = true){
header('location:invite.php');
}


?>
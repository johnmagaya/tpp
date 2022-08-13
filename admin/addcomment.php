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
$pid  = $_SESSION['pid'];

$cheader=$_POST['cheader'];
	$comment=$_POST['comment'];
	$cdate=date('Y-m-d');
	$qrs=mysqli_query($con, "SELECT * FROM admint WHERE Aid='$aid' ");
    $num=mysqli_fetch_array($qrs);
    $sender=$num['Username'];
	$sql1="INSERT INTO comments (Pid, Cheader, Tcomment, Comby, Cdate) VALUES ('$pid', '$cheader', '$comment', '$sender', '$cdate')";
if ($con->query($sql1)===TRUE) {
     $event = 'Comment is added successfully';
		header('location:project2.php');
	}
   
}

?>
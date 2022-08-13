<?php
session_start();
include('../include/config.php');
$_SESSION['Message']="";

        $sid = $_SESSION['SID'];
        $receiver=$_POST['receiver'];
        $pname=$_POST['pname'];
        $role=$_POST['role'];
        $message=$_POST['message'];
        $cdate=date("Y-m-d h:i:sa");
       
       
            $sql="INSERT INTO invite (Sender, Receiver, Pname, Idesc, Irole, SDate, Istatus) VALUES ('$sid', '$receiver', '$pname', '$message', '$role', '$cdate', 'Pending')";
 if ($con->query($sql)===TRUE) {
    
    $_SESSION['Message']="Invite sent successfully";
    header('location:invite.php');
}
      
    else {
        echo "Error: ". $sql . "<br>" . $con->error;
        header('location:index.php');
    }

?>
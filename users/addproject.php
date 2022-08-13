<?php
session_start();
include('../include/config.php');
$_SESSION['Message']="";

        $sid = $_SESSION['SID'];
        $pname=$_POST['pname'];
        $catg=$_POST['catg'];
        $sdate=$_POST['sdate'];
        $ndays=$_POST['ndays'];
        $ddate=$_POST['ddate'];
        $manager=$_POST['manager'];
        $budget=$_POST['budget'];
        $desc=$_POST['desc'];
        $cdate=date('Y-m-d');
        $status="Wait For Approval";
        $client="UDSM";
        $createdby = $sid;
        $result="SELECT * FROM project WHERE Pname='$pname' and PCategory='$catg'";
        $result2=$con->query($result);
        if ($result2->num_rows > 0) {
           echo "there is project with the same name";
        
        }
        else {
           
           
            $sql="INSERT INTO project (Pname, PCategory, CreateD, SDate, EDate, Duration, Pstatus, Budget, PDesc, Client,PLeader, CreatedBy) VALUES (
 '$pname', '$catg', '$cdate', '$sdate', '$ddate', '$ndays', '$status', '$budget', '$desc', '$client', '$manager', '$createdby')";
 if ($con->query($sql)===TRUE) {
    if ($manager!=$sid) {

       $sql1="INSERT INTO team (Pname, Member, MemberType, Tstatus) VALUES ('$pname', '$sid', 'Member', 'Active'),
       ('$pname', '$manager', 'Leader', 'InActive')";
       
if ($con->query($sql1)===TRUE) {
    $sql2="INSERT INTO invite (Sender, Receiver, Pname, Idesc, Irole, SDate, Istatus) VALUES ('$sid', '$manager', '$pname', '$desc', 'Leader', '$cdate', 'Pending')";
   

    if ($con->query($sql2)===True) {
        $_SESSION['Message']="New Project created successfully";
        header('location:project.php');
    }
}
      
    }
    else{
  $member="";
  $sql3="INSERT INTO team (Pname, Member, MemberType, Tstatus) VALUES ('$pname', '$sid', 'Leader', 'Active')";
    }
    if ($con->query($sql3)===TRUE) {
        $_SESSION['Message']="New Project created successfully";
        header('location:project.php');
    }
    else {
        echo "Error: ". $sql . "<br>" . $con->error;
        header('location:index.php');
    }
   
            }
           
           
        }

?>
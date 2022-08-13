<?php 
 error_reporting(0);
session_start();
include('../include/config.php');

$_SESSION['Message']="";
$sid=$_SESSION['SID'];
$pid=$_SESSION['pid'];
$tname=$_POST['tname'];
$stdate=$_POST['stdate'];
$ddate=$_POST['ddate'];
$noa=$_POST['noa'];
$marks=$_POST['marks'];
$assignee=$_POST['assignee'];
$tdesc=$_POST['tdesc'];
$cdate=date('Y-m-d');
if ($stdate!=$cdate) {
        $status='Pending';
      }
      else{
        $status='Started';
        }
$pstatus='Approved';
$errors= array();
$file_name = $_FILES['image']['name'];
$file_size = $_FILES['image']['size'];
$file_tmp = $_FILES['image']['tmp_name'];
$file_type = $_FILES['image']['type'];
$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

$query=mysqli_query($con, "SELECT * FROM project WHERE Pid='$pid' and PLeader='$sid' and Pstatus='$pstatus'");
$num=mysqli_fetch_array($query);
if($num>0) {
  $tot=$marks+$num['Allocated'];
   if ($tot>100) {
    $rem=100-$marks;
    $_SESSION['Msg']='THe remaining Percetage to complete the project is '.$rem.'. The alocated percentage allocated to the task exists';
   }
else{
    $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("doc","pdf","docx");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a PDF or Doc file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"attachments/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
      
    $sql1="INSERT INTO tasks (Tname, Pid, Sdate, Edate, NoA, Assignees, TDesc, Attach, TStatus, Marks) VALUES ('$tname', '$pid', '$stdate', '$ddate', '$noa', '$assignee', '$tdesc', '$file_name', '$status', '$marks')";
    if ($con->query($sql1)===TRUE) {
       $sql2="UPDATE project SET Allocated='$tot' Where Pid='$pid'";
     }
    if ($con->query($sql2)===TRUE) {
        $event='You have been assigned a task: '.$tdesc;
        $status='unread';
        $sql3="INSERT INTO	pnotification (Sender, Receiver, Nevent, nstatus, ndate) VALUES ('$sid', '$assignee', '$event', '$status', '$cdate')";
        if ($con->query($sql3)===TRUE) {
            $_SESSION['Message']="Task created successfully";
            header('location:task.php');
        }

    }


}
}
else {
    echo '<script type="text/javascript">';
    echo ' alert("You cannot create a task for this project your not a project leader or the project is not approved ")'; 
    echo '</script>';
    // header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
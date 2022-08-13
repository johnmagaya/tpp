<?php
session_start();
include('../include/config.php');

$_SESSION['Message']="";
$sid=$_SESSION['SID'];
$tid=$_SESSION['Tid'];
$cdate=date('Y-m-d');
$rstatus='Wait For Approval';

$errors= array();
$file_name = $_FILES['image']['name'];
$file_size = $_FILES['image']['size'];
$file_tmp = $_FILES['image']['tmp_name'];
$file_type = $_FILES['image']['type'];
$tmp = explode('.', $file_name);
$file_ext= end($tmp);


    $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $tmp = explode('.', $file_name);
$file_ext= end($tmp);
      // $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("doc","pdf","docx");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a PDF or Doc file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"reports/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
      $query=mysqli_query($con, "SELECT * FROM tasks,team WHERE tasks.tid='$tid'  and  Member='$sid'");
$num=mysqli_fetch_array($query);
if($num>0) {
      
    $sql1="INSERT INTO taskreport (tid, Uploader, Udate, Report, Rstatus) VALUES ('$tid', '$sid', '$cdate', '$file_name', '$rstatus')";
    if ($con->query($sql1)===TRUE) {
         $tstatus='Wait For Approval';
       $sql2 = "UPDATE tasks SET TStatus='$tstatus' Where tid='$tid'";

        if ($con->query($sql2)===TRUE) {
            $_SESSION['Message']="TaskReport Uploaded successfully";
            header('location:task_report.php');
        }

            }
          }
?>
<?php 
session_start();
include('include/config.php');
    $sid=$_POST['studentid'];
    $pass=md5($_POST['pass']);
    $query=mysqli_query($con, "SELECT * FROM students WHERE StudentId='$sid' and Passwd='$pass'");
    $num=mysqli_fetch_array($query);
    if($num>0) {
        $_SESSION['login']=$_POST['studentid'];
        $_SESSION['SID'] = $sid;
        $Msg ="Welcome ". $num['Firstname'] . " We are glad your back";
        echo "<script type='text/javascript'>alert('$Msg');</script>";
         header('location:users/index.php');
    }
    else {
        $_SESSION['Message']="Sorry this username and password is not available";
        header('location:signin.php');
    }

?>
<?php 
session_start();
include('../include/config.php');
$_SESSION['Message']="";
if(isset($_POST['submit']))
  {
    $sid = $_SESSION['SID'];
    $skill  = $_POST['skill'];
    $level = $_POST['level'];

    $result = "SELECT * FROM Skills WHERE Skill='$skill' and StudentId='$sid'";
$result2 = $con->query($result);

if ($result2->num_rows > 0) {
   echo $_SESSION['Message'] = "You have already added this skill";
}
else{
   
 $sql = "INSERT INTO skills (StudentId, Skill, SLevel) VALUES (
    '$sid', '$skill', '$level')";

    if ($con->query($sql) === TRUE) {
        $_SESSION['Message'] = "New record skill added successfully";
        header('location:profile.php');
    }
    else {
        echo "Error: ". $sql . "<br>" . $con->error;
    }
}
}
?>
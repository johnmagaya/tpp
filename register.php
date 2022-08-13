<?php
session_start();
include('include/config.php');
$_SESSION['Message']="";
if(isset($_POST['submit']))
  {
    $sid  = $_POST['sid'];
    $first = $_POST['fname'];
    $last = $_POST['lname'];
    $course = $_POST['course'];
    $email = $_POST['email'];
    $mobile  = $_POST['mobile'];
    $gender = $_POST['gender'];
    $expert = $_POST['expert'];
    $pass = md5($_POST['pass1']);
    $pass2 = md5($_POST['pass2']);
    $yos = $_POST['yos'];

if($pass != $pass2){
$_SESSION['Message'] = "The two password don't match";
}
$result = "SELECT StudentId FROM students WHERE StudentId='$sid'";
$result2 = $con->query($result);

if ($result2->num_rows > 0) {
    $_SESSION['Message'] = "The student with the same ID exist please login";
}
else{
 $sql = "INSERT INTO students (StudentId, Firstname, Lastname, Course, YoS, Mobile, Gender, Expert, Passwd, Email) VALUES (
    '$sid', '$first', '$last', '$course', '$yos', '$mobile', '$gender', '$expert', '$pass', '$email')";

    if ($con->query($sql) === TRUE) {
        $_SESSION['Fname']=$first." ".$last;
        header('location:welcomepage.php');
    }
    else {
        echo "Error: ". $sql . "<br>" . $con->error;
    }
}
  }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Tpp- Team Project Portal</title>
            <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
            <link type="text/css" href="css/theme.css" rel="stylesheet">
            <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
            <link rel="stylesheet" href="css/reg.css">
            <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
            <style>
                .help-block {
                    color: #b94a48;
                }
            </style>
        </head>

        <body>
            <div class="container">
                <div class="row">
                    <form class="form-horizontal" action="register.php" method="post">
                        <fieldset>

                            <!-- Form Name -->
                            <legend align="left">:: Register</legend>
                            <p class="help-block"><?php echo $_SESSION['Message']; ?></p>
                            <!-- Text input-->
                            <div class="control-group">
                                <label class="control-label" for="sid">Student id</label>
                                <div class="controls">
                                    <input id="sid" name="sid" placeholder="Enter your Reg No" class="input-xlarge" type="text" required>
                                    <!-- <p class="help-block">Error</p> -->
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="control-group">
                                <label class="control-label" for="fname">First Name</label>
                                <div class="controls">
                                    <input id="full_name" name="fname" placeholder="Enter your first name" class="input-xlarge" type="text" required>
                                    <!-- <p class="help-block">Error</p> -->
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="control-group">
                                <label class="control-label" for="lname">Last Name</label>
                                <div class="controls">
                                    <input id="father_name" name="lname" placeholder="Enter Your Last name" class="input-xlarge" type="text" required>

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="control-group">
                                <label class="control-label" for="course">Course</label>
                                <div class="controls">
                                    <input id="course" name="course" placeholder="Enter your Course name" class="input-xlarge" type="text" required>

                                </div>
                            </div>

                           <!-- Select Basic -->
                           <div class="control-group">
                                <label class="control-label" for="yos">Year of Study</label>
                                <div class="controls">
                                    <select id="expert" name="yos" class="input-xlarge">
                  <option>Select Year</option>
                  <option value="First Year">1<sup>st</sup> Year </option>
                  <option value="Second Year">2<sup>nd</sup> Year</option>
                  <option value="Third Year">3<sup>rd</sup> Year</option>
                  <option value="fourth Year">4<sup>th</sup> Year</option>
                  <option value="Firth Year">5<sup>th</sup> Year</option>
                </select>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="control-group">
                                <label class="control-label" for="email">Email</label>
                                <div class="controls">
                                    <input id="email" name="email" placeholder="Enter Your Email." class="input-xlarge" type="email" required>

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="control-group">
                                <label class="control-label" for="mobile">Mobile No.</label>
                                <div class="controls">
                                    <input id="mobile" name="mobile" placeholder="Enter Your Mobile Number" class="input-xlarge" type="text" required>

                                </div>
                            </div>


                            <!-- Multiple Radios (inline) -->
                            <div class="control-group">
                                <label class="control-label" for="gender">Gender</label>
                                <div class="controls">
                                    <label class="radio inline" for="gender-0">
                  <input name="gender" id="gender-0" value="Male" checked="checked" type="radio">
                  Male
                </label>
                                    <label class="radio inline" for="gender-1">
                  <input name="gender" id="gender-1" value="Female" type="radio">
                  Female
                </label>
                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="control-group">
                                <label class="control-label" for="expert">Area of Expert</label>
                                <div class="controls">
                                    <select id="expert" name="expert" class="input-xlarge">
                  <option>Select Field</option>
                  <option value="Development">Development</option>
                  <option value="Designing">Designing</option>
                  <option value="Analysis">Analysis</option>
                </select>
                                </div>
                            </div>

                            <!-- password -->
                            <div class="control-group">
                                <label class="control-label" for="Address">password</label>
                                <input id="pass1" name="pass1" value="" placeholder="Enter your Password" class="input-xlarge" type="password" required>
                                <div class="controls">

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="Address">Re-password</label>
                                <input id="pass2" name="pass2" placeholder="Re-Enter your Password" class="input-xlarge" type="password" required>
                                <div class="controls">

                                </div>
                            </div>

                            <!-- Button -->
                            <div class="control-group">
                                <label class="control-label" for="submit"></label>
                                <div class="controls">
                                    <input type="submit" name="submit"  class="btn btn-primary" value="Submit">
                                    <!-- <button id="submit" name="submit" class="btn btn-primary">Submit</button> -->
                                </div>
                            </div>

                        </fieldset>
                    </form>

                </div>
            </div>
            <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
            <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
            <script src="js/reg.js"></script>
            <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        </body>

    </html>
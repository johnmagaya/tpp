<?php session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TPP - Signin</title>
    <link rel="stylesheet" href="css/signin.css">
</head>

<body>
    <div class="logo">
        <a href="#"><img src="img/logo.png" alt="" title=""></a>
    </div>
    <div class="login-box">
        <h2>Login</h2><strong style="color:red;"><?php echo $_SESSION['Message'];
?></strong><br><br>
        <form action="loginprogress.php" method="post" autocomplete="off" style="color:white;">
            <div class="user-box"><input type="text" name="studentid" placeholder="" required><label>Reg No</label></div>
            <div class="user-box"><input type="password" name="pass" placeholder="" required><label>Password</label></div><a href=""><span></span><span></span><span></span><span></span><input type="submit" class="btn" value="Submit"></a></form>
        <p style="color:silver;">forgot password? <a href="" style="background:transparent;box-shadow: none;">Click here</a></p>
        <p style="color:silver;">Don't have account?
            <a href="register.php" style="background:transport;box-shadow: none;">create account</a></p>
    </div>
</body>

</html>
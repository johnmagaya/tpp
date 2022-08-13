<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="refresh" content="5;url=signin.php" />
    <title>Tpp</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
            <link type="text/css" href="css/theme.css" rel="stylesheet">
            <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
            <link rel="stylesheet" href="css/reg.css">
            <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body class="bg-success">
    <center>
    <div class="error" style="margin-top:15%;">
        <span class="glyphicon glyphicon-check"></span><h3 class="text-center text-success">!Welcome <?php echo $_SESSION['Fname'];?> <br>
        	You have Completed your registration Successful. <br>
        Please Login Using your Student ID number and Password. </h3>
        <a href="signin.php"><button class="btn btn-info">Login</button></a>
    </div>
    </center>
</body>
</html>
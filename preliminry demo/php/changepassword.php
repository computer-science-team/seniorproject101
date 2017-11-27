<?php
session_start();//starts session
$_SESSION['message'] = '';

$username = $_SESSION['username'];
$servername = "localhost";
$user = "root";
$passwd = "rowanphysicssweng";
$dbname ="accounts";
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
// Check connection
if (isset($_POST['submit']))
{
if ($mysqli->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
else 
{
    //echo "Good";
    //$username=$_POST['username'];
    $password = md5($_POST['password']);
    $password2 = md5($_POST['password2']);
    
    if ($password==$password2)
    {
        $sql= "UPDATE users SET password= '".$password."' WHERE username = '".$username."'";
        
        if ($mysqli->query($sql) === TRUE)
        {
            include 'popup.php';
			print $passwordSuccessfullyChanged;
            //header("location: signinpage.php");
            header( "refresh:4; url=lastpage.php" );
        } 
        else
        {
			include 'popup.php';
			print $passwordDoNotMatch;
        }
    }
    
    else 
    {
    include 'popup.php';
	print $passwordCannotChange;
    }
}
}//if isset
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Change Password</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
	</head>
	<body>
        <div class = "wrapper">
		<div class="form-signin">
		<div class="changePassword">
			<h2>Change Password</h2>
			<form method="post">
				<p>Password
				<br><input type="password" name="password" placeholder="password" required></p>
				<p>Confirm Password 
				<br><input type="password" name="password2" placeholder="confirm password" required></p>
				<p> 
				<input type="submit" name="submit" value="Change Password"></p>			
				
			</form>
		</div>
        </div>
        </div>
	</body>
</html>

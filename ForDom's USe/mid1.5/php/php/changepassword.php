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
            echo 'Password successfully updated! 
You will be redirected to the Log In page';
            //header("location: signinpage.php");
            header( "refresh:4; url=login.php" );
        } 
        else
        {
            echo 'Passwords do not match!';
        }
    }
    
    else 
    {
    echo 'Password can not be changed';
    }
}
}//if isset
?>


<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
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
				<br><input type="password" name="password" placeholder="password"></p>
				<p>Confirm Password 
				<br><input type="password" name="password2" placeholder="confirm password"></p>
				<p> 
				<input type="submit" name="submitbut" value="Change Password"></p>
				<p><a href="signuppage.php">Sign Up</a></p>
				<p><a  href="signinpage.php">Log In</a></p>				
				<p><a href="professororstudent.php">Main Page</a></p>
			</form>
		</div>
        </div>
        </div>
	</body>
</html>
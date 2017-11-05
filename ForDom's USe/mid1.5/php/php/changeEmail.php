<?php
session_start();
$id = ($_SESSION['id']);
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
    $email = ($_POST['email']);
    $email2 = ($_POST['email2']);
    
    if ($email == $email2)
    {
        $sql= "UPDATE users SET email= '".$email."' WHERE id = '".$id."'";
        
        if ($mysqli->query($sql) === TRUE)
        {
            echo 'Email successfully updated! 
You will be redirected to the Log In page';
            //header("location: signinpage.php");
            header( "refresh:4; url = profilePage.php" );
        } 
        else
        {
            echo 'Password can not be changed';
        }
    }
    
    else 
    {
	echo 'Passwords do not match!';
    }
}
}//if isset
?>


<!doctype html>
<html>
    <head>
	<meta charset="utf-8">
		<title>Edit Email</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
	</head>
	<body>
        <div class = "wrapper">
		<div class="form-signin">
		<div class="changeEmail">
			<h2>Change Email</h2>
			<form method="post">
				<p>Email
                <br><input type="email" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];} ?>"></p>
				<p>Confirm Email
				<br><input type="email" name="email2" placeholder="Confirm Email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];} ?>"></p>
				<p> 
				<input type="submit" name="submitbut" value="Change email"></p>
				<p><a href="signuppage.php">Sign Up</a></p>
				<p><a  href="signinpage.php">Log In</a></p>				
				<p><a href="professororstudent.php">Main Page</a></p>
			</form>
		</div>
        </div>
        </div>
            
	</body>
</html>
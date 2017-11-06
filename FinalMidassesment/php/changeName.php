<?php
session_start();
$id = ($_SESSION['id']);
$servername = "localhost";
$user = "root";
$passwd = "";
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
    $password = ($_POST['password']);
    $password2 = ($_POST['password2']);
    
    if ($password==$password2)
    {
        $sql= "UPDATE users SET name= '".$password."' WHERE id = '".$id."'";
        
        if ($mysqli->query($sql) === TRUE)
        {
            echo 'Password successfully updated! 
You will be redirected to the Log In page';
            header( "refresh:4; url = profilePage.php" );
        } 
        else
        {
            echo 'Name can not be changed';
        }
    }
    
    else 
    {
    echo 'Names do not match!';
    
    }
}
}//if isset
?>


<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
		<title>Edit Name</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
	</head>
	<body>
        <div class = "wrapper">
		<div class="form-signin">
		<div class="changeName">
			<h2>Change Name</h2>
			<form method="post">
				<p>Name
				<br><input type="text" name="name" placeholder="name"></p>

				<p>Confirm Name 
				<br><input type="text" name="name2" placeholder="confirm name"></p>
				<p> 
				<input type="submit" name="submit" value="Change name"></p>
				<p><a href="signuppage.php">Sign Up</a></p>
				<p><a  href="signinpage.php">Log In</a></p>				
				<p><a href="professororstudent.php">Main Page</a></p>
			</form>
		</div>
        </div>
        </div>
	</body>
</html>

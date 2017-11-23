<?php
session_start();
$id = ($_SESSION['id']);
$role = ($_SESSION['role']);
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
            echo 'Name is successfully updated! You will be redirected to the profile page';
	$role2 = "yes";
            
            if (strcmp($role, $role2) !== 0){
        		header("location:studentProfilePage.php");
			
			}
		else{
		header("location:facultyProfilePage.php");
		    }
            
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
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
				<br><input type="text" name="password" placeholder="name"></p>

				<p>Confirm Name 
				<br><input type="text" name="password2" placeholder="confirm name"></p>
				<p> 
				<input type="submit" name="submit" value="Change name"></p>
				<p><a href="signup.php">Sign Up</a></p>
				<p><a  href="login.php">Log In</a></p>				
				
			</form>
		</div>
        </div>
        </div>
	</body>
</html>

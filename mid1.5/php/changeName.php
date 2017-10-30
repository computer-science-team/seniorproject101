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
	<body>
		<div class="changeName">
			<h2>Change Name</h2>
			<form method="post">
				<p>Name</p>
				<input type="text" name="password" placeholder="name">
				<p>Confirm Name </p>
				<input type="text" name="password2" placeholder="confirm name">
				<p> </p>
				<input type="submit" name="submit" value="Change name">
				<p><a href="signuppage.php">Sign Up</a></p>
				<p><a  href="signinpage.php">Log In</a></p>				
				<p><a href="professororstudent.php">Main Page</a></p>
			</form>
		</div>
	</body>
</html>
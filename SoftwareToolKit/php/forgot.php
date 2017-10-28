<?php

session_start();//starts session
$_SESSION['message'] = '';
$servername = "localhost";
$user = "root";
$passwd = "rowanphysicssweng";
$dbname ="accounts";
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['submit']))
{
    $username= $_POST['username'];
    $fullname= $_POST['fullname'];
    $dob= $_POST['dob'];
    
    $sql = "SELECT  * FROM users WHERE username  = '". $username ."' AND dob = '".$dob."' AND name ='".$fullname."'";
    $result = $mysqli->query( $sql );
    $foundRows = $result->num_rows;
    
    
    if ($foundRows > 0) 
    {
         $_SESSION['username'] = $username;
        
        
         header("location: changepassword.php");
    }
    else 
    {
        echo "Info does not match. Password can not be changed";
    }
    
}

?>


<!doctype html>
<html>
	<body>
		<div class="passwordRecovery">
			<h2>Password Recovery!</h2>
			<form method="post">
				<p>Username</p>
				<input type="text" name="username" placeholder="username">
				<p>Fullname </p>
				<input type="text" name="fullname" placeholder="fullname">
				<p>Birthdate </p>
				<input type="date" name="dob" placeholder="MM/DD/YYYY">
				<p> </p>
				<input type="submit" name="submit" value="Change Password">
				<p><a  href="main.php">Main Page</a></p>
				<p><a  href="login.php">Sign In</a></p>				
				
			</form>
		</div>
	</body>
</html>
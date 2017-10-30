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
    $password = $_POST['optradio'];
    
	 $sql= "UPDATE users SET gender= '".$password."' WHERE id = '".$id."'";
        
        if ($mysqli->query($sql) === TRUE)
        {
            echo 'Gender successfully updated! 
You will be redirected to the profile page';
            header( "refresh:4; url = profilePage.php" );
        } 
        else
        {
            echo 'Gender can not be changed';
        }
}
}//if isset
?>


<!doctype html>
<html>
	<body>
		<div class="changeGender">
			<h2>Change Gender</h2>
			<form method="post">

			<p>Gender</p>
				<label class="radio-inline">
					<input type="radio" name="optradio"  value="Male"<?php if (isset($_POST['optradio']) && $_POST['optradio'] == 'Male') 
					     echo ' checked="checked"'; ?>>Male
				</label>
				<label class="radio-inline">
					<input type="radio" name="optradio" value ="Female" <?php if (isset($_POST['optradio']) && $_POST['optradio'] == 'Female') 
					     echo ' checked="checked"'; ?>>Female
				</label>
				<label class="radio-inline">
					<input type="radio" name="optradio" value="Other"  <?php if (isset($_POST['optradio']) && $_POST['optradio'] == 'Other') 
					     echo ' checked="checked"'; ?>>Other
				</label>
				<input type="submit" name="submit" value="Change gender">
				<p><a href="signuppage.php">Sign Up</a></p>
				<p><a  href="signinpage.php">Log In</a></p>				
				<p><a href="professororstudent.php">Main Page</a></p>
			</form>
		</div>
	</body>
</html>
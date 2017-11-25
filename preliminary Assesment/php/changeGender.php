<?php
session_start();
$id = ($_SESSION['id']);
$role = ($_SESSION['role']);
$servername = "localhost";
$user = "root";
$passwd = "kkp123";
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
            echo 'Gender successfully updated! You will be redirected to the profile page';
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
            echo 'Gender can not be changed';
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
		<title>Edit Gender</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
	</head>
	<body>
        <div class = "wrapper">
		<div class="form-signin">
		<div class="changeGender">
			<h2>Change Gender</h2>
			<form method="post">

			<p>Gender:
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
                </label></p>
                <p>
                    <input type="submit" name="submit" value="Change gender"></p>
				<p><a href="signup.php">Sign Up</a></p>
				<p><a  href="login.php">Log In</a></p>				
				
			</form>
		</div>
        </div>
        </div>
	</body>
</html>

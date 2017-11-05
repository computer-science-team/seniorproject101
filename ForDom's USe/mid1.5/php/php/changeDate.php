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
    $password = ($_POST['dob']);
    

        $sql= "UPDATE users SET dob= '".$password."' WHERE id = '".$id."'";
        
        if ($mysqli->query($sql) === TRUE)
        {
            echo 'Birthday was successfully updated! You will be redirected to your profile';
            header( "refresh:4; url = profilePage.php" );
        } 
        else
        {
            echo 'Birthday can not be changed';
        }
 
}
}//if isset
?>


<!doctype html>
<html>
    <head>
		<meta charset="utf-8">
		<title>Edit Date</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
	</head>
	<body>
        <div class = "wrapper">
		<div class="form-signin">
		<div class="changeDate">
			<h2>Change Date</h2>
			<form method="post">
				<p>Birthdate:
				<br><input type="date" name="dob" placeholder="MM/DD/YYYY" value="<?php if(isset($_POST['dob'])){ echo $_POST['dob'];} ?>"> </p>
				<p> 
				<input type="submit" name="submitbut" value="Change date"></p>
				<p><a href="signuppage.php">Sign Up</a></p>
				<p><a  href="signinpage.php">Log In</a></p>				
				<p><a href="professororstudent.php">Main Page</a></p>
			</form>
		</div>
        </div>
        </div>
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
	</body>
</html>
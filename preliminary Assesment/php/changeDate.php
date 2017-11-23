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
    $password = ($_POST['dob']);
    

        $sql= "UPDATE users SET dob= '".$password."' WHERE id = '".$id."'";
        
        if ($mysqli->query($sql) === TRUE)
        {
            echo 'Birthday was successfully updated! You will be redirected to your profile';
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
            echo 'Birthday can not be changed';
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
				<input type="submit" name="submit" value="Change date"></p>
				<p><a href="signup.php">Sign Up</a></p>
				<p><a  href="login.php">Log In</a></p>				
				
			</form>
		</div>
        </div>
        </div>
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
	</body>
</html>

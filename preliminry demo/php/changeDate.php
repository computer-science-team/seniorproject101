<?php
session_start();
$id = ($_SESSION['id']);
$role = ($_SESSION['role']);

$role2 = "yes";
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
    $password = ($_POST['dob']);
    

        $sql= "UPDATE users SET dob= '".$password."' WHERE id = '".$id."'";
        
        if ($mysqli->query($sql) === TRUE)
        {
            
            
	 if (strcmp($role, $role2) !== 0){
        	include 'popup.php';
			print $dateChangedSuccessfully;
			header("refresh: 2; url = studentProfilePage.php");
			
			}
	 else{
		header("location:facultyProfilePage.php");
		    }
        } 
        else
        {
            include 'popup.php';
			print $changeDateError;
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
				<br><input type="date" name="dob" placeholder="MM/DD/YYYY" value="<?php if(isset($_POST['dob'])){ echo $_POST['dob'];} ?>" required> </p>
				<p> 
				<input type="submit" name="submit" value="Change date"></p>
								
				
			</form>
		</div>
        </div>
        </div>
	</body>
</html>

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
    $email = ($_POST['email']);
    $email2 = ($_POST['email2']);
    
    if ($email == $email2)
    {
        $sql= "UPDATE users SET email= '".$email."' WHERE id = '".$id."'";
        
        if ($mysqli->query($sql) === TRUE)
        {
            
			$role2 = "yes";
            
	 if (strcmp($role, $role2) !== 0){
        	include 'popup.php';
			print $emailChangedSuccessfully;
			header("refresh: 2; url = studentProfilePage.php");
			
			}
	 else{
		header("location:facultyProfilePage.php");
		    }
        } 
        else
        {
           include 'popup.php';
	        print $emailCantChange;
        }
    }
    
    else 
    {
	include 'popup.php';
	print $emailCannotChangeError;
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
                <br><input type="email" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];} ?>" required></p>
				<p>Confirm Email
				<br><input type="email" name="email2" placeholder="Confirm Email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];} ?>" required></p>
				<p> 
				<input type="submit" name="submit" value="Change email"></p>
							
				
			</form>
		</div>
        </div>
        </div>
            
	</body>
</html>


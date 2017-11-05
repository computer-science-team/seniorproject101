<?php
if(isset($_POST['submit'])){ 
session_start();//starts session
$_SESSION['message'] = '';
$servername = "localhost";
$user = "root";
$passwd = "rowanphysicssweng";
$dbname ="accounts";
$university = $_POST['university'];
//var_dump($university);
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
$selectFirstQuery = "SELECT univid FROM universities WHERE name  = '". $university ."'";
$queryResult = $mysqli->query($selectFirstQuery);
//$result = $selectFirstQuery->row();
//echo $reult;
$foundRows = $queryResult->num_rows;
//if row is found email is in use
if($foundRows > 0)
{   
     $_SESSION['university']= $university;
    echo "<br/>Your college has been found.";
    while($row = mysqli_fetch_assoc($queryResult)){
    	//echo $row['univid'];
    	//$univid=$row['univid'];
    	$_SESSION['univid'] = $row['univid'];
    }
    echo "<br/>You will be redirected to the Sign up page.";
    header( "refresh:2; url=signup.php" );
}
else{
    echo "<br/>Your college is not in our database";
    echo "<br/>Please return at a later date to see if your university has been added";
}
}//isset
?>
<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
		<title>Welcome!</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
	</head>
	<body>
        <div class = "wrapper">
		<div class="form-signin">
		<div class="signUpBox">
			<h2>Welcome!</h2>
			<form method="post">
				
				<p>Name of your University: 
				<input type="text" name="university" placeholder="Enter university name here" value="<?php if(isset($_POST['university'])){ echo $_POST['university'];} ?>"/>
				<input type="submit" name="submitbut" value="Submit"></p>
				
				<p>Already have an account?<a href="login.php"> Log In</a></p>
				<p><a href="forgot.php">Forget Password?</a></p>
				
			</form>
		</div>
        </div>
        </div>
	</body>
</html>
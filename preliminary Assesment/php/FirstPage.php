<?php
if(isset($_POST['submit'])){ 
session_start();//starts session
$_SESSION['message'] = '';
$servername = "localhost";
$user = "root";
$passwd = "";
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
$pageStart = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Dialog - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#dialog" ).dialog();
  } );
  </script>
</head>
<body>
 
<div id="dialog" title="Basic dialog">
  <p>The University is found, you will be directed shorlty.</p>
</div>
 
 
</body>
</html>';
print $pageStart;
 
    while($row = mysqli_fetch_assoc($queryResult)){
    	//echo $row['univid'];
    	//$univid=$row['univid'];
    	$_SESSION['univid'] = $row['univid'];
    }
    echo "<br/>You will be redirected to the Sign up page.";
    header( "refresh:2; url=signup.php");
}
else{
     //check if university is already registered
    $selectFirstQuery = "SELECT * FROM universities WHERE name  = '". $university ."'";
    $queryResult = $mysqli->query($selectFirstQuery);
    $foundRows = $queryResult->num_rows;
    //No university found - University is being registered
    if($foundRows == 0)
    {
        $sql = "INSERT INTO universities(name)" . "VALUES ('$university')";
        //echo "The university can be registered.";
        if ($mysqli->query($sql)==true)
        {   //university
            $selectFirstQuery = "SELECT univid FROM universities WHERE name  = '". $university ."'";
            $queryResult = $mysqli->query($selectFirstQuery);
            $foundRows = $queryResult->num_rows;
            //get university id num
            if($foundRows > 0){
                while($row=mysqli_fetch_assoc($queryResult)){
                    $_SESSION['univid'] = $row['univid'];
                } 
            }
        }
    }
$pageStart = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Dialog - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#dialog" ).dialog();
  } );
  </script>
</head>
<body>
 
<div id="dialog" title="Unable to find your university.">
  <p>Your university was not found in our database.. <br>You will be redirected to sign up page shortly.. </p>
</div>
 
 
</body>
</html>';
header( "refresh:30; url=signup.php" );
print $pageStart;
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
				
				<p>Please enter name of your University: </p>
				<input type="text" name="university" placeholder="university" value="<?php if(isset($_POST['university'])){ echo $_POST['university'];} ?>"/>
				<input type="submit" name="submit" value="Submit">
				
				<p>Already have an account? <a href="login.php">Log In</a></p>
				<p><a href="../html/aboutUs.html">About Us!</a></p>
				
			</form>
		</div>
        </div>
        </div>
	</body>
</html>

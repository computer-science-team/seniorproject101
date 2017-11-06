<?php
session_start();
$id = ($_SESSION['id']);
$username = ($_SESSION['username']);
$runiversity= ($_SESSION['university']);
$runivid= ($_SESSION['univid']);
//var_dump($_SESSION['university']);
$servername = "localhost";
$username = "root";
$password = "Liger124!";
$dbname = "accounts";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT id, name, gender, email, username, dob FROM users WHERE id = $id";?>

<!DOCTYPE html>
<!-- Author: Krunal Patel -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FacultyProfilePage</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    
  </head>
  <body class = "indexpage">
    <nav class="navbar navbar-inverse navbar-static-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Faculty Profile Page</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile<span class="caret"></span></a>
				<ul class="dropdown-menu">
				   <li><a href="changepassword.php">Change Password</a></li>
				  <li><a href="changeName.php">Change Name</a></li>
                  <li><a href="changeEmail.php">Change Email</a></li>
                  <li><a href="changeGender.php">Change Gender</a></li>
                  <li><a href="changeDate.php">Change Date</a></li>
				</ul>
			  </li>
				
                <li><a href="../index.html">Logout</a></li>
			</ul>
		</div>
	</div>
</nav>
      
<div class="jumbotron">
  <div class="container">
    <h1 class="headline">Welcome.</h1>
      <!-- in here php code will bring up the details about faculty user like --> 
      <?php
       $result = $conn->query($sql);
    
    // output data of each row
    $row = $result->fetch_assoc();
    echo "ID:" .$row["id"];
    echo"<br>Name:" .$row["name"];
    echo"<br>Gender:" .$row["gender"];
    echo"<br>Email:" .$row["email"]; 
    echo"<br>UserName:".$row["username"];
    echo"<br>Birthdate:".$row["dob"]."(yyyy/mm/dd)";
    
    echo "</table>";
     $conn->close();
      ?>
    
    <br>
    
  </div>
</div>

<section class="call-to-action">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
          <a href="#"><span class="glyphicon glyphicon-road glyphicon-large" aria-hidden="true"></span></a>
        <h3>GuideLine of success</h3>
        <p>Our site will give you easy and quick guide of success in your university for CS. </p>
      </div>
      <div class="col-md-4">
        <a href="#"><span class="glyphicon glyphicon-floppy-disk glyphicon-large" aria-hidden="true"></span></a>
        <h3>List of clubs</h3>
        <p>Site will introduce you to all the club which are avilible to CS major students</p>
      </div>
      <div class="col-md-4">
        <a href="#"><span class="glyphicon glyphicon-console glyphicon-large" aria-hidden="true"></span></a>
        <h3>List Of IDES</h3>
        <p>Site will will give you a way to know about the Most used IDEs by your intructor for perticular language </p>
      </div>
    </div>
  </div>
</section>
    <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        
  </body>
</html>

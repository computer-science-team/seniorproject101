<?php
session_start();
$id = ($_SESSION['id']);
$username = ($_SESSION['username']);
$runiversity= ($_SESSION['university']);//
$runivid= ($_SESSION['univid']);
//var_dump($_SESSION['university']);
//$_SESSION['fid']=$fid;
$_SESSION['id']=$id;
$_SESSION['username']=$username;
$_SESSION['runivid'] = $runivid;
//$_SESSION['university']=$university;
//$_SESSION['faculty']=$faculty;
$_SESSION['runiversity']=$runiversity;
include 'config.php';
//Prints Guidelines for success is unavailable for download if no file is present
if (!empty($_SESSION['message'])) {
//echo '<p class="message"> '.$_SESSION['message'].'</p>';
    //unset($_SESSION['message']);
	$PageSrt='<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Example of Auto Loading Bootstrap Modal on Page Load</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").modal("show");
	});
</script>
</head>
<body>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
            </div>
            <div class="modal-body">
				
                <p>No document is available for download at this time.</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html> ';
print  $PageSrt;
unset($_SESSION['message']);
//$_SESSION['message']===NULL;
}             
// Create connection
$conn = new mysqli($servername, $user, $passwd, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT id, name, gender, email, username, dob FROM users WHERE id = $id";?>
<!DOCTYPE html>
<!-- Author:Dharmik Pandya and Krunal Patel -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StudentProfilePage</title>
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
			<a class="navbar-brand" href="#">Student Profile Page</a>
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
      <div class= "studentPpage">
    <h1 class="headline">Welcome!!!.</h1>
      
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
</div>

<section class="call-to-action">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
          <a href="universitydownload.php"><?php $_SESSION['$runiversity']=$runiversity; ?><span class="glyphicon glyphicon-road glyphicon-large" aria-hidden="true"></span></a>
        <h3>GuideLine of success</h3>
        <p>Our site will give you easy and quick guide of success in your university for CS. </p>
      </div>
      <div class="col-md-4">
        <a href="universitydownload2.php"><span class="glyphicon glyphicon-floppy-disk glyphicon-large" aria-hidden="true"></span></a>
        <h3>List of clubs</h3>
        <p>Site will introduce you to all the club which are avilible to CS major students</p>
      </div>
      <div class="col-md-4">
        <a href="lastpage.php"><span class="glyphicon glyphicon-console glyphicon-large" aria-hidden="true"></span></a>
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

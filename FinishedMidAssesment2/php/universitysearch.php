<?php
session_start();//starts session
//$univid=$_SESSION['univid'];
//$university=$_SESSION['university'];
//$university = "Rowan University";
//$univid= "1";
$id=$_SESSION['id'];
$username=$_SESSION['username'];
$runiversiy=$_SESSION['runiversity'];
$runivid = $_SESSION['runivid'];
$servername = "localhost";
$user = "root";
$passwd = "";
$dbname ="accounts";
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['view'])){
    $_SESSION['univid']=$_POST['view'];
    $_SESSION['id']=$id;
    $_SESSION['username']=$username;
    $_SESSION['university']=$university;
    $_SESSION['runiversity']=$runiversity;
    $_SESSION['runivid']=$runivid;
    //$_SESSION['fid']=$_POST['view'];//facultyid
    $_SESSION['id']=$id;//student
    if ($mysqli == true){
        $selectFirstQuery = "SELECT name FROM universities WHERE univid  = '". $_POST['view'] ."'";
        $queryResult = $mysqli->query($selectFirstQuery);
        while($row=mysqli_fetch_assoc($queryResult)){
          $university =$row['name'];
        }
    }
    $_SESSION['university']=$university;
   // $_SESSION['faculty']=$_POST{$row['name']};//var not set
    //$var=$_POST['view'];
   // echo $_SESSION['faculty'];
    header("location: universityTools.php");
}//isset 
?>
   
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UniversitySearchpage</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    
</head>
    <body>
    <nav class="navbar navbar-inverse navbar-static-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Faculty Search</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
                
                <li><a href="../index.html">Logout</a></li>
			</ul>
		</div>
	</div>
</nav>
    <div class="jumbotron">
    <div class="container">
	<form method="post" class="universitySearchPage">
	<?php 
    if ($mysqli == true){
        $selectFirstQuery = "SELECT * FROM universities";
        $queryResult = $mysqli->query($selectFirstQuery);
        $foundRows = $queryResult->num_rows;
    if($foundRows > 0){
        echo "<table border='3'>";
        echo "<br/>Here are all the Universities:";
        echo "<br/><tr><td>University Name</td><td>View Tools</td><rr>";
        while($row=mysqli_fetch_assoc($queryResult)){
            
            
            echo "<tr><td>{$row['name']}</td><td><input type='submit' name='view' value = '{$row['univid']}'</td>";
            
           
        }//while      
    }//foundrows
    else{
        echo "no University found";
    }
  
    }
    ?>
    </form>
    </div>
    </div>
    </body>
				
	
</html>

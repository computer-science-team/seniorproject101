<?php
session_start();//starts session
$runivid=$_SESSION['univid'];
$runiversity=$_SESSION['university'];

$university=$_SESSION['university'];
//$university = "Rowan University";
//$univid= "1";
$id=$_SESSION['id'];
$username=$_SESSION['username'];
$servername = "localhost";
$user = "root";
$passwd = "kkp123";
$dbname ="accounts";
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['view'])){
    //$_SESSION['univid']=$univid;
    //$_SESSION['university']=$university;
    $_SESSION['fid']=$_POST['view'];//facultyid
    $_SESSION['id']=$id;//student
    $_SESSION['runivid']=$runivid;
    $_SESSION['runiversity']=$runiversity;
    if ($mysqli == true){
        $selectFirstQuery = "SELECT name FROM users WHERE id  = '". $_POST['view'] ."'";
        $queryResult = $mysqli->query($selectFirstQuery);
        while($row=mysqli_fetch_assoc($queryResult)){
          $faculty =$row['name'];
        }
    }
    $_SESSION['faculty']=$faculty;
   // $_SESSION['faculty']=$_POST{$row['name']};//var not set
    //$var=$_POST['view'];
   // echo $_SESSION['faculty'];
    header("location: facultyTools.php");
}//isset 
?>
   
<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FacultySearchPage</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    
  </head>
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
	<form method="post" class="facultySearchPage">
        <table class="table table-bordered">
	<?php 
    if ($mysqli == true){
        $selectFirstQuery = "SELECT * FROM users WHERE univid  = '". $runivid ."' AND faculty = 'yes'";
        $queryResult = $mysqli->query($selectFirstQuery);
        $foundRows = $queryResult->num_rows;
    if($foundRows > 0){
        echo "<table border='1'  id='table'>";
        echo "<br/>Here are faculty from ".$university. ":";
        echo "<tr><td>Faculty Name</td><td>View Tools</td><rr>";
        while($row=mysqli_fetch_assoc($queryResult)){
            
            
            echo "<tr><td>{$row['name']}</td><td><input type='submit' name='view' value = '{$row['id']}'</td>";
            
           
        }//while      
    }//foundrows
    else{
        echo "no faculty found";
    }
  
    }//put variables last page link
    ?>
        </table>
        
    </form>
    </div>
    </div>
    
		
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
	
</html>

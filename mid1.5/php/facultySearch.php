<?php
session_start();//starts session
$runivid=$_SESSION['runivid'];
$runiversity=$_SESSION['runiversity'];
//$university = "Rowan University";
//$univid= "1";
$id=$_SESSION['id'];
$username=$_SESSION['username'];
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
    $_SESSION['univid']=$univid;
    $_SESSION['university']=$university;
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
     <title>Bootstrap Example</title>
  		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	</head>
	<form method="post">
	<?php 
    if ($mysqli == true){
        $selectFirstQuery = "SELECT * FROM users WHERE univid  = '". $runivid ."' AND faculty = 'yes'";
        $queryResult = $mysqli->query($selectFirstQuery);
        $foundRows = $queryResult->num_rows;
    if($foundRows > 0){
        echo "<table border='1'>";
        echo "<br/>Here are faculty from ".$runiversity. ":";
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
    </form>
    
		<p><a  href="main.php" class="btn btn-danger btn-xs" role= "button" style="position: absolute; left: 0%; right:90%; bottom: 5%;">Log Out</a>		
		<p><a  href="recommendeduniversity.php" class="btn btn-default btn-xs" role= "button" style="position: absolute; left: 0%; right:90%; bottom: 9%;">University Recommended</a>		
	
</html>

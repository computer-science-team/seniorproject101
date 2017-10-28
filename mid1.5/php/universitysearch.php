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
        $selectFirstQuery = "SELECT * FROM universities";
        $queryResult = $mysqli->query($selectFirstQuery);
        $foundRows = $queryResult->num_rows;
    if($foundRows > 0){
        echo "<table border='1'>";
        echo "<br/>Here are all the Universities:";
        echo "<tr><td>University Name</td><td>View Tools</td><rr>";
        while($row=mysqli_fetch_assoc($queryResult)){
            
            
            echo "<tr><td>{$row['name']}</td><td><input type='submit' name='view' value = '{$row['univid']}'</td>";
            
           
        }//while      
    }//foundrows
    else{
        echo "no faculty found";
    }
  
    }
    ?>
    </form>
    
		<p><a  href="main.php" class="btn btn-danger btn-xs" role= "button" style="position: absolute; left: 0%; right:90%; bottom: 5%;">Log Out</a>		
		<p><a  href="recommendeduniversity.php" class="btn btn-default btn-xs" role= "button" style="position: absolute; left: 0%; right:90%; bottom: 9%;">University Recommended</a>		
	
</html>

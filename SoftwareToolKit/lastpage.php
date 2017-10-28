<?php 
session_start();

$username = ($_SESSION['username']);
$university= ( $_SESSION['university']);
$univid= ($_SESSION['univid']);
//var_dump($_SESSION['university']);
//echo $username;
$servername = "localhost";
$user = "root";
$passwd = "rowanphysicssweng";
$dbname ="accounts";
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    //echo "Connected successfully";
}
$selectFirstQuery = "SELECT * FROM tools WHERE idnums  = '". $univid ."'";
$queryResult = $mysqli->query($selectFirstQuery);
$foundRows = $queryResult->num_rows;
//if row is found email is in use
if($foundRows > 0)
{
    echo "<table border='1'>";
    echo "<br/>Here are the tools associated with "  .$university. ":";
    echo "<tr><td>Name</td><td>Category</td><td>Url</td><td>Button</td><rr>";
    while($row=mysqli_fetch_assoc($queryResult)){
        echo "<tr><td>{$row['toolname']}</td><td>{$row['category']}</td><td>{$row['url']}</td><td><input type='submit' value = 'Add'></td>";
        
    }    
 }
    

?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8"> 
     <title> Welcome Page </title>
     
</head>

    
      <h1> Welcome <?php echo $username;?> !! Hope you are having a good day.</h1>
	  
	  <body>
		<div class="loginBox">
		<p> </p>
		<p><a  href="FirstPage.php">Log Out</a></p>	
					
			
			
		</div>
	</body>
    
</html>

<?php 
$servername = "localhost";
$user = "root";
$passwd = "";
$dbname ="accounts";

$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
//echo 'connected';
}
if(isset($_POST['signin']))
{
  // echo 'Everything good!';//test
   $username= $_POST['username'];
   $password=md5($_POST['password']);
    $sql = "SELECT  * FROM users2 WHERE username  = '". $username ."' AND password = '".$password."'";
    
    //$result = mysqli_result object
    
    
    $result = $mysqli->query( $sql ); 
    $foundRows = $result->num_rows;
    
    
    if ($foundRows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> Welcome ". $row["username"].  "<br>";
    }//while
    
 }  //if $result 
 
    else {
    //echo "0 results";
    echo 'Please register or enter the correct username and password';
    
    }
 }
 
    
 ?>
 
 <!doctype html>
<html>
	<body>
		<div class="signInBox">
			<h2>Sign In!</h2>
			<form method="post">
				<p>Username</p>
				<input type="text" name="username" placeholder="username">
				<p>Password: </p>
				<input type="Password" name="password" placeholder="*********">
				<input type="submit" name="signin" value="Sign In">
				<p><a href="#">Forget Password?</a></p>
			</form>
		</div>
	</body>
</html>
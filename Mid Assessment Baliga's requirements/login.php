<?php 
session_start();
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
    $sql = "SELECT  * FROM users WHERE username  = '". $username ."' AND password = '".$password."'";
    
    //$result = mysqli_result object
    
    
    $result = $mysqli->query( $sql ); 
    $foundRows = $result->num_rows;
    
    
    if ($foundRows > 0) {
    // output data of each row
   
        $sql = "SELECT  univid, name FROM users WHERE username  = '". $username ."'"; 
        while($row = mysqli_fetch_assoc($result)){
           // echo $row['univid'];
            $univid=$row['univid'];
            $_SESSION['univid'] = $row['univid'];
            
            $_SESSION['username'] = $username;
            
        }
        $sql = "SELECT  name FROM universities WHERE univid  = '". $univid ."'"; 
        $result = $mysqli->query( $sql );
        $foundRows = $result->num_rows;
        if($foundRows > 0){
            while($row = mysqli_fetch_assoc($result)){
            $university = $row['name'];
            }
        }
        //Display user toolkit
        $selectFirstQuery = "SELECT id,faculty FROM users WHERE username  = '". $username ."'";
        $queryResult = $mysqli->query($selectFirstQuery);
        $foundRows = $queryResult->num_rows;
        if($foundRows > 0)
        {
            echo 'id found';
            while($row=mysqli_fetch_assoc($queryResult)){
                $id=$row['id'];
                $role=$row['role'];
            }
        $_SESSION['role']=$role;
        $_SESSION['id']=$id;
        $_SESSION['username']=$username;
        $_SESSION['university']= $university;
        
        header("location:recommendeduniversity.php");
        
        }
        else
        {
            echo "There's an issue";
        }
    //while
    
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
				<p> </p>
				<input type="submit" name="signin" value="Log In">
				<p><a href="forgot.php">Forget Password?</a></p>
				<p><a  href="main.php">Main Page</a></p>
				
			</form>
		</div>
	</body>
</html>
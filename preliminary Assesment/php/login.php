<?php 
session_start();
$servername = "localhost";
$user = "root";
$passwd = "kkp123";
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
                $role=$row['faculty'];
            }
        $_SESSION['role']=$role;
        $_SESSION['id']=$id;
        $_SESSION['username']=$username;
        $_SESSION['university']= $university;
        $role2 = "yes";
            
            if (strcmp($role, $role2) !== 0){
        		header("location:studentProfilePage.php");
			
			}
		else{
		header("location:facultyProfilePage.php");
		    }
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
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
	</head>

	<body class="loginpage">
		<div class="signInBox">
			<div class="wrapper">
			
			<form method="post" class="form-signin">
                <h2 class="form-signin-heading">Please login</h2>

				<p><input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" /></p>
              			<p><input type="password" class="form-control" name="password" placeholder="Password" required=""/></p>     
				<input type="submit" name="signin" value="Log In">
				<p><a href="forgot.php">Forget Password?</a></p>
				
				
			</form>
		</div>
		</div>
	    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	</body>
</html>

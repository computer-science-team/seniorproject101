<!doctype html>
<html lang="en">
  <head>

<!------------------------------------------------------->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
	$(document).ready(function(){
	$('#userForm').submit(function(){
     
	var Username = $("#username").val();
	var Password = $("#password").val();

        $.post('login_receiver.php', { username: Username, password: Password}, function(data){
	    if (data == 0) {
		//alert(data);
		location.reload();
        }
        }).fail(function() {
         
            // just in case posting your form failed
            alert( "Posting failed." );
             
        });
 	
        // to prevent refreshing the whole page page
        return false;
 
    });
});
</script>
<!------------------------------------------------------->

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
			
			<form id='userForm' class="form-signin">
                <h2 class="form-signin-heading">Please login</h2>
		
				<p><input type="text" name="username" id="username" placeholder="Username" required/></p>
              			<p><input type="password" name="password" id="password" placeholder="Password" required/></p>     
				<input type='submit' value='Submit' />
				<p><a href="forgot.php"> Forgot Password? </a> </p>
				<p>Don't have an account? <br> <a href="FirstPage.php">Sign Up!</a>
				
				
			</form>
		</div>
		</div>

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
function ifsessionExists(){
    //check if session exists?
    if (isset($_SESSION['count'])){
    return true;
    }
    else
    {
    return false;
    }
}
 
if(ifsessionExists())
{
    $count = '1';
    if($_SESSION['count'] == $count)
{
$_SESSION['count'] = '0';
  // echo 'Everything good!';//test
   $username= $_SESSION['username'];
   $password=md5($_SESSION['password']);
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
            //echo 'id found';
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
		header( "refresh:2; url = studentProfilePage.php");

			}
		else{
		header( "refresh:2; url = facultyProfilePage.php");
		    }
        }
    
 }  //if $result 
else {
    //echo "0 results";
    //echo 'Please register or enter the correct username and password';
    include 'popup.php';
	print $loginerror;
    }

 }
}
 
    
 ?>
	</body>
</html>

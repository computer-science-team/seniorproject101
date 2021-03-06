<!doctype html>
<!--This page allows users to change their password if they forgot password or unable to log in for some reason. -->
<html lang="en">
  <head>

<!------------------------------------------------------->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	//Java Script
	$(document).ready(function(){
	$('#userForm').submit(function(){
     
	var Name = $("#name").val();
	var Dob = $("#dob").val();
	var Username = $("#username").val();
	
	if(Name && Dob && Username)
{
        $.post('forgot_receiver.php', { name: Name,  dob : Dob, username : Username}, function(data){
	if (data == 0) {
	//alert( data );
	location.reload();
        }
        }).fail(function() {
         
            // just in case posting your form failed
            alert( "Posting failed." );
             
        });
}
else
{
	 alert( "value is empty");
}
 	
        // to prevent refreshing the whole page page
        return false;
 
    });
});
</script>
<!------------------------------------------------------->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Change Password</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
	</head>
	<body>
		<!--Password form for user to put in their new password-->
        <div class = "wrapper">
		<div class="form-signin">
		<div class="passwordRecovery">
			<h2>Password Recovery!</h2>
			<form id='userForm'>
                <p><strong>Username:</strong>
				<br><input type="text" name="username" id="username" placeholder="Username" required/></p>
                <p><strong>Fullname:</strong> 
				<br><input type="text" name="name" id="name" placeholder="Name" required/></p>
                <p><strong>Birthdate:</strong>
				<br><input type="date" name="dob" id="dob" placeholder="MM/DD/YYYY" required/></p>
				<p> 
				<input type='submit' value='submit' class="button"/></p>
				
				<p><a  href="login.php">LogIn</a></p>				
				
			</form>
		</div>
        </div>
        </div>
<?php
//PHP session to validate users change. 
session_start();//starts session
$_SESSION['message'] = '';
include 'config.php';
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
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
    $username = $_SESSION['username'];
    $fullname = $_SESSION['fullname'];
    $dob = $_SESSION['dob'];
    
    $sql = "SELECT  * FROM users WHERE username  = '". $username ."' AND dob = '".$dob."' AND name ='".$fullname."'";
    $result = $mysqli->query( $sql );
    $foundRows = $result->num_rows;
    
    
    if ($foundRows > 0) 
    {
         $_SESSION['username'] = $username;
        
        
         header("location: changepassword.php");
    }
    else 
    {
        include 'popup.php';
        print $infoIsNotRightF;
    }
    
}
}
?>
    
	</body>
</html>

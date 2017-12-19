<!doctype html>
<html lang="en">
  <head>

<!------------------------------------------------------->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

	$(document).ready(function(){
	$('#userForm').submit(function(){
     
	var Password = $("#password").val();
	var Password2 = $("#password2").val();
	
	if(Password && Password2)
{

        $.post('changepassword_receiver.php', {password: Password,  password2 : Password2}, function(data){
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
	<!--Creating form to change password for user-->
        <div class = "wrapper">
		<div class="form-signin">
		<div class="changePassword">
			<h2>Change Password</h2>
			<form id='userForm'>
                <p><strong> New Password: </strong>
				<br><input type="password" name="password" id="password" placeholder="*********" class="form-control form-rounded" required/></p>
                <p><strong>Confirm Password: </strong>
				<br><input type="password" name="password" id="password2" placeholder="*********" class="form-control form-rounded" required/></p>
				<p>
				<input type='submit' value='Submit' class="button" /></p>			
				
			</form>
		</div>
        </div>
        </div>
<?php
		//PHHP code to validate that change in Database. 
session_start();//starts session
$_SESSION['message'] = '';

$username = $_SESSION['username'];
include 'config.php';
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
    // Check connection        
if ($mysqli->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
// Check connection
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

    //echo "Good";
    //$username=$_POST['username'];
    $password = md5($_SESSION['password']);
    $password2 = md5($_SESSION['password2']);
    
    if ($password==$password2)
    {
        $sql= "UPDATE users SET password= '".$password."' WHERE username = '".$username."'";
        
        if ($mysqli->query($sql) === TRUE)
        {
            include 'popup.php';
			print $passwordSuccessfullyChanged;
            //header("location: signinpage.php");
            header( "refresh:2; url=login.php" );
        } 
        else
        {
			include 'popup.php';
			print $passwordDoNotMatch;
        }
    }
    
    else 
    {
    include 'popup.php';
	print $passwordCannotChange;
    }
}
}

?>
	</body>
</html>

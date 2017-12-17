<!doctype html>
<html lang="en">
  <head>

<!------------------------------------------------------->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
	$(document).ready(function(){
	$('#userForm').submit(function(){
     
	var Role = $("#roles").val();
	
if(Role)
{
	role2 = "yes";
	var urlNext = "";
	  if(Role == role2)
	{
		urlNext = "addUniversity.php";
	}
	 else
	{
		urlNext = "FirstPage.php";
	}

        $.post('authorization_receiver.php', { role : Role}, function(data){
	    if (data == 0) {
		//alert(data);
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
		<title>Login</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
	</head>

	<body class="loginpage">
		<div class="signInBox">
			<div class="wrapper">
			
			<form id='userForm' class="form-signin">
                <h2 class="form-signin-heading">Please reply appropriately </h2>
		
				
              			<p>Are you Faculty?:
				<select id="roles" name="role" required>
				<option value="no">No</option>
  				<option value="yes">Yes</option>
				</select>    
                <p><input type='submit' value='Submit'class="button" /></p>
				<p><a href="forgot.php"> Forgot Password? </a> </p>
                
				
				
			</form>
		</div>
		</div>
        
<?php
session_start();
include 'popup.php';
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

$role = $_SESSION['role'];

include 'config.php';
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    //the code below should work yousuf but for some reason it is not i think you can figur out what i am trying to do here
    
		//$role2 = "yes";
            
            //if (strcmp($role, $role2) !== 0){
			//header( "refresh:2; url=FirstPage.php");
			//       print $universit;yCantBeAdded
          //  }
		//else{
		//header( "refresh:2; url=addUniversity.php");
             //print $welcomeAddUni;
		   // }
        
}
}


?>
<!-- PHP code ends here -->         
        
        
        
</body>
</html>
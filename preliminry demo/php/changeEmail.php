<?php
session_start();
$role = ($_SESSION['role']);
$role2 = "yes";
$go = "";            
            if (strcmp($role, $role2) !== 0){
        		$go = "studentProfilePage.php";
			
			}
		else{
		$go ="facultyProfilePage.php";
		    }
?>
<!doctype html>
<html lang="en">
  <head>

<!------------------------------------------------------->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

	$(document).ready(function(){
	$('#userForm').submit(function(){
     
	var Email = $("#email").val();
	var Email2 = $("#email2").val();
	
	if(Email && Email2)
{

        $.post('changeEmail_receiver.php', {email: Email,  email2 : Email2}, function(data){
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
		<title>Edit Email</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
	</head>
	<body>
        <div class = "wrapper">
		<div class="form-signin">
		<div class="changeEmail">
			<h2>Change Email</h2>
			<form id='userForm'>
                <p><strong>New Email:</strong>
                		<br><input type="email" name="email" id="email" class="form-control form-rounded" placeholder="Email" required/></p>
                <p><strong>Confirm Email:</strong>
				<br><input type="email" name="email" id="email2" class="form-control form-rounded"placeholder="Confirm Email" required/></p>
				<p> 
				<input type='submit' value='submit' class="button" /></p>
						
				
			</form>
		</div>
        </div>
        </div>
<?php
$id = ($_SESSION['id']);
$role = ($_SESSION['role']);
include 'config.php';
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
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
if ($mysqli->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
    //echo "Good";
    //$username=$_POST['username'];
    $email = ($_SESSION['email']);
    $email2 = ($_SESSION['email2']);
    
    if ($email == $email2)
    {

    $selectFirstQuery = "SELECT * FROM users WHERE email  = '". $email ."'";
    $queryResult = $mysqli->query($selectFirstQuery);
    $foundRows = $queryResult->num_rows;
    //if row is found email is in use

            if($foundRows > 0)
    {
	include 'popup.php';
	print $signupEmailAlreadyExist;
       //duplicate emails needs to be unique
		//print $signupEmailAlreadyExist;
    }
    else{
        $sql= "UPDATE users SET email= '".$email."' WHERE id = '".$id."'";
        
        if ($mysqli->query($sql) === TRUE)
        {
			$role2 = "yes";
            
	 if (strcmp($role, $role2) !== 0){
        	include 'popup.php';
			print $emailChangedSuccessfully;
			header("refresh: 2; url = studentProfilePage.php");
			
			}
	 else{
		header("location:facultyProfilePage.php");
		    }
        } 
    }
    

}
    else 
    {
	include 'popup.php';
	print $emailCannotChangeError;
    }
}
}

?>
	</body>
</html>

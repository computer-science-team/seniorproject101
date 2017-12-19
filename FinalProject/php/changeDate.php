<?php
// Used Php to validate/change date of user from database. 
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
     
	var Dob = $("#dob").val();
	
	if(Dob)
{

        $.post('changeDate_receiver.php', {dob: Dob}, function(data){
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
		<title>Edit Date</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
	</head>
	<body>
	<!--Form for HTML starts from here. -->
        <div class = "wrapper">
		<div class="form-signin">
		<div class="changeDate">
			<h2>Change Date</h2>
			<form id='userForm'>
                <p><strong>Birthdate:</strong>
				<br><input type="date" name="dob" id="dob" class="form-control form-rounded" placeholder="MM/DD/YYYY" required/></p>
				<p> 
				<input type='submit' value='submit' class="button"/></p>
				
								
				
			</form>
		</div>
        </div>
        </div>

<?php
//PHP code to validate users input. 
$id = ($_SESSION['id']);
$role = ($_SESSION['role']);

$role2 = "yes";
include 'config.php';
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
    // Check connection                      
if ($mysqli->connect_error) 
{
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

    $password = ($_SESSION['dob']);
    

        $sql= "UPDATE users SET dob= '".$password."' WHERE id = '".$id."'";
        
        if ($mysqli->query($sql) === TRUE)
        {
            
            
	 if (strcmp($role, $role2) !== 0){
        	include 'popup.php';
			print $dateChangedSuccessfully;
			header("refresh: 2; url = studentProfilePage.php");
			
			}
	 else{
		header("location:facultyProfilePage.php");
		    }
        } 
        else
        {
            include 'popup.php';
			print $changeDateError;
        }
 
}
}//if isset
?>

	</body>
</html>

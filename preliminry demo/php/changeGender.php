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
     
	var Gender = $("#genders").val();
	
	if(Gender)
{

        $.post('changeGender_receiver.php', {gender: Gender}, function(data){
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
		<title>Edit Gender</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
	</head>
	<body>
        <div class = "wrapper">
		<div class="form-signin">
		<div class="changeGender">
			<h2>Change Gender</h2>
			<form id='userForm'>
			<p>Gender:</p>
				<p>
				<select id="genders" name="gender">
  				<option value="Male">Male</option>
  				<option value="Female">Female</option>
  				<option value="Other">Other</option>
				</select>
				</p>
			<input type='submit' value='Change Gender' />
			<p><a href= "<?php echo $go ?>" >Profile</a></p>
							
				
			</form>
		</div>
        </div>
        </div>
<?php
$id = ($_SESSION['id']);
$role = ($_SESSION['role']);
$servername = "localhost";
$user = "root";
$passwd = "";
$dbname ="accounts";
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
    $password = $_SESSION['gender'];
    
	 $sql= "UPDATE users SET gender= '".$password."' WHERE id = '".$id."'";
        
        if ($mysqli->query($sql) === TRUE)
        {
				
            	$role2 = "yes";
            
            if (strcmp($role, $role2) !== 0){
        		include 'popup.php';
				print $genderChangeSuccessfully;
				header("refresh: 2; url = studentProfilePage.php");
			
			}
		else{
		header("location:facultyProfilePage.php");
		    }
        } 
        else
        {
            include 'popup.php';
			print $genderChangeError;
        }
}
}//if isset
?>
	</body>
</html>

<?php
//Starting session with session token 
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
     
	var Name = $("#name").val();
	var Name2 = $("#name2").val();
	
	if(Name && Name2)
{

        $.post('changeName_receiver.php', {name: Name,  name2 : Name2}, function(data){
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
		<title>Edit Name</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
	</head>
	<body>
	<!--Creating form for users to change Name. -->
        <div class = "wrapper">
		<div class="form-signin">
		<div class="changeName">
			<h2>Change Name</h2>
			<form id='userForm'>
                <p> <strong>New Name:</strong>
				<br><input type="text" name="name" id="name" placeholder="New Name" class="form-control form-rounded" required/></p>
                <p><strong>Confirm Name:</strong>
				<br><input type="text" name="name" id="name2" placeholder="Confirm Name" class="form-control form-rounded" required/></p>
				<p>
				<input type='submit' value='submit' class="button" /></p>			
				
			</form>
							
				
			
		</div>
        </div>
        </div>
<?php
		//PHP code to validate that change in Database. 
$id = ($_SESSION['id']);
$role = ($_SESSION['role']);
include 'config.php';
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
    // Check connection                      
$role2 = "yes";
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
    //echo "Good";
    //$username=$_POST['username'];
    $name = ($_SESSION['name']);
    $name2 = ($_SESSION['name2']);
    
    if ($name==$name2)
    {
        $sql= "UPDATE users SET name= '".$name."' WHERE id = '".$id."'";
        
        if ($mysqli->query($sql) === TRUE)
        {
            include 'popup.php';
			print $namesMatched;
            header( "refresh:3; url=studentProfilePage.php" );
            
			
            if (strcmp($role, $role2) !== 0){
        		header("url:studentProfilePage.php");
			
			}
		else{
		header("location:facultyProfilePage.php");
		    }
            
        }
    }
    
    else 
    {
	include 'popup.php';
    print $namesDoNotMatch;
    
    }
}
}//if isset
?>
	</body>
</html>

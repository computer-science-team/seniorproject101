<!-- PHP code which will connect to database and that way a user can sign up -->
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

$fullname = $_SESSION['fullname'];
$dob = $_SESSION['dob'];
$gender = $_SESSION['gender'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$role = $_SESSION['role'];
$univid=$_SESSION['univid'];
$university=$_SESSION['university'];

$servername = "localhost";
$user = "root";
$passwd = "Liger124!";
$dbname ="accounts";
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    //Check if email is in use
    
    $selectFirstQuery = "SELECT * FROM users WHERE email  = '". $email ."'";
    $queryResult = $mysqli->query($selectFirstQuery);
    $foundRows = $queryResult->num_rows;
    //if row is found email is in use
    if($foundRows > 0)
    {
	print $signupEmailAlreadyExist;
       //duplicate emails needs to be unique
		//print $signupEmailAlreadyExist;
    }
    else
	{
    //Check to see if username is in use
    $selectFirstQuery = "SELECT * FROM users WHERE username  = '". $username ."'";
    $queryResult = $mysqli->query($selectFirstQuery);
    $foundRows = $queryResult->num_rows;
    if($foundRows > 0)
    {
	print $signupUserAlreadyExist;
        //duplicate users in database needs to be unique
		//
    }
    else
{
    //Insert info into table-user not in use
    $sql = "INSERT INTO users(name, dob, gender, username, email, password, faculty, univid)"
        . "VALUES ('$fullname','$dob', '$gender','$username','$email','$password','$role','$univid')";
        if ($mysqli->query($sql)==true)
        {
	    $selectFirstQuery = "SELECT id FROM users WHERE username  = '". $username ."'";
            $queryResult = $mysqli->query($selectFirstQuery);
            $foundRows = $queryResult->num_rows;
            if($foundRows > 0)
            {
                
                while($row=mysqli_fetch_assoc($queryResult)){
                    $id=$row['id'];
                }
            }
            $_SESSION['id']=$id;
            $_SESSION['username']=$username;
            $_SESSION['univid']=$univid;
            $_SESSION['univeristy']=$university;
		$role2 = "yes";
            
            if (strcmp($role, $role2) !== 0){
			header( "refresh:2; url=studentProfilePage.php");
			
			}
		else{
		header( "refresh:2; url=facultyProfilePage.php");
		    }
        }
}
}


}
}

?>
<!-- PHP code ends here -->   
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
	var Gender = $("#genders").val();
	var Dob = $("#dob").val();
	var Email = $("#email").val();
	var Username = $("#username").val();
	var Password = $("#password").val();
	var Role = $("#roles").val();
	
	if(Name && Gender && Dob && Email && Username && Password && Role )
{

	role2 = "yes";
	var urlNext = "";

	  if(Role == role2)
	{
		urlNext = "facultyProfilePage.php";
	}
	 else
	{
		urlNext = "studentProfilePage.php";
	}

	
        $.post('signup_receiver.php', { name: Name, gender: Gender,  dob : Dob, email : Email, username : Username, password : Password, role : Role}, function(data){

	if (data == 0) {
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
		<title>SignUp!</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
	</head>
	<body class = "singinpage">
	<!-- Page menu starts here -->

	<div id='response'></div>

		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
			<div class="navbar-header">
			<!-- navbar-brand can come in handy to switch ToolKit with desired UniversityToolKit-->
			  
			</div>
			<ul class="nav navbar-nav">
			  <li class="active"><a href="../index.html">Home</a></li>
			</ul>
		  </div>
		</nav>	
		<!-- Page menu ends here -->
        <div class = "wrapper">
		<div class="form-signin">
			<h2 class="form-signin-heading">Sign Up!</h2>
			<form id='userForm'>
				<p>Name:
				<br><input type="text" name="name" id="name" placeholder="Name" required/></p>
				<p>Gender:

				<select id="genders" name="gender">
  				<option value="Male">Male</option>
  				<option value="Female">Female</option>
  				<option value="Other">Other</option>
				</select>

				<p>Birthdate: 
				<br><input type="date" name="dob" id="dob" placeholder="MM/DD/YYYY" required/></p>
				<p>Email: 
				<br><input type="email" name="email" id="email" placeholder="Email" required/></p>
				<p>Username: 
				<br><input type="text" name="username" id="username" placeholder="Username" required/></p>
				<p>Password: 
				<br><input type="password" name="password" id="password" placeholder="*********" required/></p>
                		<p>Faculty:
				<select id="roles" name="role">
				<option value="no">No</option>
  				<option value="yes">Yes</option>
				</select>



				
                <p><input type='submit' value='Submit' /></p> 
				<p>Already have an account? <br> <a href="login.php"> Log In</a></p>
				<p><a href="FirstPage.php">Go Back</a></p>
			   
            </form>
		</div>
        </div>         
	</body>
</html>

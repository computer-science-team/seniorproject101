<!-- PHP code which will connect to database and that way a user can sign up -->
<?php
include 'popup.php';

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

	if (data == 1) {
	window.location.href = urlNext;
        }
	   else if(data == 2){
	    var popup = <?php echo json_encode($signupUserAlreadyExist); ?>;
            $('#response').html(popup);
	}
	else if(data == 3){
	    var popup = <?php echo json_encode($signupEmailAlreadyExist); ?>;
            $('#response').html(popup);
	}
	else if(data == 4){
	    alert( "sql isn't insserting the database");
	}
	else if(data == 0){
	    alert( "University session doesn't exist");
	}
	else{
		alert( data );
		//unknown errors
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
				<br><input type="text" name="name" id="name" placeholder="Name" /></p>
				<p>Gender:

				<select id="genders" name="gender">
  				<option value="Male">Male</option>
  				<option value="Female">Female</option>
  				<option value="Other">Other</option>
				</select>

				<p>Birthdate: 
				<br><input type="date" name="dob" id="dob" placeholder="MM/DD/YYYY" /></p>
				<p>Email: 
				<br><input type="email" name="email" id="email" placeholder="Email" /></p>
				<p>Username: 
				<br><input type="text" name="username" id="username" placeholder="Username" /></p>
				<p>Password: 
				<br><input type="password" name="password" id="password" placeholder="*********" /></p>
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

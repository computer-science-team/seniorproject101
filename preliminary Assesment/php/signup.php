<!-- PHP code which will connect to database and that way a user can sign up -->
<?php
if (isset($_POST['submit'])){
session_start();//starts session
 $univid=$_SESSION['univid'];
 $university=$_SESSION['university'];
$servername = "localhost";
$user = "root";
$passwd = "";
$dbname ="accounts";
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
$checked = (isset($_POST['optradio']))?true:false;
if (!$_POST['fullname']){
   echo "<br/>-Please enter your name";
}
if (($checked==false)&&(!$_POST['fullname'])){
    echo "<br/>-Please select your gender";
}
if (($checked==false)&&($_POST['fullname'])){
    echo "<br/>-Please select your gender";
}
if (!$_POST['dob']){
    echo "<br/>-Please enter your birthdate";
}
if (!$_POST['email']){
    echo "<br/>-Please enter your email";
}
if (!$_POST['username']){
    echo "<br/>-Please enter your username";
}
if (!$_POST['password']){
    echo "<br/>-Please enter your password";
}
if (!$_POST['role']){
    echo "<br/>-Please enter your role";
}
if(isset($_POST['submit']) && isset($_POST['optradio'])){
    
    $fullname = $_POST['fullname'];
    $gender=$_POST['optradio'];
    $dob=$_POST['dob'];
    $username = $_POST['username'];//allow html to insert username
    $email = $_POST['email'];
    $password = md5($_POST['password']);//hashes password
    $role = $_POST['role']; 
    //Check if email is in use
    
    $selectFirstQuery = "SELECT * FROM users WHERE email  = '". $email ."'";
    $queryResult = $mysqli->query($selectFirstQuery);
    $foundRows = $queryResult->num_rows;
    //if row is found email is in use
    if($foundRows > 0)
    {
        echo "<br/>Your email is already registered.";
        echo "<br/>Please use another email or log in.";
    }
    //Check to see if username is in use
    $selectFirstQuery = "SELECT * FROM users WHERE username  = '". $username ."'";
    $queryResult = $mysqli->query($selectFirstQuery);
    $foundRows = $queryResult->num_rows;
    if($foundRows > 0)
    {
        echo "<br/>Your username is already registered";
        echo "<br/>Please choose another username";
    }
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
                echo 'id found';
                while($row=mysqli_fetch_assoc($queryResult)){
                    $id=$row['id'];
                }
            }
            $_SESSION['id']=$id;
            $_SESSION['username']=$username;
            $_SESSION['univid']=$univid;
            $_SESSION['univeristy']=$university;
            echo 'You will be redirected shortly';
            $role2 = "yes";
            
            if (strcmp($role, $role2) !== 0){
        		header("location:studentProfilePage.php");
			
			}
		else{
		header("location:facultyProfilePage.php");
		    }
        }
        else
        {
            echo 'There is a problem';
            
        }
}
}//post
?>
<!-- PHP code ends here -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SignUp!</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
	</head>
	<body class = "singinpage">
	<!-- Page menu starts here -->
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
			<form method="post">
				<p>Name:
				<br><input type="text" name="fullname" placeholder="name" value="<?php if(isset($_POST['fullname'])){ echo $_POST['fullname'];} ?>"></p>
				<p>Gender:
				<br><label class="radio-inline">
					<input type="radio" name="optradio"  value="Male"<?php if (isset($_POST['optradio']) && $_POST['optradio'] == 'Male') 
					     echo ' checked="checked"'; ?>>Male
				</label>
				<label class="radio-inline">
					<input type="radio" name="optradio" value ="Female" <?php if (isset($_POST['optradio']) && $_POST['optradio'] == 'Female') 
					     echo ' checked="checked"'; ?>>Female
				</label>
				<label class="radio-inline">
					<input type="radio" name="optradio" value="Other"  <?php if (isset($_POST['optradio']) && $_POST['optradio'] == 'Other') 
					     echo ' checked="checked"'; ?>>Other
				</label></p>
				<p>Birthdate: 
				<br><input type="date" name="dob" placeholder="MM/DD/YYYY" value="<?php if(isset($_POST['dob'])){ echo $_POST['dob'];} ?>"></p>
				<p>Email: 
				<br><input type="email" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];} ?>"></p>
				<p>Username: 
				<br><input type="text" name="username" placeholder="Username" value="<?php if(isset($_POST['username'])){ echo $_POST['username'];} ?>"></p>
				<p>Password: 
				<br><input type="Password" name="password" placeholder="*********" value="<?php if(isset($_POST['password'])){ echo $_POST['password'];} ?>"></p>
                <p>Faculty:
				<select name='role'>
					<br><option value="no" <?php if (isset($_POST['role']) && $_POST['role'] == 'no') 
					     echo ' selected="selected"'; ?>>No</option>
					<option value="yes"<?php if (isset($_POST['role']) && $_POST['role'] == 'yes') 
					    echo ' selected="selected"'; ?> >Yes</option>
				</select></p>
				
                <p><input type="submit" name="submit" value="Submit"> </p> 
				<p><br><a href="login.php"> Log In</a></p>
				<p><a href="forgotPassword.php">Forget Password?</a></p>
				<p><a href="FirstPage.php">Main Page</a></p>
			   
            </form>
		</div>
        </div>    
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
		
        
	</body>
</html>

<?php
if (isset($_POST['submit'])){
session_start();//starts session
 $univid=$_SESSION['univid'];
 $university=$_SESSION['university'];
$servername = "localhost";
$user = "root";
$passwd = "rowanphysicssweng";
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
           
            $_SESSION['username']=$username;
            $_SESSION['univid']=$univid;
            //var_dump($_SESSION['univid']);
            $_SESSION['univeristy']=$university;
            //var_dump($_SESSION['username']);
            echo 'You will be redirected shortly';
            header( "refresh:6; url=lastpage.php" );
           // header("location:welcome1.php");
        }
        else
        {
            echo 'There is a problem';
            
        }
}
}//post
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SignUp!</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
	</head>
	<body class = "singinpage">
	<!-- Page menu starts here -->
		<div class="signUpBox">
			<h2>Sign Up!</h2>
			<form method="post">
				<p>Name : </p>
				<input type="text" name="fullname" placeholder="name" value="<?php if(isset($_POST['fullname'])){ echo $_POST['fullname'];} ?>"/>
				<p>Gender</p>
				<label class="radio-inline">
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
				</label>
				<p>Birthdate: </p> 
				<input type="date" name="dob" placeholder="MM/DD/YYYY"  value="<?php if(isset($_POST['dob'])){ echo $_POST['dob'];} ?>"/> 
				<p>Email: </p>
				<input type="email" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];} ?>"/> 
				<p>Username: </p>
				<input type="text" name="username" placeholder="Enter Email or Username" value="<?php if(isset($_POST['username'])){ echo $_POST['username'];} ?>"/>
				<p>Password: </p>
				<input type="Password" name="password" placeholder="*********" value="<?php if(isset($_POST['password'])){ echo $_POST['password'];} ?>"/> 
				<p>Faculty: 
				<select name='role'>
					<option value="no" <?php if (isset($_POST['role']) && $_POST['role'] == 'no') 
					     echo ' selected="selected"'; ?>>No</option>
					<option value="yes" <?php if (isset($_POST['role']) && $_POST['role'] == 'yes') 
					    echo ' selected="selected"'; ?>>Yes</option>
				</select></p>
				
				<input type="submit" name="submit" value="Submit">
				<p><a  href="login.php">Log In</a></p>
				<p><a href="forgot.php">Forget Password?</a></p>
				<p><a href="FirstPage.php">Main Page</a></p>
			</form>
		</div>   
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
		
        
	</body>
</html>
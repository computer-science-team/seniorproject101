<?php
//if(isset($_POST['submit'])&& isset($_POST['optradio']))
//{
//$gender=$_POST['optradio'];
//echo $gender;
//}
session_start();//starts session
$_SESSION['message'] = '';
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
//Check to see if usrname and email is in use
if(isset($_POST['submit']))
{
		$fullname = $_POST['fullname'];
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];
		$username = $_POST['username'];//allow html to insert username
        $email = $_POST['email'];
        $password = md5($_POST['password']);//hashes password
        $role = $_POST['role']; 
       // echo 'Everything good!';
      // echo var_dump($gender);
      
       
       //Check if email is in use
      
        $selectFirstQuery = "SELECT * FROM users2 WHERE email  = '". $email ."'";
        $queryResult = $mysqli->query($selectFirstQuery);
        $foundRows = $queryResult->num_rows;
                
        if($foundRows > 0) 
        {
          echo "Your email is already registered.";
        }
        //Check to see if username is in use
         $selectFirstQuery = "SELECT * FROM users2 WHERE username  = '". $username ."'";
         $queryResult = $mysqli->query($selectFirstQuery);
         $foundRows = $queryResult->num_rows;
         if($foundRows > 0) 
         {
           echo "Your username is already registered. Please choose another username or sigin using your username and password";
         }
                
          //Insert info into table     
           $sql = "INSERT INTO users2(name, gender, dob, email, username, password, role)"
              . "VALUES ('$fullname','$gender', '$dob', '$email','$username','$password','$role')";
                if ($mysqli->query($sql)==true)
                    {
                       echo 'Registration succesful! Added username to the database!';
			header('Location: welcome.html');
                       
                    }
                     else
                     {
                       echo ' The user could not be added to database!' ;
                        
                     }       
                    
 }
 
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SignUp!</title>
		<link rel="stylesheet" href="SignUpStyle.css">
	</head>
	<body>
		<div class="signUpBox">
			<h2>Sign Up!</h2>
			<form method="post">
				<p>Name</p>
				<input type="text" name="fullname" placeholder="name">
				<p>Gender: </p>
				<select name='gender'>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					<option value="Other">Other</option>
				</select> </p>
				<p>Birthdate: </p>
				<input type="date" name="dob" placeholder="MM/DD/YYYY">
				<p>Email: </p>
				<input type="email" name="email" placeholder="Email">
				<p>Username: </p>
				<input type="text" name="username" placeholder="Enter Email or Username">
				<p>Password: </p>
				<input type="Password" name="password" placeholder="*********">
				<p>I am: 
				<select name='role'>
					<option value="student">Student</option>
					<option value="professor">Professor</option>
				</select> </p>
				<form>
				<input type="submit" name="submit" value="Submit">
				<p><a  href="login.php">Sign In</a></p>
				<p><a href="#">Forget Password?</a></p>
			</form>
		</div>
	</body>
</html>


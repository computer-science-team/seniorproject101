<?php
session_start();

 //include 'popup.php';



if(isset($_SESSION['university'])){ 
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

    $fullname = "$_POST[name]";
    $gender= "$_POST[gender]";
    $dob= "$_POST[dob]";
    $username = "$_POST[username]";//allow html to insert username
    $email = "$_POST[email]";
    $password = md5("$_POST[password]");//hashes password
    $role = "$_POST[role]"; 
    //Check if email is in use
    
    $selectFirstQuery = "SELECT * FROM users WHERE email  = '". $email ."'";
    $queryResult = $mysqli->query($selectFirstQuery);
    $foundRows = $queryResult->num_rows;
    //if row is found email is in use
    if($foundRows > 0)
    {
	echo 3;
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
	echo 2;
        //duplicate users in database needs to be unique
		//print $signupUserAlreadyExist;
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
            echo 1;
        }
	else
        {
	echo 4;
        //sql isn't insserting the database
			//	print $signupErrorLast;
            
        }
}
}
}
else
        {
	echo 0;
        //university session token doesn't exist    
        }
?>

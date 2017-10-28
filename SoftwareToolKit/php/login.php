<!-- Adding php code which will connect to database. User can log back in anytime.-->

<?php 
session_start();
$servername = "localhost";
$user = "root";
$passwd = "rowanphysicssweng";
$dbname ="accounts";

$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
//echo 'connected';
}
if(isset($_POST['signin']))
{

  echo 'Everything good!';

   $username= $_POST['username'];
   $password=md5($_POST['password']);
    $sql = "SELECT  * FROM users WHERE username  = '". $username ."' AND password = '".$password."'";
    

   //$result = mysqli_result object
    
   
   $result = $mysqli->query( $sql );
    $foundRows = $result->num_rows;
    
   
   if ($foundRows > 0) {
    // output data of each row
  
        $sql = "SELECT  univid, name FROM users WHERE username  = '". $username ."'";

        while($row = mysqli_fetch_assoc($result)){
           // echo $row['univid'];
            $univid=$row['univid'];
            $_SESSION['univid'] = $row['univid'];
            

           $_SESSION['username'] = $username;
            
       }
        $sql = "SELECT  name FROM universities WHERE univid  = '". $univid ."'";

        $result = $mysqli->query( $sql );
        $foundRows = $result->num_rows;
        if($foundRows > 0){
            while($row = mysqli_fetch_assoc($result)){
            $university = $row['name'];
            }
        }
        

       $_SESSION['university']= $university;
        
       header("location:lastpage.php");
    //while
    
}  //if $result 

   else {
    //echo "0 results";
    echo 'Please register or enter the correct username and password';
    
   }
 }

   
?>


<!-- Php code ends here but will be injected in HTML below-->
<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Login Form</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
    </head>
    <body class="loginpage">
        <div class="wrapper">
         <form method="post">
                <p>Username</p>
                <input type="text" name="username" placeholder="username">
                <p>Password: </p>
                <input type="Password" name="password" placeholder="*********">
                <p> </p>
                <input type="submit" name="signin" value="Log In">
                <p><a href="forgot.php">Forget Password?</a></p>
                <p><a  href="main.php">Main Page</a></p>
                
            </form>
  </div>
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    </body>

</html>
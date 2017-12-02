<?php
session_start();
     $_SESSION['university'] = "$_POST[name]";

if(isset($_SESSION['university'])){ 

$servername = "localhost";
$user = "root";
$passwd = "Liger124!";
$dbname ="accounts";
$university = $_SESSION['university'];
//var_dump($university);
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$selectFirstQuery = "SELECT univid FROM universities WHERE name  = '". $university ."'";
$queryResult = $mysqli->query($selectFirstQuery);
//$result = $selectFirstQuery->row();

$foundRows = $queryResult->num_rows;
//if row is found email is in use
if($foundRows > 0)
{   
$_SESSION['university']= $university;
echo 1;
 
    while($row = mysqli_fetch_assoc($queryResult)){
    	$_SESSION['univid'] = $row['univid'];
    }
    //You will be redirected to the Sign up page.
    
}
else{
     //check if university is already registered
    $selectFirstQuery = "SELECT * FROM universities WHERE name  = '". $university ."'";
    $queryResult = $mysqli->query($selectFirstQuery);
    $foundRows = $queryResult->num_rows;
    //No university found - University is being registered
    if($foundRows == 0)
    {
        $sql = "INSERT INTO universities(name)" . "VALUES ('$university')";
       
        if ($mysqli->query($sql)==true)
        {   //university
            $selectFirstQuery = "SELECT univid FROM universities WHERE name  = '". $university ."'";
            $queryResult = $mysqli->query($selectFirstQuery);
            $foundRows = $queryResult->num_rows;
            //get university id num
            if($foundRows > 0){
                while($row=mysqli_fetch_assoc($queryResult)){
                    $_SESSION['univid'] = $row['univid'];
                } 
            }
        }
    }
echo 2;
}
}
else
{
echo 0;
}
?>
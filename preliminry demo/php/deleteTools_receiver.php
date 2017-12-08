<?php
session_start();
$id = ($_SESSION['id']);

$servername = "localhost";
$user = "root";
$passwd = "";
$dbname ="accounts";
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    //echo "Connected successfully";
}



$_SESSION['count'] = '1';
$_SESSION['path'] = '0';
$_SESSION['urldelete'] = "$_POST[url]";


if(isset($_SESSION['urldelete'])){

$var = $_SESSION['urldelete'];

    $selectFirstQuery = "DELETE FROM tools WHERE url  = '". $var ."' AND idnums = '".$id."'";
    
    if ($mysqli->query($selectFirstQuery) === TRUE) {
	$_SESSION['path'] = '1';
	echo 0;
    }
    else{
	$_SESSION['path'] = '2';
	echo 0;
    }
}
?>

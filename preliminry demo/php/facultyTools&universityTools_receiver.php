<?php
session_start();
$id = ($_SESSION['id']);

include 'config.php';
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
    // Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    //echo "Connected successfully";
}



$_SESSION['count'] = '1';
$_SESSION['urladd'] = "$_POST[url]";
$_SESSION['path'] = '0';


if(isset($_SESSION['urladd'])){

   $var = $_SESSION['urladd'];

   $selectFirstQuery = "SELECT * FROM tools WHERE url  = '". $var ."' AND idnums = '".$id."'";
   $queryResult = $mysqli->query($selectFirstQuery);
   $foundRows = $queryResult->num_rows;
   $foundRows2 = $foundRows;
   
   //if tool found then tool is already in kit
   if($foundRows > 0)
   {
    //echo "<br/> ".$var. " is already in your toolkit";
   $_SESSION['path'] = '1';
   echo 0;
   }
   //if tool not found add to student's toolkit
   else{
     //Get tool from university
     $selectFirstQuery = "SELECT * FROM tools WHERE url  = '". $var ."'";
    $queryResult = $mysqli->query($selectFirstQuery);
    $foundRows = $queryResult->num_rows;
    if($foundRows > 0)
    {
       while($row=mysqli_fetch_assoc($queryResult)){
          $tool= $row['toolname'];
          $cat=$row['category'];
          
          
       }//while
    }//if
   
   //insert tool into tool table
   $sql = "INSERT INTO tools(idnums, category, toolname, url)"
       . "VALUES ('$id','$cat', '$tool','$var')";
       if ($mysqli->query($sql)==true)
       {
	echo 0;
       }
   }//else
}
?>

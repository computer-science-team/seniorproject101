<?php 
session_start();

    include 'config.php';
    $mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


  $id = $_SESSION['id'];
  $runivid = $_SESSION['runivid'];

  $toolname = "$_POST[toolname]";
  $category = "$_POST[category]";
  $url = "$_POST[url]";
  $private = "$_POST[private]";


  $_SESSION['count'] = '1';
  $_SESSION['path'] = '0';

  if(isset($_SESSION['count'])){
    if ((strpos($url, 'http://') === false) && (strpos($url, 'https://') === false) ){
           $_SESSION['path'] = '1';
			//print $urlcorrect;
        }
  else{

            //check if tool is already in tool kit
            $selectFirstQuery = "SELECT url FROM tools WHERE url  = '". $url ."' AND idnums = '".$id."'";
            $queryResult = $mysqli->query($selectFirstQuery);
            $foundRows = $queryResult->num_rows;
            //if >0 then tool is in toolkit
            if($foundRows > 0){

           $_SESSION['path'] = '2';
			//print $sameUrl;
            }//if
            else{
    
                $sql = "INSERT INTO tools(idnums, category, toolname, url, private)" . "VALUES ('$id','$category', '$toolname','$url', '$private')";
            
                if ($mysqli->query($sql)==true){
                    
		

			         
                    $selectFirstQuery = "SELECT * FROM tools WHERE idnums  = '". $id ."'";
                    $queryResult = $mysqli->query($selectFirstQuery);
                    $foundRows = $queryResult->num_rows;
                    //if found tool kit displayed
                    if($foundRows > 0)
                    {
			 $_SESSION['path'] = '3';
                        //print $toolAdded;
                        
                    }//rows  
                }//if mysql
                //university
                if($private=='no'){
                    $selectFirstQuery = "SELECT url FROM tools WHERE url  = '". $url ."' AND idnums = '".$runivid."' ";
                    $queryResult = $mysqli->query($selectFirstQuery);
                    $foundRows = $queryResult->num_rows;
                    //if >0 then tool is in university's toolkit already
                    if($foundRows > 0){
                        
			 $_SESSION['path'] = '4';
			          //print $sameUrlUniversity;
                    }//if
                    else{
                        
                        $sql = "INSERT INTO tools(idnums, category, toolname, url, private)" . "VALUES ('$runivid','$category', '$toolname','$url', '$private')";
                        
                        if ($mysqli->query($sql)==true){
				$_SESSION['path'] = '5';
                            
			                //print $toolAddedUni;
                            
                        }//if mysql
                    }
                    
                }//private
                   
            }//else

  }

  }
echo 0;
?>

<?php 
session_start();
$id = ($_SESSION['id']);
$username = ($_SESSION['username']);
$university= ($_SESSION['university']);
$univid= ($_SESSION['univid']);
$runiversity= ($_SESSION['runiversity']);
$runivid= ($_SESSION['runivid']);
//var_dump($_SESSION['university']);
//echo $username;
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
if(isset($_POST['View'])){
    //echo "pressed";
    echo "pressed";
}
//goes url in student database
if(isset($_POST['Visit'])){
    //echo "pressed";
    echo $_POST['Visit'];
    $var=$_POST['Visit'];
    
    header('location:' . $var);

}
//adds tool to student's tool kit
if(isset($_POST['Add'])){
    
   $var=($_POST['Add']);
   $selectFirstQuery = "SELECT * FROM tools WHERE url  = '". $var ."' AND idnums = '".$id."'";
   $queryResult = $mysqli->query($selectFirstQuery);
   $foundRows = $queryResult->num_rows;
   $foundRows2 = $foundRows;
   
   //if tool found then tool is already in kit
   if($foundRows > 0)
   {
    echo "<br/> ".$var. " is already in your toolkit";
   
        
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
           echo "<br/> ".$tool. " was successfully added to your toolkit";
           //Display user tool kit
         //  echo "<br/>Here are the tools associated with "  .$university. ":";
           $selectFirstQuery = "SELECT * FROM tools WHERE idnums  = '". $id ."'";
           $queryResult = $mysqli->query($selectFirstQuery);
           $foundRows = $queryResult->num_rows;
           //if found tool kit displayed tool added
           if($foundRows > 0)
           {
               echo "<table border='1'>";
               echo "<br/>Here are your tools :";
               echo "<tr><td>Name</td><td>Category</td><td>Website</td><td>Visit Site</td><rr>";
               while($row=mysqli_fetch_assoc($queryResult)){
                   
                   
                   echo "<tr><td>{$row['toolname']}</td><td>{$row['category']}</td><td>{$row['url']}</td><td><input type='submit' name='Visit' value = {$row['url']}></td>";
                   
                   
               }
               
           }
       }
       else
       {
           echo 'Error: University could not be added';
       }
   }//else


}
//echo ('<a  href="main.php">Log Out</a>');
//<p><a  href="main.php">Log Out</a></p>

//<p><a  href="buildTools.php">Add your own tools</a></p>
 


?>
<!DOCTYPE html>

<html>
		
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UniversityToolpage</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    
</head>
    <body>
    <nav class="navbar navbar-inverse navbar-static-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">UniversityTools</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
                
                <li><a href="../index.html">Logout</a></li>
			</ul>
		</div>
	</div>
</nav>
    
      
      
	  	<div class="jumbotron">
        <div class="container">
		<div class="universityTools">
		
		 <form method="post">
		 <input type='submit' name="View" value='View Your Toolkit'>
		<?php
		$selectFirstQuery = "SELECT * FROM tools WHERE idnums  = '". $univid ."' AND private ='No'";
		$queryResult = $mysqli->query($selectFirstQuery);
		$foundRows = $queryResult->num_rows;
		//if row is get toolkit of university
		if($foundRows > 0)
		{
		    
		    echo "<table border='1'>";
		    echo "<br/>Here are the tools associated with "  .$university. ":";
		    echo "<tr><td>Name</td><td>Category</td><td>Website</td><td>Add to Toolkit</td><rr>";
		    while($row=mysqli_fetch_assoc($queryResult)){
		        
		           
		        //echo "<tr><td>{$row['toolname']}</td><td>{$row['category']}</td><td>{$row['url']}</td><td>{$row['url']}</td>";
		        echo "<tr><td>{$row['toolname']}</td><td>{$row['category']}</td><td>{$row['url']}</td><td><input type='submit' name='Add' value = {$row['url']}></td>";
		            
		    }
		   
		}
		//User toolkit
		if(((isset($_POST['Add'])) && ($foundRows2 > 0))||(isset($_POST['View']))){
		  
		    
		    $selectFirstQuery = "SELECT * FROM tools WHERE idnums = '".$id."'";
		    $queryResult = $mysqli->query($selectFirstQuery);
		    $foundRows = $queryResult->num_rows;
		  //display toolkit  not adding tool
		if($foundRows > 0){
		  
		  
		  echo "<table border='1'>";
		  echo "<br/> Here are your tools:";
		  echo "<tr><td>Name</td><td>Category</td><td>Website</td><td>Visit Site</td><rr>";
		  while($row=mysqli_fetch_assoc($queryResult)){
		    
		    
		    echo "<tr><td>{$row['toolname']}</td><td>{$row['category']}</td><td>{$row['url']}</td><td><input type='submit' name='Visit' value = {$row['url']}></td>";
		  }//while
		}//foundRows
		//
		else{
		    echo "You don't have a toolkit. Add tools to create one";
		}//
		//used if there is a $_POST['Add']
		//if(isset($_POST['Add'])&&(foundRows2>0)){
		//    echo "working";
		  //  $var=($_POST['Add']);
		  //  echo .$_POST['Add']. " is already in your toolkit";
		    
		//}
		}//isset
		//echo "<br/><input type='submit' name='LogOut' value = 'Add your own tools'>";
		
		?>
		
		</form>
		
          </div>
          </div>
		

         </div>
				
	
		</body>
   
    
</html>


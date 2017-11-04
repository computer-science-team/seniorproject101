<?php
session_start();
$fid = $_SESSION['fid'];
//echo $fid;
//echo $faculty;
$id = $_SESSION['id'];
$username = $_SESSION['username'];
$univid = $_SESSION['univid'];
$servername = "localhost";
$university=$_SESSION['university'];
$faculty = $_SESSION['faculty'];
//echo "look";
//echo $faculty;
//echo $faculty;
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
    //echo "pressed";
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
        //Get tool from faculty
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
                        
                        //refresh header dont create table
                    }
                    
                }
            }
            else
            {
                echo 'Error: tool could not be added';
            }
    }//else
    
    
}
?>

<!DOCTYPE html>

<html>
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
</head>
    
      <h1> <?php echo $username;?> , here are <?php echo $faculty;?>'s tools:</h1>
	  	 <form method="post">
      <input type='submit' name="View" value='View Your Toolkit'></form>
       <body>
		<div class="loginBox">
		<p> </p>
		 <form method="post">
		<?php
		//faculty member's tools
		echo "here2";
		$selectFirstQuery = "SELECT * FROM tools WHERE idnums  = '". $fid ."'";
		$queryResult = $mysqli->query($selectFirstQuery);
		$foundRows = $queryResult->num_rows;
		//if row is found get toolkit of university faculty
		if($foundRows > 0)
		{
		    
		    echo "<table border='1'>";
		    //echo "<br/>Here are the tools associated with "  .$university. ":";
		    echo "<tr><td>Name</td><td>Category</td><td>Website</td><td>Add to Toolkit</td><rr>";
		    while($row=mysqli_fetch_assoc($queryResult)){
		        
		           
		        
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
		<div class="div">
		

</div>
		<p><a  href="main.php" class="btn btn-danger btn-xs" role= "button" style="position: absolute; left: 0%; right:90%; bottom: 5%;">Log Out</a>		
		<p><a  href="buildTools.php" class="btn-success btn-xs" role= "button" style="position: absolute; left: 0%; right:90%; bottom: 9%;">Add Your Own Tools</a>		
		<p><a  href="facultySearch.php" class="btn btn-warning btn-xs" role= "button" style="position: absolute; left: 0%; right:90%; bottom: 13%;"><?php $id=$_SESSION['id'];
		$username=$_SESSION['username']; $university=$_SESSION['university'];  $_SESSION['univid']=$univid; ?>Faculty Search</a>	
		
		</body>
    <div class="div">

</div>
   
</html>

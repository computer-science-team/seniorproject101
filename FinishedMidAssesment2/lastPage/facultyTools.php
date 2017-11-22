
<?php 
session_start();
$id = ($_SESSION['id']);
$fid = $_SESSION['fid'];
$username = ($_SESSION['username']);
$runiversity= ($_SESSION['university']);
$runivid= ($_SESSION['univid']);
$role = ($_SESSION['role']);
//var_dump($_SESSION['university']);
//echo $username;
$servername = "localhost";
$user = "root";
$passwd = "Liger124!";
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
$selectFirstQuery = "SELECT * FROM tools WHERE idnums  = '". $id ."'";
$queryResult = $mysqli->query($selectFirstQuery);
$queryResult2 = $mysqli->query($selectFirstQuery);
$foundRows = $queryResult->num_rows;
$foundRows2 = $queryResult2->num_rows;
$result_array = array();
$result_array2 = array();
        while ($row=mysqli_fetch_assoc($queryResult)) {
		$result_array[] = $row['url'];
		$result_array2[] = $row['toolname'];
            
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
	header("Refresh:0");
           
       }
	else
	{
	echo 'Error: tool could not be added';
	}
   }//else
}
 
$role2 = "yes";
$go = "";            
            if (strcmp($role, $role2) !== 0){
        		$go = "studentProfilePage.php";
			
			}
		else{
		$go ="facultyProfilePage.php";
		    }




?>
<!DOCTYPE html>

<html>
		
<html lang="en">
  <head>
	<style>
	td {
    text-align: center;
    padding: 12px;
	font-size: 25px;
	color: black;
	border: 1px solid black;
	
	}
	th{
	color: white;
	border: 1px solid black;
	}
	
	</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StudentToolpage</title>
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
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile<span class="caret"></span></a>
				<ul class="dropdown-menu">
				  
				  <li><a href= "<?php echo $go ?>">Profile Page</a></li>
				  <li><a href="universitysearch.php"><?php $_SESSION['id']=$id;
		$_SESSION['username']=$username; $_SESSION['runiversity']=$runiversity;  $_SESSION['runivid']=$fid; ?>Search All Universities</a></li>
                  <li><a href="facultySearch.php"><?php $_SESSION['id']=$id;
		$_SESSION['username']=$username; $_SESSION['runiversity']=$runiversity;  $_SESSION['runivid']=$fid; ?>Faculty Search</a></li>
                 
				</ul>
			  </li>
                <li><a href="../index.html">Logout</a></li>
			</ul>
		</div>
	</div>
</nav>
      
	
      
	  	<div class="jumbotron">
        <div class="container">  
		<div class="loginBox">
		<h3> Welcome <?php echo $username;?> !! Hope you are having a good day.</h3>
            <div id="divButtons">

        </div>
	<p id="demo"></p>
		 <form method="post">
		
		<?php
		$selectFirstQuery = "SELECT * FROM tools WHERE idnums  = '". $fid ."'";
		$queryResult = $mysqli->query($selectFirstQuery);
		$foundRows = $queryResult->num_rows;
		//if row is get toolkit of university
		if($foundRows > 0)
		{
		    echo"These are all the tools for the university";
		    echo "<table border='5' style ='border-collapse: collapse;
    width: 100%;'>";
		    echo "<tr><td><strong>Name</strong></td><td><strong>Category</strong></td><td ><strong>Website</strong></td><td><strong>Add to Toolkit</strong></td><tr>";
		    while($row=mysqli_fetch_assoc($queryResult)){
		        
		    $url2 = $row['url'];
		    $pieceOfURL = substr($url2, 0, 30);
			     
		        
		        echo "<tr><th>{$row['toolname']}</th><th>{$row['category']}</th><th id = 'temp'>$pieceOfURL</th><th ><button style = ' background: red; margin-left: 30%;' type='submit' name='Add' value = {$row['url']}>Add</button></th>";
		            
		    }
		   
		}//ifr] rows
		//User toolkit
		
		?>
		</form>
		
		 
        
	



       
             
		
            </div>
            </div>
</div>
		

		</body>
    
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>

</html>

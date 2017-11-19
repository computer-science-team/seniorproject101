<?php
session_start();
$id = ($_SESSION['id']);
$username = ($_SESSION['username']);
$runiversity= ($_SESSION['university']);
$runivid= ($_SESSION['univid']);
//Prints tool removed
if (!empty($_SESSION['message'])) {
    echo '<p class="message"> '.$_SESSION['message'].'</p>';
    unset($_SESSION['message']);
}
$servername = "localhost";
$user = "root";
$passwd = "kkp123";
$dbname ="accounts";
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    //echo "Connected successfully";
}
if(isset($_POST['Delete'])){
    echo "pressed";
    //echo "pressed";
}
//goes url in student database
if(isset($_POST['Visit'])){
    //echo "pressed";
    echo $_POST['Visit'];
    $var=$_POST['Visit'];
    
    header('location:' . $var);
    
}
//Deletes tool to student's tool kit
if(isset($_POST['Delete'])){
    
    $var=($_POST['Delete']);
    $selectFirstQuery = "DELETE FROM tools WHERE url  = '". $var ."' AND idnums = '".$id."'";
    
    if ($mysqli->query($selectFirstQuery) === TRUE) {
        //echo "<br/> ".$var. " has been deleted from your toolkit";
        $_SESSION['message'] = "'".$var."' has been deleted from your tool kit";
        //header("location:deleteTools.php");
        header("Refresh:0");
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }
    
    
    
}
?>
<!DOCTYPE html>


		
	<html>
		
	<head>
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
			<a class="navbar-brand" href="lastpage.php"><?php $_SESSION['id']=$id;
		$_SESSION['username']=$username; $_SESSION['runiversity']=$runiversity;  $_SESSION['runivid']=$runivid; ?>View Toolkit</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
                
                <li><a href="../index.html">Logout</a></li>
			</ul>
		</div>
	</div>
</nav>
      
	
      
	  	<div class="jumbotron">
        <div class="container-fluid">
		<div class="loginBox">
		<h3> <?php echo $username;?>  Here are the tools available for deletion:</h3>
		 <form method="post">
		
		<?php
		//Display user's toolkit
		$selectFirstQuery = "SELECT * FROM tools WHERE idnums  = '". $id ."'";
		$queryResult = $mysqli->query($selectFirstQuery);
		$foundRows = $queryResult->num_rows;
		//checks if anything in tool kit
		if($foundRows > 0)
		{
		    
		      echo "<table border='5' style ='border-collapse: collapse;
    width: 100%;'>";
		   echo "<tr><td><strong>Name</strong></td><td><strong>Category</strong></td><td ><strong>Website</strong></td><td><strong>Delete From Toolkit</strong></td><tr>";
		    while($row=mysqli_fetch_assoc($queryResult)){    
		    $url2 = $row['url'];
		    $pieceOfURL = substr($url2, 0, 30);
			     
		        echo "<tr><th>{$row['toolname']}</th><th>{$row['category']}</th><th id = 'temp'>$pieceOfURL</th><th ><button style = ' background: red; margin-left: 30%;' type='submit' name='Delete' value = {$row['url']}>Delete</button></th>";
		            
		    }
		   
		}//ifr] rows
		//User toolkit
		
		?>
		

		            
		    
            </form>
            </div>
            </div>
            </div>
         <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script> 
    </body>
</html>
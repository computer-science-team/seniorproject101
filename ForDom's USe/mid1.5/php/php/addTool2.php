<?php 
session_start();
$role = $_SESSION['role'];
$id = $_SESSION['id'];
$username = $_SESSION['username'];
$runiversity = $_SESSION['runiversity'];
$runivid = $_SESSION['runivid'];
//goes url in student database
if(isset($_POST['Visit'])){
   
    $var=$_POST['Visit'];
    
    header('location:' . $var);
    
}
if (isset($_POST['submit'])){
    
   
    $servername = "localhost";
    $user = "root";
    $passwd = "rowanphysicssweng";
    $dbname ="accounts";
    $mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{
        //echo "Connected successfully";
    }
    //goes url in student database
    if(isset($_POST['Visit'])){
        //echo "pressed";
        echo $_POST['Visit'];
        $var=$_POST['Visit'];
        
        //header('location:' . $var);
        
    }
    if (!$_POST['toolname']){
        echo "<br/>-Please enter the tool name";
    }
    if (!$_POST['category']){
        echo "<br/>-Please enter the category name";
    }
    if (!$_POST['url']){
        echo "<br/>-Please enter the url of the tool";
    }
    
    if ($_POST['url']){
        if ((strpos($_POST['url'], 'http://') === false) && (strpos($_POST['url'], 'https://') === false) ){
        echo "<br/>-Please make sure that the url address is correct";
        echo "<br/>-All url addresses must contain http:// or https://";
        }
    } 
     
    else{
             echo "</br>Tool could not be added. There is a problem";
        }
    
}
?>
<!DOCTYPE html>
<html>
  <head>
     <title>New Tool</title>
  		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
</head>  

      
        
        <body>    
        <div class = "wrapper">
		<div class="form-signin">
            <h1> Add to your Toolkit</h1>
        <form method="post">
        <?php 
        if((isset($_POST['submit'])) && ($_POST['toolname']) && ($_POST['category']) && ($_POST['url'])){
            $toolname = $_POST['toolname'];
            $category = $_POST['category'];
            $url = $_POST['url'];
            //check if tool is already in tool kit
            $selectFirstQuery = "SELECT url FROM tools WHERE url  = '". $url ."'";
            $queryResult = $mysqli->query($selectFirstQuery);
            $foundRows = $queryResult->num_rows;
            //if >0 then tool is in toolkit
            if($foundRows > 0){
           
                echo "</br>".$url." is already in your kit. It can not be added";
            }//if
            else{
    
                $sql = "INSERT INTO tools(idnums, category, toolname, url)" . "VALUES ('$id','$category', '$toolname','$url')";
            
                if ($mysqli->query($sql)==true){
                    echo 'Tool added';
                    $selectFirstQuery = "SELECT * FROM tools WHERE idnums  = '". $id ."'";
                    $queryResult = $mysqli->query($selectFirstQuery);
                    $foundRows = $queryResult->num_rows;
                    //if found tool kit displayed
                    if($foundRows > 0)
                    {
                       
                        echo "<table border='1'>";
                        echo "<tr><td>Here are your tools :</td>";
                        echo "<tr><td>Name</td><td>Category</td><td>Website</td><td>Visit Site</td><rr>";
                        while($row=mysqli_fetch_assoc($queryResult)){
                            
                            
                            echo "<tr><td>{$row['toolname']}</td><td>{$row['category']}</td><td>{$row['url']}</td><td><input type='submit' name='Visit' value = {$row['url']}></td>";
                            
                            
                        }//while
                    }//rows  
                }//if mysql
            }//else
    }//
    ?>
         
        <p>You must create at least one tool</p>
		<p>Tool:</p> 
				<p><input type="text" name="toolname" placeholder="toolname" value="<?php if(isset($_POST['toolname'])){ echo $_POST['toolname'];} ?>" /></p>
		<p>Category:</p> 
				<p><input type="text" name="category" placeholder="category" value="<?php if(isset($_POST['category'])){ echo $_POST['category'];} ?>"/> </p>
		<p>Location:</p> 
				<p><input type="text" name="url" placeholder="url" value="<?php if(isset($_POST['url'])){ echo $_POST['url'];} ?>"/> </p>
				
		
		<p> </p>
		<input type="submit" name="submitbut" value="submit">	
		<p><a  href="main.php" class="btn btn-danger btn-xs" role= "button" style="position: absolute; left: 0%; right:90%; bottom: 5%;">Log Out</a>	
		<p><a  href="recommendeduniversity.php" class="btn-success btn-xs" role= "button" style="position: absolute; left: 0%; right:90%; bottom: 9%;"><?php $id=$_SESSION['id'];
		$username=$_SESSION['username']; $runiversity=$_SESSION['runiversity'];  $_SESSION['runivid']=$runivid; ?>Your University's Recommended Tools</a>			
	  
    </form>
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
	</div>
    </div> 	
    </body>
</html>

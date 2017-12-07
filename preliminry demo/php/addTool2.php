<?php 
session_start();
//$role = $_SESSION['role'];
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
    //goes url in student database
    if(isset($_POST['Visit'])){
        //echo "pressed";
        echo $_POST['Visit'];
        $var=$_POST['Visit'];
        
        //header('location:' . $var);
        
    }
    if (!$_POST['toolname']){
            include 'popup.php';
			print $toolNameNeeded;
        
    }
    if (!$_POST['category']){
        include 'popup.php';
			print $catagoryNameNeeded;
    }
    if (!$_POST['url']){
        include 'popup.php';
			print $urlNeeded;
    }
    
    if ($_POST['url']){
        if ((strpos($_POST['url'], 'http://') === false) && (strpos($_POST['url'], 'https://') === false) ){
           include 'popup.php';
			print $urlcorrect;
        }
    } 
     
    else{ 
             include 'popup.php';
			print $toolError;
        }
    
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
     <title>New Tool</title>
  		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
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
			<a class="navbar-brand" href="#">New Tool</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
                
				
                <li><a href="../index.html">Logout</a></li>
			</ul>
		</div>
	</div>
</nav>
        <div class = "wrapper">
		<div class="form-signin">
            <h1> Add to your Toolkit</h1>
        <form method="post">
        <?php 
        if((isset($_POST['submit'])) && ($_POST['toolname']) && ($_POST['category']) && ($_POST['url'])){
            
            
            $toolname = $_POST['toolname'];
            $category = $_POST['category'];
            $url = $_POST['url'];
            $private = $_POST['private'];
            //check if tool is already in tool kit
            $selectFirstQuery = "SELECT url FROM tools WHERE url  = '". $url ."' AND idnums = '".$id."'";
            $queryResult = $mysqli->query($selectFirstQuery);
            $foundRows = $queryResult->num_rows;
            //if >0 then tool is in toolkit
            if($foundRows > 0){
           
            include 'popup.php';
			print $sameUrl;
            }//if
            else{
    
                $sql = "INSERT INTO tools(idnums, category, toolname, url, private)" . "VALUES ('$id','$category', '$toolname','$url', '$private')";
            
                if ($mysqli->query($sql)==true){
                    include 'popup.php';
			         print $toolAdded;
                    $selectFirstQuery = "SELECT * FROM tools WHERE idnums  = '". $id ."'";
                    $queryResult = $mysqli->query($selectFirstQuery);
                    $foundRows = $queryResult->num_rows;
                    //if found tool kit displayed
                    if($foundRows > 0)
                    {
                       
                        
                        
                    }//rows  
                }//if mysql
                //university
                if($private=='no'){
                    $selectFirstQuery = "SELECT url FROM tools WHERE url  = '". $url ."' AND idnums = '".$runivid."' ";
                    $queryResult = $mysqli->query($selectFirstQuery);
                    $foundRows = $queryResult->num_rows;
                    //if >0 then tool is in university's toolkit already
                    if($foundRows > 0){
                        
                        include 'popup.php';
			            print $sameUrlUniversity ;
                    }//if
                    else{
                        
                        $sql = "INSERT INTO tools(idnums, category, toolname, url, private)" . "VALUES ('$runivid','$category', '$toolname','$url', '$private')";
                        
                        if ($mysqli->query($sql)==true){
                            include 'popup.php';
			                print $toolAddedUni ;
                            
                        }//if mysql
                    }
                    
                }//private
                   
            }//else
    }//
    ?>
         
        <p>By creating your tool</p>
		<p>Tool: 
				<br><input type="text" name="toolname" placeholder="toolname" value="<?php if(isset($_POST['toolname'])){ echo $_POST['toolname'];} ?>" /></p>
		<p>Category: 
				<br><input type="text" name="category" placeholder="category" value="<?php if(isset($_POST['category'])){ echo $_POST['category'];} ?>"/> </p>
		<p>Location: 
				<br><input type="text" name="url" placeholder="url" value="<?php if(isset($_POST['url'])){ echo $_POST['url'];} ?>"/> </p>
            <p>Private Tool:
				<br><select name='private'>
					<option value="no" <?php if (isset($_POST['private']) && $_POST['private'] == 'No') 
					     echo ' selected="selected"'; ?>>No</option>
					<option value="yes"<?php if (isset($_POST['private']) && $_POST['private'] == 'Yes') 
					    echo ' selected="selected"'; ?> >Yes</option>
				</select></p>
				
		<p> <input type="submit" name="submit" value="submit"></p>
				
	  
    </form>
        
        
	</div>
    </div> 	
    </body>
</html>

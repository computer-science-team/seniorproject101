<?php 
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
if (!$_POST['university']){
    echo "<br/>-Please enter name of the university";
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
//Check if university is registered
$university = $_POST['university'];
$toolname = $_POST['toolname'];
$category = $_POST['category'];
$url = $_POST['url'];
$private = $_POST['private'];
//check if university is already registered
$selectFirstQuery = "SELECT * FROM universities WHERE name  = '". $university ."'";
$queryResult = $mysqli->query($selectFirstQuery);
$foundRows = $queryResult->num_rows;
//if row is found email is in use
if($foundRows > 0)
{
    echo "The university is already registered.";
}
else{
    //Insert university
    $sql = "INSERT INTO universities(name)" . "VALUES ('$university')";
    echo "The university can be registered.";
        if ($mysqli->query($sql)==true)
        {   //university
            $selectFirstQuery = "SELECT univid FROM universities WHERE name  = '". $university ."'";
            $queryResult = $mysqli->query($selectFirstQuery);
            $foundRows = $queryResult->num_rows;
            //get university id num
            if($foundRows > 0){
                while($row=mysqli_fetch_assoc($queryResult)){
                    $id=$row['univid'];
                }    
                $sql = "INSERT INTO tools(idnums, category, toolname, url, private)" . "VALUES ('$id','$category', '$toolname','$url', '$private')";
                   
                    if ($mysqli->query($sql)==true){
                        echo 'University added';
                    }
                    else{
                        echo 'University could not be added';
                    }
                    
            }
        
        }
}
}//isset
?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8"> 
     <title> Welcome Page </title>
     
</head>

      <h1> Register a  University</h1>
        <body>
        <form method="post">
        <p>In order to register a university you must create at least one tool</p>
		<p>University: </p>
				<input type="text" name="university" placeholder="university" value="<?php if(isset($_POST['university'])){ echo $_POST['university'];} ?>"/>
		<p>Toolname: </p>
				<input type="text" name="toolname" placeholder="toolname" value="<?php if(isset($_POST['toolname'])){ echo $_POST['toolname'];} ?>"/>
		<p>Category: </p>
				<input type="text" name="category" placeholder="category" value="<?php if(isset($_POST['category'])){ echo $_POST['category'];} ?>"/>
		<p>Location: </p>
				<input type="text" name="url" placeholder="url" value="<?php if(isset($_POST['url'])){ echo $_POST['url'];} ?>"/>
		<p> </p>
		<p>Private Tool:</p>
		<select name='private'>
		<option value="no" <?php if (isset($_POST['private']) && $_POST['private'] == 'No') 
		echo ' selected="selected"'; ?>>No</option>
		<option value="yes"<?php if (isset($_POST['private']) && $_POST['private'] == 'Yes') 
		echo ' selected="selected"'; ?> >Yes</option>
		
		</select>
		<p></p>
		<input type="submit" name="submit" value="submit">	
		</form>							
	</body>
    
</html>
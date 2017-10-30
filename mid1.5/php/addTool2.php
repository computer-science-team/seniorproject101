<?php
session_start();//starts session
$id=$_SESSION['id'];
$_SESSION['message'] = '';
$servername = "localhost";
$user = "root";
$passwd = "";
$dbname ="accounts";
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

//Check to see if usrname and email is in use
if(isset($_POST['submit']))
{


    $category= $_POST['category'];
    $toolname = $_POST['toolname'];//allow html to insert toolname
    $url = $_POST['url'];
                
        $selectFirstQuery = "SELECT * FROM tools WHERE toolname  = '". $toolname ."'";
        $queryResult = $mysqli->query($selectFirstQuery);
        $foundRows = $queryResult->num_rows;
                
        if($foundRows > 0) 
        {
          echo "Your toolname is already registered.";
        }
	else
	{

	$selectFirstQuery = "SELECT * FROM tools WHERE url  = '". $url ."'";
        $queryResult = $mysqli->query($selectFirstQuery);
        $foundRows = $queryResult->num_rows;
	if($foundRows > 0) 
        {
          echo "Your url is already registered.";
        }
	else
	{

 	   $sql = "INSERT INTO tools(idnums,category, toolname, url)"
        	. "VALUES ($id,'$category','$toolname','$url')";
                if ($mysqli->query($sql)==true)
                    {
                       echo 'Registration succesful! Added username to the database!';
                       
                    }
                     else
                     {
                       echo ' The user could not be added to database!' ;
                        
                     }
		}

          }
                    
 }
 
?>
		
<!doctype html>
<html>
	<body>
		<div class="signUpBox">
			<h2>Add Tool</h2>
			<form method="post">
				<p>Category</p>
				<input type="text" name="category" placeholder="category" value="<?php if(isset($_POST['category'])){ echo $_POST['category'];} ?>"/>
				<p>Toolname</p>
				<input type="text" name="toolname" placeholder="toolname" value="<?php if(isset($_POST['toolname'])){ echo $_POST['toolname'];} ?>"/>
				<p>Url</p>
				<input type="text" name="url" placeholder="url" value="<?php if(isset($_POST['url'])){ echo $_POST['url'];} ?>"/>


				
				<input type="submit" name="submit" value="Submit">
			</form>
		</div>
	</body>
</html>

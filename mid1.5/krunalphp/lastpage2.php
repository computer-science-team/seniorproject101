<?php 
session_start();
$id = ($_SESSION['id']);
$username = ($_SESSION['username']);
$runiversity= ($_SESSION['university']);
$runivid= ($_SESSION['univid']);
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
    
      <h1> Welcome <?php echo $username;?> !! Hope you are having a good day.</h1>
	
      <form method="post">
      
	  	  <body>
		<div class="loginBox">
		<p> </p>
		 <form method="post">
		
		<?php
		$selectFirstQuery = "SELECT * FROM tools WHERE idnums  = '". $runivid ."'";
		$queryResult = $mysqli->query($selectFirstQuery);
		$foundRows = $queryResult->num_rows;
		//if row is get toolkit of university
		if($foundRows > 0)
		{
		    
		    echo "<table border='1'>";
		    echo "<tr><td>Name</td><td>Category</td><td>Website</td><td>Add to Toolkit</td><rr>";
		    while($row=mysqli_fetch_assoc($queryResult)){
		        
		           
		        //echo "<tr><td>{$row['toolname']}</td><td>{$row['category']}</td><td>{$row['url']}</td><td>{$row['url']}</td>";
		        echo "<tr><td>{$row['toolname']}</td><td>{$row['category']}</td><td>{$row['url']}</td><td><input type='submit' name='Add' value = {$row['url']}></td>";
		            
		    }
		   
		}//ifr] rows
		//User toolkit
		
		?>
		
		</form>
		
        <div id="divButtons">

        </div>
	<p id="demo"></p>



        <script type="text/javascript">
	    
	    var b = <?php echo json_encode($foundRows2); ?>;
	    var js_array =<?php echo json_encode($result_array);?>;
	    var js_array2 =<?php echo json_encode($result_array2);?>;
            var arrOptions = new Array();

                arrOptions= js_array;

            for (var i = 0; i < arrOptions.length; i++) {
                var btnShow = document.createElement("input");
                btnShow.setAttribute("type", "button");
                btnShow.value = js_array2[i];
                var optionPar = arrOptions[i];
                btnShow.onclick = (function(opt) {
    		return function() {
      		showParam(opt);
   		};
		})(arrOptions[i]);

                document.getElementById('divButtons').appendChild(btnShow);
            }

            function showParam(value) {

                
		window.open(value);
            }        
        </script>
		

</div>
		<p><a  href="main.php" class="btn btn-danger btn-xs" role= "button" style="position: absolute; left: 0%; right:90%; bottom: 5%;">Log Out</a>		
		<p><a  href="facultySearch.php" class="btn btn-warning btn-xs" role= "button" style="position: absolute; left: 0%; right:90%; bottom: 9%;"><?php $_SESSION['id']=$id;
		$_SESSION['username']=$username; $_SESSION['runiversity']=$runiversity;  $_SESSION['runivid']=$runivid; ?>Faculty Search</a>	
		<p><a  href="universitysearch.php" class="btn btn-info btn-xs" role= "button" style="position: absolute; left: 0%; right:90%; bottom: 13%;"><?php $_SESSION['id']=$id;
		$_SESSION['username']=$username; $_SESSION['runiversity']=$runiversity;  $_SESSION['runivid']=$runivid; ?>Search All Universities</a>
		<p><a  href="profilePage.php" class="btn btn-danger btn-xs" role= "button" style="position: absolute; left: 0%; right:90%; bottom: 17%;">Profile</a>	












		</body>
    <div class="div">

</div>
</html>


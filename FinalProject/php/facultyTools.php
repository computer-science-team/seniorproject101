<?php 
//Starting new session here. 
session_start();
$id = ($_SESSION['id']);
$fid = $_SESSION['fid'];
$username = ($_SESSION['username']);
$runiversity= ($_SESSION['university']);
$runivid= ($_SESSION['univid']);
$role = ($_SESSION['role']);
//var_dump($_SESSION['university']);
//echo $username;
include 'config.php';
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
    // Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    //echo "Connected successfully";
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
		
<html lang="en">
  <head>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!--Java Script to load Faculty tools. -->
<script>
	$(document).ready(function(){
	$("button").click(function(){
     
	var me = $(this);
	var urlAdd = me.val();

	if(urlAdd)
{
        $.post('facultyTools&universityTools_receiver.php', { url: urlAdd}, function(data){

	    if (data == 0) {
		location.reload();
        }
        }).fail(function() {
         
            // just in case posting your form failed
            alert( "Posting failed." );
             
        });
}
 	
        // to prevent refreshing the whole page page
        return false;
 
    });
});
</script>
	
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
    <title>FacultyToolpage</title>
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
			<a class="navbar-brand" href="#">FacultyTools</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Navigation<span class="caret"></span></a>
				<ul class="dropdown-menu">
				  
				  <li><a href= "<?php echo $go ?>">Profile Page</a></li>
				  <li><a href="universitysearch.php">Search All Universities</a></li>
                  <li><a href="facultySearch.php">Faculty Search</a></li>
                 
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
           
		 <form id='userForm'>
		 <div id="divButtons">

        </div>
		<!--Creating new table with Bold Title using <Strong> tags. 
		    Used <Tr> <TD> tags to create row and col for the table. -->
	     <p id="demo"></p>
		<?php
		$selectFirstQuery = "SELECT * FROM tools WHERE idnums  = '". $fid ."'";
		$queryResult = $mysqli->query($selectFirstQuery);
		$foundRows = $queryResult->num_rows;
		//if row is get toolkit of university
		if($foundRows > 0)
		{
		    echo"These are all the tools for the faculty member";
		    echo "<table border='5' style ='border-collapse: collapse;
    width: 100%;'>";
		    echo "<tr><td><strong>Name</strong></td><td><strong>Category</strong></td><td ><strong>Website</strong></td><td><strong>Add to Toolkit</strong></td><tr>";
		    while($row=mysqli_fetch_assoc($queryResult)){
		        
		    $url2 = $row['url'];
		    $pieceOfURL = substr($url2, 0, 30);
			     
		        
		        echo "<tr><th>{$row['toolname']}</th><th>{$row['category']}</th><th id = 'temp'>$pieceOfURL</th><th ><button style = ' background: black; margin-left: 30%; border-radius:50px;border: 2px solid black;' type='submit' name='Add' value = {$row['url']}>Add</button></th>";
		            
		    }
		   
		}//ifr] rows
		//User toolkit
		
		?>
		</form>
		
		  <script type="text/javascript">
	    
	    var b = <?php echo json_encode($foundRows2); ?>;
	    var js_array =<?php echo json_encode($result_array);?>;
	    var js_array2 =<?php echo json_encode($result_array2);?>;
            var arrOptions = new Array();
                arrOptions= js_array;
            for (var i = 0; i < arrOptions.length; i++) {
                var btnShow = document.createElement("input");
                btnShow.setAttribute("type", "button");
		btnShow.style.color = "red";
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
            </div>
</div>
 
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>

<?php
include 'popup.php';

 
function ifsessionExists(){
    //check if session exists?
    if (isset($_SESSION['count'])){
    return true;
    }
    else
    {
    return false;
    }
}
 
if(ifsessionExists())
{
	
    $count = '1';
    if($_SESSION['count'] == $count)
{
$_SESSION['count'] = '0';

$path = '1';
if($_SESSION['path'] == $path)
{
//replace with popup that says their already a tool in your toolkit with that url
print $sameTools;
}
}
 }
?>		

		</body>  
       
</html>

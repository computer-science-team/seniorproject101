<?php 
session_start();
$id = ($_SESSION['id']);
$username = ($_SESSION['username']);
$runivid= ($_SESSION['runivid']);
$role = ($_SESSION['role']);
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
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile<span class="caret"></span></a>
				<ul class="dropdown-menu">
				  
		<li><a href= "<?php echo $go ?>" >Profile Page</a></li>
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
	     <p id="demo"></p>
		<?php
		$selectFirstQuery = "SELECT * FROM tools WHERE idnums  = '". $runivid ."'";
		$queryResult = $mysqli->query($selectFirstQuery);
		$foundRows = $queryResult->num_rows;
		//if row is get toolkit of university
		if($foundRows > 0)
		{
		    echo"These are all the tools for the university";
		    echo "<table border='1'>";
		    echo "<tr><td>Name</td><td>Category</td><td>Website</td><td>Add to Toolkit</td><rr>";
		    while($row=mysqli_fetch_assoc($queryResult)){
		        
		    $url2 = $row['url'];
		    $pieceOfURL = substr($url2, 0, 30);    
   
		        //echo "<tr><td>{$row['toolname']}</td><td>{$row['category']}</td><td>{$row['url']}</td><td>{$row['url']}</td>";
		        echo "<tr><th>{$row['toolname']}</th><th>{$row['category']}</th><th id = 'temp'>$pieceOfURL</th><th ><button style = ' background: red; margin-left: 30%;' type='submit' name='Add' value = {$row['url']}>Add</button></th>";
		            
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
print $pageStart1;
}
}
 }
?>
		</body>

</html>

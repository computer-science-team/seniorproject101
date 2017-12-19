<?php
//Starting session
session_start();
$id = ($_SESSION['id']);
$username = ($_SESSION['username']);
$runiversity= ($_SESSION['university']);
$runivid= ($_SESSION['univid']);
$role = ($_SESSION['role']);
//Prints tool removed
if (!empty($_SESSION['message'])) {
    echo '<p class="message"> '.$_SESSION['message'].'</p>';
    unset($_SESSION['message']);
}
include 'config.php';
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
    // Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  
$role2 = "yes";
$go = "";            
            if (strcmp($role, $role2) !== 0){
        		$go = "lastpage.php";
			
			}
		else{
		$go ="lastpage2.php";
		    }

?>
<!DOCTYPE html>


		
	<html>
		
	<head>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
	//Script will load data from database.
	$(document).ready(function(){
	$("button").click(function(){
     
	var me = $(this);
	var urlDelete = me.val();

	if(urlDelete)
{
        $.post('deleteTools_receiver.php', { url: urlDelete}, function(data){

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
			<a class="navbar-brand" href= "<?php echo $go ?>">view Toolkit</a>
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
		 <form id='userForm'>
		
		<?php
		//Display user's toolkit
		$selectFirstQuery = "SELECT * FROM tools WHERE idnums  = '". $id ."'";
		$queryResult = $mysqli->query($selectFirstQuery);
		$foundRows = $queryResult->num_rows;
		//Creating table using PHP injecting HTML.
		//checks if anything in tool kit
		if($foundRows > 0)
		{
		    
		      echo "<table border='5' style ='border-collapse: collapse;
    width: 100%;'>";
		   echo "<tr><td><strong>Name</strong></td><td><strong>Category</strong></td><td ><strong>Website</strong></td><td><strong>Delete From Toolkit</strong></td><tr>";
		    while($row=mysqli_fetch_assoc($queryResult)){    
		    $url2 = $row['url'];
		    $pieceOfURL = substr($url2, 0, 30);
			     
		        echo "<tr><th>{$row['toolname']}</th><th>{$row['category']}</th><th id = 'temp'>$pieceOfURL</th><th ><button style = ' background: black; margin-left: 30%; border-radius:50px;' type='submit' name='Delete' value = {$row['url']}>Delete</button></th>";
		            
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
$path2 = '2';
if($_SESSION['path'] == $path)
{
//replace with popup that says their already a tool in your toolkit with that url
print $toolDeleted;
}
else if($_SESSION['path'] == $path2)
{
print $toolDeleteError;
}
}
 }
?>


    </body>
</html>

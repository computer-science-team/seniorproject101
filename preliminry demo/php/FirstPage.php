<?php

// php select option value from database

$servername = "localhost";
$user = "root";
$passwd = "Liger124!";
$dbname ="accounts";

// connect to mysql database

$connect = mysqli_connect($servername, $user, $passwd, $dbname);

// mysql select query
$query = "SELECT * FROM `universities`";

$result = mysqli_query($connect, $query);

$options = "";

while($row = mysqli_fetch_array($result))
{
    $options = $options."<option>$row[name]</option>";
}

?>
<!doctype html>
<html>
	<head>

<!------------------------------------------------------->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function(){
    $('#userForm').submit(function(){
     
var sel = document.getElementById('subjects');
  var option = sel.options[sel.selectedIndex].value;
  var option2 = option.toString();

        $.post('post_receiver.php', { name: option2}, function(data){
	    if (data == 0) {

	//location.replace('FirstPage.php');
		location.reload();
        }
             
        }).fail(function() {
         
            // just in case posting your form failed
            alert( "Posting failed." );
             
        });
 
        // to prevent refreshing the whole page page
        return false;
 
    });
});
</script>
<!------------------------------------------------------->


	<meta charset="utf-8">
		<title>Welcome!</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
	</head>
	<body>

	<div id='response'></div>

        <div class = "wrapper">
		<div class="form-signin">
		<div class="signUpBox">
			<h2>Welcome!</h2>
			<form id='userForm'>
				
				<p>Please choose your University: </p>
				<select id="subjects">
    				<?php echo $options;?>
				</select>
				<input type='submit' value='Submit' />
				
				<p>Already have an account?</p>
			        <p><a href="login.php">Log In</a></p>
				<p><a href="addUniversity.php">Add University</a></p>
				<p><a href="../html/aboutUs.html">About Us!</a></p>
				
			</form>
		</div>
        </div>
        </div>
<?php
session_start();
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
$university = $_SESSION['university'];
//var_dump($university);
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$selectFirstQuery = "SELECT univid FROM universities WHERE name  = '". $university ."'";
$queryResult = $mysqli->query($selectFirstQuery);
//$result = $selectFirstQuery->row();

$foundRows = $queryResult->num_rows;
//if row is found email is in use
if($foundRows > 0)
{   
$_SESSION['university']= $university;
print $pageStart1;
 
    while($row = mysqli_fetch_assoc($queryResult)){
    	$_SESSION['univid'] = $row['univid'];
    }
	header( "refresh:2; url=signup.php");
    //You will be redirected to the Sign up page.

    
}
  }
}



?>





	</body>
</html>

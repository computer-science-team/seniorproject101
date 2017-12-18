
<!doctype html>
<html>
	<head>

<!------------------------------------------------------->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	$(document).ready(function(){
	$('#userForm').submit(function(){
     
	var university = $("#university").val();
        $.post('addUniversity_receiver.php', { name: university}, function(data){
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
				
                <p><strong>Please enter name of your University:</strong> </p>
                <p><input type="text" name="university" id="university" class="form-control form-rounded"  placeholder="enter your university name" required/></p>
                <p><input type='submit' value='Submit' class="button" /></p>
				
                <p><strong>Already have an account?</strong></p>
			        <p><a href="login.php">Log In</a></p>
				
				
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
include 'config.php';
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
else{
     //check if university is already registered
    $selectFirstQuery = "SELECT * FROM universities WHERE name  = '". $university ."'";
    $queryResult = $mysqli->query($selectFirstQuery);
    $foundRows = $queryResult->num_rows;
    //No university found - University is being registered
    if($foundRows == 0)
    {
        $sql = "INSERT INTO universities(name)" . "VALUES ('$university')";
       
        if ($mysqli->query($sql)==true)
        {   //university
            $selectFirstQuery = "SELECT univid FROM universities WHERE name  = '". $university ."'";
            $queryResult = $mysqli->query($selectFirstQuery);
            $foundRows = $queryResult->num_rows;
            //get university id num
            if($foundRows > 0){
                while($row=mysqli_fetch_assoc($queryResult)){
                    $_SESSION['univid'] = $row['univid'];
                } 
            }
        }
    }
print $pageStart2;
header( "refresh:2; url=signup.php");
}
  }
}
?>
	</body>
</html>
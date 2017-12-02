<?php
session_start();
// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "accounts";
include 'popup.php';
// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

$m = $pageStart1;

?>

<!DOCTYPE html>

<html>

    <head>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<script>
	$(document).ready(function(){
	$('#userForm').submit(function(){
     
	var university = $("#university").val();


        // show that something is loading
         
        /*
         * 'post_receiver.php' - where you will pass the form data
         * $(this).serialize() - to easily read form data
         * function(data){... - data contains the response from post_receiver.php
         */
        $.post('D_reciever.php', { name: university}, function(data){
	
            // show the response
            var current = <?php echo json_encode($pageStart1); ?>;
            // show the response
            $('#response').html(current);

		//window.location.href = "loadingpage.php";

             
        }).fail(function() {
         
            // just in case posting your form failed
            alert( "Posting failed." );
             
        });
 	
        // to prevent refreshing the whole page page
        return false;
 
    });
});
</script>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">


    </head>
<!------------------------------------------------------->

    <body>
<div id='response'></div>
<form id='userForm'>
<input type="text" name="university" id="university" placeholder="University" />
<div><input type='submit' value='Submit' /></div>
</form>

<div id='response'></div>
 <div />
<p id="demo"></p>
    </body>

</html>

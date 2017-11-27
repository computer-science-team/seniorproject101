<?php

// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "accounts";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `universities`";

// for method 1

$result1 = mysqli_query($connect, $query);


$result2 = mysqli_query($connect, $query);

$options = "";

while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option>$row2[name]</option>";
}


if(isset($_POST['submit'])){ 
    echo "$options";
} 


?>

<!DOCTYPE html>

<html>

    <head>

        <title> PHP SELECT OPTIONS FROM DATABASE </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">


    </head>

    <body>
<div id='response'></div>
<form id='userForm'>
<select id="subjects">
    <?php echo $options;?>
</select>
<div><input type='submit' value='Submit' /></div>
</form>

<div id='response'></div>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
<script>
$(document).ready(function(){
    $('#userForm').submit(function(){
     
var sel = document.getElementById('subjects');
  var option = sel.options[sel.selectedIndex].value;
  var option2 = option.toString();



        // show that something is loading
        $('#response').html("<b>Loading response...</b>");
         
        /*
         * 'post_receiver.php' - where you will pass the form data
         * $(this).serialize() - to easily read form data
         * function(data){... - data contains the response from post_receiver.php
         */
        $.post('post_receiver.php', { name: option2}, function(data){
             
            // show the response
            $('#response').html(data);
		window.location.href = "loadingpage.php";
             
        }).fail(function() {
         
            // just in case posting your form failed
            alert( "Posting failed." );
             
        });
 
        // to prevent refreshing the whole page page
        return false;
 
    });
});
</script>
    </body>

</html>
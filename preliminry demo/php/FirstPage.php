<?php
include 'popup.php';
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
     
	var university = $("#university").val();

        $.post('FirstPage_receiver.php', { name: university}, function(data){
	    if (data == 1) {
            var popup = <?php echo json_encode($pageStart1); ?>;
            $('#response').html(popup);

	    window.location.href = "signup.php";
        }
	   else if(data == 2){
	    var popup = <?php echo json_encode($pageStart2); ?>;
            $('#response').html(popup);

	    window.location.href = "signup.php";
	}
	   else{
            var current = <?php echo json_encode($pageStart); ?>;

            $('#response').html(current);
		//alert( data );
	}
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
				
				<p>Please enter name of your University: </p>
				<input type="text" name="university" id="university" placeholder="enter your university name" />
				<input type='submit' value='Submit' />
				
				<p>Already have an account?</p>
			        <p><a href="login.php">Log In</a></p>
				<p><a href="../html/aboutUs.html">About Us!</a></p>
				
			</form>
		</div>
        </div>
        </div>
	</body>
</html>

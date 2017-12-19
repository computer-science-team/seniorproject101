<!DOCTYPE html>
<html lang="en">
  <head>

<!------------------------------------------------------->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  
<script>
	//Adding java script to add item in a table
	$(document).ready(function(){
	$('#userForm').submit(function(){
     
	var Toolname = $("#toolname").val();
	var Category = $("#category").val();
	var Url = $("#url").val();
	var Private = $("#privates").val();


        $.post('addTool2_receiver.php', { toolname: Toolname, category: Category, url: Url, private: Private}, function(data){
	    if (data == 0) {

	//alert(data);
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

     <title>New Tool</title>
  		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
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
			<a class="navbar-brand" href="#">New Tool</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
                
				
                <li><a href="../index.html">Logout</a></li>
			</ul>
		</div>
	</div>
</nav>

		<!--Creating table to display tools. -->
        <div class = "wrapper">
		<div class="form-signin">
            <h1> Add to your Toolkit</h1>
         <form id='userForm'>
             <p><strong>By creating your tool</strong></p>
             <p><strong>Tool:</strong> 
				<br><input type="text" name="toolname" id="toolname" class="form-control form-rounded"  placeholder="toolname" required/></p>
             <p><strong>Category:</strong> 
				<br><input type="text" name="category" id="category" class="form-control form-rounded"  placeholder="category" required/></p>
             <p><strong>Location:</strong> 
				<br><input type="text" name="url" class="form-control form-rounded"  id="url" placeholder="url" required/></p>
             <p><strong>Private Tool:</strong>
				<br><select id="privates" name="private">
				<option value="yes">Yes</option>
				<option value="no">No</option>
				</select></p>

				
		<p><input type='submit' value='Submit' class="button" /></p>
				
	  
    </form>
        
        
	</div>
    </div>
	<!--Pop Up Code begins from here. -->
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

    $path = '1';
    $path2 = '2';
    $path3 = '3';
    $path4 = '4';
    $path5 = '5';

    if($_SESSION['path'] == $path)
    {
      print $urlcorrect;
    }
    else if($_SESSION['path'] == $path2)
    {
      print $sameUrl;
    }
    else if($_SESSION['path'] == $path3)
    {
      print $toolAdded;
    }
    else if($_SESSION['path'] == $path4)
    {
      print $sameUrlUniversity;
    }
    else if($_SESSION['path'] == $path5)
    {
      print $toolAddedUni;
    }
}
}
?> 	
    </body>
</html>

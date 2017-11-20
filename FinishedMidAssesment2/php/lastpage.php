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
$selectFirstQuery = "SELECT * FROM tools WHERE idnums  = '". $id ."'";
$queryResult = $mysqli->query($selectFirstQuery);
$foundRows = $queryResult->num_rows;
$result_array = array();
$result_array2 = array();
$result_array3 = array();
        while ($row=mysqli_fetch_assoc($queryResult)) {
		$result_array[] = $row['url'];
		$result_array2[] = $row['toolname'];
		$result_array3[] = $row['category'];
            
        }
?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Tool Page</title>
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
			<a class="navbar-brand" href="#">UserTools</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile<span class="caret"></span></a>
				<ul class="dropdown-menu">
				  
				  <li><a href="studentProfilePage.php">Profile Page</a></li>
				  <li><a href="universitysearch.php"><?php $_SESSION['id']=$id;
		$_SESSION['username']=$username; $_SESSION['runiversity']=$runiversity;  $_SESSION['runivid']=$runivid; ?>Search All Universities</a></li>
                  <li><a href="facultySearch.php"><?php $_SESSION['id']=$id;
		$_SESSION['username']=$username; $_SESSION['runiversity']=$runiversity;  $_SESSION['runivid']=$runivid; ?>Faculty Search</a></li>
                 <li><a href="addTool2.php">Add Your Own Tools</a></li>
                    
                  <li><a href="deleteTools.php"><?php $_SESSION['id']=$id;
		$_SESSION['username']=$username; $_SESSION['runiversity']=$runiversity;  $_SESSION['runivid']=$runivid; ?>Delete Tool</a></li>    
				</ul>
			  </li>
                <li><a href="../index.html">Logout</a></li>
			</ul>
		</div>
	</div>
</nav>
    
        
        <div class="container-fluid">
        <div class="jumbotron">
            
            <h3> Welcome <?php echo $username;?> !! Hope you are having a good day.</h3>
            
        <table class = "table table-bordered table-inverse table-responsive table-hover table-sm" id="table"><tr></tr></table>
        <div id="divButtons">


        </div>





        <script type="text/javascript">
	    var b = <?php echo json_encode($foundRows); ?>;
	    var js_array =<?php echo json_encode($result_array);?>;
	    var js_array2 =<?php echo json_encode($result_array2);?>;
	    var js_array3 =<?php echo json_encode($result_array3);?>;
            var arrOptions = new Array();
                arrOptions= js_array;
	    var table = document.getElementById("table");
            for (var i = 0; i < arrOptions.length; i++) {
		var row = table.insertRow(i + 1);
		var cell = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		var cell4 = row.insertCell(3);
		
		var shortURL = js_array[i].substring(0,30);
		cell.innerHTML = js_array2[i];
		cell2.innerHTML = js_array3[i];
		cell3.innerHTML = shortURL;
	
                var btnShow = document.createElement("input");
                btnShow.setAttribute("type", "button");
                btnShow.value = "Go";
                var optionPar = arrOptions[i];
                btnShow.onclick = (function(opt) {
    		return function() {
      		showParam(opt);
   		};
		})(arrOptions[i]);
                document.getElementById('divButtons').appendChild(btnShow);
		cell4.appendChild( btnShow );
            	}
		
		function myFunction() {
    		var table = document.getElementById("table");
    		var header = table.createTHead();
    		var row = header.insertRow(0);
    		var cell = row.insertCell(0);
   		cell.innerHTML = "<center><b><h2>Name</h2></b></center>";
		var cell = row.insertCell(1);
		cell.innerHTML = "<center><b><h2>Category</h2></b></center>";
		var cell = row.insertCell(2);
		cell.innerHTML = "<center><b><h2>Url</h2></b></center>";
		var cell = row.insertCell(3);
		cell.innerHTML = "<center><b><h2>Tools</h2></b></center>";
		}
		myFunction();
            function showParam(value) {
               
		window.open(value);
            }
	     
        </script>
	


        </div>
        </div>
        
    </body>
    <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
</html> 

<?php
session_start();
$id = ($_SESSION['id']);
$univid=$_SESSION['univid'];
//var_dump($_SESSION['university']);
//echo $username;
$servername = "localhost";
$user = "root";
$passwd = "Liger124!";
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
<html>
    <head>
	<table id="table" border="1"><tr></tr></table>
	
    </head>
    <body>

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
	

<style type="text/css">

table {border: 1px solid black;
	border-collapse:collapse;
	width:100%;
}
th, td {
    text-align: left;
    padding: 8px;
}
tr:nth-child(even){background-color: #2BFF00}

</style>

    </body>
</html> 

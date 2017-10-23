<?php
$univid= 1;
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
$selectFirstQuery = "SELECT * FROM tools WHERE idnums  = '". $univid ."'";
$queryResult = $mysqli->query($selectFirstQuery);
$queryResult2 = $mysqli->query($selectFirstQuery);
$foundRows = $queryResult->num_rows;
$foundRows2 = $queryResult2->num_rows;
$result_array = array();

        echo '<table border="1">';
        while ($row=mysqli_fetch_assoc($queryResult)) {
                echo "<tr>";
                echo "<td>" . $row['toolname'] . "</td>";
                echo "<td>" . $row['category'] . "</td>";
                echo "<td>" . $row['url'] . "</td>";
                echo "</tr>";
		$result_array[] = $row['url'];
            
        }
        echo "</table>";
?>
<html>
    <head>
        <title></title>
    </head>
    <body>

        <div id="divButtons">

        </div>

        <script type="text/javascript">

	    var b = <?php echo json_encode($foundRows2); ?>;
	    var js_array =<?php echo json_encode($result_array);?>;
            var arrOptions = new Array();

            for (var i = 0; i < b; i++) {
                arrOptions[i] = js_array[i];
            }

            for (var i = 0; i < arrOptions.length; i++) {
                var btnShow = document.createElement("input");
                btnShow.setAttribute("type", "button");
                btnShow.value = "Show Me Option";
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
    </body>
</html>
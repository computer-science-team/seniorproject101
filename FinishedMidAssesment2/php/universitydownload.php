<!doctype html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UniversityDownloadpage</title>
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
			<a class="navbar-brand" href="#">Download</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
                
				
                <li><a href="../index.html">Logout</a></li>
			</ul>
		</div>
	</div>
    </nav>
        <div class="jumbotron">
       <div class="container">
		<div class="universitydownload">
			<h2>Download Your University's Guidelines for Success</h2>
				<form method="post">
					<p>Enter the name of your University: </p>
					<input type="text" name="university" placeholder="university" value="<?php if(isset($_POST['university'])){ echo $_POST['university'];} ?>"/>
					<input type="submit" name="submit" value="Submit">
				</form>
		</div>
            </div>
        </div>
       <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script> 
	</body>
</html>
<?php 
if(isset($_POST['submit'])){ 

    if (!$_POST['university']){
        echo "<br/>-Please enter the name of your university";
    }
        if(isset($_POST['university'])){
            session_start();//starts session
            $_SESSION['message'] = '';
            $servername = "localhost";
            $user = "root";
            $passwd = "Liger124!";
            $dbname ="accounts";
            $runiversity = $_POST['university'];
            $mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
            // Check connection
            if ($mysqli->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
    
            $selectFirstQuery = "SELECT univid FROM universities WHERE name  = '". $runiversity ."'";
            $queryResult = $mysqli->query($selectFirstQuery);
            $foundRows = $queryResult->num_rows;
            
            //if row is found university is in database
            if($foundRows > 0){   
                $_SESSION['university']= $runiversity;
                //echo "<br/>Your college has been found.";
                while($row = mysqli_fetch_assoc($queryResult)){
            	
                    $_SESSION['runivid'] = $row['univid'];//Session var may not be needeed
            	   
                }
                $runivid=$_SESSION['runivid'];
                //search for file in database
                $selectFirstQuery = "SELECT guide_fname,guide_path FROM universities WHERE univid  = '". $runivid ."' AND guide_path IS NOT NULL";
                $queryResult = $mysqli->query($selectFirstQuery);
            	$foundRows = $queryResult->num_rows;
                if($foundRows > 0){  
                	while($row = mysqli_fetch_assoc($queryResult)){
            			$path = $row['guide_path'];
               			$file_name = $row['guide_fname'];
            	   
                	}
                	echo "found file";
                	header("Content-Type: application/pdf");
                    header("Content-Disposition: attachment; filename='".$file_name."'");
                    header('Expires: 0');
                    readfile($path);
                    exit;
                }
            }
            if($foundRows===0){
                	echo "<br/>No Guidelines for Success document has been uploaded";
            	}
            //Row not found-file not in database
           
    }//post university
    else{
            	echo "<br/>Your college is not in our database";
            	
  	}
}//isset
?>



<?php 
            session_start();//starts session
            $_SESSION['message'] = '';
            $servername = "localhost";
            $user = "root";
            $passwd = "";
            $dbname ="accounts";
            $runiversity = $_SESSION['university'];
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
            //no guidelines for success is available-redirect to profile page with message 
            if($foundRows===0){
                $_SESSION['message'] = "No Guidelines for success is available for ".$runiversity."";
                header("location:studentProfilePage.php");
                
            //Row not found-file not in database
            }
   
   
?>

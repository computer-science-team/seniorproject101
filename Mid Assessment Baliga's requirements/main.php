<?php
if(isset($_POST['submit'])){ 

    if (!$_POST['university']){
        echo "<br/>-Please enter the name of your university";
    }
        if(isset($_POST['university']) && ($_POST['university'])){
            session_start();//starts session
            $_SESSION['message'] = '';
            $servername = "localhost";
            $user = "root";
            $passwd = "";
            $dbname ="accounts";
            $university = $_POST['university'];
            //var_dump($university);
            $mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
            // Check connection
            if ($mysqli->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
    
            $selectFirstQuery = "SELECT univid FROM universities WHERE name  = '". $university ."'";
            $queryResult = $mysqli->query($selectFirstQuery);
        
            $foundRows = $queryResult->num_rows;
            
            //if row is found university is in database
            if($foundRows > 0){   
            $_SESSION['university']= $university;
            echo "<br/>Your college has been found.";
            while($row = mysqli_fetch_assoc($queryResult)){
        	
        	   $_SESSION['univid'] = $row['univid'];
            }
            echo "<br/>You will be redirected to the Sign up page.";
            header( "refresh:4; url=test.php" );
            }
            //Row not found-university not in database
            else{
            echo "<br/>Your college is not in our database";
            echo "<br/>Please return at a later date to see if your university has been added";
            }
    }//post university
}//isset
?>
<!doctype html>
<html>
	<style>
    body {
        background-color: blue;
    }
    h1 {
        background-color: blue;
    }
    p {
        background-color: blue;
    }
    </style>
	<body>
		<div class="signUpBox">
			<h2>Welcome!</h2>
				<form method="post">
					<p>Enter the name of your University: </p>
					<input type="text" name="university" placeholder="university" value="<?php if(isset($_POST['university'])){ echo $_POST['university'];} ?>"/>
					<input type="submit" name="submit" value="Submit">
					<p><a href="changepassword.php"></a>Already have an account?</p>
					<p><a href="login.php">Log In</a></p>
					<p><a href="forgot.php">Forget Password?</a></p>
			</form>
		</div>
	</body>
</html>
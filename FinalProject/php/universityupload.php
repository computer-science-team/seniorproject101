<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UniversityUploadPage</title>
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
			<a class="navbar-brand" href="facultyProfilePage.php">Profile Page</a>
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
     <div class = "universityupload">   
<h2>Upload Your University's Guidelines for Success(PDF format Only)</h2>
    
		
<form method="post" enctype="multipart/form-data" >
    <p>Upload File:
    <input type="file" name="f" class="upload" /></p>

    <p><input type ="submit" name="submit1" value="submit" class="buttonUpload" /></p>
</form>
    </div>
    </div>
    </div>
   <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script> 
</body>
</html>    
<?php 
session_start();//starts session
//if (!empty($_SESSION['message'])) {
    //echo '<p class="message"> '.$_SESSION['message'].'</p>';
    //unset($_SESSION['message']);
//}
$runiversity = $_SESSION['runiversity'];
//$runiversity = $_SESSION['$runiversity'];

include 'config.php';
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database
    // Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//Check if university has existing guidelines pdf
$sql="SELECT guide_path FROM universities WHERE name='".$runiversity."' AND guide_path IS NOT NULL";
$queryResult=$mysqli->query($sql);
$foundRows = $queryResult->num_rows;
if($foundRows > 0){
    include 'popup.php';
    print $uploadWarning;
    
    
}    
if(isset($_POST['submit1'])){ 
    if(!$_FILES['f']){
        include 'popup.php';
        print $selectFileWarning;
    }
   
        
        $runiversity = $_SESSION['runiversity'];
        //$_SESSION['message'] = '';
        
        $selectFirstQuery = "SELECT univid FROM universities WHERE name  = '". $runiversity ."'";
        $queryResult = $mysqli->query($selectFirstQuery);
        $foundRows = $queryResult->num_rows;
        //if row is found university is in database
        if($foundRows > 0){
            $_SESSION['university']= $runiversity;
           // echo "<br/>Your college has been found.";
            while($row = mysqli_fetch_assoc($queryResult)){
                
                $_SESSION['runivid'] = $row['univid'];
                
            }
            $runivid=$_SESSION['runivid'];
            
            //checking if a file exists to prevent university from having more than 1 
            //guideline for success
            $sql="SELECT guide_path FROM universities WHERE univid='".$runivid."' AND guide_path IS NOT NULL";
            $queryResult=$mysqli->query($sql);
            
            $foundRows = $queryResult->num_rows;
            if($foundRows > 0){
               // $_SESSION['message'] = "There is already a Guidelines for Success available for " .$runiversity. " . 
//If you upload a document the current document will be replaced.";
               
               // header("Refresh:0");
                while($row = mysqli_fetch_assoc($queryResult)){
                    
                    $pdfname = $row['guide_path'];
                    
                    
                }
                
                if((!$pdfname==NULL)&&(!$_FILES['f'])){
                
                //pdf is in directory where file exist
                unlink($pdfname);//previous file deleted
                }
                
            
            }
            
           
            
            //insert file in database
            $file = $_FILES['f'];
            $file_name = $file['name'];
            $fnm= $_FILES["f"]["name"];//name of original file
            
            $file_ext = explode('.', $file_name);//seperates file ext and name at period
            $file_ext = strtolower(end($file_ext));//gets pdf ext changes to lower case if necessary
            $allowed = 'pdf';//used to checkfor pdf file
                        if($allowed===$file_ext){
                
                $file_name_new =  uniqid('',true). '.'.$file_ext;
                $dst = 'guideline_uploads/'. $file_name_new;
                move_uploaded_file($_FILES["f"]["tmp_name"],$dst);
                $query = "UPDATE universities SET guide_fname = '".$fnm."', guide_path = '".$dst."' WHERE univid = '".$runivid."'";
                if($mysqli->query($query)== true){
                    //echo "<br/>File Uploaded.";
                    include 'popup.php';
                    print $uploadSuccess;
                    header("Refresh:2");
                }
                else{
                    include 'popup.php';
                    print $uploadFaliure;
                    header("Refresh:2");
                }
            }
            else{
                if($allowed!=$file_ext){
               include 'popup.php';
                print $wrongFormat;
                header("Refresh:2");
            }
                else{
               include 'popup.php';
                print $requestRightFormat ;
                header("Refresh:2");
                }
                
            }
        }
 
}//isset post submit1
?>

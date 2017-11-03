<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="application/pdf" />
<title>Untitled Document</title>
</head>
<body>
<h2>Upload Your University's Guidelines for Success(PDF format Only)</h2>
<form method="post" enctype="multipart/form-data">
Upload File <input type="file" name="f"/>
<p>Enter the name of your University: </p>
<input type="text" name="university" placeholder="university" value="<?php if(isset($_POST['university'])){ echo $_POST['university'];} ?>"/>
					
<input type ="submit" name="submit1" value="submit"/>
</form>
</body>
<?php 
if(isset($_POST['submit1'])){ 

    if(!$_POST['university']){
        echo "<br/>-Please enter the name of your university";
    }
    if(!$_FILES['f']){
        echo "<br/>-Please select a file";
    }
    if(isset($_POST['university'])){
        session_start();//starts session
        $_SESSION['message'] = '';
        $servername = "localhost";
        $user = "root";
        $passwd = "";
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
                
                while($row = mysqli_fetch_assoc($queryResult)){
                    
                    $pdfname = $row['guide_path'];
                    
                }
                if(!$pdfname==NULL){
                
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
                    echo "<br/>File Uploaded.";
                }
                else{
                    echo "file not uploaded";
                }
            }
            else{
                echo "Please upload a pdf file. This format is unsupported";
            }
        }
    }//2nd isset
    
}//isset post submit1
?>
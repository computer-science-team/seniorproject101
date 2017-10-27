<?php 

session_start();//starts session
$_SESSION['message'] = '';
$servername = "localhost";
$user = "root";
$passwd = "";
$dbname ="accounts";
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);//login to database

if ($_SERVER[ 'REQUEST_METHOD'] == 'POST')
{
    //two passwords are equal to each other
    if($_POST['password'] == $_POST['confirmpassword'])//names of two fields
    {
        //print_r($_FILES); die;
        
        $username = $mysqli->real_escape_string($_POST['username']);//allow html to insert username
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = md5($_POST['password']);//hashes password
        $avatar_path = $mysqli->real_escape_string('images/'.$_FILES['avatar']['name']);
        //make sure that the file type is image
        if (preg_match("!image!",$_FILES['avatar']['type']))
        {
            
            //copy image to image folder
            if (copy($_FILES['avatar']['tmp_name'], $avatar_path))
            {
                $_SESSION['username'] = $username;
                $_SESSION['avatar'] = $avatar_path;
                
                //
                $selectFirstQuery = "SELECT * FROM users WHERE email  = '". $email ."'";
                $queryResult = $mysqli->query($selectFirstQuery);
                $foundRows = $queryResult->num_rows;
                
                if($foundRows > 0) {
                    echo "Your email is already registered";
                }
                
//                 $query = "SELECT * FROM users WHERE email  = '". $email ."'";
//                 $emailduplicate = null;
//                 if ($mysqli->int($query) > 0)
//                 {
//                     $_SESSION['email already exists'];
//                     //$emailduplicate = 'Email Address is Already in Use.  Please <a href="http://www.website.com/test/activation.php?userid=Y">Retrieve Your Password</a>.';
//                     //$errors['duplicatefound'] = true;
//                 }
                
                
              //  $squel = "SELECT username, avatar FROM users";
                $sql = "INSERT INTO users(username, email, password, avatar)"
                    . "VALUES ('$username','$email','$password','$avatar_path')";
                    //if the query is successful, redirect to welcome.php page, done
                    
                    if ($mysqli->query($sql)==true)
                    {
                        $_SESSION['message'] = 'Registration succesful! Added username to the database!';
                        header("location: welcome.php");
                    }
//                     else
//                     {
//                         $_SESSION['user could not be added to database!'] ;
                        
//                     }
            }
            else
            {
                $_SESSION['message'] = "File upload failed!";
            }
        }
        else
        {
            $_SESSION['message'] = "Please only upload GIF, JPG OR PNG images!";
        }
    }
    else
    {
        $_SESSION['message'] = "Two passwords do not match!";
    }
}

?>

<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <input type="text" placeholder="User Name" name="username" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar" accept="image/*" required /></div>
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>

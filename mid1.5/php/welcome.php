<link rel="stylesheet" href="form.css">
<?php 
/* welcome.php */

//$_SESSION variables become available on this page
session_start(); 
?>
<div class="body content">
<div class="welcome">
<div class="alert alert-success"><?= $_SESSION['message'] ?></div>
    <img src="<?= $_SESSION['avatar'] ?>"><br />
    Welcome <span class="user"><?= $_SESSION['username'] ?></span>
    <?php 
$servername = "localhost";
$user = "root";
$passwd = "";
$dbname ="accounts";
$mysqli =mysqli_connect($servername,$user,$passwd,$dbname);
    $sql = "SELECT username, avatar FROM users";
    //$result = mysqli_result object
    $result = $mysqli->query( $sql ); 
    ?>
    <div id='registered'>
    <span>All registered users:</span>
    <?php
    //returns associative array of fetched row
    while( $row = $result->fetch_assoc() ){ 
        echo "<div class='userlist'><span>".$row['username']."</span><br />";
        echo "<img src='".$row['avatar']."'></div>";
    }
?>  
</div>
</div>
</div>

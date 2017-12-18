<?php
session_start();

 //include 'popup.php';

$_SESSION['count'] = '1';

if(isset($_SESSION['university'])){ 

    $_SESSION['fullname'] = "$_POST[name]";
    $_SESSION['gender']= "$_POST[gender]";
    $_SESSION['dob']= "$_POST[dob]";
    $_SESSION['username'] = "$_POST[username]";//allow html to insert username
    $_SESSION['email'] = "$_POST[email]";
    $_SESSION['password'] = md5("$_POST[password]");//hashes password
    $_SESSION['role'] = "$_POST[role]";
	echo 0;





}
else
        {
	echo 0;
        //university session token doesn't exist    
        }
?>

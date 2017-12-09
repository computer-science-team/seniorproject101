<?php
session_start();
$_SESSION['count'] = '1';


    $_SESSION['fullname'] = "$_POST[name]";
    $_SESSION['dob']= "$_POST[dob]";
    $_SESSION['username'] = "$_POST[username]";
	echo 0;
?>

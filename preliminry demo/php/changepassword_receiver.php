<?php
session_start();
$_SESSION['count'] = '1';


    $_SESSION['password'] = "$_POST[password]";
    $_SESSION['password2']= "$_POST[password2]";
	echo 0;
?>
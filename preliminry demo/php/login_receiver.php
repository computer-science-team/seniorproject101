<?php
session_start();
$_SESSION['username'] = "$_POST[username]";
$_SESSION['password'] = "$_POST[password]";
	$_SESSION['count'] = '1';
echo 0;
?>
<?php
session_start();
echo "<pre>";
     $_SESSION['university'] = "$_POST[name]";
	print_r($_SESSION['university']);
echo "</pre>";
?>
<?php
session_start();
include 'popup.php';
//echo "<pre>";
     $_SESSION['university'] = "$_POST[name]";
	//print_r($_SESSION['university']);
//echo "</pre>";
$_SESSION['count'] = '1';
//echo "1";
if(isset($_POST['name'])){ 
print $pageStart1;
}
else
{
echo "0";
}
?>
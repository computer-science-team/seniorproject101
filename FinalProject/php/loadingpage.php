<?php
// Loading page was used to take user form firstpage.php to signup.php. This Idea was eventually chucked by group members 
// As of now we are using pop ups using. jQuery. 
 header( "refresh:2; url=signup.php" );
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
  background:#423E3A;
  }
  
.loader {
display: block;
	margin: 10% auto;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

h2,h3{
	color: white;
	font-size: 50px;
}
p{
	font size: 40px;
}

</style>
</head>
<body>
<div class="container">
<div class="loader"></div>
<center>
<h2>Your University was found... </h2>
<h3> Pelase wait... You will be redirected shortly to Sign up page.</h3>
</center>
</div>

</body>
</html>


<?php
 header( "refresh:2; url=signup.php" );
?>
<!DOCTYPE html>
<html>
<head>
<style>
body{
  background: white;
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

h2{
	color: red;
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
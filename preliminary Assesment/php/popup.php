<?php

$pageStart = '<!DOCTYPE html>
<html xmlns>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Oops.. Something went wrong.</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#dialog" ).dialog();
  } );
  </script>
</head>
<body>

<div id="dialog" title="Basic dialog">
  <p>Basic dialog</p>
</div>
 
 
</body>
</html>';

$pageStart1 = str_replace(
'<div id="dialog" title="Basic dialog">
  <p>Basic dialog</p>
</div>',
'<div id="dialog" title="Basic dialog">
  <p>University is found</p>
</div>'
, $pageStart);


$pageStart2 = str_replace(
'<div id="dialog" title="Basic dialog">
  <p>Basic dialog</p>
</div>',
'<div id="dialog" title="Basic dialog">
  <p>University is not found</p>
</div>'
, $pageStart);

$loginerror = str_replace(
'<div id="dialog" title="Basic dialog">
  <p>Basic dialog</p>
</div>',
'<div id="dialog" title="Error.. ">
  <p>Username/password was incorrect.. Please try again with correct credentials. </p>
</div>'
, $pageStart);

$facultyToolsPageToolAlreadyExistError = str_replace(
'<div id="dialog" title="Basic dialog">
  <p>Basic dialog</p>
</div>',
'<div id="dialog" title="Oops..">
  <p>Tool already exist in your toolkit, try adding different tool. </p>
</div>'
, $pageStart);


?>

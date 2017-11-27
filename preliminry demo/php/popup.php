<?php

$pageStart = '<!DOCTYPE html>
<html xmlns>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
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

$passwordSuccessfullyChanged = str_replace(
'<div id="dialog" title="Basic dialog">
  <p>Basic dialog</p>
</div>',
'<div id="dialog" title="Success!">
  <p>Your password was changed successfully.</p>
</div>'
, $pageStart);

$passwordDoNotMatch = str_replace(
'<div id="dialog" title="Basic dialog">
  <p>Basic dialog</p>
</div>',
'<div id="dialog" title="Error">
  <p>Password do not match</p>
</div>'
, $pageStart);

$passwordCannotChange = str_replace(
'<div id="dialog" title="Basic dialog">
  <p>Basic dialog</p>
</div>',
'<div id="dialog" title="Error">
  <p>We were unable to change your password, please try again. </p>
</div>'
, $pageStart);

$namesDoNotMatch = str_replace(
'<div id="dialog" title="Basic dialog">
  <p>Basic dialog</p>
</div>',
'<div id="dialog" title="Error">
  <p>Names, do not match. Please try again. </p>
</div>'
, $pageStart);

$namesMatched = str_replace(
'<div id="dialog" title="Basic dialog">
  <p>Basic dialog</p>
</div>',
'<div id="dialog" title="Success">
  <p>Your name has been changed.</p>
</div>'
, $pageStart);

$emailChangedSuccessfully = str_replace(
'<div id="dialog" title="Basic dialog">
  <p>Basic dialog</p>
</div>',
'<div id="dialog" title="Success">
  <p>Your email has been successfully updated.</p>
</div>'
, $pageStart);

$emailCannotChangeError = str_replace(
'<div id="dialog" title="Basic dialog">
  <p>Basic dialog</p>
</div>',
'<div id="dialog" title="Error">
  <p>We were unable to change the email. Pelase try again with correct email in both boxes.</p>
</div>'
, $pageStart);

$genderChangeSuccessfully = str_replace(
'<div id="dialog" title="Basic dialog">
  <p>Basic dialog</p>
</div>',
'<div id="dialog" title="Success">
  <p>Your gender has been successfully updated.</p>
</div>'
, $pageStart);

$genderChangeError = str_replace(
'<div id="dialog" title="Basic dialog">
  <p>Basic dialog</p>
</div>',
'<div id="dialog" title="Error">
  <p>We were unable to change gender. Pelase try again.</p>
</div>'
, $pageStart);

$dateChangedSuccessfully = str_replace(
'<div id="dialog" title="Basic dialog">
  <p>Basic dialog</p>
</div>',
'<div id="dialog" title="Success">
  <p>Your birthdate has been successfully updated.</p>
</div>'
, $pageStart);

$changeDateError = str_replace(
'<div id="dialog" title="Basic dialog">
  <p>Basic dialog</p>
</div>',
'<div id="dialog" title="Error">
  <p>We were unable to change your birthdate. Pelase try again.</p>
</div>'
, $pageStart);

$signupErrorLast = str_replace(
'<div id="dialog" title="Basic dialog">
  <p>Basic dialog</p>
</div>',
'<div id="dialog" title="Error">
  <p>We were unable to sign you up. Please try again. </p>
</div>'
, $pageStart);

$signupUserAlreadyExist = str_replace(
'<div id="dialog" title="Basic dialog">
  <p>Basic dialog</p>
</div>',
'<div id="dialog" title="Error">
  <p>Username already exist, please choose different username and try again.</p>
</div>'
, $pageStart);

$signupEmailAlreadyExist = str_replace(
'<div id="dialog" title="Basic dialog">
  <p>Basic dialog</p>
</div>',
'<div id="dialog" title="Error">
  <p>Email already exist, please choose different email and try again.</p>
</div>'
, $pageStart);

?>

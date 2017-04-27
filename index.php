<!DOCTYPE html>
<html>
<head>
<title>Hardware Supplier</title>
<link rel="stylesheet" href="http://demos.jquerymobile.com/1.4.5/css/themes/default/jquery.mobile-1.4.5.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="http://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.js"></script>
</head>
<body>
<?php
	session_start();
	session_destroy();
	
?>
	
<div id="firstPage" data-role="page">

  <div data-role="header">Welcome to the hardware supplier</div>
  
    <a href="#register"  data-transition="slide" class="ui-btn">New User</a>
    <a href="#login"  data-transition="slide" class="ui-btn">Login</a>
	
  <div data-role="footer">Copyright 2016</div>
    
</div>

<div id="register" data-role="page">

  <div data-role="header">Register</div>
   
	<form action="register_result.php" method="post">
		
		<label for="name">First Name</label>
		<input type="text" data-clear-btn="true" name="name" id="name" value="">
		
		<label for="surname">Surname</label>
		<input type="text" data-clear-btn="true" name="surname" id="surname" value="">
		
		<label for="address">Address</label>
		<input type="text" data-clear-btn="true" name="address" id="address" value="">
		
		<label for="email">E-Mail</label>
		<input type="text" data-clear-btn="true" name="email" id="email" value="">
		
		<label for="number">Phone Number</label>
		<input type="text" data-clear-btn="true" name="number" id="number" value="">
		
		<label for="password">Password</label>
		<input type="password" data-clear-btn="true" name="password" id="password" value="" autocomplete="off">
		
		<label for="repeatPassword">Repeat Pasword</label>
		<input type="password" data-clear-btn="true" name="repeatPassword" id="repeatPassword" value="" autocomplete="off">
	
		<input type = "submit" value = "Submit"/>
	
	</form>
	
    <a href="#firstPage"  data-transition="slide" class="ui-btn">Cancel</a>
	
</div>

<div id="login" data-role="page">

	<div data-role="header">Login</div>
	
	<form action="login_result.php" method="post">
  
		<label for="email">E-Mail</label>
		<input type="text" data-clear-btn="true" name="email" id="email" value="">
		
		<label for="password">Password</label>
		<input type="password" data-clear-btn="true" name="password" id="password" value="" autocomplete="off">
		
		<img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" />
		<input type="text" name="captcha_code" size="10" maxlength="6" />
		<a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>
		
		<input type = "submit" value = "Submit"/>
	
	</form>
    
	<a href="#firstPage"  data-transition="slide" class="ui-btn">Cancel</a>


	
</div>


</body>
</html>

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


<div id="validation" data-role="page">
<?php

	session_start();
	
	if(is_null($_SESSION['id'])){
		echo '<button onclick = "logout()" class="ui-btn">Start a session</button>';
	}
	

?>
</div>


<?php

	
	$name = $_SESSION['name'];
	$surname = $_SESSION['surname'];
	$address = $_SESSION['address'];
	$email = $_SESSION['email'];
	$number = $_SESSION['number'];
	$type = $_SESSION['type'];

?>



<script>

		function goToHome(){
			window.location.href="logged.php#<?php echo htmlspecialchars($type); ?>";
		}
		function logout(){
			window.location.href="index.php#login";
		}
		
			
</script>

<div id="register" data-role="page">

  <div data-role="header">Register</div>
   
	<form action="update_result.php" method="post">
		
		<label for="name">First Name</label>
		<input type="text" data-clear-btn="true" name="name" id="name" value= "<?php echo htmlspecialchars($name); ?>">
		
		<label for="surname">Surname</label>
		<input type="text" data-clear-btn="true" name="surname" id="surname" value="<?php echo htmlspecialchars($surname); ?>">
		
		<label for="address">Address</label>
		<input type="text" data-clear-btn="true" name="address" id="address" value="<?php echo htmlspecialchars($address); ?>">
		
		<label for="email">E-Mail</label>
		<input type="text" data-clear-btn="true" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
		
		<label for="number">Phone Number</label>
		<input type="text" data-clear-btn="true" name="number" id="number" value="<?php echo htmlspecialchars($number); ?>">
		
		<label for="password">Password</label>
		<input type="password" data-clear-btn="true" name="password" id="password" value="" autocomplete="off">
		
		<label for="repeatPassword">Repeat Pasword</label>
		<input type="password" data-clear-btn="true" name="repeatPassword" id="repeatPassword" value="" autocomplete="off">
	
		<input type = "submit" value = "Submit"/>
		<input type = "button" onclick = "goToHome()" value = "Cancel"/>
	
	</form>
    
</div>

</body>
</html>

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
	
?>
	
<div id="edit_user" data-role="page">


	<div data-role="header">Welcome to the hardware supplier</div>
	<?php
		$user_id = $_GET['id'];
		
		try {
			$host = '127.0.0.1';
			$dbname = 'test';
			$user = 'root';
			$pass = '';
			# MySQL with PDO_MYSQL

			$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
				
			$sql = "SELECT * FROM `hardware_supplier`.`user` WHERE  `user_id` = ?;";
			  
			$sth = $DBH->prepare($sql);
			$sth->bindParam(1, $user_id, PDO::PARAM_INT);
			$sth->execute();
			
			$rec = $sth->fetch(PDO::FETCH_ASSOC);
			
			$user_id = $rec['user_id'];
			$name = $rec['name'];
			$surname = $rec['surname'];
			$address = $rec['address'];
			$email = $rec['email'];
			$number = $rec['number'];
			$type= $rec['type'];
		
		}
		catch(PDOException $e) {
			echo $e;
		} 
		
	?>

	<script>

		function goToAdminUsers(){
			window.location.href="admin_users.php";
		}
			
		function resetPassword(){
			window.location.href="reset_password.php?id=<?php echo htmlspecialchars($user_id); ?>";
		}
		
	</script>

	
	<form action="edit_user_result.php?id=<?php echo htmlspecialchars($user_id); ?>" method="post">
		
		<label for="name">Name</label>
		<input type="text" data-clear-btn="true" name="name" id="name" value= "<?php echo htmlspecialchars($name); ?>">

		<label for="surname">Surname</label>
		<input type="text" data-clear-btn="true" name="surname" id="surname" value= "<?php echo htmlspecialchars($surname); ?>">

		<label for="address">Address</label>
		<input type="text" data-clear-btn="true" name="address" id="address" value= "<?php echo htmlspecialchars($address); ?>">
		
		<label for="email">Email</label>
		<input type="text" data-clear-btn="true" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
		
		<label for="number">Number</label>
		<input type="text" data-clear-btn="true" name="number" id="number" value="<?php echo htmlspecialchars($number); ?>">
		
		<label for="type">Type</label>
		<select name="type" id="type">
		    <option value="customer">Customer</option>
		    <option value="staff">Staff</option>
			<option value="admin">Admin</option>
			<option value="delivery">Delivery</option>
		</select>
				
		<input type = "submit" value = "Submit"/>
		<input type = "button" onclick = "resetPassword()" value = "Reset password"/>
		<input type = "button" onclick = "goToAdminUsers()" value = "Cancel"/>
	
	</form>
	
	
    
</div>

</body>
</html>

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
	
<div id="edit_order" data-role="page">

	<script>

		function goToAdminOrders(){
			window.location.href="admin_orders.php";
		}
			
	</script>


	<div data-role="header">Welcome to the hardware supplier</div>
	<?php
		$order_id = $_GET['id'];
		
		try {
			$host = '127.0.0.1';
			$dbname = 'test';
			$user = 'root';
			$pass = '';
			# MySQL with PDO_MYSQL

			$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
				
			$sql = "SELECT * FROM `hardware_supplier`.`bill` INNER JOIN `hardware_supplier`.`user` ON customer = user_id WHERE bill_id = ?;";
			  
			$sth = $DBH->prepare($sql);
			$sth->bindParam(1, $order_id, PDO::PARAM_INT);
			$sth->execute();
			
			$rec = $sth->fetch(PDO::FETCH_ASSOC);
			
			$order_id = $rec['bill_id'];
			$name = $rec['name'];
			$surname = $rec['surname'];
			$address = $rec['address'];
			$status= $rec['status'];
		
		}
		catch(PDOException $e) {
			echo $e;
		} 
		
	?>
	
	<form action="edit_order_result.php?id=<?php echo htmlspecialchars($order_id); ?>" method="post">
		
		<label for="name">Name</label>
		<input type="text" data-clear-btn="true" name="name" id="name" value= "<?php echo htmlspecialchars($name); ?>">

		<label for="surname">Surname</label>
		<input type="text" data-clear-btn="true" name="surname" id="surname" value= "<?php echo htmlspecialchars($surname); ?>">

		<label for="address">Address</label>
		<input type="text" data-clear-btn="true" name="address" id="address" value= "<?php echo htmlspecialchars($address); ?>">
		
		<label for="status">Status</label>
		<select name="status" id="status">
		    <option value="To be dispatched">To be dispatched</option>
		    <option value="Dispatched">Dispatched</option>
			<option value="Delivered">Delivered</option>
		</select>
				
		<input type = "submit" value = "Submit"/>
		<input type = "button" onclick = "goToAdminOrders()" value = "Cancel"/>
	
	</form>

    
</div>

</body>
</html>

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
	
<div id="edit_product" data-role="page">

	<script>

		function goToAdminProducts(){
			window.location.href="admin_products.php";
		}
			
	</script>


	<div data-role="header">Welcome to the hardware supplier</div>
	<?php
		$product_id = $_GET['id'];
		
		try {
			$host = '127.0.0.1';
			$dbname = 'test';
			$user = 'root';
			$pass = '';
			# MySQL with PDO_MYSQL

			$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
				
			$sql = "SELECT * FROM `hardware_supplier`.`product` WHERE  `product_id` = ?;";
			  
			$sth = $DBH->prepare($sql);
			$sth->bindParam(1, $product_id, PDO::PARAM_INT);
			$sth->execute();
			
			$rec = $sth->fetch(PDO::FETCH_ASSOC);
			
			$product_id = $rec['product_id'];
			$name = $rec['Name'];
			$description = $rec['Description'];
			$price = $rec['Price'];
			$available = $rec['Available'];
				
		}
		catch(PDOException $e) {
			echo $e;
		} 
		
	?>
	
	<form action="edit_product_result.php?id=<?php echo htmlspecialchars($product_id); ?>" method="post">
		
		<label for="name">Name</label>
		<input type="text" data-clear-btn="true" name="name" id="name" value= "<?php echo htmlspecialchars($name); ?>">
		
		<label for="description">Description</label>
		<input type="text" data-clear-btn="true" name="description" id="description" value="<?php echo htmlspecialchars($description); ?>">
		
		<label for="price">Price</label>
		<input type="text" data-clear-btn="true" name="price" id="price" value="<?php echo htmlspecialchars($price); ?>">
		
		<label for="available">Available</label>
		<select name="available" id="available">
		    <option value="Yes">Yes</option>
		    <option value="No">No</option>
		</select>
				
		<input type = "submit" value = "Submit"/>
		<input type = "button" onclick = "goToAdminProducts()" value = "Cancel"/>
	
	</form>

    
</div>

</body>
</html>

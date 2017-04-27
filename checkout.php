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
	$type = $_SESSION['type'];
	
?>
	
<div id="checkout" data-role="page">

  <div data-role="header">Checkout</div>
	
	<script>

		function goToHome(){
			window.location.href="logged.php#<?php echo htmlspecialchars($type); ?>";
		}
			
	</script>

	
	
	<?php
		$cart = $_SESSION['cart'];
		$_SESSION['total'] = 0;
		
		try {
			$host = '127.0.0.1';
			$dbname = 'test';
			$user = 'root';
			$pass = '';
			# MySQL with PDO_MYSQL
			
			$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
		
		}
		catch(PDOException $e) {
			echo $e;
		}
			
			for($x = 0; $x < count($cart); $x++) {
				
				try {
					$product_id = $cart[$x];
					$sql = "SELECT * FROM `hardware_supplier`.`product` WHERE  `product_id` = ?;";
				  
					$sth = $DBH->prepare($sql);
					$sth->bindParam(1, $product_id, PDO::PARAM_INT);
					$sth->execute();
					
					$rec = $sth->fetch(PDO::FETCH_ASSOC);
					
					$_SESSION ['total'] = $_SESSION['total'] + $rec['Price'];
					
				}
				
				catch(PDOException $e) {
					echo $e;
				}
				
			}
		
		
		echo '<h2> You only have to pay '.$_SESSION['total'].'</h2><br>';
		
	?>
	
	<form action="checkout_result.php" method="post">
		
		<label for="cardNumber">Card Number</label>
		<input type="text" data-clear-btn="true" name="cardNumber" id="cardNumber" value="">
		
		<label for="nameOnCard">Name on card</label>
		<input type="text" data-clear-btn="true" name="nameOnCard" id="nameOnCard" value="">
		
		<label for="security">Security code</label>
		<input type="text" data-clear-btn="true" name="security" id="security" value="">
		
		<input type = "submit" value = "Submit"/>
		<input type = "button" onclick = "goToHome()" value = "Cancel"/>
		
	</form>


</div>


</body>
</html>
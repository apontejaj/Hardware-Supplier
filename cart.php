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
	
<div id="cart" data-role="page">
	
	<script>

		function goToShopping(){
			window.location.href="shop.php";
		}
		function goToCheckout(){
			window.location.href="checkout.php";
		}
		function goToHome(){
			window.location.href="logged.php#<?php echo htmlspecialchars($_SESSION['type']); ?>";
		}
		
	</script>

	<div data-role="header">Your shopping cart</div>
	<?php
		
		$cart = $_SESSION['cart'];
		
		if (count($cart)== 0){
			echo '<h2> Your cart is empty.</h2><br>';
			echo '<button onclick="goToShopping()">Go Shopping!</button>';
			echo '<button onclick="goToHome()">Back home</button>';
			
		}
		
		else {
			
			echo '<h2> This is what you have chosen.</h2><br>';
			
			echo '
				<table data-role="table" id="table-column-toggle" class="ui-responsive table-stroke">
				<thead>
	       			<tr>
	         			<th>Product ID</th>
	         			<th>Name</th>
	         			<th>Price</th>
	         		</tr>
	     		</thead>
				<tbody>';
			
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
					
					echo '<tr data-role="listview">';
					echo '<td>'.$rec['product_id'].'</td>';
					echo '<td><a href="product_detail.php?id='.$rec['product_id'].'" data-rel="external">'.$rec['Name'].'</a></td>';
					echo '<td>'.$rec['Price'].'</td>';
					echo '</tr>';
					
				}
				
				catch(PDOException $e) {
					echo $e;
				}
				
			}

			echo '
				</tbody>
	   		</table>';
			
			echo '<button onclick="goToShopping()">Keep Shopping!</button>';
			echo '<button onclick="goToCheckout()">Checkout!</button>';
			echo '<button onclick="goToHome()">Go home</button>';
			
		}
		
	?>
  
    
</div>

</body>
</html>

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

	
<div id="addToCart" data-role="page">

	<script>
		function goToShopping(){
			window.location.href="shop.php";
		}
		
		function goToCart(){
			window.location.href="cart.php";
		}
	</script>


	<div data-role="header">Your shopping cart</div>
	<?php
		
		$product_id = $_GET['id'];
		
		$cart = $_SESSION['cart'];
		$length = count($cart);
		
		$cart[$length]=$product_id;
		$_SESSION['cart'] = $cart;
		
		echo '<h2> Your item has been added to your cart.</h2><br>';
		echo '<button onclick="goToShopping()">Keep Shopping!</button>';
		echo '<button onclick="goToCart()">See your cart!</button>';
		
	?>
  
    
</div>

</body>
</html>

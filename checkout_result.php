<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<link rel="stylesheet" href="http://demos.jquerymobile.com/1.4.5/css/themes/default/jquery.mobile-1.4.5.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="http://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.js"></script>

</head>
<body>

<div id="login" data-role="page">

	

	<?php
	
	session_start();
	
	if($_POST){
		
		//Catching variables from the post
		$card = $_POST['cardNumber'];
		$name = $_POST['nameOnCard'];
		$security = $_POST['security'];
		
		//iniciating other variables
		//$type = "";
		
		if($card == '' or $name == '' or $security == ''){
			echo '<div data-role="header">Checkout</div>';
			echo '<h2> Please make sure you complete all the fields.</h2><br>';
			echo '<button onclick="goToCheckout()">tryAgain</button>';
			
		}
		 
		else {
			
			echo '<div data-role="header">Checkout</div>';
			
			try {
				$host = '127.0.0.1';
				$dbname = 'test';
				$user = 'root';
				$pass = '';
				# MySQL with PDO_MYSQL
				$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
			
				$sql = "INSERT INTO `hardware_supplier`.`bill` (`customer`, `card`, `security`, `amount`) VALUES (?, ?, ?, ?);";
			   
				$sth = $DBH->prepare($sql);

				$sth->bindParam(1, $_SESSION['id'], PDO::PARAM_INT);
				$sth->bindParam(2, $card, PDO::PARAM_INT);
				$sth->bindParam(3, $security, PDO::PARAM_INT);
				$sth->bindParam(4, $_SESSION['total'], PDO::PARAM_INT);
				
				$sth->execute();
				
			}
			catch(PDOException $e) {
				echo $e;
			}

			try {
				$sql = "SELECT @@identity AS bill_id;";
			   
				$sth = $DBH->prepare($sql);

				$sth->execute();
				
				$rec = $sth->fetch(PDO::FETCH_ASSOC);
       
				// getting values from the row            
				$bill_id = $rec['bill_id'];
				
			}
			catch(PDOException $e) {
				echo $e;
			} 
			
			$cart = $_SESSION['cart'];
			for($x = 0; $x < count($cart); $x++) {
				
				try {
					$product_id = $cart[$x];
					$sql = "INSERT INTO `hardware_supplier`.`detail` (`bill`, `item`) VALUES (?, ?);";
				  
					$sth = $DBH->prepare($sql);
					$sth->bindParam(1, $bill_id, PDO::PARAM_INT);
					$sth->bindParam(2, $product_id, PDO::PARAM_INT);
					$sth->execute();
				
				}
				
				catch(PDOException $e) {
					echo $e;
				}
				
			}
			
			echo '<h2> Your payment has been processed.</h2><br>';
			$_SESSION['cart'] = array();
			echo '<button onclick="goToHome()">Home</button>';

		
		}
	}

	?>

	<script>

		function goToDelivery(){
		window.location.href="checkout.php";
			
		}
		
		function goToHome(){
			window.location.href="logged.php#<?php echo htmlspecialchars($_SESSION['type']); ?>";
		}
		
	</script>
	
</div>

</body>

</html>
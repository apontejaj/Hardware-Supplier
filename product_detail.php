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
	
<div id="details" data-role="page">

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
			
			echo '<ul data-role="listview">';
			echo '<li>'.$rec['Name'].'</li>';
			echo '<li>'.$rec['Description'].'</li>';
			echo '<li>'.$rec['Price'].'</li>';
			echo '<li><a href="add_to_cart.php?id='.$product_id.'" data-rel="external">Add to Cart!</a></li>';
			echo '</ul>';
		
		}
		catch(PDOException $e) {
			echo $e;
		} 
	
		
	?>
  
    
</div>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
<title>Update</title>

<link rel="stylesheet" href="http://demos.jquerymobile.com/1.4.5/css/themes/default/jquery.mobile-1.4.5.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="http://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.js"></script>

</head>
<body>

<div id="edit_product_result" data-role="page">

	<?php
	
		session_start();
		$product_id = $_GET['id'];

		if($_POST){

			//Catching all the variables
			$name = $_POST['name'];
			$description = $_POST['description'];
			$price = $_POST['price'];
			$available = $_POST['available'];
			
			try {
				$host = '127.0.0.1';
				$dbname = 'test';
				$user = 'root';
				$pass = '';
				# MySQL with PDO_MYSQL

				$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
					
				$sql = "UPDATE `hardware_supplier`.`product` SET `Name`=?, `Description`=?, `Price`=?, `Available`=? WHERE  `product_id`=?;";
				  
				$sth = $DBH->prepare($sql);
				$sth->bindParam(1, $name, PDO::PARAM_INT);
				$sth->bindParam(2, $description, PDO::PARAM_INT);
				$sth->bindParam(3, $price, PDO::PARAM_INT);
				$sth->bindParam(4, $available, PDO::PARAM_INT);
				$sth->bindParam(5, $product_id, PDO::PARAM_INT);
				$sth->execute();
			
			}
			catch(PDOException $e) {
				echo $e;
			} 
			
		}

	?>
	
	<h2> Your product has been updated! </h2>
	<a href="admin_products.php"  data-transition="slide" class="ui-btn">Back to products</a>

</div>

</body>

</html>
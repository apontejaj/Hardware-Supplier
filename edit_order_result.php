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

<div id="edit_order_result" data-role="page">

	<?php
	
		session_start();
		$order_id = $_GET['id'];

		if($_POST){

			//Catching all the variables
			$status = $_POST['status'];
			
			try {
				$host = '127.0.0.1';
				$dbname = 'test';
				$user = 'root';
				$pass = '';
				# MySQL with PDO_MYSQL

				$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
					
				$sql = "UPDATE `hardware_supplier`.`bill` SET `status`=? WHERE  `bill_id`=?;";
				  
				$sth = $DBH->prepare($sql);
				$sth->bindParam(1, $status, PDO::PARAM_INT);
				$sth->bindParam(2, $order_id, PDO::PARAM_INT);
				$sth->execute();
			
			}
			catch(PDOException $e) {
				echo $e;
			} 
			
		}

	?>
	
	<h2> Your order has been updated! </h2>
	<a href="admin_orders.php"  data-transition="slide" class="ui-btn">Back to orders</a>

</div>

</body>

</html>
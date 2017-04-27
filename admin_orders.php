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
	
<div id="admin_orders" data-role="page">

<script>

		function goToHome(){
			
			window.location.href="logged.php#<?php echo htmlspecialchars($_SESSION['type']); ?>";
		}
		
</script>
	
	<div data-role="header">Welcome to the hardware supplier</div>
	
	<table data-role="table" id="table-column-toggle" class="ui-responsive table-stroke">
		<thead>
			<tr>
	        	<th>Order ID</th>
	         	<th>User Name</th>
				<th>User Surname</th>
	         	<th>Address</th>
				<th>Status</th>
				<th>Edit</th>
	        </tr>
	    </thead>
		<tbody>
	
	<?php
		
		try {
			$host = '127.0.0.1';
			$dbname = 'test';
			$user = 'root';
			$pass = '';
			# MySQL with PDO_MYSQL
			$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

			$sql = "SELECT * FROM `hardware_supplier`.`bill` INNER JOIN `hardware_supplier`.`user` ON customer = user_id;";
		  
			$sth = $DBH->prepare($sql);
			$sth->execute();
			
			$rec = $sth->fetchAll(PDO::FETCH_ASSOC);
			
			foreach ($rec as $row){
				echo '<tr>';
				echo '<td><a href="bill_detail.php?id='.$row['bill_id'].'" data-rel="external">'.$row['bill_id'].'</a></td>';
				echo '<td>'.$row['name'].'</td>';
				echo '<td>'.$row['surname'].'</td>';
				echo '<td>'.$row['address'].'</td>';
				echo '<td>'.$row['status'].'</td>';
				echo '<td><a href="edit_order.php?id='.$row['bill_id'].'"  data-transition="slide" class="ui-btn">Edit Order</a></td>';
				echo '</tr>';
				
			}
		}
		
		catch(PDOException $e) {
			echo $e;
		}

	?>
	
			</tbody>
   		</table>
		
	<button onclick="goToHome()">Back home</button>
   
</div>


</body>
</html>

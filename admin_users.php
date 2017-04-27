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
	
<div id="admin_users" data-role="page">

<script>

		function goToHome(){
			
			window.location.href="logged.php#<?php echo htmlspecialchars($_SESSION['type']); ?>";
		}
		
</script>
	
	<div data-role="header">Welcome to the hardware supplier</div>
	
	<table data-role="table" id="table-column-toggle" class="ui-responsive table-stroke">
		<thead>
			<tr>
	        	<th>User ID</th>
	         	<th>Name</th>
				<th>Surname</th>
	         	<th>Address</th>
				<th>Email</th>
				<th>Number</th>
				<th>Type</th>
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

			$sql = "SELECT * FROM `hardware_supplier`.`user`;";
		  
			$sth = $DBH->prepare($sql);
			$sth->execute();
			
			$rec = $sth->fetchAll(PDO::FETCH_ASSOC);
			
			foreach ($rec as $row){
				echo '<tr>';
				echo '<td>'.$row['user_id'].'</td>';
				echo '<td>'.$row['name'].'</td>';
				echo '<td>'.$row['surname'].'</td>';
				echo '<td>'.$row['address'].'</td>';
				echo '<td>'.$row['email'].'</td>';
				echo '<td>'.$row['number'].'</td>';
				echo '<td>'.$row['type'].'</td>';
				echo '<td><a href="edit_user.php?id='.$row['user_id'].'"  data-transition="slide" class="ui-btn">Edit User</a></td>';
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

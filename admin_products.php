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
	
<div id="admin_products" data-role="page">

<script>

		function goToHome(){
			
			window.location.href="logged.php#<?php echo htmlspecialchars($_SESSION['type']); ?>";
		}
		
</script>
	
	<div data-role="header">Welcome to the hardware supplier</div>
	
	<table data-role="table" id="table-column-toggle" class="ui-responsive table-stroke">
		<thead>
			<tr>
	        	<th>Product ID</th>
	         	<th>Name</th>
				<th>Description</th>
	         	<th>Price</th>
				<th>Available</th>
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
		}
		
		catch(PDOException $e) {
			echo $e;
		}
		
		
		if($_POST){
		
			//Catching variables from the post
			$newName = $_POST['newName'];
			$newDescription = $_POST['newDescription'];
			$newPrice = $_POST['newPrice'];
			
			try{
				
				$sql = "INSERT INTO `hardware_supplier`.`product` (`Name`, `Description`, `Price`) VALUES (?, ?, ?);";
			  
				$sth = $DBH->prepare($sql);
				$sth->bindParam(1, $newName, PDO::PARAM_INT);
				$sth->bindParam(2, $newDescription, PDO::PARAM_INT);
				$sth->bindParam(3, $newPrice, PDO::PARAM_INT);
				$sth->execute();
			
			}

			catch(PDOException $e) {
				echo $e;
			}

		}
	
		try {
			
			$sql = "SELECT * FROM `hardware_supplier`.`product`;";
		  
			$sth = $DBH->prepare($sql);
			$sth->execute();
			
			$rec = $sth->fetchAll(PDO::FETCH_ASSOC);
			
			foreach ($rec as $row){
				echo '<tr>';
				echo '<td>'.$row['product_id'].'</td>';
				echo '<td>'.$row['Name'].'</td>';
				echo '<td>'.$row['Description'].'</td>';
				echo '<td>'.$row['Price'].'</td>';
				echo '<td>'.$row['Available'].'</td>';
				echo '<td><a href="edit_product.php?id='.$row['product_id'].'"  data-transition="slide" class="ui-btn">Edit Product</a></td>';
				echo '</tr>';
				
			}
						
		}
		catch(PDOException $e) {
			echo $e;
		}
		
	?>
	
			</tbody>
   		</table>
	
	<h2>New Item</h2>
	<form action="admin_products.php" method="post">
		
		<label for="newName">Name</label>
		<input type="text" data-clear-btn="true" name="newName" id="newName" value= ""></input>
		
		<label for="newDescription">Description</label>
		<input type="text" data-clear-btn="true" name="newDescription" id="newDescription" value= ""></input>
		
		<label for="newPrice">Price</label>
		<input type="text" data-clear-btn="true" name="newPrice" id="newPrice" value= ""></input>

		<input type = "submit" value = "Add new"/></td>
	</form>
	
	<button onclick="goToHome()">Back home</button>
   
</div>


</body>
</html>

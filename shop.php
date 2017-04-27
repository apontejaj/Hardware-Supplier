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

<div id="shop" data-role="page">

	
  <div data-role="header">Start Shopping!</div>
  
	<?php
	session_start();
		
	try {
		$host = '127.0.0.1';
		$dbname = 'test';
		$user = 'root';
		$pass = '';
		# MySQL with PDO_MYSQL
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
			
		$sql = "SELECT * FROM `hardware_supplier`.`product`;";
		  
		$sth = $DBH->prepare($sql);
		$sth->execute();
		
		$rec = $sth->fetchAll(PDO::FETCH_ASSOC);
        
		// Building up table
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
			
		foreach ($rec as $row){
			
			if ($row['Available'] == "Yes"){
				
				echo '<tr>';
				echo '<td>'.$row['product_id'].'</td>';
				echo '<td><a href="product_detail.php?id='.$row['product_id'].'" data-rel="external">'.$row['Name'].'</a></td>';
				echo '<td>'.$row['Price'].'</td>';
				echo '</tr>';
				
			}
			
			
			
		}
		
		echo '
			</tbody>
   		</table>';
		
		}
		catch(PDOException $e) {
			echo $e;
		} 
		
		

	?>
   
   <script>

		function goToHome(){
			window.location.href="logged.php#<?php echo htmlspecialchars($_SESSION['type']); ?>";
		}
			
	</script>
	<button onclick="goToHome()">Home</button>
    
</div>

</body>
</html>

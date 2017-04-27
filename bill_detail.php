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

<div id="bill_detail" data-role="page">

	<script>

		
		function goToPrint(){
		window.location.href="keep_trying.php";
			
		}
		
	</script>


  <div data-role="header">Shopping history</div>
    
	<?php
	session_start();
	$bill_id = $_GET['id'];
	$cell = array();
	$_SESSION['cell']= $cell;
	
	try {
		$host = '127.0.0.1';
		$dbname = 'test';
		$user = 'root';
		$pass = '';
		# MySQL with PDO_MYSQL
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
			
		$sql = "SELECT * FROM `hardware_supplier`.`detail` JOIN `hardware_supplier`.`product` ON item = product_id WHERE bill = ?;";
		  
		$sth = $DBH->prepare($sql);
		$sth->bindParam(1, $bill_id, PDO::PARAM_INT);
		$sth->execute();
		
		$rec = $sth->fetchAll(PDO::FETCH_ASSOC);
        
		// Building up table
		echo '
		<table data-role="table" id="table-column-toggle" class="ui-responsive table-stroke">
			<thead>
       			<tr>
         			<th>Name</th>
         			<th>Price</th>
         		</tr>
     		</thead>
			<tbody>';
		
		$cell = $_SESSION['cell'];
		foreach ($rec as $row){
			echo '<tr>';
			echo '<td>'.$row['Name'].'</td>';
			echo '<td>'.$row['Price'].'</td>';
			$cell[count($cell)]=$row['Name'];
			echo '</tr>';
			
		}
		
		$cell[count($cell)]='------------------';
		
		echo '
			</tbody>
   		</table>';
		
		}
		catch(PDOException $e) {
			echo $e;
		}

		try{
			$sql = "SELECT * FROM `hardware_supplier`.`bill` JOIN `hardware_supplier`.`user` ON customer = user_id WHERE bill_id = ?;";
			$sth = $DBH->prepare($sql);
			$sth->bindParam(1, $bill_id, PDO::PARAM_INT);
			$sth->execute();
		
			$rec = $sth->fetch(PDO::FETCH_ASSOC);
			
			$name = $rec['name'];
			$surname = $rec['surname'];
			$address = $rec['address'];
			$email = $rec['email'];
			$number = $rec['number'];
						
			echo '<h2>To be delivered to</h2>';
			$cell[count($cell)]='To be delivered to';
			echo '<ul data-role="listview">';
			echo '<li>'.$rec['name'].'</li>';
			$cell[count($cell)]=$rec['name'];
			echo '<li>'.$rec['surname'].'</li>';
			$cell[count($cell)]=$rec['surname'];
			echo '<li>'.$rec['address'].'</li>';
			$cell[count($cell)]=$rec['address'];
			echo '<li>'.$rec['email'].'</li>';
			$cell[count($cell)]=$rec['email'];
			echo '<li>'.$rec['number'].'</li>';
			$cell[count($cell)]=$rec['number'];
			echo '<li>'.$rec['status'].'</li>';
			$cell[count($cell)]=$rec['status'];
			echo '</ul>';
			
			$_SESSION['cell'] = $cell;
					
		}
		catch(PDOException $e) {
			echo $e;
		}
		
		if($_SESSION['type'] == 'customer'){
			echo '<a href="history.php"  data-transition="slide" class="ui-btn">Back to history</a>';
			
		}

		if($_SESSION['type'] == 'delivery'){
		
			echo '<button onclick = "goToPrint()" class="ui-btn">Print</button>';
			echo '<a href="admin_orders.php"  data-transition="slide" class="ui-btn">Back to orders</a>';
			
						
		}
	
	?>

  
	
</div>

</body>
</html>

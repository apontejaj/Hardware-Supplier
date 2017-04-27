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

<div id="reset_password" data-role="page">

	<?php
	
		session_start();
		$user_id = $_GET['id'];
		$password = md5('123455678'.'amilcar');

		
			try {
				$host = '127.0.0.1';
				$dbname = 'test';
				$user = 'root';
				$pass = '';
				# MySQL with PDO_MYSQL

				$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
					
				$sql = "UPDATE `hardware_supplier`.`user` SET `password`=? WHERE  `user_id`=?;";
				  
				$sth = $DBH->prepare($sql);
				$sth->bindParam(1, $password, PDO::PARAM_INT);
				$sth->bindParam(2, $user_id, PDO::PARAM_INT);
				$sth->execute();
			
			}
			catch(PDOException $e) {
				echo $e;
			} 


	?>
	
	<h2> The password has been reset to 123455678! </h2>
	<a href="admin_users.php"  data-transition="slide" class="ui-btn">Back to users</a>

</div>

</body>

</html>
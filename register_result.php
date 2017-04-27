<!DOCTYPE html>
<html>
<head>
<title>Register</title>

<link rel="stylesheet" href="http://demos.jquerymobile.com/1.4.5/css/themes/default/jquery.mobile-1.4.5.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="http://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.js"></script>

</head>
<body>

<div id="register" data-role="page">

	<script>

		function goToLogin(){
			window.location.href="index.php#login";
		}
		
		function goToRegister(){
			window.location.href="index.php#register";
			
		}
		
	
	</script>

	<?php

		if($_POST){

			//Catching all the variables
			$name = $_POST['name'];
			$surname = $_POST['surname'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$number = $_POST['number'];
			$password = $_POST['password'];
			$repeatPassword = $_POST['repeatPassword'];
			
			if($name == '' or $surname == '' or $address == '' or $email == '' or $number == '' or $password == '' or $repeatPassword == ''){

				echo '<h2> Please make sure you complete all the fields. </h> <br>';
				echo '<button onclick="goToRegister()">Try again</button>';
				
			}
			 
			else {
				
				$password = md5($password.'amilcar');
				$repeatPassword = md5($repeatPassword.'amilcar');
				
				if ($password != $repeatPassword){
					echo '<h2> The fields password and repeat password must match. </h2> <br>';
					echo '<button onclick="goToRegister()">Try again</button>';
				}
				
				else{
				
					try {
						$host = '127.0.0.1';
						$dbname = 'test';
						$user = 'root';
						$pass = '';
						# MySQL with PDO_MYSQL
						$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
						
						$sql = "SELECT * FROM `hardware_supplier`.`user` WHERE `email`= ?;";
			   
						$sth = $DBH->prepare($sql);
						$sth->bindParam(1, $email, PDO::PARAM_INT);
						$sth->execute();
				
						if ($sth->rowCount() > 0){
							
							echo '<h2>The email '.$email.' already exist in our system. </h2><br>';
							echo '<button onclick="goToLogin()">Go to Login</button>';
							echo '<button onclick="goToRegister()">Register with another address</button>';
						}
				
						else {
						
							$sql = "INSERT INTO `hardware_supplier`.`user` (`name`, `surname`, `address`, `email`, `number`, `password`) VALUES (?, ?, ?, ?, ?, ?);";
					   
							$sth = $DBH->prepare($sql);

							$sth->bindParam(1, $name, PDO::PARAM_INT);
							$sth->bindParam(2, $surname, PDO::PARAM_INT);
							$sth->bindParam(3, $address, PDO::PARAM_INT);
							$sth->bindParam(4, $email, PDO::PARAM_INT);
							$sth->bindParam(5, $number, PDO::PARAM_INT);
							$sth->bindParam(6, $password, PDO::PARAM_INT);

							$sth->execute();
							
							echo '<div data-role="header">Register</div>';
							echo '<h2> You your account has been created. </h2> <br>';
							echo '<button onclick="goToLogin()">Go to Login</button>';
					
						}
						
					}
					catch(PDOException $e) {
						echo $e;
					}  
				}
			}
		}

	?>

</div>

</body>

</html>
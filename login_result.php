<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<link rel="stylesheet" href="http://demos.jquerymobile.com/1.4.5/css/themes/default/jquery.mobile-1.4.5.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="http://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.js"></script>

</head>
<body>

<div id="login" data-role="page">

	<script>

		function goToLogin(){
		window.location.href="index.php#login";
		}
		
		function goToRegister(){
		window.location.href="index.php#register";
			
		}
		
		function goToCustomer(){
		window.location.href="logged.php#customer";
			
		}
		
		function goToStaff(){
		window.location.href="logged.php#staff";
			
		}
		
		function goToAdmin(){
		window.location.href="logged.php#admin";
			
		}

		function goToDelivery(){
		window.location.href="logged.php#delivery";
			
		}
		
	</script>

	<?php
	
	session_start();
	
	include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
	$securimage = new Securimage;
	
	
	$cart = array();
	$_SESSION['cart'] = $cart;
	
	if($_POST){
		
		//Catching variables from the post
		$email = $_POST['email'];
		$password = md5($_POST['password'].'amilcar');
		
		if ($securimage->check($_POST['captcha_code']) == false) {
		  // the code was incorrect
		  // you should handle the error so that the form processor doesn't continue

		  // or you can use the following code if there is no validation or you do not know how
		  echo "The security code entered was incorrect.<br /><br />";
		  echo "Please go <a href='javascript:history.go(-1)'>back</a> and try again.";
		  exit;
		}

		
			
		if($email == '' or $password == ''){
			echo '<div data-role="header">Login</div>';
			echo '<h2> Please make sure you complete all the fields.</h2><br>';
			echo '<button onclick="goToLogin()">Go to Login</button>';
			
		}
		 
		else {
			
			echo '<div data-role="header">Login</div>';
			
			try {
				$host = '127.0.0.1';
				$dbname = 'test';
				$user = 'root';
				$pass = '';
				# MySQL with PDO_MYSQL
				$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
			
				$sql = "SELECT * FROM `hardware_supplier`.`user` WHERE (`email`= ? AND `password`= ?);";
			   
				$sth = $DBH->prepare($sql);

				$sth->bindParam(1, $email, PDO::PARAM_INT);
				$sth->bindParam(2, $password, PDO::PARAM_INT);

				$sth->execute();
				
				if ($sth->rowCount() > 0){
            
					// Getting row from the db
					$rec = $sth->fetch(PDO::FETCH_ASSOC);
            
					// getting values from the row            
					$id = $rec['user_id'];
					$type = $rec['type'];
					$_SESSION['id'] = $rec['user_id'];
					$_SESSION['name'] = $rec['name'];
					$_SESSION['surname'] = $rec['surname'];
					$_SESSION['address'] = $rec['address'];
					$_SESSION['email'] = $rec['email'];
					$_SESSION['number'] = $rec['number'];
					$_SESSION['type'] = $type;
					
					if ($type == 'customer'){
						echo '<script>goToCustomer()</script>';
					}
					
					else if ($type == 'admin'){
						echo '<script>goToAdmin()</script>';
					}
					
					else if ($type == 'staff'){
						echo '<script>goToStaff()</script>';
					}
					
					else{
						echo '<script>goToDelivery()</script>';					}
					}
				
				else {
					
					echo '<h2>We could not find your email/password. Please try again.</h2><br>';
					echo '<button onclick="goToLogin()">Try again</button>';
					echo '<button onclick="goToRegister()">or Create an account</button>';
					
				}
				
			}
			catch(PDOException $e) {
				echo $e;
			} 
		
		}
	}

	?>

</div>

</body>

</html>
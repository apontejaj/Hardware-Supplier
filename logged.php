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

<div id="validation" data-role="page">
<?php

	session_start();
	
	if(is_null($_SESSION['id'])){
		echo '<button onclick = "logout()" class="ui-btn">Start a session</button>';
	}
	

?>
</div>
<script>

		function goToMyAccount(){
			window.location.href="my_account.php#register";
		}
		
		function logout(){
			
			window.location.href="index.php#login";
		}
		
		function goToAdminProducts(){
			
			window.location.href="admin_products.php";
		}

		function goToAdminUsers(){
			
			window.location.href="admin_users.php";
		}

		
</script>
	
<div id="customer" data-role="page">
	
	<div data-role="header">Welcome to the hardware supplier</div>
	<?php

		echo '<h2>Hello ' . $_SESSION['name'] . '</h2>';

	?>	
	
    <a href="shop.php"  data-transition="slide" class="ui-btn">Shop Now!</a>
	<a href="cart.php"  data-transition="slide" class="ui-btn">See your cart</a>
    <a href="history.php"  data-transition="slide" class="ui-btn">Shopping History</a>
	<button onclick = "goToMyAccount()" class="ui-btn">Your account</button>
	<button onclick = "logout()" class="ui-btn">Logout</button>
	    
</div>

<div id="admin" data-role="page">
	
	<div data-role="header">Welcome to the hardware supplier</div>
	<?php

		echo '<h2>Hello ' . $_SESSION['name'] . '</h2>';

	?>	
	
    <button onclick = "goToAdminUsers()" class="ui-btn">Admin users</button>
	<button onclick = "goToMyAccount()" class="ui-btn">Your account</button>
	<button onclick = "logout()" class="ui-btn">Logout</button>
    
</div>

<div id="delivery" data-role="page">

	<div data-role="header">Welcome to the hardware supplier</div>
	<?php

		echo '<h2>Hello ' . $_SESSION['name'] . '</h2>';

	?>	
	
    <a href="admin_orders.php"  data-transition="slide" class="ui-btn">Admin orders</a>
	<button onclick = "goToMyAccount()" class="ui-btn">Your account</button>
	<button onclick = "logout()" class="ui-btn">Logout</button>
    
	
</div>

<div id="staff" data-role="page">

	<div data-role="header">Welcome to the hardware supplier</div>
	<?php

		echo '<h2>Hello ' . $_SESSION['name'] . '</h2>';

	?>	
	  
    <button onclick = "goToAdminProducts()" class="ui-btn">Admin products</button>
	<button onclick = "goToMyAccount()" class="ui-btn">Your account</button>
	<button onclick = "logout()" class="ui-btn">Logout</button>
  
</div>


</body>
</html>

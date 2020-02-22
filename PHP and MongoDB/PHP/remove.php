<?php 
	
	// Start PHP session
	session_start();

	// Remove selected index item from basket
	unset($_SESSION['basket'][$_GET['item']]);

	// Re-index the array
	$_SESSION['basket'] = array_values($_SESSION['basket']);

	// Go back ot Basket
	header("Location: ../Basket.php")

 ?>
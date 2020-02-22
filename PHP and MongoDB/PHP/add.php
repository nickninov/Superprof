<?php 
	
/* A session is a way to store information (in variables) 
to be used across multiple pages.

Unlike a cookie, the information is not stored on the users computer.

When making a PHP file to access session data always put session_start();
*/
	// Start session
	session_start();


	// Check if basket session already exists
	if (!isset($_SESSION["basket"])) {

		// Create basket session
		$_SESSION["basket"] = array();
	}

	// Create product that will be pushed in the basket session
	$tempArr = array("name" => $_GET['name'], "price" => $_GET['price']);

	// Push temporary product to basket session
	array_push($_SESSION["basket"], $tempArr);

	// Check to which page to redirect after adding a product
	switch ($_GET['page']) {

		case 'index':

			// Direct to start page
			header("Location: ../index.html");
			break;

		case 'iPhone':

			// Direct to iPhone page
			header("Location: ../Iphone.html");
			break;


		case 'samsung':

			// Direct to Samsung page
			header("Location: ../Samsung.html");
			break;
	}
	
 ?>
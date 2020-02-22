<?php 
	// Start PHP session
	session_start();
	
	// Include libraries
	require __DIR__ . '/vendor/autoload.php';

	// Create an instance of a MongoDB client
	$mongoClient = (new MongoDB\Client);

	// Select database
	$db = $mongoClient->Shop;

	// Select collection
	$collection = $db->Orders;

	// Check if there are any empty fields
	if ($_POST['name'] != '' || $_POST['number'] || $_POST['email'] != '' || $_POST['address'] != '' || $_POST['postcode'] != '') {

		// Convert address
		$address = $_POST['postcode'] . " " . $_POST['address'];

		// Convert to PHP array
		$tempArr = [
			"name" => $_POST['name'],
			"phoneNumber" => $_POST['number'],
			"email" => $_POST['email'],
			"address" => $address,
			"basket" => $_SESSION["basket"]
		]
		

		// Check if data can be pushed into the user
		
		// Select collection
		$collection = $db->Customers;
		
		// Check if the user session is set
		if(isset($_SESSION['userID'])){

			// Find the user through their unique ID
			$user= $collection->findOne(
	       		['_id' => $_SESSION['userID']]
	    	);

	    	// Push order in user
	    	array_push($user['orders'], $tempArr);
		
			// Insert data to the MongoDB collection
			$insertResult = $collection->insertOne($tempArr)

			// Remove items from basket session
			session_destroy();

	    	// Go back to main page
			header("Location: ../index.html");
		}
		// If session is not set - user has not logged in / registered
		else {
			// Insert data to the MongoDB collection
			$insertResult = $collection->insertOne($tempArr)

			// Remove items from basket session
			session_destroy();

			// Go back to main page
			header("Location: ../index.html");

		}
		
	}

	// If any of the fields are empty go back to checkout page
	else {
		header("Location: ../Checkout.php");
	}

 ?>
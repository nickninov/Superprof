<?php

// Include libraries
require __DIR__ . '/vendor/autoload.php';

// Create an instance of a MongoDB client
$mongoClient = (new MongoDB\Client);

// Select database
$db = $mongoClient->Shop;

// Select collection
$collection = $db->Customers;

// Find user and change their details

	$updateDetails = $collection->updateOne(
		// Query to find product
		['_id' => $_POST['id']],

		// Updating model and price
		['$set' => ["name" => $_POST['name'], "email" => $_POST['email'], "address" => $_POST['address'], "password" => $_POST['password']]]
	);

// Go back to user page
header("Location: ../User.php");

?>
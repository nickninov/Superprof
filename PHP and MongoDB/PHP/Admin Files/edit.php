<?php 
	
// Include libraries
require __DIR__ . '/vendor/autoload.php';

// Create an instance of a MongoDB client
$mongoClient = (new MongoDB\Client);

// Select database
$db = $mongoClient->Shop;

// Select collection
$collection = $db->Products;

// Make price from string to a float
$price = (float) $_POST['price'];

// Update details

$updateResult = $collection->updateOne(
	// Query to find product
	['_id' => $_POST['id']],

	// Updating model and price
	['$set' => ["model" => $_POST['name'], "price" => $price]]
);


// Redifect to admin page
header("Location: ../../Admin.php");
 ?>
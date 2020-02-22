<?php 
// Include libraries
require __DIR__ . '/vendor/autoload.php';

// Create an instance of a MongoDB client
$mongoClient = (new MongoDB\Client);

// Select database
$db = $mongoClient->Shop;

// Select collection
$collection = $db->Products;

// Add product to database

	$addProduct =$collection->insertOne(
		['name' => $_POST['name'], 'price' => $_POST['price'], 'img' => $_POST['img']]
	); 


// Go back to Admin page
header("Location: ../../Admin.php");
?>
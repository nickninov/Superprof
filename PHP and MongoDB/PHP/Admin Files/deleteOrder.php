<?php 
// Include libraries
require __DIR__ . '/vendor/autoload.php';

// Create an instance of a MongoDB client
$mongoClient = (new MongoDB\Client);

// Select database
$db = $mongoClient->Shop;

// Select collection
$collection = $db->Orders;

// Fetch all orders
$orders = $collection->find();

// Delete document via ID
$collection->remove(array( '_id' => new MongoID({$_GET['_id']})));

// Redifect to admin page
header("Location: ../../Admin.php");
?>
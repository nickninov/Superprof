<?php 

// Include libraries
require __DIR__ . '/vendor/autoload.php';

// Create an instance of a MongoDB client
$mongoClient = (new MongoDB\Client);

// Select database
$db = $mongoClient->Shop;

// Select collection
$collection = $db->Customers;

// Add user to database

$addUser =$collection->insertOne(
	['name' => $_POST['name'], 'email' => $_POST['email'], 'address' => $_POST['address'], 'password' => $_POST['password'], 'orders' => array()]
); 

// Go to user page
header("Location: ../User.php?name={$_POST['name']}&email={$_POST['email']}");
 ?>
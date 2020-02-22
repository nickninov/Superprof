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
$collection = $db->Customers;

// Check if user is trying to log in as admin
if ($_POST['email'] == "fm768@live.mdx.ac.uk" && $_POST['password'] == "1234yui"){
	header("Location: ../Admin.php");
}
// If user is not admin try logging in user
else {

	// Query MongoDB for user
	$user = $collection->findOne(array('email' => $_POST['email'], 'password' => $_POST['password']));

	// Check if user has been found with those details
	
	if($user->getInsertedCount() == 1){
		// Go to user page
		header("Location: ../User.php?name={$user['name']}&email={$user['email']}");
	}
	// User cannot log in / does not exist. Go to register page.
	else {
		header("Location: ../SignUp.html");
	}
}
?>
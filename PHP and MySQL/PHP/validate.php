<?php 

// Create a session
session_start();


// Database connection details
$conn = mysqli_connect("localhost", "root", "root", "Andy");

// Check if email is valid
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	// Set error message
	$_SESSION['message'] = "<h2 style = \"color: red;\">Invalid email.</h2>";

	// Email is invalid - redirect to page
	header("Location: ../websiteproject.php");
}
else {
	// Email is valid - store to database
	$sql = "INSERT INTO MyCustomers (name, email, comment) VALUES ( '{$_POST['name']}', '{$_POST['email']}', '{$_POST['comment']}');";

	// Execute query
	mysqli_query($conn, $sql);

	// Close connection
	mysqli_close($conn);

	// Set success message
	$_SESSION['message'] = "<h2 style = \"color: green;\">Your details were submitted!</h2>";

	// Redirect to page
	header("Location: ../websiteproject.php");
}
?>
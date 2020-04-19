<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>

	<div style="background-color: red; color: white; margin-left: 30%; margin-right: 30%;font-size: 2em; height: 80vh; overflow: hidden; overflow-y: scroll;">
		<h3>Customers:</h3>
		<?php 
			// Database connection details
			$conn = mysqli_connect("localhost", "root", "root", "Andy");
			// Fetch all data from DB
			$query = "SELECT * FROM MyCustomers";

			$result = mysqli_query($conn, $query);
			
			// Display all the data
			while($row = mysqli_fetch_assoc($result)){
				echo "Name: {$row['name']}<br>";
				echo "E-mail: {$row['email']}<br>";
				echo "Comment: {$row['comment']}<br>";

				echo "<br>";
			}
			// Close connection
			mysqli_close($conn);
		?>
	</div>


</body>
</html>
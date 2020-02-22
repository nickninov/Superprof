<?php 
// Include libraries
require __DIR__ . '/vendor/autoload.php';

// Create an instance of a MongoDB client
$mongoClient = (new MongoDB\Client);

// Select database
$db = $mongoClient->Shop;

// Select collection
$collection = $db->Products;

// Find products that match the input

$findPhones = $collection->find(
	['name' => {$_POST[search]]
);

 ?>

<!DOCTYPE html>
<html>

<head> <!--This is for main title-->
        <title> Mobile Store 
        </title>
        <link rel="stylesheet" type="text/css" href="../CSS/Index style.css"> <!--This is for the Home page "CSS" link-->

</head>

<body>
        <div id="header">  <!--This is for main heading-->
                <div id="Title">
                        <h1>Search Results</h1>

                </div>
                <div id="NavigationBar"> <!--This section below is for the navigation bars-->
                        <a href="../index.html">Home</a>
                        <a href="../Iphone.html">iPhone</a>
                        <a href="../Samsung.html">Samsung</a>
                        <a href="../Basket.php">Basket</a>
                        <a href="../Login.html">Login</a>
                </div>
        </div>

        <div id="maincontents"> <!--This section below is for the mobile phone images-->
                

        <!-- Display products matching the search result -->
		<?php 
		
		foreach ($findPhones as $phone) {

			echo "<div class =\"phoneimage\"><img height=\"80%\" src=\"{$phone['img']}\"><h1>{$phone['name']}} &pound;{$phone['price']}</h1>";

			echo "<form method=\"GET\" action=\"./add.php?\">";

			echo "<input type=\"hidden\" name=\"name\" value=\"{$phone['name']}}\">";

			echo "<input type=\"hidden\" name=\"price\" value=\"{$phone['price']}}\">";

			echo "<input type=\"submit\" value=\"Purchase\" style=\"margin-top: 3%; background-color: white; padding: 1%\">";

			echo "</form>";
		}
		?>     
        </div>   
		
        </div>	
        <div>

                <div id="Footer"> <!--This is for the footer-->
                        <p> Any queries contact us at: latestmobile@gmail.com or call us on 07913113089 Thanks.</p>
                </div>
        </div>

</body>
</html>
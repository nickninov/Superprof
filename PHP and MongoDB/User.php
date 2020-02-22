<?php 
session_start();


// Include libraries
require __DIR__ . '/vendor/autoload.php';

// Create an instance of a MongoDB client
$mongoClient = (new MongoDB\Client);

// Select database
$db = $mongoClient->Shop;

// Select collection
$collection = $db->Customers;

// Find logged in user through the passed URL name and email

    $user= $collection->findOne(
        ['name' => $_GET['name'], 'email' => $_GET['email']]
    );
    
    // Store the user's id in a session variable
    $_SESSION['userID'] = $user['_id']

 ?>

<!DOCTYPE html>
<html>

<head> <!--This is for main title-->
        <title> Mobile Store </title>
        <link rel="stylesheet" type="text/css" href="CSS/Admin style.css">

</head>

<body>
        <div id="header">  
                <div id="Title">
                        <h1>User page</h1> <!--This is for main heading-->

                </div>
                <div id="NavigationBar"> <!--This section below is for the navigation bars-->
                        <a href="index.html">Home</a>
                        <a href="Iphone.html">iPhone</a>
                        <a href="Samsung.html">Samsung</a>
                        <a href="Basket.php">Basket</a>
                </div>
        </div>

        <div id="maincontents"> <!--This section below is for the login fields-->

        <!-- Display personal greeting message -->
        <?php echo "<h1 style=\"color: black;\">Welcome {$user['name']}</h1"; ?>
                
                <br>
                <br>

                <div style="text-align: left; margin-left: 5%;">
                    <h2>Orders:</h2>
                    <br>

                    <!-- Display orders -->
                    <?php 
                    
                        foreach ($user['order'] as $order) {
                            
                            echo "<h3>Product: {$order['name']} <h3><br>";
                            
                            echo "<h3>Price: {$order['price']} <h3><br>";
                        }
                    
                    ?>

                    <!-- Edit form -->
                    <h2>Edit details</h2>

                    <form action="./PHP/edit.php" method="POST">
                    <?php 

                        echo "<input type=\"hidden\" name=\"id\" class = \"inputBox\" value=\"{$user['_id']}\"><br>";

                        echo "<input type=\"text\" name=\"name\" class = \"inputBox\" placeholder=\"{$user['name']}\"><br>";

                        echo "<input type=\"text\" name=\"email\" class = \"inputBox\" placeholder=\"{$user['email']}\"><br>";

                        echo "<input type=\"text\" name=\"address\" class = \"inputBox\" placeholder=\"{$user['address']}\"><br>";

                        echo "<input type=\"password\" name=\"password\" class = \"inputBox\" placeholder=\"Password\"><br>";
                    ?>
                    <input type="Submit" class="checkoutButton" value="Edit">
                    </form>
                </div>


            </div> 


        <div>
                <div id="Footer"> <!--This is for the footer-->
                        <p> Any queries contact us at: latestmobile@gmail.com or call us on 07913113089 Thanks.</p>
                </div>
        </div>

</body>


</html>
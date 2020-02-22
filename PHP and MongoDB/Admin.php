<?php 

    // Include libraries
    require __DIR__ . '/vendor/autoload.php';

    // Create an instance of a MongoDB client
    $mongoClient = (new MongoDB\Client);

    // Select database
    $db = $mongoClient->Shop;

    // Select collection
    $collection = $db->Products;
    
    // Fetch all products
    $products = $collection->find();

    // Select collection
    $collection = $db->Orders;
    
    // Fetch all orders
    $orders = $collection->find();
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
                        <h1>Admin panel</h1> <!--This is for main heading-->

                </div>
                <div id="NavigationBar"> <!--This section below is for the navigation bars-->
                        <a href="index.html">Home</a>
                        <a href="Iphone.html">iPhone</a>
                        <a href="Samsung.html">Samsung</a>
                        <a href="Basket.php">Basket</a>
                        <a href="Add.html">Add product</a>
                </div>
        </div>

        <div id="maincontents"> <!--This section below is for the login fields-->

        <h1 style="color: black;">Products</h1>   

        <?php 

        // Show every product and allow user to be able to edit any product
        foreach ($products as $product) {
           echo "<form method=\"POST\" action=\"./PHP/Admin Files/editProduct.php?\">";

           echo "<div class =\"phoneimage\"><img id=\"iphone6\" height=\"80%\" src=\"{$product['img']}\"> ";

           echo "<input type=\"hidden\" name=\"productID\" value=\"{$product['_id']}\">";

           echo "<h1>{$product['name']}&pound;{$product['price']}</h1>";

           echo "<input type=\"submit\" value=\"Edit\" style=\"margin-top: 3%; background-color: white; padding: 1%\">";

           echo "</form>";
        }
         ?>
        <br>

        <h1 style="color: black;">Orders</h1>

            <div>
               <?php 
                foreach ($orders as $order) {
                    echo "<h3>Name: {$order['name']}</h3> <br>";

                    echo "<h3>Number: {$order['number']}</h3> <br>";

                    echo "<h3>email: {$order['email']}</h3> <br>";

                    echo "<h3>Address: {$order['address']}</h3> <br>";

                    echo "<h3>Purchases: {$order['basket']}</h3> <br>";

                    echo "<a href=\"./PHP/Admin Files/deleteOrder.php?id={$order['_id']}\" class = \"deleteText\">Remove</a>";
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
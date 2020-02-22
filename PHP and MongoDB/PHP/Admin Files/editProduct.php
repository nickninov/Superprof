<?php 

    // Include libraries
    require __DIR__ . '/vendor/autoload.php';

    // Create an instance of a MongoDB client
    $mongoClient = (new MongoDB\Client);

    // Select database
    $db = $mongoClient->Shop;

    // Select collection
    $collection = $db->Products;
    
    // Find product by ID
    $product = $collection->find(array("_id" => new MongoID($_POST['productID'])));
 ?>

<!DOCTYPE html>
<html>

<head> <!--This is for main title-->
        <title> Mobile Store 
        </title>
        <link rel="stylesheet" type="text/css" href="../../CSS/Admin style.css">

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
                </div>
        </div>

        <div id="maincontents"> <!--This section below is for the login fields-->

        <h1 style="color: black;">Edit product</h1>   


            <div class ="phoneimage">

                <form method="POST" action="./edit.php">

                        <input type="hidden" class = "inputBox" name="id" value="" />

                        <?php echo "<input type=\"text\" name=\"name\" class = \"inputBox\" placeholder=\"{$product['name']}\">"; ?>
                        

                        <?php echo "<input type=\"text\" name=\"price\" class = \"inputBox\" placeholder=\"{$product['price']}\">"; ?>


                        <!-- Edit button -->
                        <input type="submit" value="Edit" style="margin-top: 3%; background-color: white; padding: 1%">
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
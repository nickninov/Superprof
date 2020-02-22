<!-- Start the PHP session -->
<?php session_start();?>

<!DOCTYPE html>
<html>

<head> <!--This is for main title-->
        <title> Mobile Store </title>
        <link rel="stylesheet" type="text/css" href="CSS/Basket style.css"> <!--This is for the Basket page "CSS" link-->

</head>

<body>
        <div id="header">  
                <div id="Title">
                        <h1>Check out</h1> <!--This is for main heading-->

                </div>
                <div id="NavigationBar"> <!--This section below is for the navigation bars-->
                        <a href="index.html">Home</a>
                        <a href="Iphone.html">iPhone</a>
                        <a href="Samsung.html">Samsung</a>
                        <a >Basket</a>
                        <a href="Login.html">Login</a>
                </div>
        </div>

        <div id="maincontents"> <!--This is for where the customer basket is-->

                <!-- PHP logic to check if basket is empty -->
                <?php               
                    // A variable that will store the total amount that the customer has to pay
                    $total = 0;
                ?>
                <!-- This div is to align text to the left side --->
                <div style="text-align: left;"> 
                        <!-- This div is to push the content inside the page --->
                        <div style="margin-left: 5%;"> 

                        <form action="./PHP/confirmPurchase.php" method="POST">

                        <h1>Personal details</h1>

                        <input type="text" name="name" class = "inputBox" placeholder="Full name" required>

                        <input type="text" name="number" class = "inputBox" placeholder="Phone number" required>

                        <br>

                        <input type="text" name="email" class = "inputBox" placeholder="example@gmail.com" required>

                        <br>

                        <input type="text" name="address" class = "inputBox" placeholder="68 Warwick Road" required>

                        <input type="text" name="postcode" class = "inputBox" placeholder="W5 5PT" required>



                            <h1 style="margin-top: 1%">Basket</h1>
                                <!-- This div is to allow scroll -->
                                <div style="height: 30vh; overflow-x: hidden; overflow: scroll;">
                <?php
                        // Display all items that have been added to the basket
                        for($i = 0; $i < count($_SESSION["basket"]); $i++) {      
                ?>  
                <!-- Close PHP logic -->
                <!-- Display single item -->

                <!-- Wrapper of a single element -->
                        <div class="itemWrapper">

                                <!-- Item details -->
                                <h1  class = "basketText">

                                <?php 
                                // Increase total amount of money
                                $total += $_SESSION["basket"][$i]['price'];

                                // Display data from session
                                echo "{$_SESSION["basket"][$i]['name']}: &pound;{$_SESSION["basket"][$i]['price']}"; ?>
                                </h1>

                                <!-- Remove from basket text -->
                                <h3><?php 
                                        echo "<a href=\"./PHP/remove.php?item={$i}\" class = \"deleteText\">Remove</a>";
                                 ?></h3>
                        </div>


                        <?php } ?><!-- Close PHP logic -->
                </div>
                <h1 style="margin-top: 2%; margin-bottom: 3%;">Total: &pound;<?php echo "{$total}"; ?></h1>

                <input type="Submit" class="checkoutButton" value="Check out">
                </form>
                </div>      
                </div>

        </div>
        <div>

                <div id="Footer"> <!--This is for the footer-->
                        <p> Any queries contact us at: latestmobile@gmail.com or call us on 07913113089 Thanks.</p>
                </div>
        </div>

</body>

</html>
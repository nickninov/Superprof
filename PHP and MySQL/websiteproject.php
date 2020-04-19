<?php 
// Start session on the page
session_start(); ?>

<html>
<head>
<meta charset="UTF-8">  
   <title> Computers </title> 
   
   <link rel = "stylesheet" type = "text/css" media = "screen " href ="Style/style.css">
   </head>
   <body>   
   <h1 style = "text-align:center"; > The computers: In the past, present and in the future </h1>
   <p>
      <img src ="Images/computers.jpg" alt="Computers Evolution" style ="float:right;width:700px;height:370px;border:5px solid black;">
   Computers have made an undeniably permanent mark on the world, but their success wasn’t gained 
   overnight. They slowly improved what they could do, leading to advancements that led to new advancements. 
   Let’s look at how they progressed to what they are today and try to predict how are they 
   going to look like and what will they do more in the future. 
   <img src ="Images/background3.jpg" alt="Computers Evolution" style ="float:bottom;width:400px;height:200px;border:5px solid Black;">
   </p>	
      
      <p class="link"> <a href = "oldcomputers.html">Computers in the past</a></p>


      <p class="link"> <a href = "moderncomputers.html">Modern computers</a> </p>


      <p class="link"><a href = "futurecomputers.html">Computers in the future</a></p>


   <div id="form">

      <form action="./PHP/validate.php" method = "post">
         
            <input type="text" name="name" placeholder="Name" class="input" required><br>

            <input type="text" name="email" placeholder="Email" class="input" required><br>

            <textarea name="comment" rows="5" cols="40" class="input" placeholder="Hello, my name is Andy!" required></textarea> <br/>

            <input type="submit" value="Send!" class="btn">

            <?php 
               // Check if there is a message
               if(isset($_SESSION['message'])){
                  echo "{$_SESSION['message']}";
               }
             ?>
      </form>

      <p style="font-size: 0.9em">
      Here you can find a lot of useful information. If you want to receive more <br/> interesting news about the computers,
      the way they work or new updates on future <br/> computers and what should we expect in the following years, you can leave your email<br/>
      here and I will inform you as soon as something new pops up. 
   </p>
   </div>




</body>
</html> 
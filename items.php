<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="home.css">
<!--<link rel="stylesheet" href="buttons.css">-->
<script src="billing.js"></script>
</head>
<body>
    <div class="header">
<h1>Welcome to the Home Page</h1>
    </div>
    <div class="navigationbar">
    <a href="index.html">Home</a>    
    <a href="signup.html">Customer Info Sign Up</a>
    <a href="billing.php">Today Sale</a>
            <a href="bill.php">Billing</a>
    <a href="about.html">About Us</a>
    <a href="contact.html">Contact Us</a>   
    </div>
    <?php
    $servername="localhost";
    $user="manish";
    $password="rgukt123";
    $db="market";
    $conn = new mysqli($servername, $user, $password,$db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $items_sql="select name from items";
    $result_items=$conn->query($items_sql);
   echo "<form action=final.php method=POST>";
   while($row=$result_items->fetch_assoc()){
       echo "<input type=radio value=$row[name] name=item>$row[name]<br>";
   }
   echo "<input type=submit value=Submit>";
   echo "</form>";
    $_SESSION['biller']=$_POST['biller'];
    $conn->close();
    ?>    
</body>
</html>
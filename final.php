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
    $_SESSION['item']=$_POST['item'];
    echo $_POST['item'];
    ?>
    <form action="final1.php" method="post">
        Enter Quantity <input type=number name=Quantity><br>
        Enter Price <input type=number name=Price><br>
        <input type=submit value=Submit>
</form>
</body>
</html>
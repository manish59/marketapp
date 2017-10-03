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
    $phone=$_SESSION['biller'];
    $item=$_SESSION['item'];
    $price=$_POST['Price'];
    $quantity=$_POST['Quantity'];
    $date=date("y/m/d");
    $servername="localhost";
    $user="manish";
    $password="rgukt123";
    $db="market";
    $conn = new mysqli($servername, $user, $password,$db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql="INSERT INTO sale(date,item_name,Quantity,price,phone) VALUES('$date','$item',$quantity,$price,'$phone');";
    echo $date;
    if ($conn->query($sql) === TRUE) {
        echo "<h3>Congrats Your data is successfully entered... </h3>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
     ?>
</body>
</html>
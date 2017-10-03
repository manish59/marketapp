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
    <p id="demo"></p>
<?php
$servername="localhost";
$user="manish";
$password="rgukt123";
$db="market";
$conn = new mysqli($servername, $user, $password,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql="select fname,lname,phone from info";
$result=$conn->query($sql);
if ($result->num_rows > 0) {
    $man=1;
    //echo "<form action='items.php' method='POST'>";
   // echo "</form>";
    echo "<form action='items.php' method='POST'>";
    while($row = $result->fetch_assoc()) {
        echo "<input id=$man type='radio' value=$row[phone]  name='biller';>$row[fname]<br>";
        echo "<br>";
        $man=$man+1;
        
     } $result->free();
     echo "<input type='submit' value='Submit'>";
      echo "</form>";
} else {
    echo "0 results";
}

$conn->close();
?>
</body>
</html>
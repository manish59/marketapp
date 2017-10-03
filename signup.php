<!DOCTYPE html>
<html>
<head>
<title>Customer Sign Up</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="header">
    <h1>Customer Sign Up</h1>
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
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$balance=$_POST['balance'];
$gender=$_POST['Gender'];
$village=$_POST['village'];
$phone=$_POST['phonenumber'];
$town=$_POST['town'];
$pin=$_POST['pincode'];
$date1=date("y/m/d");
$time1=date("y/m/d h:i:s");
$sql="INSERT INTO info (fname, lname,gender,balance,phone, village, town, pincode) VALUES( '$fname', '$lname','$gender',$balance,'$phone', '$village','$town','$pin')";
if ($conn->query($sql) === TRUE) {
    echo "<h3>Congrats Your data is successfully entered... $fname</h3>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql2="INSERT INTO account(phone,balance,date,time) VALUES('$phone',$balance,'$date1','$time1');";
if ($conn->query($sql2) === TRUE) {
    echo "<h3>Congrats Your data is successfully entered... $fname</h3>";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}
$conn->close();
?> 
</body>
</html>
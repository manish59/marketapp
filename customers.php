<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="home.css">
<script src="index.js"></script>
</head>
<body>
    <div class="header">
<h1>Welcome to the Home Page</h1>
<script>today();</script>
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
$customers_sql="select fname,lname,balance from info";
$customer_result=$conn->query($customers_sql);
$count=1;
echo "<table>";
echo "<tr><th>Serial</th><th>Name of the customer</th><th>Balance Owed</th></tr>";
while($row=$customer_result->fetch_assoc()){
    $name=$row[fname]." ".$row[lname];
    echo "<tr><td>$count</td><td>$name</td><td>$row[balance]</td></tr>";
    $count=$count+1;
}echo "</table>";
?>
</body>
</html>
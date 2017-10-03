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
$item_sql="select name from items";
$item_result=$conn->query($item_sql);
if($item_result->num_rows>0){
    $count=1;
    while($row=$item_result->fetch_assoc()){
    echo "<b><span style=line-height:140%;font-size:140%;>$count.$row[name]</span></b><br>";
    $count=$count+1;
}
}
else{
    echo "<p><b>No items in the database. Add some items</b><p>";
}
?>
</body>
</html>
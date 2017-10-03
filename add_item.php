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
/*
$item_sql="select name from items";
$item_result=$conn->query($item_sql);
if($item_result->num_rows>0){
    echo $row[name];
}
else{
    echo "<p><b>No items in the database. Add some items</b><p>";
}*/
echo "<form action=add_item.php method=POST>";
echo "<p><b>Enter Item Name</b></p><input type=text name=item required>";
echo "<input type=submit value='Add Item'>";
echo "</form>";
$item_name=$_POST['item'];
$add_sql="INSERT into items (name) values('$item_name');";
if($conn->query($add_sql))
{
    echo "<p><b>alert('Successfully added item')</b></p>";
}
if(!$conn->query($add_sql)){
    echo "alert('Error Please try again')";
}
?>
</body>
</html>
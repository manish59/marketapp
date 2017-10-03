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
$customers_sql="select fname,lname,gender,balance,phone,village,town,pincode from info";
$customer_result=$conn->query($customers_sql);
echo "<form action=edit_customer.php method=POST>";
echo "<select name='customer'>";
while($row=$customer_result->fetch_assoc()){
    $full_name=$row[fname]." ".$row[lname];
    echo "<option value=$row[fname]>$full_name</option>";
}
echo "</select>";
echo "<input type=submit value='Submit'>";
echo "</form>";
echo "<form action=edit_customer.php method=POST>";
$selected_customer=$_POST['customer'];
$editing_sql="select fname,lname,gender,balance,phone,village,town,pincode from info where fname='$selected_customer';";
$editing_result=$conn->query($editing_sql);
echo "<form action=edit_customer.php method=POST>";
while($row=$editing_result->fetch_assoc()){
    echo "<p><b>Enter First Name</b></p><input type=text name=firstname value=$row[fname]><br>";
    echo "<p><b>Enter Last Name</b></p><input type=text name=lastname value=$row[lname]><br>";
    echo "<p><b>Select Gender</b></p><select name='gender'><option value=Male>Male</option><option value=Female>Female</option></select><br>";
    echo "<p><b>Enter Balance</b></p><input type=number name=balance value=$row[balance]><br>";
    echo "<p><b>Enter phone</b></p><input type=text name=phone value=$row[phone] required><br>";
    echo "<p><b>Enter Village</b></p><input type=text name=village value=$row[village]><br>";
    echo "<p><b>Enter Town</b></p><input type=text name=town value=$row[town]><br>";
    echo "<p><b>Enter Pincode</b></p><input type=text name=pincode value=$row[pincode]><br>";
    echo "<input type=submit value=Submit>";
    echo "<input type=reset value=Reset>";
}echo "</form>";
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$balance=$_POST['balance'];
$gender=$_POST['Gender'];
$village=$_POST['village'];
$phone=$_POST['phone'];
$town=$_POST['town'];
$pin=$_POST['pincode'];
//echo $fname,$fname, $lname,$gender,$balance,$phone, $village, $town, $pin;
$submit_sql="UPDATE info set fname='$fname',lname='$lname',balance=$balance,gender='$gender',village='$village',phone='$phone',town='$town',pincode='$pin' where phone='$phone';";
$submit_sql=$conn->query($submit_sql);
if($submit_sql)
{
    echo "<h3>Successfull Edited ".$fname."</h3>";
}
else{
    echo "Error";
}
?>
</body>
</html>
<?php session_start(); ?>
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
    $bill="<html>";
    setlocale(LC_MONETARY,'en_IN');
    function convert_india($price){
        $amount=(string)$price;
        $indian=money_format('%.2n',$amount);
        return $indian;
    }
$servername="localhost";
$user="manish";
$password="rgukt123";
$db="market";
$conn = new mysqli($servername, $user, $password,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql="select fname,phone from info;";
$result=$conn->query($sql);
if ($result->num_rows > 0) {
    echo "<form action='bill.php' method=POST>";
    echo "<select name='customer_name'>";
    while($row = $result->fetch_assoc()) {
        echo "<option value=$row[phone]>$row[fname]</option>";
    }
    echo "</select>";
    echo "<input type='date' name=date>";
    echo "<input type='submit' value='Submit'>";
    echo "</form>";
}
$date=$_POST['date'];
$customer=$_POST['customer_name'];
$sql1="select item_name, Quantity , price from sale where phone='$customer' and date='$date';";
$sql2="select fname,lname,balance from info where phone='$customer'";
$result2=$conn->query($sql2);
$result1=$conn->query($sql1);
if($result2->num_rows>0)
{
    echo "<table>";
    while($row=$result2->fetch_assoc()){
      $_SESSION['firstname']=$row[fname];
      $_SESSION['lastname']=$row[lname];
      $_SESSION['balance']=$row[balance];
      $name=$row[fname]." ".$row[lname];
      $balance=convert_india($_SESSION['balance']);
      echo "<tr><td>Name of the Customer</td><td><b>$name</b></td></tr>";
      echo "<tr><td>Previous Balance</td><td>$balance</td></tr>";
      echo "<tr><td>Date</td><td>$date</td></tr>";
    }
    echo "</table>";
    echo "<br>";
}
$latest_balance1=convert_india($_SESSION['balance']);
$latest_balance=$_session['balance'];
if($result1->num_rows>0)
{
  //echo $_SESSION['firstname']." ".$_SESSION['lastname']." Balance Amount".$_SESSION['balance'];  
  echo "<table>";
  echo "<tr><td><b>Name of the Item</b></td><td><b>Quantity</b></td><td><b>Price</b></td><td><b>Total</b></td></tr>";
  $count=0;$sum=0;
  while($row=$result1->fetch_assoc()){
      $total=$row[Quantity]*$row[price];
      $sum=$sum+$total;
      $count=$count+1;
      $price=convert_india($row[price]);
      $total1=convert_india($total);
      echo "<tr><td>$row[item_name]</td><td>$row[Quantity]</td><td>$price</td><td>$total1</td></tr>";
  }
  $portal_charges=($count*5);
  $sum=$sum+$portal_charges;
  $portal_charges1=convert_india($portal_charges);
  $sum1=convert_india($sum);
  echo "<tr><td><b>Portal Charges</b></td><td>$count</td><td>5</td><td>$portal_charges1</td></tr>";
  echo "<tr><td><b></b></td><td></td><td><b>Total<b></td><td>$sum1</td></tr>";  
  echo "</table>";
  echo "<br>";
  echo "<table>";
  echo "<tr><td>Total Sale</td><td>$sum1</td></tr>";
  echo "<tr><td>Previous Balance</td><td>$latest_balance1</td></tr>";
  $total_sum=$sum+$_SESSION['balance'];
  $final_total=convert_india($total_sum);
  echo "<tr><td><b>Amount Owed</b></td><td>$final_total</td></tr>";
  echo "</table>";
  $_date=date("y/m/d");
  $_time=date("y/m/d h:i:s");
  $sql3="INSERT INTO account (phone,balance,date,time)values('$customer',$total_sum,'$_date','$_time');";
  $sql4="UPDATE info set balance=$total_sum where phone='$customer';";
  echo "<script>";
  echo "function update(){";
  $balanceupdate=$conn->query($sql3);
  $sqlbalance=$conn->query($sql4);
  if(!$balanceupdate)
  {
    echo "alert('Query Not executed');";
  }
  else{
      echo mysqli_error($conn);
      echo "alert('Update succesfully');";
      echo "window.location='bill.php';";
  }
  if(!$sqlbalance){
      echo "alert('Query Executed and not inserted in info');";
  }
  else{
      echo "alert('Data upated in info');";
      echo "window.location='bill.php';";
  }
  echo "}";
  echo "</script>";
  echo "<script>";
  echo "function print(){";
  echo "window.print();}";
  echo "</script>";
}
$bill .="</html>";
echo $bill;
 ?>
<input type=button onclick=update() value=Update>
<input type=button onclick=print() value=Print>
</body>
</html>
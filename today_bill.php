<!DOCTYPE html>
<html>
<head><title>Today Bill</title><link rel="stylesheet" href="home.css">
</head><body>
    <?php 
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
$todate=date("20"."y/m/d");
$today_date=date("d/m/y");
$phone_sql="select phone from info";
$phone_query=$conn->query($phone_sql);
while($row=$phone_query->fetch_assoc()){
    $query1="select fname,lname,balance,phone from info where phone='$row[phone]'";
    $query1_result=$conn->query($query1);
    $txt="";
    while($result3=$query1_result->fetch_assoc()){
        echo $result3[fname];
        $file=fopen($result3[fname].".html","w");
        $txt=$txt."<html><head><link rel=stylesheet href=home.css></head><body><center><div class=bord1><h1>Amarnath Vegetable Market</h1>";
        $txt=$txt."<p style=align:right;><b>Amarnath Bobbili : +919885937284</b></p><p style=align:right;><b>Shiva Kumar Bobbili : +919866735463</b></p>";
        $txt=$txt."<p style=align:right;><b>Rudrappa Bobbili : +919885937284</b></p></div></center>";
    $_SESSION['main_balance']=$result3[balance];
    $query2="select date,item_name,Quantity,price from sale where phone='$result3[phone]' and date='$todate'";
    $query2_result=$conn->query($query2);
    $sum_total=0;
    $count=1;
    $txt=$txt."<p>"."Name of the Customer:"."<b>".$result3[fname]." ".$result3[lname]."</b>"."</p><p>Date:<b>".$today_date."</b></p>";
    $txt=$txt."<p>Contact Number :".$result3[phone]." </p>";
    echo "<table>";
    $txt=$txt."<table>";
    echo "<tr><th>Name of the item</th><th>Quantity</th><th>Price</th><th>Total</th></tr>";
    $txt=$txt."<tr><th>Name of the item</th><th>Quantity</th><th>Price</th><th>Total</th></tr>";
    while($result4=$query2_result->fetch_assoc()){
        $total=$result4[Quantity]*$result4[price];
        $sum_total=$sum_total+$total;
        $count=$count+1;
        $price=convert_india($result4[price]);
        $var_total=convert_india($total);
       echo "<tr><td>$result4[item_name]</td><td>$result4[Quantity]</td><td>$price</td><td>$var_total</td></tr>";
       $txt=$txt."<tr><td>$result4[item_name]</td><td>$result4[Quantity]</td><td>$price</td><td>$var_total</td></tr>";
    }
    $portal_charges=($count*5)-5;
    $var_sum_total=convert_india($sum_total);
    $var_portal_charges=convert_india($portal_charges);
    $previous_balance=convert_india($result3[balance]);
    echo "<tr><td></td><td></td><td>Today Sale Total</td><td><b>$var_sum_total</b></td></tr>";
    $txt=$txt."<tr><td></td><td></td><td>Today Sale Total</td><td><b>$var_sum_total</b></td></tr>";
    echo "<tr><td></td><td></td><td>Portal Charges</td><td><b>$var_portal_charges</b></td></tr>";
    $txt=$txt."<tr><td></td><td></td><td>Portal Charges</td><td><b>$var_portal_charges</b></td></tr>";
    echo "<tr><td></td><td></td><td>Previous Balance</td><td><b>$previous_balance</b></td></tr>";
    $txt=$txt."<tr><td></td><td></td><td>Previous Balance</td><td><b>$previous_balance</b></td></tr>";
    $final_total=$sum_total+$result3[balance]+$portal_charges;
    $var_final_total=convert_india($final_total);
    echo "<tr><td></td><td></td><td>Final Amount Owed</td><td><span style=font-size:150%;>$var_final_total</span></b></td></tr>";
    $txt=$txt."<tr><td></td><td></td><td>Final Amount Owed</td><td><span style=font-size:150%;>$var_final_total</span></b></td></tr>";
    echo "</table>";
    $txt=$txt."</table><br><br><br><br><hr style=width:50%;margin:0%;><p>Signature</p><script>window.print()</script></body></html>";
    echo "<br>";
    fwrite($file,$txt);
    fclose($file);
    }


}
$date=date("y-m-d");
echo $date;

//fclose($file);
$conn->close();
?></body>
</html>
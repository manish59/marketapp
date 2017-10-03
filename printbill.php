<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Customer Sign Up</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bill.css">
</head>
<body>
    <div class=contact>
    <h1><span style="color:blue;font-size:80%";>Amarnath Market</span></h1>
    <p><b>Amarnath Bobbili    : +919885937284</b></p>
    <p><b>Shiva Kumar Bobbili : +919866735463</b></p>
    <p><b>Rudrappa Bobbili    : +919849310924</b></p>
    <p><b>Vinay Bobbili</b></p>
    <p><b>Date : </b><?php echo date("d/m/y");?></p>
</div>
    <hr><?php
    echo "<script>";
    echo  "document.getElementById('date').innerHTML=Date();";
    echo  "window.print();";
    echo  "</script>";?>
</body>
</html>
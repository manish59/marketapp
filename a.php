<html>
<body>
<script type="text/javascript">     
function PrintDiv() {    
   var divToPrint = document.getElementById('divToPrint');
   var popupWin = window.open('', '_blank', 'width=21cm,height=29.7cm');
   popupWin.document.open();
   popupWin.document.write('<html><body onload="window.print()"> ' + divToPrint.innerHTML + '</html>');
    popupWin.document.close();
        }
</script>
<div id="divToPrint" style="display:none;">
<div style="width:200px;height:300px;background-color:teal;">
       <?php echo $html; ?>      
</div>
</div>
<div>
<input type="button" value="print" onclick="PrintDiv();" />
</div>
</body>
</html>
<?php


?>

<html>
<head>
<title></title>
<script>
// function calc() {
//   var amount = document.getElementById("amount").value;
//   var amount = parseInt(amount, 10);
//   var quantity = document.getElementById("quantity").value;
//   var quantity = parseInt(quantity, 10);
//   var total = amount * quantity;
//   document.getElementById("total").value = total;
// }

</script> 

</head>
<body>
  <script>
      function dates(){
      var currentDate = new Date();
// to add 6 days to current date
var duedate = currentDate.addDays(6);
document.getElementById("duedate").value = duedate;
alert('this is'+duedate);
}
  </script>
 <button id="duedate" name="duedate" onclick="dates()">click</button>
</body>
</html>


<?php
require_once 'connection.php';


if(isset($_POST['submit']))
{    
     $cardname = $conn -> real_escape_string($_POST['cardname']);
     $cardnumber = $conn -> real_escape_string($_POST['cardnumber']);
     $expmonth = $conn -> real_escape_string($_POST['expmonth']);
	 $expyear = $conn -> real_escape_string($_POST['expyear']);
	 $cvv = $conn -> real_escape_string($_POST['cvv']);
	 
	 
	 //echo $cardname." - ".$cardnumber." - ".$expmonth." - ".$expyear." - ".$cvv;
	 
$sql = "INSERT INTO payment(order_id,cash_holderName,card_number,CVV,amount,status,date) 
VALUES ('1','{$cardname}','{$cardnumber}','{$cvv}','1000','paid','$expyear-$expmonth-1')";

//echo $sql;

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header('Location: ../payment.php?status=1');

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



}

else echo "no data received:(".$_POST['submit'];
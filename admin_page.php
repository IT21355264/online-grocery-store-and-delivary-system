<?php

@include 'config.php';

error_reporting(0);

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
   
   $connection = mysqli_connect("localhost","root","");
   $db = mysqli_select_db($connection,'hey_goods');

if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	
	$query = "UPDATE `user_form` SET email='$_POST[email]',address='$_POST[address]',m_number='$_POST[m_number]',password='$_POST[password]' where name='$_POST[name]' ";
	$query_run = mysqli_query($connection,$query);
	
	if($query_run)
	{
		echo '<script>alert("Data Updated");</script>';
	}
	else
	{
		echo '<script>alert("error");</script>';
	}
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styles/stly.css">

<div class="topnav">
   <div class="img">
     <a href="User_page.php"><img src="img/H_goods.jpg" alt="logo" width="100"height="100"></a></div >
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <div class="dropdown">
           <button class="dropbtn">
             <i class="fa fa-user" style="font-size:25px;color:white"></i>
               <div class="dropdown-content">
	  <a href="admin_page.php">Admin</a>
	  <a href="login_form.php">customer</a>

  </div>
  </div>
    <div class="Search">
	<input type="text" placeholder="Search.."> </div>
	<br>
         <a href="#" class="nav-button">Home</a> 	 
		 <a href="#" class="nav-button">Delivery</a>
		 <a href="#" class="nav-button">Contact</a>
		 <a href="#" class="nav-button">About us</a>
	
</div>
 <hr>
 <div class="bottomnav">
    <a href="#" class="nav2-button">Vegetable</a>
	 <a href="#" class="nav2-button">Fruits</a>
	 <a href="#" class="nav2-button">Sea foods</a>
	 <a href="#" class="nav2-button">Meat & poultry</a>
	 <a href="#" class="nav2-button">Bakery</a>
	 <a href="#" class="nav2-button">Deli chiller</a>
	 <a href="#" class="nav2-button">Liquar</a>
	 <a href="#" class="nav2-button">Clearance</a>
	 <a href="./stocks/" class="nav2-button ">Stocks</a>
	
  </div>

<hr>

</head>
<body>

   
<div class="container">
   <div class="content">
   	  <h1>hi,</h1>
        <h1>welcome <span><?php echo $_SESSION['user_name'] ?>,</span></h1>
          <form action="" method="post">
			  <?php
			  if(isset($error)){
				 foreach($error as $error){
					echo '<span class="error-msg">'.$error.'</span>';
				 };
			  };
			  ?>

</div>
   <div class="editbox2">
     <div class="productData tbl" id="bstyle">
       <b><h2 color="black">payment details</h2><b>
         <table border="1px" width="100%">
           <tr>
			<th>payment_id</th>	
			<th>amount</th>
			<th>status</th>
			<th>card_number</th>	
			<th>cardholder_name</th>
			<th>date</th>
          </tr>
<tbody>
    <?php
		$query = "SELECT * FROM payment";
		$statement = $conn->prepare($query);
		$statement->execute();
		
		$resultSet = $statement->get_result();
		
		$result = $resultSet->fetch_all(MYSQLI_ASSOC);
		if($result)
		{
			foreach($result as $row)
			{
				?>
				<tr>
					<td><?= $row['payment_id']; ?></td>
					<td><?= $row['amount']; ?></td>
					<td><?= $row['status']; ?></td>
					<td><?= $row['card_number']; ?></td>
					<td><?= $row['cardholder_name']; ?></td>
					<td><?= $row['date']; ?></td>
				</tr>
				<?php
			}
		}
		else
		{
			?>
			<tr>
				<td colspan="5">No Record Found</td>
			</tr>
			<?php
		}
	?>

</tbody>	
    </table>
      </div>
       </div>
          <a href="logout.php" class="nav2-button">logout</a>
   </div>
<div class="ftr">
  <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <br>
  <hr>
	<i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p style="font-style:italic;"> By sinning us you agree to terms of conditions an privacy policy</p>
</footer>
</div>

</body>
</html>
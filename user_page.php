<?php

@include 'config.php';

error_reporting(0);

session_start();

		if(!isset($_SESSION['user_name'])){
		   header('location:login_form.php');
		}
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'hey_goods');


		if(isset($_POST['submit']))
		{
			$email = $_POST['email'];
			
			$query = "UPDATE `user_form` SET name='$_POST[name]',address='$_POST[address]',m_number='$_POST[m_number]',password='$_POST[password]' where email='$_POST[email]' ";
			$query_run = mysqli_query($connection,$query);
			
			if($query_run)
			{
				echo '<script>alert("Data Updated");</script>';
			}else
			{
				echo '<script>alert("error");</script>';
			}
		}else if(($_POST['delete']))
		{
			$email = $_POST['email'];
			$query = "DELETE from `user_form` where email='$_POST[email]' ";
			
			$query_run = mysqli_query($connection,$query);
			
			if($query_run)
			{
				echo '<script>alert("Data Deleted");</script>';
			}else
			{
				echo '<script>alert("error");</script>';
			}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
		   <meta charset="UTF-8">
		   <meta http-equiv="X-UA-Compatible" content="IE=edge">
		   <meta name="viewport" content="width=device-width, initial-scale=1.0">
		   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		   <title>user page</title>

		   <!-- custom css file link  -->
		   <link rel="stylesheet" href="styles/stly.css">

<div class="topnav">
	<div class="img">
		<a href="home page.html"><img src="img/H_goods.jpg" alt="logo" width="100"height="100"></a></div >
			<div class="dropdown">
				<button class="dropbtn">
					<i class="fa fa-user" style="font-size:25px;color:white"></i>
 
						<div class="dropdown-content">
						  <a href="User_page.php">Customer</a>
						  <a href="login_form.php">Admin</a>

						</div>
			</div>
                            <div class="Search">
	                        <input type="text" placeholder="Search.."> </div>
	<br>	
								 <a href="home page.html" class="nav-button">Home</a>	 
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
							 </div>

<hr>
<!---------------------------------------------------------------------------------------------------->
</head>
<body> 
     <div class="editbox">
        <div class="content">
		  <h1>Hi,</h1>
			<h1>welcome <span><?php echo $_SESSION['user_name'] ?>,</span></h1>
				<form action="" method="post">
					<h3>Edit profile</h3>
					  <?php
					  if(isset($error)){
						 foreach($error as $error){
							echo '<span class="error-msg">'.$error.'</span>';
						 };
					  };
					  ?>
						   <input type="text" name="name" required placeholder="enter your name">
						   <input type="email" name="email" required placeholder="enter your current email">
						   <input type="address" name="address" required placeholder="enter your address">
						   <input type="text" name="m_number" pattern="[0-9]{10}"required placeholder="enter your phone number" >
						   <input type="password" name="password" required placeholder="enter your password">
						   <input type="submit" name="submit" value="reset" class="form-btn">
						   <input type="submit" name="delete" value="delete my account" class="form-btn">
	                       <a href="logout.php" class="nav2-button">logout</a>
               </form>
       </div>
		   <div class="editbox2">
		     <div class="privacy">
  <p>
			<h1>To learn,</h1>

				<li><a href="https://www.freeprivacypolicy.com/blog/privacy-policy-ecommerce-stores/#What_Is_A_Privacy_Policy">What is a Privacy Policy? </li><br>
				<li><a href="https://www.freeprivacypolicy.com/blog/privacy-policy-ecommerce-stores/#Why_Are_Privacy_Policies_Required">Why are Privacy Policies Required? </li><br>
				<li><a href="https://www.freeprivacypolicy.com/blog/privacy-policy-ecommerce-stores/#What_Should_Your_Privacy_Policy_Contain">What Should Your Privacy Policy Contain? </li><br>
  </p>
           </div>
        </div>
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
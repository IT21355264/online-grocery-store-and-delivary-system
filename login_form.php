<?php

@include 'config.php';
include 'session.php';

error_reporting(0);

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){
         
         $_SESSION['user_type'] = 'admin';
         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');
      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styles/stly.css">

</head>
<body>
   
  <div class="loginbox">
    <form action="" method="post">
		  <h3>login now</h3>
		  <?php
		  if(isset($error)){
			 foreach($error as $error){
				echo '<span class="error-msg">'.$error.'</span>';
			 };
		  };
		  ?>
			  <input type="email" name="email" required placeholder="enter your email">
			  <input type="password" name="password" required placeholder="enter your password">
			  <input type="submit" name="submit" value="login now" class="form-btn">
			  <p>don't have an account? <a href="register_form.php">register now</a></p>
    </form>

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
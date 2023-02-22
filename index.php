<?php
	include('session.php');

	if(isset($_POST['product_id'])){
		$id = $_POST['product_id'];
		$qty = $_POST['quantity'];

		$cart = $_SESSION['cart'];
		$index = array_search($id, $cart, false);
		if($index){
			$cart[$index]->quantity += $qty;
			$_SESSION['cart'] = $cart;
		}else{
			$newItem[0]-> product_id = $id;
			$newItem[0]-> quantity = $qty;
			array_push($cart, $newItem);
			$_SESSION['cart'] = $cart;

		}
	}
?>

<DOCTYPE html>
	<html>

	<head>
		<link rel="stylesheet" href="styles/style.css">
		<link rel="stylesheet" href="styles/ex.css">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> item search</title>
	</head>

	<body>


		<div class="topnav">
			<div class="img">
				<img src="H_goods.jpg" alt="logo" width="150" height="150" <a href="login.html"></a>
			</div>
			<div class="dropdown">
				<button class="dropbtn">
					<i class="fa fa-user" style="font-size:25px;color:white"></i>

					<div class="dropdown-content">
						<a href="User_interface.html">Customer</a>
						<a href="#"> Marketing Manager</a>
						<a href="#"> Technician</a>
						<a href="#"> Supplier </a>
					</div>
			</div>

			<div class="Search">
				<input type="text" placeholder="Search.." id="txtSearch">
			</div>
			<br>

			<a href="#" class="nav-button">Delivery</a>
			<a href="#" class="nav-button">Contact</a>
			<a href="#" class="nav-button">About us</a>

		</div>
		<br>
		<hr>
		<div class="bottomnav">
			<a href="index.php?cat=Vegetable" class="nav2-button">Vegetable</a>
			<a href="index.php?cat=Fruits" class="nav2-button">Fruits</a>
			<a href="index.php?cat=Sea foods" class="nav2-button">Sea foods</a>
			<a href="index.php?cat=Meat" class="nav2-button">Meat & poultry</a>
			<a href="index.php?cat=Bakery" class="nav2-button">Bakery</a>
			<a href="index.php?cat=Deli chiller" class="nav2-button">Deli chiller</a>
			<a href="index.php?cat=Liquar" class="nav2-button">Liquar</a>
			<a href="index.php?cat=Clearance" class="nav2-button">Clearance</a>
		</div>

		<hr>


		<!-- <button class="btn" name="button" type="button">Vegetables</button>
	<button  class="btn" name="button" type="button">fruits</button>
	<button  class="btn" name="button" type="button">seafood</button>
	<button  class="btn" name="button" type="button">Meat & Poultry</button>
	<button  class="btn" name="button" type="button">Bakery</button>
	<button  class="btn" name="button" type="button">Deli &chiller</button>
	<button  class="btn" name="button" type="button">Liquar</button>
	<button  class="btn" name="button" type="button">clearance</button><br><br> -->

		<img src="img/cart.jpg" class="imgcart"><span id="spanCart" class="spanCart">0</span>

		<?php

		if (isset($_GET["cat"])) {
			$category = $_GET["cat"];
			include 'database.php';
			$db = new database();

			$db->connect();
			$sql = 'select p.* from product as p,catogary as c where c.cata_id=p.cat_id and c.cata_name="' . $category . '"  order by p.p_code';
			//echo $sql;
			$result = $db->select($sql);

			if ($result->num_rows > 0) {

		?>
				<table class='table'>
					<tr>
						<?php
						while ($row = $result->fetch_assoc()) {
							//	echo "<br> product code: ". $row["p_code"]. " - Product Name: ". $row["p_name"].  $row["price"]. "<br>";
						?>
							<td class='td'>
								<div class="td-div">
									<?php echo '<img class="img" src="data:image/jpeg;base64,' . base64_encode($row['proimage']) . '"/>'; ?><br>

									<!-- 
							<span class='item-code'><?php echo $row["p_code"] ?></span> -->
									<span class='item-name' id="<?php echo $row['p_code'] ?>_name"><?php echo $row["p_name"] ?></span>
									<span class="price">Rs. </span><span class="price" id="<?php echo $row['p_code'] ?>_price"><?php echo $row["price"] ?></span><br>
									<span class="measureunit" id="<?php echo $row['p_code'] ?>_unit"><?php echo $row["measureunit"] ?></span><br>

									<input type="number" value="1" id="<?php echo $row['p_code'] ?>_qnt"><br><br>
									<input type="button" class="cart" value="Add to cart" onclick="return addtocart('<?php echo $row['p_code'] ?>')">
								</div>
							</td>
						<?php

						}
						?>
					</tr>
				</table>
		<?php
			} else {
				echo "<span class='error'>No records were found.</span>";
			}

			$db->close();
		}
		?>


		<script src="./js/jquery.min.js"></script>
		<script>
			localStorage.setItem("itemlist", JSON.stringify(new Array()));

			function addtocart(code) {

				window.location.href ="./payment.php"

				$.ajax({
					type: "POST", //type of method
					url: "index.php", //your page
					data: {
						product_id: "p8",
						quantity: 1
					}, // passing the values
					success: function(res) {
						console.log("posted")
					}
				});

				var qnt = document.getElementById(code + '_qnt').value;
				if (parseInt(qnt) > 0) {
					var alreadyitem = document.getElementById('spanCart').innerHTML;
					var name = document.getElementById(code + '_name').innerHTML;
					var price = document.getElementById(code + '_price').innerHTML;
					var unit = document.getElementById(code + '_unit').innerHTML;

					var newitems = parseInt(alreadyitem) + 1;
					document.getElementById('spanCart').innerHTML = newitems;

					var fullitems = new Array();
					fullitems = JSON.parse(localStorage.getItem("itemlist"));
					fullitems[alreadyitem] = new Array(code, name, price, unit, qnt);
					if (fullitems.length > 0) {
						for (let i = 0; i < fullitems.length; i++) {
							console.log(fullitems[i]);
						}
					}
					localStorage.setItem("itemlist", JSON.stringify(fullitems));

				} else {
					alert("please enter valid quantity.");
				}
				return false;
			}


			var el = document.getElementById("txtSearch");
			el.addEventListener("keydown", function(event) {
				if (event.key === "Enter") {
					// Enter key was hit

					var search = document.getElementById("txtSearch").value;
					if (search != '') {
						if (search == 'Vegetable' || search == 'Fruits' || search == 'Sea foods' || search == 'Meat' || search == 'Bakery' || search == 'Deli chiller' || search == 'Liquar' ||
							search == 'Clearance')
							window.open("index.php?cat=" + search);
						else
							alert('Invalid search category !');
					} else {
						alert('Please eneter search category and press enter !');
					}
				}
			});
		</script>

		<from method="post" action="cart.php"></from>
	</body>

	</html>
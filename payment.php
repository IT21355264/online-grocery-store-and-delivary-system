<?php

$msg = "";
if (isset($_GET['status']))
  $msg = "
<div class='success-msg'>
  <i class='fa fa-check'></i>

Order Placed successfully !
</div>";

?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles/payment.css">
  <style>
    .payment * {
      box-sizing: border-box;
    }

    .row {
      display: -ms-flexbox;
      /* IE10 */
      display: flex;
      -ms-flex-wrap: wrap;
      /* IE10 */
      flex-wrap: wrap;

    }

    .col-25 {
      -ms-flex: 25%;
      /* IE10 */
      flex: 25%;
    }

    .col-50 {
      -ms-flex: 50%;
      /* IE10 */
      flex: 50%;
    }

    .col-75 {
      -ms-flex: 75%;
      /* IE10 */
      flex: 75%;
    }

    .col-25,
    .col-50,
    .col-75 {
      padding: 0 16px;
    }

    .container {
      background-color: #f2f2f2;
      padding: 5px 20px 15px 20px;
      border: 1px solid lightgrey;
      border-radius: 3px;
    }

    input[type=text] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    label {
      margin-bottom: 10px;
      display: block;
    }

    .icon-container {
      margin-bottom: 20px;
      padding: 7px 0;
      font-size: 24px;
    }

    .btn {
      background-color: #04AA6D;
      color: white;
      padding: 12px;
      margin: 10px 0;
      border: none;
      width: 100%;
      border-radius: 3px;
      cursor: pointer;
      font-size: 17px;
    }

    .btn:hover {
      background-color: #45a049;
    }

    hr {
      border: 1px solid lightgrey;
    }

    span.price {
      float: right;
      color: grey;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
      .row {
        flex-direction: column-reverse;
      }

      .col-25 {
        margin-bottom: 20px;
      }
    }





    /*
if you want me watch doing it on video, 
you can watch it my youtube video for this project.

Link for the video https://youtu.be/6RcpEhI7BAw

Link for the introduction for the series
https://youtu.be/2TNLCKR-kXk
*/

    /*resetting element*/
    * {
      margin: 0;
      padding: 0;
    }

    /*hiding label and checkbox*/
    .show-menu {
      display: none;
    }

    /*styling our wrapper*/
    .wrapper {
      max-width: 960px;
      margin: 0 auto;
      color: #ecf0f1;
      font-family: helvetica;
    }


    /*styling navigation*/
    .navigation {
      display: flex;
      list-style-type: none;
      max-width: 960px;
      margin: 0 auto;
      color: #ecf0f1;
      font-family: helvetica;
    }

    /*styling list items->li in navigation*/
    .navigation li {
      background: #1a1a1a;
      flex: 1;
      text-align: center;
      transition: all .2s ease;
    }

    /*giving border left to all list items, but not to our first list item*/

    .navigation li {
      margin: 0 20px;
    }

    /*styling hover*/
    .navigation li:hover {
      background: #005f5f;

    }

    /*styling our anchor tag*/
    .navigation li a {
      display: block;
      padding: 20px 0;
      color: inherit;

      text-decoration: none;
    }

    /*giving style for mobile*/

    @media screen and (max-width:600px) {

      /*styling our show menu button*/
      .show-menu {
        background: #342a2a;
        display: flex;
        cursor: pointer;
        padding: 20px 0;
        justify-content: center;
      }

      .navigation {
        display: block;
        margin: 0;
      }



      /*removing border left from the pseudo class*/
      .navigation li:not(:first-child) {
        border: 0;
      }

      /*giving margin to list item, excluding last list item*/
      .navigation li {
        margin: 2px 0;
      }
    }







    .nav ul {
      list-style: none;
      text-align: center;
      padding: 0;
      margin: 0;
      border-top: 1px solid;
      border-bottom: 1px solid;
    }

    .nav li {
      font-family: 'Oswald', sans-serif;
      line-height: 40px;
      height: 40px;
      border-bottom: 1px solid #888;
    }

    .nav li a {
      text-decoration: none;
      display: block;
      color: black;
      transition: .3s background-color;
    }

    .nav a:hover {
      color: #005f5f;
      border-bottom: 2px solid #005f5f;
    }

    .nav a.active {
      background-color: #fff;
      cursor: default;
    }

    @media screen and (min-width: 600px) {
      .nav {
        border: none;

      }

      .nav li {
        width: 120px;
        border-bottom: none;
        height: 50px;
        line-height: 50px;
      }

      /* Option 1 - Display Inline */
      .nav li {
        display: inline-block;
        margin-right: -4px;
      }

      /* Options 2 - Float
  .nav li {
    float: left;
  }
  .nav ul {
    overflow: auto;
    width: 600px;
    margin: 0 auto;
  }
  .nav {
    background-color: #444;
  }
  */
    }



    @import url('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');

    .info-msg,
    .success-msg,
    .warning-msg,
    .error-msg {
      margin: 10px 0;
      padding: 10px;
      border-radius: 3px 3px 3px 3px;
    }

    .info-msg {
      color: #059;
      background-color: #BEF;
    }

    .success-msg {
      color: #270;
      background-color: #DFF2BF;
    }

    .warning-msg {
      color: #9F6000;
      background-color: #FEEFB3;
    }

    .error-msg {
      color: #D8000C;
      background-color: #FFBABA;
    }

    /* Just for CodePen styling - don't include if you copy paste */
    html {
      font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
      font-weight: 300;
      margin: 25px;
    }
  </style>
</head>

<body>
  <header>
    <div class="topnav">
      <div class="img">
        <a href="home page.html"><img src="img/H_goods.jpg" alt="logo" width="100" height="100"> </a>
        <a href="login.html"></a>
        <div class="img2">
          <button class="user">
            <a href="#"> <img src="img/01.png" style="width: 50px;" "height=30px;"></i></a>
          </button>
        </div>
      </div><br>

      <br>
      <a href="#" class="s-button">Delivery</a>
      <a href="contact us page.html" class="s-button">Contact</a>
      <a href="aboutus.html" class="s-button">About us</a>

      <hr>
      <a href="#" class="s2-button">Vegetable</a>
      <a href="#" class="s2-button">Fruits</a>
      <a href="#" class="s2-button">Sea foods</a>
      <a href="#" class="s2-button">Meat & poultry</a>
      <a href="#" class="s2-button">Bakery</a>
      <a href="#" class="s2-button">Deli chiller</a>
      <a href="#" class="s2-button">Liquar</a>
      <a href="#" class="s2-button">Clearance</a>
    </div>
    <br>
    <hr><br>


    <?php echo $msg; ?>



  </header>

  <div class="row payment">
    <div class="col-75">
      <div class="container">
        <form action="checkout.php" method="post" id="payment" name="payment">

          <div class="row">
            <div class="col-50">
              <h3>Payment</h3>
              <label for="fname">Accepted Cards</label>
              <div class="icon-container">
                <i class="fa fa-cc-visa" style="color:navy;"></i>
                <i class="fa fa-cc-amex" style="color:blue;"></i>
                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                <i class="fa fa-cc-discover" style="color:orange;"></i>
              </div>
              <label for="cname">Name on Card</label>
              <input type="text" id="cname" name="cardname" placeholder="Sayuri Aberathne" required="required" pattern="[A-Za-z\s]{3,50}" title="Letters only" />
              <label for="ccnum">Credit card number</label>
              <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required="required" pattern="[0-9]{16}" title="Must be 16 digits" />
              <label for="expmonth">Exp Month</label>
              <input type="text" id="expmonth" name="expmonth" placeholder="12" required="required" pattern="[0-9]{2}" title="Must be 2 digits" />
              <div class="row">
                <div class="col-50" style="padding:0;">
                  <label for="expyear">Exp Year</label>
                  <input type="text" id="expyear" name="expyear" placeholder="2022" required="required" pattern="[0-9]{4}" title="Must be 4 digits" />
                </div>
                <div class="col-50">
                  <label for="cvv">CVV</label>
                  <input type="text" id="cvv" name="cvv" placeholder="352" required="required" pattern="[0-9]{3}" title="Must be 3 digits" />
                </div>
              </div>
            </div>
            <input type="hidden" name="price" value="30">
            <input type="hidden" name="o_type" value="marketorder">
            <input type="hidden" name="date" id="today">
            <input type="hidden" name="o_code" id="o_code">
          </div>
          <label>
            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
          </label>

          <button type="submit" class="btn" name="submit" value="submit">Continue to checkout</button>

        </form>
      </div>
    </div>
    <div class="col-25">
      <div class="container">
        <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
        <p><a href="#">Product 1</a> <span class="price">Rs15</span></p>
        <p><a href="#">Product 2</a> <span class="price">Rs5</span></p>
        <p><a href="#">Product 3</a> <span class="price">Rs8</span></p>
        <p><a href="#">Product 4</a> <span class="price">Rs2</span></p>
        <hr>
        <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
      </div>
    </div>
  </div>
  <footer>
    <ul class="social_icon" display: inline;>
      <li><a href="#">
          <ion-icon name="logo-facebook"></ion-icon>
        </a></li>
      <li><a href="#">
          <ion-icon name="logo-twitter"></ion-icon>
        </a></li>
      <li><a href="#">
          <ion-icon name="logo-instagram"></ion-icon>
        </a></li>
      <li><a href="#">
          <ion-icon name="logo-linkedin"></ion-icon>
        </a></li>
    </ul>
    <p style="font-style:italic;"> By sinning us you agree to terms of conditions an privacy policy</p>

  </footer>
  </div>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
<script>
  const d = new Date();
  let dFormatted = `${d.getYear()}-${d.getMonth()}-${d.getDate()}`;
  let rand = Math.floor(Math.random() * (1000000 - 100) + 100);
  document.querySelector("#today").value = dFormatted;
  document.querySelector("#o_code").value = rand;
  console.log(dFormatted, rand)
</script>

</html>
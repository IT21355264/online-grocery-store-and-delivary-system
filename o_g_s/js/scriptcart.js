let cartIcon = document.queryselctor('#cart-icon');
let cart= document.querySelctor(".cart");
let closeCart = document.querySelctor("#close-cart");

let cartIcon = document.querySelctor("#cart-iocon");

module cartIcon
let cartIcon:Element
cartIcon.onclick => {
	cart.classList.add("active");
};
closeCart.onclick => {
	cart.classList.add("active");
};

if(document.readystate=='loarding'){
	document.addEventListener('DOMContentLoaded',ready)
	
}
else{
	
	ready();
}

function ready()
{
	var removeCartButtons= document.getElementByClassName('product-remove')
	console.log(removeCartbuttons)
	for(var i=0; i<removeCartButtons.length;i++){
		var button =removeCartButtons[i]
		button.addEventListener('click' removeCartItem)
	}
	
}
var quantityInputs = document.getElementByClassName('cart-quantity')
 for(var i=0; i<removeCartButtons.length;i++){
	 
	 var input = quantityInputs[i];
	 input.addEventListener("change",quantityCharged);
 }
 var addCart = document.getElementsByClassName('add-cart')
 for(var i=0; i<addCart.length;i++){
	 var button = addCart[i]
	 button.addEventListener('click',addCartClicked);
	 
 }
 }
 var addCart = document.getElementsByClassNmae('add-cart')
 for(var i=0; i<addCart.length;i++){
	 var button =cart[i]
	 button.addEventListner('click',addCartClicked)
 }
 document.getElementByClassNmae('btn-buy')[0]
 .addEventListner('click',buybuttonClicked);
 
 }
 updatetotal();
 function buyButtonClicked(){
	 alert('Your order is placed')
	var cartContent = document.getElementsByClassName('cart-content')[0]
	while(cartContent.hasChildNodes()){
		cartContent.removeChild(cartContent.firstChild);
	}
 }
funtion removeCartItem(event){
	
	var buttonClicked = event.target;
	buttonClicked.parentElement.remove();
	updatetotal();
	
funtion quantityChanged(event){
	
	var input = event.target
	if(isNaN(input.value))|| input.value <=0{
	 input.value =1;
	
	}
	updatetotal();
		
}
	
}
funtion addCartCliked(event){
	var button= event.target
	var shopproduct = button.parentElement
	var title = shopProduct.getElementByClassName('product-title')[0].innerText;
	var price = shopProduct.getElementByClassName('price')[0].innerText;
	var productImg = shopProduct.getElementByClassName('price-img')[0].src;
	addProductToCart(title,price,productImg);
	updatetotal();
}

function addProductToCart(title,price,productImg){
	var cartShopBox = document.createElement('div');
	var cartItems =document.getelementByClassName('cart-content);
	var cartItemsnames = cartItems.getElementByClassName('cart-product-title')
	for(var i=0; i<cartItemsNames.length;i++){
		
		alert("you have alredy add this item to cart");
	return;
	}
	
}
var cartboxeContent =
          <img src="${productImg}" alt="" class="cart-img">
		 <div class="details-box">
		 <div class="cart-product-title">${title}</div>
		 <div class="cart-price">${[price}</div>
		 <input type="number" value="1" class="cart-quantity">
		 </div>
		 <i class='bx bxs-trash-alt cart-remove'></i>
	cartShopBox.innerHTML = cartBoxContent
    cartItems.append(cartShopBox)	
	cartShopBox.getElementByClassName('cart-remove')[0].addEventListener('click',removeCartItem)
    cartShopBox.getElementByClassName('cart-quantity')[0].addEventListener('change',quantitychange)

	
funtion updatetotal(){
	var cartContent = document.getElementByClassName('container')[0];
	var cartboxes = cartContent.getElementsByClassName('cart-box');
	var total =0;
	for(var i=0; i<cartBoxes.length;i++){
		var cartBox = cartBoxes[i]
		var priceEkement = cartBox.getElementByClassName('cart-price')[0];
	    var quantityElement = cartBox.getElementByClassName('cart-quantity')[0];
		var price= parseFloat(priceElement.innerText.replace("RS",""));
		var quantity = quantityElement.value;
		total = total + (price * quantity);
		
		total =math.round(total * 100)/100;
		
		
		document.getElementByClassName('total-price')[0].innerText = 'RS'+ total;
		
		
	}
	
		
}

<!DOCTYPE html>
<html>
    <head>
	    <meta charset="utf-8">
		<meta name="viewport" width="width=device-width">
		<meta name="description" content="Online cloth store for men, women and kids">
		<meta name="keywords" content="online cloth store, mens apparel, womens apparel, kids outfit">
		<meta name="author" content="Shawon">
		<title>Elegance | Since 1990</title>
		<link rel="stylesheet" href="./css/style.css">
		<script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
	</head>
	
	<body>
	    <header>
		    <div class="container">
			    <div id="brand">
				    <img src="./img/elegance.png" alt="elegance_logo">
				</div>
				<nav>
                <ul>
                    <li><a href="mens_cloth.php">Men</a></li>
                    <li><a href="womens_cloth.php">Women</a></li>
                    <li><a href="kids_cloth.php">Kids</a></li>
                </ul>
                </nav>
				
				<div id="search">
				    <!--<button type="submit" class="search_btn"><img src="./img/search_icon.jpg" alt="Search Button" height="31" width="31" onkeyup="showResult(this.value)"></button>
					<input type="text" class="search_1" placeholder="Search here.." onkeyup="showResult(this.value)">-->
					<form>
                        <input type="text" size="30" onkeyup="showResult(this.value)" placeholder="Search here..">
                        <div id="livesearch"></div>
                    </form>
				</div>
				<div id="signing">
				    <nav>
					<ul>
					<button type="submit" class="button_1"><a href="customer_login.php">Log in</a></button>
					<button type="submit" class="button_1"><a href="customer_registration.php">Register</a></button>
					</ul>
					</nav>
				</div>
			</div>
		</header>
		
		<section id="showcase_arrival">
		    <div class="container">
                <h1>Elegance Fall 2019 Collection</h1>
		        <h3>Seasonal Favorites Have Arrived!</h3>
                <p>Elegance’s Fall 2019 Collection featuring seasonal and holiday apparel and accessories is now available</p>
			</div>
        </section>
		
		<section id="showcase_various">
		    <div class="container">
			    <div id="mens_classic">
				    <h1>Mens Classic Collection</h1>
					<p>Dress impeccably for every situation</p>
					<h2><a href="mens_cloth.php">Shop Now</a></h2>
				</div>
				<div id="womens_exclusive">
				    <h1>Womens Exclusive Collection</h1>
					<p>Exclusive sneak peeks</p>
					<h2><a href="womens_cloth.php">Shop Now</a></h2>
				</div>
				<div id="kids_casual">
				    <h1>Kids Casual Collection</h1>
					<p>Keep your kids looking adorable</p>
					<h2><a href="kids_cloth.php">Shop Now</a></h2>
				</div>
			</div>
		</section>
		
		<section id="showcase_sports">
		    <div class="container">
			    <div id="discover">
				    <h1>Discover Our Outfit Collection</h1>
				</div>
			    <div id="sports">
				    <h1>Sports & Workout Outfit Collection</h1>
				    <p>With every detail made for serious sports enthusiasts, our sports and workout outfit collection is uniquely suited to every athelete.
					One of our most popular collection with wide range of styles, colors and sizes.</p>
					<button type="submit" class="shop_btn"><a href="mens_cloth.php">Shop Now</a></button>
			    </div>
				<div id="sportswear">
				<!--image goes here-->
				</div>
									
			</div>
		</section>
		
		<section id="popular_products">
		    <div class="container">
			    <div id="popular">
				    <h1>Popular Products</h1>
				</div>
				<div class="pop_products_img" id="pop_1">
				    <img src="./img/formal_shirt_2.png">
					
				</div>
				<div class="pop_products_img" id="pop_2">
				    <img src="./img/casual_shirt_1.png">
					
				</div>
				<div class="pop_products_img" id="pop_3">
				    <img src="./img/casual_shirt_2.png">
				</div>
				<div class="pop_products_img" id="pop_4">
				    <img src="./img/woman_tunic_2.png">
				</div>
				<div class="pop_products_img" id="pop_5">
				    <img src="./img/woman_tunic_1.png">
				</div>
				<div class="pop_products_info" id="pop_products_1">
				    
				    <h3>Men's Formal Shirt</h3>
                    <h3>BDT. 1800</h3>				
				</div>
				<div class="pop_products_info" id="pop_products_2">
				    <h3>Men's Casual Shirt</h3>
                    <h3>BDT. 1600</h3>	
				</div>
				<div class="pop_products_info" id="pop_products_3">
				    <h3>Men's Casual Shirt</h3>
                    <h3>BDT. 2200</h3>
				</div>
				<div class="pop_products_info" id="pop_products_4">
				    <h3>Women's Tunic</h3>
                   <h3>BDT. 1700</h3>
				</div>
				<div class="pop_products_info" id="pop_products_5">
				    <h3>Women's Tunic</h3>
                   <h3>BDT. 2000</h3>
				</div>
			</div>
		</section>
		
		<section id="bottom">
		    <div class="container">
			    <div class="bottom_content" id="about_elegance">
				    <h4>About Elegance</h4>
					<p>Careers</p>
					<p>Corporate Responsibility</p>
					<p>Press</p>
					<p>Corporate Sales</p>
				</div>
				<div class="bottom_content" id="customer_service">
				    <h4>Customer Service</h4>
					<p>Gift Cards</p>
					<p>Shipping & Returns</p>
					<p>Order Status</p>
					<p>Contact Us</p>
				</div>
				<div class="bottom_content" id="connect">
				    <h4>Connect With Us</h4>
					<p>Facebook</p>
					<p>Twitter</p>
					<p>Instagram</p>
					<p>Google+</p>
				</div>
			</div>
		</section>
		
		<footer>
            <p>&copy Copyright 2019 Elegance | Terms & Condition | Privacy Policy | <a href="admin_login.php">Admin</a></p>
        </footer>

	</body>
</html>
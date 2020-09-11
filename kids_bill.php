<?php
include 'includes/config.php';
include 'includes/Database.php';
$db = new Database();


?>

<!DOCTYPE html>
<html>
    <header>
	    <title>Bill Page</title>
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
	</header>
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
	<form action="kids_cloth_purchase.php" method="post">
	    <h2 align="center">Thanks for Buying!</h2>
		<label>How Would You Like To Pay?<label><br>
		<input type="radio" name="pay" value="" >bKash
		<input type="radio" name="pay" value="" >Credit Card
		<input type="radio" name="pay" value="" >Dedit Card
		<input type="radio" name="pay" value="" >Cash On Delivery<br>
		<label>Your delivery address: </label><br>
		<textarea row="2" cols="30"></textarea><br>
		<label>Contact No.: </label>
		<input type="text" name="" value=""></input><br><br><br>
		<button type="submit" onclick="kFunc()">Confirm</button><br><br><br>
		
		<script>
		    function kFunc(){
				alert("Purchase is Successful");
			}
		</script>
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
	</body>

</html>
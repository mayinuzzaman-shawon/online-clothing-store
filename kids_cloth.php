<!DOCTYPE html>
<?php
include 'includes/config.php';
include 'includes/Database.php';
$db = new Database();
?>
<html>
    <head>
	    <title>Uploading image with PHP</title>
		<style>
		    .body{
				font-family: verdana;
			}
		    .product_entry{
				width: 100%;
				height: 100%;
				margin: 0 auto;
				backkground: #a8dcdd;
			}
			.headeroption, .footeroption{
				background: #444;
				color: #fff;
			}
			.headeroption h2, .footeroption h2{
				margin:0;
			}
			.mainoption{
				min-height: 420px;
				padding: 20px;
			}
			.myform{
				width: auto%;
				border: 1px solid #193955;
				margin: 0 auto;
				padding: 10px 20px 20px;
				
			}
			input[type="submit"], input[type="file"] {cursor: pointer}
		</style>
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
	<head>
	
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
	    <div class="product_entry">
		    
			<section class="mainoption">
			    <div class="myform">
				    


					   
					
  
  
            <table >
                <tr>
				    <th width=100px>NO.</th>
					<th width=300px>Detail</th>
					<th width=100px>Prices</th>
					<th width= 300px>Image</th>
					<th width=100px>Purchase</th>
					
				</tr>
				
				
				
	<!--showing image after uploading-->
	<?php
	
   $query = "select * from kids_product_inventory";
   $getImage = $db->select($query);
   if ($getImage) {
    $i=0;
    while ($result = $getImage->fetch_assoc()) {
    $i++;
    ?>
   <tr>
    <td align="center"><?php echo $i; ?></td>
	 <td align="center"><?php echo "<p>".$result['kids_product_details']."</p>"; ?></td>
	 <td align="center"><?php echo "<p>".$result['kids_product_prices']."</p>"; ?></td>
    <td align="center"><img src="<?php echo $result['kids_product_image']; ?>" height="400px" 
      width="300px"/></td>
    <td align="center"><a href="?del=<?php echo $result['kids_product_id']; ?>">Buy</a></td>
   </tr>
  <?php } } ?>
            </table>			
    
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
		</div>
	
	</body>


</html>
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
				background: #b7aaaa;
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
    
    xmlhttp=new XMLHttpRequest();
  } else {  
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
					<th width=100px>Amount</th>
					
					
				</tr>

				
	<!--showing image after uploading-->
	
	<?php
	
   $query = "select * from product_inventory";
   $getImage = $db->select($query);
   if ($getImage) {
    $i=0;
    while ($result = $getImage->fetch_assoc()) {
    $i++;
	// $fp= $_POST['product_prices'];
	// if(!empty($_POST['men_buy']))
		// {
			// $fq=$_POST['men_buy'];
			// $ft=$fq*$fp;
		// }
		// if($fq<2){
			// $ft=$fq*$fp;
			
		// }
		// else{
			// $ft=$fq*$fp;
			// $ft=$ft-($ft*.2);
		// }
		
    ?>
   <tr>
   <form action = "" method = "POST">
    <td align="center" ><?php echo $i; ?></td>
	 <td align="center"><?php echo "<p>".$result['product_details']."</p>"; ?></td>
	 <td align="center"><?php echo "<p>".$result['product_prices']."</p>"; ?></td>
    <td align="center"><img src="<?php echo $result['product_image']; ?>" height="400px" 
      width="300px"/></td>
    ,<!--<td><a href="?del=<?php echo $result['product_id']; ?>">Buy</a></td>-->
	<td align="center"><a href="infoo.php" target="_blank"><button type= "submit" name="buy_btn" value="">Buy</a></td>
	<td align="center"><input type="number" id="amount" onblur="myFunction()"></td>
	<!--<td align="center"><h1 id="total_price">0</h1></td>-->
   </tr>
   </form>
  <?php } } ?>
            </table>			
    
		</div>
				
				
			</section>
			
			<section class="info">
			    <h2><u>Your Information: </u></h2><br>
		
		<label>First Name: <?php echo $result['product_details']; ?></label><br>
		<label>Last Name: <?php echo $result['product_prices']; ?></label><br>
		<!--<label>Email: <?php echo $email; ?></label><br>
		<label>Password: <?php echo $pass ?></label><br>
		<label>Confirmed Password: <?php echo $con_pass ?></label><br>
		<label>Passport status: <?php echo $passport ?></label>
		<label>Gender: <?php echo $gender; ?></label>-->
		
			</section>
			
			<section class="footeroption" align="right">
			    <button type="submit" name="purchase_btn" value="" ><a href="mens_bill.php" target="_blank">Confirm Purchase</a></button>
				
			</section>
			
			
		</div>
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
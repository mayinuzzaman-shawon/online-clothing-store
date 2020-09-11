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
				background: #193955;
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
		    <section class="headeroption">
			    <h2>Enter Your Product Here:</h2>
			</section>
			<section class="mainoption">
			    <div class="myform">
				    

<?php
   $kids_product_details="";
   $kids_product_prices="";
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $permited  = array('jpg', 'jpeg', 'png', 'gif');
       $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "uploads/".$unique_image;
	//$details = mysqli_real_escape_string($db, $_POST['details']);
	$kids_product_details= $_POST['kids_product_details'];
	$kids_product_prices = $_POST['kids_product_prices'];

    move_uploaded_file($file_temp, $uploaded_image);
    $query = "INSERT INTO kids_product_inventory(kids_product_image, kids_product_details, kids_product_prices) VALUES('$uploaded_image', '$kids_product_details', '$kids_product_prices')";
    $inserted_rows = $db->insert($query);
    if ($inserted_rows) {
     echo "<span class='success'>Image Inserted Successfully.
     </span>";
    }else {
     echo "<span class='error'>Image Not Inserted !</span>";
    }
   }
  ?>

					    <form action="" method="post" enctype="multipart/form-data">
						<table>
						       <tr> 
							    <td>Select image</td>
								<td><input type="file" name="image"/></td>
							</tr>
							<tr>
							    <td><textarea id="detail" cols="40" rows="2" name="kids_product_details" placeholder="Write something about the product..."></textarea></td>
								
																		    
								<td><textarea id="price" cols="20" rows="2" name="kids_product_prices" placeholder="Product Price..."></textarea></td>
								
							</tr>
							<tr>
							<td><input type="submit" name="submit" value="Upload"/></td>
							<td></td>
							</tr>
						</table>
						</form>
					
  
  
            <table >
                <tr>
				    <th width=100px>NO.</th>
					<th width=300px>Detail</th>
					<th width=100px>Prices</th>
					<th width= 300px>Image</th>
					<th width=100px>Action</th>
					
				</tr>
				<!--for deleting-->
				<?php
  if (isset($_GET['del'])) {
   $kids_product_id = $_GET['del'];
  
   $getquery = "select * from kids_product_inventory where kids_product_id='$kids_product_id'";
   $getImg = $db->select($getquery);
   if ($getImg) {
    while ($imgdata = $getImg->fetch_assoc()) {
    $delimg = $imgdata['kids_product_image'];
    unlink($delimg);
    }
   }
   
   $query = "delete from kids_product_inventory where kids_product_id='$kids_product_id'";
   $delImage = $db->delete($query);
   if ($delImage) {
     echo "<span class='success'>Image Deleted Successfully.
     </span>";
    }else {
     echo "<span class='error'>Image Not Deleted !</span>";
    }
   }
  ?>
				
				
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
    <td align="center"><a href="?del=<?php echo $result['kids_product_id']; ?>">Delete</a></td>
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
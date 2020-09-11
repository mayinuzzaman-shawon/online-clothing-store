<?php
include "includes/db_connect.inc.php";

   $admin_name= $_POST['admin_name'];
   $admin_email= $_POST['admin_email'];
   $admin_pass= $_POST['admin_pass'];
   
   
   

 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
  </head>
  <body>
    <h1>Welcome <?php echo $admin_name; ?></h1><br>
    <h2>Your Profile Information: </h2><br>
    <label>Name: <?php echo $admin_name; ?></label><br>
	<label>Email: <?php echo $admin_email; ?></label><br>
	<label>Password: <?php echo $admin_pass; ?></label><br>
	<h2><button type="submit" name="update"><a href = "admin_info_update.php">Click to Update Your Information</a></button></h2>
    <h2><button type="submit" name="logout"><a href = "admin_login.php">Log Out</a></button></h2>
	<h2><button type="submit" name="inventory"><a href = "mens_product_inventory.php">Go to Mens Product Inventory</a></button></h2>
	<h2><button type="submit" name="inventory"><a href = "womens_product_inventory.php">Go to Womens Product Inventory</a></button></h2>
	<h2><button type="submit" name="inventory"><a href = "kids_product_inventory.php">Go to Kids Product Inventory</a></button></h2>
	
	
  </body>
</html>

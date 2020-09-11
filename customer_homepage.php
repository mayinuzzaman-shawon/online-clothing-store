<?php
include "includes/db_connect.inc.php";

   $customer_name= $_POST['customer_name'];
   $customer_email= $_POST['customer_email'];
   $customer_pass= $_POST['customer_pass'];
     

 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
  </head>
  <body>
    <h1>Welcome <?php echo $customer_name; ?></h1><br>
    <h2>Your Profile Information: </h2><br>
    <label>Name: <?php echo $customer_name; ?></label><br>
	<label>Email: <?php echo $customer_email; ?></label><br>
	<label>Password: <?php echo $customer_pass; ?></label><br>
	<h2><button type="submit" name="update"><a href = "customer_info_update.php">Click to Update Your Information</a></button></h2>
    <h2><button type="submit" name="logout"><a href = "customer_login.php">Log Out</a></button></h2>
	
	
	
  </body>
</html>

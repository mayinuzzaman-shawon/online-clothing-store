<?php
include "includes/db_connect.inc.php";
   
   if(isset($_POST['update']))
{
	$hostname = "localhost";
   $username = "root";
   $password = "";
   $databaseName = "elegance_ecommerce";
   
   $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    
   $customer_name= $_POST['customer_name'];
   $customer_email= $_POST['customer_email'];
   $customer_pass= $_POST['customer_pass'];
   
   //$admin_id = $admin_name = $admin_email = $admin_pass = $err = $adEmailInDB = $message= "" ;
   
   //$admin_id = $admin_name = $admin_email = "";
   
    $CusUpdateSQL = "UPDATE 'customer_info' SET $_POST['customer_name']=$customer_name, $_POST['customer_email']=$customer_email,$_POST['customer_pass']= $customer_pass WHERE 'customer_id' = $customer_id";
   
   $CusUpdateRes = mysqli_query($connect, $CusUpdateSQL);
   
   if($CusUpdateRes)
   {
       echo 'Data Updated';
   }else{
       echo 'Data Not Updated';
   }
   mysqli_close($connect);
}
  

?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
  </head>
  <body>
    
	<form action="admin_homepage.php" method="post">
      <fieldset>
	<h2>Update Your Information Here: </h2>
	<label for="customer_name">Name: </label>
        <input type="text" name="customer_name" value="" required><br>
		<label for="customer_email">Email: </label>
        <input type="text" name="customer_email" value="" required><br>
        <label for="customer_pass">Password: </label>
        <input type="password" name="customer_pass" value="" required><br>
        <button type="submit" name="update">Update</button>
	</fieldset>
    </form>
  </body>
</html>
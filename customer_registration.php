<?php

include "includes/db_connect.inc.php";

  $customer_id = $customer_name = $customer_address = $customer_mobile = $customer_email = $customer_pass = $err = $adEmailInDB = "" ;
	
	
	/* mysqli_real_escape_string() helps prevent sql injection */
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!empty($_POST['customer_name'])){
      $customer_name = mysqli_real_escape_string($db, $_POST['customer_name']);
    }
    if(!empty($_POST['customer_address'])){
      $customer_address = mysqli_real_escape_string($db, $_POST['customer_address']);
    }
    if(!empty($_POST['customer_mobile'])){
      $customer_mobile = mysqli_real_escape_string($db, $_POST['customer_mobile']);
     // $adPassToDB = password_hash($admin_pass, PASSWORD_DEFAULT);
    }
	if(!empty($_POST['customer_email'])){
      $customer_email = mysqli_real_escape_string($db, $_POST['customer_email']);
    }
    if(!empty($_POST['customer_pass'])){
      $customer_pass = mysqli_real_escape_string($db, $_POST['customer_pass']);
     // $adPassToDB = password_hash($admin_pass, PASSWORD_DEFAULT);
    }
    

    $sqlUserCheck = "SELECT customer_name FROM customer_info WHERE customer_id = '$customer_id'";
    $result = mysqli_query($db, $sqlUserCheck);

    while($row = mysqli_fetch_assoc($result)){
      $cusNameInDB = $row['customer_name'];
    }

    if($cusEmailInDB == $customer_name){
      $err = "Email Address already exists!";
    }
    else{
      $sql = "INSERT INTO customer_info (customer_name, customer_address, customer_mobile, customer_email, customer_pass)
              VALUES ('$customer_name','$customer_address','$customer_mobile', '$customer_email', '$customer_pass');";

      mysqli_query($db, $sql);
    }
  }

?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Customer Registration: </title>
  </head>
  <body>
    <form action="customer_login.php" method="post">
      <fieldset>
        <legend>Customer Registration: </legend>
        <label for="customer_name"> Full Name: </label>
        <input type="text" name="customer_name" value="" required><br>
		<label for="customer_address"> Address: </label>
        <input type="email" name="customer_address" value="" required><br>
		<label for="customer_mobile"> Mobile: </label>
        <input type="text" name="customer_mobile" value="" required><br>
		<label for="customer_email"> Email: </label>
        <input type="email" name="customer_email" value="" required><br>
        <label for="customer_pass"> Password: </label>
        <input type="password" name="customer_pass" value="" required><br>
       
        <button type="submit" name="button" onclick="myFunction()"><a href="customer_login.php">Register</a></button><br>
		<script>
		    function myFunction(){
				window.alert("Registration Successful");
				
			}
		</script>
		
        <span style="color:red;"><?php echo $err; ?></span><br>
        <span><b>Or Log In <a href="customer_login.php">here</a></b></span>
      </fieldset>
    </form>
  </body>
</html>

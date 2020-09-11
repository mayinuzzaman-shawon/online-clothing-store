<?php

include "includes/db_connect.inc.php";
session_start();

$customer_id = $customer_name = $customer_email = $customer_pass = $message= "";

/* mysqli_real_escape_string() helps prevent sql injection */
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	if(!empty($_POST['customer_name'])){
		$customer_name = mysqli_real_escape_string($db, $_POST['customer_name']);
	}
	if(!empty($_POST['customer_email'])){
		$customer_email = mysqli_real_escape_string($db, $_POST['customer_email']);
	}
	if(!empty($_POST['customer_pass'])){
		$customer_pass = mysqli_real_escape_string($db, $_POST['customer_pass']);
	}

	$sqlUserCheck = "SELECT customer_name, customer_email, customer_pass FROM admin_info WHERE customer_id = '$customer_id'";
	$result = mysqli_query($db, $sqlUserCheck);
	$rowCount = mysqli_num_rows($result);

	if($rowCount < 1){
		$message = "This admin does not exist!";
	}
	else{
		while($row = mysqli_fetch_assoc($result)){
			$cusPassInDB = $row['customer_pass'];

			if(password_verify($customer_pass, $cusPassInDB)){
				//$login = "admin_homepage.php";
				$_SESSION['customer_name'] = $customer_name;
				header("Location:customer_homepage.php");
			}
			else{
				$message = "Wrong Password!";
			}
		}
	}
}

?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Customer Login</title>
  </head>
  <body>
    <form action="customer_homepage.php" method="post">
      <fieldset>
        <legend>Login</legend>
        <label for="customer_name">Name: </label>
        <input type="text" name="customer_name" value="" required><br>
		<label for="customer_email">Email: </label>
        <input type="text" name="customer_email" value="" required><br>
        <label for="customer_pass">Password: </label>
        <input type="password" name="customer_pass" value="" required><br>
        <button type="submit" name="login">Login</button>
				<span style="color:red"><?php echo $message; ?></span>
				<span><b>Or Register <a href="customer_registration.php">here</a></b></span>
      </fieldset>
    </form>
  </body>
</html>

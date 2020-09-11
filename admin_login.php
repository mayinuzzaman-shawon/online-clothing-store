<?php

include "includes/db_connect.inc.php";
session_start();

$admin_id = $admin_name = $admin_email = $admin_pass = $message= "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	if(!empty($_POST['admin_name'])){
		$admin_name = mysqli_real_escape_string($db, $_POST['admin_name']);
	}
	if(!empty($_POST['admin_email'])){
		$admin_email = mysqli_real_escape_string($db, $_POST['admin_email']);
	}
	if(!empty($_POST['admin_pass'])){
		$admin_pass = mysqli_real_escape_string($db, $_POST['admin_pass']);
	}

	$sqlUserCheck = "SELECT admin_name, admin_email, admin_pass FROM admin_info WHERE admin_id = '$admin_id'";
	$result = mysqli_query($db, $sqlUserCheck);
	$rowCount = mysqli_num_rows($result);

	if($rowCount < 1){
		$message = "This admin does not exist!";
	}
	else{
		while($row = mysqli_fetch_assoc($result)){
			$adPassInDB = $row['admin_pass'];

			if(password_verify($admin_pass, $adPassInDB)){
				
				$_SESSION['admin_name'] = $admin_name;
				header("Location: admin_homepage.php");
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
    <title>Admin Login</title>
  </head>
  <body>
    <form action="admin_homepage.php" method="post">
      <fieldset>
        <legend>Login</legend>
        <label for="admin_name">Name: </label>
        <input type="text" name="admin_name" value="" required><br>
		<label for="admin_email">Email: </label>
        <input type="text" name="admin_email" value="" required><br>
        <label for="admin_pass">Password: </label>
        <input type="password" name="admin_pass" value="" required><br>
        <button type="submit" name="login">Login</button>
				<span style="color:red"><?php echo $message; ?></span>
				<span><b>Or Register <a href="admin_registration.php">here</a></b></span>
      </fieldset>
    </form>
  </body>
</html>

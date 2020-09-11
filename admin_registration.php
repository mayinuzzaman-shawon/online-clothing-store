<?php

include "includes/db_connect.inc.php";

 $admin_id = $admin_name = $admin_email = $admin_pass = $err = $adEmailInDB = "" ;
	
	
	/* mysqli_real_escape_string() helps prevent sql injection */
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!empty($_POST['admin_name'])){
      $admin_name = mysqli_real_escape_string($db, $_POST['admin_name']);
    }
    if(!empty($_POST['admin_email'])){
      $admin_email = mysqli_real_escape_string($db, $_POST['admin_email']);
    }
    if(!empty($_POST['admin_pass'])){
      $admin_pass = mysqli_real_escape_string($db, $_POST['admin_pass']);
     // $adPassToDB = password_hash($admin_pass, PASSWORD_DEFAULT);
    }
    

    $sqlUserCheck = "SELECT admin_email FROM admin_info WHERE admin_email = '$admin_email'";
    $result = mysqli_query($db, $sqlUserCheck);

    while($row = mysqli_fetch_assoc($result)){
      $adEmailInDB = $row['admin_email'];
    }

    if($adEmailInDB == $admin_email){
      $err = "Email Address already exists!";
    }
    else{
      $sql = "INSERT INTO admin_info (admin_name, admin_email, admin_pass)
              VALUES ('$admin_name','$admin_email','$admin_pass');";

      mysqli_query($db, $sql);
    }
  }

?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Registration: </title>
  </head>
  <body>
    <form action="" method="post">
      <fieldset>
        <legend>Admin Registration: </legend>
        <label for="admin_name">Admin Full Name: </label>
        <input type="text" name="admin_name" value="" required><br>
		<label for="admin_email">Admin Email: </label>
        <input type="email" name="admin_email" value="" required><br>
        <label for="admin_pass">Admin Password: </label>
        <input type="password" name="admin_pass" value="" required><br>
        <button type="submit" name="button">Register</button><br>
		
		
        <span style="color:red;"><?php echo $err; ?></span><br>
        <span><b>Or Log In <a href="admin_login.php">here</a></b></span>
      </fieldset>
    </form>
  </body>
</html>

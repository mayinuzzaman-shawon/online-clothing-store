<?php
// include "includes/db_connect.inc.php";
   //$_POST['admin_name'] = $new_name;
   // if(isset($_POST['update']))
// {
	// $hostname = "localhost";
   // $username = "root";
   // $password = "";
   // $databaseName = "elegance_ecommerce";
   
   // $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    // session_start();
   // $admin_name= $_POST['admin_name'];
   // $admin_email= $_POST['admin_email'];
   // $admin_pass= $_POST['admin_pass'];
   
   //$admin_id = $admin_name = $admin_email = $admin_pass = $err = $adEmailInDB = $message= "" ;
   
  // $admin_id = $admin_name = $admin_email = "";
   
    // $AdUpdateSQL = "UPDATE 'admin_info' SET $_POST['admin_name']=$admin_name, $_POST['admin_email']=$admin_email,$_POST['admin_pass']= $admin_pass WHERE 'admin_id' = $admin_id";
   
   // $AdUpdateRes = mysqli_query($connect, $AdUpdateSQL);
   
   // if($AdUpdateRes)
   // {
       // echo 'Data Updated';
   // }else{
       // echo 'Data Not Updated';
   // }
   // mysqli_close($connect);
// }
  

?>

<?php

include "includes/db_connect.inc.php";

  $new_name = $new_email = $new_pass = $new_id =  $admin_name = $admin_email = $admin_pass = $err = $adEmailInDB = "" ;
	
	
	// /* mysqli_real_escape_string() helps prevent sql injection */
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!empty($_POST['admin_name'])){
      $new_name = mysqli_real_escape_string($db, $_POST['admin_name']);
    }
    if(!empty($_POST['admin_email'])){
      $new_email = mysqli_real_escape_string($db, $_POST['admin_email']);
    }
    if(!empty($_POST['admin_pass'])){
      $new_pass = mysqli_real_escape_string($db, $_POST['admin_pass']);
     //$adPassToDB = password_hash($admin_pass, PASSWORD_DEFAULT);
    }
    
    

     //mysqli_query($db, $sql);
    $sqlUserCheck = "SELECT admin_email FROM admin_info WHERE admin_email = '$admin_email'";
    $result = mysqli_query($db, $sqlUserCheck);

    while($row = mysqli_fetch_assoc($result)){
      $adEmailInDB = $row['admin_email'];
    }

    if($adEmailInDB == $admin_email){
      $err = "Email Address already exists!";
    }
    else{
      $sql = "UPDATE INTO admin_info SET admin_name = $new_name WHERE admin_id = '$admin_id'";

      mysqli_query($db, $sql);
    }
  
  }

?>
<!DOCTYPE html>
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

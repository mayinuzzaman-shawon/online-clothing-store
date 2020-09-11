<?php
include "includes/db_connect.inc.php"; 
   if (isset($_GET['admin_info'])) {
	  $user = $_GET['admin_info'];
	  $get_user = $mysqli->query("SELECT * FROM admin_info WHERE admin_name = '$admin_name'");
	  $user_data = $get_user->fetch_assoc();
    } else {
	   //header("Location: admin_homepage.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>  
	<meta charset="UTF-8">
		<title><?php echo $user_data['admin_name'] ?>'s Profile Settings</title>
    </head> 
	<body>        <a href="admin_homepage.php">Home</a> | Back to <a href="admin_homepage.php?user=<?php echo $user_data['admin_name'] ?>"><?php echo $user_data['admin_name'] ?></a>'s Profile        
		<h3>Update Profile Information</h3> 
		       <form method="post" action="update_profile_action.php?admin_info=<?php echo $user_data['admin_name'] ?>">            			<label>Name:</label><br> 
			         <input type="text" name="fullname" value="<?php echo $user_data['admin_name'] ?>" /><br> 
			         <label>Age:</label><br>
			         <input type="text" name="age" value="<?php echo $user_data['admin_email'] ?>" /><br> 
			         <label>Gender:</label><br> 
			         <input type="text" name="gender" value="<?php echo $user_data['admin_pass'] ?>" /><br>
			            
			         
			         <input type="submit" name="update_profile" value="Update Profile" />        
		</form>    
	</body>
</html>
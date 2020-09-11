<?php
session_start();
if (isset($_POST["submit"])) {
    include "includes/db_connect.inc.php";
    
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    $database = new dbConnect();
    
    $db = $database->openConnection();
    
    $sql = "select * from admin_info where email = '$email' and password= '$password'";
    $user = $db->query($sql);
    $result = $user->fetchAll(PDO::FETCH_ASSOC);
    
    $id = $result[0]['id'];
    $name = $result[0]['name'];
    $email = $result[0]['email'];
    $_SESSION['name'] = $name;
    $_SESSION['id'] = $id;
    
    $database->closeConnection();
    header('location: dashboard.php');
}
?>

<form action="" method="POST" onsubmit="return loginvalidation();">
    <div class="row">
        <label>Email</label> <span id="email_error"></span>
        <div>
            <input type="text" name="email" id="email"
                class="form-control" placeholder="Enter your Email ID">
        </div>
    </div>
    <div class="row">
        <label>Password</label><span id="password_error"></span>
        <div>
            <input type="Password" name="password" id="password"
                class="form-control" placeholder="Enter your password">

        </div>
    </div>
    <div class="row">
        <div>
            <button type="submit" name="submit" class="btn login">Login</button>
        </div>
    </div>
    <div class="row">
        <div>
            <a href="index.php"><button type="button" name="submit"
                    class="btn signup">Signup</button></a>
        </div>
    </div>
</form>
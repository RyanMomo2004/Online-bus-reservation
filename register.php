<?php
include 'config.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT ); 
    $role = 'user';   
        
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password, $role);

    if ($stmt->execute()){
        echo "Registration Successful!";
        header("Location: login.php");
    } else{
        $error = "Error: " . $stmt->error;
    }

    $stmt->close();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <form style="border:1px solid #ccc" method="post">
        <div class="container">
          <h1>Register</h1>
          <p>Please fill in this form to create an account.</p>
          <hr>

          <label for="email"><b>Username</b></label>
          <input type="text" placeholder="Enter Name" name="username" required>

          <label for="email"><b>Email</b></label>
          <input type="email" placeholder="Enter Email" name="email" required>
      
          <label for="password"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>
            
          <label>
            <input type="checkbox" checked="checked" name="role" style="margin-bottom:15px"> Confirm you are a user
          </label>
      
          <p>Are you having already an account? <a href="login.php" style="color:dodgerblue">Log In</a>.</p>
      
          <div class="clearfix">
            <button type="submit" class="signupbtn">Sign Up</button>
            <a href="index.php"><button type="button" class="cancelbtn">Cancel</button></a>
          </div>
        </div>
    </form>
</body>
</html>
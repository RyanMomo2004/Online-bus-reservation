<?php
include 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $username, $hashed_password, $role);

    if ($stmt->fetch() && password_verify($password, $hashed_password)){
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        if ($role == 'admin'){
            header("Location: admin.php");
        }else{
            header("Location: user.php");
        }
    } else{
        echo "Invalid email or password!";
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <form method="post">
        <div class="imgcontainer">
          <img src="image/avatar.webp" class="avatar">
        </div>
      
        <div class="container">
          <label for="email"><b>Email</b></label>
          <input type="email" placeholder="Enter Email" name="email" required>
      
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>
      
          <button type="submit">Login</button>
          <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
          </label>
        </div>
      
        <div class="container" style="background-color:#f1f1f1">
          <a href="index.php"><button type="button" class="cancelbtn">Cancel</button></a>
          <span class="psw">Does not Have an account? <a href="register.php">Sign In</a></span>
        </div>
      </form>
</body>
</html>
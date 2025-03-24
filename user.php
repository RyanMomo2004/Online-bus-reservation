<?php

session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus reservation</title>
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="topnav">
        <a class="active" href="user.php">Bus Reservtaion</a>
        <a href="user.php">Home</a>
        <div class="topnav-right">
          <a href="#">Hi <?php echo $_SESSION['username']; ?></i></a>
          <a href="logout.php"></i>Log Out</a>
        </div>
    </div>

    <div class="container">
       <div class="top">
        <h1>CHOOSE YOUR RESERVATIONS:</h1>
      </div>
      <div class="card">
        <img src="image/379.jpg" style="width:100%">
        <h1>Douala</h1>
        <p class="price"></p>
        <p>Reserve here a bus for Douala city.</p>
        <p><a href="reserve.php"><button>Click Here</button></a></p>
      </div>
      <div class="card">
        <img src="image/bus-1 (1).jpg" style="width:100%">
        <h1>Yaounde</h1>
        <p class="price"></p>
        <p>Reserve here a bus for Yaounde city.</p>
        <p><a href="reserve.php"><button>Click Here</button></a></p>
      </div>
      <div class="card">
        <img src="image/bus-1 (2).jpg" style="width:100%">
        <h1>Kribi</h1>
        <p class="price"></p>
        <p>Reserve here a bus for Kribi city.</p>
        <p><a href="reserve.php"><button>Click Here</button></a></p>
      </div>
    </div>
    <div class="footer">
      <div class="text">
        <h3>Copyright &copy;2025</h3>
      </div>
    </div>
</body>
</html>
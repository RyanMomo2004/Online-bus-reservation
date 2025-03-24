<?php
session_start();
include 'config.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user_id = $_SESSION['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $seat_number = $_POST['seat_number'];
    $reservation_date = $_POST['reservation_date'];
    $city = $_POST['city'];

    $stmt = $conn->prepare("INSERT INTO reservations (user_id, username, email, address, seat_number, reservation_date, city) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssiss", $user_id, $username, $email, $address, $seat_number, $reservation_date, $city);

    if ($stmt->execute()){
        echo "Registration Successfully done!";
        header("Location: notification.php");
    } else{
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve</title>
    <link rel="stylesheet" href="reserve.css">
</head>
<body>
    <form style="border:1px solid #ccc" method="post">
        <div class="container">
          <h1>Reserve</h1>
          <p>Please fill in this form to create a reservation.</p>
          <hr>

          <label for="email"><b>Username</b></label>
          <input type="text" placeholder="Enter Name" name="username" required>

          <label for="email"><b>Email</b></label>
          <input type="email" placeholder="Enter Email" name="email" required>
      
          <label for="address"><b>Address</b></label>
          <input type="text" placeholder="Enter Address" name="address" required>

          <label for="seat_number"><b>Number of Passenger</b></label>
          <input type="text" placeholder="Enter Number of Passenger" name="seat_number" required>

          <label for="reservation_date"><b>Reservation Date</b></label>
          <input type="date" name="reservation_date" required>

          <label for="city"><b>City</b></label>
          <input type="text" placeholder="Enter City" name="city" required>
      
          <div class="clearfix">
            <button type="submit" class="signupbtn">Reserve</button>
            <a href="user.php"><button type="button" class="cancelbtn">Cancel</button></a>
          </div>
        </div>
    </form>
</body>
</html>
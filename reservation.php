<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

require 'config.php';

function fetchAllReservations($conn){
    $stmt = $conn->query("SELECT id, username, email, address, seat_number, reservation_date, city, created_at FROM reservations");
    return $stmt->fetch_all(MYSQLI_ASSOC);
} 

$reservations = fetchAllReservations($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations</title>
    <Link rel="stylesheet" href="reservation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="topnav">
        <a class="active" href="admin.php">Administrator</a>
        <a href="reservation.php">Reservations</a>
        <div class="topnav-right">
          <a href="logout.php"></i>Log Out</a>
        </div>
    </div>

    <div class="container">
        <h1>Reservations List</h1>
        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Seat Number</th>
                        <th>Reservation Date</th>
                        <th>City</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservations as $reservation): ?>
                        <tr>
                            <td><?php echo $reservation['id']; ?></td>
                            <td><?php echo $reservation['username']; ?></td>
                            <td><?php echo $reservation['email']; ?></td>
                            <td><?php echo $reservation['address']; ?></td>
                            <td><?php echo $reservation['seat_number']; ?></td>
                            <td><?php echo $reservation['reservation_date']; ?></td>
                            <td><?php echo $reservation['city']; ?></td>
                            <td><?php echo $reservation['created_at']; ?></td>
                            <td>
                                <button class="btn-1"><a href="delete-reserve.php?id=<?php echo $reservation['id']; ?>" onclick="return confirm('Are you sure you want to delete this reservation?')">Delete</a></button>
                            </td>
                        </tr>
                    <?php endforeach;?>    
                </tbody>
            </table>
            <br>
            <a href="add-reserve.php"><button class="btn-2">Add Reserve</button></a>
        </div>
    </div>

    <div class="footer">
      <div class="text">
        <h3>Copyright &copy;2025</h3>
      </div>
    </div>
</body>
</html>    
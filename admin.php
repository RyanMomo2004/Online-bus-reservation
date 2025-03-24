<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

require 'config.php';

function fetchAllUsers($conn){
    $stmt = $conn->query("SELECT id, username, email, created_at FROM users");
    return $stmt->fetch_all(MYSQLI_ASSOC);
} 

function countUsers($conn){
    $sql = "SELECT COUNT(*) as user_count FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return $row['user_count'];
    } else{
        return 0;
    }

}

function countReservations($conn){
    $sql = "SELECT COUNT(*) as reservation_count FROM reservations";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return $row['reservation_count'];
    } else{
        return 0;
    }

}

$users = fetchAllUsers($conn);

$userCount = countUsers($conn);
$reservationCount = countReservations($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>
    <Link rel="stylesheet" href="admin.css">
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
    <div class="card">
        <h2><i class="fa fa-user"></i>Users Number</h2>
        <p><?php echo $userCount; ?></p>
    </div>
    <div class="card">
        <h2><i class="fa fa-ticket"></i>Reservations Number</h2>
        <p><?php echo $reservationCount; ?></p>
    </div>
    </div>

    <div class="container-2">
        <h1>Users List</h1>
        <div class="card-2">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['username']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['created_at']; ?></td>
                            <td>
                                <button class="btn-1"><a href="delete-user.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a></button>
                            </td>
                        </tr>
                    <?php endforeach;?>    
                </tbody>
            </table>
            <br>
            <a href="add-user.php"><button class="btn-2">Add Users</button></a>
        </div>
    </div>

    <div class="footer">
      <div class="text">
        <h3>Copyright &copy;2025</h3>
      </div>
    </div>
</body>
</html>
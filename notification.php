<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>
    <link rel="stylesheet" href="notification.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content">
    <div class="container">
      <h1>Reservtaion Sucessfully Done!</h1>
      <p>Do yo want to delete the reservation?</p>

      <div class="clearfix">
        <a href="user.php"><button type="button" class="cancelbtn">No</button></a>
        <a href="delete-reserve.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Are you sure you want to delete this reservation?')"><button class="deletebtn">Yes</button></a>
      </div>
    </div>
  </form>
</div>
</body>
</html>    
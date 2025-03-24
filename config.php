<?php
$host = 'localhost';
$db = 'project_database';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error){
    die("Connection_error" . $conn->connect_error);
}
?>
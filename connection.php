<!-- connect the database  -->
<?php
session_start();
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'facebook';
$conn = mysqli_connect($host, $user, $password, $db);
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

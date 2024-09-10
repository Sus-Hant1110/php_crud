<?php
require_once "connection.php";

// echo "<pre>";
// print_r($_SESSION['user']);

if (!isset($_SESSION['user'])) {
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Welcome: <?= $_SESSION['user']['name'] ?> </h1>
    <a href="">Logout</a>
</body>

</html>
<?php
require_once "connection.php";

$errors = [
    'username' => '',
    'password' => ''
];

if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if (empty($username)) {
        $errors['username'] = 'Username is required';
    }
    if (empty($password)) {
        $errors['password'] = 'Password is required';
    }

    if (!array_filter($errors)) {
        $sql = "SELECT * FROM users WHERE email='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['user'] = $user;
            header('Location:welcome.php');
        } else {
            echo 'Invalid username or password';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="login-page">
        <div class="title">
            <h1>Facebook Login Page</h1>
        </div>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username:
                    <span class="text-error"><?= $errors['username']; ?></span>
                </label>
                <input type="text" name="username"
                    class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password:
                    <span class="text-error"><?= $errors['password']; ?></span>
                </label>
                <input type="password" name="password"
                    class="form-control">
            </div>
            <div class="form-group">
                <button class="btn-success">Login</button>
                <a href="register.php">Register</a>
            </div>
        </form>
    </div>
</body>

</html>
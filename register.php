<?php
require_once "connection.php";

$errors = [
    'name' => '',
    'email' => '',
    'password' => '',
    'gender' => '',
];

$old = [
    'name' => '',
    'email' => '',
    'password' => '',
    'gender' => '',
];


if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $gender = $_POST['gender'];

    if (empty($name)) {
        $errors['name'] = 'Name is required';
    } else {
        $old['name'] = $name;
    }

    if (empty($email)) {
        $errors['email'] = 'Email is required';
    } else {
        $old['email'] = $email;
    }

    if (empty($password)) {
        $errors['password'] = 'Password is required';
    } else {
        $old['password'] = $password;
    }
    if (empty($gender)) {
        $errors['gender'] = 'Gender filed is required';
    } else {
        $old['gender'] = $gender;
    }

    if (!array_filter($errors)) {
        $sql = "INSERT INTO users(name,email,password,gender)VALUES('$name','$email','$password','$gender')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('Location:index.php');
        } else {
            echo 'Error in Registrtion';
        }
    } else {
        echo 'Please fill the form';
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
            <h1>Facebook Register</h1>
        </div>
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Name:<span class="text-error"><?= $errors['name']; ?></span> </label><br>
                <input type="text" name="name" value="<?= $old['name'] ?>" class="form-control"><br><br>
            </div>
            <div class="form-group">
                <label for="email">Email:
                    <span class="text-error"><?= $errors['email']; ?></span>
                </label><br>
                <input type="email" name="email" value="<?= $old['email'] ?>" class="form-control"><br><br>
            </div>
            <div class="form-group">
                <label for="password">Password:
                    <span class="text-error"><?= $errors['password']; ?></span>
                </label>
                <input type="password" name="password" value="<?= $old['password'] ?>" class="form-control"><br><br>
            </div>
            <div class="form-group">
                <label for="gender">Gender:
                    <span class="text-error"><?= $errors['gender']; ?></span>
                </label>
                <select name="gender" id="gender" class="form-control">
                    <option value="">Select Gender</option>
                    <option value="male" <?= $old['gender'] == 'male' ? 'selected' : '' ?>>Male</option>
                    <option value="female" <?= $old['gender'] == 'female' ? 'selected' : '' ?>>Female</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn-success">Register</button>
                <a href="index.php">Login</a>
            </div>
        </form>
    </div>
</body>

</html>
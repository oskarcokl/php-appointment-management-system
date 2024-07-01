<?php
$db = pg_connect("dbname=scheduling");

if (!$db) {
    die("DB Connection failed");
}


if (isset($_POST['register'])) {
    $user_info = $_POST;
    unset($user_info['register']);
    $user_info['password'] = password_hash($user_info['password'], PASSWORD_DEFAULT);
    $res = pg_insert($db, 'users', $user_info);

    if ($res) {
        echo "Successfully created new user\n";
        header('Location: login.php');
    } else {
        echo "User must have done an oopsie\n";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>

    <form action="register.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <label for="surname">Surname:</label>
        <input type="text" name="surname" id="surname">
        <label for="phone">Phone number:</label>
        <input type="tel" id="phone" name="phone">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email">
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <button name="register" type="submit">register</button>
    </form>


</body>

</html>
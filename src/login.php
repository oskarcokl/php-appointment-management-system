<?php
    if (isset($_POST) && isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];

        $db = pg_connect('dbname=scheduling');

        if (!$db) {
            die('Connection to DB failed: ' . pg_last_error());
        }

        $res = pg_query_params($db, "SELECT u.password, u.id, u.email FROM users u WHERE u.email=$1", [$email]);

        if (!$res) {
            die('Query failed: ' . pg_last_error());
        }

        $row = pg_fetch_assoc($res);

        if ($row) {
            $password = $_POST['password'];
            if (password_verify($password, $row['password'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                header('Location: dashboard.php');
            } else {
                echo 'Wrong password';
            }
        } else {
            echo 'User not found';
        }

        pg_free_result($res);
        pg_close($db);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="POST">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <button type="submit">login</button>
    </form>
</body>
</html>
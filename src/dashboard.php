<?php


echo array_key_exists('logOut', $_POST) . "\n";
if (isset($_POST) && array_key_exists('logOut', $_POST)) {
    unset($_SESSION['loggedin']);
    unset($_SESSION['id']);
    unset($_SESSION['email']);
    header('Location: login.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Your appointments dashboard</h1>
    <form action="dashboard.php" method="post">
        <button type="submit" name="logOut">log out</button>
    </form>
</body>
</html>
<?php

session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: login.php');
}

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
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth'
            });
            calendar.render();
        });
    </script>
    <title>Dashboard</title>
</head>

<body>
    <h1>Your appointments dashboard</h1>
    <div id='calendar'></div>
    <form action="dashboard.php" method="post">
        <button type="submit" name="logOut">log out</button>
    </form>
</body>

</html>
<?php
session_start();

// Sprawdzenie, czy użytkownik jest zalogowany
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Main page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<body>
    <header>Simple app for simple tasks.</header>
    <main>
        <p>Hi! Login or register account.</p>
        <a href="user/login.php">Login</a> | <a href="user/register.php">Register</a>
    </main>
    
    <footer>Michał Flisikowski</footer>
</body>
</html>

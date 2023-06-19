<?php
session_start();
require_once '..\database.php';

// Sprawdzenie, czy użytkownik jest już zalogowany
if (isset($_SESSION['user_id'])) {
    header('Location: ..\database.php');
    exit;
}

// Obsługa formularza rejestracji
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Walidacja danych 
    if (empty($username) || empty($password) || empty($email)) {
        $error = 'All fields are required.';
    } else {
        // Zapisanie danych do bazy danych
        $result = registerUser($username, $password, $email);
        if ($result) {
            $_SESSION['user_id'] = $result;
            header('Location: ..\dashboard.php');
            exit;
        } else {
            $error = 'Unexpected error.';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="..\style.css">
</head>
<body>
    <header>Welcome!</header>
    <main>
        <?php if (isset($error)) echo '<p class="error">' . $error . '</p>'; ?>
        <form method="POST" action="">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            <label for="email">E-mail:</label><br>
            <input type="email" id="email" name="email" required><br>
            <input type="submit" value="Register">
        </form>
    </main>
    <footer>Michał Flisikowski</footer>
</body>
</html>

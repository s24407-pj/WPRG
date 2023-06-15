<?php
session_start();
require_once 'database.php';

// Sprawdzenie, czy użytkownik jest zalogowany
if (!isset($_SESSION['user_id'])) {
   header('Location: index.php');
   exit;
}

// Pobranie danych użytkownika
$user = getUser($_SESSION['user_id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = $_POST['task'];
    
    // Walidacja danych
    if (empty($task)) {
         $error = 'Task description is required.';
    } else {
         // Dodanie zadania do bazy danych
         $result = addTask($_SESSION['user_id'], $task);
         if ($result) {
              header('Location: dashboard.php');
              exit;
         } else {
              $error = 'Error adding task.';
         }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>Hi, <?php echo $user['username']; ?>!</header>
    <main>
        <p>Your tasks:</p>
        <?php
        $tasks = getTasks($_SESSION['user_id']);
        if (count($tasks) > 0) {
            echo '<ol>';
            foreach ($tasks as $task) {
                echo '<li>' . $task['description'] . '</li>';
            }
            echo '</ol>';
        } else {
            echo '<p>No tasks.</p>';
        }
        ?>
        <form method="POST" action="">
            <label for="task">Task:</label>
            <input type="text" id="task" name="task" required>
            <input type="submit" value="Add">
        </form>
        <p><a href="logout.php" id="logout">Logout</a></p>
        
    </main>
    <footer>Michał Flisikowski</footer>
</body>
</html>

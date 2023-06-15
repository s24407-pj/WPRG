<?php
// Połączenie z bazą danych
$host = 'localhost';
$dbname = 'to_do_app';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Błąd połączenia z bazą danych: ' . $e->getMessage());
}

// Funkcje obsługujące bazę danych
function registerUser($username, $password, $email)
{
    global $pdo;
    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare('INSERT INTO users (username, password, email) VALUES (?, ?, ?)');
    $stmt->execute([$username, $hashedPassword, $email]);

    return $pdo->lastInsertId();
}

function loginUser($username, $password)
{
    global $pdo;

    $stmt = $pdo->prepare('SELECT id, password FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        return $user['id'];
    }

    return false;
}

function getUser($userId)
{
    global $pdo;

    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$userId]);
    return $stmt->fetch();
}

function getTasks($userId)
{
    global $pdo;

    $stmt = $pdo->prepare('SELECT description FROM tasks WHERE user_id = ?');
    $stmt->execute([$userId]);
    return $stmt->fetchAll();
}

function addTask($userId, $description)
{
    global $pdo;

    $stmt = $pdo->prepare('INSERT INTO tasks (user_id, description) VALUES (?, ?)');
    return $stmt->execute([$userId, $description]);
}
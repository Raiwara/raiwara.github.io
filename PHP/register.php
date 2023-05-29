<?php
require_once 'database.php';
$db = new Database();

$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm_password'];

if ($password !== $confirmPassword) {
    echo 'Пароль и подтверждение пароля не совпадают.';
    exit;
}

$query = "SELECT * FROM Users WHERE Email = :email";
$result = $db->executeStatement($query, [':email' => $email]);

if ($result->fetchArray()) {
    echo 'Пользователь с такой почтой уже существует.';
    exit;
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO Users (Email, Pass, Balance) VALUES (:email, :password, 10000)";
$db->executeStatement($query, [':email' => $email, ':password' => $hashedPassword]);

session_start();
$_SESSION['email'] = $email;

$db->close();
header("Location: ../html/store.php");
exit;
?>

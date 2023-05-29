<?php
require_once 'database.php';
$db = new Database();

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM Users WHERE Email = :email";
$result = $db->executeStatement($query, [':email' => $email]);
$user = $result->fetchArray();

if (!$user) {
    echo 'Пользователь с такой почтой не найден.';
    exit;
}

if (!password_verify($password, $user['Pass'])) {
    echo 'Неверный пароль.';
    exit;
}

session_start();
$_SESSION['email'] = $email;

$db->close();
header("Location: ../html/store.php");
exit;
?>

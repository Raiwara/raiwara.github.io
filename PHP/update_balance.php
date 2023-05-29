<?php
require_once 'database.php';
$db = new Database();

$newBalance = floatval($_POST['balance']);
$userEmail = $_POST['email'];

$query = "SELECT * FROM Users WHERE Email = :email";
$result = $db->executeStatement($query, [':email' => $userEmail]);
$user = $result->fetchArray();

if ($user) {
    $query = "UPDATE Users SET Balance = :balance WHERE Email = :email";
    $params = [':balance' => $newBalance, ':email' => $userEmail];
    $result = $db->executeStatement($query, $params);

    if ($result) {
        echo "Баланс пользователя успешно обновлен";
    } else {
        echo "Ошибка при обновлении баланса пользователя";
    }
} else {
    echo "Пользователь с указанной электронной почтой не найден";
}

$db->close();
?>

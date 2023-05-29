<?php
require_once 'database.php';
$db = new Database();

$query = "UPDATE Users SET Balance = Balance + 10000";
$result = $db->executeStatement($query);

if ($result) {
echo "Балансы пользователей успешно обновлены";
} else {
echo "Ошибка при обновлении балансов пользователей";
}

$db->close();
?>
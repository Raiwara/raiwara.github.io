<?php
require_once 'database.php';
$db = new Database();

// Запрос на выборку всех записей из таблицы items
$query = "SELECT * FROM items";
$result = $db->query($query);

// Формирование массива данных с предметами
$items = array();
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $items[] = $row;
}

// Закрытие соединения с базой данных
$db->close();

// Возвращаем данные в формате JSON
header('Content-Type: application/json');
echo json_encode($items);

?>


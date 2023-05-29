<?php
require_once 'database.php';
$db = new Database();

// Начало сессии
session_start();

// Проверка наличия значения почты в сессии
if (isset($_SESSION['email'])) {
    // Почта пользователя
    $email = $_SESSION['email'];

    // Подготовка запроса для получения данных пользователя
    $query = "SELECT Balance FROM Users WHERE Email = :email";
    $stmt = $db->prepareStatement($query);
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);

    // Выполнение запроса
    $result = $stmt->execute();

    // Проверка наличия результата
    if ($result !== false) {
        $data = $result->fetchArray(SQLITE3_ASSOC);
        $balance = $data['Balance']; // Значение баланса

        // Формирование массива с данными пользователя
        $response = array(
            'balance' => $balance,
            'email' => $email
        );

        // Возвращение данных в формате JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // Ошибка при выполнении запроса
        echo "Ошибка при выполнении запроса";
    }
} else {
    // Почта отсутствует в сессии
    echo "Адрес электронной почты не найден";
}

$db->close();
?>

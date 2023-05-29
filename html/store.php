<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Магазин для покупки вещей Dota 2 в реальной жизни! Баланс каждый пополняется на 10000 золотых! ">
    <title>Магазин предметов Dota 2</title>
    <link rel="icon" type="image/x-icon"href="../images/icon.ico" >
    <link rel="stylesheet" type="text/css" href="../CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="../CSS/header.css">
    <link rel="stylesheet" type="text/css" href="../CSS/footer.css">
    <link rel="stylesheet" type="text/css" href="../CSS/store.css">
    <link rel="stylesheet" type="text/css" href="../CSS/modal.css">

</head>

<body>
<?php include ('header.php'); ?>

<main>
    <h1 class="main-items">Основные предметы</h1>
    <div class="basic-items">
        <div id="attributes" class="sub-block">
            <!-- Содержимое подблока "Атрибуты" -->
        </div>
        <div id="equipment" class="sub-block">
            <!-- Содержимое подблока "Экипировка" -->
        </div>
        <div id="miscellaneous" class="sub-block">
            <!-- Содержимое подблока "Разное" -->
        </div>
        <div id="secret" class="sub-block">
            <!-- Содержимое подблока "Секретное" -->
        </div>
    </div>

    <h1 class="main-items">Улучшенные предметы</h1>
    <div class="upgraded-items">
        <div id="accessories" class="sub-block">
            <!-- Содержимое подблока "Аксессуары" -->
        </div>
        <div id="help" class="sub-block">
            <!-- Содержимое подблока "Помощь" -->
        </div>
        <div id="magic" class="sub-block">
            <!-- Содержимое подблока "Магия" -->
        </div>
        <div id="defense" class="sub-block">
            <!-- Содержимое подблока "Защита" -->
        </div>
        <div id="weapon" class="sub-block">
            <!-- Содержимое подблока "Оружие" -->
        </div>
        <div id="artifacts" class="sub-block">
            <!-- Содержимое подблока "Артефакты" -->
        </div>
    </div>
</main>

<div class="balance" id="balance-container">
    Баланс: <span id="balance-value"></span>
</div>
<div class="user-email" id="user-email-container">
    Почта: <span id="user-email"></span>
</div>

<!-- Модальное окно -->
<div id="item-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <img id="item-image" alt="Item Image">
        <h2 id="item-name"></h2>
        <p id="item-description"></p>
        <p id="item-price"></p>
        <button id="buy-button">Купить</button>
    </div>
</div>

<?php include 'footer.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../JS/script.js"></script>
</body>

</html>

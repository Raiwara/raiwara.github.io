$(document).ready(function() {
    $.ajax({
        url: "../PHP/items.php",
        dataType: "json",
        success: function(data) {
            // Разделение на подблоки простых предметов
            var basicItems = data.slice(0, 56); // Простые предметы
            var attributesItems = basicItems.slice(0, 13); // Подблок "Атрибуты"
            var equipmentItems = basicItems.slice(13, 28); // Подблок "Экипировка"
            var miscellaneousItems = basicItems.slice(28, 41); // Подблок "Разное"
            var secretItems = basicItems.slice(41); // Подблок "Секретное"

            displayItems(attributesItems, "#attributes", "Атрибуты"); // Отображение подблока "Атрибуты"
            displayItems(equipmentItems, "#equipment", "Экипировка"); // Отображение подблока "Экипировка"
            displayItems(miscellaneousItems, "#miscellaneous", "Разное"); // Отображение подблока "Разное"
            displayItems(secretItems, "#secret", "Секретное"); // Отображение подблока "Секретное"

            // Разделение на подблоки улучшенных предметов
            var upgradedItems = data.slice(56); // Улучшенные предметы
            var accessoriesItems = upgradedItems.slice(0, 17); // Подблок "Аксессуары"
            var helpItems = upgradedItems.slice(17, 33); // Подблок "Помощь"
            var magicItems = upgradedItems.slice(33, 50); // Подблок "Магия"
            var defenseItems = upgradedItems.slice(50, 65); // Подблок "Защита"
            var weaponItems = upgradedItems.slice(65, 84); // Подблок "Оружие"
            var artifactsItems = upgradedItems.slice(84); // Подблок "Артефакты"

            displayItems(accessoriesItems, "#accessories", "Аксессуары"); // Отображение подблока "Аксессуары"
            displayItems(helpItems, "#help", "Помощь"); // Отображение подблока "Помощь"
            displayItems(magicItems, "#magic", "Магия"); // Отображение подблока "Магия"
            displayItems(defenseItems, "#defense", "Защита"); // Отображение подблока "Защита"
            displayItems(weaponItems, "#weapon", "Оружие"); // Отображение подблока "Оружие"
            displayItems(artifactsItems, "#artifacts", "Артефакты"); // Отображение подблока "Артефакты"
        }
    });

    $(document).on('click', '.item', function() {
        var item = {
            image: $(this).find(".item-image").attr("src"),
            name: $(this).find(".item-title").text(),
            description: $(this).find(".tooltiptext").text(),
            price: $(this).find(".price").text()
        };

        $("#item-modal").css("display", "block");
        $("#item-image").attr("src", item.image);
        $("#item-name").text(item.name);
        $("#item-description").text(item.description);
        $("#item-price").text(item.price);
    });

    $("#buy-button").click(function() {
        var itemPrice = parseFloat($("#item-price").text());
        var userBalance = parseFloat($("#balance-value").text());
        var userEmail = $("#user-email").text(); // Получение значения электронной почты

        if (userBalance >= itemPrice) {
            // Отправка запроса на сервер для обновления баланса пользователя
            $.ajax({
                url: "../PHP/update_balance.php",
                method: "POST",
                data: { balance: userBalance - itemPrice, email: userEmail }, // Передача значения email
                success: function(response) {
                    // Обновление баланса пользователя на странице
                    $("#balance-value").text(userBalance - itemPrice);

                    // Выполнение дополнительных действий при покупке предмета
                    // ...

                    // Закрытие окна с информацией о предмете
                    $("#item-modal").css("display", "none");
                },
                error: function(xhr, status, error) {
                    console.log("Ошибка при обновлении баланса пользователя:", error);
                }
            });
        } else {
            alert("Недостаточно средств на балансе");
        }
    });



    $(".close").click(function() {
        $("#item-modal").css("display", "none");
    });

    $(window).click(function(event) {
        if (event.target == $("#item-modal")[0]) {
            $("#item-modal").css("display", "none");
        }
    });

    loadUserData();
});

function displayItems(items, containerSelector, subBlockName) {
    var subBlockSelector = containerSelector.split("-")[0];
    var subBlockHtml = '<div class="sub-block">' +
        '<h2>' + subBlockName + '</h2>' +
        '<div class="item-container"></div>' +
        '</div>';

    $(subBlockSelector).append(subBlockHtml);

    var itemContainerSelector = subBlockSelector + ' .item-container';

    for (var i = 0; i < items.length; i++) {
        var item = items[i];

        var itemHtml = '<div class="item">' +
            '<img class="item-image" src="../images/' + item.image + '" alt="' + item.name + '">' +
            '<div class="tooltip">' +
            '<span class="tooltiptext">' + item.description + '</span>' +
            '</div>' +
            '<div class="item-details">' +
            '<h2 class="item-title">' + item.name + '</h2>' +
            '<p>Цена: <span class="price">' + item.price + '</span><img src="../images/gold.png" alt="Gold" class="gold-icon"></p>' +
            '</div>' +
            '</div>';

        $(itemContainerSelector).append(itemHtml);
    }
}

function loadUserData() {
    const balanceElement = document.getElementById('balance-value');
    const userEmailElement = document.getElementById('user-email');

    fetch('../PHP/get_user_data.php')
        .then(response => response.json())
        .then(data => {
            balanceElement.textContent = data.balance;
            userEmailElement.textContent = data.email;
        })
        .catch(error => {
            console.log('Ошибка при получении данных пользователя:', error);
        });
}

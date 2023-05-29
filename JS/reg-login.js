document.addEventListener('DOMContentLoaded', function() {
    // Показать форму регистрации
    function showRegisterForm() {
        document.getElementById('register-form').style.display = 'block';
        document.getElementById('login-form').style.display = 'none';
    }

    // Показать форму входа
    function showLoginForm() {
        document.getElementById('login-form').style.display = 'block';
        document.getElementById('register-form').style.display = 'none';
    }

    // Обработчик клика на кнопку регистрации
    document.getElementById('register-btn').addEventListener('click', function(e) {
        e.preventDefault();
        showRegisterForm();
    });

    // Обработчик клика на кнопку входа
    document.getElementById('login-btn').addEventListener('click', function(e) {
        e.preventDefault();
        showLoginForm();
    });
});
window.addEventListener('DOMContentLoaded', (event) => {
    // Загрузка баланса пользователя при загрузке страницы
    loadUserData();
});

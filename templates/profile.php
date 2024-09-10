<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль пользователя</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Шапка -->
    <?php
require_once 'header.php';
?>

    <!-- Основной контент -->
    <div class="container profile-container">
        <h2>Профиль</h2>
        <form action="#" method="POST" class="profile-form">
            <div class="form-group">
                <label for="name">Имя</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    placeholder="Введите имя" 
                    value="<?= htmlspecialchars($user['name'] ?? '') ?>" 
                    required 
                    autofocus>
                <!-- <span class="error">Пример сообщения об ошибке</span> -->
            </div>
            <div class="form-group">
                <label for="surname">Фамилия</label>
                <input 
                    type="text" 
                    id="surname" 
                    name="surname" 
                    placeholder="Введите фамилию" 
                    value="<?= htmlspecialchars($user['surname'] ?? '') ?>" 
                    required>
                <!-- <span class="error">Пример сообщения об ошибке</span> -->
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input 
                    type="text" 
                    id="phone" 
                    name="phone" 
                    placeholder="Введите телефон" 
                    value="<?= htmlspecialchars($user['phone'] ?? '') ?>" 
                    required>
                <!-- <span class="error">Пример сообщения об ошибке</span> -->
            </div>
            <div class="form-group">
                <label for="about">О себе</label>
                <textarea 
                    id="about" 
                    name="about" 
                    rows="4" 
                    placeholder="Расскажите о себе"><?= htmlspecialchars($user['about'] ?? '') ?></textarea>
                <!-- <span class="error">Пример сообщения об ошибке</span> -->
            </div>
            <button type="submit" class="btn-submit">Сохранить</button>
        </form>
    </div>

    <!-- Футер -->
    <?php
require_once 'footer.php';
?>
</body>
</html>

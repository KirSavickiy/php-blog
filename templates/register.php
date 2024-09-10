<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Регистрация</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<?php
require_once 'header.php';
?>

<body>
  <div class="auth-container">
    <h2>Регистрация</h2>
    <form method="POST" act="">
    <input type="hidden" name="act" value="register"/>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="confirm_password">Подтвердите пароль</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
      </div>
      <button type="submit">Зарегистрироваться</button>
    </form>
    <p>Уже есть аккаунт? <a href="?act=login">Войти</a></p>
  </div>
</body>
<?php
require_once 'footer.php';
?>
</html>
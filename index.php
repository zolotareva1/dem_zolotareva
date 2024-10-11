<?
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="wrap">
        <img src="media/image/logo.png" alt="" class="logo">
        <h1>Регистрация</h1>
        <p class="error">
            <? echo $_SESSION['hint'];
                unset($_SESSION['hint']);
            ?>
        </p>
        <form action="php/registration.php" class="form__registration" method="POST">
            <input type="text" name="login" placeholder="Введите логин">
            <input type="text" name="fio" placeholder="Введите ФИО">
            <input type="email" name="email" placeholder="Электронная почта">
            <input type="phone" name="phone" placeholder="+7(XXX)-XXX-XX-XX" pattern="\+7\([0-9]{3}\)\d{3}-\d{2}-\d{2}">
            <input type="password" name="password" placeholder="Пароль">
            <input type="submit" name="regButton" value="Зарегистрироваться">
        </form>
        <p class="link__text">Есть аккаунт? <a href="public/authorization.php" class="link">Войти</a></p>
    </div>
</body>
</html>
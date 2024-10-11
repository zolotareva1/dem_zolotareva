<? session_start();?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="wrap">
        <img src="../media/image/logo.png" alt="" class="logo">
        <h1>Вход</h1>
        <p class="error">
           <?
            echo $_SESSION['hint'];
            unset($_SESSION['hint']);
           ?> 
        </p>
        <form action="../php/authorization.php" method="POST" class="form__registration">
            <input type="text" name="login" placeholder="Введите логин">
            <input type="password" name="password" placeholder="Введите пароль">
            <input type="submit" name="authButton" value="Войти">
        </form>
        <p class="link__text">Нет аккаунта? <a href="../index.php" class="link">Зарегистрироваться</a></p>
    </div>
</body>
</html>
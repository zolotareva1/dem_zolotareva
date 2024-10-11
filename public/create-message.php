<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание заявки</title>
    <link rel="stylesheet" href="../style/style.css">
    <script src="../js/select.js" defer></script>
</head>
<body>
    <div class="wrap">
        <div class="header">
            <a href="show-message.php" class="button-arrow">
                <img src="../media/image/arrow_custom.png" alt="" class="arrow">
            </a>
            <h1>Cоздание заявки</h1>
        </div>
        <form action="../php/send-message.php" method="POST" class="form__message">
            <input type="tel" name="phone" class="phone" placeholder="+7(XXX)-XXX-XX-XX" pattern="\+7\([0-9]{3}\)\d{3}-\d{2}-\d{2}" required>
            <input type="datetime-local" name="datetime-local">
            <select name="category" id="select-category" class="select">
                <option value="category" selected disabled>Категория</option>
                <option value="Общий клининг">Общий клининг</option>
                <option value="Генеральная уборка">Генеральная уборка</option>
                <option value="Послестроительная уборка">Послестроительная уборка</option>
                <option value="Химчистка ковров и мебели">Химчистка ковров и мебели</option>
            </select>
            <div class="checkbox">
                <input type="checkbox" name="Other" id="checkbox">
                <label for="Other">Другие услуги</label>
            </div>
            <textarea name="textarea-other" class="textarea-other" id="textarea-other" placeholder="Введите название услуг"></textarea>
            <input type="text" name="address" placeholder="Введите адрес">
            <select name="pay" id="select-pay" class="select">
                <option value="" selected disabled>Тип оплаты</option>
                <option value="Наличные">Наличными</option>
                <option value="Банковская карта">Банковская карта</option>
            </select>
            <input type="submit" value="Отправить">
        </form>
    </div>
</body>
</html>
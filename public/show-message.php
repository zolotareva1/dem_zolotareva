<?session_start();?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заявки</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="wrap">
        <div class="header">
            <a href="../public/authorization.php" class="button-arrow">
                <img src="../media/image/arrow_custom.png" alt="" class="arrow">
            </a>
            <h1>Мои заявки</h1>
        </div>
        <p class="messageok">
            <?echo $_SESSION['messageok'];
            unset($_SESSION['messageok']);?>
        </p>
        <button class="btn_new-message">
            <a href="create-message.php" class="link_create-message">Оставить новую заявку</a>
        </button>
        <div class="all-message">
            <?
            require_once('../db/connection.php');
            $orders=$conn->query('select * from orders where id_user ="' . $_SESSION['userId'] . '"');
            $orders=$orders->fetchAll();
            foreach($orders as $order){?>
                <div class="message">
                    <p class="category"><? echo $order['type-service']?></p>
                    <p><span class="text-bold">Статус: </span><? echo $order['status']?></p>
                    <p><span class="text-bold">Адрес: </span><? echo $order['address']?></p>
                    <p class="date"><? echo $order['datetime']?></p>
                </div>
            <?}
            ?>
        </div>
    </div>
</body>
</html>
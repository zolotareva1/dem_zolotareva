<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    <link rel="stylesheet" href="../style/style.css">
    <script src="../js/admin.js" defer></script>
</head>
<body>
    <div class="wrap">
        <div class="header">
            <a href="../public/authorization.php" class="button-arrow">
                <img src="../media/image/arrow_custom.png" alt="" class="arrow">
            </a>
            <h1>Админ-панель</h1>
        </div>
        <h2>Все заявки</h2>
        <div class="all-message">
            <?
            require_once('../db/connection.php');
            $orders=$conn->query('select * from orders');
            $orders=$orders->fetchAll();
            foreach($orders as $order){?>
                <div class="message-user">
                    <p><span class="text-bold">ФИО: </span> 
                        <?
                            $userName=$conn->query('select fio from users where id="'.$order['id_user'].'"');
                            $userName=$userName->fetch();
                            echo ($userName['fio']);
                        ?>
                    </p>
                    <p><span class="text-bold">Телефон: </span>
                        <?
                            $userPhone=$conn->query('select phone from users where id="'.$order['id_user'].'"');
                            $userPhone=$userPhone->fetch();
                            echo ($userPhone['phone']);
                        ?>
                    </p>
                    <p><span class="text-bold">Дата: </span><? echo ($order['datetime'])?></p>
                    <p><span class="text-bold">Тип услуги: </span><? echo ($order['type_service'])?></p>
                    <p><span class="text-bold">Статус: </span><? echo ($order['status'])?></p>
                    <?
                        if($order['cancel_reason']){?>
                    <p><span class="text-bold">Причина отмены: </span><? echo ($order['cancel_reason'])?></p>
                        <?}
                    ?>
                    <form class="change-status" action="../php/change-status.php" method="POST">
                        <input type="hidden" name="id-message" value="<?=$order['id'];?>">
                        <select name="select-status" id="select-status" class="select-status">
                            <option value="В работе">В работе</option>
                            <option value="Выполнено">Выполнено</option>
                            <option value="Отменено" id="cancel">Отменено</option>
                        </select>
                        <input type="submit" name="change-status" class="btn-change-status" id="btnChange" value="Изменить">
                    </form>
                    <form class="change-cancel" action="../php/change-status.php" id="form-cancel" method="POST">
                        <input type="hidden" name="id-message" value="<?=$order['id'];?>">
                        <textarea name="cancel-text" id="" class="cancel-text"></textarea>
                        <input type="submit" name="cancel" id="" class="cancel-button" value="Отменить">
                    </form>
                    <p><span class="text-bold">Тип оплаты: </span><? echo ($order['type_payment'])?></p>
                </div>
            <? }
            ?>
        </div>
    </div>
</body>
</html>
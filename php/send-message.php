<?
    if(isset($_POST['phone'])
    && isset($_POST['datetime-local'])
    && isset($_POST['address'])
    || isset($_POST['category'])
    && isset($_POST['pay'])
    || isset($_POST['textarea-other'])
    && !empty($_POST['phone'])
    && !empty($_POST['datetime-local'])
    || !empty($_POST['category'])
    && !empty($_POST['pay'])
    && !empty($_POST['address'])
    || !empty($_POST['textarea-other'])
    ){
        session_start();
        require_once '../db/connection.php';
        if(isset($_POST['textarea-other']) && !empty($_POST['textarea-other'])){
            $conn->prepare('insert into orders (id_user, address, phone, datetime, type_service, other_service, type_payment) values (?,?,?,?,?,?,?)')->execute(array($_SESSION['userId'], $_POST['address'], $_POST['phone'], $_POST['datetime-local'], 'Иная услуга', $_POST['textarea-other'], $_POST['pay']));
            $_SESSION['messageok']='Заявка оформлена!';
            $location='../public/show-message.php';
        } else{
            $conn->prepare('insert into orders (id_user, address, phone, datetime, type_service, other_service, type_payment) values (?,?,?,?,?,?,?)')->execute(array($_SESSION['userId'], $_POST['address'], $_POST['phone'], $_POST['datetime-local'], $_POST['category'], $_POST['textarea-other'], $_POST['pay']));
            $_SESSION['messageok']='Заявка оформлена!';
            $location='../public/show-message.php';
            
        }
    }

header('location:'.$location);
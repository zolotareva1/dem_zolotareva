<?
    if(isset($_POST['select-status'])
    && isset($_POST['change-status'])
    && !empty($_POST['select-status'])
    && !empty($_POST['change-status'])
    ){
        require_once('../db/connection.php');
        $newStatus = $conn->query('UPDATE orders set status="'.$_POST['select-status'].'",cancel_reason="" where id= "'. $_POST['id-message'] .'"');
        $location='../admin/admin.php';
    }

    if(isset($_POST['cancel-text'])
    && isset($_POST['cancel'])
    && !empty($_POST['cancel-text']))
    {
        require_once('../db/connection.php');
        $newStatus = $conn->query('UPDATE orders set status= "Отменено", cancel_reason="'.$_POST['cancel-text'].'"   where id= "'. $_POST['id-message'] .'"');
        $location='../admin/admin.php';
    }

header('location:'.$location);
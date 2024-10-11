<?php
if(isset($_POST['authButton'])
    && isset($_POST['login'])
    && isset($_POST['password'])
    && !empty($_POST['login'])
    && !empty($_POST['password'])){
        require_once '../db/connection.php';
        $userData = array($_POST['login'], $_POST['password']);

        $checkUser = $conn->query('select * from users where login = "'. $userData[0] .'"  and password = "' . $userData[1].'"');
        $checkUser = $checkUser-> fetch();
        if($checkUser){
            session_start();
            $_SESSION['userLogin']=$checkUser['login'];
            $_SESSION['userRole']=$checkUser['role'];
            $_SESSION['userId']=$checkUser['id'];
            if($_SESSION['userRole'] == 1){
                $location = '../public/show-message.php';
            } else if ($_SESSION['userRole'] == 0){
                $location = '../admin/admin.php';
            }
        } else {
            session_start();
            $_SESSION['authFail']=true;
            $_SESSION['hint']='Неправильный логин или пароль!';
            $location = '../public/authorization.php';
        }
} else if(empty($_POST['password'])
    && empty($_POST['login'])){
    session_start();
    $_SESSION['authFail']=true;
}
header('location:' . $location);
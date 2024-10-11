<?php
if(isset($_POST['regButton'])
    && isset($_POST['login'])
    && isset($_POST['fio'])
    && isset($_POST['email'])
    && isset($_POST['phone'])
    && isset($_POST['password'])
    && !empty($_POST['login'])
    && !empty($_POST['fio'])
    && !empty($_POST['email'])
    && !empty($_POST['phone'])
    && !empty($_POST['password'])){
        require_once '../db/connection.php';
        $checkLogin=$conn->query('select login from users where login= "'. $_POST['login'].'"');
        $checkLogin=$checkLogin->fetch();
        $checkEmail=$conn->query('select email from users where email= "'. $_POST['email'].'"');
        $checkEmail=$checkEmail->fetch();
        $checkPhone=$conn->query('select phone from users where phone= "'. $_POST['phone'].'"');
        $checkPhone=$checkPhone->fetch();

        if($checkLogin || $checkEmail || $checkPhone){
            session_start();
            $location='../index.php';
            if($checkLogin){
                $_SESSION['hint']='Данный логин занят!';
            } else if ($checkEmail){
                $_SESSION['hint']='Данный email занят!';
            } else if ($checkPhone){
                $_SESSION['hint']='Данный телефон занят!';
            }
        } else{
            if(
                $conn->prepare("insert into users(fio, login, email, phone, password) values (?,?,?,?,?)")->execute(array($_POST['fio'], $_POST['login'], $_POST['email'], $_POST['phone'], $_POST['password']))
            ){
                session_start();
                $_SESSION['regOk']=true;
                $_SESSION['userLogin']=$_POST['login'];
                $location='../public/show-message.php';
            }
        }
}


header('location:' . $location);
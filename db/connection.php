<?
$dbsetup="mysql:host=localhost;dbname=dem-exam-zolotareva;charset-utf8";
$dbUser='root';
$dbPass='root';
$dbErrMode=[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

$conn = new PDO($dbsetup, $dbUser, $dbPass, $dbErrMode);
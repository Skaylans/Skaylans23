<?php

$dsn = 'mysql:host=localhost;dbname=insurance';
$login = 'root';
$pass = null;

try {
    $conn = new PDO($dsn, $login, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $ex) {
    echo 'Не связанный '.$ex->getMessage();
}

 ?>

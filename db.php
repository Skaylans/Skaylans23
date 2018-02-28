<?php

$dsn = "sqlsrv:server = tcp:safelife.database.windows.net,1433; Database = insurance";
$login = "Romanow";
$pass = "Qwerty123456";

try {
    $conn = new PDO($dsn, $login, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $ex) {
    echo 'Не связанный '.$ex->getMessage();
}

 ?>

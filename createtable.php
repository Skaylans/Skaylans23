<?

$dsn = "sqlsrv:server = tcp:safelife.database.windows.net,1433; Database = insurance";
$login = "Romanow";
$pass = "Qwerty123456";


try {
    $conn = new PDO($dsn, $login, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE signup(
        id INT NOT NULL IDENTITY(1,1), 
        PRIMARY KEY(id),
        username VARCHAR(50),
        password VARCHAR(50),
        email VARCHAR(50),
        birthdate DATE)";
        $conn->query($sql);
        
        echo "<h3>Таблица создана.</h3>";
    }
catch (PDOException $e) {
    print("Ошибка подключения к SQL Server.");
    die(print_r($e));
}
?>

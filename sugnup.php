<?php

require_once('db.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password_1 = $_POST['password-1'];
    $password_2 = $_POST['password-2'];
    $email = $_POST['email'];
    //$birth_date = $_POST['birthdate'];

    if (!empty($username) && !empty($password_1) && !empty($password_2) && ($password_1 == $password_2)) {
      $sql_select = "SELECT * FROM signup WHERE username = '$username'";
      $stmt = $conn->query($sql_select);
      $stmt->execute();
      $data = $stmt->fetchAll();

      if(count($data) == 0) {
        $sql_insert = "INSERT INTO signup (username, password, email) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $username);
        $stmt->bindValue(2, $password_1);
        $stmt->bindValue(3, $email);
        //$stmt->bindValue(4, $birth_date);
        $stmt->execute();

        echo 'Вы зарегистрированны!';

        exit();
      }
      else {
        echo 'Такой пользователь уже существует!';
      }
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/sug.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <title>Страхование жизни</title>
  </head>
  <body>
    <div class="container">
      <a href="/index.php"><img src="img/lock.png"></a>
      <form class="" action="sugnup.php" method="post">
        <div class="dws-input">
          <input type="text" name="username" placeholder="Придумайте логин">
          <input type="password" name="password-1" placeholder="Придумайте пароль">
          <input type="password" name="password-2" placeholder="Введите пароль еще раз">
          <input type="text" name="email" placeholder="Ваш email...">
        </div>
        <input class="dws-submit" type="submit" name="submit" value="Регистрация">
      </form>
    </div>
  </body>
</html>

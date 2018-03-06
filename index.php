<?php

require_once('db.php');

  if (isset($_POST['submit'])) {
    $user_username = $_POST['username'];
    $user_password = $_POST['password'];

    if (!empty($user_username) && !empty($user_password)) {
      $_SESSION["username"] = $user_username;
      $sql_select = "SELECT 'id', 'username' FROM signup WHERE username = '$user_username' AND password = '$user_password'";
      $stmt = $conn->query($sql_select);
      $stmt->execute();
      $data = $stmt->fetchAll();
    }
    else {
      echo 'Поля заполнены неправельно';
    }
  }

 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <title>Страхование жизни</title>
  </head>
  <body>
    <div class="container">
 

      <img src="img/lock.png">
      <form class="" action="index.php" method="post">
        <div class="dws-input">
          <input type="text" name="username" placeholder="Введите логин">
        </div>
        <div class="dws-input">
          <input type="password" name="password" placeholder="Введите пароль">
        </div>
        <input class="dws-submit" type="submit" name="submit" value="Войти">
        <br>
        <a href="\sugnup.php">Регистрация</a>
      </form>


    </div>
  </body>
</html>

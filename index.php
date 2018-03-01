<?php

require_once('db.php');

if (!isset($_COOKIE['id'])) {
  if (isset($_POST['submit'])) {
    $user_username = $_POST['username'];
    $user_password = $_POST['password'];

    if (!empty($user_username) && !empty($user_password)) {
      $sql_select = "SELECT 'id', 'username' FROM signup WHERE username = '$user_username' AND password = '$user_password'";
      $stmt = $conn->query($sql_select);
      $stmt->execute();
      $data = $stmt->fetchAll();

      if(count($data) == 1) {
        setcookie('id', $data['id'], time() + (60*60*24*30));
        setcookie('username', $data['username'], time() + (60*60*24*30));
        $home_url = 'http://' . $_SERVER['HTTP_HOST'];
        header('Location: '. $home_url);
      }
      else {
        echo 'Неправельное имя пользователя или пароль';
      }
    }
    else {
      echo 'Поля заполнены неправельно';
    }
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
      <?php
      if (empty($_COOKIE['username'])) {
       ?>

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

    <?php
    }
    else {
      ?>

  <p><a href="#">Мой профиль</a></p>
  <p><a href="\exit.php">Выйти</a></p>

<?php
}
 ?>

    </div>
  </body>
</html>

<?php

$dbc = mysqli_connect('localhost', 'root', '', 'insurance');

if (!isset($_COOKIE['user_id'])) {
  if (isset($_POST['submit'])) {
    $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));

    if (!empty($user_username) && !empty($user_password)) {
      $query = "SELECT 'user_id', 'username' FROM `signup` WHERE username = '$user_username' AND password = SHA('$user_password')";
      $data = mysqli_query($dbc, $query);

      if (mysqli_num_rows($data) == 1) {
        $row = mysqli_fetch_assoc($data);
        setcookie('user_id', $row['user_id'], time() + (60*60*24*30));
        setcookie('username', $row['username'], time() + (60*60*24*30));
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
    <title>CSS3 дизайн формы</title>
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

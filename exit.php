<?php
unset($_SESSION['username']);
//$home_url = 'http://' . $_SERVER['HTTP_HOST'];
header('Location: /index.php');
?>

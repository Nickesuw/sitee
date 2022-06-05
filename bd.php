<?php

$bd = mysqli_connect('localhost', 'root', '1234', 'logins');
mysqli_query($bd, "SET NAMES utf8");

if(!$bd){
echo' Ошибка подключения к БД: '.mysqli_connect_error().' Код ошибки:'.mysqli_connect_errno();
exit;
}
if ($bd -> connect_error) {
  printf("Соединение не удалось: %s\n", $mysqli -> connect_error);
  exit();
};
?>

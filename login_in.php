<?php
session_start();

// Включаем файл подключения к БД
include('bd.php');
//===================
// Если существует параметр РЕГ, то значит идем по регистрации
if (isset($_POST['reg']))
{
  // запрашиваем данные
  $fm = $_POST['fm'];
  $nm = $_POST['nm'];
  $np = $_POST['np'];
  $em = $_POST['em'];
  $ps = $_POST['ps'];


  // Запрос на проверку есть ли такой емейл
  $result = $bd->query("SELECT * FROM users WHERE mail = '$em'");
  // Если больше 0, то выводим что есть такой
  if ($result->num_rows > 0)
  {
    echo "double";
  }
  else
  {
    // Иначе добовляем данные, сначала подсчитаем сколько все строк, для добавления индекса
    $result = $bd->query("SELECT * FROM users");
    // Увеличиваем +1 индекс, зависит от к-ва строк
    $ind = $result->num_rows + 1;
    // Вставляем новые данные
      $result = $bd->query("INSERT INTO users (id,fname,lname,np,mail,ps) VALUES ('$ind','$fm','$nm','$np','$em','$ps')");
    //-------------------
    if ($result)
    {
      // Если все отлично, то возврощаем тру и создаем сессию с данными
      echo "true";
      $_SESSION['user'] = true;
      $_SESSION['user_id'] = $data['id'];
      $_SESSION['fname'] = $data['fname'];
      $_SESSION['lname'] = $data['lname'];
    }
    else "false";
  }
 }
 //=====================================================
 // Тут если нам нужно просто войти
 else if (isset($_POST['login']))
 {
   $em = $_POST['em'];
   $ps = $_POST['ps'];
   //----------------
   // Проверяем есть ли такие в таблицы с емайл и пароль
   $result = $bd->query("SELECT * FROM users WHERE mail = '$em' AND ps = '$ps'");
   // Если больше 0, значит есть
   if ($result->num_rows > 0)
   {
     // Возврощаем тру и создаем сессию
     echo "true";
     $data = mysqli_fetch_array($result);
     $_SESSION['user'] = true;
     $_SESSION['user_id'] = $data['id'];
     $_SESSION['fname'] = $data['fname'];
     $_SESSION['lname'] = $data['lname'];
   }
   else echo "false";
 }
?>

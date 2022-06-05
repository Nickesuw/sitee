<?php session_start();
require ("cookie.php");
      // Тут проверяем, если есть сессия, совершился вход, то оставляем в кабинете
      if (!isset($_SESSION['user']))
      {
        header('Location: '.'index.php');
        exit();
      }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Личный кабинет</title>
      <!--Подключаем библиотеку-->
      <script src="js/jquery-2.2.3.min.js"></script>
    <style>
    body {
        background-image: url(lk.png) ;
        background-size: cover;
        font-family: "Avenir Next";
        text-align: center;

    }

    h1{font-weight: lighter;
        height: 30px;
        color: #407800;
     }
    .lin {
        margin-left: 100px;
    }
    .img {
        margin-left: 40px;

    }
    .scale {

        transition: 1s; /* Время эффекта */
    }
    .scale:hover {
        transform: scale(1.2); /* Увеличиваем масштаб */
    }
    .btn {
        padding: 15px 15px ;
        margin-left: 100px;
        border-radius: 30px;
        box-shadow: 0 0 5px;
        border: 0;
        text-align: center;
        font-size:16px;
        width:220px;
        background-color: white;
        color: #407800;
    }
    A:link {
        text-decoration: none; /* Убирает подчеркивание для ссылок */
        color: #9FDF64
    }
    A:visited { text-decoration: none;
        color: #9FDF64}
    A:active { text-decoration: none;
        color: #9FDF64}
    A:hover {
        text-decoration: underline; /* Делает ссылку подчеркнутой при наведении на нее курсора */
        color: darkgreen; /* Цвет ссылки */
    }
    }
    </style>


  </head>
  <body>
<div style="margin-top: 2%; margin-left: 100px" >
        <a href='main.php' class="lin" >Главная</a>
        <a href='main.php' class="lin" >Акции</a>
        <a href='ctlg.php' class="lin">Меню</a>
        <a href='main.php' class="lin">Контакты</a>
        <a href='main.php' ><input type='button' class="btn"  value='Забронировать' /> </a>
        <a href='cart.php'  class="img"> <img src="cart2.png" alt="" class="scale" style="margin-top: 10px; vertical-align: middle; width: 100px">  </a>
        <a href='cabinet.php'  class="img"> <img src="ikonlk.png" alt="" class="scale" style="margin-top: 10px; vertical-align: middle; width: 100px" >  </a>
</div>
        <p >Личный кабинет</p>

        <script>
            $("#callme").click(function() { // ID откуда кливаем
                $('html, body').animate({
                    scrollTop: $(".formwrap").offset().top  // класс объекта к которому приезжаем
                }, 1000); // Скорость прокрутки
            });
        </script>

<?php
  // Тут выводим сохраненные Фам и Имя
  echo "<div>".$_SESSION['fname']."</div>";
  echo "<div>".$_SESSION['lname']."</div>";
  echo "<a href='index.php'>Выход</a><br>";
?>

  </body>
</html>

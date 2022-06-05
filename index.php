<?php session_start();session_destroy(); // Тут сессия обнуляеться, это чтобы не войти в кабинет без авторизации ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Страница входа</title>
    <style>

    body {
      background-color: #FF9F0B;
        font-family: "Avenir Next", Arial;
        font-weight: lighter;


    }

    .forms {
      padding:20px 5px 70px 5px  ;
      margin:180px;
        border-radius: 30px;
      text-align: center;
      font-size:14px;
      width:30%;



      background-color: white;
    }
    h1{font-weight: lighter;
    color: #407800;

    }
    .forms input {
        height: 30px;
        width: 60%;
        border-radius: 10px;
        font-size: 14px;
    }
    .b1{
        background: #407800;
        color: white;

    }

    </style>

  </head>
  <body>

  <center>
    <!-- форма входа -->
    <form class='forms'>
      <h1>Авторизация</h1>
      <input type='text' placeholder='Введите почту' id='mail' maxlength='30' /><br><br>
      <input type='password' placeholder='Ваш пароль' id='pass' maxlength='100' /><br><br>
      <input type='button' class="b1" value='Войти' onclick='login()' id='bt_send' /><br><br>
      <a href='reg.php'>Регистрация</a>
    </form>
  </center>
  <script src="https://code.jquery.com/jquery-latest.min.js"></script>
  <script>

  // Переменная входа
  let inn = false;

  function login()
  {
    // Проверяем на корректность введенных данных
    if ((prov_inp('mail'))  & (prov_pass('pass')) & inn == false)
    {
      //--------------------
      // берем переменные
      let em = $('#mail').val();
      let ps = $('#pass').val();
      //--------------------
      $("#bt_send").attr('value','Подождите...');
      inn = true;
      //====================
      // Отправляем пост запрос на сервер
      $.post( "login_in.php", {login: "true", em : em, ps : ps})
      .done(function( data )
      {
        // Обрабатываем ответы
        if (data == 'false')
        {
          alert('Ошибка входа');
          $("#bt_send").attr('value','Войти');
          inn = false;
        }
          else if (data == 'true')  window.location.href = 'cabinet.php';
      });
    }
    else alert("Введите корректные данные");
  }
  //============================
  // проверка
  function prov_inp(nm)
  {
    // let vv = $('#'+nm).val();
    // vv = vv.replace(/(^[^ ]* )|[ ]+/g, '$1');
    // if ((vv != '') & (vv.length >= 2)) return true
    //  else return false;
      return true
  }

  function prov_pass(nm)
  {
    // let vv = $('#'+nm).val();
    // vv = vv.replace(/(^[^ ]* )|[ ]+/g, '$1');
    // if ((vv.search(/\d/) != -1 ) & (/[a-zа-яё]/i.test(vv)) & (vv.length >= 5)) return true
    //  else return false;
      return true;
  }
  </script>
  </body>
</html>

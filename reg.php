<?php session_start() ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Страница регистрации</title>

    <style>
    body {
        background-color: #FF9F0B;
        font-family: "Avenir Next", Arial;
        font-weight: lighter;
    }

    .forms {
        padding:20px 5px 70px 5px  ;
        margin:80px;
        border-radius: 30px;
        text-align: center;
        font-size:14px;
        width:30%;
        background-color: white;
        border-style: solid;
        color: #407800;

    }
    .nad1{
      font-size: 18px;
      font-weight: lighter;
    }
    .forms input {
        height: 30px;
        width: 60%;
        border-radius: 10px;
        border-color: gray;
        font-size: 14px;
    }
    </style>

  </head>
  <body>
  <<center>
    <form class='forms'>
      <h2 style="font-weight: lighter;">Регистрация</h2>
      <span class='nad1'>Фамилия:</span><br>
      <input type='text' placeholder='Введите фамилию' id='fname' maxlength='20' /><br><br>
      <span class='nad1'>Имя:</span><br>
      <input type='text'  placeholder='Введите Имя' id='lname' maxlength='20' required pattern='^[А-Яа-яЁё]+$' title='Неизвестные символы. Используйте только русские буквы.'/><br><br>
        <span class='nad1'>Номер телефона:</span><br>
        <input type='tel' placeholder='Номер телефона' id='np' maxlength='100'/><br><br>
      <span class='nad1'>Почта:</span><br>
      <input type='email' placeholder='Ваша почта' id='mail' maxlength='100' /><br><br>
      <span class='nad1'>Придумате пароль:</span>
      <input type='password' placeholder='Введите пароль' id='pass' maxlength='100' /><br><br>

      <input type='button' value='Регистрация' onclick='reg()' id='bt_send' /><br><br>
      <a href='index.php'>Вход в кабинет</a>
    </form>
  <</center>
  <script src="https://code.jquery.com/jquery-latest.min.js"></script>
  <script>

  let inn = false;
  //============================
  function reg()
  {
      if ((prov_inp('fname')) & (prov_inp('lname')) & (prov_inp('np')) & (prov_inp('mail'))  & (prov_pass('pass')) & inn == false)
    {
        //--------------------
      let fm = $('#fname').val();
      let nm = $('#lname').val();
      let np = $('#np').val();
      let em = $('#mail').val();
      let ps = $('#pass').val();
      //--------------------
      $("#bt_send").attr('value','Подождите');
      $inn = true;
      //--------------------
      $.post( "login_in.php", {reg: "true", fm : fm, nm : nm, np : np, em : em, ps : ps})
      .done(function( data )
      {
        if (data == 'false')
        {
          alert('Ошибка БД');
          $("#bt_send").attr('value','Регистрация');
          $inn = false;
        }
        else if (data == 'double')
        {
          alert('Такой пользователь уже существует!');
          $("#bt_send").attr('value','Регистрация');
          $inn = false;
        }
          else if (data == 'true')  window.location.href = 'cabinet.php';
      });
    }
    else alert("Введите корректные данные");
  }
  //============================
  function prov_inp(nm)
  {
      return true
    // let vv = $('#'+nm).val();
    // vv = vv.replace(/(^[^ ]* )|[ ]+/g, '$1');
    // if ((vv != '') & (vv.length >= 2)) return true
    //  else return false;
  }
  //=============================
  function prov_pass(nm)
  {
      return true
      // let vv = $('#'+nm).val();
      // vv = vv.replace(/(^[^ ]* )|[ ]+/g, '$1');
      // if ((vv.search(/\d/) != -1 ) & (/[a-zа-яё]/i.test(vv)) & (vv.length >= 5)) return true
      // else return false;
  }
  </script>
  </body>
</html>

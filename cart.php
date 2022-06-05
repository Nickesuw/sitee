<?php
session_start();
// Включаем файл подключения к БД
include('bd.php');
$user_id = $_SESSION['user_id'];
$cart = [];
$amount = 0;
$result  = $bd->query("SELECT * FROM cart where user_id = ".$user_id."");
while ($row = $result->fetch_assoc()) {
    $product = $bd->query("SELECT * FROM products where id = ".$row['product_id']."")->fetch_assoc();
    $cart[] = $product;
    $amount = $amount + $product['price'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Личный кабинет</title>
    <!--Подключаем библиотеку-->
    <script src="jquery-3.6.0.js"></script>
    <script>
        function cart_delete(el) {
            var id = ($(el).attr('data-id'));
            $.ajax({
                type: "GET",
                url: '/ajax-cart-delete.php',
                data: {"id":id},
                dataType: "html",
                success: function(data){
                    alert(data);
                    location.reload();
                },
                failure: function(errMsg) {
                    alert(errMsg);
                }
            });
        }
    </script>
    <style>
        body {
            background-image: url(fon.png) ;
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
        } .forms {
              padding:20px 5px 70px 5px  ;
              margin:80px;
              border-radius: 30px;
              text-align: center;
              font-size:14px;
              width:30%;
              background-color: white;

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
        }
        kom
        {height: 80px;

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
<div class="cart-div" style="display: flex; flex-direction: inherit">
    <div class="ordered-products" style="margin-left: 10%">
        <p>Твой заказ</p>
        </br></br>
        <?php if (!empty($cart)){ ?>
            <?php foreach ($cart as $item): ?>
                <div class="card-item-div">
                    <span src=alt="<?=$item['name']?>"><span style="position: absolute left: 20px;color: red;" data-id="<?=$item['id']?>" onclick="cart_delete(this)">&#10006;</span> </span>
                    <span class="cart-item"><?=$item['name']?><?=$item['price']?> Р</span></br></br></br>
                </div>
            <?php endforeach;?>
        <?php }?>
        </br>
        <p>К оплате <?=$amount?></p>
        <button style="width: 400px;height: 40px"></button>
    </div>
    <div class="forms" style="margin-left: 30%">

        <span class='nad1'>Имя:</span><br>
        <input type='text'  placeholder='Введите Имя' id='lname' maxlength='20' required pattern='^[А-Яа-яЁё]+$' title='Неизвестные символы. Используйте только русские буквы.'/><br><br>
        <span class='nad1'>Номер телефона:</span><br>
        <input type='tel' placeholder='Номер телефона' id='np' maxlength='100'/><br><br>
        <span class='nad1'>Адрес:</span><br>
        <input type='text' placeholder='Адрес' id='adress' maxlength='100' /><br><br>
        <span class='nad1'>Комментарий:</span><br>
        <input type='text'  placeholder='Комментарий' id='kom' maxlength='100'  /><br><br>
    </div>
</div>


</body>
</html>
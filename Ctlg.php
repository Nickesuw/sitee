<?php
session_start();
// Включаем файл подключения к БД
include('bd.php');

$products  = [];
$result = $bd->query("select * from products");
while ($row = $result->fetch_assoc()) {
    $products[] =  $row;
}
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Личный кабинет</title>
        <!--Подключаем библиотеку-->
        <script src="jquery-3.6.0.js"></script>
        <script>
            function cart_add(el) {
                var id = ($(el).attr('data-id'));
                $.ajax({
                    type: "GET",
                    url: '/ajax-cart-add.php',
                    data: {"id":id},
                    dataType: "html",
                    success: function(data){
                        alert(data);
                    },
                    failure: function(errMsg) {
                        alert(errMsg);
                    }
                });
            }
        </script>
        <style>
            body {
                background-image: url(main2.png) ;
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


            .cards {
                position: relative;
                top: 100px;
                display: flex;
                max-width: 1400px;
                margin: 0 auto;
                flex-wrap: wrap;
            }

            .card {
                width: 300px;
                height: 300px;
                border-radius: 50px;
                border: 2px solid #ff9f0a;
                display: flex;
                flex-direction: column;
                align-items: center;
                overflow: hidden;
                margin-top: 15px;
                margin-left: 15px;
            }

            .card-image {
                margin-top: 30px;
            }

            .card-title {
                color: #407800;
                font-size: 20px;
            }

            .card-price {
                color: #ff9f0a;
                margin-top: 15px;
            }

            .card-add-btn {
                text-decoration: none;
                background-color: #ff9f0a;
                margin-top: auto;
                width: 100%;
                color: white;
                border: none;
                padding: 10px;
            }

        </style>


    </head>
    <body>

    <div style="margin-top: 2%; margin-left: 100px "  >
        <a href='main.php' class="lin" >Главная</a>
        <a href='main.php' class="lin" >Акции</a>
        <a href='ctlg.php' class="lin">Меню</a>
        <a href='main.php' class="lin">Контакты</a>
        <a href='main.php' ><input type='button' class="btn"  value='Забронировать' /> </a>
        <a href='cart.php'  class="img"> <img src="cart2.png" alt="" class="scale" style="margin-top: 10px; vertical-align: middle; width: 100px">  </a>
        <a href='cabinet.php'  class="img"> <img src="ikonlk.png" alt="" class="scale" style="margin-top: 10px; vertical-align: middle; width: 100px" >  </a> <br>
        <br>
        <br>
        <div class='cards'>
            <?php foreach ($products as $product) :?>
                <div class="card">
                    <img class="card-image" src=" <?=$product['img']?>" alt="cesar">
                    <div class="card-title">
                        <?=$product['name']?>
                    </div>
                    <div class="card-price"> <?=$product['price']?> Р</div>
                    <button class='card-add-btn' id="cart-add" onclick="cart_add(this)" data-id="<?=$product['id']?>">Добавить</button>
                </div>
            <?php endforeach;?>
        </div>

    </div>
    </body>

    </html>
<?php

?>
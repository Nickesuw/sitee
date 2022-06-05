<?php
session_start();

// Включаем файл подключения к БД
include('bd.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $product_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $is_add = $bd->query("SELECT * FROM cart WHERE user_id = ".$user_id." and product_id = ".$product_id."");

        $bd->query("INSERT INTO cart (user_id, product_id,id) VALUES (".$user_id.", ".$product_id.")");
        echo 'Товар добавлен';
}
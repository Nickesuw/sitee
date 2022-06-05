<?php
session_start();

// Включаем файл подключения к БД
include('bd.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $product_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $is_add = $bd->query("SELECT * FROM cart WHERE user_id = ".$user_id." and product_id = ".$product_id."");
    if ($is_add->num_rows < 1 ){
        echo 'Товар уже удален';
    }else {
        $bd->query("DELETE FROM cart WHERE user_id = '".(int)$user_id."' and product_id = '".(int)$product_id."'");
        echo 'Товар удален';
    }
}

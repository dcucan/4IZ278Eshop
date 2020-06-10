<?php

include_once __DIR__ . '/../app.php';


require_login();

//dd($_SESSION['user']['id']);


if (!isset($_SESSION['cart'])||empty($_SESSION['cart'])) return redirect('eshop');


$ids = [];

foreach ($_SESSION['cart'] as $item) {
    $ids[] = $item['id'];
}

if (count($ids) == 0) return redirect('eshop');

//vezmu si všechny ceny z db
$placeholders = str_repeat('?, ',  count($ids) - 1) . '?';
$prices = db_selectAll("SELECT price FROM store WHERE id IN ($placeholders)", $ids);

//vložim objednávku a vrátí se mi idčko
$id =  insertInto("INSERT INTO `order` (id_user) VALUES (?)", [$_SESSION['user']['id']]);


//vložim si do db všechny itemy z objednávky
foreach ($_SESSION['cart'] as $index => $item) {
    insertInto("INSERT INTO `orderItems` (id_order, id_item, price, qty) VALUES (?,?,?,?)", [$id, $item['id'], $prices[$index]['price'], $item['qty']]);
}


unset($_SESSION['cart']);


redirect('orders');

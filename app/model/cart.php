<?php

include_once __DIR__ . '/../app.php';

if (isset($_SESSION['cart']))

$ids = [];

foreach ($_SESSION['cart'] as $item) {
    $ids[] = $item['id'];
}

if (count($ids) == 0) return redirect('eshop');

$placeholders = str_repeat('?, ',  count($ids) - 1) . '?';
$items = db_selectAll("SELECT * FROM store WHERE id IN ($placeholders)", $ids);

foreach ($_SESSION['cart'] as $index => $item) {
    $items[$index]['qty'] = $item['qty'];
}


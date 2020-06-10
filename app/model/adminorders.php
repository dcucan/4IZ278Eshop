<?php

include_once __DIR__ . '/../app.php';

require_login();

//$items_for_order = db_selectAll("SELECT * FROM orderItems WHERE id IN ($placeholders)", $ids);

$orders = db_selectAll("SELECT * FROM `order` ORDER BY id DESC");

$orderIDs = [];

foreach ($orders as $order) {
    $orderIDs[] = $order['id'];
}


foreach ($orderIDs as $i => $orderID) {
    $orderItems = db_selectAll("SELECT * FROM orderItems AS o JOIN store AS s ON o.id_item=s.id WHERE o.id_order=?;", array($orderID));
    $orders[$i]['items'] = $orderItems;
}

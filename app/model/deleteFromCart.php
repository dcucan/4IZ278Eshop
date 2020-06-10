<?php

include_once __DIR__ . '/../app.php';

if (!isset($_SESSION['cart'])) return redirect('eshop');

foreach ($_SESSION['cart'] as $index => $item) {
    if ($item['id'] == $_POST['id']) {
        array_splice($_SESSION['cart'], $index, 1);
    }
}

return redirect('cart');

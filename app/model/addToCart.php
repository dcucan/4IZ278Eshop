<?php

include_once __DIR__ . '/../app.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Pokusime se najit uz existujici predmet
foreach ($_SESSION['cart'] as $index => $item) {
    // Pokud ho najdeme zvysime quantitu
    if ($item['id'] == $_POST['id']) {
        $_SESSION['cart'][$index]['qty'] += $_POST['qty'];

        // Nepokracujeme dal protoze zvyseni quantity staci
        return redirect('cart');
    }
}

// Pokud jsme se dostali sem zadny predmet se stejnym id nebyl nalezen a tak pridame novy
$_SESSION['cart'][] = [
    'id' => $_POST['id'],
    'qty' => $_POST['qty'],
];

return redirect('cart');

<?php

require_once __DIR__ . '/../app.php';

if ($_SESSION['user']['admin'] != '1') return redirect('account');

$content = "adminorders.phtml";

if (isset($_GET['subpage'])) {
    $content = "admin" . $_GET['subpage'] . ".phtml";
}

<?php

require_once __DIR__ . '/../app.php';

$items = [];
$items = db_selectAll("SELECT * FROM `store`");
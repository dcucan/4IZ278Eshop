<?php

include_once __DIR__ . '/../app.php';


$limit = min([(int) ($_GET['limit'] ?? 4), 16]);
$offset = (int) ($_GET['offset'] ?? 0);
$type = "krmivo";
if (isset($_GET['type'])) {
    $type = $_GET['type'];
}


$items = db_selectAll("SELECT * FROM store WHERE `type` =? LIMIT ? OFFSET ?", [$type, $limit, $offset]);
$pages = ceil(db_selectOne("SELECT count(*) as count FROM store")['count'] / $limit);

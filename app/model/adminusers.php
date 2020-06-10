<?php

require_once __DIR__ . '/../app.php';

$users = [];

$users = db_selectAll("SELECT * FROM user");
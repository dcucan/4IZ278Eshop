<?php

include_once __DIR__ . '/../app/app.php';

//index.php?page=about

$page = get('page', 'home');
$model = $config['MODEL_PATH'] . $page . '.php';
$view= $config['VIEW_PATH'] . $page . '.phtml';
$_404 = $config['VIEW_PATH'] .  '404.phtml';


if(file_exists($model)){
    require $model;
}

$main_content = $_404;

if(file_exists($view)){
    $main_content = $view;
}

include $config['VIEW_PATH'].'layout-bs.phtml';

<?php

include_once __DIR__ . '/../app.php';

if (isset($_POST['delete'])) {

    db_execute("UPDATE `order` SET `state` = '0' WHERE `order`.`id` = ?", [$_POST['delete']]);


    return redirect('account');
}

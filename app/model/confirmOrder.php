<?php

include_once __DIR__ . '/../app.php';

if(isset($_POST['confirm'])){
    
    

db_execute("UPDATE `order` SET `state` = '1' WHERE `order`.`id` = ?", [$_POST['confirm']]);



return redirect('account');

}